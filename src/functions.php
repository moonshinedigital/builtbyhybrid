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
	 * Sets up theme defaults, registers or removes support for various WordPress features.
	 */
	function mb_setup() {

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );
		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );
		// Output valid HTML5 for search form, comment form, and comments.
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Remove RSD service endpoint.
		remove_action( 'wp_head', 'rsd_link' );
		// Remove Windows Live Writer manifest file.
		remove_action( 'wp_head', 'wlwmanifest_link' );
		// Remove rel links adjacent to the current post.
		remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 );
		// Remove rel=shortlink.
		remove_action( 'wp_head', 'wp_shortlink_wp_head', 10 );
		// Remove generator from XHTML.
		remove_action( 'wp_head', 'wp_generator' );
		// Remove REST API link tag.
		remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
		// Remove oEmbed discovery links.
		remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
		// Remove post canonical link.
		remove_action( 'wp_head', 'rel_canonical', 10 );
		// Disable inline Emoji detection script.
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		// Disable the Emoji-related styles.
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		// Disable filtering the URL where emoji SVG images are hosted.
		add_filter( 'emoji_svg_url', '__return_false' );
		// Don't convert emoji to static images.
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
		// Removes main feed links.
		remove_action( 'wp_head', 'feed_links', 2 );
		// removes extra feeds such as category feeds.
		remove_action( 'wp_head', 'feed_links_extra', 3 );
		// Remove generator from feeds.
		add_filter( 'the_generator', '__return_false' );
		// Disable comments feeds.
		add_filter( 'feed_links_show_comments_feed', '__return_false' ); 
		add_filter( 'show_recent_comments_widget_style', '__return_false' );
		// Don't print the default gallery styles.
		add_filter( 'use_default_gallery_style', '__return_false' );
		// Remove robot inclusion of max-image-preview.
		remove_filter( 'wp_robots', 'wp_robots_max_image_preview_large', 10 );

		// Remove default image sizes.
		remove_image_size( 'medium_large' );
		remove_image_size( '1536x1536' );
		remove_image_size( '2048x2048' );

		// Change default image sizes.
		update_option( 'thumbnail_size_w', 128 );
		update_option( 'thumbnail_size_h', 128 );
		update_option( 'medium_size_w', 768 );
		update_option( 'medium_size_h', 768 );
		update_option( 'large_size_w', 1024 );
		update_option( 'large_size_h', 1024 );

		// Add custom image sizes.
		add_image_size( 'small', 320 );
		add_image_size( 'extra_large', 2048 );

		// Register custom post types.
		require get_template_directory() . '/inc/register-post-types.php';
		// Register custom navigation menus.
		require get_template_directory() . '/inc/register-menus.php';
		// Register custom sidebars.
		require get_template_directory() . '/inc/register-sidebars.php';
	}
}
add_action( 'after_setup_theme', 'mb_setup' );

/**
 * Add custom image sizes to admin.
 * 
 * @param array $sizes image sizes.
 */
function mb_custom_sizes( $sizes ) {
	return array_merge(
		$sizes,
		array(
			'small'       => 'Small',
			'extra_large' => 'Extra Large',
		)
	);
}
add_filter( 'image_size_names_choose', 'mb_custom_sizes' );


// Disable scaled image size.
add_filter( 'big_image_size_threshold', '__return_false' );

/**
 * Enqueue scripts and styles.
 */
function mb_load_assets() {
	wp_enqueue_style( 'style', get_theme_file_uri( '/assets/css/style.css' ), '', '1.0' );
	wp_enqueue_script( 'script', get_theme_file_uri( '/assets/js/main.min.js' ), '', '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'mb_load_assets' );

// Enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/custom-functions.php';
