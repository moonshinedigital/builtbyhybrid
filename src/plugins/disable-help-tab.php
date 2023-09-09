<?php
/**
 * Plugin Name: Disable 'Help' Tabs
 * Description: Remove contextual 'Help' tabs from all admin screens.
 *
 * @package null
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Add a filter to remove contextual help tabs.
add_filter( 'contextual_help_list', 'contextual_help_list_remove' );

/**
 * Remove contextual help tabs from the current admin screen.
 */
function contextual_help_list_remove() {
	global $current_screen;
	$current_screen->remove_help_tabs();
}
