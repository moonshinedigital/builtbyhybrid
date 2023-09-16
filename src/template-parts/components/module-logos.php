<?php
/**
 * Component Name: Logo Module
 *
 * @package Moonbase
 */

$heading    = get_sub_field( 'heading' );
$images     = get_sub_field( 'logo_images' );
$visibility = get_sub_field( 'visibility' );
$display    = get_sub_field( 'display_options' );

// Initialize with 'wrap' class.
$display_class = 'module min';

// Check if 'full_width' is checked and remove the 'wrap' if true.
if ( $display && in_array( 'full_width', $display, true ) ) {
	$display_class = 'module max';
}

// Check if 'hide_mobile' is checked and add tw classes to hide on mobile.
if ( $display && in_array( 'hide_mobile', $display, true ) ) {
	$display_class .= ( $display_class ? ' ' : '' ) . 'hide';
}

if ( ! empty( $images ) ) :
	?>

	<section class="<?php echo esc_attr( $display_class ); ?> logos">

			<?php if ( ! empty( $heading ) && in_array( 'show_heading', $visibility, true ) ) : ?>
				<h2><?php echo esc_html( $heading ); ?></h2>
			<?php endif; ?>

	<?php 
	if ( $images ) : 
		?>
		<div>
				<?php foreach ( $images as $image ) : ?>
					<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
			<?php endforeach; ?>
		</div>
	<?php endif; ?>

	</section>

	<?php endif; ?>
