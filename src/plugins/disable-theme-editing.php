<?php
/**
 * Plugin Name: Disable File Editing
 * Description: Removes the ability to edit the plugin and theme files from the WordPress admin.
 *
 * @package null
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Disallow editing.
if ( ! defined( 'DISALLOW_FILE_EDIT' ) ) {
	define( 'DISALLOW_FILE_EDIT', true );
}
