<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Moonbase
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
					'next_text' => '<span aria-hidden="true">' . __( 'Next Post', 'moonbase' ) . '</span> ' .
					'<span class="sr-only">' . __( 'Next post:', 'moonbase' ) . '</span> <br/>' .
					'<span>%title</span>',
					'prev_text' => '<span aria-hidden="true">' . __( 'Previous Post', 'moonbase' ) . '</span> ' .
					'<span class="sr-only">' . __( 'Previous post:', 'moonbase' ) . '</span> <br/>' .
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
