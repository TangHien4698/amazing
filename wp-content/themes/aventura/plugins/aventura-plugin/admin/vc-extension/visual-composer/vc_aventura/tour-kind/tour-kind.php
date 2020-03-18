<?php

function tzaventura_tourKind($atts) {
    $tz_bg  = $tz_title = $tz_des = $tz_type_tour = $tz_tour_category = $tz_tour_post = $tz_page = $el_class = $css = '';
    extract(shortcode_atts(array(
        'tz_bg'                     => '',
        'tz_title'                  => '',
        'tz_des'                    => '',
        'tz_type_tour'              => '',
        'tz_tour_category'          => '',
        'tz_tour_post'              => '',
        'tz_page'                   => '',
        'el_class'              => '',
        'css'                   => '',
    ),$atts));
    ob_start();
    wp_enqueue_script('tour-kind');

    $tz_signature_img_id = preg_replace( '/[^\d]/', '', $tz_bg);
    $tz_signature_width ='';

    $tz_signature_info = wp_get_attachment_image_src($tz_signature_img_id, $size='large');
    if(isset($tz_signature_info) && !empty($tz_signature_info)){
        $tz_signature_url = $tz_signature_info[0];
        $tz_signature_width = $tz_signature_info[1];
        $tz_signature_height = $tz_signature_info[2];
    }
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

        $tz_tour_array = explode(", ", $tz_tour_post);
        $tz_tour_args = array(
            'post_type'             => 'tour',
            'posts_per_page'        => -1,
            'ignore_sticky_posts'   => 1,
            'post__in'              => $tz_tour_array,
        );
    endif;
    ?>
    <div class="tzElement_TourKind <?php if( $el_class != '' ) echo esc_attr($el_class); ?> <?php echo vc_shortcode_custom_css_class( $css ); ?>">
        <div class="tourKind-top current">
            <div class="img" style="background-image: url(<?php echo esc_html($tz_signature_url); ?>)"></div>
            <div class="infor">
                <h4 class="title">
<!--                    <a href="--><?php //the_permalink(); ?><!--">--><?php //echo esc_html($tz_title);?><!--</a>-->
                    <?php echo esc_html($tz_title);?>
                </h4>
                <p><?php echo '&quot;'. esc_html($tz_des) . '&quot;'; ?></p>
            </div>

        </div>
        <?php
            $tz_tour_query = new WP_Query($tz_tour_args);
            if($tz_tour_query -> have_posts()): while ($tz_tour_query -> have_posts()) : $tz_tour_query -> the_post();
                $aventura_duration      =   aventura_metabox( 'aventura_tour_duration','','','' );
                $aventura_adult_price   =   aventura_metabox( 'aventura_adult_price','','','0' );
                $aventura_child_price   =   aventura_metabox( 'aventura_child_price','','','0' );
                $aventura_address       =   aventura_metabox( 'address','','','' );
        ?>
        <div class="tourKind-item">
            <?php
            $tz_imgurl = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
            ?>
            <div class="img" style="background-image: url('<?php echo esc_html($tz_imgurl); ?>')">
                <div class="plus"></div>
            </div>
            <div class="info">
                <div class="tz-title">
                    <i class="fa fa-map-marker"></i>
                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    <?php if( $aventura_address != ''): ?>
                        <p class="text"><?php echo esc_html($aventura_address); ?></p>
                    <?php endif; ?>
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
            endif; ?>
    </div>

    <?php
    return ob_get_clean();
}
add_shortcode('tz-tour-kind','tzaventura_tourKind');

?>