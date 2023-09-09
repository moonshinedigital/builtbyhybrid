<?php
/**
 * Plugin Name: Moonbase Dashboard
 * Description: Adds a Moonbase metabox to the WordPress dashboard.
 *
 * @package null
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Add the custom metabox to the dashboard.
 */
function custom_dashboard_metabox() {
	wp_add_dashboard_widget(
		'custom_dashboard_widget',
		'Custom Dashboard Widget',
		'custom_dashboard_widget_content'
	);
}

/**
 * Define the content for the custom metabox.
 */
function custom_dashboard_widget_content() {
	// Add your logo image here.
	$logo_url = 'https://placekitten.com/900/300';

	// Heading, subheading, welcome text, and button content.
	$heading        = 'Welcome to the Dashboard!';
	$subheading     = 'Custom Metabox Example';
	$primary_text   = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi mauris ipsum, placerat vel eros non, dignissim placerat metus. Mauris purus diam, pellentesque eu condimentum eu, cursus vel ipsum. Integer pellentesque mi nec tellus suscipit, cursus interdum nibh cursus. Nullam neque nisl.';
	$secondary_text = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi mauris ipsum, placerat vel eros non, dignissim placerat metus. Mauris purus diam, pellentesque eu condimentum eu, cursus vel ipsum. Integer pellentesque mi nec tellus suscipit, cursus interdum nibh cursus. Nullam neque nisl.';
	$button_text    = 'Learn More';

	// Output the metabox content.
	echo '<img src="' . esc_url( $logo_url ) . '" alt="Custom Logo" style="max-width: 100%;" />';
	echo '<h2>' . esc_html( $heading ) . '</h2>';
	echo '<p>' . esc_html( $primary_text ) . '</p>';
	echo '<h3>' . esc_html( $subheading ) . '</h3>';
	echo '<p>' . esc_html( $secondary_text ) . '</p>';
	echo '<a href="#" class="button button-primary">' . esc_html( $button_text ) . '</a>';
}

// Hook the custom metabox function into the dashboard.
add_action( 'wp_dashboard_setup', 'custom_dashboard_metabox' );
