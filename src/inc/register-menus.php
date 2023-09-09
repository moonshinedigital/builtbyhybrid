<?php
/**
 * Register navigation menues
 *
 * @link https://developer.wordpress.org/plugins/metadata/custom-meta-boxes/
 *
 * @package Moonbase
 */

register_nav_menus(
	array(
		'primary_menu' => __( 'Primary', 'moonbase' ),
	)
);

/**
 * Create a fallback menu must be added to fallback_cb on menu calls.
 */
function mb_default_menu() {
	// Needs to be wrapped in a ul.
	wp_list_pages(
		array(
			'title_li' => '',
			'depth'    => 1,
		)
	);
}
