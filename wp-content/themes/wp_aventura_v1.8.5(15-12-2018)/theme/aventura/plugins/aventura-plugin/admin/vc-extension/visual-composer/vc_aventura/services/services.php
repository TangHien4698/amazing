<?php

function tzaventura_services($attr)
{
    $tz_icon = $tz_image_services = $tz_icon_services = $tz_title_services = $tz_des_services = $el_class = $css = '';
    extract(shortcode_atts(array(
        'tz_icon'           => '1',
        'tz_image_services' => '',
        'tz_icon_services'  => '',
        'tz_title_services' => '',
        'tz_des_services'   => '',
        'el_class'              => '',
        'css'                   => '',
    ), $attr));
    ob_start();

    $tz_signature_img_id = preg_replace( '/[^\d]/', '', $tz_image_services);
    $tz_signature_width ='';

    $tz_signature_info = wp_get_attachment_image_src($tz_signature_img_id, $size='full');
    if(isset($tz_signature_info) && !empty($tz_signature_info)){
        $tz_signature_url = $tz_signature_info[0];
        $tz_signature_width = $tz_signature_info[1];
        $tz_signature_height = $tz_signature_info[2];
    }
    ?>
    <div class="tzElement_Services <?php if( $el_class != '' ) echo esc_attr($el_class); ?> <?php echo vc_shortcode_custom_css_class( $css ); ?>">
        <div class="icon">
            <?php if ($tz_icon =='2' && $tz_icon_services != '') { ?>
                <i class="<?php echo esc_html($tz_icon_services);?>"></i>
            <?php }
             elseif($tz_icon == '1' && $tz_image_services != ''){ ?>
                <img src="<?php echo esc_html($tz_signature_url); ?>" alt="image-services">
            <?php } ?>
        </div>

        <?php if ($tz_title_services != '') { ?>
            <span class="title">
                <?php echo esc_html($tz_title_services); ?>
            </span>
        <?php } ?>
        <?php if ($tz_des_services != '') { ?>
            <p class="descriptions">
                <?php echo balanceTags($tz_des_services); ?>
            </p>
        <?php } ?>
    </div>

    <?php
    return ob_get_clean();
}

add_shortcode('tz-services', 'tzaventura_services');


?>
