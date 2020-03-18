<?php
function tzaventura_about($atts) {
    $tz_about_info = $tz_title = $tz_des = $tz_button = $tz_link = $tz_iframe = $el_class = $css = '';
    extract(shortcode_atts(array(
        'tz_about_info'      => '',
        'tz_title'           => '',
        'tz_des'             => '',
        'tz_button'          => '',
        'tz_link'            => '',
        'tz_iframe'          => '',
        'el_class'           => '',
        'css'                => '',
    ),$atts));
    ob_start();
    $tz_iframe = rawurldecode( base64_decode( strip_tags( $tz_iframe ) ) );
    ?>
    <div class="tzElement_About <?php if( $el_class != '' ) echo esc_attr($el_class); ?> <?php echo vc_shortcode_custom_css_class( $css ); ?>">
        <div class="row">
            <div class="tzAbout_Video col-md-6 col-sm-12 col-xs-12">
                <p><?php echo balanceTags($tz_iframe); ?></p>
            </div>
            <div class="tzContent_About col-md-6 col-sm-12 col-xs-12">
                <?php if($tz_about_info != ''){ ?>
                    <h4 class="about-us"><?php echo esc_html($tz_about_info); ?></h4>
                <?php } ?>
                <?php if($tz_title != ''){ ?>
                    <h3 class="title"><?php echo esc_html($tz_title); ?></h3>
                <?php } ?>
                <?php if($tz_des != ''){ ?>
                    <p class="des"><?php echo esc_html($tz_des); ?></p>
                <?php } ?>
                <?php if($tz_link || $tz_button != ''){ ?>
                    <a href="<?php echo esc_html($tz_link); ?>" class="button-about"><?php echo esc_html($tz_button); ?></a>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('tz-about','tzaventura_about');
?>