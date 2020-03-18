<?php
global $aventura_options;
/* validation*/
$aventura_required_params = array( 'uid' );
foreach ( $aventura_required_params as $param ) {
    if ( ! isset( $_REQUEST[ $param ] ) ) {
        do_action( 'aventura_wrong_data' ); /* if data is not valid return to home  */
        exit;
    }
}
/* init variables   */
$aventura_uid = $_REQUEST['uid'];
if ( ! Aventura_Session_Cart::aventura_get( $aventura_uid ) ) {
    echo '<div class="tz-tour-checkout">';
    echo '<h5 class="alert alert-warning">'.esc_html__( 'Your cart is empty. Data will be loaded by check out page from Cart page.', 'aventura' ).'</h5>';
    echo '</div>';
}else{

    /* init variables*/
    $aventura_cart          =   new Aventura_Session_Cart();
    $aventura_tour_id       =   $aventura_cart->aventura_get_field( $aventura_uid, 'tour_id' );
    $aventura_date          =   $aventura_cart->aventura_get_field( $aventura_uid, 'date' );
    $aventura_time          =   $aventura_cart->aventura_get_field( $aventura_uid, 'time' );
    $aventura_adults        =   $aventura_cart->aventura_get_field( $aventura_uid, 'adults' );
    $aventura_kids          =   $aventura_cart->aventura_get_field( $aventura_uid, 'kids' );
    $aventura_name_combo    =   $aventura_cart->aventura_get_field( $aventura_uid, 'name_combo' );
    $aventura_people_combo  =   $aventura_cart->aventura_get_field( $aventura_uid, 'people_combo' );
    $aventura_price_combo   =   $aventura_cart->aventura_get_field( $aventura_uid, 'price_combo' );
    $aventura_total_price   =   $aventura_cart->aventura_get_field( $aventura_uid, 'total_price' );
    $aventura_total_adults  =   $aventura_cart->aventura_get_field( $aventura_uid, 'total_adults' );
    $aventura_total_kids    =   $aventura_cart->aventura_get_field( $aventura_uid, 'total_kids' );
    $aventura_first_name    =   $aventura_cart->aventura_get_field( $aventura_uid, 'first_name' );
    $aventura_last_name     =   $aventura_cart->aventura_get_field( $aventura_uid, 'last_name' );
    $aventura_email         =   $aventura_cart->aventura_get_field( $aventura_uid, 'email' );
    $aventura_phone         =   $aventura_cart->aventura_get_field( $aventura_uid, 'phone' );
    $aventura_countries     =   aventura_get_all_countries();
    $aventura_user_info     =   aventura_get_current_user_info();
    $aventura_discount      =   aventura_metabox( 'aventura_tour_discount','',$aventura_tour_id,'' );
    $aventura_adult_price   =   aventura_metabox( 'aventura_adult_price','',$aventura_tour_id,'' );
    $aventura_child_price   =   aventura_metabox( 'aventura_child_price','',$aventura_tour_id,'' );

    if( !isset($aventura_discount) ){
        $aventura_discount = 0;
    }
    $aventura_total = $aventura_total_price*(100-$aventura_discount)/100;
    ?>
    <div class="tz-tour-checkout">
        <?php
        if ( ! aventura_get_tour_confirm_page() ) { ?>
            <h5 class="alert alert-warning"><?php esc_html_e( 'Please set booking confirmation page in theme options panel.', 'aventura' ) ?></h5>
        <?php } else { ?>
            <form id="booking-form" action="<?php echo esc_url( aventura_get_tour_confirm_page() ); ?>">
                <div class="row">
                    <div class="col-md-8 col-lg-8 col-sm-8 col-xs-12">
                        <div class="form_title">
                            <h3><?php esc_html_e( 'Billing address', 'aventura' ) ?></h3>
                        </div>
                        <div class="form_content">
                            <div class="form-group">
                                <label><?php esc_html_e( 'First Name', 'aventura' ) ?></label>
                                <input type="text" class="form-control" name="first_name" value="<?php echo esc_attr( $aventura_first_name != '' ? $aventura_first_name : $aventura_user_info['first_name'] ) ?>">
                            </div>
                            <div class="form-group">
                                <label><?php esc_html_e( 'Last Name', 'aventura' ) ?></label>
                                <input type="text" class="form-control" name="last_name" value="<?php echo esc_attr( $aventura_last_name != '' ? $aventura_last_name : $aventura_user_info['last_name'] ) ?>">
                            </div>
                            <div class="form-group">
                                <label><?php esc_html_e( 'Company Name', 'aventura' ) ?></label>
                                <input type="text" class="form-control" name="company" value="<?php echo esc_attr( $aventura_user_info['company'] ) ?>">
                            </div>
                            <div class="form-group">
                                <label><?php esc_html_e( 'Country', 'aventura' ) ?></label>
                                <select class="form-control" name="country" id="country">
                                    <option value="" selected><?php esc_html_e( 'Select your country', 'aventura' ) ?></option>
                                    <?php foreach ( $aventura_countries as $aventura_country ) { ?>
                                        <option value="<?php echo esc_attr( $aventura_country['code'] ) ?>" <?php selected( $aventura_user_info['country_code'], $aventura_country['code'] ); ?>><?php echo esc_html( $aventura_country['name'] ) ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label><?php esc_html_e( 'Address', 'aventura' ) ?></label>
                                <input type="text" class="form-control" name="address" value="<?php echo esc_attr( $aventura_user_info['address'] ) ?>">
                            </div>
                            <div class="form-group">
                                <label><?php esc_html_e( 'Town / City', 'aventura' ) ?></label>
                                <input type="text" class="form-control" name="city" value="<?php echo esc_attr( $aventura_user_info['city'] ) ?>">
                            </div>
                            <div class="form-group">
                                <label><?php esc_html_e( 'State', 'aventura' ) ?></label>
                                <input type="text" class="form-control" name="state" value="<?php echo esc_attr( $aventura_user_info['state'] ) ?>">
                            </div>
                            <div class="form-group">
                                <label><?php esc_html_e( 'Postcode', 'aventura' ) ?></label>
                                <input type="text" class="form-control" name="zip" value="<?php echo esc_attr( $aventura_user_info['zip'] ) ?>">
                            </div>
                            <div class="form-group">
                                <label><?php esc_html_e( 'Email Address', 'aventura' ) ?></label>
                                <input type="text" class="form-control" name="email" value="<?php echo esc_attr( $aventura_email != '' ? $aventura_email : $aventura_user_info['email'] ) ?>">
                            </div>
                            <div class="form-group">
                                <label><?php esc_html_e( 'Phone', 'aventura' ) ?></label>
                                <input type="text" class="form-control" name="phone" value="<?php echo esc_attr( $aventura_phone != '' ? $aventura_phone : $aventura_user_info['phone'] ) ?>">
                            </div>
                            <div class="form-group">
                                <label><?php esc_html_e( 'Order Notes', 'aventura' ) ?></label>
                                <textarea class="form-control" name="order_notes" placeholder="<?php echo esc_attr( $aventura_user_info['order_notes'] ) ?>"></textarea>
                            </div>
                        </div><!--End step -->
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                        <div class="item tz_order">
                            <div class="form_title">
                                <h3><?php esc_html_e( 'Your Order', 'aventura' ) ?></h3>
                            </div>
                            <div class="box">
                                <div class="box-item info">
                                    <p><?php echo esc_html( get_the_title( $aventura_tour_id ) ); ?></p>
                                    <?php if($aventura_date != ''){ ?>
                                        <p><?php echo esc_html__('Booking Date: ','aventura').esc_html( $aventura_date ); ?></p>
                                    <?php }?>
                                    <?php if($aventura_time != ''){ ?>
                                        <p><?php echo esc_html__('Departure Time: ','aventura').esc_html( $aventura_time ); ?></p>
                                    <?php } ?>
                                    <?php if( $aventura_price_combo != '' && $aventura_price_combo != 'custom' ):
                                        echo '<p>'.esc_html__('Combo','aventura').': '.esc_html($aventura_name_combo).'</p>';
                                    else: ?>
                                        <p><?php echo esc_html__('Adults','aventura').' ('.aventura_price($aventura_adult_price).') x '.esc_html( $aventura_adults ); ?></p>
                                        <?php if( $aventura_kids != 0 ){ ?>
                                            <p><?php echo esc_html__('Children','aventura').' ('.aventura_price($aventura_child_price).') x '.esc_html( $aventura_kids ); ?></p>
                                        <?php } ?>
                                    <?php endif; ?>
                                    <span class="price"><?php echo esc_html(aventura_price($aventura_total)); ?></span>
                                </div>
                                <div class="box-item discount">
                                    <span class="title pull-left"><?php esc_html_e('Discount ','aventura'); ?></span>
                                    <span class="price pull-right"><?php echo esc_html($aventura_discount.'%'); ?></span>
                                </div>
                                <div class="box-item total">
                                    <span class="title pull-left"><?php esc_html_e('Total ','aventura'); ?></span>
                                    <span class="price pull-right"><?php echo esc_html(aventura_price($aventura_total)); ?></span>
                                </div>
                            </div>
                        </div>
                        <?php
                        if( ! empty( $aventura_options['aventura_payment_in_cash'] ) || ! empty( $aventura_options['aventura_pay_paypal'] ) || ! empty( $aventura_options['aventura_credit_card'] ) ):
                        ?>
                        <div class="item tz_payment">
                            <div class="form_title">
                                <h3><?php esc_html_e( 'Payment Method', 'aventura' ) ?></h3>
                            </div>
                            <div class="tz_paypal">

                                <?php if ( ! empty( $aventura_options['aventura_payment_in_cash'] ) ) : ?>
                                    <div class="form-group">
                                        <input class="form-radio-control" type="radio" name="payment_info" id="cash_payment" value="cash">
                                        <label for="paypal_payment"><?php esc_html_e( 'Cash', 'aventura' ) ?></label>
                                    </div>
                                <?php endif; ?>
                                <?php
                                if ( ! empty( $aventura_options['aventura_pay_paypal'] ) ) :
                                ?>
                                    <div class="form-group">
                                        <input class="form-radio-control" type="radio" name="payment_info" id="paypal_payment" value="paypal">
                                        <label for="paypal_payment"><?php esc_html_e( 'Paypal', 'aventura' ) ?></label>
                                    </div>
                                    <div id="paypal-container">
                                        <img src="<?php echo esc_url( get_template_directory_uri() .'/images/paypal_mastercard_maestro.png'); ?>" alt="<?php esc_html_e('PayPal Acceptance Mark','aventura'); ?>" width="319" height="110"/>
                                        <a href="<?php echo esc_url('https://www.paypal.com/us/webapps/mpp/paypal-popup') ?>" class="about_paypal" target="_blank" title="What is PayPal?"><?php esc_html_e( 'What is PayPal?', 'aventura' ) ?></a>
                                        <p class="paypal_desc"><?php esc_html_e( 'Pay via PayPal; you can pay with your credit card if you don\'t have a PayPal account.', 'aventura' ) ?></p>
                                    </div>
                                <?php endif;?>
                                <?php
                                if ( ! empty( $aventura_options['aventura_credit_card'] ) ) :
                                    ?>

                                    <div class="form-group">
                                        <input class="form-radio-control" type="radio" name="payment_info" id="cc_payment" value="cc">
                                        <label for="cc_payment"><?php echo esc_html__( 'Credit Card', 'aventura' ) ?></label>
                                    </div>

                                    <?php $billing_credircard = isset($_REQUEST['billing_credircard'])? esc_attr($_REQUEST['billing_credircard']) : ''; ?>
                                    <!-- Credit Card Payment -->
                                    <div id="cc-container">
                                        <div class="form-group">
                                            <label><?php echo esc_html__( 'Card Number', 'aventura' ) ?></label>
                                            <input class="form-control" type="text" size="19" maxlength="19" name="billing_credircard" value="<?php echo $billing_credircard; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label><?php echo esc_html__( 'Card Type', 'aventura' ) ?></label>
                                            <select name="billing_cardtype" class="form-control">
                                                <option value="Visa" selected="selected">Visa</option>
                                                <option value="MasterCard">MasterCard</option>
                                                <option value="Discover">Discover</option>
                                                <option value="Amex">American Express</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label><?php echo esc_html__( 'Expiration Date', 'aventura' ) ?></label>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <select name="billing_expdatemonth" class="form-control">
                                                        <option value=1>01</option>
                                                        <option value=2>02</option>
                                                        <option value=3>03</option>
                                                        <option value=4>04</option>
                                                        <option value=5>05</option>
                                                        <option value=6>06</option>
                                                        <option value=7>07</option>
                                                        <option value=8>08</option>
                                                        <option value=9>09</option>
                                                        <option value=10>10</option>
                                                        <option value=11>11</option>
                                                        <option value=12>12</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <select name="billing_expdateyear" class="form-control">
                                                        <?php
                                                        $today = (int)date('Y', time());
                                                        for($i = 0; $i < 8; $i++) {
                                                            ?>
                                                            <option value="<?php echo $today; ?>"><?php echo $today; ?></option>
                                                            <?php
                                                            $today++;
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label><?php echo esc_html__( 'Card Verification Number (CVV)', 'aventura' ) ?></label>
                                            <input class="form-control" type="text" size="4" maxlength="4" name="billing_ccvnumber" value="" />
                                        </div>
                                    </div>
                                    <?php
                                endif;
                                ?>
                                <!-- End Credit Card Payment -->
                                <button type="submit" class="btn_full book-now-btn"><?php echo esc_html__( 'Place Order', 'aventura' ) ?></button>
                                <input type="hidden" name="action" value="aventura_tour_submit_booking">
                                <input type="hidden" name="order_id" id="order_id" value="0">
                                <input type="hidden" name="uid" value="<?php echo esc_attr( $aventura_uid ) ?>">
                                <?php wp_nonce_field( 'checkout' ); ?>
                            </div><!--End step -->
                        </div>
                        <?php endif; ?>
                    </div>
                </div><!--End row -->
            </form>
        <?php } ?>
    </div>

<?php } ?>

