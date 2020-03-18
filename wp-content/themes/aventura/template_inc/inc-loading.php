<?php
    global $aventura_options;
    $aventura_show_loading =  ((!isset($aventura_options['aventura_general_show_loading'])) || empty($aventura_options['aventura_general_show_loading'])) ? '0' : $aventura_options['aventura_general_show_loading'];
    $aventura_loading_url =  ((!isset($aventura_options['aventura_general_image_loading'])) || empty($aventura_options['aventura_general_image_loading'])) ? '' : $aventura_options['aventura_general_image_loading'];

if( isset($aventura_loading_url) && $aventura_show_loading == 1 ):
?>
<div id="tzloadding">
    <?php

    if( isset($aventura_loading_url) && !empty($aventura_loading_url) ):
        ?>
        <img class="loading_img" src="<?php echo esc_url($aventura_loading_url['url']); ?>" alt="<?php esc_attr_e('loading...','aventura') ?>" width="<?php echo esc_attr($aventura_loading_url['width']); ?>" height="<?php echo esc_attr($aventura_loading_url['height']); ?>">
    <?php else: ?>
        <img class="loading_img" src="<?php echo esc_url(get_template_directory_uri().'/images/loading.gif'); ?>" alt="<?php esc_attr_e('loading...','aventura') ?>" width="100" height="100">

    <?php endif; ?>
</div>
    <?php endif; ?>