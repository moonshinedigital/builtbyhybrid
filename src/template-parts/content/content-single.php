<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Moonbase
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php the_title( '<h2 class="title">', '</h2>' ); ?>

		<?php the_post_thumbnail(); ?>

		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers. */
					__( 'Continue reading<span class="sr-only"> "%s"</span>', 'moonbase' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);

		wp_link_pages(
			array(
				'before' => '<div>' . __( 'Pages:', 'moonbase' ),
				'after'  => '</div>',
			)
		);
		?>

</article>
