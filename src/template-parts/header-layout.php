<?php
/**
 * Displays the site header
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Moonbase
 */

?>

<header>
	<!-- Desktop Menu Wrapper -->

	<div id="desktop-menu">
		<!-- Desktop Menu -->
		<?php get_template_part( 'template-parts/header', 'navigation' ); ?>
	</div>

	<!-- Mobile Menu Overlay -->
	<div id="mobile-menu" style="display:none" data-menu="inactive" role="dialog" aria-modal="true">
		<!-- overlay -->

		<div id="mobile-menu-overlay"></div>
		<!-- Mobile Menu Wrapper -->

		<div id="mobile-menu-wrapper">
			<!-- Negative Area -->

			<div id="mobile-menu-drawer">
				<!-- Close Button -->

				<div id="btn-close-wrapper">
					<button id="btn-close" type="button">
						<span class="sr-only">Close menu</span>
						<svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
							<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
						</svg>
					</button>
				</div>

				<!-- Mobile Menu -->
				<?php get_template_part( 'template-parts/header', 'navigation' ); ?>
			</div>
		</div>
	</div>

	<!-- Mobile Header -->
	<div id="mobile-header">
		<button id="btn-open" type="button" class="-m-2.5 p-2.5 text-dark lg:hidden">
			<span class="sr-only">Open menu</span>
			<svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
				<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
			</svg>
		</button>

		<div class="flex-1 font-display font-semibold uppercase leading-6 text-black">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
		</div>
	</div>
</header>

<main>
