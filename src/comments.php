<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Moonbase
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments">

	<?php if ( have_comments() ) : ?>
		<h2>
		<?php
		$mb_comment_count = get_comments_number();
		if ( '1' === $mb_comment_count ) {
			printf(
				'One comment on &ldquo;%1$s&rdquo;',
				get_the_title()
			);
		} else {
			printf(
				'%1$s comments on &ldquo;%2$s&rdquo;',
				number_format_i18n( $mb_comment_count ),
				get_the_title()
			);
		}
		?>

		</h2>

		<?php the_comments_navigation(); ?>

		<ol>

			<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'callback'   => 'mb_html5_comment',
					'short_ping' => true,
				)
			);
			?>
		</ol>

		<?php
		the_comments_navigation();

		// If there are existing comments, but comments are closed, display a
		// message.
		if ( ! comments_open() ) :
			?>
			<p><?php esc_html( 'Comments are closed.' ); ?></p>
			<?php
		endif;

	endif;

	comment_form();
	?>

</div>
