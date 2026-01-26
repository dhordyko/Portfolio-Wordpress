<?php

/**
 * Portfolio Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Portfolio_Theme
 */

if (! defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function portfolio_theme_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Portfolio Theme, use a find and replace
		* to change 'portfolio_theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('portfolio_theme', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'portfolio_theme'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'portfolio_theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	// Add support for editor styles.
	add_theme_support( 'editor-styles' );
	add_editor_style( 'editor-styles.css' );
}
add_action('after_setup_theme', 'portfolio_theme_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function portfolio_theme_content_width()
{
	$GLOBALS['content_width'] = apply_filters('portfolio_theme_content_width', 640);
}
add_action('after_setup_theme', 'portfolio_theme_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function portfolio_theme_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'portfolio_theme'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'portfolio_theme'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'portfolio_theme_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function portfolio_theme_scripts()
{
	wp_enqueue_style('portfolio_theme-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('portfolio_theme-style', 'rtl', 'replace');

	// Enqueue bundled styles from custom.js imports (Swiper, AOS, GLightbox, etc.)
	wp_enqueue_style('portfolio_theme-custom-styles', get_template_directory_uri() . '/js/dist/custom.css', array(), _S_VERSION);

	wp_enqueue_script('portfolio_theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	wp_enqueue_script('portfolio_theme-custom', get_template_directory_uri() . '/js/dist/custom.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'portfolio_theme_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}


/**
 * Adding fonts to the theme directory
 * 
 */
function gamestore_google_font()
{
	$fonturl = '';
	$font = 'Urbanist';
	$font_extra = 'ital,wght@0,400;0,700;1,400;1,700';

	if ('off' !== _x('on', 'Google font: on or off', 'gamestore')) {
		$query_args = array(
			'family' => urldecode($font . ':' . $font_extra),
			'subset' => urldecode('latin, latin-ext'),
			'display' => urldecode('swap')
		);
		$font_url = add_query_arg($query_args, '//fonts.googleapis.com/css2');
	}

	return $font_url;
}
function gamestore_google_font_scripts()
{
	wp_enqueue_style('gamesotre-google-font', gamestore_google_font(), [], '1.0.0');
}
add_action('wp_enqueue_scripts', 'gamestore_google_font_scripts');

add_action('after_setup_theme', function () {
	add_theme_support('editor-styles');
	add_editor_style('editor-style.css');
});
