<?php
/**
 * Plugin Name: Disable WP Metaboxes
 * Description: Removes the default WordPress metaboxes from the Dashboard and from the 'Screen Options' menu.
 *
 * @package null
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Disable metaboxes from WP Dashboard.
 */
function mb_disable_default_dashboard_widgets() {
	// Disable the "Welcome" metabox.
	remove_action( 'welcome_panel', 'wp_welcome_panel' );
	// Disable the "Site Health Status" metabox.
	remove_meta_box( 'dashboard_site_health', 'dashboard', 'normal' );
	// Disable the "At a Glance" metabox.
	remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
	// Disable the "Activity" metabox.
	remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
	// QuickPress.
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
	// WordPress Development Blog Feed.
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
	// Other WordPress News Feed.
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );
	// Popular, New and Recently updated WordPress Plugins.
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
	// Recent Comments.
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'core' );
	// Yoast SEO.
	remove_meta_box( 'wpseo-dashboard-overview', 'dashboard', 'side' );
	// Events Calendar.
	remove_meta_box( 'tribe_dashboard_widget', 'dashboard', 'normal' );
}
add_action( 'wp_dashboard_setup', 'mb_disable_default_dashboard_widgets' );
