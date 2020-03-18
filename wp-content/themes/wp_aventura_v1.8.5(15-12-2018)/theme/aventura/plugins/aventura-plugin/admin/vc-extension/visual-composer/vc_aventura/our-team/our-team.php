<?php

function tzaventura_our_team($atts) {
    $tz_bg = $tz_name = $tz_position = $tz_des = $tz_link = $tz_fb = $tz_twitter = $tz_dribbble = $tz_google = $tz_instagram = $tz_vimeo = $tz_item = $tz_margin = $el_class = $css = '';
    extract(shortcode_atts(array(
        'tz_bg'             => '',
        'tz_name'           => '',
        'tz_position'       => '',
        'tz_des'            => '',
        'tz_link'           => 'javascript:void(0);',
        'tz_fb'             => '',
        'tz_twitter'        => '',
        'tz_dribbble'       => '',
        'tz_google'         => '',
        'tz_instagram'      => '',
        'tz_vimeo'          => '',
        'tz_item'           => '',
        'tz_margin'         => '',
        'el_class'          => '',
        'css'               => '',
    ),$atts));
    ob_start();

    $tz_signature_img_id = preg_replace( '/[^\d]/', '', $tz_bg);
    $tz_signature_width ='';

    $tz_signature_info = wp_get_attachment_image_src($tz_signature_img_id, $size='full');
    if(isset($tz_signature_info) && !empty($tz_signature_info)){
        $tz_signature_url = $tz_signature_info[0];
        $tz_signature_width = $tz_signature_info[1];
        $tz_signature_height = $tz_signature_info[2];
    }
    ?>
    <div class="tzOur-team <?php if( $el_class != '' ) echo esc_attr($el_class); ?> <?php echo vc_shortcode_custom_css_class( $css ); ?>">
        <div class="tzOur-teamItem">
            <?php if($tz_signature_url != ''){ ?>
                <div class="tz-bg">
                    <a href="<?php echo esc_html($tz_link); ?>">
                        <img src="<?php echo esc_html($tz_signature_url);?>" alt="bg-our-team">
                        <span class="tz-overlay"></span>
                    </a>
                </div>
            <?php } ?>
            <div class="tz-content">
                <div class="tz-title">
                    <?php if($tz_name != ''){ ?>
                        <h3 class="name"><?php echo esc_html($tz_name); ?></h3>
                    <?php } ?>
                    <?php if($tz_position != ''){ ?>
                        <span class="tz-position"><?php echo esc_html($tz_position); ?></span>
                    <?php } ?>
                </div>
                <?php if($tz_des != ''){ ?>
                    <p class="tz-des"><?php echo esc_html($tz_des); ?></p>
                <?php } ?>
                <div class="tz-social">
                    <?php if($tz_fb != ''){ ?>
                        <a href="<?php echo esc_html($tz_fb);?>">
                            <i class="fa fa-facebook-square"></i>
                        </a>
                    <?php } ?>

                    <?php if($tz_twitter != ''){ ?>
                    <a href="<?php echo esc_html($tz_twitter);?>">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <?php } ?>

                    <?php if($tz_dribbble != ''){ ?>
                    <a href="<?php echo esc_html($tz_dribbble);?>">
                        <i class="fa fa-dribbble"></i>
                    </a>
                    <?php } ?>

                    <?php if($tz_google != ''){ ?>
                    <a href="<?php echo esc_html($tz_google);?>">
                        <i class="fa fa-google-plus"></i>
                    </a>
                    <?php } ?>

                    <?php if($tz_instagram != ''){ ?>
                    <a href="<?php echo esc_html($tz_instagram);?>">
                        <i class="fa fa-instagram"></i>
                    </a>
                    <?php } ?>

                    <?php if($tz_vimeo != ''){ ?>
                    <a href="<?php echo esc_html($tz_vimeo);?>">
                        <i class="fa fa-vimeo"></i>
                    </a>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('tz-our-team','tzaventura_our_team');

?>