<?php

/**
 * Theme setup.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Premius
 */

if ( ! function_exists( 'theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function theme_setup() {
		
		/* Make theme available for translation */
		load_theme_textdomain( 'premius', get_template_directory() . '/languages' );

		/* Custom image sizes */
		add_image_size( 'extra_large', 2560, 2560 );

		/* Remove medium_large image size */
		add_filter('intermediate_image_sizes', function($sizes) {
			return array_diff($sizes, ['medium_large', '1536x1536']);
		});

		/* Register nav menus */
		register_nav_menus( 
			array(
				'primary' => esc_html__( 'Päävalikko', 'premius' ),
				'secondary' => esc_html__( 'Alatunniste', 'premius' ),
			)
		);

		/** 
		 * Register theme support for features 
		 * https://developer.wordpress.org/reference/functions/add_theme_support/
		 */
		add_theme_support( 'align-wide' );
		add_theme_support( 'block-template-parts' );
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'widgets' );
		add_theme_support( 'wp-block-styles' );

		/* Unregister theme support for features */
		// remove_theme_support( 'block-templates' );
		remove_theme_support( 'core-block-patterns' );
		// remove_theme_support( 'widgets-block-editor' );

		/** 
		 * Remove WP layout styles
		 * @link https://make.wordpress.org/core/2022/10/10/updated-editor-layout-support-in-6-1-after-refactor/
		 */
		if( !is_admin() ){
			add_theme_support( 'disable-layout-styles' );
		}

		/* Add excerpts to page post type */
		add_post_type_support( 'page', 'excerpt' );

	}
endif;
add_action( 'after_setup_theme', 'theme_setup' );


/**
 * Enqueue front end scripts and styles.
 */
add_action('wp_enqueue_scripts', function() { 

	// Theme styles
	wp_enqueue_style( 'theme-webfonts', 'https://use.typekit.net/udh2isa.css', array(), '1.0' );
	wp_enqueue_style( 'theme-styles', get_template_directory_uri() . '/build/index.css', array(), filemtime( get_template_directory() . '/build/index.css' ) );
	
	// Theme scripts
	// wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'theme-scripts', get_template_directory_uri() . '/build/index.js', array(), filemtime( get_template_directory() . '/build/index.js' ), true );

}, 10);


/**
 * Enqueue block editor styles
 */
add_action('enqueue_block_editor_assets', function() { 

	wp_enqueue_style( 'theme-webfonts', 'https://use.typekit.net/udh2isa.css', array(), '1.0' );
	wp_enqueue_style( 'theme-editor-styles', get_template_directory_uri() . '/build/editor.css', array(), filemtime( get_template_directory() . '/build/editor.css' ) );

}, 10, 1);


/**
 * Add custom styles to ACF WYSIWYG editor
 *
 * @link https://developer.wordpress.org/reference/functions/add_editor_style/
 */
add_action( 'admin_init', function(){

	add_editor_style( get_template_directory_uri() . '/build/tinymce.css' );

}, 10 );


/**
 * Include theme modules
 */
require dirname(__FILE__) . '/inc/module-loader.php';