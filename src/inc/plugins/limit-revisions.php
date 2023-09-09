<?php
/**
 * Limit revision capabilities.
 *
 * @package Moonbase
 */

if ( ! defined( 'AUTOSAVE_INTERVAL' ) ) {
	// Change 5 to the number of minutes you want to use.
	define( 'AUTOSAVE_INTERVAL', 10 * MINUTE_IN_SECONDS );
}

add_filter(
	'wp_revisions_to_keep',
	function( $limit ) {
		// Limit to the last 20 revisions. Change 20 to whatever limit you want.
		return 0;
	} 
);

/**
 * Disable autosave.
 */
function mb_disable_autosave() {
	wp_deregister_script( 'autosave' );
}
add_action( 'admin_init', 'mb_disable_autosave' );
