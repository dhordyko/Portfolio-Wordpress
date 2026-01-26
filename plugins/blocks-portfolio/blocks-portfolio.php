<?php

/**
 * Plugin Name:       Blocks Portfolio
 * Description:       Example block scaffolded with Create Block tool.
 * Version:           0.1.0
 * Requires at least: 6.7
 * Requires PHP:      7.4
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       blocks-portfolio
 *
 * @package CreateBlock
 */

if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
define('BLOCKS_GAMESTORE_PATH', plugin_dir_path(__FILE__));

/**
 * Register REST API endpoint for contact form
 */
add_action('rest_api_init', function () {
	register_rest_route('portfolio/v1', '/contact', array(
		'methods'             => 'POST',
		'callback'            => 'portfolio_handle_contact',
		'permission_callback' => '__return_true',
	));
});

/**
 * Handle contact form submission via REST API
 */
function portfolio_handle_contact(WP_REST_Request $request)
{
	// Nonce check (optional - disabled for public form)
	// Honeypot and email validation provide sufficient spam protection

	$name    = sanitize_text_field($request->get_param('name'));
	$email   = sanitize_email($request->get_param('email'));
	$subject = sanitize_text_field($request->get_param('subject'));
	$message = sanitize_textarea_field($request->get_param('message'));

	// Honeypot anti-spam
	$website = sanitize_text_field($request->get_param('website'));
	if (!empty($website)) {
		return new WP_REST_Response(array('success' => true), 200); // silently accept bots
	}

	if (empty($name) || empty($email) || empty($message) || !is_email($email)) {
		return new WP_REST_Response(array('success' => false, 'message' => 'Please fill all fields correctly.'), 400);
	}

	$to = 'dhordykojob@gmail.com';
	$email_subject = 'Portfolio Contact — ' . $name;
	if (!empty($subject)) {
		$email_subject = 'Portfolio Contact — ' . $subject;
	}

	$body =
		"Name: {$name}\n" .
		"Email: {$email}\n" .
		"Subject: {$subject}\n\n" .
		"Message:\n{$message}\n";

	$headers = array(
		'Content-Type: text/plain; charset=UTF-8',
		"Reply-To: {$name} <{$email}>",
	);

	$sent = wp_mail($to, $email_subject, $body, $headers);

	if (!$sent) {
		return new WP_REST_Response(array('success' => false, 'message' => 'Email failed to send.'), 500);
	}

	return new WP_REST_Response(array('success' => true, 'message' => 'Thanks! Your message was sent.'), 200);
}

function create_block_blocks_portfolio_block_init()
{
	/** Static blocks */

	register_block_type(__DIR__ . '/build/block-skill');

	/** Dynamic blocks */
	register_block_type(__DIR__ . '/build/block-projects', array(
		'render_callback' => 'portfolio_render_projects',
	));
}
add_action('init', 'create_block_blocks_portfolio_block_init');

function portfolio_render_projects($attributes)
{
	// Get categories
	$categories = get_terms(array(
		'taxonomy'   => 'category',
		'hide_empty' => true,
		'exclude'    => get_option('default_category'),
	));

	// Get posts
	$posts = get_posts(array(
		'numberposts' => -1,
		'post_type'   => 'post',
		'orderby'     => 'date',
		'order'       => 'DESC',
	));

	ob_start(); ?>

	<div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
		<div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
			<div class="row">
				<!-- Filter Sidebar -->
				<div class="col-lg-3 filter-sidebar">
					<div class="filters-wrapper aos-init aos-animate" data-aos="fade-right" data-aos-delay="150">
						<ul class="portfolio-filters isotope-filters">
							<li data-filter="*" class="filter-active"><?php esc_html_e('All Projects', 'blocks-portfolio'); ?></li>
							<?php
							if (! is_wp_error($categories) && ! empty($categories)) {
								foreach ($categories as $category) {
									echo '<li data-filter=".filter-' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</li>';
								}
							}
							?>
						</ul>
					</div>
				</div>

				<!-- Portfolio Items -->
				<div class="col-lg-9">
					<div class="row gy-4 portfolio-container isotope-container aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
						<?php
						if (! empty($posts)) {
							foreach ($posts as $post) {
								$categories = get_the_category($post->ID);
								$category_slug = ! empty($categories) ? $categories[0]->slug : '';
								$category_name = ! empty($categories) ? $categories[0]->name : '';
								$thumbnail_url = get_the_post_thumbnail_url($post->ID, 'medium');
								$post_url = get_permalink($post->ID);
						?>
								<div class="col-lg-6 col-md-6 portfolio-item isotope-item filter-<?php echo esc_attr($category_slug); ?>">
									<div class="portfolio-wrap">
										<?php if ($thumbnail_url) : ?>
											<img src="<?php echo esc_url($thumbnail_url); ?>" class="img-fluid" alt="<?php echo esc_attr($post->post_title); ?>" loading="lazy">
										<?php endif; ?>
										<div class="portfolio-info">
											<div class="content">
												<span class="category"><?php echo esc_html($category_name); ?></span>
												<h4><?php echo esc_html($post->post_title); ?></h4>
												<div class="portfolio-links">
													<?php if ($thumbnail_url) : ?>
														<a href="<?php echo esc_url($thumbnail_url); ?>" class="glightbox" title="<?php echo esc_attr($post->post_title); ?>"><i class="bi bi-plus-lg"></i></a>
													<?php endif; ?>
													<a href="<?php echo esc_url($post_url); ?>" title="<?php esc_attr_e('More Details', 'blocks-portfolio'); ?>"><i class="bi bi-arrow-right"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div><!-- End Portfolio Item -->
						<?php
							}
						} else {
							echo '<p>' . esc_html__('No projects found', 'blocks-portfolio') . '</p>';
						}
						?>
					</div><!-- End Portfolio Container -->
				</div>
			</div>
		</div>
	</div>

<?php
	return ob_get_clean();
}
