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
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'portfolio_theme'); ?></a>

		<header id="masthead" class="site-header">


			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e('Primary Menu', 'portfolio_theme'); ?></button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					)
				);
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