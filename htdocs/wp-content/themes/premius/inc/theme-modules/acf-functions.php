<?php

/**
 * If ACF plugin not loaded, load from theme
 */
if( !class_exists('ACF') ) :
	// Define path and URL to the ACF plugin.
	define( 'ACF_PATH', get_template_directory() . '/inc/acf/' );
	define( 'ACF_URL', get_template_directory_uri() . '/inc/acf/' );

	// Include the ACF plugin.
	require ACF_PATH . 'acf.php';

	// Customize the url setting to fix incorrect asset URLs.
	add_filter('acf/settings/url', 'theme_acf_settings_url');
	function theme_acf_settings_url( $url ) {
		return ACF_URL;
	}
endif;


function theme_acf_init() {

	acf_update_setting( 'google_api_key', 'AIzaSyCciT9k6BOK_4lMApyupovKynFITsak9ds' );

}
add_action('acf/init', 'theme_acf_init');


/**
 * Hide the ACF admin menu item
 */
function theme_acf_settings_show_admin( $show_admin ) {
	$show_to_ids = array(1); // Set user IDs to show ACF to
	return in_array( get_current_user_id(), $show_to_ids );
}
add_filter('acf/settings/show_admin', 'theme_acf_settings_show_admin');


/**
 * Save and load child theme acf-json to/from parent
 */
function theme_acf_json_save_point($path) {
	if ( !is_child_theme() ) {
		return $path;
	}
	$path = get_template_directory() . '/acf-json';
	return $path;
}

function theme_acf_json_load_point($paths) {
	if ( !is_child_theme() ) {
		return $paths;
	}
	return array( get_template_directory() . '/acf-json' );
}
add_filter('acf/settings/save_json', 'theme_acf_json_save_point');
add_filter('acf/settings/load_json', 'theme_acf_json_load_point');


/**
 * Edit "no fields assigned" message
 */
function theme_acf_no_fields_message( $message ) {
	return __('Tällä lohkolla ei ole muokattavia asetuksia.', 'premius');
}
add_filter('acf/blocks/no_fields_assigned_message', 'theme_acf_no_fields_message', 1);