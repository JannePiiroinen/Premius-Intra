<?php

/**
 * Gravity Forms specific functions
 */


/**
 * Hide Gravity Forms required legend
 * @link https://docs.gravityforms.com/gform_required_legend/
 */
add_filter( 'gform_required_legend', '__return_empty_string' );

/*
add_filter( 'gform_submit_button', function( $button, $form ){
    return '<button class="button gform_button" type="submit">' . $button->value . '</button>';
}, 10, 2 );
*/


/**
 * Allow Editors to Forms
 */
add_action( 'admin_init', function(){
    $role = get_role( 'editor' );
    $role->add_cap( 'gform_full_access' );
});


/**
 * GP Limit Choices // Gravity Perks // Display How Many Spots Left
 *
 * Display how many spots are left in the choice label when using the GP Limit Choices perk
 * http://gravitywiz.com/gravity-perks/
 */

add_filter( 'gplc_remove_choices', '__return_false' );

add_filter( 'gplc_pre_render_choice', 'my_add_how_many_left_message', 10, 5 );
function my_add_how_many_left_message( $choice, $exceeded_limit, $field, $form, $count ) {
    $limit         = method_exists( gp_limit_choices(), 'get_choice_limit' ) ? gp_limit_choices()->get_choice_limit( $choice, $field->formId, $field->id ) : rgar( $choice, 'limit' );
    $how_many_left = max( $limit - $count, 0 );

    // translators: placeholder is number of remaining spots left
    $message = sprintf( _n( '(%s paikka jäljellä)', '(%s paikkaa jäljellä)', $how_many_left, 'gp-limit-choices' ), number_format_i18n( $how_many_left ) );

    $choice['text'] = $choice['text'] . " $message";

    return $choice;
}