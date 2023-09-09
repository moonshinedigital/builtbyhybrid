<?php
/**
 * Plugin Name: Customise Specific Moonbase Plugins
 * Description: Customise specific settings for plugins used by Moonbase.
 *
 * @package null
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Disable Plugin Updates.
 *
 * @param init $value Get value.
 */
function disable_plugin_updates( $value ) {
	if ( isset( $value ) && is_object( $value ) ) {
		if ( isset( $value->response['advanced-custom-fields-pro/acf.php'] ) ) {
			unset( $value->response['advanced-custom-fields-pro/acf.php'] );
		}
		if ( isset( $value->response['soliloquy/soliloquy.php'] ) ) {
			unset( $value->response['soliloquy/soliloquy.php'] );
		}
	}
	return $value;
}
add_filter( 'site_transient_update_plugins', 'disable_plugin_updates' );

/**
 * Remove no license notices.
 */
function remove_no_license_notice() {
	echo '<script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".error:contains(\'No valid license key has been entered\')").hide();
        });
    </script>';
}
add_action( 'admin_head', 'remove_no_license_notice' );

/**
 * Whitelabel Soliloquy.
 */
function soliloquy_whitelabel_icon() {
	echo '<style>
        #adminmenu #menu-posts-soliloquy .wp-menu-image.dashicons-before img {
            display: none;
        }
        #adminmenu #menu-posts-soliloquy .wp-menu-image.dashicons-before:before {
            content: "\\f169";
        }
        img.soliloquy-item-img {
            display:none;
        }
        #soliloquy-header {
            display:none;
        }
    </style>';
}
add_action( 'admin_head', 'soliloquy_whitelabel_icon' );

/**
 * Function to replace Soliloquy text.
 *
 * @param string $translated_text Translated text.
 * @param string $source_text Source text.
 * @param string $domain Text domain.
 * @return string Modified text.
 */
function soliloquy_whitelabel( $translated_text, $source_text, $domain ) {

	// If not in the admin, return the default string.
	if ( ! is_admin() ) {
		return $translated_text;
	}

	// Replace Soliloquy text with Slider.
	$replacements = array(
		'Soliloquy Slider'  => 'Slider',
		'Soliloquy Sliders' => 'Sliders',
		'Soliloquy slider'  => 'slider',
		'Soliloquy'         => 'Slider',
	);

	return str_replace( array_keys( $replacements ), array_values( $replacements ), $translated_text );
}
add_filter( 'gettext', 'soliloquy_whitelabel', 10, 3 );
