<?php

/**
 * Register theme Custom Post Types and Taxonomies
 */

function theme_cpts_init() {

	/**
	 * Custom taxonomies
	 */

	// Oireet, diagnoosit
	$labels_symptoms = array(
		'name'							=> _x( 'Oireet ja diagnoosit', 'taxonomy general name', 'premius' ),
		'singular_name'					=> _x( 'Oire', 'taxonomy singular name', 'premius' ),
		'search_items'					=>  __( 'Hae oireista / diagnooseista', 'premius' ),
		'popular_items'					=> __( 'Useimmin käytetyt', 'premius' ),
		'all_items'						=> __( 'Kaikki oireet, diagnoosit', 'premius' ),
		'parent_item'					=> null,
		'parent_item_colon'				=> null,
		'edit_item'						=> __( 'Muokkaa oiretta', 'premius' ), 
		'update_item'					=> __( 'Päivitä oire', 'premius' ),
		'add_new_item'					=> __( 'Uusi oire tai diagnoosi', 'premius' ),
		'new_item_name'					=> __( 'Oire', 'premius' ),
		'separate_items_with_commas'	=> __( 'Erottele pilkulla', 'premius' ),
		'add_or_remove_items'			=> __( 'Lisää tai poista oireita / diagnooseja', 'premius' ),
		'choose_from_most_used'			=> __( 'Valitse useimmin käytetyistä', 'premius' ),
		'not_found'						=> __( 'Ei näytettäviä oireita / diagnooseja', 'premius' ),
		'menu_name'						=> __( 'Oireet, diagnoosit', 'premius' ),
	);

	register_taxonomy('symptom', array('professional, service'), array(
		'hierarchical'			=> false,
		'labels'				=> $labels_symptoms,
		'show_ui'				=> true,
		'show_admin_column'		=> true,
		'public'				=> false,
		'update_count_callback'	=> '_update_post_term_count',
		'query_var'				=> true,
		'show_in_rest'			=> false,
	));

	// Ammattilaisryhmät
	$labels_professional_category = array(
		'name'							=> _x( 'Ammattilaisryhmät', 'taxonomy general name', 'premius' ),
		'singular_name'					=> _x( 'Ammattilaisryhmä', 'taxonomy singular name', 'premius' ),
		'search_items'					=>  __( 'Hae ammattilaisryhmistä', 'premius' ),
		'popular_items'					=> __( 'Useimmin käytetyt', 'premius' ),
		'all_items'						=> __( 'Kaikki ammattilaisryhmät', 'premius' ),
		'parent_item'					=> null,
		'parent_item_colon'				=> null,
		'edit_item'						=> __( 'Muokkaa ammattilaisryhmää', 'premius' ), 
		'update_item'					=> __( 'Päivitä ammattilaisryhmä', 'premius' ),
		'add_new_item'					=> __( 'Uusi ammattilaisryhmä', 'premius' ),
		'new_item_name'					=> __( 'Ammattilaisryhmä', 'premius' ),
		'separate_items_with_commas'	=> __( 'Erottele pilkulla', 'premius' ),
		'add_or_remove_items'			=> __( 'Lisää tai poista ammattilaisryhmiä', 'premius' ),
		'choose_from_most_used'			=> __( 'Valitse useimmin käytetyistä', 'premius' ),
		'not_found'						=> __( 'Ei näytettäviä ammattilaisryhmiä', 'premius' ),
		'menu_name'						=> __( 'Ammattilaisryhmät', 'premius' ),
	);

	register_taxonomy('professional_category', array('professional'), array(
		'hierarchical'			=> false,
		'labels'				=> $labels_professional_category,
		'show_ui'				=> true,
		'show_admin_column'		=> true,
		'public'				=> false,
		'update_count_callback'	=> '_update_post_term_count',
		'query_var'				=> true,
		'show_in_rest'			=> false,
	));


	/**
	 * Blogi
	 */
	$labels_blog = array(
		'name'					=> _x( 'Blogi', 'Post type general name', 'premius' ),
		'singular_name'			=> _x( 'Blogikirjoitus', 'Post type singular name', 'premius' ),
		'menu_name'				=> _x( 'Blogi', 'Admin Menu text', 'premius' ),
		'name_admin_bar'		=> _x( 'Blogikirjoitus', 'Add New on Toolbar', 'premius' ),
		'add_new'				=> __( 'Lisää uusi', 'premius' ),
		'add_new_item'			=> __( 'Lisää uusi blogikirjoitus', 'premius' ),
		'new_item'				=> __( 'Uusi blogikirjoitus', 'premius' ),
		'edit_item'				=> __( 'Muokkaa blogikirjoitusta', 'premius' ),
		'view_item'				=> __( 'Näytä blogikirjoitus', 'premius' ),
		'all_items'				=> __( 'Kaikki blogikirjoitukset', 'premius' ),
		'search_items'			=> __( 'Etsi blogikirjoituksia', 'premius' ),
		'not_found'				=> __( 'Blogikirjoituksia ei löytynyt', 'premius' ),
		'not_found_in_trash'	=> __( 'Blogikirjoituksia ei löytynyt', 'premius' ),
		'archives'				=> _x( 'Arkisto', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'premius' ),
		'insert_into_item'		=> _x( 'Lisää', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'premius' ),
	);

	$args_blog = array(
		'labels'				=> $labels_blog,
		'public'				=> true,
		'publicly_queryable'	=> true,
		'show_ui'				=> true,
		'show_in_menu'			=> true,
		'query_var'				=> true,
		'capability_type'		=> 'post',
		'has_archive'			=> __('blogi', 'premius'),
		'rewrite'				=> array(
			'slug'			=> __('blogi', 'premius'),
			'with_front'	=> false
		),
		'hierarchical'			=> false,
		'menu_position'			=> 11,
		'menu_icon'				=> 'dashicons-edit-page', // https://developer.wordpress.org/resource/dashicons/
		'supports'				=> array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions' ), // 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'revisions', 'page-attributes'
		'show_in_rest'			=> true
	);

	register_post_type( 'blog', $args_blog );


	/**
	 * Asiakastarinat
	 */
	$labels_customer_story = array(
		'name'					=> _x( 'Asiakastarina', 'Post type general name', 'premius' ),
		'singular_name'			=> _x( 'Asiakastarina', 'Post type singular name', 'premius' ),
		'menu_name'				=> _x( 'Asiakastarinat', 'Admin Menu text', 'premius' ),
		'name_admin_bar'		=> _x( 'Asiakastarina', 'Add New on Toolbar', 'premius' ),
		'add_new'				=> __( 'Lisää uusi', 'premius' ),
		'add_new_item'			=> __( 'Lisää uusi asiakastarina', 'premius' ),
		'new_item'				=> __( 'Uusi asiakastarina', 'premius' ),
		'edit_item'				=> __( 'Muokkaa asiakastarinata', 'premius' ),
		'view_item'				=> __( 'Näytä asiakastarina', 'premius' ),
		'all_items'				=> __( 'Kaikki asiakastarinat', 'premius' ),
		'search_items'			=> __( 'Etsi asiakastarinoita', 'premius' ),
		'not_found'				=> __( 'Asiakastarinoita ei löytynyt', 'premius' ),
		'not_found_in_trash'	=> __( 'Asiakastarinoita ei löytynyt', 'premius' ),
		'archives'				=> _x( 'Arkisto', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'premius' ),
		'insert_into_item'		=> _x( 'Lisää', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'premius' ),
	);

	$args_customer_story = array(
		'labels'				=> $labels_customer_story,
		'public'				=> true,
		'publicly_queryable'	=> true,
		'show_ui'				=> true,
		'show_in_menu'			=> true,
		'query_var'				=> true,
		'capability_type'		=> 'post',
		'has_archive'			=> false,
		'rewrite'				=> array(
			'slug'			=> false,
			'with_front'	=> false
		),
		'hierarchical'			=> true,
		'menu_position'			=> 11,
		'menu_icon'				=> 'dashicons-testimonial', // https://developer.wordpress.org/resource/dashicons/
		'supports'				=> array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions' ), // 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'revisions', 'page-attributes'
		'show_in_rest'			=> true
	);

	register_post_type( 'customer_story', $args_customer_story );


	/**
	 * Palvelut
	 */
	$labels_services = array(
		'name'					=> _x( 'Palvelut', 'Post type general name', 'premius' ),
		'singular_name'			=> _x( 'Palvelu', 'Post type singular name', 'premius' ),
		'menu_name'				=> _x( 'Palvelut', 'Admin Menu text', 'premius' ),
		'name_admin_bar'		=> _x( 'Palvelu', 'Add New on Toolbar', 'premius' ),
		'add_new'				=> __( 'Lisää uusi', 'premius' ),
		'add_new_item'			=> __( 'Lisää palvelu', 'premius' ),
		'new_item'				=> __( 'Uusi palvelu', 'premius' ),
		'edit_item'				=> __( 'Muokkaa palvelua', 'premius' ),
		'view_item'				=> __( 'Näytä palvelu', 'premius' ),
		'all_items'				=> __( 'Kaikki palvelut', 'premius' ),
		'search_items'			=> __( 'Hae palveluista', 'premius' ),
		'not_found'				=> __( 'Ei näytettäviä palveluita', 'premius' ),
		'not_found_in_trash'	=> __( 'Ei näytettäviä palveluita', 'premius' ),
		'archives'				=> _x( 'Palveluarkisto', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'premius' ),
		'insert_into_item'		=> _x( 'Lisää', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'premius' ),
	);

	$args_services = array(
		'labels'				=> $labels_services,
		'public'				=> true,
		'publicly_queryable'	=> true,
		'show_ui'				=> true,
		'show_in_menu'			=> true,
		'query_var'				=> true,
		'capability_type'		=> 'post',
		'has_archive'			=> false,
		'rewrite'				=> array(
			'slug'			=> __( 'palvelut', 'premius' ),
			'with_front'	=> false
		),
		'hierarchical'			=> true,
		'menu_position'			=> 22,
		'menu_icon'				=> 'dashicons-smiley', // https://developer.wordpress.org/resource/dashicons/
		'supports'				=> array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'page-attributes' ), // 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'revisions', 'page-attributes'
		'show_in_rest'			=> true,
		'template' => array(
			array( 'core/pattern', array(
				'slug' => 'premius/hero-section-service',
			) ),
			array( 'acf/max-width', array( 'lock' => array( 'move' => true, 'remove' => true ), 'align' => 'left', 'data' => array('field_acf_block_max_width_max_width' => '800') ), array(
				array( 'core/heading', array( 'level' => 3, 'content' => 'Lorem ipsum dolor sit amet' ) ),
				array( 'core/paragraph', array( 'placeholder' => 'Kuvausteksti lorem ipsum dolor sit amet...' ) ),
			)),
			array( 'core/pattern', array(
				'slug' => 'premius/media-text-full-width',
			) ),
			array( 'core/pattern', array(
				'slug' => 'premius/contact-request',
			) ),
			array( 'core/pattern', array(
				'slug' => 'premius/service-locations',
			) ),
			array( 'core/pattern', array(
				'slug' => 'premius/service-professionals',
			) ),
		),
		// 'template_lock'			=> 'all'
	);

	register_post_type( 'service', $args_services );


	/**
	 * Ammattilaiset
	 */
	$labels_professionals = array(
		'name'					=> _x( 'Ammattilaiset', 'Post type general name', 'premius' ),
		'singular_name'			=> _x( 'Ammattilainen', 'Post type singular name', 'premius' ),
		'menu_name'				=> _x( 'Ammattilaiset', 'Admin Menu text', 'premius' ),
		'name_admin_bar'		=> _x( 'Ammattilainen', 'Add New on Toolbar', 'premius' ),
		'add_new'				=> __( 'Lisää uusi', 'premius' ),
		'add_new_item'			=> __( 'Lisää ammattilainen', 'premius' ),
		'new_item'				=> __( 'Uusi ammattilainen', 'premius' ),
		'edit_item'				=> __( 'Muokkaa ammattilaista', 'premius' ),
		'view_item'				=> __( 'Näytä ammattilainen', 'premius' ),
		'all_items'				=> __( 'Kaikki ammattilaiset', 'premius' ),
		'search_items'			=> __( 'Hae ammattilaisista', 'premius' ),
		'not_found'				=> __( 'Ei näytettäviä ammattilaisia', 'premius' ),
		'not_found_in_trash'	=> __( 'Ei näytettäviä ammattilaisia', 'premius' ),
		'archives'				=> _x( 'Ammattilaisarkisto', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'premius' ),
		'insert_into_item'		=> _x( 'Lisää', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'premius' ),
	);
 
	$args_professionals = array(
		'labels'				=> $labels_professionals,
		'public'				=> true,
		'publicly_queryable'	=> true,
		'show_ui'				=> true,
		'show_in_menu'			=> true,
		'query_var'				=> true,
		'rewrite'				=> array(
			'slug'			=> false,
			'with_front'	=> false
		),
		'capability_type'		=> 'post',
		'has_archive'			=> false,
		'hierarchical'			=> false,
		'menu_position'			=> '26.5',
		'menu_icon'				=> 'dashicons-groups', // https://developer.wordpress.org/resource/dashicons/
		'supports'				=> array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions' ), // 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'revisions', 'page-attributes'
		'show_in_rest'			=> true,
		/*
		'template' => array(
			array( 'core/pattern', array(
				'slug' => 'premius/professional',
			) ),
		),
		*/
		'template' => array(
			array( 'core/columns', array( 'lock' => array( 'move' => true, 'remove' => true ), 'verticalAlignment' => 'center' ), array(
				array( 'core/column', array( 'lock' => array( 'move' => true, 'remove' => true ), 'verticalAlignment' => 'center', 'className' => 'small-order-2 medium-order-1' ), array(
					array( 'core/post-title', array( 'level' => 1, 'lock' => array( 'move' => true, 'remove' => true ) ) ),
					array( 'core/heading', array( 'level' => 2, 'placeholder' => 'Titteli/tehtävä' ) )
				)),
				array( 'core/column', array( 'lock' => array( 'move' => true, 'remove' => true ), 'verticalAlignment' => 'center', 'align' => 'center', 'className' => 'small-order-1 medium-order-2' ), array(
					array( 'core/post-featured-image', array( 'lock' => array( 'move' => true, 'remove' => true ) ) )
				))
			)),
			array( 'core/columns', array( 'lock' => array( 'move' => true, 'remove' => true ) ), array(
				array( 'core/column', array( 'lock' => array( 'move' => true, 'remove' => true ) ), array(
					array( 'core/heading', array( 'lock' => array( 'move' => true, 'remove' => true ), 'level' => 3, 'content' => 'Varaa aika') ),
					array( 'acf/professional-contact-info', array( 'lock' => array( 'move' => true, 'remove' => true ) ) )
				)),
				array( 'core/column', array( 'lock' => array( 'move' => true, 'remove' => true ) ), array(
					array( 'core/heading', array( 'lock' => array( 'move' => true, 'remove' => true ), 'level' => 3, 'content' => 'Palvelut' ) ),
					array( 'acf/professional-services', array( 'lock' => array( 'move' => true, 'remove' => true ) ) )
				)),
			)),
			array( 'core/columns', array(), array(
				array( 'core/column', array(), array(
					array( 'core/heading', array( 'level' => 3, 'content' => 'Erityispätevyydet ja kiinnostuksen kohteet') ),
					array( 'core/list', array( 'placeholder' => 'Erityispätevyys' ) )
				)),
				array( 'core/column', array(), array(
					array( 'core/heading', array( 'level' => 3, 'content' => 'Tutkinnot' ) ),
					array( 'core/list', array( 'placeholder' => 'Tutkinto' ) )
				)),
			)),
			array( 'core/image', array( 'url' => '/wp-content/themes/premius/img/kiekura.svg', 'alt' => '' ) ),
			array( 'acf/max-width', array( 'lock' => array( 'move' => true, 'remove' => true ), 'align' => 'left', 'data' => array('field_acf_block_max_width_max_width' => '800') ), array(
				array( 'core/paragraph', array( 'placeholder' => 'Kuvausteksti lorem ipsum dolor sit amet...' ) ),
			))
		),
		// 'template_lock'			=> 'all'
	);

	register_post_type( 'professional', $args_professionals );
	

	/**
	 * Toimipisteet
	 */
	$labels_locations = array(
		'name'					=> _x( 'Toimipisteet', 'Post type general name', 'premius' ),
		'singular_name'			=> _x( 'Toimipiste', 'Post type singular name', 'premius' ),
		'menu_name'				=> _x( 'Toimipisteet', 'Admin Menu text', 'premius' ),
		'name_admin_bar'		=> _x( 'Toimipiste', 'Add New on Toolbar', 'premius' ),
		'add_new'				=> __( 'Lisää uusi', 'premius' ),
		'add_new_item'			=> __( 'Lisää toimipiste', 'premius' ),
		'new_item'				=> __( 'Uusi toimipiste', 'premius' ),
		'edit_item'				=> __( 'Muokkaa toimipistettä', 'premius' ),
		'view_item'				=> __( 'Näytä toimipiste', 'premius' ),
		'all_items'				=> __( 'Kaikki toimipisteet', 'premius' ),
		'search_items'			=> __( 'Hae toimipisteistä', 'premius' ),
		'not_found'				=> __( 'Ei näytettäviä toimipisteitä', 'premius' ),
		'not_found_in_trash'	=> __( 'Ei näytettäviä toimipisteitä', 'premius' ),
		'archives'				=> _x( 'Toimipistearkisto', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'premius' ),
		'insert_into_item'		=> _x( 'Lisää', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'premius' ),
	);
 
	$args_locations = array(
		'labels'				=> $labels_locations,
		'public'				=> true,
		'publicly_queryable'	=> true,
		'show_ui'				=> true,
		'show_in_menu'			=> true,
		'query_var'				=> true,
		'rewrite'				=> array(
			'slug'			=> false,
			'with_front'	=> false
		),
		'capability_type'		=> 'post',
		'has_archive'			=> false,
		'hierarchical'			=> false,
		'menu_position'			=> '26.5',
		'menu_icon'				=> 'dashicons-admin-multisite', // https://developer.wordpress.org/resource/dashicons/
		'supports'				=> array( 'title', 'editor', 'revisions', 'thumbnail', 'excerpt' ), // 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'revisions', 'page-attributes'
		'show_in_rest'			=> true,
		'template' => array(
			array( 'core/pattern', array(
				'slug' => 'premius/hero-section',
			) ),
			array( 'core/pattern', array(
				'slug' => 'premius/cover-pebbles-content',
			) ),
			array( 'core/pattern', array(
				'slug' => 'premius/location-contact-info',
			) ),
			array( 'core/pattern', array(
				'slug' => 'premius/location-locations',
			) ),
		),
		// 'template_lock'			=> 'all'
	);

	register_post_type( 'location', $args_locations );


	register_taxonomy_for_object_type( 'symptom', 'service' );
	register_taxonomy_for_object_type( 'symptom', 'professional' );
	register_taxonomy_for_object_type( 'professional_category', 'professional' );

}
add_action( 'init', 'theme_cpts_init' );


