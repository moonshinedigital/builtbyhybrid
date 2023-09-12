<?php
/**
 * Layout for the hero section on the home page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Moonbase
 */

$heading    = get_field( 'heading' );
$subheading = get_field( 'subheading' );
$image      = get_field( 'image' );
?>

<?php if ( ! empty( $heading ) ) : ?>
	<div class="hero-container <?php echo esc_attr( $hero_container_class ); ?>">
		<div class="hero-content">
				<?php if ( ! empty( $heading ) ) : ?>
					<h1><?php echo esc_html( $heading ); ?></h1>
				<?php endif; ?>

				<?php if ( ! empty( $subheading ) ) : ?>
					<h2><?php echo esc_html( $subheading ); ?></h2>
				<?php endif; ?>
		</div>

		<?php if ( ! empty( $image ) ) : ?>
			<div class="hero-image">
				<div class="hero-image-overlay"></div>
				<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" width="720">
			</div>
		<?php endif; ?>
	</div>
<?php endif; ?>
