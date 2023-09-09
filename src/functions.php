<?php
/**
 * Moonbase functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Moonbase
 */

if ( ! function_exists( 'mb_setup' ) ) {

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function mb_setup() {
		// Make theme available for translation, fill in the /languages/ directory.
		load_theme_textdomain( 'moonbase', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails', array( 'post', 'testimonial' ) ); // Posts only.

		// Output valid HTML5 for search form, comment form, and comments.
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Define thumbnail sizes.
		add_image_size( 'mb_image_square', 650, 650, true );
		add_image_size( 'mb_image_landscape', 1300, 650, true );
		add_image_size( 'mb_image_portrait', 650, 1300, true );
		add_image_size( 'mb_image_huge', 1300, 1300, true );

		// Register custom post types.
		require get_template_directory() . '/inc/post-types.php';
		
		// Register custom navigation menus.
		require get_template_directory() . '/inc/register-menus.php';

		// Register custom sidebars.
		require get_template_directory() . '/inc/register-sidebars.php';
	}
}
add_action( 'after_setup_theme', 'mb_setup' );

/**
 * Enqueue scripts and styles.
 */
function mb_load_assets() {

	// Enqueue theme stylesheet.
	wp_enqueue_style( 'style', get_theme_file_uri( '/assets/css/style.css' ), '', '1.0' );

	// Enqueue theme scripts.
	wp_enqueue_script( 'script', get_theme_file_uri( '/assets/js/main.min.js' ), '', '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'mb_load_assets' );

// Enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

// Custom template tags for the theme.
require get_template_directory() . '/inc/template-tags.php';

// Custom clean up of unnessacary WordPress injections.
require get_template_directory() . '/inc/template-cleaner.php';
