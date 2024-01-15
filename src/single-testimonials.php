<?php
/**
 * The template single testimonials
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package BuiltByHybrid
 */

get_header();
?>

	<?php
	/* Start the Loop */
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/components/hero', 'testimonials' );
		get_template_part( 'template-parts/content/content', 'testimonials' );

		// End the loop.
	endwhile;
	?>
<?php
get_footer();
