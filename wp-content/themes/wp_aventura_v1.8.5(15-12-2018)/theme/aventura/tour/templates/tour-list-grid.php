<?php
global $aventura_options,$aventura_post_id,$aventura_wishlist_url,$aventura_wishlist;

        $aventura_tour_option   =   aventura_metabox( 'aventura_tour_type','',$aventura_post_id,'' );
        $aventura_departure_date =   aventura_metabox( 'aventura_departure_date','',$aventura_post_id,'' );

        $aventura_discount      =   aventura_metabox( 'aventura_tour_discount','',$aventura_post_id,'' );
        $aventura_duration      =   aventura_metabox( 'aventura_tour_duration','',$aventura_post_id,'' );
        $aventura_address       =   aventura_metabox( 'address','',$aventura_post_id,'' );
        $aventura_adult_price   =   aventura_metabox( 'aventura_adult_price','',$aventura_post_id,'' );
        $aventura_child_price   =   aventura_metabox( 'aventura_child_price','',$aventura_post_id,'' );
        $aventura_infant_price  =   aventura_metabox( 'aventura_infant_price','',$aventura_post_id,'' );
        $aventura_destination   =   aventura_metabox( 'aventura_tour_destination','',$aventura_post_id,'' );

        /*  Form Booking    */
        $aventura_max_adults        = isset( $aventura_options['aventura_tour_detail_max_adults'] ) ? $aventura_options['aventura_tour_detail_max_adults'] : 3;
        $aventura_max_kids          = isset( $aventura_options['aventura_tour_detail_max_kids'] ) ? $aventura_options['aventura_tour_detail_max_kids'] : 0;
        $aventura_tour_type             =   aventura_metabox( 'aventura_tour_type','',$aventura_post_id,'' );
        $aventura_tour_external_button  =   aventura_metabox( 'aventura_tour_external_button','',$aventura_post_id,esc_html__('Book Now','aventura') );
        $aventura_tour_external_link    =   aventura_metabox( 'aventura_tour_external_link','',$aventura_post_id,'#' );
        $aventura_adult_price           =   aventura_metabox( 'aventura_adult_price','',$aventura_post_id,'0');
        $aventura_child_price           =   aventura_metabox( 'aventura_child_price','',$aventura_post_id,'0' );
        $aventura_discount              =   aventura_metabox( 'aventura_tour_discount','',$aventura_post_id,'0' );
        $aventura_tour_available_days   =   aventura_metabox( 'aventura_available_days','',$aventura_post_id,'' );
        $aventura_tour_start_date       =   aventura_metabox( 'aventura_tour_start_date','',$aventura_post_id,'' );
        $aventura_tour_end_date         =   aventura_metabox( 'aventura_tour_end_date','',$aventura_post_id,'' );
        $aventura_departure_time        =   aventura_metabox( 'aventura_departure_time','',$aventura_post_id,'' );

        $aventura_trim_words        = isset( $aventura_options['aventura_tour_archive_title_trim_words'] ) ? $aventura_options['aventura_tour_archive_title_trim_words'] : '';

        $aventura_tour_start_date_milli_sec = 0;
        if ( ! empty( $aventura_tour_end_date ) ) {
            $aventura_tour_start_date_milli_sec = strtotime( $aventura_tour_start_date) * 1000;
        }
        $aventura_tour_end_date_milli_sec = 0;
        if ( ! empty( $aventura_tour_end_date ) ) {
            $aventura_tour_end_date_milli_sec = strtotime( $aventura_tour_end_date) * 1000;
        }

        $aventura_date_format = get_option('date_format');

        if( $aventura_tour_option == 'daily' ){
            $aventura_date = date($aventura_date_format, strtotime($aventura_tour_start_date));
        }else{
            $aventura_date = date($aventura_date_format, strtotime($aventura_departure_date));
        }

