<?php
/**
 * Custom functions that clean up unnessacary WordPress injections
 *
 * @package Moonbase
 */

/**
 * Custom cleaner function.
 */
function mb_custom_cleaner() {
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

}
add_action( 'after_setup_theme', 'mb_custom_cleaner' );

/**
 * Keep only specific classes.
 *
 * @param array|string $var List of classes.
 */
function mb_remove_css_attributes( $var ) {
	// Convert to an array if it's a string.
	if ( is_string( $var ) ) {
		$var = explode( ' ', $var );
	}

	// Check if it's the front page or is_home.
	$is_front_page = is_front_page();
	$is_home       = is_home();

	// If it's the front page or is_home, remove the 'page' class.
	if ( $is_front_page || $is_home ) {
		$var = array_diff( $var, array( 'page' ) );
	}

	// Add the classes you want to keep.
	$keep_classes = is_array( $var ) ? array_intersect(
		$var,
		array(
			'home',
			'blog',
			'page',
			'post',
			'single-post',
			'archive',
			'current_page_item',
		)
	) : '';

	return $keep_classes;
}

// Classes in a menu item's list item element.
add_filter( 'nav_menu_css_class', 'mb_remove_css_attributes', 100, 1 );

// IDs in a menu item's list item element.
add_filter( 'nav_menu_item_id', 'mb_remove_css_attributes', 100, 1 );

// Classes for each page item in a list.
add_filter( 'page_css_class', 'mb_remove_css_attributes', 100, 1 );

// Classes in the body.
add_filter( 'body_class', 'mb_remove_css_attributes', 100, 1 );

// Classes in the post.
add_filter( 'post_class', 'mb_remove_css_attributes', 100, 1 );
