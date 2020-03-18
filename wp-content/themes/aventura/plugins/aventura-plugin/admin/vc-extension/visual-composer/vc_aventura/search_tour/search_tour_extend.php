<?php
if(function_exists('vc_map')):
vc_map( array(
    "name" => esc_html__("Search Tour", "aventura-plugin"),
    "weight" => 1,
    "base" => "tz-search-tour",
    "icon" => "icon-element",
    "description" => "",
    "class" => "tzElement_extended",
    "category" => esc_html__("Aventura", "aventura-plugin"),
    "params" => array(

        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Field Name Option", "js_composer"),
            "param_name"    => "tz_name_option",
            "value"         => array(
                esc_html__("Show", "js_composer") => 'show',
                esc_html__("Hide", "js_composer") => "hide"),
            "description"   => '',
        ),

        array(
            "type" => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading"    => esc_html__("Field Name Label", "aventura-plugin"),
            "param_name" => "tz_name_label",
            "dependency" => array('element' => 'tz_name_option', 'value' => array('show')),
        ),

        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Field Destination Option", "js_composer"),
            "param_name"    => "tz_destination_option",
            "value"         => array(
                esc_html__("Show", "js_composer") => 'show',
                esc_html__("Hide", "js_composer") => "hide"),
            "description"   => '',
        ),

        array(
            "type" => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading"    => esc_html__("Field Destination Label", "aventura-plugin"),
            "param_name" => "tz_destination_label",
            "dependency" => array('element' => 'tz_destination_option', 'value' => array('show')),
        ),

        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Field Date Option", "js_composer"),
            "param_name"    => "tz_date_option",
            "value"         => array(
                esc_html__("Show", "js_composer") => 'show',
                esc_html__("Hide", "js_composer") => "hide"),
            "description"   => '',
        ),

        array(
            "type" => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading"    => esc_html__("Field Date Label", "aventura-plugin"),
            "param_name" => "tz_date_label",
            "dependency" => array('element' => 'tz_date_option', 'value' => array('show')),
        ),

        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Field Duration Option", "js_composer"),
            "param_name"    => "tz_duration_option",
            "value"         => array(
                esc_html__("Show", "js_composer") => 'show',
                esc_html__("Hide", "js_composer") => "hide"),
            "description"   => '',
        ),

        array(
            "type" => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading"    => esc_html__("Field Duration Label", "aventura-plugin"),
            "param_name" => "tz_duration_label",
            "dependency" => array('element' => 'tz_duration_option', 'value' => array('show')),
        ),

        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Field Category Option", "js_composer"),
            "param_name"    => "tz_category_option",
            "value"         => array(
                esc_html__("Hide", "js_composer") => "hide",
                esc_html__("Show", "js_composer") => 'show'),
            "description"   => '',
        ),

        array(
            "type" => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading"    => esc_html__("Field Category Label", "aventura-plugin"),
            "param_name" => "tz_category_label",
            "dependency" => array('element' => 'tz_category_option', 'value' => array('show')),
        ),

        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Field Language Option", "js_composer"),
            "param_name"    => "tz_language_option",
            "value"         => array(
                esc_html__("Hide", "js_composer") => "hide",
                esc_html__("Show", "js_composer") => 'show'),
            "description"   => '',
        ),

        array(
            "type" => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading"    => esc_html__("Field Language Label", "aventura-plugin"),
            "param_name" => "tz_language_label",
            "dependency" => array('element' => 'tz_language_option', 'value' => array('show')),
        ),

        array(
            "type"       => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading"    => esc_html__("Button Text", "aventura-plugin"),
            "param_name" => "tz_button",
        ),
    )
) );
endif;
?>