$aventura_check_tour_available = aventura_tour_check_availability_advance( $aventura_post_id, '', '' );
$aventura_allow_manager_people = aventura_metabox( 'aventura_tour_manager_people','',$aventura_post_id,'' );
$aventura_total_people = aventura_metabox( 'aventura_tour_total_people','',$aventura_post_id,'' );
        ?>

        <div id="post-<?php echo esc_attr($aventura_post_id) ; ?>" class="tz-tour-item">
            <div class="item-content">
                <div class="tz-thumb">
                    <a href="<?php the_permalink($aventura_post_id); ?>">
                        <?php
                        echo get_the_post_thumbnail($aventura_post_id,'large');
                        ?>
                    </a>

                    <?php
                    if ( ( $aventura_allow_manager_people == '1' && $aventura_total_people == '0' ) || $aventura_tour_type == 'special' && empty($aventura_departure_time) && $aventura_check_tour_available['0'] == '0' ) {
                        ?>
                        <span class="tz-tour-sold-out"><?php echo esc_html__('Sold Out','aventura')?></span>
                        <?php
                    }
                    ?>
                </div>
                <?php if( $aventura_discount != '' && $aventura_discount != 0 ) echo '<div class="discount"><span>'.esc_html($aventura_discount).esc_html__('% OFF','aventura').'</span></div>';?>
                <div class="tz-info">
                    <div class="tz-row tz-title">
                        <?php if( $aventura_trim_words != '' && is_numeric($aventura_trim_words) ){ ?>
                            <h4><a href="<?php the_permalink($aventura_post_id); ?>"><?php echo wp_trim_words(get_the_title($aventura_post_id),$aventura_trim_words); ?></a></h4>
                        <?php }else{ ?>
                            <h4><a href="<?php the_permalink($aventura_post_id); ?>"><?php echo get_the_title($aventura_post_id); ?></a></h4>
                        <?php } ?>
                        <?php if( $aventura_duration != ''){ ?>
                            <span><i class="fa fa-clock-o"></i><?php echo  esc_html($aventura_duration);?></span>
                        <?php } ?>
                        <div class="tz-reviews">
                            <?php
                            if( class_exists( 'Comment_Rating_Output' ) ):
                                $aventura_average_rating = get_post_meta( $aventura_post_id, 'tz-average-rating', true );
                                if ( empty( $aventura_average_rating ) ) {
                                    $aventura_average_rating = 0;
                                }
                                echo '<div class="tz-average-rating"><div class="tz-rating tz-rating-' . esc_attr($aventura_average_rating) . '"></div></div>';
                            endif;

                            $aventura_review_count = get_comments_number($aventura_post_id);
                            if( $aventura_review_count > 1 ){
                                $aventura_review_count_text = esc_html__(' Reviews','aventura');
                            }else{
                                $aventura_review_count_text = esc_html__(' Review','aventura');
                            }
                            ?>
                            <span class="reviews-count"><?php echo esc_html(get_comments_number($aventura_post_id).$aventura_review_count_text); ?></span>
                        </div>
                    </div>
                    <div class="tz-row tz-review-price">
                        <div class="tz-reviews">
                            <?php
                            if( class_exists( 'Comment_Rating_Output' ) ):
                                $aventura_average_rating = get_post_meta( $aventura_post_id, 'tz-average-rating', true );
                                if ( empty( $aventura_average_rating ) ) {
                                    $aventura_average_rating = 0;
                                }
                                echo '<div class="tz-average-rating"><div class="tz-rating tz-rating-' . esc_attr($aventura_average_rating) . '"></div></div>';
                            endif;

                            $aventura_review_count = get_comments_number($aventura_post_id);
                            if( $aventura_review_count > 1 ){
                                $aventura_review_count_text = esc_html__(' Reviews','aventura');
                            }else{
                                $aventura_review_count_text = esc_html__(' Review','aventura');
                            }
                            ?>
                            <span class="reviews-count"><?php echo esc_html(get_comments_number($aventura_post_id).$aventura_review_count_text); ?></span>
                        </div>
                        <?php if($aventura_adult_price != '' || $aventura_child_price != ''):?>
                            <div class="tz-price">
                                <p class="from"><?php esc_html_e('From','aventura'); ?></p>
                                <p class="price">
                                    <?php
                                    if($aventura_adult_price != ''){
                                        echo aventura_price($aventura_adult_price);
                                    }elseif($aventura_child_price != ''){
                                        echo aventura_price($aventura_child_price);
                                    }
                                    ?>
                                </p>
                            </div>
                        <?php endif;?>
                    </div>
                    <div class="tz-row tz-time">
                        <?php if( $aventura_date != '' ){ ?>
                            <div class="tz-date">
                                <div class="icon"><i class="fa fa-clock-o"></i></div>
                                <p><?php esc_html_e('Date','aventura') ?></p>
                                <span class="text"><?php echo esc_html($aventura_date); ?></span>
                            </div>
                        <?php } ?>
                        <?php if( $aventura_address != '' ){ ?>
                            <div class="tz-depature">
                                <div class="icon"><i class="fa fa-map-marker"></i></div>
                                <p><?php esc_html_e('Departure','aventura') ?></p>
                                <span class="text"><?php echo esc_html($aventura_address); ?></span>
                            </div>
                        <?php } ?>
                        <?php if($aventura_adult_price != '' || $aventura_child_price != ''):?>
                            <div class="tz-price">
                                <p class="from"><?php esc_html_e('From','aventura'); ?></p>
                                <p class="price">
                                    <?php
                                    if($aventura_adult_price != ''){
                                        echo aventura_price($aventura_adult_price);
                                    }elseif($aventura_child_price != ''){
                                        echo aventura_price($aventura_child_price);
                                    }
                                    ?>
                                </p>
                            </div>
                        <?php endif;?>
                    </div>
                    <div class="tz-row tz-button">
                        <?php if( $aventura_review_count != 0 ){ ?>
                            <a class="review review-ajax-btn" href="#" data-post-id="<?php echo esc_attr( $aventura_post_id ); ?>">
                                <?php esc_html_e('Show Reviews','aventura'); ?>
                                <span class="loading-ajax"></span>
                            </a>
                        <?php
                        } ?>
                        <a class="readmore" href="<?php the_permalink($aventura_post_id); ?>"><i class="fa fa-info"></i><?php esc_html_e(' Read More','aventura'); ?></a>
                        <span class="view"><i class="fa fa-eye"></i><?php echo esc_html(aventura_getPostViews($aventura_post_id)); ?></span>

                        <?php if ( ! empty( $aventura_wishlist_url ) ) : ?>
                            <a class="tz-btn-wishlist btn-add-wishlist" href="#" data-post-id="<?php echo esc_attr( $aventura_post_id ); ?>"<?php echo ( in_array( $aventura_post_id, $aventura_wishlist) ? ' style="display:none;"' : '' ) ?>>
                                <i class="fa fa-heart-o"></i>
                            </a>
                            <a class="tz-btn-wishlist btn-remove-wishlist" href="#" data-post-id="<?php echo esc_attr( $aventura_post_id ); ?>"<?php echo ( ! in_array( $aventura_post_id, $aventura_wishlist) ? ' style="display:none;"' : '' ) ?>>
                                <i class="fa fa-heart"></i>
                            </a>
                        <?php endif; ?>
                        <?php
                            if ($aventura_tour_type == 'external') {
                                if ($aventura_tour_external_link != ''):
                                    echo '<a class="booking" href="' . esc_url($aventura_tour_external_link) . '" title="' . esc_html($aventura_tour_external_button) . '" target="_blank"><i class="fa fa-shopping-cart"></i>' . esc_html__('Book Now', 'aventura') . '</a>';
                                endif;
                            } else {
                                if ($aventura_adult_price != '' || $aventura_child_price != ''):?>
                                    <a class="booking book-now-ajax-btn<?php
                                    if ( ( $aventura_allow_manager_people == '1' && $aventura_total_people == '0' ) || $aventura_tour_type == 'special' && empty($aventura_departure_time) && $aventura_check_tour_available['0'] == '0' ) {
                                        echo ' disabled';
                                    }
                                    ?>"
                                       href="<?php the_permalink($aventura_post_id); ?>"
                                       data-post-id="<?php echo esc_attr($aventura_post_id); ?>"
                                        <?php if($aventura_tour_type == 'special' && empty($aventura_departure_time) && $aventura_check_tour_available['2'] != ''){?>
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
                                       data-start-date="<?php echo esc_attr($aventura_tour_start_date_milli_sec); ?>"
                                       data-end-date="<?php echo esc_attr($aventura_tour_end_date_milli_sec); ?>"
                                       data-departure-time='<?php echo json_encode($aventura_departure_time); ?>'>
                                        <i class="fa fa-shopping-cart"></i><?php esc_html_e('Book Now', 'aventura'); ?>
                                        <span class="loading-ajax"></span>
                                    </a>
                                <?php endif;
                            }
                            ?>
                    </div>
                </div>
            </div>
        </div>