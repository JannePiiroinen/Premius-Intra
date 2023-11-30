<?php

/**
 * Rewrite common WP slugs and add necessary rewrites
 */
add_action('init', function() {
	global $wp_rewrite;
	$wp_rewrite->pagination_base = _x('sivu', 'Sivutuksen "slug", älä muuta, jos et ole varma mitä tämä tarkoittaa.', 'premius');
	$wp_rewrite->extra_rules_top[__('blogi', 'premius') . '/' . _x('sivu', 'Sivutuksen "slug", älä muuta, jos et ole varma mitä tämä tarkoittaa.', 'premius') . '/([0-9]{1,})/?$'] = 'index.php?post_type=blog&paged=$matches[1]';
	// vdd( $wp_rewrite );
});

/**
 * Allow editor role to edit privacy policy page
 * @link https://wordpress.stackexchange.com/questions/318666/how-to-allow-editor-to-edit-privacy-page-settings-only
 */
if( !function_exists('theme_custom_manage_privacy_options') ) :
	function theme_custom_manage_privacy_options($caps, $cap, $user_id, $args){
		if( !is_admin() )
			return $caps;

		$user_meta = get_userdata($user_id);
		if ( $user_meta && array_intersect(['editor', 'administrator'], $user_meta->roles)) {
			if ('manage_privacy_options' === $cap) {
				$manage_name = is_multisite() ? 'manage_network' : 'manage_options';
				$caps = array_diff($caps, [ $manage_name ]);
			}
		}
		return $caps;
	}
endif;
add_action('map_meta_cap', 'theme_custom_manage_privacy_options', 1, 4);


/**
 * Add extra stuff like language switcher, search etc. to a menu.
 */
function theme_add_menu_extras($items, $args) {

	if( !isset($args->extras) )
		return $items;
	
	// Items to array
	$items = preg_replace( '/<\/li>\s?<li/', '</li>|<li',  $items );
	$array_items = explode( '|', $items );

	foreach ($args->extras as $type => $position) {
		if( $type === 'search' ) {
			ob_start(); ?>
			<a href="<?php echo home_url( '?' . _x('haku', 'Hakuparametrin nimi, älä muuta, jos et ole varma mitä tämä tarkoittaa.', 'premius') ); ?>" class="">
				<span class="hide-for-large"><?php _e('Hae sivustolta', 'premius'); ?></span>
				<img src="<?php echo get_theme_file_uri() ?>/img/icon-search.svg" alt="<?php  _e('Hae sivustolta', 'premius') ?>" />
			</a>
			<?php
			$output = ob_get_clean();
			$new_item = array( '<li class="menu-item menu-item-type-' . $type . '">' . $output . '</li>' );
		}
		elseif( $type === 'lang_switch' && function_exists('icl_get_languages') ) {
			$languages = icl_get_languages();
			ob_start(); ?>
			<?php if( $languages && count($languages) <= 2 ) : ?>
				<?php foreach( $languages as $key => $value ) : if( $value['active'] == 1 ) continue; ?>
				<a href="<?php echo $value['url'] ?>" class="">
					<?php echo strtoupper( $key ); ?>
				</a>
				<?php endforeach; ?>
			<?php else : ?>
				<span class="current-language">
					<?php echo strtoupper( ICL_LANGUAGE_CODE ); ?>
				</span>
				<ul>
					<?php foreach( $languages as $key => $value ) : if( $value['active'] == 1 ) continue; ?>
					<li>
						<a href="<?php echo $value['url'] ?>" class="">
							<?php echo strtoupper( $key ); ?>
						</a>
					</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
			<?php
			$output = ob_get_clean();
			$new_item = array( '<li class="menu-item menu-item-type-' . $type . '">' . $output . '</li>' );
		}
		
		array_splice( $array_items, $position, 0, $new_item ); // splice in at given position

	}
	$items = implode( '', $array_items );

	// vdd( $items );
	
	return $items;

}
add_filter( 'wp_nav_menu_items', 'theme_add_menu_extras', 10, 2 );

/**
 * Output FAQ schema from accordion block
 */
