<?php
/*===============================
Shortocde Tour Cart
*/
function shortcode_tour_wishlist( $atts, $content = null ) {
    ob_start();
    aventura_get_template( 'wishlist.php', '/tour/templates' );
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}
add_shortcode('tour_wishlist','shortcode_tour_wishlist');
?>