<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Premius
 */

$body_classes = array();

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
	
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php // if( file_exists(get_stylesheet_directory_uri() . '/favicon/favicon.ico') ) : ?>
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon/apple-touch-icon.png?v=f32hw7ui">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon/favicon-32x32.png?v=f32hw7ui">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon/favicon-16x16.png?v=f32hw7ui">
		<link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon/site.webmanifest">
		<link rel="mask-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon/safari-pinned-tab.svg?v=f32hw7ui" color="#FFF">
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon/favicon.ico?v=f32hw7ui">
		<meta name="msapplication-TileColor" content="#FFF">
		<meta name="theme-color" content="#FFF">
		<?php // endif; ?>
		<?php wp_head(); ?>
		<?php the_field( 'site_head_scripts', 'option' ); ?>
		<?php the_field( 'structured_data', 'option' ); ?>
		<?php theme_output_faq_schema(); ?>
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-NF5B99C');</script>
		<!-- End Google Tag Manager -->

		<!-- Facebook Pixel Code -->
		<script>
		!function(f,b,e,v,n,t,s)
		{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};
		if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
		n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];
		s.parentNode.insertBefore(t,s)}(window,document,'script',
		'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '310806014570060');
		fbq('track', 'PageView');
		</script>
	</head>

	<body <?php body_class( $body_classes ); ?>>
		
		<noscript>
		<img height="1" width="1"
		src="https://www.facebook.com/tr?id=310806014570060&ev=PageView
		&noscript=1"/>
		</noscript>

		<header id="masthead" class="site-header" role="banner">

			<div id="navigation-wrapper" class="flex-container align-middle align-justify">
				
				<a href="<?php echo home_url('/'); ?>" class="logo border-0">
					<img class="" src="<?php echo get_stylesheet_directory_uri() ?>/img/premius-kuntoutus-logo.svg" alt="<?php echo get_bloginfo('name'); ?>">
				</a>
				
				<div id="site-navigation" class="">

					<span class="menu-toggle">
						<span class="icon"></span>
					</span>

					<nav id="main-navigation" class="" role="navigation">
						<?php wp_nav_menu( array( 
							'theme_location' => 'primary', 
							'menu_id' => 'primary-menu',
							'menu_class' => 'header-navi menu flex-container flex-dir-column large-flex-dir-row align-middle',
							'item_spacing' => 'discard',
							'container' => false,
							'extras' => array(
								'search' => -1,
								// 'lang_switch' => -2
							)
						) ); ?>
					</nav>
				</div>

			</div>
			
		</header><!-- #masthead -->
