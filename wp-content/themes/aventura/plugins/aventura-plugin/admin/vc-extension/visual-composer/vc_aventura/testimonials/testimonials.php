<?php

function tzaventura_testimonials($atts) {
    $tz_type_testimonials = $tz_tour_category = $tz_tour_post = $tz_des = $tz_margin = $tz_height = $auto_play = $timeout = $loop = $desktop_columns = $desktop_small_columns = $tablet_columns = $tablet_portait_columns = $mobile_columns = $el_class = $css = '';
    extract(shortcode_atts(array(
        'tz_type_testimonials'      => '',
        'tz_tour_category'          => '',
        'tz_tour_post'              => '',
        'tz_des'                    => '',
        'tz_item'                   => '',
        'tz_margin'                 => '0',
        'tz_height'                 => '',
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
    wp_enqueue_script('owl-carousel');
    wp_enqueue_style('owl-carousel');
    if ($tz_type_testimonials == 'category'):
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
                'post_type'         =>  'tour',
                'posts_per_page'    =>  -1,
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

        $tz_tour_array = explode(", ", $tz_tour_post);
        $tz_tour_args = array(
            'post_type'             => 'tour',
            'posts_per_page'        => -1,
            'ignore_sticky_posts'   => 1,
            'post__in'              => $tz_tour_array,
        );
    endif;

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

    ?>
    <div class="tzElement_Testimonials <?php if( $el_class != '' ) echo esc_attr($el_class); ?> <?php echo vc_shortcode_custom_css_class( $css ); ?>">
        <div class="tzTestimonialSlider owl-carousel">
            <?php

            $tz_tour_query = new WP_Query($tz_tour_args);
            if($tz_tour_query -> have_posts()): while ($tz_tour_query -> have_posts()) : $tz_tour_query -> the_post();

                $aventura_discount      =   aventura_metabox( 'aventura_tour_discount' );
                $aventura_duration      =   aventura_metabox( 'aventura_tour_duration' );
                $aventura_date          =   aventura_metabox( 'aventura_departure_date' );
                $aventura_address       =   aventura_metabox( 'address' );
                $aventura_adult_price   =   aventura_metabox( 'aventura_adult_price' );
                $aventura_child_price   =   aventura_metabox( 'aventura_child_price' );
                $aventura_infant_price  =   aventura_metabox( 'aventura_infant_price' );
                $aventura_destination   =   aventura_metabox( 'aventura_tour_destination' );
                $aventura_tour_guide    =   aventura_metabox( 'aventura_tour_guide' );
                $tz_des = get_post($aventura_tour_guide);
                ?>
                <div class="tzTour-item" <?php if($tz_height != ''){?> style="height:<?php echo esc_html($tz_height); ?>" <?php } ?>>
                    <?php
                    $post_thumbnail_id = get_post_thumbnail_id($aventura_tour_guide);
                    $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
                    ?>
                    <div class="tz-thumb" style="background-image: url(<?php echo esc_html($post_thumbnail_url); ?>)">
                    </div>
                    <div class="tz-content">
                        <div class="tz-title">
                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <?php
                            if( class_exists( 'Comment_Rating_Output' ) ):
                                $aventura_rating = new Comment_Rating_Output();
                                $aventura_rating_html = $aventura_rating->display_average_rating('');
                                echo balanceTags($aventura_rating_html);
                            endif;
                            ?>
                        </div>
                        <div class="content-tour-guide">
                            <p class="date"><?php echo get_the_date(); ?></p>
                            <h3 class="title-tour-guide">
                                <?php echo get_the_title($aventura_tour_guide); ?>
                            </h3>
                            <p class="des"><?php echo get_the_excerpt($aventura_tour_guide); ?></p>
                        </div>
                    </div>
                </div>
                <?php
            endwhile;
            wp_reset_postdata();
            endif;
            ?>
        </div>
        <script type="text/javascript">
            jQuery(document).ready(function(){
                "use strict";

                jQuery( '.tzTestimonialSlider').each(function(){
                    jQuery(this).owlCarousel({
                        rtl: <?php if(is_rtl()){ echo 'true';}else{ echo 'false';} ?>,
                        nav:true,
                        autoplay: <?php echo esc_attr($auto_play);?>,
                        autoplayTimeout: <?php echo esc_attr($timeout);?>,
                        loop: <?php echo esc_attr($loop);?>,
                        navText : ["",""],
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
add_shortcode('tz-testimonials','tzaventura_testimonials');

?>