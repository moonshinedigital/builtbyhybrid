<?php
/**
 * Register sidebar areas
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @package Moonbase
 */

/**
 * Register widget area.
 */
function mb_widgets_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'moonbase' ),
			'id'            => 'footer-widgets',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'moonbase' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'mb_widgets_init' );
