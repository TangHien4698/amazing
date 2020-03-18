<?php

global $wpdb, $aventura_options;

/*  Demo    */
$aventura_type = '';
if(isset($_GET['type']) && $_GET['type'] != ''){
    $aventura_type = $_GET['type'];
}

if( $aventura_type != 'confirm' ){

    if ( ! isset( $_REQUEST['booking_no'] ) || ! isset( $_REQUEST['pin_code'] ) ) {
        do_action( 'aventura_wrong_data' );
        exit;
    }
    $aventura_order = new Aventura_Tour_Order( $_REQUEST['booking_no'], $_REQUEST['pin_code'] );
    if ( ! $aventura_order_data = $aventura_order->aventura_get_order_info() ) {
        do_action('aventura_wrong_data');
        exit;
    }

    if ( empty( $aventura_order_data['deposit_paid'] ) ) {
        /* init payment variables   */
        $aventura_ItemName = sprintf( esc_html__( 'Deposit for your order %d', 'aventura' ), $aventura_order_data['id'] );
        $aventura_payment_data = array();
        $aventura_payment_data['item_name'] = $aventura_ItemName;
        $aventura_payment_data['item_number'] = $aventura_order_data['id'];
        $aventura_payment_data['item_desc'] = get_the_title( $aventura_order_data['post_id'] );
        if ( ! empty( $aventura_order_data['date_from'] ) ) $aventura_payment_data['item_desc'] .= ' ' . esc_html__( 'Date', 'aventura' ) . ' ' . aventura_get_phptime( $aventura_order_data['date_from'] );
        $aventura_payment_data['item_qty'] = 1;
        $aventura_payment_data['item_price'] = $aventura_order_data['total_price'];
        $aventura_payment_data['item_total_price'] = $aventura_payment_data['item_qty'] * $aventura_payment_data['item_price'];
        $aventura_payment_data['grand_total'] = $aventura_payment_data['item_total_price'];
        $aventura_payment_data['currency'] = strtoupper( $aventura_order_data['currency_code'] );
        $aventura_payment_data['return_url'] = aventura_get_current_page_url() . '?booking_no=' . $aventura_order_data['booking_no'] . '&pin_code=' . $aventura_order_data['pin_code'] . '&payment=success';
        $aventura_payment_data['cancel_url'] = aventura_get_current_page_url() . '?booking_no=' . $aventura_order_data['booking_no'] . '&pin_code=' . $aventura_order_data['pin_code'] . '&payment=failed';
        if($_REQUEST['payment_info'] != 'cash'){
            $aventura_payment_result = aventura_process_payment( $aventura_payment_data );
            /* after payment    */
            if ( $aventura_payment_result ) {
                if ( ! empty( $aventura_payment_result['success'] ) && ( $aventura_payment_result['method'] == 'paypal' ) ) {
                    $aventura_other_booking_data = array();
                    if ( ! empty( $aventura_order_data['other'] ) ) {
                        $aventura_other_booking_data = unserialize( $aventura_order_data['other'] );
                    }
                    $aventura_other_booking_data['pp_transaction_id'] = $aventura_payment_result['transaction_id'];
                    $aventura_order_data['deposit_paid'] = 1;
                    $aventura_update_status = $wpdb->update( $wpdb->prefix . 'aventura_order', array( 'deposit_paid' => $aventura_order_data['deposit_paid'], 'other' => serialize( $aventura_other_booking_data ), 'status' => 'new' ), array( 'booking_no' => $aventura_order_data['booking_no'], 'pin_code' => $aventura_order_data['pin_code'] ) );
                    if ( $aventura_update_status === false ) {
                        do_action( 'aventura_payment_update_booking_error' );
                    } elseif ( empty( $aventura_update_status ) ) {
                        do_action( 'aventura_payment_update_booking_no_row' );
                    } else {
                        do_action( 'aventura_payment_update_booking_success' );
                    }
                }
            }
        }
    }
    
    if ( empty( $aventura_order_data['mail_sent'] ) ) {
        do_action('aventura_order_conf_mail_not_sent', $aventura_order_data); /* mail is not sent */
    }

}else{
    $aventura_order_data['first_name']          =   'Templaza';
    $aventura_order_data['last_name']           =   '';
    $aventura_order_data['date_from']           =   '2018-09-09';
    $aventura_order_data['post_id']             =   920;
    $aventura_order_data['total_adults']        =   2;
    $aventura_order_data['total_kids']          =   1;
    $aventura_order_data['total_price']         =   550;
}

