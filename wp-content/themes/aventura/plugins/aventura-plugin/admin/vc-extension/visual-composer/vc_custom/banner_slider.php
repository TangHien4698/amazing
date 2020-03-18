<?php
$args = array(
    "tz_bg_banner"  => "",
    "auto_play"     => "",
    "timeout"       => "3000",
    "loop"          => "",
    "el_class"      => "",
    "css"           => "",
);
$html = "";

extract(shortcode_atts($args, $atts));
wp_enqueue_script('owl-carousel');
wp_enqueue_style('owl-carousel');

$tz_signature_img_id = preg_replace( '/[^\d]/', '', $tz_bg_banner);
$tz_signature_width ='';

$tz_signature_info = wp_get_attachment_image_src($tz_signature_img_id, $size='full');
if(isset($tz_signature_info) && !empty($tz_signature_info)){
    $tz_signature_url = $tz_signature_info[0];
    $tz_signature_width = $tz_signature_info[1];
    $tz_signature_height = $tz_signature_info[2];
}
?>
<div class="tzElement_Banner_Container <?php if( $el_class != '' ) echo esc_attr($el_class); ?> <?php echo vc_shortcode_custom_css_class( $css ); ?>" data-play="<?php echo esc_attr($auto_play);?>" data-timeout="<?php echo esc_attr($timeout);?>" data-loop="<?php echo esc_attr($loop);?>" style="background-image: url(<?php echo esc_url($tz_signature_url);?>)">
    <div class="tzBannerItemOverlay">
        <div class="tzBannerSlider owl-carousel">
            <?php echo do_shortcode($content);?>
        </div>
    </div>
</div>
<script type="text/javascript">
    jQuery(document).ready(function(){
        "use strict";
        jQuery( '.tzBannerSlider').each(function(){
            var $play           =   jQuery(this).parents('.tzElement_Banner_Container').data('play');
            var $timeout        =   jQuery(this).parents('.tzElement_Banner_Container').data('timeout');
            var $loop           =   jQuery(this).parents('.tzElement_Banner_Container').data('loop');
            jQuery(this).owlCarousel({
                rtl: <?php if(is_rtl()){ echo 'true';}else{ echo 'false';} ?>,
                nav:true,
                navText : ["",""],
                autoplay: $play,
                autoplayTimeout: $timeout,
                loop: $loop,
                smartSpeed: 600,
                items : 1
            })
        })
    });
</script><!--end script recent-project -->


