<?php
if(function_exists('vc_map')):
vc_map( array(
    "name" => esc_html__("About", "aventura-plugin"),
    "weight" => 1,
    "base" => "tz-about",
    "icon" => "icon-element",
    "description" => "",
    "class" => "tzElement_extended",
    "category" => esc_html__("Aventura", "aventura-plugin"),
    "params" => array(
        array(
            "type"       => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading"    => esc_html__("About Us", "aventura-plugin"),
            "param_name" => "tz_about_info",
            "value" => "",
        ),
        array(
            "type"       => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading"    => esc_html__("Title", "aventura-plugin"),
            "param_name" => "tz_title",
            "value" => "",
        ),
        array(
            "type"       => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading"    => esc_html__("Descriptions", "aventura-plugin"),
            "param_name" => "tz_des",
            "value" => "",
        ),
        array(
            "type"       => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading"    => esc_html__("Button Text", "aventura-plugin"),
            "param_name" => "tz_button",
            "value" => "",
        ),
        array(
            "type"       => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading"    => esc_html__("Button Link", "aventura-plugin"),
            "param_name" => "tz_link",
            "value" => "",
        ),
        array(
            "type"       => "textarea_raw_html",
            "class" => "",
            "heading"    => esc_html__("Iframe Video About", "aventura-plugin"),
            "param_name" => "tz_iframe",
            "value" => "",
        ),
        array(
            'type'        => 'textfield',
            'param_name'  => 'el_class',
            'heading'     => esc_html__( 'Extra class name', 'aventura-plugin' ),
        ),
        array(
            'type'        => 'css_editor',
            'param_name'  => 'css',
            'heading'     => esc_html__( 'CSS box', 'aventura-plugin' ),
            'group'       => esc_html__( 'Design Options', 'aventura-plugin' ),
        ),
    )
) );
endif;
?>