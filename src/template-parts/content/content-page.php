<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Moonbase
 */

?>

<article <?php post_class( 'prose lg:prose-lg' ); ?>>
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
