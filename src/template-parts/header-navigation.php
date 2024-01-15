<?php
/**
 * Displays the site navigation.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package builtbyhybrid
 */

?>

<nav id="menu-content">

	<div class="logo">
		<span class="sr-only"><?php bloginfo( 'name' ); ?></span>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="logo">
			<?php echo file_get_contents( get_template_directory() . '/assets/images/logo.svg' ); ?>
		</a>
		<span class="description sr-only"><?php echo get_bloginfo( 'description' ); ?></span>
	</div>

	<ul role="list">
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'primary_menu',
				'depth'          => 1,
				'container'      => false,
				'items_wrap'     => '%3$s',
				'fallback_cb'    => 'mb_default_menu',
			)
		);
		?>
	</ul>
</nav>
