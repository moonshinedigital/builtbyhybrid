<?php
/**
 * Component Name: Section with Text Only
 *
 * @package builtbyhybrid
 */

$heading    = get_sub_field( 'heading' );
$subheading = get_sub_field( 'subheading' );
$text       = get_sub_field( 'text' );
$cta        = get_sub_field( 'cta_link' );
$visibility = get_sub_field( 'visibility' );
$style      = get_sub_field( 'style' );
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

if ( ! empty( $text ) ) :
	?>

	<section class="<?php echo esc_attr( $display_class ); ?> <?php echo esc_attr( 'base-' . $style['value'] ); ?>">

		<div>
			<?php if ( ! empty( $heading ) && in_array( 'show_heading', $visibility, true ) ) : ?>
				<h2 class="heading"><?php echo esc_html( $heading ); ?></h2>
			<?php endif; ?>

			<?php if ( ! empty( $subheading ) && in_array( 'show_subheading', $visibility, true ) ) : ?>
				<h3 class="subheading"><?php echo esc_html( $subheading ); ?></h3>
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

	</section>

<?php endif; ?>
