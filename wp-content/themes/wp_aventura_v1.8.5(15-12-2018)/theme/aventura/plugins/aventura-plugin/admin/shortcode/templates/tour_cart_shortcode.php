<?php
/*===============================
Shortocde Tour Cart
*/
function shortcode_tour_cart( $atts, $content = null ) {
    ob_start();
    aventura_get_template( 'cart.php', '/tour/templates' );
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}
add_shortcode('tour_cart','shortcode_tour_cart');
?>