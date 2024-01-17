<?php
/**
 * The template for displaying all testimonials
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package builtbyhybrid
 */

get_header();

if ( have_posts() ) :
	?>

	<?php get_template_part( 'template-parts/components/hero', 'testimonials' ); ?>

	<?php 
	while ( have_posts() ) :
		the_post(); 
		$image = get_field( 'photo' );
		?>

		<?php if ( ! empty( $image ) ) : ?>
			<section class="container my-16 bg-black text-white xl:my-24">
				<div class="flex flex-col items-center justify-start lg:flex-row">

				<div class="flex flex-col gap-8 p-8 lg:w-4/6 xl:p-12">
					<h2 class="mb-0 text-3xl text-orange"><?php the_title( '', '' ); ?></h2>
					<blockquote class="text-2xl italic">
					"<?php the_field( 'quote' ); ?>..."
					</blockquote>
					<a class="cta" href="<?php the_permalink(); ?>">
						<span class="label text-white hover:text-orange">Read <?php the_title( '', '\'s' ); ?> full testimonial
							<svg class="icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
								<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
							</svg>
						</span>
					</a>
				</div>

				<div class="flex lg:w-2/6">
					<img class="object-cover" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">
				</div>

				</div>
			</section>
		<?php else : ?>
			<section class="container my-16 bg-black text-white xl:my-24">
				<div class="flex items-center">

				<div class="flex w-full flex-col gap-8 p-8 xl:p-12">
					<h2 class="mb-0 text-3xl text-orange"><?php the_title( '', '' ); ?></h2>
					<blockquote class="text-2xl italic">
					"<?php the_field( 'quote' ); ?>..."
					</blockquote>

					<a class="cta" href="<?php the_permalink(); ?>">
						<span class="label text-white hover:text-orange">Read <?php the_title( '', '\'s' ); ?> full testimonial
							<svg class="icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
								<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
							</svg>
						</span>
					</a>
				</div>

			</div>
			</section>
		<?php endif; ?>

<?php endwhile; ?>
	<?php 
	else :
		echo 'No testimonials found';
endif;
	get_footer();
	?>
