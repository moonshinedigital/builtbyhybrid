<?php
/**
 * Plugin Name: Disable Gutenberg and Blocks
 * Description: Disable Gutenberg, Blocks, Block Editor, Blocks in Widgets, and revert to Classic Editor and Classic Widgets.
 *
 * @package disable-gutenberg-blocks
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Disable Gutenberg Editor.
 */
function disable_gutenberg_editor() {
	// Disable Gutenberg editor for posts and pages.
	add_filter( 'use_block_editor_for_post', '__return_false', 10 );
}

/**
 * Disable Blocks.
 */
function disable_blocks() {
	// Disable block styles.
	wp_dequeue_style( 'wp-block-library' );

	// Disable block library theme.
	wp_dequeue_style( 'wp-block-library-theme' );

	// Disable block editor stylesheet.
	wp_dequeue_style( 'wp-block-editor' );

	// Disable block editor script.
	wp_dequeue_script( 'wp-block-editor' );

	// Disable Gutenberg widgets.
	remove_theme_support( 'widgets-block-editor' );
}

/**
 * Revert to Classic Editor.
 */
function revert_to_classic_editor() {
	// Revert to the classic editor for posts.
	add_filter( 'classic-editor-replace', '__return_true' );

	// Hide the 'Try Gutenberg' callout.
	add_filter( 'try_gutenberg_panel', '__return_false' );
}

/**
 * Disable Blocks in Widgets.
 */
function disable_blocks_in_widgets() {
	// Disable blocks in widgets.
	unregister_block_type( 'core/archives' );
	unregister_block_type( 'core/categories' );
	unregister_block_type( 'core/latest-comments' );
	unregister_block_type( 'core/latest-posts' );
	unregister_block_type( 'core/calendar' );
	unregister_block_type( 'core/rss' );
	unregister_block_type( 'core/tag-cloud' );
}

/**
 * Use Classic Widgets.
 */
function use_classic_widgets() {
	// Enable classic widgets.
	add_filter( 'use_widgets_block_editor', '__return_false' );
}

// Hook functions to WordPress actions.
add_action( 'init', 'disable_gutenberg_editor' );
add_action( 'wp_enqueue_scripts', 'disable_blocks' );
add_action( 'admin_init', 'revert_to_classic_editor' );
add_action( 'widgets_init', 'disable_blocks_in_widgets' );
add_action( 'admin_init', 'use_classic_widgets' );
