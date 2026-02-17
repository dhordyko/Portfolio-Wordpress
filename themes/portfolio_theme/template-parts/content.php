<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Portfolio_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>




	<div class=" entry-content">
		<div class="post-header">
			<h1><?php echo get_the_title(); ?></h1>
			<span class="breadcrumbs"><span class="home-link"><a href="<?php echo esc_url(home_url()); ?>">Home</a></span>&nbsp;/&nbsp;<?php echo get_the_title(); ?></span>
		</div>
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'portfolio_theme'),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post(get_the_title())
			)
		);


		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">

	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->