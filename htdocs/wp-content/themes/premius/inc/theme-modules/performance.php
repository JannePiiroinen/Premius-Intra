<?php

/**
 * Performance tweaks and cleaning
 */

/**
 * Remove user profile fields
 */
if( !function_exists('theme_hide_profile_fields') ) :
	function theme_hide_profile_fields( $contactmethods ) {
		unset($contactmethods['aim']);
		unset($contactmethods['jabber']);
		unset($contactmethods['yim']);
		unset($contactmethods['myspace']);
		unset($contactmethods['pinterest']);
		unset($contactmethods['soundcloud']);
		unset($contactmethods['tumblr']);
		unset($contactmethods['wikipedia']);
		return $contactmethods;
	}
endif;
add_filter('user_contactmethods', 'theme_hide_profile_fields', 10, 1);

/**
 * Remove WP emoji scripts and styles.
 */
if( !function_exists('theme_disable_emojis') ) :
	function theme_disable_emojis() {
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_action( 'embed_head', 'print_emoji_detection_script' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	}
endif;
add_action( 'init', 'theme_disable_emojis' );

/**
 * Remove default widgets
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
if( !function_exists('theme_widgets_init') ) :
	function theme_widgets_init() {

		// Unregister unnecessary default widgets
		unregister_widget('WP_Widget_Pages');
		unregister_widget('WP_Widget_Calendar');
		unregister_widget('WP_Widget_Archives');
		unregister_widget('WP_Widget_Links');
		unregister_widget('WP_Widget_Meta');
		unregister_widget('WP_Widget_Search');
		unregister_widget('WP_Widget_Text');
		unregister_widget('WP_Widget_Categories');
		unregister_widget('WP_Widget_Recent_Posts');
		unregister_widget('WP_Widget_Recent_Comments');
		unregister_widget('WP_Widget_RSS');
		unregister_widget('WP_Widget_Tag_Cloud');
		unregister_widget('WP_Nav_Menu_Widget');
		
	}
endif;
add_action( 'widgets_init', 'theme_widgets_init' );

/**
 * Remove description from category columns
 */
add_filter('manage_edit-category_columns', function ( $columns ) {
	if( isset( $columns['description'] ) )
		unset( $columns['description'] );   

	return $columns;
} );

/**
 * Disable XML-RPC
 * Remove if using WordPress app or other XML-RPC based service
 */
add_filter( 'xmlrpc_enabled', '__return_false' );

/**
 * Remove RSD Links
 * Comment out if site uses XML-RPC or Pingbacks
 */
remove_action( 'wp_head', 'rsd_link' );

/**
 * Remove Windows Live Writer wlwmanifest link
 */
remove_action('wp_head', 'wlwmanifest_link');

// End performance tweaks