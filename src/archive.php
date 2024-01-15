<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BuiltByHybrid
 */

get_header();
?>

<section>

	<?php if ( have_posts() ) : ?>

		<?php the_archive_title( '<h1>', '</h1>' ); ?>

		<?php
		// Start the Loop.
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content/content', 'excerpt' );

			// End the loop.
		endwhile;

	else :

		// If no content, include the "No posts found" template.
		get_template_part( 'template-parts/content/content', 'none' );

	endif;
	?>

</section>
<?php
get_footer();
