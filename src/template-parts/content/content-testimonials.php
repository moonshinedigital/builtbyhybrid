<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package builtbyhybrid
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'testimonial prose lg:prose-lg' ); ?>>

		<div>
		<?php the_title( '<h2>', '</h2>' ); ?>	
		<?php the_field( 'testimonial' ); ?></div>

</article>
