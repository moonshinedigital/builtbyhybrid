<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Moonbase
 */

get_header();
?>

<section>

	<div class="page-header">
		<h1 class="page-title"><?php esc_html( 'Page Not Found' ); ?></h1>
	</div>

	<div class="page-content">
		<p><?php esc_html( 'This page could not be found. It might have been removed or renamed, or it may never have existed.' ); ?>
		</p>
		<?php get_search_form(); ?>
	</div>
</section>

<?php
get_footer();
