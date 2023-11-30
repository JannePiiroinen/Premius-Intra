<?php 

/**
 * WPML specfic functions
 */


/* Privacy link text translation */
add_filter( 'option_wp_page_for_privacy_policy', function( $value ) {
    return apply_filters( 'wpml_object_id', $value, 'page', true );
});