function theme_post_type_block_templates() {

	foreach( array('post', 'blog', 'customer_story') as $post_type ){
		$post_type_object = get_post_type_object( $post_type );
		$post_type_object->template = array(
			array( 'core/pattern', array(
				'slug' => 'premius/hero-section-single-post',
			) ),
		);
		// $post_type_object->template_lock = 'all';
	}
}
add_action( 'init', 'theme_post_type_block_templates' );


/**
 * Custom Post Types order in frontend
 */
function theme_cpt_order( $query ) {

	if( is_admin() && !isset( $_GET['orderby'] ) && in_array( $query->query['post_type'], array('blog', 'customer_story' ) ) ) {
		// vdd( $query );
		$query->set('orderby', 'date');
		$query->set('order', 'DESC');
	}
}
add_action( 'pre_get_posts', 'theme_cpt_order' );


/**
 * Remove slug from CPTs
 * @link https://wordpress.stackexchange.com/a/204210/96565
 */
function theme_remove_cpt_slug( $post_link, $post, $leavename ) {

	if ( !in_array( $post->post_type, array( 'location', 'professional', 'service' ) ) || 'publish' != $post->post_status ) {
		return $post_link;
	}

	$post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );

	return $post_link;

}
add_filter( 'post_type_link', 'theme_remove_cpt_slug', 10, 3 );

