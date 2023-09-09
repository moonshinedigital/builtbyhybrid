<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Moonbase
 */

get_header();
?>

<?php get_template_part( 'template-parts/components/hero', 'home' ); ?>

	<?php

	/* Start the Loop */
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content/content', 'page' );

		// If comments are open, or we have at least one comment, load
		// the comment template.
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}

	endwhile; // End of the loop.
	?>

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
