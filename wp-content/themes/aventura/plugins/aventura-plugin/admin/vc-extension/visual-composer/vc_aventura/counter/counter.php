<?php
function tzaventura_counter($atts) {
    $tz_icon = $tz_image_counter = $tz_icon_counter = $color_icon = $title = $color_title = $count = $color_count = $el_class = $css = '';
    extract(shortcode_atts(array(
        'tz_icon'               => '1',
        'tz_image_counter'      => '',
        'tz_icon_counter'       => '',
        'color_icon'            => '',
        'title'                 => '',
        'color_title'           => '',
        'count'                 => '',
        'color_count'           => '',
        'el_class'              => '',
        'css'                   => '',
    ),$atts));
    ob_start();
    $tz_signature_img_id = preg_replace( '/[^\d]/', '', $tz_image_counter);
    $tz_signature_width ='';

    $tz_signature_info = wp_get_attachment_image_src($tz_signature_img_id, $size='full');
    if(isset($tz_signature_info) && !empty($tz_signature_info)){
        $tz_signature_url = $tz_signature_info[0];
        $tz_signature_width = $tz_signature_info[1];
        $tz_signature_height = $tz_signature_info[2];
    }

    wp_enqueue_script('tz-counter');

    ?>
    <div class="tzElement_Counter <?php if( $el_class != '' ) echo esc_attr($el_class); ?> <?php echo vc_shortcode_custom_css_class( $css ); ?>">
            <div class="tzElement_counterIcon">
                <?php if ($tz_icon =='2' && $tz_icon_counter != '') { ?>
                    <i class="<?php echo esc_html($tz_icon_counter); ?>"></i>
                <?php }
                elseif($tz_icon == '1' && $tz_image_counter != ''){ ?>
                    <img src="<?php echo esc_html($tz_signature_url); ?>" alt="image-services">
                <?php } ?>
            </div>

            <div class="tzElement_count"><p class="stat-count" <?php
                if(!empty($color_count)){
                    echo 'style ="color:'.esc_attr($color_count).';"';
                }
                ?>><?php echo esc_html($count);?></p></div>
            <p <?php
            if(!empty($color_title)){
                echo 'style ="color:'.esc_attr($color_title).';"';
            }
            ?>><?php echo esc_html($title);?></p>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('tz-counter','tzaventura_counter');


?>