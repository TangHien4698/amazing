<?php
/*===============================
Shortocde Tour Checkout
*/
function shortcode_tour_checkout( $atts, $content = null ) {
    ob_start();
    aventura_get_template( 'checkout.php', '/tour/templates' );
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}
add_shortcode('tour_checkout','shortcode_tour_checkout');
?>