function theme_parse_cpt_request( $query ) {

	if ( ! $query->is_main_query() || 2 != count( $query->query ) || !isset( $query->query['page'] ) ) {
		return;
	}

	if ( ! empty( $query->query['name'] ) ) {
		$query->set( 'post_type', array( 'post', 'page', 'blog', 'location', 'professional', 'service' ) );
	}
}
add_action( 'pre_get_posts', 'theme_parse_cpt_request' );



/**
 * Change number of posts per page for page 1
 * @link https://sridharkatakam.com/changing-posts-per-page-first-page-without-breaking-pagination-wordpress/
 */
/*
if( !function_exists('theme_query_posts_per_page') ) :
	function theme_query_posts_per_page( $query ) {

		// Before anything else, make sure this is the right query...
		if ( is_admin() || !is_home() ) {
			return;
		}

		// Get posts per page setting
		$ppp = get_option( 'posts_per_page' );

		// First page posts count
		$fpp = 3;

		// Count offset
		$offset = $ppp > $fpp ? $fpp - $ppp : $ppp - $fpp;

		// Next, detect and handle pagination...
		if ( $query->is_paged ) {

			// Manually determine page query offset (offset + current page (minus one) x posts per page)
			$page_offset = $offset + ( ( $query->query_vars['paged']-1 ) * $ppp );

			// Apply adjust page offset
			$query->set( 'offset', $page_offset );

		}
		else {

			// This is the first page. Set a different number for posts per page
			$query->set( 'posts_per_page', $offset + $ppp );

		}
	}
endif;
add_action( 'pre_get_posts', 'theme_query_posts_per_page', 1 );

if( !function_exists('theme_adjust_offset_pagination') ) :
	function theme_adjust_offset_pagination( $found_posts, $query ) {

		// Get posts per page setting
		$ppp = get_option( 'posts_per_page' );

		// First page posts count
		$fpp = 3;

		// Count offset
		$offset = $ppp > $fpp ? $fpp - $ppp : $ppp - $fpp;

		// Ensure we're modifying the right query object...
		if ( is_home() && $query->is_main_query() && ($query->post_type === 'post' || $query->post_type === 'blog') ) {
			// Reduce WordPress's found_posts count by the offset...
			return $found_posts - $offset;
		}
		return $found_posts;
	}
endif;
add_filter( 'found_posts', 'theme_adjust_offset_pagination', 1, 2 );
*/


