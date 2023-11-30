<?php



function hexify($rgba_arr) {

	$r = ($rgba_arr['red'] * $rgba_arr['alpha']) + (255 * (1 - $rgba_arr['alpha']));
	$g = ($rgba_arr['green'] * $rgba_arr['alpha']) + (255 * (1 - $rgba_arr['alpha']));
	$b = ($rgba_arr['blue'] * $rgba_arr['alpha']) + (255 * (1 - $rgba_arr['alpha']));

	return "rgb( {$r}, {$g}, {$b} )";

}

function vd($var, $admin = true) {
	
	if( 
		$admin === false || 
		( $admin === true && current_user_can( 'administrator' ) ) || 
		( $admin == get_current_user_id() && current_user_can( 'administrator' ) ) 
	){
		echo '<pre>';
		var_dump($var);
		echo '</pre>';
	}

}

function vdd($var, $admin = true) {
	
	if( 
		$admin === false || 
		( $admin === true && current_user_can( 'administrator' ) ) || 
		( $admin == get_current_user_id() && current_user_can( 'administrator' ) ) 
	){
		echo '<pre>';
		var_dump($var);
		echo '</pre>';
		
		die();
	}

}

// Check if current user or certain user id has admin role
function is_admin_user($admin = true) {
	if( 
		( $admin === true && current_user_can( 'administrator' ) ) || 
		( $admin === intval( get_current_user_id() ) && current_user_can( 'administrator' ) ) 
	)
		return true;
	else
		return false;
}

/**
 * Get current post type
 * @link https://wp-mix.com/get-current-post-type-wordpress/
 */

function get_current_post_type() {
	
	global $post, $typenow, $current_screen;
	
	if ($post && $post->post_type) return $post->post_type;
	
	elseif($typenow) return $typenow;
	
	elseif($current_screen && $current_screen->post_type) return $current_screen->post_type;
	
	elseif(isset($_REQUEST['post_type'])) return sanitize_key($_REQUEST['post_type']);
	
	return null;
	
}

/**
 * Processes a block list output from the parse_blocks() function
 * and returns a flat list of block arrays matching the specified
 * type.
 * 
 * @param array	$blocks Output from parse_blocks().
 * @param string $type The block type handle to search for.
 * @return array An array of all block arrays with the specified type.
 * 
 * @link https://wordpress.stackexchange.com/a/390426/96565
 **/

function get_post_blocks_by_type( $blocks, $type ) {
	$matches = [];

	foreach( $blocks as $block ) {
		if( $block['blockName'] === $type )
			$matches[] = $block;

		if( count( $block['innerBlocks'] ) ) {
			$matches = array_merge(
				$matches,
				get_post_blocks_by_type( $block['innerBlocks'], $type )
			);
		}
	}

	return $matches;
}

function key_value_exists($needle_key, $needle_value, $haystack) {

	foreach ($haystack as $key => $value) {
		if ($key == $needle_key && $value == $needle_value) {
			return true;
		}
		if (is_array($value)) {
			if( key_value_exists($needle_key, $needle_value, $value) ){
				return true;
			}
		}
	}
	return false;
}