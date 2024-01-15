<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BuiltByHybrid
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'prose lg:prose-lg' ); ?>>
		<?php the_post_thumbnail(); ?>

		<?php the_title( '<h2>', '</h2>' ); ?>

		<?php 
		the_content();

		wp_link_pages(
			array(
				'before' => '<div>Pages:',
				'after'  => '</div>',
			)
		);
		?>
</article>
