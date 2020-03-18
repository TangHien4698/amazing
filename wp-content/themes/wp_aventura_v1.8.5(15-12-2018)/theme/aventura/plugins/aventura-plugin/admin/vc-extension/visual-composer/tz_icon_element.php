<?php
//CUSTOMIZE VISUAL COMPOSER WITH ICONS IN ADMIN PANEL

if(!function_exists('tzinteriart_custom_icons')) {
    function tzinteriart_custom_icons() {
        ?>
        <style type="text/css" media="screen">

            .vc_element-icon.icon-element {
                background-image: url(<?php echo PLUGIN_PATH; ?>admin/vc-extension/visual-composer/tz_icon.png) !important;
                background-position: 0 0 !important;
            }
            .wpb_content_element.tzElement_extended > .wpb_element_wrapper > h4.wpb_element_title > span.icon-element {
                background-image: url(<?php echo PLUGIN_PATH; ?>admin/vc-extension/visual-composer/tz_icon.png);

            }

        </style>
    <?php }
    add_action( 'admin_head', 'tzinteriart_custom_icons' );
}
?>