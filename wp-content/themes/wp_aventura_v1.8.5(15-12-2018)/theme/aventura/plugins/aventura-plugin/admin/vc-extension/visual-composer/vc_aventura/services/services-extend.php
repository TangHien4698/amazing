<?php
if(function_exists('vc_map')):
vc_map(array(
    "name"   => esc_html__("Services","aventura-plugin"),
    "icon"  => "icon-element",
    "weight" => 1,
    "base"  => "tz-services",
    "class" => "tzElement_extended",
    "description" => "Services for wedsite",
    "category" => esc_html__("Aventura", "aventura-plugin"),
    "params" => array(
        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Type Icon Services", "aventura-plugin"),
            "param_name"    => "tz_icon",
            "description"   => esc_html__("", "aventura-plugin"),
            "value"         => array(
                esc_html__("Image", "aventura-plugin")             => '1',
                esc_html__("Icon",  "aventura-plugin")             => '2'),
            "default"       => '1',
        ),
        array(
            "type" => "attach_image",
            "heading"       => esc_html__("Image Services", "aventura-plugin"),
            "param_name"    => "tz_image_services",
            "description"   => esc_html__("Upload Image Icon.  ", "aventura-plugin"),
            "dependency"    => array('element' => 'tz_icon', 'value' => '1'),
        ),
        array(
            "type" => "iconpicker",
            "heading"       => esc_html__("Icon Services", "aventura-plugin"),
            "param_name"    => "tz_icon_services",
            "std"           => 'fa fa-paper-plane',
            "dependency"    => array('element' => 'tz_icon', 'value' => '2'),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Tittle Services"),
            "param_name" => "tz_title_services",
            "description" => esc_html__("Input Tittle Services for Aventura", "aventura-plugin"),
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__("Description Services"),
            "param_name" => "tz_des_services",
            "description" => esc_html__("Input Description Services for Aventura", "aventura-plugin"),
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