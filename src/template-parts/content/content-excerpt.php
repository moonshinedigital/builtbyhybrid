<?php
/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Moonbase
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php
		if ( is_sticky() && is_home() && ! is_paged() ) {
			echo 'Featured';
		}
		the_title( sprintf( '<h2 class="title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		?>

	<?php the_post_thumbnail(); ?>
	<?php the_excerpt(); ?>

</div>