/**
 * Remove / hide default "Post" post type from admin
 */

/*
// Remove side menu
if( !function_exists('theme_remove_default_post_type') ) :
	function theme_remove_default_post_type() {
		remove_menu_page( 'edit.php' );
	}
endif;
add_action( 'admin_menu', 'theme_remove_default_post_type' );

// Remove +New post in top Admin Menu Bar
if( !function_exists('theme_remove_default_post_type_menu_bar') ) :
	function theme_remove_default_post_type_menu_bar( $wp_admin_bar ) {
		$wp_admin_bar->remove_node( 'new-post' );
	}
endif;
add_action( 'admin_bar_menu', 'theme_remove_default_post_type_menu_bar', 999 );

// Remove Quick Draft Dashboard Widget
if( !function_exists('theme_remove_draft_widget') ) :
	function theme_remove_draft_widget(){
		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
	}
endif;
add_action( 'wp_dashboard_setup', 'theme_remove_draft_widget', 999 );

if( !function_exists('theme_default_post_type_args') ) :
	function theme_default_post_type_args($args, $postType) {
		if ($postType === 'post') {
			$args['public'] = false;
			$args['show_ui'] = false;
			$args['show_in_menu'] = false;
			$args['show_in_admin_bar'] = false;
			$args['show_in_nav_menus'] = false;
			$args['can_export'] = false;
			$args['has_archive'] = false;
			$args['exclude_from_search'] = true;
			$args['publicly_queryable']	= false;
			$args['show_in_rest'] = false;
		}
		return $args;
	}
endif;
add_filter('register_post_type_args', 'theme_default_post_type_args', 50, 2);
*/


