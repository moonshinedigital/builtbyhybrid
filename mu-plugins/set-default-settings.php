<?php
/**
 * Plugin Name: Set Default Settings
 * Description: Automatically configure WordPress settings.
 *
 * @package null
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * General Settings.
 */
function set_default_general_settings() {
	// Membership registration.
	update_option( 'users_can_register', 0 );

	// Timezone.
	update_option( 'timezone_string', 'Australia/Melbourne' );

	// Date Format.
	update_option( 'date_format', 'd/m/Y' );

	// Time Format.
	update_option( 'time_format', 'g:i a' );

	// Week starts on Monday.
	update_option( 'start_of_week', 1 );
}
// Run this function only on plugin activation.
register_activation_hook( __FILE__, 'set_default_general_settings' );

/**
 * Media Settings.
 */
function set_default_media_settings() {
	// Organize into month and year folders (Disabled).
	update_option( 'uploads_use_yearmonth_folders', 0 );

	// Crop thumbnail to exact dimensions (Disabled).
	update_option( 'thumbnail_crop', 0 );

	// Thumbnail size.
	update_option( 'thumbnail_size_w', 0 );
	update_option( 'thumbnail_size_h', 0 );

	// Medium size.
	update_option( 'medium_size_w', 0 );
	update_option( 'medium_size_h', 0 );

	// Large size.
	update_option( 'large_size_w', 0 );
	update_option( 'large_size_h', 0 );
}
// Run this function only on plugin activation.
register_activation_hook( __FILE__, 'set_default_media_settings' );

/**
 * Permalink Settings.
 */
function set_default_permalinks_settings() {

	// Permalink structure.
	update_option( 'permalink_structure', '/%postname%/' );
}
// Run this function only on plugin activation.
register_activation_hook( __FILE__, 'set_default_permalinks_settings' );
