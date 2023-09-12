<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Moonbase
 */

?>

<section>

	<div class="page-header">
		<?php if ( is_search() ) : ?>

		<h1 class="page-title">
			Search results for: <span><?php echo get_search_query(); ?></span>
		</h1>

		<?php else : ?>

		<h1 class="page-title">Nothing Found</h1>

		<?php endif; ?>
	</div>

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :
			?>

		<p>Your site is set to show the most recent posts on your homepage, but you haven't published any posts.</p>

		<p>
			<a href="<?php echo esc_url( admin_url( 'edit.php' ) ); ?>">Add or publish posts</a>
		</p>

			<?php
		elseif ( is_search() ) :
			?>

		<p>Your search generated no results. Please try a different search.</p>

			<?php
			get_search_form();
		else :
			?>

		<p>No content matched your request</p>

			<?php
			get_search_form();
		endif;
		?>
	</div>

</section>
