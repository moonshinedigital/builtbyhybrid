<?php
/**
 * Plugin Name: Disable Post Tags
 * Description: Disable the tagging functionality from WordPress posts.
 *
 * @package null
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Remove post tags.
 */
function unregister_post_tags() {
	unregister_taxonomy_for_object_type( 'post_tag', 'post' );
}
add_action( 'init', 'unregister_post_tags' );
