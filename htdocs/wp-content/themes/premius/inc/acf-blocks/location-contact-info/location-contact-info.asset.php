<?php

function block_google_maps_assets() {
	wp_enqueue_script( 'gmaps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBls39XoHArwjgcdncs3PR_Xb_DqOs7sjk&callback=Function.prototype', array(), false );
	wp_localize_script( 'gmaps', 'vars', array(
		'templatedir' => get_template_directory_uri()
	));
}
add_action( 'enqueue_block_assets', 'block_google_maps_assets' );

return array(
	'dependencies' => array('gmaps'),
	'version'      => '1.0.3',
);