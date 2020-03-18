<?php
if(function_exists('vc_map')):
vc_map( array(
    "name" => esc_html__("Counter", "aventura-plugin"),
    "weight" => 14,
    "base" => "tz-counter",
    "icon" => "icon-element",
    "description" => "",
    "class" => "tzElement_extended",
    "category" => esc_html__("Aventura", "aventura-plugin"),
    "params" => array(
        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Type Icon Counter", "aventura-plugin"),
            "param_name"    => "tz_icon",
            "description"   => esc_html__("", "aventura-plugin"),
            "value"         => array(
                esc_html__("Image", "aventura-plugin")             => '1',
                esc_html__("Icon",  "aventura-plugin")             => '2'),
            "default"       => '1',
        ),
        array(
            "type" => "attach_image",
            "heading"       => esc_html__("Image Counter", "aventura-plugin"),
            "param_name"    => "tz_image_counter",
            "description"   => esc_html__("Upload Image Icon.  ", "aventura-plugin"),
            "dependency"    => array('element' => 'tz_icon', 'value' => '1'),
        ),
        array(
            "type" => "textfield",
            "heading"       => esc_html__("Icon Counter", "aventura-plugin"),
            "param_name"    => "tz_icon_counter",
            "description"   => esc_html__("Input FontAwesome icon.  ", "aventura-plugin"),
            "dependency"    => array('element' => 'tz_icon', 'value' => '2'),
        ),
        array(
            "type" => "colorpicker",
            "class" => "",
            "admin_label" => true,
            "heading" => esc_html__('Color Of Icon', 'aventura-plugin'),
            "param_name" => "color_icon",
            "description" => esc_html__("You can set a color.", "aventura-plugin"),
            "dependency"    => array('element' => 'tz_icon', 'value' => '2'),
        ),
        array(
            "type"       => "textfield",
            "class"         => "",
            "admin_label" => true,
            "heading"    => esc_html__("Count", "aventura-plugin"),
            "param_name" => "count",
            "value" => "",
        ),
        array(
            "type" => "colorpicker",
            "class" => "",
            "admin_label" => true,
            "heading" => esc_html__('Color Of Count', 'aventura-plugin'),
            "param_name" => "color_count",
            "description" => esc_html__("You can set a color.", "aventura-plugin"),
            "value" => "",
        ),
        array(
            "type"       => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading"    => esc_html__("Title", "aventura-plugin"),
            "param_name" => "title",
            "value" => "",
        ),
        array(
            "type" => "colorpicker",
            "class" => "",
            "admin_label" => true,
            "heading" => esc_html__('Color Of Title', 'aventura-plugin'),
            "param_name" => "color_title",
            "description" => esc_html__("You can set a color.", "aventura-plugin"),
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