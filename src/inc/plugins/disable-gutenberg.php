<?php
/**
 * Disable gutenberg editor.
 *
 * @package Moonbase
 */

// Disable Gutenburg for posts.
add_filter( 'use_block_editor_for_post', '__return_false', 10 );

// Disable Gutenberg for widgets.
add_filter( 'use_widgets_block_editor', '__return_false', 10 );

/**
 * Remove block css.
 */
function mb_remove_wp_block_files() {
	// Remove CSS on the front end.
	wp_dequeue_style( 'wp-block-library' );
	// Remove Gutenberg theme.
	wp_dequeue_style( 'wp-block-library-theme' );
	// Remove inline global CSS on the front end.
	wp_dequeue_style( 'global-styles' );
} 
add_action( 'wp_enqueue_scripts', 'mb_remove_wp_block_files', 100 );

add_action(
	'wp_footer',
	function () {
		wp_dequeue_style( 'core-block-supports' );
	}
);
