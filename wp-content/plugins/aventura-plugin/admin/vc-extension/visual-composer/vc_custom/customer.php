<?php
$args = array(
    "auto_play"                 => "",
    "timeout"                   => "3000",
    "loop"                      => "",
    "desktop_columns"           => "2",
    "desktop_small_columns"     => "2",
    "tablet_columns"            => "2",
    "tablet_portait_columns"    => "2",
    'mobile_columns'            => "1",
    "tz_margin"                 => "30",
    "el_class"                  => "",
    "css"                       => "",
);
$html = "";
extract(shortcode_atts($args, $atts));
wp_enqueue_script('owl-carousel');
wp_enqueue_style('owl-carousel');

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
<div class="tzElement_Customer_Container <?php if( $el_class != '' ) echo esc_attr($el_class); ?> <?php echo vc_shortcode_custom_css_class( $css ); ?>">
    <div class="tzCustomerSlider owl-carousel">
        <?php echo do_shortcode($content);?>
    </div>
</div>
<script type="text/javascript">
    jQuery(document).ready(function(){
        "use strict";
        jQuery( '.tzCustomerSlider').each(function(){
            jQuery(this).owlCarousel({
                rtl: <?php if(is_rtl()){ echo 'true';}else{ echo 'false';} ?>,
                nav:true,
                navText : ["",""],
                slideSpeed : 1000,
                autoplay: <?php echo esc_attr($auto_play);?>,
                autoplayTimeout: <?php echo esc_attr($timeout);?>,
                loop: <?php echo esc_attr($loop);?>,
                paginationSpeed : 5000,
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
</script><!--end script recent-project -->