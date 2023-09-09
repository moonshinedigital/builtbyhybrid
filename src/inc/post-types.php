<?php
/**
 * Custom post types
 *
 * @link https://developer.wordpress.org/themes/basics/post-types/
 *
 * @package Moonbase
 */

/**
 * Register custom post types.
 */
function mb_custom_post_type() {
	register_post_type(
		'testimonial',
		array(
			'labels'            => array(
				'name'                     => 'Testimonials',
				'singular_name'            => 'Testimonial',
				'menu_name'                => 'Testimonials',
				'all_items'                => 'All Testimonials',
				'edit_item'                => 'Edit Testimonial',
				'view_item'                => 'View Testimonial',
				'view_items'               => 'View Testimonials',
				'add_new_item'             => 'Add New Testimonial',
				'new_item'                 => 'New Testimonial',
				'parent_item_colon'        => 'Parent Testimonial:',
				'search_items'             => 'Search Testimonials',
				'not_found'                => 'No testimonials found',
				'not_found_in_trash'       => 'No testimonials found in Trash',
				'archives'                 => 'Testimonial Archives',
				'attributes'               => 'Testimonial Attributes',
				'featured_image'           => 'Client photo',
				'set_featured_image'       => 'Add client photo',
				'remove_featured_image'    => 'Remove client photo',
				'use_featured_image'       => 'Use client photo',
				'insert_into_item'         => 'Insert into testimonial',
				'uploaded_to_this_item'    => 'Uploaded to this testimonial',
				'filter_items_list'        => 'Filter testimonials list',
				'filter_by_date'           => 'Filter testimonials by date',
				'items_list_navigation'    => 'Testimonials list navigation',
				'items_list'               => 'Testimonials list',
				'item_published'           => 'Testimonial published.',
				'item_published_privately' => 'Testimonial published privately.',
				'item_reverted_to_draft'   => 'Testimonial reverted to draft.',
				'item_scheduled'           => 'Testimonial scheduled.',
				'item_updated'             => 'Testimonial updated.',
				'item_link'                => 'Testimonial Link',
				'item_link_description'    => 'A link to a testimonial.',
			),
			'description'       => 'Add client testimonials and stories',
			'public'            => true,
			'show_in_nav_menus' => true,
			'show_in_rest'      => true,
			'menu_position'     => 5,
			'menu_icon'         => 'dashicons-format-quote',
			'map_meta_cap'      => true,
			'supports'          => array(
				0 => 'title',
				1 => 'editor',
				2 => 'thumbnail',
			),
			'delete_with_user'  => false,
		) 
	);
}

add_action( 'init', 'mb_custom_post_type' );
