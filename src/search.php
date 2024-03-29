<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package builtbyhybrid
 */

get_header();
?>

<section>
	<article class="prose lg:prose-lg">
	<?php if ( have_posts() ) : ?>

		<?php
		printf(
			'<h2>%1$s <span>%2$s</span></h2>',
			'Search results for:',
			get_search_query()
		);
		?>

		<?php
		// Start the Loop.
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content/content', 'excerpt' );

			// End the loop.
		endwhile;

	else :

		// If no content is found, get the `content-none` template part.
		get_template_part( 'template-parts/content/content', 'none' );

	endif;
	?>
	</article>
</section>

<?php
get_footer();
