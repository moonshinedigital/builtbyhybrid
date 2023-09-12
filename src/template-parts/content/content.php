<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Moonbase
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php
		if ( is_sticky() && is_home() && ! is_paged() ) {
			printf( '<span">%s</span>', esc_html_x( 'Featured', 'post', 'moonbase' ) );
		}
		if ( is_singular() ) :
			the_title( '<h2 class="title">', '</h2>' );
		else :
			the_title( sprintf( '<h2 class="title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		endif;
		?>

	<?php the_post_thumbnail(); ?>

		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div>' . __( 'Pages:', 'moonbase' ),
				'after'  => '</div>',
			)
		);
		?>
</article>
