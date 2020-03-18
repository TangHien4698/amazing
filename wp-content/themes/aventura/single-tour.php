<?php
get_header();
$aventura_tour_type             =   aventura_metabox( 'aventura_tour_type','','','' );
$aventura_duration              =   aventura_metabox( 'aventura_tour_duration','','','' );
$aventura_departure_date        =   aventura_metabox( 'aventura_departure_date','','','' );
$aventura_tour_start_date       =   aventura_metabox( 'aventura_tour_start_date','','','' );
$aventura_tour_end_date         =   aventura_metabox( 'aventura_tour_end_date','','','' );
$aventura_tour_available_days   =   aventura_metabox( 'aventura_available_days','','','' );
$aventura_tour_external_note    =   aventura_metabox( 'aventura_tour_external_note','','','' );
$aventura_tour_external_button  =   aventura_metabox( 'aventura_tour_external_button','','',esc_html__('Book Now','aventura') );
$aventura_tour_external_link    =   aventura_metabox( 'aventura_tour_external_link','','','#' );
$aventura_itinerary             =   aventura_metabox( 'aventura_tour_itinerary','','','' );
$aventura_location_des          =   aventura_metabox( 'aventura_introduce_location','','','' );
$aventura_map                   =   aventura_metabox( 'map','','','' );
$aventura_address               =   aventura_metabox( 'address','','','' );
$aventura_discount              =   aventura_metabox( 'aventura_tour_discount','','','0' );
$aventura_add_combo             =   aventura_metabox( 'aventura_add_combo','','','' );
$aventura_add_combo_tour        =   aventura_metabox( 'aventura_add_combo_tour','','','' );
$aventura_adult_price           =   aventura_metabox( 'aventura_adult_price','','','0' );
$aventura_child_price           =   aventura_metabox( 'aventura_child_price','','','0' );
$aventura_image_itinerary       =   aventura_metabox( 'aventura_tour_image_itinerary_option','','','');
$aventura_destination           =   aventura_metabox( 'aventura_tour_destination','','','' );
$aventura_tour_guide            =   aventura_metabox( 'aventura_tour_guide','','','' );
$aventura_departure_time        =   aventura_metabox( 'aventura_departure_time','','','' );

/* Book & Contact Option*/
$aventura_booking_head_option        =   aventura_metabox( 'aventura_tour_booking_head_option','','','default' );
$aventura_booking_head_display       =   aventura_metabox( 'aventura_tour_booking_head_display','','','1' );
$aventura_booking_form_option        =   aventura_metabox( 'aventura_tour_booking_form_option','','','default' );
$aventura_booking_form_display       =   aventura_metabox( 'aventura_tour_booking_form_display','','','1' );
$aventura_tour_contact_option        =   aventura_metabox( 'aventura_tour_contact_option','','','default' );
$aventura_tour_contact_display       =   aventura_metabox( 'aventura_tour_contact_display','','','1' );

$aventura_check_has_combo = false;
foreach ( $aventura_add_combo_tour as $aventura_combo_item ) {
    if( $aventura_combo_item['price_combo'] != '' && $aventura_combo_item['people_combo'] != '' && $aventura_combo_item['name_combo'] != '' ){
        $aventura_check_has_combo = true;
    }
}

$aventura_date = '';
if( $aventura_tour_type == 'daily' ){
    $aventura_date = $aventura_tour_start_date;
}else{
    $aventura_date = $aventura_departure_date;
}

global $aventura_options,$aventura_booking_form_show,$aventura_adult_price,$aventura_child_price,$aventura_contact_description,$aventura_contact_form,$aventura_booking_sidebar,$aventura_type,$aventura_sidebar_class,$aventura_discount;

$aventura_contact_option        = ((!isset($aventura_options['aventura_tour_detail_contact_option'])) || empty($aventura_options['aventura_tour_detail_contact_option'])) ? '1' : $aventura_options['aventura_tour_detail_contact_option'];
$aventura_contact_description   = ((!isset($aventura_options['aventura_tour_detail_contact_description'])) || empty($aventura_options['aventura_tour_detail_contact_description'])) ? '' : $aventura_options['aventura_tour_detail_contact_description'];
$aventura_contact_form          = ((!isset($aventura_options['aventura_tour_detail_contact_form'])) || empty($aventura_options['aventura_tour_detail_contact_form'])) ? '' : $aventura_options['aventura_tour_detail_contact_form'];

