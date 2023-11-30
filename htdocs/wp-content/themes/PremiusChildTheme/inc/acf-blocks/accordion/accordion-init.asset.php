<?php

wp_enqueue_style( 'accordion-js-style', get_template_directory_uri() . '/inc/acf-blocks/accordion/vendor/accordion.min.css', array(), '3.3.2' );
wp_enqueue_script( 'accordion-js', get_template_directory_uri() . '/inc/acf-blocks/accordion/vendor/accordion.min.js', array(), '3.3.2', false );

return array(
	'dependencies' => array(
		'accordion-js'
	),
	'version'      => '1.0.1',
);