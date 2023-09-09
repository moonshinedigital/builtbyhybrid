<?php
/**
 * Template Name: Home
 *
 * @package Moonbase
 */

get_header();
?>

<?php get_template_part( 'template-parts/components/hero', 'home' ); ?>

<?php 
if ( have_rows( 'section' ) ) :
	while ( have_rows( 'section' ) ) {
		the_row();
		$section = get_row_layout();
		// Load template parts from 'template-parts/components/' directory.
		get_template_part( 'template-parts/components/' . $section );
	}
endif;
?>

	<?php
	get_footer();
