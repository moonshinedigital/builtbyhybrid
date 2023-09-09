<?php
/**
 * Plugin Name: Custom Admin Styles
 * Description: Injects custom styles into the admin which can be used to style the entire WordPress admin area.
 *
 * @package null
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Inject custom styles.
 */
function custom_styles() { ?>
	<style>
		/* Hide the empty state for dashboard metaboxes. */
		#dashboard-widgets .empty-container{
			display: none;
		}
	</style>
	<?php
};
add_action( 'admin_head', 'custom_styles' );
