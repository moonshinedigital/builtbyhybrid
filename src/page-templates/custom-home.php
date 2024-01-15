<?php
/**
 * Template Name: Home
 *
 * @package builtbyhybrid
 */

get_header();
?>

<?php get_template_part( 'template-parts/components/hero', 'home' ); ?>

	<?php 
	if ( have_rows( 'module' ) ) :
		while ( have_rows( 'module' ) ) {
			the_row();
			$module = get_row_layout();
			// Load template parts from 'template-parts/components/' directory.
			get_template_part( 'template-parts/components/' . $module );
		}
	endif;
	?>

	<?php
	get_footer();