$aventura_adult_price   =   aventura_metabox( 'aventura_adult_price','',$aventura_order_data['post_id'],'' );
$aventura_child_price   =   aventura_metabox( 'aventura_child_price','',$aventura_order_data['post_id'],'' );
$aventura_discount      =   aventura_metabox( 'aventura_tour_discount','',$aventura_order_data['post_id'],'' );
?>
<div class="tz-tour-confirm">
    <div class="row">
        <div class="col-md-8 col-lg-8 col-sm-8 col-xs-12">
            <div class="form_title">
                <h3><strong><i class="fa fa-info-circle"></i></strong><?php echo esc_html__( 'Booking summary', 'aventura' ) ?></h3>
            </div>
            <div class="step summary">
                <span><?php echo esc_html__( 'You can check via booking information with below dashboard.', 'aventura' ) ?></span>
                <table class="table confirm">
                    <tbody>
                    <tr>
                        <td><strong><?php esc_html_e( 'Full Name', 'aventura' ); ?></strong></td>
                        <td><?php echo esc_html( $aventura_order_data['first_name'] . ' ' . $aventura_order_data['last_name'] ); ?></td>
                    </tr>
                    <?php if ( ! empty( $aventura_order_data['date_from'] ) && '0000-00-00' != $aventura_order_data['date_from'] ) : ?>
                        <tr>
                            <td><strong><?php esc_html_e( 'Date', 'aventura' ); ?></strong></td>
                            <td><?php echo date( 'j F Y', strtotime( $aventura_order_data['date_from'] ) ); ?></td>
                        </tr>
                    <?php endif; ?>
                    <tr>
                        <td><strong><?php esc_html_e( 'Tour Name', 'aventura' ); ?></strong></td>
                        <td><?php echo get_the_title( $aventura_order_data['post_id'] ); ?></td>
                    </tr>
                    <?php
                    if( $aventura_order_data['price_combo'] != '' && $aventura_order_data['price_combo'] != 'custom' ){?>
                        <tr>
                            <td><strong><?php esc_html_e( 'Combo Tour', 'aventura' ); ?></strong></td>
                            <td><?php echo esc_html( $aventura_order_data['name_combo'] ); ?></td>
                        </tr>
                        <?php
                    }else{ ?>
                        <tr>
                            <td><strong><?php esc_html_e( 'Adults', 'aventura' ); ?></strong></td>
                            <td><?php echo esc_html($aventura_order_data['total_adults']).' x '.esc_html( aventura_price($aventura_adult_price) ); ?></td>
                        </tr>
                        <?php if( $aventura_order_data['total_kids'] != 0 ){ ?>
                            <tr>
                                <td><strong><?php esc_html_e( 'Children', 'aventura' ); ?></strong></td>
                                <td><?php echo esc_html($aventura_order_data['total_kids']).' x '.esc_html( aventura_price($aventura_child_price) ); ?></td>
                            </tr>
                        <?php } ?>
                    <?php } ?>

                    <?php if( $aventura_discount != 0 && $aventura_discount != '0' ){ ?>
                        <tr>
                            <td><strong><?php esc_html_e( 'Discount', 'aventura' ); ?></strong></td>
                            <td><?php echo esc_html($aventura_discount.'%'); ?></td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td><strong><?php esc_html_e( 'TOTAL COST', 'aventura' ); ?></strong></td>
                        <td ><?php echo aventura_price( $aventura_order_data['total_price'] ); ?></td>
                    </tr>
                    </tbody>
                </table>
            </div><!--End step -->
        </div><!--End col-md-8 -->
        <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
            <div class="form_title">
                <h3><strong><i class="fa fa-check"></i></strong><?php esc_html_e( 'Thank you!', 'aventura' ) ?></h3>
            </div>
            <div class="step confirmed">
                <span><?php echo esc_html__( 'Your Booking Order is Confirmed Now.', 'aventura' ) ?></span>
                <?php if ( ! empty( $aventura_options['tour_thankyou_text_1'] ) ) : ?>
                    <p><?php echo esc_html( $aventura_options['tour_thankyou_text_1']); ?></p>
                <?php endif; ?>
            </div><!--End step -->
        </div>
    </div><!--End row -->
</div>