/**
 * Rename Posts menu item for clarity and remove post taxonomies
 */
function theme_posts_menu_item_name() {
	global $menu;
	$menu[5][0] = __('Uutiset', 'premius');
}
add_action( 'admin_menu', 'theme_posts_menu_item_name' );

function theme_unregister_taxonomies() {
	unregister_taxonomy_for_object_type( 'category', 'post' );
	unregister_taxonomy_for_object_type( 'post_tag', 'post' );
}
add_action( 'init', 'theme_unregister_taxonomies' );


/** 
 * Register reading settings for theme 
 */
function theme_reading_settings(){ 
	
	// Register settings section below default reading settings
	add_settings_section(  
		'theme_reading_settings_section', // Section ID 
		__('Lukemisen lisäasetukset', 'premius'), // Section Title
		'theme_reading_settings_section_cb', // Callback
		'reading' // What Page?
	);

	// register our settings
	$args = array(
		'type' => 'string', 
		'sanitize_callback' => 'sanitize_text_field',
		'default' => NULL,
	);

	register_setting( 
		'reading', // option group "reading", default WP group
		'page_for_blog', // option name
		$args 
	);

	add_settings_field(
		'page_for_blog', // ID
		__('Blogiarkiston sivu', 'premius'), // Title
		'theme_services_page_setting_cb', // Callback
		'reading', // page
		'theme_reading_settings_section', // section
		array( 'label_for' => 'page_for_blog' )
	);
}
add_action('admin_init', 'theme_reading_settings');

