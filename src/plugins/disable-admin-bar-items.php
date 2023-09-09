<?php
/**
 * Plugin Name: Disable Admin Bar Items
 * Description: Hides specific items from the admin bar like the WP logo.
 *
 * @package null
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Remove and rename specific nodes.
 */
function remove_admin_wplogo() {
	global $wp_admin_bar;

	// Remove the nodes you want to remove.
	$wp_admin_bar->remove_node( 'wp-logo' );
	$wp_admin_bar->remove_node( 'view-site' );
	$wp_admin_bar->remove_node( 'comments' );
	$wp_admin_bar->remove_node( 'comments' );
	$wp_admin_bar->remove_node( 'new-media' );
	$wp_admin_bar->remove_node( 'new-user' );

	// Rename site-name.
	$wp_admin_bar->add_node(
		array(
			'id'    => 'site-name',
			'title' => 'View Website',
		)
	);
}

add_action( 'admin_bar_menu', 'remove_admin_wplogo', 100 );