$aventura_booking_head      = isset( $aventura_options['aventura_tour_detail_booking_head'] ) ? $aventura_options['aventura_tour_detail_booking_head'] : '1';
$aventura_price_box         = isset( $aventura_options['aventura_tour_detail_price_box'] ) ? $aventura_options['aventura_tour_detail_price_box'] : '1';
$aventura_phone             = isset( $aventura_options['aventura_tour_detail_phone'] ) ? $aventura_options['aventura_tour_detail_phone'] : '';
$aventura_booking_sidebar   = isset( $aventura_options['aventura_tour_detail_booking_sidebar'] ) ? $aventura_options['aventura_tour_detail_booking_sidebar']:'right';
//var_dump($aventura_booking_head);

/*  Booking Form Option */
$aventura_booking_form      = isset( $aventura_options['aventura_tour_detail_form_booking'] ) ? $aventura_options['aventura_tour_detail_form_booking'] : '1';
$aventura_first_name_show   = isset( $aventura_options['aventura_tour_detail_first_name'] ) ? $aventura_options['aventura_tour_detail_first_name'] : '1';
$aventura_first_name_label  = isset( $aventura_options['aventura_tour_detail_first_name_label'] ) ? $aventura_options['aventura_tour_detail_first_name_label'] : '';
$aventura_last_name_show    = isset( $aventura_options['aventura_tour_detail_last_name'] ) ? $aventura_options['aventura_tour_detail_last_name'] : '1';
$aventura_last_name_label   = isset( $aventura_options['aventura_tour_detail_last_name_label'] ) ? $aventura_options['aventura_tour_detail_last_name_label'] : '';
$aventura_email_show        = isset( $aventura_options['aventura_tour_detail_email'] ) ? $aventura_options['aventura_tour_detail_email'] : '1';
$aventura_email_label       = isset( $aventura_options['aventura_tour_detail_email_label'] ) ? $aventura_options['aventura_tour_detail_email_label'] : '';
$aventura_field_phone_show  = isset( $aventura_options['aventura_tour_detail_field_phone'] ) ? $aventura_options['aventura_tour_detail_field_phone'] : '1';
$aventura_field_phone_label = isset( $aventura_options['aventura_tour_detail_field_phone_label'] ) ? $aventura_options['aventura_tour_detail_field_phone_label'] : '';
$aventura_departure_label   = isset( $aventura_options['aventura_tour_detail_departure_label'] ) ? $aventura_options['aventura_tour_detail_departure_label'] : '';
$aventura_field_time_show   = isset( $aventura_options['aventura_tour_detail_field_time'] ) ? $aventura_options['aventura_tour_detail_field_time'] : '1';
$aventura_departure_time_label   = isset( $aventura_options['aventura_tour_detail_departure_time_label'] ) ? $aventura_options['aventura_tour_detail_departure_time_label'] : '';
$aventura_adults_label      = isset( $aventura_options['aventura_tour_detail_adults_label'] ) ? $aventura_options['aventura_tour_detail_adults_label'] : '';
$aventura_children_label    = isset( $aventura_options['aventura_tour_detail_children_label'] ) ? $aventura_options['aventura_tour_detail_children_label'] : '';
$aventura_booking_text      = isset( $aventura_options['aventura_tour_detail_button_text'] ) ? $aventura_options['aventura_tour_detail_button_text'] : '';
$aventura_max_adults        = isset( $aventura_options['aventura_tour_detail_max_adults'] ) ? $aventura_options['aventura_tour_detail_max_adults'] : 3;
$aventura_max_kids          = isset( $aventura_options['aventura_tour_detail_max_kids'] ) ? $aventura_options['aventura_tour_detail_max_kids'] : 0;
/*  End Booking Form Option */