if( !function_exists('theme_output_faq_schema') ) :
	function theme_output_faq_schema() {

		$post_id = get_queried_object_id();

		if( !is_admin() && WP_Block_Type_Registry::get_instance()->is_registered( 'acf/accordion' ) && has_block( 'acf/accordion', $post_id ) ) : 
			$accordions = get_post_blocks_by_type(
				parse_blocks( get_the_content() ),
				'acf/accordion'
			);
			// If any of the accordions have "output_faq_schema" set to true
			if( key_value_exists('output_faq_schema', 1, $accordions) ) :

				$questions = array();
				foreach( $accordions as $accordion) {

					$i = 0;
					while( array_key_exists("accordion_items_${i}_accordion_item_heading", $accordion['attrs']['data']) ){
						$questions[$i]['q'] = $accordion['attrs']['data']["accordion_items_${i}_accordion_item_heading"];
						$questions[$i]['a'] = $accordion['attrs']['data']["accordion_items_${i}_accordion_item_content"];
						$i++;
					}
				}

				?>
				<script type="application/ld+json">
				{
				"@context": "https://schema.org",
				"@type": "FAQPage",
				"mainEntity": [
				<?php $i = 1; foreach( $questions as $question ) : ?>
				{
					"@type": "Question",
					"name": "<?php echo $question['q'] ?>",
					"acceptedAnswer": {
						"@type": "Answer",
						"text": "<?php echo $question['a'] ?>"
					}
				}<?php echo $i < count($questions) ? ',' : '';
				$i++; endforeach; ?>
				]}
				</script>
			<?php endif;
		endif;
	}
endif;
add_action( 'wp_head', 'theme_output_faq_schema', 1);

/**
 * Preconnect tags for external resources
 * Comment / uncomment as needed
 */
if( !function_exists('theme_head_preconnect_tags') ) :
	function theme_head_preconnect_tags() {
		// Vimeo
		// echo '<link rel="preconnect" href="https://player.vimeo.com">';
		// echo '<link rel="preconnect" href="https://i.vimeocdn.com">';
		// echo '<link rel="preconnect" href="https://f.vimeocdn.com">';

		// Google Fonts
			// echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
			// echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';

			// Adobe Fonts
			echo '<link rel="preconnect" href="https://use.typekit.net">';

			// cdnjs
			// echo '<link rel="preconnect" href="https://cdnjs.cloudflare.com">';
	}
endif;
add_action( 'wp_head', 'theme_head_preconnect_tags', 1);


/**
 * Set admin favicon
 */
if( !function_exists('theme_admin_favicon') ) :
	function theme_admin_favicon() {
		
		$uri = get_template_directory_uri() . '/favicon/';
		$dir = get_template_directory() . '/favicon/';
		$favicon = 'favicon.ico';

		if( file_exists( $dir . $favicon ) )
			echo '<link rel="shortcut icon" href="' . $uri . $favicon . '" />';

		?>
		<style>
			.acf-color-picker .wp-picker-holder {
				position: absolute;
			}
			.hide-if-no-customize {
				display: none !important;
			}
		</style>
		<?php
	}
endif;
add_action( 'admin_head', 'theme_admin_favicon' );


/**
 * Custom excerpt length
 */
if( !function_exists('theme_excerpt_length') ) :
function theme_excerpt_length( $length ) {
	return 20;
}
endif;
add_filter( 'excerpt_length', 'theme_excerpt_length', 999 );

/**
 * Custom excerpt more
 */
if( !function_exists('theme_excerpt_more') ) :
	function theme_excerpt_more( $more ) {
		return '&hellip;';
	}
endif;
add_filter( 'excerpt_more', 'theme_excerpt_more', 999 );


/**
 * Limit dashboard (/wp-admin/) access for certain user roles
 */