/* Settings section callback */
function theme_reading_settings_section_cb($args){

	// echo wpautop( __('Section description', 'premius') );

}

function theme_services_page_setting_cb($args){

	// get saved page ID
	$blog_page_id = get_option('page_for_blog');

	// get all pages
	$args = array(
		'posts_per_page'	=> -1,
		'orderby'			=> 'name',
		'order'				=> 'ASC',
		'post_type'			=> 'page',
		'post_status'		=> array( 'any' ),
		'suppress_filters'	=> false,
	);
	$items = get_posts( $args );

	echo '<select id="page_for_blog" name="page_for_blog">';
	// empty option as default
	echo '<option value="0">— ' . __('Select') . ' —</option>';

	// foreach page we create an option element, with the post-ID as value
	foreach($items as $item) {

		// add selected to the option if value is the same as $blog_page_id
		$selected = ($blog_page_id == $item->ID) ? 'selected="selected"' : '';

		echo '<option value="' . $item->ID . '" ' . $selected . '>' . $item->post_title . '</option>';
	}

	echo '</select>';
}

/* Add custom states to post/page list */
function theme_add_custom_post_states($states) {
	global $post;

	// get saved project page IDs
	$blog_page_id = get_option('page_for_blog');

	if( 'page' == get_post_type($post->ID) && $post->ID == $blog_page_id && $blog_page_id != '0') {
		$states[] = __('Blogiarkiston sivu', 'premius');
	}

	return $states;
}
add_filter('display_post_states', 'theme_add_custom_post_states');


/** 
 * Show notification when editing page_for_blog
 */
if ( isset($_GET['post']) && get_option( 'page_for_blog' ) === $_GET['post'] ) {
	add_action( 'admin_enqueue_scripts', 'blog_page_edit_notification' );
}
function blog_page_edit_notification() {
	wp_add_inline_script(
		'wp-notices',
		sprintf(
			'wp.data.dispatch( "core/notices" ).createWarningNotice( "%s", { isDismissible: false } )',
			__( 'Muokkaat parhaillaan sivua, joka näyttää viimeisimmät blogikirjoitukset.', 'premius' )
		),
		'after'
	);
}