$aventura_decimal_prec       = isset( $aventura_options['aventura_currency_decimal_prec'] ) ? $aventura_options['aventura_currency_decimal_prec'] : 2;
$aventura_decimal_sep        = isset( $aventura_options['aventura_currency_decimal_sep'] ) ? $aventura_options['aventura_currency_decimal_sep'] : '.';
$aventura_thousands_sep      = isset( $aventura_options['aventura_currency_thousands_sep'] ) ? $aventura_options['aventura_currency_thousands_sep'] : ',';

$aventura_itinerary_options  = isset( $aventura_options['aventura_tour_detail_itinerary_option'] ) ? $aventura_options['aventura_tour_detail_itinerary_option'] : 1;
$aventura_location_options   = isset( $aventura_options['aventura_tour_detail_location_option'] ) ? $aventura_options['aventura_tour_detail_location_option'] : 1;
$aventura_reviews_options    = isset( $aventura_options['aventura_tour_detail_reviews_option'] ) ? $aventura_options['aventura_tour_detail_reviews_option'] : 1;
$aventura_other_tour_options = isset( $aventura_options['aventura_tour_detail_other_option'] ) ? $aventura_options['aventura_tour_detail_other_option'] : 1;

$aventura_tour_start_date_milli_sec = 0;
if ( ! empty( $aventura_tour_end_date ) ) {
    $aventura_tour_start_date_milli_sec = strtotime( $aventura_tour_start_date) * 1000;
}

$aventura_tour_end_date_milli_sec = 0;
if ( ! empty( $aventura_tour_end_date ) ) {
    $aventura_tour_end_date_milli_sec = strtotime( $aventura_tour_end_date) * 1000;
}

$aventura_type = '';
if(isset($_GET['type']) && $_GET['type'] != ''){
    $aventura_type = $_GET['type'];
}

$aventura_tour_single_class = 'tz-tour-single';

if( $aventura_booking_sidebar == 'none' || $aventura_type == 'booking_none' ){
    $aventura_tour_single_class .= ' tz-tour-single-sidebar-none';
} elseif( $aventura_booking_sidebar == 'left' || $aventura_type == 'booking_left' ){
    $aventura_tour_single_class .= ' tz-tour-single-sidebar-left';
} else{
    $aventura_tour_single_class .= ' tz-tour-single-sidebar-right';
}

$aventura_sidebar_class = 'col-lg-9 col-md-8 col-sm-8 col-xs-12';
//$aventura_sidebar_class = 'tz-tab-content-wrap';
if( $aventura_booking_sidebar == 'none' || $aventura_type == 'booking_none' ){
    $aventura_sidebar_class = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
}

$aventura_class_has_combo = '';
if ( $aventura_check_has_combo == true ){
    $aventura_class_has_combo = 'has_combo';
}

$aventura_booking_head_show = '';
if($aventura_booking_head_option == 'custom'){
    $aventura_booking_head_show = $aventura_booking_head_display;
}else{
    $aventura_booking_head_show = $aventura_booking_head;
}

$aventura_contact_form_show = '';
if($aventura_tour_contact_option == 'custom'){
    $aventura_contact_form_show = $aventura_tour_contact_display;
}else{
    $aventura_contact_form_show = $aventura_contact_option;
}

$aventura_booking_form_show = '';
if($aventura_booking_form_option == 'custom'){
    $aventura_booking_form_show = $aventura_booking_form_display;
}else{
    $aventura_booking_form_show = $aventura_booking_form;
}
$aventura_day_start_week = get_option('start_of_week');

