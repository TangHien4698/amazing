<?php
if(function_exists('vc_map')):
vc_map( array(
    "name" => esc_html__("Our Team", "aventura-plugin"),
    "weight" => 14,
    "base" => "tz-our-team",
    "icon" => "icon-element",
    "description" => "",
    "class" => "tzElement_extended",
    "category" => esc_html__("Aventura", "aventura-plugin"),
    "params" => array(
        array(
            "type" => "attach_image",
            "heading"       => esc_html__("Background Image Member", "aventura-plugin"),
            "param_name"    => "tz_bg",
            "description"   => esc_html__("Upload Background Image.  ", "aventura-plugin"),
        ),
        array(
            "type"       => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading"    => esc_html__("Name", "aventura-plugin"),
            "param_name" => "tz_name",
            "value" => "",
        ),
        array(
            "type"       => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading"    => esc_html__("Position", "aventura-plugin"),
            "param_name" => "tz_position",
            "value" => "",
        ),
        array(
            "type"       => "textarea",
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
            "heading"    => esc_html__("Link Member", "aventura-plugin"),
            "param_name" => "tz_link",
            "value" => "",
        ),
        array(
            "type"       => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading"    => esc_html__("Link Facebook", "aventura-plugin"),
            "param_name" => "tz_fb",
            "value" => "",
        ),
        array(
            "type"       => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading"    => esc_html__("Link Twitter", "aventura-plugin"),
            "param_name" => "tz_twitter",
            "value" => "",
        ),
        array(
            "type"       => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading"    => esc_html__("Link Dribbble", "aventura-plugin"),
            "param_name" => "tz_dribbble",
            "value" => "",
        ),
        array(
            "type"       => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading"    => esc_html__("Link Google+", "aventura-plugin"),
            "param_name" => "tz_google",
            "value" => "",
        ),
        array(
            "type"       => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading"    => esc_html__("Link Instagram", "aventura-plugin"),
            "param_name" => "tz_instagram",
            "value" => "",
        ),
        array(
            "type"       => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading"    => esc_html__("Link Vimeo", "aventura-plugin"),
            "param_name" => "tz_vimeo",
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