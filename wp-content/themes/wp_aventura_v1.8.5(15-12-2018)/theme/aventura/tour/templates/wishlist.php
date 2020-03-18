<?php
global $aventura_post_id,$aventura_wishlist_url,$aventura_wishlist;

$aventura_wishlist = array();
if ( is_user_logged_in() ) {
    $aventura_user_id = get_current_user_id();
    $aventura_wishlist = get_user_meta( $aventura_user_id, 'wishlist', true );
}

if ( ! is_array( $aventura_wishlist ) ) $aventura_wishlist = array();

$aventura_wishlist_url = aventura_get_tour_wishlist_page();

?>
<div class="tz-wishlist tour-layout-list">
    <?php
    if ( empty( $aventura_wishlist ) ) :
        if ( is_user_logged_in() ) {
            echo '<h5 class="empty-list">' . esc_html__( 'Your wishlist is empty.', 'aventura' ) . '</h5>';
        } else {
            echo '<h5 class="empty-list">' . esc_html__( 'You need to login to check your wishlist', 'aventura' ) . '</h5>';
        }
    else :
        foreach( $aventura_wishlist as $aventura_post_id ) {
            global $aventura_post_id;
            $aventura_post_type = get_post_type( $aventura_post_id );
            if ( ! empty( $aventura_post_type ) ) :
                aventura_get_template('tour-list-grid.php','/tour/templates/');
            endif;
        }
    endif;
    ?>
</div>