get_template_part('template_inc/inc','menu');
if ( have_posts() ) : while (have_posts()) : the_post() ;
    aventura_setPostViews(get_the_ID());
    global $aventura_ID;
    $aventura_ID = get_the_ID();
    $aventura_view = aventura_getPostViews($aventura_ID);

    $aventura_check_tour_available = aventura_tour_check_availability_advance( $aventura_ID, '', '' );
    $aventura_allow_manager_people = aventura_metabox( 'aventura_tour_manager_people','',$aventura_ID,'' );
    $aventura_total_people = aventura_metabox( 'aventura_tour_total_people','',$aventura_ID,'' );

    ?>
    <div class="<?php echo esc_attr($aventura_tour_single_class);?>">
        <div class="tz-tour-head">
            <?php
            /*  Gallery */
            aventura_get_template('gallery.php','/tour/templates/single-tour/');
            /*  End Gallery */

            /*  Tour Title */
            aventura_get_template('title.php','/tour/templates/single-tour/');
            /*  End Tour Title */
            ?>
        </div>
        <div class="tz-tour-tab-title">
            <div class="container">
                <div class="row">
                    <?php if( $aventura_booking_sidebar == 'left' || $aventura_type == 'booking_left' ){ ?>
                        <!--Sidebar Filter Left -->
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12"></div>
                        <!--End Sidebar Filter Left -->
                    <?php } ?>
                    <div class="<?php echo esc_attr($aventura_sidebar_class); ?>">
                        <ul  class="nav nav-pills">
                            <li class="active">
                                <a  href="#description" data-toggle="tab"><?php esc_html_e('Description','aventura') ?></a>
                            </li>
                            <?php if($aventura_itinerary_options == '1'): ?>
                                <li>
                                    <a href="#itinerary" data-toggle="tab"><?php esc_html_e('Itinerary','aventura') ?></a>
                                </li>
                            <?php endif;?>

                            <?php if($aventura_location_options == '1'): ?>
                                <li>
                                    <a href="#location" data-toggle="tab"><?php esc_html_e('Location','aventura') ?></a>
                                </li>
                            <?php endif;?>

                            <?php if($aventura_reviews_options == '1'): ?>
                                <li>
                                    <a href="#reviews" data-toggle="tab"><?php esc_html_e('Reviews','aventura') ?></a>
                                </li>
                            <?php endif;?>
                        </ul>
                    </div>
                    <?php if( $aventura_booking_sidebar == 'right' && $aventura_type != 'booking_left' && $aventura_type != 'booking_none' ){ ?>
                        <!--Sidebar Filter right -->
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12"></div>
                        <!--End Sidebar Filter right -->
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="tz-tour-content">
            <div class="container">
                <div class="row">
                    <div class="tz-tab-content-wrap">
                        <div id="post-<?php the_ID(); ?>">
                            <div class="tab-content clearfix">

                                <div class="tab-pane active" id="description">

                                    <?php if( !empty($aventura_image_itinerary)): ?>
                                        <div class="tour-image-itinerary">
                                            <?php
                                            foreach( $aventura_image_itinerary as $aventura_image ):
                                                ?>
                                                <img src="<?php echo esc_url($aventura_image["full_url"]);?>" alt="<?php echo esc_attr($aventura_image["title"]);?>" title="<?php echo esc_attr($aventura_image["title"]);?>">
                                            <?php
                                            endforeach;
                                            ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="content detail">
                                        <div class="tour-info <?php if( !empty($aventura_image_itinerary)){ echo 'tour-has-image-itinerary';} ?>">
                                            <div class="tour-info-box">
                                                <div class="tour-info-column">
                                                    <?php if( $aventura_tour_type != '' ):?>
                                                        <span class="tour-info-item tour-info-type">
                                                    <i class="fa fa-flag" aria-hidden="true"></i>
                                                            <?php
                                                            if( $aventura_tour_type == 'daily' ):
                                                                echo esc_html__('Daily Tour','aventura');
                                                            else:
                                                                echo esc_html__('Special Tour','aventura');
                                                            endif;
                                                            ?>
                                                </span>
                                                    <?php endif; ?>

                                                    <?php if($aventura_duration != ''):?>
                                                        <span class="tour-info-item tour-info-duration">
                                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                            <?php echo esc_html($aventura_duration);?>
                                                    </span>
                                                    <?php endif;?>


                                                    <?php if( $aventura_date != '' ): ?>
                                                        <span class="tour-info-item tour-info-date">
                                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                                            <?php echo esc_html__('Availability: ','aventura') . esc_html($aventura_date); ?>
                                                    </span>
                                                    <?php endif; ?>
                                                </div>

                                                <div class="tour-info-column">
                                                    <?php if($aventura_address != ''):?>
                                                        <span class="tour-info-item tour-info-address">
                                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                            <?php echo esc_html($aventura_address);?>
                                                    </span>
                                                    <?php endif;?>

                                                    <?php if($aventura_destination != ''):?>
                                                        <?php
                                                        $aventura_destiantion_content = array();
                                                        foreach ($aventura_destination as $item){
                                                            $aventura_destiantion_content[] = get_post($item)->post_title;
                                                        }
                                                        ?>
                                                        <span class="tour-info-item tour-info-destination">
                                                        <i class="fa fa-globe" aria-hidden="true"></i>
                                                            <?php echo esc_html(implode(", ",$aventura_destiantion_content));?>
                                                    </span>
                                                    <?php endif;?>
                                                    <?php if($aventura_tour_guide != ''):?>
                                                        <?php
                                                        $aventura_tour_guide_content = get_post($aventura_tour_guide);
                                                        ?>
                                                        <span class="tour-info-item tour-info-guider">
                                                        <i class="fa fa-user" aria-hidden="true"></i>
                                                            <?php echo esc_html__('Tour Guide: ','aventura') . esc_html($aventura_tour_guide_content->post_title);?>
                                                    </span>
                                                    <?php endif;?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php the_content(); ?>
                                    </div>
                                </div>

                                <?php if($aventura_itinerary_options == '1'): ?>
                                    <div class="tab-pane" id="itinerary">

                                        <div class="content itinerary">
                                            <?php
                                            $aventura_itinerary_content = apply_filters( 'the_content', $aventura_itinerary );
                                            $aventura_itinerary_content = str_replace( ']]>', ']]&gt;', $aventura_itinerary_content );
                                            echo balanceTags($aventura_itinerary_content); ?>
                                        </div>
                                    </div>
                                <?php endif;?>

                                <?php if($aventura_location_options == '1'): ?>
                                    <div class="tab-pane" id="location">

                                        <div class="content location">
                                            <div class="description">
                                                <?php echo balanceTags($aventura_location_des); ?>
                                            </div>
                                            <iframe width="650" height="450" style="border:0" src="<?php echo esc_url('https://maps.google.com/maps?q='.$aventura_address.'&amp;ie=UTF8&amp;&amp;output=embed'); ?>" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                <?php endif;?>

                                <?php if($aventura_reviews_options == '1'): ?>
                                    <div class="tab-pane" id="reviews">
                                        <div class="content reviews">
                                            <?php comments_template( '', true ); ?>
                                        </div>
                                    </div>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                    <?php if( $aventura_type != 'booking_none' ){ ?>
                        <!--Sidebar Filter right -->
                        <!--                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">-->
                        <div class="tz-tour-booking-wrap">
                            <div class="tz-tour-booking">
                                <?php if($aventura_booking_head_show == '1'){?>
                                    <div class="tz-booking-head">
                                        <?php if( $aventura_phone != '' ){ ?>
                                            <div class="tz-tour-contact-number">
                                                <i class="fa fa-headphones" aria-hidden="true"></i>
                                                <?php esc_html_e('&nbsp;Call Center: ','aventura') ?><span><?php echo esc_html($aventura_phone); ?></span>
                                            </div>
                                        <?php } ?>
                                        <!--Total Price -->
                                        <?php if($aventura_price_box == '1'){ ?>
                                            <div class="tz-tour-price <?php if( $aventura_tour_type == 'external' ){echo esc_attr($aventura_tour_type);} ?>">
                                                <?php
                                                if( $aventura_tour_type != 'external' ){
                                                    if($aventura_adult_price != '' || $aventura_child_price != ''):
                                                        ?>
                                                        <span class="tz-tour-total-price">
                                                        <?php echo esc_html__('Total:','aventura');?>

                                                            <span class="total-price">
                                                                <span class="total_all_price">
                                                                    <?php
                                                                    if($aventura_adult_price != ''){
                                                                        $aventura_total_price = $aventura_adult_price*(100-$aventura_discount)/100;
                                                                        echo aventura_price($aventura_total_price);
                                                                        //                                                            echo aventura_price($aventura_adult_price);
                                                                    }elseif($aventura_child_price != ''){
                                                                        $aventura_total_price = $aventura_child_price*(100-$aventura_discount)/100;
                                                                        echo aventura_price($aventura_total_price);
                                                                        //                                                            echo aventura_price($aventura_child_price);
                                                                    }
                                                                    ?>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    <?php endif; ?>
                                                    <?php
                                                    if($aventura_adult_price != '' || $aventura_child_price != ''):
                                                        ?>
                                                        <span class="tz-tour-price-per-person">
                                                            <?php echo esc_html__('From','aventura');?>
                                                            <span class="price-per-person">
                                                                <?php
                                                                if($aventura_adult_price != ''){
                                                                    echo aventura_price($aventura_adult_price);
                                                                }elseif($aventura_child_price != ''){
                                                                    echo aventura_price($aventura_child_price);
                                                                }?>
                                                                </span>
                                                            <?php echo esc_html__('/person','aventura');?>
                                                                </span>
                                                    <?php endif;?>
                                                    <?php if($aventura_adult_price == '' && $aventura_child_price == ''):?>
                                                        <span class="tz-tour-price-message">
                                                            <?php echo esc_html__('Please Contact Us for Price','aventura');?>
                                                        </span>
                                                    <?php endif;?>
                                                    <?php
                                                }else{
                                                    echo '<span class="tz-tour-external-message">'.esc_html__('External Tour','aventura').'</span>';
                                                    ?>
                                                <?php }?>

                                            </div>
                                        <?php } ?>
                                        <!--End Total Price -->
                                    </div>
                                <?php } ?>
                                <?php if($aventura_booking_form_show == '1'){?>
                                    <?php
                                    if ( ( $aventura_allow_manager_people == '1' && $aventura_total_people == '0' ) || $aventura_tour_type == 'special' && empty($aventura_departure_time) && $aventura_check_tour_available['0'] == '0' ){ ?>
                                        <span class="tz-tour-our-of-stock-message"><?php echo esc_html__('Out of stock','aventura'); ?></span>
                                    <?php }else{ ?>
                                        <?php if( $aventura_tour_type != 'external' ){ ?>
                                            <?php if($aventura_adult_price != '' || $aventura_child_price != ''):?>
                                                <!--Booking Form -->
                                                <div class="tz-tour-book-form">
                                                    <form method="get" id="booking-form" action="<?php echo esc_url( aventura_get_tour_cart_page() ); ?>">
                                                        <input type="hidden" name="tour_id" value="<?php echo get_the_ID()?>">
                                                        <?php if($aventura_tour_type == 'special' && empty($aventura_departure_time) && $aventura_check_tour_available['2'] != ''){?>
                                                            <input type="hidden" name="people_available" value="<?php echo $aventura_check_tour_available['2'];?>">
                                                        <?php }else{?>
                                                            <input type="hidden" name="people_available" value="">
                                                        <?php } ?>

                                                        <?php if( $aventura_first_name_show == '1' ){ ?>
                                                            <div class="form-group">
                                                                <?php if( $aventura_first_name_label != '' ){
                                                                    echo '<label>'.esc_html($aventura_first_name_label).'</label>';
                                                                } ?>
                                                                <div class="book-name">
                                                                    <input name="first_name" value="" placeholder="<?php echo esc_html($aventura_first_name_label) ?>" type="text">
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                        <?php if( $aventura_last_name_show == '1' ){ ?>
                                                            <div class="form-group">
                                                                <?php if( $aventura_last_name_label != '' ){
                                                                    echo '<label>'.esc_html($aventura_last_name_label).'</label>';
                                                                } ?>
                                                                <div class="book-name">
                                                                    <input name="last_name" value="" placeholder="<?php echo esc_html($aventura_last_name_label) ?>" type="text">
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                        <?php if( $aventura_email_show == '1' ){ ?>
                                                            <div class="form-group">
                                                                <?php if( $aventura_email_label != '' ){
                                                                    echo '<label>'.esc_html($aventura_email_label).'</label>';
                                                                } ?>
                                                                <div class="book-email">
                                                                    <input name="your_email" value="" placeholder="<?php echo esc_html($aventura_email_label) ?>" type="text">
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                        <?php if( $aventura_field_phone_show == '1' ){ ?>
                                                            <div class="form-group">
                                                                <?php if( $aventura_field_phone_label != '' ){
                                                                    echo '<label>'.esc_html($aventura_field_phone_label).'</label>';
                                                                } ?>
                                                                <div class="book-phone">
                                                                    <input name="your_phone" value="" placeholder="<?php echo esc_html($aventura_field_phone_label) ?>" type="text">
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                        <?php if($aventura_tour_type == 'daily'):?>
                                                            <div class="form-group">
                                                                <?php if( $aventura_departure_label != '' ){
                                                                    echo '<label>'.esc_html($aventura_departure_label).'</label>';
                                                                } ?>
                                                                <div class="book-departure-date">
                                                                    <input class="date-pick form-control" data-locale="<?php echo esc_attr(get_locale()); ?>" data-day-start-week= "<?php echo esc_attr($aventura_day_start_week);?>" data-date-format="yyyy-mm-dd" type="text" name="date" placeholder="<?php esc_html_e('yyyy-mm-dd','aventura') ?>">
                                                                </div>
                                                            </div>
                                                        <?php endif;?>

                                                        <?php if ( $aventura_field_time_show == '1' && ! empty( $aventura_departure_time ) ) :?>
                                                            <div class="form-group">
                                                                <?php
                                                                if($aventura_departure_time_label != ''){
                                                                    echo '<label>'.esc_html($aventura_departure_time_label).'</label>';
                                                                }else{
                                                                    echo '<label>'.esc_html__('Departure Time','aventura').'</label>';
                                                                }
                                                                ?>
                                                                <div class="book-departure-time">
                                                                    <select name="departure_time">
                                                                        <option  value=""><?php esc_html_e('Choose departure time','aventura' ); ?></option>
                                                                        <?php

                                                                        foreach ( $aventura_departure_time as $aventura_time ) {
                                                                            echo '<option  value="' . esc_attr( $aventura_time ) . '">'. esc_html( $aventura_time ) .'</option>';
                                                                        }

                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        <?php endif;?>

                                                        <p class="require-date-time-message"><?php echo esc_html__('( Please select date and time before select people )','aventura'); ?></p>

                                                        <p class="our-of-stock-message"><?php echo esc_html__('Out of stock','aventura'); ?></p>

                                                        <?php if ( $aventura_check_has_combo == true ) :?>
                                                            <div class="form-group">
                                                                <?php
                                                                echo '<label>'.esc_html__('Choose Combo','aventura').'</label>';
                                                                ?>
                                                                <div class="book-combo-tours">
                                                                    <select id="price_combo" name="price_combo">
                                                                        <?php
                                                                        foreach ( $aventura_add_combo_tour as $aventura_combo_tour ) {
                                                                            echo '<option  value="' . esc_attr( $aventura_combo_tour['price_combo'] ) . '" data-people-combo="' . esc_attr( $aventura_combo_tour['people_combo'] ) . '">'. esc_html( $aventura_combo_tour['name_combo'] ) .'</option>';
                                                                        }
                                                                        ?>
                                                                        <option  value="custom" selected><?php esc_html_e('Choose Persons','aventura' ); ?></option>
                                                                    </select>
                                                                    <input class="name_combo" name="name_combo" value="" type="hidden">
                                                                    <input class="people_combo" name="people_combo" value="" type="hidden">
                                                                </div>
                                                            </div>
                                                        <?php endif;?>

                                                        <?php if( $aventura_adult_price != ''){ ?>
                                                            <div class="form-group <?php echo esc_html($aventura_class_has_combo); ?>">
                                                                <?php if( $aventura_adults_label != '' ){
                                                                    echo '<label>'.esc_html($aventura_adults_label).'</label>';
                                                                } ?>
                                                                <div class="st_adults_children">
                                                                    <div class="input-number-ticket">
                                                                        <input class="input-number" name="number_adults" type="text" value="1" data-min="1" data-max="<?php echo esc_attr($aventura_max_adults); ?>" min="1" max="<?php echo esc_attr($aventura_max_adults); ?>"/>
                                                                        <span class="input-number-decrement"><i class="fa fa-caret-left"></i></span><span class="input-number-increment"><i class="fa fa-caret-right"></i></span>
                                                                        <input name="price_adults" value="<?php echo esc_attr($aventura_adult_price); ?>" type="hidden">
                                                                    </div>
                                                                    <div class="tz_price">
                                                                        <span class="adult_price"><?php echo esc_html('×&nbsp;').aventura_price($aventura_adult_price); ?></span>
                                                                        <span class="total_price_adults"><?php echo esc_html('=&nbsp;').aventura_price($aventura_adult_price); ?></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                        <?php if( $aventura_child_price != '' && $aventura_child_price != 0 ){ ?>
                                                            <div class="form-group <?php echo esc_html($aventura_class_has_combo); ?>">
                                                                <?php if( $aventura_children_label != '' ){
                                                                    echo '<label>'.esc_html($aventura_children_label).'</label>';
                                                                } ?>
                                                                <div class="st_adults_children">
                                                                    <div class="input-number-ticket">
                                                                        <input class="input-number" name="number_children" type="text" value="0" data-min="0" data-max="<?php echo esc_attr($aventura_max_kids); ?>" min="0" max="<?php echo esc_attr($aventura_max_kids); ?>"/>
                                                                        <span class="input-number-decrement"><i class="fa fa-caret-left"></i></span><span class="input-number-increment"><i class="fa fa-caret-right"></i></span>
                                                                        <input name="price_child" value="<?php echo esc_attr($aventura_child_price); ?>" type="hidden">
                                                                    </div>
                                                                    <div class="tz_price">
                                                                        <span class="child_price"><?php echo esc_html('×&nbsp;').aventura_price($aventura_child_price); ?></span>
                                                                        <span class="total_price_children"><?php echo esc_html('=&nbsp;').aventura_price(0); ?></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                        <p class="book-message">
                                                            <?php echo esc_html__('Exceed the maximum number of people for this tour. The number of seats available is ','aventura')?>
                                                            <span class="book-number-available">
                                                                10
                                                            </span>
                                                        </p>
                                                        <?php if( $aventura_booking_text != '' ){
                                                            echo '<button type="submit" class="btn_full book-now">'.esc_html($aventura_booking_text).'</button>';
                                                        } ?>
                                                    </form>
                                                </div>
                                                <!--End Booking Form -->
                                            <?php endif;?>
                                        <?php }else{
                                            if($aventura_tour_external_note != ''):
                                                echo '<p class="tz-external-description">'.esc_html($aventura_tour_external_note).'</p>';
                                            endif;
                                            if($aventura_tour_external_button != ''):
                                                echo '<a class="btn-external" href="'.esc_url($aventura_tour_external_link).'" title="'.esc_html($aventura_tour_external_button).'" target="_blank">'.esc_html($aventura_tour_external_button).'</a>';
                                            endif;
                                        } ?>
                                    <?php } ?>
                                <?php } ?>

                                <!--Contact Form -->
                                <?php if($aventura_contact_form_show == '1'):
                                    aventura_get_template('contact-form.php','/tour/templates/single-tour/');
                                endif;?>
                                <!--End Contact Form -->
                                <div class="tz-tour-data" data-adults-price="<?php if($aventura_adult_price != ''){ echo esc_attr( $aventura_adult_price ); }else{ echo '0';} ?>" data-child-price="<?php if($aventura_child_price != ''){ echo esc_attr( $aventura_child_price ); }else{ echo '0';} ?>" data-discount="<?php echo esc_attr( $aventura_discount ); ?>" data-available-days='<?php echo json_encode($aventura_tour_available_days );?>' data-start-date="<?php echo esc_attr($aventura_tour_start_date_milli_sec); ?>" data-end-date="<?php echo esc_attr($aventura_tour_end_date_milli_sec); ?>" data-decimal-prec="<?php echo esc_attr($aventura_decimal_prec); ?>" data-decimal-sep="<?php echo esc_attr($aventura_decimal_sep); ?>" data-thousands-sep="<?php echo esc_attr($aventura_thousands_sep); ?>" data-departure-time='<?php echo json_encode($aventura_departure_time );?>'></div>
                            </div>
                        </div>
                        <!--End Sidebar Filter right -->
                    <?php } ?>

                    <?php
                    if($aventura_other_tour_options == '1'):
                        aventura_get_template('other-tour.php','/tour/templates/single-tour/');
                    endif;?>
                </div>
            </div>
        </div>

    </div>
<?php
endwhile; // end while ( have_posts )
endif; // end if ( have_posts )
get_footer(); ?>
