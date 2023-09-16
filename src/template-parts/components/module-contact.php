<?php
/**
 * Component Name: Section with Text and Contact Form
 *
 * @package Moonbase
 */

$heading    = get_sub_field( 'heading' );
$text       = get_sub_field( 'text' );
$cta        = get_sub_field( 'cta_link' );
$form       = get_sub_field( 'form' );
$alignment  = get_sub_field( 'form_alignment' );
$visibility = get_sub_field( 'visibility' );
$style      = get_sub_field( 'style' );
$display    = get_sub_field( 'display_options' );

// Initialize with 'column-two' class.
$alignment_class = 'column-two';

// Check if 'form_left' is in the alignment array, then switch class.
if ( in_array( 'form_left', $alignment, true ) ) {
	$alignment_class = 'column-one';
}

// Initialize with 'wrap' class.
$display_class = 'module min';

// Check if 'full_width' is checked and remove the 'wrap' if true.
if ( in_array( 'full_width', $display, true ) ) {
	$display_class = 'module max';
}

// Check if 'hide_mobile' is checked and add tw classes to hide on mobile.
if ( in_array( 'hide_mobile', $display, true ) ) {
	$display_class .= ( $display_class ? ' ' : '' ) . 'hide';
}

if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
	wpcf7_enqueue_scripts();
}

if ( ! empty( $text ) ) :
	?>

<section class="<?php echo esc_attr( $display_class ); ?> contact columns <?php echo esc_attr( 'base-' . $style['value'] ); ?>">

	<?php if ( ! empty( $form ) ) : ?>
	<div class="<?php echo wp_kses_post( $alignment_class ); ?>">
		<?php echo ( $form ); ?>
		</div>
	<?php endif; ?>


	<?php
	// Toggle the alignment class here.
	$alignment_class = ( 'column-one' === $alignment_class ) ? 'column-two' : 'column-one';
	?>

	<div class="<?php echo esc_attr( $alignment_class ); ?>">
		<div>
		<?php if ( ! empty( $heading ) && in_array( 'show_heading', $visibility, true ) ) : ?>
			<h2 class="heading"><?php echo esc_html( $heading ); ?></h2>
		<?php endif; ?>

		<?php if ( ! empty( $text ) ) : ?>
			<div class="text"><?php echo wp_kses_post( $text ); ?></div>
		<?php endif; ?>

		<?php 
		if ( ! empty( $cta ) && in_array( 'show_cta', $visibility, true ) ) :
			$cta_url    = $cta['url'];
			$cta_title  = $cta['title'];
			$cta_target = $cta['target'] ? $cta['target'] : '_self';
			?>
		<a class="cta" href="<?php echo esc_url( $cta_url ); ?>" target="<?php echo esc_attr( $cta_target ); ?>">
			<span class="label"><?php echo esc_html( $cta_title ); ?>
				<svg class="icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
					<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
				</svg>
			</span>
		</a>
		<?php endif; ?>

	</div>
	</div>

</section>

<?php endif; ?>
