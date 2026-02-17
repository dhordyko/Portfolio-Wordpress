<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Portfolio_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> <?php echo is_single() ? 'single-postpage' : ''; ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> data-aos-easing="ease-in-out" data-aos-duration="600" data-aos-delay="0">
	<a id="up-to-top" class="">
		<span class="icon-holder"></span>
	</a>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'portfolio_theme'); ?></a>
		<div class="toggle-btn">
			<button class="burger" aria-label="Toggle menu">
				<span class="burger__bar"></span>
				<span class="burger__bar"></span>
				<span class="burger__bar"></span>
			</button>


		</div>
		<header id="masthead" class="site-header <?php echo is_front_page() ? 'front-page' : ''; ?> <?php echo is_single() ? 'single-postpage' : ''; ?>">

			<?php
			if (!is_front_page()) : ?>
				<a class="home" href="/">
					<svg width="20" height="20" viewBox="0 0 50 50" fill="#f50013" xmlns="http://www.w3.org/2000/svg">
						<path d="M20.3125 45.3126V34.3595C20.3125 33.5939 21.0938 32.8126 21.875 32.8126H28.125C28.9063 32.8126 29.6875 33.5939 29.6875 34.3751V45.3126C29.6875 45.727 29.8521 46.1244 30.1451 46.4175C30.4382 46.7105 30.8356 46.8751 31.25 46.8751H43.75C44.1644 46.8751 44.5618 46.7105 44.8549 46.4175C45.1479 46.1244 45.3125 45.727 45.3125 45.3126V23.4376C45.3129 23.2323 45.2728 23.0289 45.1945 22.8391C45.1162 22.6493 45.0013 22.4767 44.8563 22.3314L40.625 18.1032V7.81261C40.625 7.39821 40.4604 7.00078 40.1674 6.70775C39.8743 6.41473 39.4769 6.25011 39.0625 6.25011H35.9375C35.5231 6.25011 35.1257 6.41473 34.8326 6.70775C34.5396 7.00078 34.375 7.39821 34.375 7.81261V11.8532L26.1063 3.58136C25.9611 3.43585 25.7887 3.3204 25.5989 3.24163C25.409 3.16286 25.2055 3.12231 25 3.12231C24.7945 3.12231 24.591 3.16286 24.4011 3.24163C24.2113 3.3204 24.0389 3.43585 23.8938 3.58136L5.14375 22.3314C4.99875 22.4767 4.88382 22.6493 4.80553 22.8391C4.72724 23.0289 4.68714 23.2323 4.6875 23.4376V45.3126C4.6875 45.727 4.85212 46.1244 5.14515 46.4175C5.43817 46.7105 5.8356 46.8751 6.25 46.8751H18.75C19.1644 46.8751 19.5618 46.7105 19.8549 46.4175C20.1479 46.1244 20.3125 45.727 20.3125 45.3126Z" fill="white" />
					</svg>
				</a>
			<?php endif; ?>

			<nav id="site-navigation" class="main-navigation ">


				<?php
				if (is_front_page()) {
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						)
					);
				} else {
					echo '<div class="related-projects">';
					echo '<h4 class="has-text-gradient-color">Related Projects</h4>';
					echo do_shortcode('[related_posts]');
					echo '</div>';
				}
				?>



				<div class="socials">
					<a class="github" href="https://www.linkedin.com/in/dmytro-hordiyenko-0b4115232/" target="_blank" rel="noopener noreferrer"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
							<g clip-path="url(#clip0_2045_396)">
								<path d="M10 0C4.475 0 0 4.475 0 10C0 14.425 2.8625 18.1625 6.8375 19.4875C7.3375 19.575 7.525 19.275 7.525 19.0125C7.525 18.775 7.5125 17.9875 7.5125 17.15C5 17.6125 4.35 16.5375 4.15 15.975C4.0375 15.6875 3.55 14.8 3.125 14.5625C2.775 14.375 2.275 13.9125 3.1125 13.9C3.9 13.8875 4.4625 14.625 4.65 14.925C5.55 16.4375 6.9875 16.0125 7.5625 15.75C7.65 15.1 7.9125 14.6625 8.2 14.4125C5.975 14.1625 3.65 13.3 3.65 9.475C3.65 8.3875 4.0375 7.4875 4.675 6.7875C4.575 6.5375 4.225 5.5125 4.775 4.1375C4.775 4.1375 5.6125 3.875 7.525 5.1625C8.325 4.9375 9.175 4.825 10.025 4.825C10.875 4.825 11.725 4.9375 12.525 5.1625C14.4375 3.8625 15.275 4.1375 15.275 4.1375C15.825 5.5125 15.475 6.5375 15.375 6.7875C16.0125 7.4875 16.4 8.375 16.4 9.475C16.4 13.3125 14.0625 14.1625 11.8375 14.4125C12.2 14.725 12.5125 15.325 12.5125 16.2625C12.5125 17.6 12.5 18.675 12.5 19.0125C12.5 19.275 12.6875 19.5875 13.1875 19.4875C15.173 18.8178 16.8983 17.5421 18.1205 15.84C19.3427 14.138 20 12.0954 20 10C20 4.475 15.525 0 10 0Z" fill="#F50013" />
							</g>
							<defs>
								<clipPath id="clip0_2045_396">
									<rect width="20" height="20" fill="white" />
								</clipPath>
							</defs>
						</svg>
					</a>
					<a class="linkedin" href="https://www.linkedin.com/in/dmytro-hordiyenko-0b4115232/" target="_blank" rel="noopener noreferrer">
						<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M0 1.4325C0 0.64125 0.6575 0 1.46875 0H18.5312C19.3425 0 20 0.64125 20 1.4325V18.5675C20 19.3588 19.3425 20 18.5312 20H1.46875C0.6575 20 0 19.3588 0 18.5675V1.4325ZM6.17875 16.7425V7.71125H3.1775V16.7425H6.17875ZM4.67875 6.4775C5.725 6.4775 6.37625 5.785 6.37625 4.9175C6.3575 4.03125 5.72625 3.3575 4.69875 3.3575C3.67125 3.3575 3 4.0325 3 4.9175C3 5.785 3.65125 6.4775 4.65875 6.4775H4.67875ZM10.8138 16.7425V11.6988C10.8138 11.4288 10.8337 11.1587 10.9137 10.9663C11.13 10.4275 11.6238 9.86875 12.4538 9.86875C13.54 9.86875 13.9738 10.6963 13.9738 11.9113V16.7425H16.975V11.5625C16.975 8.7875 15.495 7.4975 13.52 7.4975C11.9275 7.4975 11.2137 8.3725 10.8138 8.98875V9.02H10.7937L10.8138 8.98875V7.71125H7.81375C7.85125 8.55875 7.81375 16.7425 7.81375 16.7425H10.8138Z" fill="#F50013" />
						</svg>
					</a>
				</div>
			</nav><!-- #site-navigation -->
		</header><!-- #masthead -->