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
				'Continue reading<span class="sr-only"> "%s"</span>',
				get_the_title()
			)
		);

		wp_link_pages(
			array(
				'before' => '<div>Pages:',
				'after'  => '</div>',
			)
		);
		?>

</article>
