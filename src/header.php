<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package builtbyhybrid
 */

?>
<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/assets/favicon.ico">
	<meta name="description" content="Zac Polglaze provides highly personalised online strength and endurance coaching for every body - Built By Hybrid.">

	<link rel="canonical" href="<?php echo the_permalink(); ?>"/>

	<meta property="og:title" content="Strength and endurance coaching - Built By Hybrid, Zac Polglaze" />
	<meta property="og:description" content="Zac Polglaze provides highly personalised online strength and endurance coaching for every body - Built By Hybrid." />

	<meta property="og:site_name" content="<?php echo get_bloginfo(); ?>"/>
	<meta property="og:type" content="website"/>
    <meta property="og:url" content="<?php echo the_permalink(); ?>"/>
	<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/og.jpg"/>

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-MXWK4KLV');</script>
	<!-- End Google Tag Manager -->

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MXWK4KLV"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<?php wp_body_open(); ?>

<?php get_template_part( 'template-parts/header', 'layout' ); ?>
