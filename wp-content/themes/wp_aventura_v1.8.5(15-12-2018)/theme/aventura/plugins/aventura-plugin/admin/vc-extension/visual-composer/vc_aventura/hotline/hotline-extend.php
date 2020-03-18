<?php
if(function_exists('vc_map')):
vc_map(array(
    "name"   => esc_html__("Hotline","aventura-plugin"),
    "icon"  => "icon-element",
    "weight" => 1,
    "base"  => "tz-hotline",
    "class" => "tzElement_extended",
    "description" => "Hotline for wedsite",
    "category" => esc_html__("Aventura", "aventura-plugin"),
    "params" => array(
        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Background Type", "aventura-plugin"),
            "param_name"    => "tz_bg",
            "description"   => esc_html__("", "aventura-plugin"),
            "value"         => array(
                esc_html__("Image", "aventura-plugin")             => '1',
                esc_html__("Color", "aventura-plugin")             => '2'),
            "default"       => '1',
        ),
        array(
            "type" => "attach_image",
            "heading"       => esc_html__("Background Image", "aventura-plugin"),
            "param_name"    => "tz_bg_image",
            "description"   => esc_html__("Upload Background Image.  ", "aventura-plugin"),
            "dependency"    => array('element' => 'tz_bg', 'value' => '1'),
        ),
        array(
            "type" => "colorpicker",
            "class" => "",
            "admin_label" => true,
            "heading" => esc_html__('Background Color', 'aventura-plugin'),
            "param_name" => "tz_bg_color",
            "description" => esc_html__("You can set a color background.", "aventura-plugin"),
            "dependency"    => array('element' => 'tz_bg', 'value' => '2'),
        ),
        array(
            "type" => "textfield",
            "heading"       => esc_html__("Title", "aventura-plugin"),
            "param_name"    => "tz_title",
            "description"   => esc_html__("Input FontAwesome icon.  ", "aventura-plugin"),
        ),
        array(
            "type" => "textfield",
            "heading"       => esc_html__("Descriptions", "aventura-plugin"),
            "param_name"    => "tz_des",
            "description"   => esc_html__("Input Descriptions for Hotline.", "aventura-plugin"),
        ),
        array(
            "type" => "textfield",
            "heading"       => esc_html__("Phone", "aventura-plugin"),
            "param_name"    => "tz_phone",
            "description"   => esc_html__("Input Phone for Hotline.  ", "aventura-plugin"),
        ),
        array(
            "type" => "textfield",
            "heading"       => esc_html__("Email", "aventura-plugin"),
            "param_name"    => "tz_email",
            "description"   => esc_html__("Input Email for Hotline.   ", "aventura-plugin"),
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
));
endif;
?>