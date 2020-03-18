<?php

function tzaventura_latestTour($atts) {
    $tz_type = $tz_title = $tz_type_latest = $tz_latest_category = $tz_latest_post = $tz_des = $tz_link = $tz_size = $tz_page  = $tz_margin = $auto_play = $timeout = $loop = $desktop_columns = $desktop_small_columns = $tablet_columns = $tablet_portait_columns = $mobile_columns = $el_class = $css = '';
    extract(shortcode_atts(array(
        'tz_type'                   => '',
        'tz_title'                  => '',
        'tz_type_latest'            => '',
        'tz_latest_category'        => '',
        'tz_latest_post'            => '',
        'tz_des'                    => '',
        'tz_link'                   => '',
        'tz_size'                   => 'large',
        'tz_page'                   => 10,
        'auto_play'                 => 'true',
        'timeout'                   => '3000',
        'loop'                      => 'true',
        'desktop_columns'           => '5',
        'desktop_small_columns'     => '3',
        'tablet_columns'            => '2',
        'tablet_portait_columns'    => '2',
        'mobile_columns'            => '1',
        'tz_margin'                 => '',
        'el_class'                  => '',
        'css'                       => '',
    ),$atts));
    ob_start();
    wp_enqueue_script('owl-carousel');
    wp_enqueue_style('owl-carousel');
    if ($tz_type_latest == 'category'):
        if($tz_latest_category != ''):
            $cat_id = explode(",",$tz_latest_category);
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
                'post_type'         =>  'tour',
                'posts_per_page'    =>  $tz_page,
                'tax_query'         =>  array(
                    array(
                        'taxonomy'  =>  'tour-category',
                        'filed'     =>  'id',
                        'terms'      =>  $tzcat,
                    )
                )
            );
        endif;
    else:

        $tz_tour_array = explode(", ", $tz_latest_post);
        $tz_tour_args = array(
            'post_type'             => 'tour',
            'posts_per_page'        => $tz_page,
            'ignore_sticky_posts'   => 1,
            'post__in'              => $tz_tour_array,
        );
    endif;

    if($auto_play == ''){
        $auto_play  = 'false';
    }
    if($loop == '') {
        $loop = 'false';
    }
    if($timeout == ''){
        $timeout = 3000;
    }
    if($tz_margin == ''){
        $tz_margin = 0;
    }
    ?>
    <div class="tzElement_LatestTour <?php if( $el_class != '' ) echo esc_attr($el_class); ?> <?php echo vc_shortcode_custom_css_class( $css ); ?> type-<?php echo esc_html($tz_type); ?>">
            <div class="tzLatest-top">
                <?php if($tz_type == '2'){ ?>
                    <div class="container">
                <?php } ?>
                <?php if($tz_title != ''): ?>
                    <h2 class="latest-title"><?php echo esc_html($tz_title); ?></h2>
                <?php endif; ?>
                <?php if($tz_type == '2'){ ?>
                    <?php if($tz_link != ''): ?>
                    <a href="<?php echo esc_html($tz_link); ?>" class="view-more"><?php echo esc_html__('View all tours','aventura-plugin') ?></a>
                    <?php endif; ?>
                     <?php if($tz_des != ''): ?>
                    <div class="tz-des">
                        <?php echo esc_attr($tz_des); ?>
                    </div>
                <?php endif; } ?>
                <?php if($tz_type == '2'){ ?>
                    </div>
                <?php } ?>
            </div>
            <?php if($tz_type == 2): ?>
                <div class="latest-slider owl-carousel">
            <?php
            endif; ?>
            <?php
            $tz_tour_query = new WP_Query($tz_tour_args);
            if($tz_tour_query -> have_posts()): while ($tz_tour_query -> have_posts()) : $tz_tour_query -> the_post();

                $aventura_discount      =   aventura_metabox( 'aventura_tour_discount','','','0' );
                $aventura_duration      =   aventura_metabox( 'aventura_tour_duration','','','' );
                $aventura_adult_price   =   aventura_metabox( 'aventura_adult_price','','','0' );
                $aventura_child_price   =   aventura_metabox( 'aventura_child_price','','','0' );

                ?>
                <div class="tzLatest-item">
                    <?php

                    $tz_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID) , $tz_size);
                    $tz_thumb_style = '';
                    if($tz_image_url){
                        $tz_thumb_style = 'style = background-image:url("'.$tz_image_url[0].'")';
                    }

                    ?>
                    <div class="tz-thumb" <?php echo esc_attr($tz_thumb_style)?>>
                        <?php if($tz_type == '1'){
                         if( $aventura_discount != '' && $aventura_discount != 0 ) echo '<span class="discount">'.$aventura_discount.esc_html__('% Off','aventura-plugin').'<small></small>'.'</span>';
                         }else{
                            $tz_url_icon = get_template_directory_uri().'/images/elip.png';
                         if( $aventura_discount != '' && $aventura_discount != 0 ) echo '<span class="discount" style="background-image: url('.esc_html($tz_url_icon).')">'.'<span class="save">'.esc_html__(' Save ','aventura-plugin').'</span>'.$aventura_discount.esc_html__('%','aventura-plugin').'</span>';
                        } ?>
                    </div>
                    <div class="tz-info">
                        <?php if($tz_type == '2'){ ?>
                        <div class="tz-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                        <?php } ?>
                        <div class="tz-title">
                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <?php if( $aventura_duration != ''): ?>
                                <?php if($tz_type == '1'){ ?>
                                <span><?php echo  esc_html($aventura_duration);?></span>
                                    <?php }else{ ?>
                                    <span><i class="fa fa-clock-o"></i><?php echo  esc_html($aventura_duration);?></span>
                            <?php } endif; ?>

                        </div>
                        <?php
                        if($aventura_adult_price != '' || $aventura_child_price != ''):
                        ?>
                        <div class="tz-price">
                            <p><?php esc_html_e('From','aventura-plugin'); ?></p>
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
                        <?php endif;?>
                    </div>
                </div>
                <?php
            endwhile;
            wp_reset_postdata();
            endif;
            ?>
           <?php if($tz_type == 2): ?>
            </div>
            <?php endif; ?>
        <script type="text/javascript">
            jQuery(document).ready(function(){
                "use strict";

                jQuery( '.latest-slider').each(function(){
                    jQuery(this).owlCarousel({
                        rtl: <?php if(is_rtl()){ echo 'true';}else{ echo 'false';} ?>,
                        nav:true,
                        navText : ["",""],
                        slideSpeed : 1000,
                        autoplay: <?php echo esc_attr($auto_play);?>,
                        autoplayTimeout: <?php echo esc_attr($timeout);?>,
                        loop: <?php echo esc_attr($loop);?>,
                        paginationSpeed : 1000,
                        responsive:{
                            0:{
                                items: <?php echo esc_attr($mobile_columns);?>
                            },
                            600:{
                                items: <?php echo esc_attr($tablet_portait_columns);?>
                            },
                            992:{
                                items: <?php echo esc_attr($tablet_columns);?>
                            },
                            1200:{
                                items: <?php echo esc_attr($desktop_small_columns);?>
                            },
                            1500:{
                                items: <?php echo esc_attr($desktop_columns);?>
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
add_shortcode('tz-latest-tour','tzaventura_latestTour');

?>