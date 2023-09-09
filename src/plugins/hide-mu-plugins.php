<?php
/**
 * Plugin Name: Hide 'Must Use' Plugins
 * Description: Hides all the 'must use' plugins from plugins list.
 *
 * @package null
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Hide plugin list.
 *
 * @param int $views defined views.
 */
function ms_remove_mu_plugins( $views ) {
	if ( isset( $views['mustuse'] ) ) {
		unset( $views['mustuse'] );
	}
	return $views;
}
add_filter( 'views_plugins', 'ms_remove_mu_plugins' );
