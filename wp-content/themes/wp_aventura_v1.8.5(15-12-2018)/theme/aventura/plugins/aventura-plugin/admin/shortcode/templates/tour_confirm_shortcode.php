<?php
/*===============================
Shortocde Tour Confirm
*/

function shortcode_tour_confirm( $atts, $content = null ) {
    ob_start();
    aventura_get_template( 'confirm.php', '/tour/templates' );
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}
add_shortcode('tour_confirm','shortcode_tour_confirm');
?>