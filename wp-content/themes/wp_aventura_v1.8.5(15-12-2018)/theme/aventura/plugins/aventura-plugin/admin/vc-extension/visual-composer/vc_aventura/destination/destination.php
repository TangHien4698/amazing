<?php

function tzaventura_destinations($atts) {
    $tz_type = $tz_row = $tz_bg = $tz_destination = $tz_title = $tz_title_background = $tz_description = $tz_size = $tz_label = $tz_link = $tz_margin = $tz_column = $auto_play = $timeout = $loop = $desktop_columns = $desktop_small_columns = $tablet_columns = $tablet_portait_columns = $mobile_columns = $el_class = $css = '';
    extract(shortcode_atts(array(
        'tz_type'                   => '',
        'tz_destination'            => '',
        'tz_title'                  => '',
        'tz_title_background'       => '',
        'tz_description'            => '',
        'tz_size'                   => 'large',
        'tz_label'                  => '',
        'tz_link'                   => '',
        'tz_margin'                 => '',
        'tz_column'                 => '',
        'auto_play'                 => 'true',
        'timeout'                   => '3000',
        'loop'                      => 'true',
        'desktop_columns'           => '4',
        'desktop_small_columns'     => '4',
        'tablet_columns'            => '2',
        'tablet_portait_columns'    => '2',
        'mobile_columns'            => '1',
        'el_class'                  => '',
        'css'                       => '',
    ),$atts));
    ob_start();
    if($tz_type != '4') {
        wp_enqueue_script('owl-carousel');
        wp_enqueue_style('owl-carousel');

    }
    $tz_destination_array = explode(',',$tz_destination);

    $tz_signature_img_id = preg_replace( '/[^\d]/', '', $tz_bg);
    $tz_signature_width ='';
    $tz_id = mt_rand();
    if($auto_play == ''){
        $auto_play  = 'false';
    }
    if($loop == ''){
        $loop = 'false';
    }
    if($timeout == ''){
        $timeout = 3000;
    }
    if($tz_margin == ''){
        $tz_margin = 0;
    }
    if($tz_label == ''){
        $tz_label = 'View all deals';
    }
    ?>
    <div class="tzElement_Destination type-<?php echo esc_html($tz_type); ?> <?php if($tz_type == 4){ echo 'destination-'.$tz_column.'-column'; } ?> <?php if( $el_class != '' ) echo esc_attr($el_class); ?> <?php echo vc_shortcode_custom_css_class( $css ); ?>">
        <?php if(($tz_type == 1 && ($tz_title !='' || $tz_label != '' )) || ($tz_type == 5 && ($tz_title !='' || $tz_title_background || $tz_description != ''))){ ?>
        <div class="destination-top">
            <?php if($tz_type == 5 && $tz_title_background != ''):?>
            <h2 class="destination-title-background">
                <?php echo esc_html($tz_title_background);?>
            </h2>
            <?php endif;?>

            <?php if($tz_title != ''): ?>
            <h3 class="destination-title"><?php echo esc_html($tz_title); ?></h3>
            <?php endif; ?>

            <?php if($tz_type == 1 && $tz_label != ''): ?>
            <a href="<?php echo esc_html($tz_link); ?>" class="view-more"><?php echo esc_html($tz_label); ?></a>
            <?php endif; ?>

            <?php if($tz_type == 5 && $tz_description != ''):?>
            <p class="destination-description">
                <?php echo esc_html($tz_description);?>
            </p>
            <?php endif;?>
        </div>
        <?php }

        if($tz_type == '5'){
            ?>
            <div class="destination-slider-wrapper">
            <?php
        }

        if($tz_type !='4'){
        ?>
            <div id="destination-slider-<?php echo esc_attr($tz_id)?>" class="destination-slider owl-carousel">
        <?php } ?>

            <?php
            $tz_args = array(
                'post_type' => 'destination',
                'post__in' => $tz_destination_array,
                'posts_per_page' => -1,
            );
            $tz_query = new WP_Query($tz_args);
            $aventura_count = 1;
            $aventura_i = 1;
            $aventura_total = $tz_query -> post_count;
            while ($tz_query ->have_posts()): $tz_query -> the_post();

                $tz_args1 = array(
                    'post_type' => 'tour',
                    'posts_per_page' => -1,
                    'meta_query' => array(
                        array(
                            'key' => 'aventura_tour_destination',
                            'value' => $tz_query->post->ID,
                            'compare' => '=',
                        ),
                    )
                );
                $tz_query1 = new WP_Query($tz_args1);
                $tz_post_thumbnail_id = get_post_thumbnail_id($post->ID);
                $tz_post_thumbnail = wpb_getImageBySize( array(
                    'attach_id' => $tz_post_thumbnail_id,
                    'thumb_size' => $tz_size,
                ) );
                $tz_image_thumbnail = $tz_post_thumbnail['thumbnail'];

                $tour_text = esc_html__('Tour','aventura-plugin');
                if( $tz_query1 -> post_count > 1 ){
                    $tour_text = esc_html__('Tours','aventura-plugin');
                }
                ?>

                <?php if($tz_type == '5'): ?>
                    <?php if($aventura_count%5==1):?>
                        <div class="distination-item">
                    <?php endif;?>

                        <div class="tz-destination-item-child tz-destination-item-<?php echo esc_attr($aventura_i)?>">
                            <div class="tz-destination-item-box">
                                <?php
                                global $post;
                                $tz_imgurl = wp_get_attachment_image_url( get_post_thumbnail_id($post->ID),'large',false);
                                ?>
                                <div class="des-img" style="background-image: url('<?php echo esc_html($tz_imgurl); ?>')">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php
//                                        echo $tz_image_thumbnail;
//                                        echo '<div class="tz-overlay"></div>';
                                        ?>
                                    </a>
                                </div>
                                <div class="content">
                                    <h3 class="title">
                                        <a href="<?php the_permalink();?>"><?php the_title();?></a>
                                    </h3>
                                    <div class="count-offer"><?php echo $tz_query1 -> post_count; ?> <?php echo esc_html($tour_text); ?></div>
                                </div>
                            </div>
                        </div>

                    <?php if($aventura_count%5==0 || $aventura_count == $aventura_total):?>
                        </div>
                    <?php $aventura_i=0;endif;?>
                <?php else: ?>
                    <div class="distination-item <?php if($tz_column == '2'): echo 'col-md-6 col-sm-6'; elseif($tz_column == '3'): echo 'col-md-4 col-sm-6'; endif; ?>">
                        <?php
                        global $post;
                        $tz_imgurl = wp_get_attachment_image_url( get_post_thumbnail_id($post->ID),'large',false);
                        ?>
                        <div class="des-img" <?php if($tz_type == '3'): ?>style="background-image: url('<?php echo esc_html($tz_imgurl); ?>')" <?php endif; ?>>
                            <a href="<?php the_permalink(); ?>">
                                <?php
                                if($tz_type != '3'):
                                    echo $tz_image_thumbnail;
                                    echo '<div class="tz-overlay"></div>';
                                endif;
                                ?>
                            </a>
                        </div>
                        <div class="content">
                            <h3 class="title">
                                <a href="<?php the_permalink();?>"><?php the_title();?></a>
                            </h3>

                            <?php if($tz_type == '2' || $tz_type == '5'){ ?>
                                <div class="count-offer"><?php echo $tz_query1 -> post_count; ?> <?php echo esc_html($tour_text); ?></div>
                            <?php }else{ ?>
                                <div class="count-offer"><?php echo $tz_query1 -> post_count; ?> <?php echo esc_html__('Deal Offers','aventura-plugin'); ?></div>
                                <?php the_excerpt(); ?>
                            <?php } ?>

                            <?php if($tz_type == '1' || $tz_type == '4'){ ?>

                                <div class="rating">
                                    <?php
                                    if( class_exists( 'Comment_Rating_Output' ) ):
                                        $average_rating = get_post_meta( $tz_query->post->ID, 'tz-average-rating', true );
                                        if ( empty( $average_rating ) ) {
                                            $average_rating = 0;
                                        }
                                        echo '<div class="tz-average-rating"><div class="tz-rating tz-rating-' . $average_rating . '"></div></div>';
                                    endif;
                                    echo '<small>-</small>';
                                    $aventura_review_count = get_comments_number($tz_query->post->ID);
                                    if( $aventura_review_count > 1 ){
                                        $aventura_review_count_text = esc_html__(' Reviews','aventura-plugin');
                                    }else{
                                        $aventura_review_count_text = esc_html__(' Review','aventura-plugin');
                                    }
                                    ?>
                                    <span class="reviews-count"><?php echo esc_html(get_comments_number($tz_query->post->ID).$aventura_review_count_text); ?></span>
                                </div>
                                <a class="tz-view-more" href="<?php the_permalink(); ?>"> <?php echo esc_html__('View More','aventura-plugin'); ?></a>
                            <?php } ?>
                        </div>
                    </div>
                <?php endif;?>
                <?php
                $aventura_count++;
                $aventura_i++;
            endwhile;
            wp_reset_postdata();
            ?>
        <?php if($tz_type != '4'){ ?>
            </div>
        <?php } ?>
        <?php if($tz_type != '4'){ ?>
        <script type="text/javascript">
            jQuery(document).ready(function(){
                "use strict";

                jQuery('#destination-slider-<?php echo esc_attr($tz_id)?>').each(function(){
                    jQuery(this).owlCarousel({
                        rtl: <?php if(is_rtl()){ echo 'true';}else{ echo 'false';} ?>,
                        nav:true,
                        autoplay: <?php echo esc_attr($auto_play);?>,
                        autoplayTimeout: <?php echo esc_attr($timeout);?>,
                        loop: <?php echo esc_attr($loop);?>,
                        navText : ["",""],
                        responsive:{
                            0:{
                                items: <?php if($tz_type == '5'){ echo '1';} else{ echo esc_attr($mobile_columns);}?>
                            },
                            600:{
                                items: <?php if($tz_type == '5'){ echo '1';} else{ echo esc_attr($tablet_portait_columns);}?>
                            },
                            992:{
                                items: <?php if($tz_type == '5'){ echo '1';} else{ echo esc_attr($tablet_columns);}?>
                            },
                            1200:{
                                items: <?php if($tz_type == '5'){ echo '1';} else{ echo esc_attr($desktop_small_columns);}?>
                            },
                            1500:{
                                items: <?php if($tz_type == '5'){ echo '1';} else{ echo esc_attr($desktop_columns);}?>
                            }
                        },
                        margin: <?php echo esc_attr($tz_margin);?>
                    })
                })
            });
        </script>
        <?php }

        if($tz_type == '5'){
        ?>
            </div>
        <?php
        }
        ?>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('tz-destinations','tzaventura_destinations');

?>