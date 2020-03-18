<?php
$tztour_cat = array();
$cat_tour = get_categories(array('taxonomy'=>'tour-category'));

foreach ($cat_tour as $cat){
    $tztour_cat[$cat->name] = $cat->term_id;
}

$tz_posts = get_posts( array(
    'posts_per_page' => -1,
    'post_type' => 'tour'
));
$tz_result = array();
foreach ( $tz_posts as $post )	{
    $tz_result[] = array(
        'value' => $post->ID,
        'label' => $post->post_title,
    );
}
if(function_exists('vc_map')):
vc_map( array(
    "name" => esc_html__("Tour Kind", "aventura-plugin"),
    "weight" => 14,
    "base" => "tz-tour-kind",
    "icon" => "icon-element",
    "description" => "",
    "class" => "tzElement_extended",
    "category" => esc_html__("Aventura", "aventura-plugin"),
    "params" => array(
        array(
            "type" => "attach_image",
            "heading"       => esc_html__("Background Tour", "aventura-plugin"),
            "param_name"    => "tz_bg",
            "description"   => esc_html__("Upload Background Image.  ", "aventura-plugin"),
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
            "type"       => "textarea",
            "class" => "",
            "admin_label" => true,
            "heading"    => esc_html__("Descriptions", "aventura-plugin"),
            "param_name" => "tz_des",
            "value" => "",
        ),
        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Type Tour", "aventura-plugin"),
            "param_name"    => "tz_type_tour",
            "value"         => array(
                esc_html__("Choose Type Tour", "aventura-plugin")  => '',
                esc_html__("Category", "aventura-plugin")                   => "category",
                esc_html__("Tour Name", "aventura-plugin")                   => "post",),
            "description"   => esc_html__("", "aventura-plugin"),
        ),

        array(
            "type" => "checkbox",
            "class" => "",
            "admin_label" => true,
            "heading" =>  esc_html__("Tour Categories", "aventura-plugin"),
            "param_name" => "tz_tour_category",
            "value" => $tztour_cat,
            "description" => esc_html__("Select category tour.", "aventura-plugin"),
            "dependency"    => array('element' => 'tz_type_tour', 'value' => 'category')
        ),
        array(
            'type'          => 'autocomplete',
            'heading'       => esc_html__( 'Input Tour Name', 'aventura-plugin' ),
            'param_name'    => 'tz_tour_post',
            'admin_label'   =>  true,
            'description'   => esc_html__( 'Add Post by title.', 'aventura-plugin' ),
            'settings'      => array(
                'multiple'  => true,
                'sortable'  => true,
                'groups'    => true,
                'values'    => $tz_result
            ),
            "dependency"    => array('element' => 'tz_type_tour', 'value' => 'post'),
        ),
        array(
            "type"       => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading"    => esc_html__("Post Per Page", "aventura-plugin"),
            "param_name" => "tz_page",
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