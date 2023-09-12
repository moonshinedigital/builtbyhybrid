<?php
/**
 * Additional functions which enhance the theme by hooking into WordPress
 *
 * @package Moonbase
 */

/**
 * Create custom tinymce toolbar.
 * 
 * @param var $toolbars toolbar object.
 */
function mb_toolbars( $toolbars ) {

	// Add a new toolbar called "Very Simple".
	$toolbars['Very Simple'][1] = array(
		'bold',
		'italic',
		'bullist',
		'numlist',
		'link',
		'unlink',
		'removeformat',
	);

	// return $toolbars - IMPORTANT!
	return $toolbars;
}
add_filter( 'acf/fields/wysiwyg/toolbars', 'mb_toolbars' );

/**
 * Resize the ACF Editor.
 */
function mb_custom_admin_css() {
	echo '<style>
		.acf-editor-wrap iframe {			
			max-height: 200px;
		}
	</style>
';
}
add_action( 'admin_head', 'mb_custom_admin_css' );

/**
 * Clean classes, keeping only specific ones.
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
			'prose',
			'lg:prose-lg',
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

/**
 * Redirect attachment permalinks.
 */
function mb_redirect_attachment_page() {
	if ( is_attachment() ) {
		global $post;
		if ( $post && $post->post_parent ) {
			wp_safe_redirect( esc_url( get_permalink( $post->post_parent ) ), 301 );
			exit;
		} else {
			wp_safe_redirect( esc_url( home_url( '/' ) ), 301 );
			exit;
		}
	}
}
add_action( 'template_redirect', 'mb_redirect_attachment_page' );
