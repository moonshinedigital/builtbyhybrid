<?php
/**
 * Plugin Name: Redirect Search If Single Post
 * Description: Redirect to post if there is a single one that matching search term.
 *
 * @package null
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Redirect if only one post returned.
 */
function single_search_redirect() {
	if ( is_search() ) {
		global $wp_query;

		if ( 1 === $wp_query->post_count ) {
			wp_safe_redirect( get_permalink( $wp_query->posts[0]->ID ) );
			exit;
		}
	}
}
add_action( 'template_redirect', 'single_search_redirect' );
