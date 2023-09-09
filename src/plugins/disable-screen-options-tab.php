<?php
/**
 * Plugin Name: Disable 'Screen Options' Tabs
 * Description: Removes contextual 'Screen Options' tabs from all admin screens.
 *
 * @package null
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Hide 'Screen Options' tab.
add_filter( 'screen_options_show_screen', '__return_false' );
