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

<?php get_template_part( 'template-parts/components/hero', 'page' ); ?>

	<?php
	if ( have_posts() ) : // Check if there are posts to display.

		/* Start the Loop */
		while ( have_posts() ) :
			the_post();

			if ( ! empty( get_the_content() ) ) { // Check if post content is not empty.
				get_template_part( 'template-parts/content/content', 'page' );
			}

		endwhile; // End of the loop.

	endif; // End of the conditional check for posts.
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
