<?php
/**
 * Plugin Name: Auto-Update WordPress
 * Description: Automatically updates WordPress.
 *
 * @package null
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Enable minor core updates.
add_filter( 'allow_minor_auto_core_updates', '__return_true' );

// Enable major core updates.
add_filter( 'allow_major_auto_core_updates', '__return_true' );

// Enable plugins to automatically update.
add_filter( 'auto_update_plugin', '__return_true' );

// Enable themes to automatically update.
add_filter( 'auto_update_theme', '__return_true' );

// Disable core update emails.
add_filter( 'auto_core_update_send_email', '__return_false' );

// Disable plugin update emails.
add_filter( 'auto_plugin_update_send_email', '__return_false' );

// Disable theme update emails.
add_filter( 'auto_theme_update_send_email', '__return_false' );

/**
 * Hide dashboard update notifications for all users.
 */
function hide_update_nag() {
	remove_action( 'admin_notices', 'update_nag', 3 );
	remove_action( 'admin_notices', 'display_admin_notice', 3 );
}

add_action( 'admin_menu', 'hide_update_nag' );
