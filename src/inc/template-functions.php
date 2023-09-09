<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Moonbase
 */

/**
 * Changes comment form default fields.
 *
 * @param array $defaults The default comment form arguments.
 *
 * @return array Returns the modified fields.
 */
function mb_comment_form_defaults( $defaults ) {
	$comment_field = $defaults['comment_field'];

	// Adjust height of comment form.
	$defaults['comment_field'] = preg_replace( '/rows="\d+"/', 'rows="5"', $comment_field );

	return $defaults;
}
add_filter( 'comment_form_defaults', 'mb_comment_form_defaults' );

/**
 * Filters the default archive titles.
 */
function mb_get_the_archive_title() {
	if ( is_category() ) {
		$title = __( 'Category Archives: ', 'moonbase' ) . '<span>' . single_term_title( '', false ) . '</span>';
	} elseif ( is_tag() ) {
		$title = __( 'Tag Archives: ', 'moonbase' ) . '<span>' . single_term_title( '', false ) . '</span>';
	} elseif ( is_author() ) {
		$title = __( 'Author Archives: ', 'moonbase' ) . '<span>' . get_the_author_meta( 'display_name' ) . '</span>';
	} elseif ( is_year() ) {
		$title = __( 'Yearly Archives: ', 'moonbase' ) . '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'moonbase' ) ) . '</span>';
	} elseif ( is_month() ) {
		$title = __( 'Monthly Archives: ', 'moonbase' ) . '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'moonbase' ) ) . '</span>';
	} elseif ( is_day() ) {
		$title = __( 'Daily Archives: ', 'moonbase' ) . '<span>' . get_the_date() . '</span>';
	} elseif ( is_post_type_archive() ) {
		$cpt   = get_post_type_object( get_queried_object()->name );
		$title = sprintf(
		/* translators: %s: Post type singular name */
			esc_html__( '%s Archives', 'moonbase' ),
			$cpt->labels->singular_name
		);
	} elseif ( is_tax() ) {
		$tax   = get_taxonomy( get_queried_object()->taxonomy );
		$title = sprintf(
		/* translators: %s: Taxonomy singular name */
			esc_html__( '%s Archives', 'moonbase' ),
			$tax->labels->singular_name
		);
	} else {
		$title = __( 'Archives:', 'moonbase' );
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'mb_get_the_archive_title' );

/**
 * Determines whether the post thumbnail can be displayed.
 */
function mb_can_show_post_thumbnail() {
	return apply_filters( 'mb_can_show_post_thumbnail', ! post_password_required() && ! is_attachment() && has_post_thumbnail() );
}

/**
 * Returns the size for avatars used in the theme.
 */
function mb_get_avatar_size() {
	return 60;
}

/**
 * Create the continue reading link
 *
 * @param string $more_string The string shown within the more link.
 */
function mb_continue_reading_link( $more_string ) {

	if ( ! is_admin() ) {
		$continue_reading = sprintf(
			/* translators: %s: Name of current post. */
			wp_kses( __( 'Continue reading %s', 'moonbase' ), array( 'span' => array( 'class' => array() ) ) ),
			the_title( '<span class="sr-only">"', '"</span>', false )
		);

		$more_string = '<a href="' . esc_url( get_permalink() ) . '">' . $continue_reading . '</a>';
	}

	return $more_string;
}

// Filter the excerpt more link.
add_filter( 'excerpt_more', 'mb_continue_reading_link' );

// Filter the content more link.
add_filter( 'the_content_more_link', 'mb_continue_reading_link' );

/**
 * Outputs a comment in the HTML5 format.
 *
 * This function overrides the default WordPress comment output in HTML5
 * format, adding the required class for Tailwind Typography. Based on the
 * `html5_comment()` function from WordPress core.
 *
 * @param WP_Comment $comment Comment to display.
 * @param array      $args    An array of arguments.
 * @param int        $depth   Depth of the current comment.
 */
function mb_html5_comment( $comment, $args, $depth ) {
	$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';

	$commenter          = wp_get_current_commenter();
	$show_pending_links = ! empty( $commenter['comment_author'] );

	if ( $commenter['comment_author_email'] ) {
		$moderation_note = __( 'Your comment is awaiting moderation.', 'moonbase' );
	} else {
		$moderation_note = __( 'Your comment is awaiting moderation. This is a preview; your comment will be visible after it has been approved.', 'moonbase' );
	}
	?>
<<?php echo esc_attr( $tag ); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $comment->has_children ? 'parent' : '', $comment ); ?>>

	<div id="div-comment-<?php comment_ID(); ?>" class="comment-body">

		<div class="comment-meta">

			<div class="comment-author vcard">
				<?php
				if ( 0 !== $args['avatar_size'] ) {
					echo get_avatar( $comment, $args['avatar_size'] );
				}
				?>
				<?php
					$comment_author = get_comment_author_link( $comment );

				if ( '0' === $comment->comment_approved && ! $show_pending_links ) {
					$comment_author = get_comment_author( $comment );
				}

					printf(
						/* translators: %s: Comment author link. */
						wp_kses_post( __( '%s <span class="says">says:</span>', 'moonbase' ) ),
						sprintf( '<b class="fn">%s</b>', wp_kses_post( $comment_author ) )
					);
				?>
			</div>

			<div class="comment-metadata">
				<?php
					printf(
						'<a href="%s"><time datetime="%s">%s</time></a>',
						esc_url( get_comment_link( $comment, $args ) ),
						esc_attr( get_comment_time( 'c' ) ),
						esc_html(
							sprintf(
								/* translators: 1: Comment date, 2: Comment time. */
								__( '%1$s at %2$s', 'moonbase' ),
								get_comment_date( '', $comment ),
								get_comment_time()
							)
						)
					);

					edit_comment_link( __( 'Edit', 'moonbase' ), ' <span class="edit-link">', '</span>' );
				?>
			</div>

			<?php if ( '0' === $comment->comment_approved ) : ?>
			<em class="comment-awaiting-moderation"><?php echo esc_html( $moderation_note ); ?></em>
			<?php endif; ?>
		</div>

		<div>
			<?php comment_text(); ?>
		</div>

		<?php
		if ( '1' === $comment->comment_approved || $show_pending_links ) {
			comment_reply_link(
				array_merge(
					$args,
					array(
						'add_below' => 'div-comment',
						'depth'     => $depth,
						'max_depth' => $args['max_depth'],
						'before'    => '<div class="reply">',
						'after'     => '</div>',
					)
				)
			);
		}
		?>
	</div>
	<?php
}

/**
 * Create custom tinymce toolbar.
 * 
 * @param var $toolbars toolbar object.
 */
function mb_toolbars( $toolbars ) {

	// Add a new toolbar called "Very Simple".
	$toolbars['Very Simple'][1] = array(
		'bold',
		'italic',
		'bullist',
		'numlist',
		'link',
		'unlink',
		'removeformat',
	);

	// return $toolbars - IMPORTANT!
	return $toolbars;
}
add_filter( 'acf/fields/wysiwyg/toolbars', 'mb_toolbars' );

/**
 * Create custom tinymce toolbar.
 */
function mb_custom_admin_css() {
	echo '<style>
		.acf-editor-wrap iframe {			
			max-height: 200px;
		}
	</style>
';
}
add_action( 'admin_head', 'mb_custom_admin_css' );

/**
 * Change default image sizes.
 */
function mb_remove_extra_image_sizes() {
	foreach ( get_intermediate_image_sizes() as $size ) {
		if ( ! in_array( $size, array( 'thumbnail', 'medium', 'medium_large', 'large' ), true ) ) {
			remove_image_size( $size );
		}
	}
}

add_action( 'init', 'mb_remove_extra_image_sizes' );
