<?php

/* validation   */
global $aventura_options;
$aventura_required_params = array( 'tour_id' );
$aventura_cart_check = false;
foreach ( $aventura_required_params as $param ) {
    if ( isset( $_REQUEST[ $param ] ) ) {
        $aventura_cart_check = true;
    }
}
echo '<div class="tz-tour-cart">';

if($aventura_cart_check == false){
    echo '<h5 class="alert alert-warning">'.esc_html__( 'Your cart is currently empty.', 'aventura' ).'</h5>';
}else{
    /* init variables */
    $aventura_tour_id            = $_REQUEST['tour_id'];
    $aventura_people_available   = ( isset( $_REQUEST['people_available'] ) ) ? $_REQUEST['people_available'] : '';
    $aventura_first_name         = ( isset( $_REQUEST['first_name'] ) ) ? $_REQUEST['first_name'] : '';
    $aventura_last_name          = ( isset( $_REQUEST['last_name'] ) ) ? $_REQUEST['last_name'] : '';
    $aventura_email              = ( isset( $_REQUEST['your_email'] ) ) ? $_REQUEST['your_email'] : '';
    $aventura_phone              = ( isset( $_REQUEST['your_phone'] ) ) ? $_REQUEST['your_phone'] : '';
    $aventura_time               = ( isset( $_REQUEST['departure_time'] ) ) ? $_REQUEST['departure_time'] : '';
    $aventura_name_combo         = ( isset( $_REQUEST['name_combo'] ) ) ? $_REQUEST['name_combo'] : '';
    $aventura_people_combo       = ( isset( $_REQUEST['people_combo'] ) ) ? $_REQUEST['people_combo'] : '';
    $aventura_price_combo        = ( isset( $_REQUEST['price_combo'] ) ) ? $_REQUEST['price_combo'] : '';
    $aventura_price_adults       = ( isset( $_REQUEST['price_adults'] ) ) ? $_REQUEST['price_adults'] : 0;
    $aventura_price_child        = ( isset( $_REQUEST['price_child'] ) ) ? $_REQUEST['price_child'] : 0;
    $aventura_tour_type          =  get_post_meta( $aventura_tour_id, 'aventura_tour_type', true );
    $aventura_tour_date          =  get_post_meta( $aventura_tour_id, 'aventura_departure_date', true );
    $aventura_tour_discount      =  get_post_meta( $aventura_tour_id, 'aventura_tour_discount', true );

    if( !isset($aventura_tour_discount) ){
        $aventura_tour_discount = 0;
    }
    $aventura_date               =  '';
    if ( $aventura_tour_type == 'daily') {
        $aventura_date = $_REQUEST['date'];
    } else {
        $aventura_date = $aventura_tour_date;
    }
    $aventura_uid = $aventura_tour_id . str_replace( array('/') , '', $aventura_date )  . str_replace( array(':') , '', $aventura_time );

    if ( $aventura_tour_data = Aventura_Session_Cart::aventura_get( $aventura_uid ) ) {

        /*  Number  */
        $aventura_adults         = $aventura_tour_data['adults'];
        $aventura_kids           = $aventura_tour_data['kids'];
        $aventura_name_combo     = $aventura_tour_data['name_combo'];
        $aventura_people_combo   = $aventura_tour_data['people_combo'];
        /*  Price  */
        $aventura_price_combo    = $aventura_tour_data['price_combo'];
        $aventura_price_adults   = $aventura_tour_data['price_adults'];
        $aventura_price_kids     = $aventura_tour_data['price_child'];
        /*  Total  */
        $aventura_total_price    = $aventura_tour_data['total_price'];
        $aventura_total_adults   = $aventura_tour_data['total_adults'];

        $aventura_total_kids     = $aventura_tour_data['total_kids'];
    } else {
        /*  Number  */
        $aventura_adults         = ( isset( $_REQUEST['number_adults'] ) ) ? $_REQUEST['number_adults'] : 0;
        $aventura_kids           = ( isset( $_REQUEST['number_children'] ) ) ? $_REQUEST['number_children'] : 0;
        $aventura_name_combo     = ( isset( $_REQUEST['name_combo'] ) ) ? $_REQUEST['name_combo'] : '';
        $aventura_people_combo   = ( isset( $_REQUEST['people_combo'] ) ) ? $_REQUEST['people_combo'] : '';

        /*  Price  */
        $aventura_price_combo    = ( isset( $_REQUEST['price_combo'] ) ) ? $_REQUEST['price_combo'] : '';
        $aventura_price_adults   = ( isset( $_REQUEST['price_adults'] ) ) ? $_REQUEST['price_adults'] : 0;
        $aventura_price_kids     = ( isset( $_REQUEST['price_child'] ) ) ? $_REQUEST['price_child'] : 0;
        /*  Total  */
        $aventura_total_price    = aventura_tour_calc_tour_price( $aventura_tour_id, $aventura_date, $aventura_adults, $aventura_kids );
        if( $aventura_price_combo != '' && $aventura_price_combo != 'custom' ){
            $aventura_total_price = intval($aventura_price_combo);
        }
        $aventura_total_adults   = $aventura_price_adults*$aventura_adults;
        $aventura_total_kids     = $aventura_price_kids*$aventura_kids;

        $aventura_tour_data      = array(
            'adults'        => $aventura_adults,
            'kids'          => $aventura_kids,
            'name_combo'    => $aventura_name_combo,
            'people_combo'  => $aventura_people_combo,
            'price_combo'   => $aventura_price_combo,
            'price_adults'  => $aventura_price_adults,
            'price_child'   => $aventura_price_kids,
            'total_price'   => $aventura_total_price,
            'total_adults'  => $aventura_total_adults,
            'total_kids'    => $aventura_total_kids,
            'tour_id'       => $aventura_tour_id,
            'date'          => $aventura_date,
            'time'          => $aventura_time,
            'first_name'    => $aventura_first_name,
            'last_name'     => $aventura_last_name,
            'email'         => $aventura_email,
            'phone'         => $aventura_phone,
        );

        Aventura_Session_Cart::aventura_set( $aventura_uid, $aventura_tour_data );
    }

    $aventura_cart   = new Aventura_Session_Cart();
    $aventura_tour_checkout_page_url = apply_filters( 'aventura_get_woocommerce_cart_url', aventura_get_tour_checkout_page() );
    /*  main function    */
    if ( ! $aventura_tour_checkout_page_url ) { ?>
        <h5 class="alert alert-warning"><?php echo esc_html__( 'Please set checkout page in theme options panel.', 'aventura' ) ?></h5>
        <?php
    } else {
        $aventura_max_adults        = isset( $aventura_options['aventura_tour_detail_max_adults'] ) ? $aventura_options['aventura_tour_detail_max_adults'] : 3;
        $aventura_max_kids          = isset( $aventura_options['aventura_tour_detail_max_kids'] ) ? $aventura_options['aventura_tour_detail_max_kids'] : 0;

        $aventura_add_combo             =   aventura_metabox( 'aventura_add_combo','',$aventura_tour_id,'' );
        $aventura_add_combo_tour        =   aventura_metabox( 'aventura_add_combo_tour','',$aventura_tour_id,'' );

        $aventura_check_has_combo = false;
        foreach ( $aventura_add_combo_tour as $aventura_combo_item ) {
            if( $aventura_combo_item['price_combo'] != '' && $aventura_combo_item['people_combo'] != '' && $aventura_combo_item['name_combo'] != '' ){
                $aventura_check_has_combo = true;
            }
        }

        $aventura_class_has_combo = '';
        if ( $aventura_check_has_combo == true ){
            $aventura_class_has_combo = 'cart_has_combo';

            if( $aventura_price_combo != 'custom' ){
                $aventura_class_has_combo .= ' opacity';
            }
        }
        ?>

        <form id="tour-cart" action="<?php echo esc_url( add_query_arg( array('uid'=> $aventura_uid), $aventura_tour_checkout_page_url ) ); ?>">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <p class="book-message">
                        <?php echo esc_html__('Exceed the maximum number of people for this tour. The number of seats available is ','aventura')?>
                        <span class="book-number-available">10</span>
                    </p>
                    <table class="table table-striped cart-list tour add_bottom_30">
                        <thead><tr>
                            <th><?php echo esc_html__( 'Tour', 'aventura' ) ?></th>
                            <?php
                            if ( $aventura_check_has_combo == true ){
                                echo '<th>'.esc_html__( 'Combo', 'aventura' ).'</th>';
                            }
                            ?>
                            <th class="<?php echo esc_html($aventura_class_has_combo); ?>"><?php echo esc_html__( 'Adults', 'aventura' ) ?></th>
                            <th class="<?php echo esc_html($aventura_class_has_combo); ?>"><?php echo esc_html__( 'Children', 'aventura' ) ?></th>
                            <th><?php echo esc_html__( 'Time', 'aventura' ) ?></th>
                            <th><?php echo esc_html__( 'Date', 'aventura' ) ?></th>
                            <th><?php echo esc_html__( 'Total', 'aventura' ) ?></th>
                        </tr></thead>
                        <tbody>
                        <tr>
                            <td>
                                <div class="item_cart">
                                    <p data-toggle="modal" data-target="#tour-<?php echo esc_attr( $aventura_tour_id ) ?>">
                                        <?php echo esc_html( get_the_title( $aventura_tour_id ) ); ?>
                                    </p>
                                </div>
                            </td>
                            <?php if ( $aventura_check_has_combo == true ) : ?>
                                <td>
                                    <div class="item_cart combo_tours">
                                        <select id="select_combo">
                                            <?php
                                            foreach ( $aventura_add_combo_tour as $aventura_combo_tour ) {
                                                if( $aventura_price_combo == $aventura_combo_tour['price_combo'] ){
                                                    echo '<option  value="' . esc_attr( $aventura_combo_tour['price_combo'] ) . '" data-people-combo="' . esc_attr( $aventura_combo_tour['people_combo'] ) . '" selected>'. esc_html( $aventura_combo_tour['name_combo'] ) .'</option>';
                                                }else{
                                                    echo '<option  value="' . esc_attr( $aventura_combo_tour['price_combo'] ) . '" data-people-combo="' . esc_attr( $aventura_combo_tour['people_combo'] ) . '">'. esc_html( $aventura_combo_tour['name_combo'] ) .'</option>';
                                                }

                                            }

                                            ?>
                                            <option  value="custom" <?php if( $aventura_price_combo == 'custom' ){ echo 'selected';} ?>><?php esc_html_e('Choose Persons','aventura' ); ?></option>
                                        </select>
                                    </div>
                                </td>
                            <?php endif; ?>
                            <td>
                                <div class="input-number-ticket <?php echo esc_html($aventura_class_has_combo); ?>">
                                    <input class="input-number qty2 form-control tour-adults" name="adults" type="text" value="<?php echo esc_attr( $aventura_adults ); ?>" data-min="0" data-max="<?php echo esc_attr($aventura_max_adults); ?>" readonly="true"/>
                                    <span class="input-number-decrement"><i class="fa fa-caret-left"></i></span><span class="input-number-increment"><i class="fa fa-caret-right"></i></span>
                                </div>
                            </td>
                            <td>
                                <div class="input-number-ticket <?php echo esc_html($aventura_class_has_combo); ?>">
                                    <input class="input-number qty2 form-control tour-kids" name="kids" type="text" value="<?php echo esc_attr( $aventura_kids ); ?>" data-min="0" data-max="<?php echo esc_attr($aventura_max_kids); ?>" readonly="true"/>
                                    <span class="input-number-decrement"><i class="fa fa-caret-left"></i></span><span class="input-number-increment"><i class="fa fa-caret-right"></i></span>
                                </div>
                            </td>
                            <td>
                                <div class="item_cart">
                                    <p>
                                        <?php echo esc_html($aventura_time); ?>
                                    </p>
                                </div>
                            </td>
                            <td>
                                <div class="item_cart">
                                    <p>
                                        <?php echo date_i18n( 'j F Y', strtotime( $aventura_date ) ); ?>
                                    </p>
                                </div>
                            </td>
                            <td>
                                <div class="item_cart">
                                    <p>
                                        <strong>
                                            <?php if ( ! empty( $aventura_total_price ) ) echo aventura_price($aventura_total_price);?>
                                        </strong>
                                    </p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <p><strong><?php echo esc_html__( 'Subtotal', 'aventura' ) ?></strong></p>
                                <p><strong><?php echo esc_html__( 'Discount', 'aventura' ) ?></strong></p>
                            </th>
                            <?php
                            if ( $aventura_check_has_combo == true ){
                                echo '<td></td>';
                            }
                            ?>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <p><strong><?php if ( ! empty( $aventura_total_price ) ) echo aventura_price($aventura_total_price);?></strong></p>
                                <p><span><?php echo esc_html($aventura_tour_discount) . esc_html__('%','aventura');?></span></p>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <strong><?php echo esc_html__( 'Total', 'aventura' ) ?></strong>
                            </th>
                            <?php
                            if ( $aventura_check_has_combo == true ){
                                echo '<td></td>';
                            }
                            ?>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <p class="total">
                                    <strong>
                                        <?php
                                        $aventura_total = $aventura_total_price*(100-$aventura_tour_discount)/100;
                                        if ( ! empty( $aventura_total ) ):
                                            echo aventura_price($aventura_total);
                                        endif;
                                        ?>
                                    </strong>
                                </p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <a class="btn_full book-now-btn" href="#"><?php echo esc_html__( 'Proceed To Checkout', 'aventura' ) ?></a>
                    <div class="actions">
                        <a class="btn_full delete-cart-btn" href="#"><?php echo esc_html__( 'Delete Cart', 'aventura' ) ?></a>
                        <a class="btn_full update-cart-btn tz-btn-hide" href="#"><?php echo esc_html__( 'Update Cart', 'aventura' ) ?></a>
<!--                        <a class="btn_full update-cart-btn" href="#">--><?php //echo esc_html__( 'Update Cart', 'aventura' ) ?><!--</a>-->
                    </div>
                    <input type="hidden" name="action"      value="aventura_tour_book">
                    <input type="hidden" name="tour_id"     value="<?php echo esc_attr( $aventura_tour_id ) ?>">
                    <?php if($aventura_people_available != ''){?>
                        <input type="hidden" name="people_available" value="<?php echo $aventura_people_available;?>">
                    <?php } ?>
                    <input type="hidden" name="date"        value="<?php echo esc_attr( $aventura_date ) ?>">
                    <input type="hidden" name="time"        value="<?php echo esc_attr( $aventura_time ) ?>">
                    <input type="hidden" name="first_name"  value="<?php echo esc_attr( $aventura_first_name ) ?>">
                    <input type="hidden" name="last_name"   value="<?php echo esc_attr( $aventura_last_name ) ?>">
                    <input type="hidden" name="your_email"  value="<?php echo esc_attr( $aventura_email ) ?>">
                    <input type="hidden" name="your_phone"  value="<?php echo esc_attr( $aventura_phone ) ?>">
                    <input type="hidden" name="name_combo"  value="<?php echo esc_attr( $aventura_name_combo ) ?>">
                    <input type="hidden" name="people_combo"  value="<?php echo esc_attr( $aventura_people_combo ) ?>">
                    <input type="hidden" name="price_combo" value="<?php echo esc_attr( $aventura_price_combo ) ?>">
                    <input type="hidden" name="price_adults" value="<?php echo esc_attr( $aventura_price_adults ) ?>">
                    <input type="hidden" name="price_child" value="<?php echo esc_attr( $aventura_price_child ) ?>">
                    <input type="hidden" name="total_price" value="<?php echo esc_attr( $aventura_total_price ) ?>">
                    <input type="hidden" name="total_adults" value="<?php echo esc_attr( $aventura_total_adults ) ?>">
                    <input type="hidden" name="total_kids"  value="<?php echo esc_attr( $aventura_total_kids ) ?>">
                    <input type="hidden" name="cart_delete"  value="<?php echo esc_attr( aventura_get_tour_cart_page() ); ?>">
                    <?php wp_nonce_field( 'tour_update_cart' ); ?>
                </div>
            </div><!--End row -->
        </form>

        <?php
        if(aventura_is_woocommerce_integration_enabled()){
            echo '<input type="hidden" class="tour_woocommerce_enabled" data-wooenable="1"/>';
        }else{
            echo '<input type="hidden" class="tour_woocommerce_enabled" data-wooenable="0"/>';
        }
    }
}

echo '</div>';
?>