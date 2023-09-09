<?php
/**
 * Plugin Name: Clean Filenames
 * Description: Sanitizes file names for any uploaded files.
 *
 * @package null
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Remove accents from filenames.
add_filter( 'sanitize_file_name', 'remove_accents' );

// Convert filename to lowercase.
add_filter( 'sanitize_file_name', 'mb_strtolower' );
