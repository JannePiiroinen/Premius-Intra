<?php


/**
 * Add "Theme settings" ACF options page
 */
function theme_settings_page() {

	// ACF Theme Options page
	if( function_exists('acf_add_options_page') ) {

		acf_add_options_page( array(
			'page_title' 	=> __('Ajanvarausasetukset', 'premius'),
			'menu_title'	=> __('Ajanvaraus', 'premius'),
			'menu_slug' 	=> 'booking-settings',
			'capability'	=> 'edit_posts',
			'position'		=> '9',
			'icon_url'		=> 'dashicons-clock',
			'redirect'		=> false,
			'parent_slug'	=> null,
		) );
		
	}

}
add_action('acf/init', 'theme_settings_page');


/**
 * Add theme settings field group
 */
if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_acf_options_page_theme_settings',
		'title' => __('Teeman asetukset', 'premius'),
		'fields' => array(
			array(
				'key' => 'field_theme_settings_footer_tab',
				'label' => __('Alatunniste', 'premius'),
				'name' => '',
				'type' => 'tab',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'placement' => 'left',
				'endpoint' => 0,
			),
			array(
				'key' => 'field_theme_settings_footer_heading',
				'label' => 'Heading',
				'name' => 'footer_heading',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'wpml_cf_preferences' => 3,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_theme_settings_footer_link',
				'label' => 'Button link',
				'name' => 'footer_button_link',
				'type' => 'link',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'wpml_cf_preferences' => 3,
				'return_format' => 'array',
			),
			array(
				'key' => 'field_theme_settings_tab_scripts',
				'label' => __('Skriptit', 'premius'),
				'name' => '',
				'type' => 'tab',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'placement' => 'left',
				'endpoint' => 0,
			),
			array(
				'key' => 'field_theme_settings_head_scripts',
				'label' => 'Head',
				'name' => 'site_head_scripts',
				'type' => 'textarea',
				'instructions' => __('Skriptit sivuston <code>&lt;head&gt;</code> -osiossa', 'premius'),
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'wpml_cf_preferences' => 1,
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'new_lines' => '',
			),
			array(
				'key' => 'field_theme_settings_footer_scripts',
				'label' => 'Footer',
				'name' => 'site_footer_scripts',
				'type' => 'textarea',
				'instructions' => __('Skriptit sivuston <code>&lt;footer&gt;</code> -osiossa', 'premius'),
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'wpml_cf_preferences' => 1,
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'new_lines' => '',
			),
			array(
				'key' => 'field_theme_settings_tab_structured_data',
				'label' => 'Jäsennelty tieto',
				'name' => '',
				'type' => 'tab',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'placement' => 'left',
				'endpoint' => 0,
			),
			array(
				'key' => 'field_theme_settings_structured_data',
				'label' => 'Jäsennelty tieto',
				'name' => 'structured_data',
				'type' => 'textarea',
				'instructions' => 'https://developers.google.com/search/docs/data-types/local-business',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'wpml_cf_preferences' => 1,
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => 20,
				'new_lines' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'theme-settings',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'field',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	));

endif;