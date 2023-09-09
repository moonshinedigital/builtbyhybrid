<?php
/**
 * Plugin Name: Custom Footer Text
 * Description: Replaces the WordPress credit text in the footer with custom text.
 *
 * @package null
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Replace footer content.
 */
function custom_footer() { ?>
	<span>Powered by <a href="https://www.moonshine.com.au" target="_blank" rel="noopener">Moonshine</a>.</span>
	<?php
};
add_action( 'admin_footer_text', 'custom_footer' );

/**
 * Remove footer version number.
 */
function custom_footer_version() {
	remove_filter( 'update_footer', 'core_update_footer' );
}

add_action( 'admin_menu', 'custom_footer_version' );
