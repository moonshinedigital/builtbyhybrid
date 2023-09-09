<?php
/**
 * Plugin Name: Disable Query Strings
 * Description: Removes versioning queries from enqueued scripts and stylesheets.
 *
 * @package null
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Remove query strings.
 */
function remove_query_strings() {
	if ( ! is_admin() ) {
		add_filter( 'script_loader_src', 'remove_query_strings_split', 15 );
		add_filter( 'style_loader_src', 'remove_query_strings_split', 15 );
	}
}

/**
 * Split query strings.
 *
 * @param int $src query break.
 */
function remove_query_strings_split( $src ) {
	$output = preg_split( '/(&ver|\?ver)/', $src );
	return $output[0];
}

add_action( 'init', 'remove_query_strings' );
