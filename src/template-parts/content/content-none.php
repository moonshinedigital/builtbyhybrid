<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package builtbyhybrid
 */

?>

<article <?php post_class( 'prose lg:prose-lg' ); ?>>
	<?php if ( is_search() ) : ?>
	<h1>Search results for: <span><?php echo get_search_query(); ?></span></h1>
	<?php else : ?>
	<h1>Nothing Found</h1>
	<?php endif; ?>

	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
	<p>Your site is set to show the most recent posts on your homepage, but you haven't published any posts.</p>
	<div><a href="<?php echo esc_url( admin_url( 'edit.php' ) ); ?>">Add or publish posts</a></div>

	<?php elseif ( is_search() ) : ?>
	<p>Your search generated no results. Please try a different search.</p>
	<?php get_search_form(); else : ?>
	<p>No content matched your request</p>

		<?php 
		get_search_form();
endif; 
	?>
</article>
