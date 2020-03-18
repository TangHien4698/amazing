<?php

function tzaventura_featuredTour($atts) {
    $tz_type  = $tz_title = $tz_title_background = $tz_description = $tz_type_tour = $tz_tour_category = $tz_tour_post = $tz_page = $tz_orderby = $tz_order = $tz_size = $tz_label = $tz_link = $auto_play = $tz_margin = $timeout = $loop = $desktop_columns = $desktop_small_columns = $tablet_columns = $tablet_portait_columns = $mobile_columns = $el_class = $show_duration = $show_date = $show_departure = $show_price = $show_rating = $show_review = $show_read_more = $show_wishlist = $css = '';
    extract(shortcode_atts(array(
        'tz_type'                   => '',
        'tz_title'                  => '',
        'tz_title_background'       => '',
        'tz_description'            => '',
        'tz_type_tour'              => '',
        'tz_tour_category'          => '',
        'tz_tour_post'              => '',
        'tz_page'                   => '',
        'tz_orderby'                => 'date',
        'tz_order'                  => 'desc',
        'tz_size'                   => 'large',
        'tz_label'                  => '',
        'tz_link'                   => '',
        'tz_margin'                => '',
        'auto_play'                 => 'true',
        'timeout'                   => '3000',
        'loop'                      => 'true',
        'desktop_columns'           => '4',
        'desktop_small_columns'     => '4',
        'tablet_columns'            => '2',
        'tablet_portait_columns'    => '2',
        'mobile_columns'            => '1',
        'el_class'                  => '',
        'show_duration'             => 'true',
        'show_date'                 => 'true',
        'show_departure'            => 'true',
        'show_price'                => 'true',
        'show_rating'               => 'true',
        'show_review'               => 'true',
        'show_read_more'            => 'true',
        'show_wishlist'             => 'true',
        'css'                       => '',
    ),$atts));
    ob_start();
    wp_enqueue_style( 'bootstrap-datepicker');
    wp_enqueue_script('owl-carousel');
    wp_enqueue_style('owl-carousel');
    wp_enqueue_script('resize');
    wp_enqueue_script('jquery-validate');
    wp_enqueue_script('bootstrap-datepicker');
    wp_enqueue_script('bootstrap-datepicker-localization');
    wp_enqueue_script('tz-featured-tour-function');
    wp_enqueue_script('featured-tour');
    $wishlist = array();
    if ( is_user_logged_in() ) {
        $user_id = get_current_user_id();
        $wishlist = get_user_meta( $user_id, 'wishlist', true );
    }
    if ( ! is_array( $wishlist ) ) $wishlist = array();
    $aventura_wishlist_url = aventura_get_tour_wishlist_page();

    if ($tz_type_tour == 'category'):
        if($tz_tour_category != ''):
            $cat_id = explode(",",$tz_tour_category);
            $tzcat = array();

            if(is_array($cat_id)){
                sort($cat_id);
                $count_cat  =   count($cat_id);

                for($i=0; $i<$count_cat; $i++){
                    $tzcat[]  =   (int)$cat_id[$i];
                }
            }else{
                $tzcat[]    = (int)$cat_id;
            }
            $tz_tour_args = array(
                'post_type'         => 'tour',
                'posts_per_page'    => $tz_page,
                'orderby'           => $tz_orderby,
                'order'             => $tz_order,
                'tax_query'         => array(
                    array(
                        'taxonomy'  =>  'tour-category',
                        'filed'     =>  'id',
                        'terms'     =>  $tzcat,
                    )
                )
            );
        endif;
    else:

        $tz_tour_array = explode(", ", $tz_tour_post);
        $tz_tour_args = array(
            'post_type'             => 'tour',
            'posts_per_page'        => -1,
            'ignore_sticky_posts'   => 1,
            'post__in'              => $tz_tour_array,
        );
    endif;
    if($auto_play == ''){
        $auto_play = 'false';
    }
    if($timeout == ''){
        $timeout = 3000;
    }
    if ($loop == ''){
        $loop = 'false';
    }
    if ($tz_margin == ''){
        $tz_margin = 0;
    }
    $tz_id = mt_rand();
    ?>
    <div class="tzElement_FeaturedTour <?php if( $el_class != '' ) echo esc_attr($el_class); ?> <?php echo vc_shortcode_custom_css_class( $css ); ?> type-<?php echo esc_html($tz_type); ?>">

        <?php if($tz_type == '1' || $tz_type == '2' || $tz_type == '5'): ?>
        <div class="tzTour-top">

            <?php if($tz_type == '5' && $tz_title_background != ''): ?>
                <h2 class="tour-title-background"><?php echo esc_html($tz_title_background); ?></h2>
            <?php endif; ?>

            <?php if($tz_title != ''): ?>
                <h2 class="tour-title"><?php echo esc_html($tz_title); ?></h2>
            <?php endif; ?>

            <?php if($tz_type == '2' && $tz_label != ''): ?>
                <a href="<?php echo esc_html($tz_link); ?>" class="view-more"><?php echo esc_html($tz_label); ?></a>
            <?php endif; ?>

            <?php if($tz_type == '5' && $tz_description != ''): ?>
                <p class="tour-description"><?php echo esc_html($tz_description); ?></p>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        <div <?php if($tz_type == 2 || $tz_type == '3' || $tz_type == '4'): ?> id="tzTour-slider-<?php echo esc_attr($tz_id)?>" <?php endif; ?>  class="tzTour <?php if($tz_type == 2 || $tz_type == '3' || $tz_type == '4'): echo 'tzTour-slider owl-carousel'; endif; ?>">
            <?php
                $tz_tour_query = new WP_Query($tz_tour_args);
                if($tz_tour_query -> have_posts()): while ($tz_tour_query -> have_posts()) : $tz_tour_query -> the_post();
                    global $aventura_options;
                    $post_id = $tz_tour_query -> post -> ID;

                    $aventura_discount      =   aventura_metabox( 'aventura_tour_discount','','','0' );
                    $aventura_duration      =   aventura_metabox( 'aventura_tour_duration','','','' );;
                    $aventura_date          =   aventura_metabox( 'aventura_departure_date','','','' );
                    $aventura_address       =   aventura_metabox( 'address','','','' );
                    $aventura_infant_price  =   aventura_metabox( 'aventura_infant_price','','','0' );
                    $aventura_destination   =   aventura_metabox( 'aventura_tour_destination','','','' );

                    $aventura_tour_type     =   aventura_metabox( 'aventura_tour_type','',$post_id,'' );
                    $aventura_tour_external_button  =   aventura_metabox( 'aventura_tour_external_button','',$post_id,esc_html__('Book Now','aventura-plugin') );
                    $aventura_tour_external_link    =   aventura_metabox( 'aventura_tour_external_link','',$post_id,'#' );
                    $aventura_max_adults    = isset( $aventura_options['aventura_tour_detail_max_adults'] ) ? $aventura_options['aventura_tour_detail_max_adults'] : 3;
                    $aventura_max_kids      = isset( $aventura_options['aventura_tour_detail_max_kids'] ) ? $aventura_options['aventura_tour_detail_max_kids'] : 0;
                    $aventura_adult_price   =  aventura_metabox( 'aventura_adult_price','',$post_id,'0' );
                    $aventura_child_price   =  aventura_metabox( 'aventura_child_price','',$post_id,'0' );
                    $aventura_discount      =  aventura_metabox( 'aventura_tour_discount','',$post_id,'0' );
                    $aventura_tour_available_days   =   aventura_metabox( 'aventura_available_days','',$post_id,'' );
                    $aventura_tour_start_date       =   aventura_metabox( 'aventura_tour_start_date','',$post_id,'' );
                    $aventura_tour_end_date         =   aventura_metabox( 'aventura_tour_end_date','',$post_id,'' );
                    $aventura_tour_departure_time   =   aventura_metabox( 'aventura_departure_time','',$post_id,'' );

                    if($tz_type == '1' || $tz_type == '3'){
                        if($aventura_tour_type == 'daily') {
                            $aventura_date_tour = date_i18n('D, M j, Y', strtotime($aventura_tour_start_date));
                        }else{
                            $aventura_date_tour = date_i18n('D, M j, Y',strtotime($aventura_date));
                        }
                    }else{
                        if($aventura_tour_type == 'daily') {
                            $aventura_date_tour = date_i18n('M d, Y', strtotime($aventura_tour_start_date));
                        }else{
                            $aventura_date_tour = date_i18n('M d, Y',strtotime($aventura_date));
                        }
                    }
                    $tz_post_thumbnail_id = get_post_thumbnail_id($post->ID);
                    $tz_post_thumbnail = wpb_getImageBySize( array(
                        'attach_id' => $tz_post_thumbnail_id,
                        'thumb_size' => $tz_size,
                    ) );
                    $tz_image_thumbnail = $tz_post_thumbnail['thumbnail'];

//                    $aventura_check_tour_available = aventura_tour_check_availability( $post_id );
                    $aventura_check_tour_available = aventura_tour_check_availability_advance( $post_id, '', '' );
                    $aventura_allow_manager_people = aventura_metabox( 'aventura_tour_manager_people','',$post_id,'' );
                    $aventura_total_people = aventura_metabox( 'aventura_tour_total_people','',$post_id,'' );
//        var_dump($aventura_check_tour_available);

                ?>
                    <div class="tzTour-item">
                        <?php if($tz_type == '5'):?>
                        <div class="tzTour-item-box">
                        <?php endif;?>
                            <?php if($tz_type != '4'):?>
                                <div class="tzImg-tour">
                                    <div class="tz-thumb <?php if($tz_type == '1' || $tz_type == '3'): echo 'tz-thumb-fix'; endif; ?>">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php
                                            echo $tz_image_thumbnail;
                                            ?>
                                        </a>

                                        <?php
                                        if ( ( $aventura_allow_manager_people == '1' && $aventura_total_people == '0' ) || $aventura_tour_type == 'special' && empty($aventura_tour_departure_time) && $aventura_check_tour_available['0'] == '0' ) {
                                            ?>
                                            <span class="tz-tour-sold-out"><?php echo esc_html__('Sold Out','aventura')?></span>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <?php if($tz_type !='3' && $tz_type != '5'):
                                        if( $aventura_discount != '' && $aventura_discount != 0 ) echo '<span class="discount">'.$aventura_discount.esc_html__('% Off','aventura-plugin').'<small></small>'.'</span>';
                                    endif; ?>
                                </div>
                            <?php endif;?>
                            <?php if($tz_type == '1'){ ?>
                                <div class="tzTour-info">
                                    <div class="tz-title">
                                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                        <?php
                                        if( class_exists( 'Comment_Rating_Output' ) && $show_rating == 'true' ):
                                            $aventura_rating = new Comment_Rating_Output();
                                            $aventura_rating_html = $aventura_rating->display_average_rating('');
                                            echo balanceTags($aventura_rating_html);
                                        endif;
                                        ?>
                                        <?php if( $aventura_duration != '' && $show_duration == 'true' ){ ?>
                                            <span><i class="fa fa-clock-o"></i><?php echo  esc_html($aventura_duration);?></span>
                                        <?php } ?>

                                    </div>
                                    <div class="tz-time">
                                        <?php if( $aventura_date_tour != '' && $show_date == 'true' ){ ?>
                                            <div class="tz-date">
                                                <span class="icon" ><i class="fa fa-clock-o"></i></span>
                                                <div class="content">
                                                    <p><?php esc_html_e('Date','aventura-plugin') ?></p>
                                                    <p class="text"><?php echo esc_html($aventura_date_tour); ?></p>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if( $aventura_address != '' && $show_departure == 'true' ){ ?>
                                            <div class="tz-destination">
                                                <span class="icon" ><i class="fa fa-map-marker"></i></span>
                                                <div class="content">
                                                    <p><?php esc_html_e('Departure','aventura-plugin') ?></p>
                                                    <p class="text"><?php echo esc_html($aventura_address); ?></p>
                                                </div>

                                            </div>
                                        <?php } ?>
                                        <?php
                                        if( ($aventura_adult_price != '' || $aventura_child_price != '') && $show_price == 'true' ):
                                        ?>
                                            <div class="tz-price">
                                                <p><?php esc_html_e('From','aventura-plugin'); ?></p>
                                                <span class="price">
                                                    <?php if( function_exists( 'aventura_price' ) ){?>
                                                        <?php
                                                        if($aventura_adult_price != ''){
                                                            echo aventura_price($aventura_adult_price);
                                                        }elseif($aventura_child_price != ''){
                                                            echo aventura_price($aventura_child_price);
                                                        }
                                                        ?>
                                                    <?php }else{?>
                                                    <?php echo esc_html($aventura_adult_price);?>
                                                        <span class="currency-symbol">$</span>
                                                    <?php } ?>
                                                </span>
                                            </div>
                                        <?php endif; ?>

                                    </div>
                                    <div class="tz-button">
                                        <?php if( $show_review == 'true' ){ ?>
                                            <a class="review review-ajax-btn" href="#" data-post-id="<?php echo esc_js( $post_id ); ?>">
                                                <?php esc_html_e('Show Reviews','aventura-plugin'); ?>
                                                <span class="loading-ajax"></span>
                                            </a>
                                        <?php } ?>

                                        <?php if( $show_read_more == 'true' ){ ?>
                                            <a class="readmore" href="<?php the_permalink(); ?>"><i class="fa fa-info"></i><?php esc_html_e('Read More','aventura-plugin'); ?></a>
                                        <?php } ?>

                                        <?php if ( ! empty( $aventura_wishlist_url ) && $show_wishlist == 'true' ) : ?>
                                            <div class="tz-wishlist">
                                                <a class="tz-btn-wishlist btn-add-wishlist" href="#" data-post-id="<?php echo esc_attr( $post_id ) ?>"<?php echo ( in_array( $post_id, $wishlist) ? ' style="display:none;"' : '' ) ?>>
                                                    <i class="fa fa-heart-o"></i>
                                                    <!--                                                    <span class="tooltip">-->
                                                    <!--                                                        --><?php //esc_html_e(  'Add to wishlist', 'citytours' ); ?>
                                                    <!--                                                    </span>-->
                                                </a>
                                                <a class="tz-btn-wishlist btn-remove-wishlist" href="#" data-post-id="<?php echo esc_attr( $post_id ) ?>"<?php echo ( ! in_array( $post_id, $wishlist) ? ' style="display:none;"' : '' ) ?>>
                                                    <i class="fa fa-heart"></i>
                                                    <!--                                                    <span class="tooltip">-->
                                                    <!--                                                        --><?php //esc_html_e(  'Remove from wishlist', 'citytours' ); ?>
                                                    <!--                                                    </span>-->
                                                </a>
                                            </div>
                                        <?php endif; ?>

                                        <?php
                                        if( $aventura_tour_type == 'external' ){
                                            if($aventura_tour_external_button != ''):
                                                echo '<a class="booking" href="'.esc_url($aventura_tour_external_link).'" title="'.esc_html($aventura_tour_external_button).'" target="_blank"><i class="fa fa-shopping-cart"></i>'.esc_html($aventura_tour_external_button).'</a>';
                                            endif;
                                        }else{
                                            if($aventura_adult_price != '' || $aventura_child_price != ''):
                                            ?>
                                                <a class="booking book-now-ajax-btn<?php
                                                if ( ( $aventura_allow_manager_people == '1' && $aventura_total_people == '0' ) || $aventura_tour_type == 'special' && empty($aventura_tour_departure_time) && $aventura_check_tour_available['0'] == '0' ) {
                                                    echo ' disabled';
                                                }
                                                ?>" href="<?php the_permalink($post_id);?>" data-post-id="<?php echo esc_attr( $post_id ); ?>"
                                                    <?php if($aventura_tour_type == 'special' && empty($aventura_tour_departure_time) && $aventura_check_tour_available['2'] != ''){?>
                                                        data-people-available="<?php echo $aventura_check_tour_available['2'];?>"
                                                    <?php }else{?>
                                                        data-people-available=""
                                                    <?php } ?> data-tour-type="<?php echo esc_attr($aventura_tour_type); ?>" data-max-adults="<?php echo esc_attr( $aventura_max_adults ); ?>" data-max-kids="<?php echo esc_attr( $aventura_max_kids ); ?>" data-adults-price="<?php if($aventura_adult_price != ''){ echo esc_attr( $aventura_adult_price );}else{ echo '0'; } ?>" data-child-price="<?php if($aventura_child_price != '') { echo esc_attr( $aventura_child_price ); }else{ echo '0'; } ?>" data-discount="<?php echo esc_attr( $aventura_discount ); ?>" data-available-days='<?php echo json_encode( $aventura_tour_available_days ); ?>' data-start-date="<?php echo esc_attr( $aventura_tour_start_date ); ?>" data-end-date="<?php echo esc_attr( $aventura_tour_end_date ); ?>" data-departure-time='<?php echo json_encode( $aventura_tour_departure_time ); ?>'>
                                                    <i class="fa fa-shopping-cart"></i><?php esc_html_e('Book Now','aventura-plugin'); ?>
                                                    <span class="loading-ajax"></span>
                                                </a>
                                            <?php endif;
                                        }?>

                                    </div>
                                </div>
                            <?php }elseif($tz_type == '2'){ ?>
                                <div class="tzTour-info">
                                    <div class="tz-title">
                                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                        <?php if( $aventura_duration != '' && $show_duration == 'true' ){ ?>
                                            <span><i class="fa fa-clock-o"></i><?php echo  esc_html($aventura_duration);?></span>
                                        <?php } ?>

                                    </div>
                                    <div class="tz-price">
                                        <?php
                                        if( class_exists( 'Comment_Rating_Output' ) && $show_rating == 'true' ):
                                            $aventura_rating = new Comment_Rating_Output();
                                            $aventura_rating_html = $aventura_rating->display_average_rating('');
                                            echo balanceTags($aventura_rating_html);
                                        endif;
                                        ?>

                                        <?php
                                        if( ($aventura_adult_price != '' || $aventura_child_price != '') && $show_price == 'true' ):
                                            ?>
                                            <div class="price">
                                                <p><?php esc_html_e('From','aventura-plugin'); ?></p>
                                                <?php if( function_exists( 'aventura_price' ) ){?>
                                                    <?php
                                                    if($aventura_adult_price != ''){
                                                        echo aventura_price($aventura_adult_price);
                                                    }elseif($aventura_child_price != ''){
                                                        echo aventura_price($aventura_child_price);
                                                    }
                                                    ?>
                                                <?php }else{?>
                                                    <?php echo esc_html($aventura_adult_price);?>
                                                    <span class="currency-symbol">$</span>
                                                <?php } ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="tz-time">
                                        <?php if( $aventura_date_tour != '' && $show_date == 'true' ){ ?>
                                            <div class="tz-date">
                                                <p><?php esc_html_e('Date','aventura-plugin') ?></p>
                                                <p class="text"><?php echo esc_html($aventura_date_tour); ?></p>
                                            </div>
                                        <?php } ?>
                                        <?php if( $aventura_address != '' && $show_departure == 'true' ){ ?>
                                            <div class="tz-destination">
                                                <p><?php esc_html_e('Departure','aventura-plugin') ?></p>
                                                <p class="text"><?php echo esc_html($aventura_address); ?></p>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="tz-button">
                                    <?php
                                    if( $aventura_tour_type == 'external' ){
                                        if($aventura_tour_external_button != ''):
                                            echo '<a class="booking" href="'.esc_url($aventura_tour_external_link).'" title="'.esc_html($aventura_tour_external_button).'" target="_blank"><i class="fa fa-shopping-cart"></i>'.esc_html($aventura_tour_external_button).'</a>';
                                        endif;
                                    }else {
                                        if ($aventura_adult_price != '' || $aventura_child_price != ''):
                                            ?>
                                            <a class="booking book-now-ajax-btn<?php
                                            if ( ( $aventura_allow_manager_people == '1' && $aventura_total_people == '0' ) || $aventura_tour_type == 'special' && empty($aventura_tour_departure_time) && $aventura_check_tour_available['0'] == '0' ) {
                                                echo ' disabled';
                                            }
                                            ?>"
                                               href="<?php the_permalink($post_id); ?>"
                                               data-post-id="<?php echo esc_attr($post_id); ?>"
                                                <?php if($aventura_tour_type == 'special' && empty($aventura_tour_departure_time) && $aventura_check_tour_available['2'] != ''){?>
                                                    data-people-available="<?php echo $aventura_check_tour_available['2'];?>"
                                                <?php }else{?>
                                                    data-people-available=""
                                                <?php } ?>
                                               data-tour-type="<?php echo esc_attr($aventura_tour_type); ?>"
                                               data-max-adults="<?php echo esc_attr($aventura_max_adults); ?>"
                                               data-max-kids="<?php echo esc_attr($aventura_max_kids); ?>"
                                               data-adults-price="<?php echo esc_attr($aventura_adult_price); ?>"
                                               data-child-price="<?php echo esc_attr($aventura_child_price); ?>"
                                               data-discount="<?php echo esc_attr($aventura_discount); ?>"
                                               data-available-days='<?php echo json_encode($aventura_tour_available_days); ?>'
                                               data-start-date="<?php echo esc_attr($aventura_tour_start_date); ?>"
                                               data-end-date="<?php echo esc_attr($aventura_tour_end_date); ?>"
                                               data-departure-time='<?php echo json_encode( $aventura_tour_departure_time ); ?>'>
                                                <i class="fa fa-shopping-cart"></i><?php esc_html_e('Book Now', 'aventura-plugin'); ?>
                                                <span class="loading-ajax"></span>
                                            </a>
                                        <?php else: ?>
                                            <a class="booking book-view-detail" href="<?php the_permalink(); ?>">
                                                <i class="fa fa-rocket"></i><?php esc_html_e('View More', 'aventura-plugin'); ?>
                                            </a>
                                        <?php endif;
                                    }?>
                                </div>
                            <?php }elseif($tz_type == '3'){ ?>
                                <div class="tzTour-info">
                                    <div class="tz-title">
                                        <span class="trend"><?php echo esc_html__('Featured Tour','aventura-plugin'); ?></span>
                                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    </div>
                                    <div class="tz-time">
                                        <?php if( $aventura_date_tour != '' && $show_date == 'true' ){ ?>
                                            <div class="tz-date">
                                                <span class="icon" ><i class="fa fa-calendar-check-o"></i></span>
                                                <div class="content">
                                                    <p><?php esc_html_e('Date','aventura-plugin') ?></p>
                                                    <p class="text"><?php echo esc_html($aventura_date_tour); ?></p>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if( $aventura_address != '' && $show_departure == 'true' ){ ?>
                                            <div class="tz-destination">
                                                <span class="icon" ><i class="fa fa-map-marker"></i></span>
                                                <div class="content">
                                                    <p><?php esc_html_e('Departure','aventura-plugin') ?></p>
                                                    <p class="text"><?php echo esc_html($aventura_address); ?></p>
                                                </div>

                                            </div>
                                        <?php } ?>
                                        <?php if( $aventura_duration != '' && $show_duration == 'true' ){ ?>
                                            <div class="tz-duration">
                                                <span class="icon"><i class="fa fa-clock-o"></i></span>
                                                <div class="content">
                                                    <p><?php esc_html_e('Duration','aventura-plugin') ?></p>
                                                    <p class="text"><?php echo esc_html($aventura_duration); ?></p>
                                                </div>
                                            </div>

                                        <?php } ?>
                                    </div>
                                    <div class="tz-des">
                                        <?php the_excerpt(); ?>
                                    </div>
                                    <div class="tz-button">

                                        <?php
                                        if( $aventura_tour_type == 'external' ){
                                            if($aventura_tour_external_button != ''):
                                                echo '<a class="booking" href="'.esc_url($aventura_tour_external_link).'" title="'.esc_html($aventura_tour_external_button).'" target="_blank"><i class="fa fa-shopping-cart"></i>'.esc_html($aventura_tour_external_button).'</a>';
                                            endif;
                                        }else {
                                            if ($aventura_adult_price != '' || $aventura_child_price != ''):
                                                ?>
                                                <a class="booking book-now-ajax-btn<?php
                                                if ( ( $aventura_allow_manager_people == '1' && $aventura_total_people == '0' ) || $aventura_tour_type == 'special' && empty($aventura_tour_departure_time) && $aventura_check_tour_available['0'] == '0' ) {
                                                    echo ' disabled';
                                                }
                                                ?>"
                                                   href="<?php the_permalink($post_id);?>"
                                                   data-post-id="<?php echo esc_attr($post_id);?>"
                                                    <?php if($aventura_tour_type == 'special' && empty($aventura_tour_departure_time) && $aventura_check_tour_available['2'] != ''){?>
                                                        data-people-available="<?php echo $aventura_check_tour_available['2'];?>"
                                                    <?php }else{?>
                                                        data-people-available=""
                                                    <?php } ?>
                                                   data-tour-type="<?php echo esc_attr($aventura_tour_type);?>"
                                                   data-max-adults="<?php echo esc_attr($aventura_max_adults);?>"
                                                   data-max-kids="<?php echo esc_attr($aventura_max_kids); ?>"
                                                   data-adults-price="<?php echo esc_attr($aventura_adult_price);?>"
                                                   data-child-price="<?php echo esc_attr($aventura_child_price);?>"
                                                   data-discount="<?php echo esc_attr($aventura_discount); ?>"
                                                   data-available-days='<?php echo json_encode($aventura_tour_available_days); ?>'
                                                   data-start-date="<?php echo esc_attr($aventura_tour_start_date); ?>"
                                                   data-end-date="<?php echo esc_attr($aventura_tour_end_date); ?>"
                                                   data-departure-time='<?php echo json_encode( $aventura_tour_departure_time ); ?>'>
                                                    <?php esc_html_e('Book Now', 'aventura-plugin'); ?>
                                                    <span class="loading-ajax"></span>
                                                </a>
                                                <?php if( $show_price == 'true' ){ ?>
                                                    <div class="tz-price">
                                                        <p><?php esc_html_e('From', 'aventura-plugin'); ?></p>
                                                        <span class="price">
                                                        <?php if (function_exists('aventura_price')) { ?>
                                                            <?php
                                                            if ($aventura_adult_price != '') {
                                                                echo aventura_price($aventura_adult_price);
                                                            } elseif ($aventura_child_price != '') {
                                                                echo aventura_price($aventura_child_price);
                                                            }
                                                            ?>
                                                        <?php } else { ?>
                                                            <?php echo esc_html($aventura_adult_price); ?>
                                                            <span class="currency-symbol">$</span>
                                                        <?php } ?>
                                                    </span>
                                                    </div>
                                                <?php }?>
                                            <?php else: ?>
                                                <a class="booking book-view-detail" href="<?php the_permalink(); ?>">
                                                    <?php esc_html_e('View More', 'aventura-plugin'); ?>
                                                </a>
                                            <?php endif;
                                        }?>

                                    </div>
                                </div>
                            <?php }elseif($tz_type == '4'){ ?>
                                <div class="tzTour-info">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="tz-title">
                                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                                                <div class="tz-reviews">
                                                    <?php
                                                    if( class_exists( 'Comment_Rating_Output' ) && $show_rating == 'true' ):
                                                        $aventura_rating = new Comment_Rating_Output();
                                                        $aventura_rating_html = $aventura_rating->display_average_rating('');
                                                        echo balanceTags($aventura_rating_html);
                                                    endif;

                                                    $aventura_review_count = get_comments_number($post_id);
                                                    if( $aventura_review_count > 1 ){
                                                        $aventura_review_count_text = esc_html__(' Reviews','aventura-plugin');
                                                    }else{
                                                        $aventura_review_count_text = esc_html__(' Review','aventura-plugin');
                                                    }
                                                    ?>
                                                    <span class="reviews-count"><?php echo esc_html(get_comments_number($post_id).$aventura_review_count_text); ?></span>
                                                </div>
                                            </div>
                                            <div class="tz-time">

                                                <?php if( $aventura_address != '' ){ ?>
                                                    <span class="tz-address">
                                                        <i class="fa fa-map-marker"></i>
                                                        <?php echo esc_html($aventura_address); ?>
                                                    </span>
                                                <?php } ?>

                                                <?php if( $aventura_duration != '' && $show_duration == 'true' ){ ?>
                                                    <span class="tz-duration">
                                                        <i class="fa fa-clock-o"></i>
                                                        <?php echo esc_html($aventura_duration); ?>
                                                    </span>
                                                <?php } ?>

                                                <?php if( ($aventura_adult_price != '' || $aventura_child_price != '') && $show_price == 'true' ){ ?>
                                                    <span class="tz-price">
                                                        <i class="fa fa-money" aria-hidden="true"></i>
                                                        <?php
                                                        if($aventura_adult_price != ''){
                                                            echo aventura_price($aventura_adult_price);
                                                        }elseif($aventura_child_price != ''){
                                                            echo aventura_price($aventura_child_price);
                                                        }
                                                        ?>
                                                        <?php echo esc_html__(' / person','aventura-plugin');?>
                                                    </span>
                                                <?php } ?>
                                            </div>
                                            <div class="tz-des">
                                                <?php the_excerpt(); ?>
                                            </div>
                                            <div class="tz-button">
                                                <a class="more-tour" href="<?php echo esc_url(get_home_url('/')) . '/tour'; ?>" >
                                                    <?php esc_html_e('More Tour','aventura-plugin'); ?>
                                                </a>

                                                <?php
                                                if( $aventura_tour_type == 'external' ){
                                                    if($aventura_tour_external_button != ''):
                                                        echo '<a class="booking" href="'.esc_url($aventura_tour_external_link).'" title="'.esc_html($aventura_tour_external_button).'" target="_blank"><i class="fa fa-shopping-cart"></i>'.esc_html($aventura_tour_external_button).'</a>';
                                                    endif;
                                                }else {
                                                    if ($aventura_adult_price != '' || $aventura_child_price != ''):
                                                        ?>
                                                        <a class="booking book-now-ajax-btn<?php
                                                        if ( ( $aventura_allow_manager_people == '1' && $aventura_total_people == '0' ) || $aventura_tour_type == 'special' && empty($aventura_tour_departure_time) && $aventura_check_tour_available['0'] == '0' ) {
                                                            echo ' disabled';
                                                        }
                                                        ?>"
                                                           href="<?php the_permalink($post_id); ?>"
                                                           data-post-id="<?php echo esc_attr($post_id); ?>"
                                                            <?php if($aventura_tour_type == 'special' && empty($aventura_tour_departure_time) && $aventura_check_tour_available['2'] != ''){?>
                                                                data-people-available="<?php echo $aventura_check_tour_available['2'];?>"
                                                            <?php }else{?>
                                                                data-people-available=""
                                                            <?php } ?>
                                                           data-tour-type="<?php echo esc_attr($aventura_tour_type); ?>"
                                                           data-max-adults="<?php echo esc_attr($aventura_max_adults); ?>"
                                                           data-max-kids="<?php echo esc_attr($aventura_max_kids); ?>"
                                                           data-adults-price="<?php echo esc_attr($aventura_adult_price);?>"
                                                           data-child-price="<?php echo esc_attr($aventura_child_price); ?>"
                                                           data-discount="<?php echo esc_attr($aventura_discount); ?>"
                                                           data-available-days='<?php echo json_encode($aventura_tour_available_days); ?>'
                                                           data-start-date="<?php echo esc_attr($aventura_tour_start_date); ?>"
                                                           data-end-date="<?php echo esc_attr($aventura_tour_end_date); ?>"
                                                           data-departure-time='<?php echo json_encode( $aventura_tour_departure_time ); ?>'>
                                                            <?php esc_html_e('Book Now', 'aventura-plugin'); ?>
                                                            <span class="loading-ajax"></span>
                                                        </a>
                                                    <?php else: ?>
                                                        <a class="booking book-view-detail"
                                                           href="<?php the_permalink(); ?>">
                                                            <?php esc_html_e('View Detail', 'aventura-plugin'); ?>
                                                        </a>
                                                    <?php endif;
                                                }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }else{ ?>
                                <div class="tzTour-info">

                                    <div class="tz-title">
                                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                                    </div>
                                    <div class="tzTour-info-left">

                                        <div class="tz-reviews">
                                            <?php
                                            if( class_exists( 'Comment_Rating_Output' ) && $show_rating == 'true' ):
                                                $aventura_rating = new Comment_Rating_Output();
                                                $aventura_rating_html = $aventura_rating->display_average_rating('');
                                                echo balanceTags($aventura_rating_html);
                                            endif;

                                            $aventura_review_count = get_comments_number($post_id);
                                            if( $aventura_review_count > 1 ){
                                                $aventura_review_count_text = esc_html__(' Reviews','aventura-plugin');
                                            }else{
                                                $aventura_review_count_text = esc_html__(' Review','aventura-plugin');
                                            }
                                            ?>
                                            <span class="reviews-count"><?php echo esc_html(get_comments_number($post_id).$aventura_review_count_text); ?></span>
                                        </div>

                                        <div class="clr"></div>

                                        <?php if( $aventura_address != '' ){ ?>
                                            <span class="tz-address">
                                                <?php echo esc_html($aventura_address); ?>
                                            </span>
                                        <?php } ?>

                                        <?php if( $aventura_duration != '' && $show_duration == 'true' ){ ?>
                                            <span class="tz-duration">
                                                <?php echo esc_html($aventura_duration); ?>
                                            </span>
                                        <?php } ?>

                                    </div>

                                    <?php if($aventura_adult_price != '' || $aventura_child_price != ''){ ?>

                                        <div class="tzTour-info-right">
                                            <label><?php esc_html_e('From','aventura-plugin'); ?></label>
                                            <span class="price">
                                                <?php
                                                if($aventura_adult_price != ''){
                                                    echo aventura_price($aventura_adult_price);
                                                }elseif($aventura_child_price != ''){
                                                    echo aventura_price($aventura_child_price);
                                                }
                                                ?>
                                            </span>
                                        </div>

                                    <?php } ?>

                                    <div class="clr"></div>

                                    <?php
                                    if( $aventura_tour_type == 'external' ){
                                        if($aventura_tour_external_button != ''):
                                            echo '<div class="tz-button"><a class="booking" href="'.esc_url($aventura_tour_external_link).'" title="'.esc_html($aventura_tour_external_button).'" target="_blank">'.esc_html($aventura_tour_external_button).'</a></div>';
                                        endif;
                                    }else {
                                        if ($aventura_adult_price != '' || $aventura_child_price != ''):
                                            ?>
                                            <div class="tz-button">
                                                <a class="booking book-now-ajax-btn<?php
                                                if ( ( $aventura_allow_manager_people == '1' && $aventura_total_people == '0' ) || $aventura_tour_type == 'special' && empty($aventura_tour_departure_time) && $aventura_check_tour_available['0'] == '0' ) {
                                                    echo ' disabled';
                                                }
                                                ?>"
                                                   href="<?php the_permalink($post_id); ?>"
                                                   data-post-id="<?php echo esc_attr($post_id); ?>"
                                                    <?php if($aventura_tour_type == 'special' && empty($aventura_tour_departure_time) && $aventura_check_tour_available['2'] != ''){?>
                                                        data-people-available="<?php echo $aventura_check_tour_available['2'];?>"
                                                    <?php }else{?>
                                                        data-people-available=""
                                                    <?php } ?>
                                                   data-tour-type="<?php echo esc_attr($aventura_tour_type); ?>" 
                                                   data-max-adults="<?php echo esc_attr($aventura_max_adults); ?>"
                                                   data-max-kids="<?php echo esc_attr($aventura_max_kids); ?>"
                                                   data-adults-price="<?php echo esc_attr($aventura_adult_price);?>"
                                                   data-child-price="<?php echo esc_attr($aventura_child_price);?>"
                                                   data-discount="<?php echo esc_attr($aventura_discount); ?>"
                                                   data-available-days='<?php echo json_encode($aventura_tour_available_days); ?>'
                                                   data-start-date="<?php echo esc_attr($aventura_tour_start_date); ?>"
                                                   data-end-date="<?php echo esc_attr($aventura_tour_end_date); ?>"
                                                   data-departure-time='<?php echo json_encode( $aventura_tour_departure_time ); ?>'>
                                                    <?php esc_html_e('Book Now', 'aventura-plugin'); ?>
                                                    <span class="loading-ajax"></span>
                                                </a>
                                            </div>
                                        <?php else: ?>
                                            <div class="tz-button">
                                                <a class="booking book-view-detail" href="<?php the_permalink(); ?>">
                                                    <?php esc_html_e('View Detail', 'aventura-plugin'); ?>
                                                </a>
                                            </div>
                                        <?php endif;
                                    }?>
                                </div>
                            <?php } ?>
                        <?php if($tz_type == '5'):?>
                        </div>
                        <?php endif;?>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>

<!--        <div class="tz-form-booking-ajax-content"></div>-->
<!--        <div class="tz-reviews-ajax-content"></div>-->

        <script type="text/javascript">
            jQuery(document).ready(function(){
                "use strict";
                jQuery('#tzTour-slider-<?php echo esc_attr($tz_id)?>').each(function(){
                    jQuery(this).owlCarousel({
                        rtl: <?php if(is_rtl()){ echo 'true';}else{ echo 'false';} ?>,
                        nav:true,
                        navText : ["",""],
                        autoplay: <?php echo esc_attr($auto_play);?>,
                        autoplayTimeout: <?php echo esc_attr($timeout);?>,
                        loop: <?php echo esc_attr($loop);?>,
                        smartSpeed: 700,
                        responsive:{
                            0:{
                                items: <?php if($tz_type == '3' || $tz_type == '4') { echo '1'; } else { echo esc_attr($mobile_columns); } ?>
                            },
                            600:{
                                items: <?php if($tz_type == '3' || $tz_type == '4') { echo '1'; } else { echo esc_attr($tablet_portait_columns); } ?>
                            },
                            992:{
                                items: <?php if($tz_type == '3' || $tz_type == '4') { echo '1'; } else { echo esc_attr($tablet_columns); } ?>
                            },
                            1200:{
                                items: <?php if($tz_type == '3' || $tz_type == '4') { echo '1'; } else { echo esc_attr($desktop_small_columns); } ?>
                            },
                            1500:{
                                items: <?php if($tz_type == '3' || $tz_type == '4') { echo '1'; } else { echo esc_attr($desktop_columns); } ?>
                            }
                        },
                        margin: <?php echo esc_attr($tz_margin);?>

                    })
                })
            });
        </script>
    </div>

    <?php
    return ob_get_clean();
}
add_shortcode('tz-feature-tour','tzaventura_featuredTour');

?>