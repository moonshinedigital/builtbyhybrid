<?php
/**
 * Layout for the hero section on the home page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package builtbyhybrid
 */

$heading    = get_field( 'heading' );
$subheading = get_field( 'subheading' );
$text       = get_field( 'text' );
$button     = get_field( 'link' );
$image      = get_field( 'image' );
?>

<?php if ( ! empty( $heading ) ) : ?>
	<section class="hero">
		<div class="hero-content">
			<div>
				<?php if ( ! empty( $heading ) ) : ?>
				<h1><?php echo esc_html( $heading ); ?></h1>
				<?php endif; ?>

				<?php if ( ! empty( $subheading ) ) : ?>
				<h2><?php echo esc_html( $subheading ); ?></h2>
				<?php endif; ?>

				<?php if ( ! empty( $text ) ) : ?>
					<?php echo wp_kses_post( $text ); ?>
				<?php endif; ?>

				<?php 
				if ( ! empty( $button ) ) :
					$button_url    = $button['url'];
					$button_title  = $button['title'];
					$button_target = $button['target'] ? $button['target'] : '_self';
					?>
				<div class="hero-buttons">
					<a href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>" class="button">
						<span><?php echo esc_html( $button_title ); ?></span>
						<svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/></svg>
					</a>
				</div>
				<?php endif; ?>
			</div>
		</div>

		<?php if ( ! empty( $image ) ) : ?>
			<div class="hero-image">
				<div class="hero-image-overlay"></div>
				<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" width="720">
			</div>
		<?php endif; ?>
	</section>
<?php endif; ?>
