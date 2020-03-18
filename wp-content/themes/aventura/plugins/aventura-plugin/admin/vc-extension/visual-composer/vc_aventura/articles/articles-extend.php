<?php
$tz_categories_array = array('select category');
$tz_categories = get_categories();
foreach($tz_categories as $tz_category){
    $tz_categories_array[] = $tz_category->name;
}
if(function_exists('vc_map')):
vc_map( array(
    "name" => esc_html__("Articles", "aventura-plugin"),
    "weight" => 12,
    "base" => "tz-articles",
    "icon" => "icon-element",
    "description" => "",
    "class" => "tzElement_extended",
    "category" => esc_html__("Aventura", "aventura-plugin"),
    "params" => array(
        array(
            "type"       => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading"    => esc_html__("Title", "aventura-plugin"),
            "param_name" => "tz_title",
            "value" => "",
        ),
        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Category", "aventura-plugin"),
            "param_name"    => "tz_category",
            "value"         => $tz_categories_array,
            "description"   => esc_html__("Choose category.", "aventura-plugin"),
        ),
        array(
            "type"       => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading"    => esc_html__("Image Size", "aventura-plugin"),
            "param_name" => "tz_size",
            "description"   => esc_html__("Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use \"large\" size.", "aventura-plugin"),
            "value" => "",
        ),
        array(
            "type"       => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading"    => esc_html__("Post Per Page", "aventura-plugin"),
            "param_name" => "tz_perpage",
            "value" => "",
        ),
        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Order by", "aventura-plugin"),
            "param_name"    => "tz_orderby",
            "value"         => array(
                esc_html__("choose order by", "aventura-plugin")        => '',
                esc_html__("Date", "aventura-plugin")                   => 'date',
                esc_html__("ID", "aventura-plugin")                     => "id",
                esc_html__("Title", "aventura-plugin")                  => "title"),
            "description"   => esc_html__("", "aventura-plugin"),
        ),
        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Order", "aventura-plugin"),
            "param_name"    => "tz_order",
            "value"         => array(
                esc_html__("choose order", "aventura-plugin")       => 'Z --> A',
                esc_html__("desc", "aventura-plugin")               => 'Z --> A',
                esc_html__("asc", "aventura-plugin")                => "A --> Z"),
            "description"   => esc_html__("", "aventura-plugin"),
        ),
        array(
            "type"       => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading"    => esc_html__("Posts Label", "aventura-plugin"),
            "param_name" => "tz_label",
            "value" => "",
        ),
        array(
            "type"       => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading"    => esc_html__("Posts Link", "aventura-plugin"),
            "param_name" => "tz_link",
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