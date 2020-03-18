<?php
/*
 * Add Shortcode buttons in TinyMCE
 */

global $tz_elements;
$tz_elements = array(
    'youtube',
    'vimeo',
    'image',
    'tour_cart',
    'tour_checkout',
    'tour_confirm',
    'tour_wishlist',
);

foreach ( $tz_elements as $element ):
    include ( 'templates/'. $element .'_shortcode.php' );
endforeach;


add_action('init','plazart_add_buttons_to_tinymce');
function plazart_add_buttons_to_tinymce() {
    // check action user
    if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) :
        return;
    endif;

    if ( get_user_option('rich_editing') == true ):
        add_filter('mce_external_plugins','plazart_add_js_shortcode');
        add_filter('mce_buttons','plazart_register_button');
    endif;
} // end function register shortcode for tinymce

// function register js
function plazart_add_js_shortcode($plugin_array) {

    $tinymce_js = PLUGIN_PATH .'/admin/shortcode/tinymce.js';
    $plugin_array['ct_shortcode'] = $tinymce_js;

    return $plugin_array;
}
// function register button
function plazart_register_button($buttons) {

    array_push( $buttons, "|", "ct_shortcode_button" );
    return $buttons;
}
?>