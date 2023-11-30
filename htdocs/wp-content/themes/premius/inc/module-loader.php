<?php

/**
 * Theme module loader
 * Version 1.2
 * 
 * Version history:
 * 
 * 1.2 
 * - Complete refactoring
 * - Moved module definitions from functions.php to module-loader.php
 * - Changed ACF blocks to use ACF 6.0 block.json block registering
 * 
 * 1.1
 * - Minor improvements
 * 
 * 1.0
 * - First version
 * 
 */


/**
 * Loads theme modules
 * @since 1.0
 * @return void
 */
function theme_load_modules() {

	$theme_modules = array(
		'helpers', // Keep first to use helper functions in other modules
		'acf-functions',
		'acf-blocks',
		'acf-settings-pages',
		'block-editor',
		'block-patterns',
		'gravity-forms',
		'performance',
		'post-types',
		'theme-functions',
		'wpml',
	);

	$theme_modules = apply_filters( 'theme_included_modules', $theme_modules );

	/* Loop through modules and include them */
	foreach( $theme_modules as $module ){

		$module_file = get_theme_file_path( '/inc/theme-modules/' . $module . '.php' );

		if( file_exists( $module_file ) ){
			require $module_file;
		}
		else {
			trigger_error('File not found for module "' . $module . '"', E_USER_WARNING);
		}
		
	}
}
add_action( 'after_setup_theme', 'theme_load_modules', 9 );