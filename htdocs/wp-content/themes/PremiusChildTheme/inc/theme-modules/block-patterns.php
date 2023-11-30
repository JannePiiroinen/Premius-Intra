<?php 

/**
 * Block patterns related unctions
 */

if ( function_exists( 'register_block_pattern_category' ) ) {
	register_block_pattern_category(
		'premius-common',
		array( 'label' => __( 'Yleiset', 'premius' ) )
	);
	register_block_pattern_category(
		'premius-service',
		array( 'label' => __( 'Palvelut', 'premius' ) )
	);
}