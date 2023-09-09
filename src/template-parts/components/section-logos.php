<?php
/**
 * Component Name: Logo Block
 *
 * @package Moonbase
 */

// Check if the repeater field has rows.
if ( have_rows( 'logos' ) ) :

	// Initialize a variable to check if there is at least one logo.
	$has_logo = false;

	// Start the wrapping section.
	?>
	<section class="section--wrap logos">
		<div class="logos__heading">Zac accredited by</div>
		<div class="logos__images">
	<?php

	// Loop through the rows of the repeater field.
	while ( have_rows( 'logos' ) ) :
		the_row();

		// Get the 'logo-file' field value.
		$logo = get_sub_field( 'logo-file' );

		if ( ! empty( $logo ) ) {
			// Set the flag to true if at least one logo is found.
			$has_logo = true;

			// Output the logo.
			?>
			<img src="<?php echo esc_url( $logo['url'] ); ?>" alt="<?php echo esc_attr( $logo['alt'] ); ?>">
			<?php
		}
	endwhile;

	// Close the wrapping section if there is at least one logo.
	if ( $has_logo ) {
		?>
		</div>
		</section>
		<?php
	}
endif;
?>
