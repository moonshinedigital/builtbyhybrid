<?php
/**
 * Plugin Name: Disable Image Variations
 * Description: Stops generating multiple sizes for uploaded images.
 *
 * @package null
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Disable generated image sizes.
 *
 * @param int $sizes Image sizes.
 */
function disable_image_sizes( $sizes ) {
	unset( $sizes['thumbnail'] ); // disable thumbnail size.
	unset( $sizes['medium'] ); // disable medium size.
	unset( $sizes['large'] ); // disable large size.
	unset( $sizes['medium_large'] ); // disable medium-large size.
	unset( $sizes['1536x1536'] ); // disable 2x medium-large size.
	unset( $sizes['2048x2048'] ); // disable 2x large size.

	return $sizes;
}
add_action( 'intermediate_image_sizes_advanced', 'disable_image_sizes' );

// Disable scaled image size.
add_filter( 'big_image_size_threshold', '__return_false' );
