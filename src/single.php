<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package builtbyhybrid
 */

get_header();
?>

<section>
	<?php
	/* Start the Loop */
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content/content', 'single' );

		if ( is_singular( 'post' ) ) {
			// Previous/next post navigation.
			the_post_navigation(
				array(
					'next_text' => '<span aria-hidden="true">Next Post</span> ' .
						'<span class="sr-only">Next post:</span> <br/>' .
						'<span>%title</span>',
					'prev_text' => '<span aria-hidden="true">Previous Post</span> ' .
						'<span class="sr-only">Previous post:</span> <br/>' .
						'<span>%title</span>',
				)
			);
		}

		// End the loop.
	endwhile;
	?>
</section>
<?php
get_footer();
