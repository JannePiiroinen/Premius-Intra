<?php

/**
 * Register ACF blocks
 * @since 1.0
 * @return void
 */
function theme_register_acf_blocks() {

	$acf_blocks = glob(get_theme_file_path( '/inc/acf-blocks' ) . '/*', GLOB_ONLYDIR);

	$acf_blocks = apply_filters( 'theme_acf_blocks', $acf_blocks );

	// vdd( $acf_blocks );

	/* Loop through blocks and register them */
	foreach( $acf_blocks as $block ){
		register_block_type( $block );
	}
}
add_action( 'init', 'theme_register_acf_blocks', 5 );