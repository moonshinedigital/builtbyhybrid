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
		<h1 class="page-title"><?php esc_html_e( 'Page Not Found', 'moonbase' ); ?></h1>
	</div>

	<div class="page-content">
		<p><?php esc_html_e( 'This page could not be found. It might have been removed or renamed, or it may never have existed.', 'moonbase' ); ?>
		</p>
		<?php get_search_form(); ?>
	</div>
</section>

<?php
get_footer();
