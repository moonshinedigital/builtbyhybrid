<?php
/**
 * Plugin Name: Disable Admin Bar
 * Description: Disables the 'admin bar' from the WordPress backend and frontend for all users.
 *
 * @package null
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Disable admin bar on front end for all users.
add_filter( 'show_admin_bar', '__return_false' );
