<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BuiltByHybrid
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'testimonial prose lg:prose-lg' ); ?>>

		<div>
		<?php the_title( '<h2>Provided by ', '</h2>' ); ?>	
		<?php the_field( 'testimonial' ); ?></div>

		<aside>
			<?php 
			$image = get_field( 'photo' );
			if ( ! empty( $image ) ) : 
				?>
				<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
			<?php endif; ?>
			<blockquote><?php the_field( 'quote' ); ?></blockquote>
		</aside>

</article>
