<?php
/**
 * Additional functions which enhance the theme by hooking into WordPress
 *
 * @package builtbyhybrid
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
			'error404',
			'error-page',
			'prose',
			'lg:prose-lg',
			'testimonials',
			'testimonials-template-default',
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

/**
 * Remove 'Post' functionality from WordPress admin.
 *
 * Hooked to 'admin_menu' action hook.
 */
add_action( 'admin_menu', 'mb_custom_remove_post_functionality' );

/**
 * Remove 'Posts' menu and submenu items.
 */
function mb_custom_remove_post_functionality() {
	// Remove the 'Posts' menu item.
	remove_menu_page( 'edit.php' );

	// Remove the 'Add New Post' submenu item.
	remove_submenu_page( 'edit.php', 'post-new.php' );
}

/**
 * Redirect to dashboard if trying to access 'Post' related pages.
 *
 * Hooked to 'admin_init' action hook.
 */
add_action( 'admin_init', 'mb_custom_restrict_admin_with_redirect' );

/**
 * Perform redirect to dashboard for 'Post' related admin pages.
 */
function mb_custom_restrict_admin_with_redirect() {
	global $pagenow;

	// Nonce verification.
	if ( ! isset( $_REQUEST['_wpnonce'] ) || ! wp_verify_nonce( $_REQUEST['_wpnonce'], 'custom_redirect' ) ) {
		return;
	}

	// Check if current admin page is related to 'Posts'.
	if ( 'edit.php' === $pagenow && ( isset( $_GET['post_type'] ) && 'post' === $_GET['post_type'] ) ) {
		wp_safe_redirect( admin_url(), 302, 'WordPress' );
		exit();
	} elseif ( 'post-new.php' === $pagenow && ! isset( $_GET['post_type'] ) ) {
		wp_safe_redirect( admin_url(), 302, 'WordPress' );
		exit();
	}
}

/**
 * Move 'Media' menu.
 *
 * @param array $menu_order The existing menu order.
 * @return array The modified menu order.
 */
function mb_move_media_menu_to_position( $menu_order ) {
	// Identify the index of 'upload.php' (Media).
	$media_index = array_search( 'upload.php', $menu_order, true );

	// Remove 'upload.php' from its current position.
	if ( false !== $media_index ) {
		unset( $menu_order[ $media_index ] );
	}

	// Insert 'upload.php'.
	$menu_order = array_values( $menu_order ); // Re-index array.
	array_splice( $menu_order, 4, 0, 'upload.php' ); // Insert at new (0-based index).

	return $menu_order;
}

/**
 * Reorder the 'Media' menu item.
 *
 * Hooked to 'custom_menu_order' and 'menu_order' action hooks.
 */
add_filter( 'custom_menu_order', '__return_true' );
add_filter( 'menu_order', 'mb_move_media_menu_to_position' );

// Disable Contact Form 7 style and javascript.
add_filter( 'wpcf7_load_js', '__return_false' );
add_filter( 'wpcf7_load_css', '__return_false' );
add_filter( 'wpcf7_autop_or_not', '__return_false' );
add_filter(
	'wpcf7_form_elements',
	function( $content ) {
		// $content = preg_replace( '/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content );
		$content = str_replace( '<br />', '', $content );
		
		return $content;
	}
);
