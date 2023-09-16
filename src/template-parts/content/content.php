<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Moonbase
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'prose lg:prose-lg' ); ?>>
	<?php the_post_thumbnail(); ?>

		<?php 
		if ( is_sticky() && is_home() && ! is_paged() ) {
			echo '<span>Featured</span>';
		}
		if ( is_singular() ) :
			the_title( '<h2>', '</h2>' );
		else :
			the_title( sprintf( '<h2><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		endif;
		?>

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
