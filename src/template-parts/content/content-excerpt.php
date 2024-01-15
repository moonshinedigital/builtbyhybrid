<?php
/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package builtbyhybrid
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'prose lg:prose-lg' ); ?>>
	<?php the_post_thumbnail(); ?>

		<?php
		if ( is_sticky() && is_home() && ! is_paged() ) {
			echo 'Featured';
		}
		the_title( sprintf( '<h2><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		?>

	<?php the_excerpt(); ?>

</article>