if( !function_exists('theme_disable_dashboard') ) :
	function theme_disable_dashboard() {
		$user = wp_get_current_user();
		$allowed_roles = array( 'administrator', 'shop_manager', 'editor', 'author' );
		if ( is_admin() && count( array_intersect($user->roles, $allowed_roles) ) == 0 && !is_super_admin() && !( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) {
			wp_redirect( wp_login_url() );
			exit;
		}
	}
endif;
add_action( 'init', 'theme_disable_dashboard' );


/**
 * Show admin bar only for certain user roles
 */
if( !function_exists('theme_remove_admin_bar') ) :
	function theme_remove_admin_bar() {
		$user = wp_get_current_user();
		$show_to_roles = array( 'administrator', 'shop_manager', 'editor', 'author' );
		if ( !array_intersect( $show_to_roles, $user->roles ) && !is_super_admin() ) {
			show_admin_bar(false);
		}
	}
endif;
add_action( 'wp', 'theme_remove_admin_bar' );
add_action( 'admin_init', 'theme_remove_admin_bar', 9 );


/**
 * Login redirect based on user roles
 */
if( !function_exists('theme_login_redirect') ) :
	function theme_login_redirect( $url, $request, $user ) {
		$user = wp_get_current_user();
		$show_to_roles = array( 'administrator', 'shop_manager', 'editor', 'author' );
		if ( !array_intersect( $show_to_roles, $user->roles ) && !is_super_admin() ) {
			return $url;
		}
		else {
			if( $request )
				return $request;
			else 
				return home_url();

		}
	}
endif;
add_action('login_redirect','theme_login_redirect', 10, 3);


/**
 * Remove Admin Bar CSS
 * @link https://davidwalsh.name/remove-wordpress-admin-bar-css
 */
if( !function_exists('theme_remove_admin_login_header') ) :
	function theme_remove_admin_login_header() {
		remove_action('wp_head', '_admin_bar_bump_cb');
	}
endif;
add_action('get_header', 'theme_remove_admin_login_header');


/**
 * Register widget areas
 *
 * @since 1.0.0
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 * @return void
 */
if( !function_exists('theme_register_widget_areas') ) :
	function theme_register_widget_areas() {

		register_sidebar(
			array(
				'name' => esc_html__( 'Alatunniste', 'premius' ),
				'id' => 'footer-widgets',
				'description' => esc_html__( 'Lisää alatunnisteen sisältö tähän', 'premius' ),
				'before_widget' => '',
				'after_widget' => '',
				'before_sidebar' => '',
				'after_sidebar' => '',
				'before_title' => '',
				'after_title' => '',
			)
		);
	}
endif;
add_action( 'widgets_init', 'theme_register_widget_areas' );


/**
 * Add admin menu for reusable blocks
 */
add_action( 'admin_menu', function() {
    add_menu_page( 'Uudelleenkäytettävät lohkot', 'Lohkot', 'edit_posts', 'edit.php?post_type=wp_block', '', 'dashicons-editor-table', 35 );
});


/**
 * Change search parameter
 */
add_filter('init', function(){
	global $wp;

	$wp->add_query_var( _x('haku', 'Hakuparametrin nimi, älä muuta, jos et ole varma mitä tämä tarkoittaa.', 'premius') );
	$wp->remove_query_var( 's' );
} );


add_filter( 'request', function( $request ){
	if ( isset( $_REQUEST[_x('haku', 'Hakuparametrin nimi, älä muuta, jos et ole varma mitä tämä tarkoittaa.', 'premius')] ) ){
		$request['s'] = $_REQUEST[_x('haku', 'Hakuparametrin nimi, älä muuta, jos et ole varma mitä tämä tarkoittaa.', 'premius')];
	}

	return $request;
} );

/**
 * Change Yoast SEO title for the search page if no search term
 */
add_filter( 'wpseo_title', function( $title ){

	if ( is_search() && empty( $_REQUEST[_x('haku', 'Hakuparametrin nimi, älä muuta, jos et ole varma mitä tämä tarkoittaa.', 'premius')] ) ){
		$title = __( 'Haku', 'premius' );
	}
	return $title;
	
} );


/**
 * Boost exact mathes in search
 * 
 * @link https://www.relevanssi.com/user-manual/filter-hooks/relevanssi_exact_match_bonus/
 */
add_filter( 'relevanssi_exact_match_bonus', function() {
	return array( 'title' => 10, 'content' => 5 );
} );