<?php

function tzaventura_hotline($attr)
{
    $tz_bg = $tz_bg_image = $tz_bg_color = $tz_title = $tz_des = $tz_phone = $tz_email = $el_class = $css = '';
    extract(shortcode_atts(array(
        'tz_bg'             => '1',
        'tz_bg_image'       => '',
        'tz_bg_color'       => '',
        'tz_title'          => '',
        'tz_des'            => '',
        'tz_phone'          => '',
        'tz_email'          => '',
        'el_class'              => '',
        'css'                   => '',
    ), $attr));
    ob_start();

    $tz_signature_img_id = preg_replace( '/[^\d]/', '', $tz_bg_image);
    $tz_signature_width ='';

    $tz_signature_info = wp_get_attachment_image_src($tz_signature_img_id, $size='full');
    if(isset($tz_signature_info) && !empty($tz_signature_info)){
        $tz_signature_url = $tz_signature_info[0];
        $tz_signature_width = $tz_signature_info[1];
        $tz_signature_height = $tz_signature_info[2];
    }
    ?>
    <div class="tzElement_Hotline <?php if( $el_class != '' ) echo esc_attr($el_class); ?> <?php echo vc_shortcode_custom_css_class( $css ); ?>" <?php if($tz_bg == 1 && $tz_bg_image != ''):?> style="background-image: url(<?php echo esc_url($tz_signature_url);?>)" <?php endif; if($tz_bg == 2 && $tz_bg_color):?> style="background-color: <?php echo esc_html($tz_bg_color);?>" <?php endif; ?>>
        <div class="tzHotlineOverlay">
            <?php if ($tz_title != '') { ?>
                <span class="title">
                <?php echo esc_html($tz_title); ?>
            </span>
            <?php } ?>
            <?php if ($tz_des != '') { ?>
                <p class="descriptions">
                    <?php echo balanceTags($tz_des); ?>
                </p>
            <?php } ?>
            <?php if ($tz_phone != '') { ?>
                <p class="phone">
                    <i class="fa fa-headphones"></i>
                    <?php echo balanceTags($tz_phone); ?>
                </p>
            <?php } ?>
            <?php if ($tz_email != '') { ?>
                <p class="email">
                    <i class="fa fa-envelope"></i>
                    <?php echo balanceTags($tz_email); ?>
                </p>
            <?php } ?>
        </div>
    </div>

    <?php
    return ob_get_clean();
}

add_shortcode('tz-hotline', 'tzaventura_hotline');


?>
