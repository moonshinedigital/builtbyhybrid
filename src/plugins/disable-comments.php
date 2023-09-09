<?php
/**
 * Plugin Name: Disable Comments
 * Description: Disable comment functionality and remove all related admin elements.
 *
 * @package null
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Disable comment functionality.
 */
add_action(
	'admin_init',
	function () {
		global $pagenow;

		// Use Yoda Condition checks.
		if ( 'edit-comments.php' === $pagenow || 'options-discussion.php' === $pagenow ) {
			// Use wp_safe_redirect() to avoid malicious redirects.
			wp_safe_redirect( admin_url() );
			exit; // Always call exit() after a redirect.
		}

		// Remove comments metabox from dashboard.
		remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );

		// Disable support for comments and trackbacks in post types.
		foreach ( get_post_types() as $post_type ) {
			if ( post_type_supports( $post_type, 'comments' ) ) {
				remove_post_type_support( $post_type, 'comments' );
				remove_post_type_support( $post_type, 'trackbacks' );
			}
		}
	}
);

// Close comments on the front-end.
add_filter( 'comments_open', '__return_false', 20, 2 );
add_filter( 'pings_open', '__return_false', 20, 2 );

// Hide existing comments.
add_filter( 'comments_array', '__return_empty_array', 10, 2 );

// Remove comments page in menu.
add_action(
	'admin_menu',
	function () {
		remove_menu_page( 'edit-comments.php' );
		remove_submenu_page( 'options-general.php', 'options-discussion.php' );
	}
);

// Remove comments links from admin bar.
add_action(
	'init',
	function () {
		if ( is_admin_bar_showing() ) {
			remove_action( 'admin_bar_menu', 'wp_admin_bar_comments_menu', 60 );
		}
	}
);

// Remove comments icon from admin bar.
add_action(
	'wp_before_admin_bar_render',
	function () {
		global $wp_admin_bar;
		$wp_admin_bar->remove_menu( 'comments' );
	}
);

// Remove queries on wp_comments.
add_action(
	'init',
	function () {
		if ( is_admin() ) {
			// Stop queries to count comments, which are called when the admin menu is displayed.
			add_filter(
				'wp_count_comments',
				function () {
					return (object) array(
						'approved'       => 0,
						'moderated'      => 0,
						'spam'           => 0,
						'trash'          => 0,
						'post-trashed'   => 0,
						'total_comments' => 0,
						'all'            => 0,
					);
				}
			);
		}
	}
);

/**
 * Return a comment count of zero to hide existing comment entry link.
 *
 * @param int $count Comment count.
 * @return int
 */
function zero_comment_count( $count ) {
	return 0;
}
add_filter( 'get_comments_number', 'zero_comment_count' );

/**
 * Multiside: Remove manage comments from the admin bar.
 *
 * @param WP_Admin_Bar $bar WordPress admin bar.
 */
function remove_toolbar_items( $bar ) {
	$sites = get_blogs_of_user( get_current_user_id() );
	foreach ( $sites as $site ) {
		$bar->remove_node( "blog-{$site->userblog_id}-c" );
	}
}
add_action( 'admin_bar_menu', 'remove_toolbar_items', PHP_INT_MAX - 1 );
