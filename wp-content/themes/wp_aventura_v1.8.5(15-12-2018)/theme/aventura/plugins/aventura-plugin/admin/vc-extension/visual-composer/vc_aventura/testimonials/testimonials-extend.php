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
    "name" => esc_html__("Testimonials", "aventura-plugin"),
    "weight" => 14,
    "base" => "tz-testimonials",
    "icon" => "icon-element",
    "description" => "",
    "class" => "tzElement_extended",
    "category" => esc_html__("Aventura", "aventura-plugin"),
    "params" => array(
        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Type Testimonials", "aventura-plugin"),
            "param_name"    => "tz_type_testimonials",
            "value"         => array(
                esc_html__("Choose Type Testimonials", "aventura-plugin")  => '',
                esc_html__("Category", "aventura-plugin")                   => "category",
                esc_html__("Post Name", "aventura-plugin")                   => "post",),
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
            "dependency"    => array('element' => 'tz_type_testimonials', 'value' => 'category')
        ),
        array(
            'type'          => 'autocomplete',
            'heading'       => __( 'Input Tour Name', 'aventura-plugin' ),
            'param_name'    => 'tz_tour_post',
            'admin_label'   =>  true,
            'description'   => __( 'Add Post by title.', 'aventura-plugin' ),
            'settings'      => array(
                'multiple'  => true,
                'sortable'  => true,
                'groups'    => true,
                'values'    => $tz_result
            ),
            "dependency"    => array('element' => 'tz_type_testimonials', 'value' => 'post'),
        ),
        array(
            "type"       => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading"    => esc_html__("Height Item", "aventura-plugin"),
            "param_name" => "tz_height",
            "value" => "",
            "description"   => esc_html__("Default Height: 590px", "aventura-plugin"),
            "dependency"    => array('element' => 'tz_type_testimonials', 'value' => array('post','category')),
            "default"       => '590px'
        ),
        array(
            'type'          =>  'dropdown',
            'holder'        =>  '',
            'admin_label'   =>  false,
            'heading'       =>  esc_html__('Desktop Items','aventura-plugin'),
            'description'   =>  esc_html__('Number of items display on the desktop','aventura-plugin'),
            'group'         =>  esc_html__( 'Slide Options', 'aventura-plugin' ),
            'param_name'    =>  'desktop_columns',
            'std'           =>  '4',
            'value'         =>  array(
                esc_html__('1','aventura-plugin')   => '1',
                esc_html__('2','aventura-plugin')   => '2',
                esc_html__('3','aventura-plugin')   => '3',
                esc_html__('4','aventura-plugin')   => '4',
                esc_html__('5','aventura-plugin')   => '5',
                esc_html__('6','aventura-plugin')   => '6',
                esc_html__('7','aventura-plugin')   => '7',
                esc_html__('8','aventura-plugin')   => '8',
                esc_html__('9','aventura-plugin')   => '9',
                esc_html__('10','aventura-plugin')   => '10',
            ),
        ),
        array(
            'type'          =>  'dropdown',
            'holder'        =>  '',
            'admin_label'   =>  false,
            'heading'       =>  esc_html__('Desktop Small Items','aventura-plugin'),
            'description'   =>  esc_html__('Number of items display on the desktop small','aventura-plugin'),
            'group'         =>  esc_html__( 'Slide Options', 'aventura-plugin' ),
            'param_name'    =>  'desktop_small_columns',
            'std'           =>  '4',
            'value'         =>  array(
                esc_html__('1','aventura-plugin')   => '1',
                esc_html__('2','aventura-plugin')   => '2',
                esc_html__('3','aventura-plugin')   => '3',
                esc_html__('4','aventura-plugin')   => '4',
                esc_html__('5','aventura-plugin')   => '5',
                esc_html__('6','aventura-plugin')   => '6',
                esc_html__('7','aventura-plugin')   => '7',
                esc_html__('8','aventura-plugin')   => '8',
                esc_html__('9','aventura-plugin')   => '9',
                esc_html__('10','aventura-plugin')   => '10',
            ),
        ),
        array(
            'type'          =>  'dropdown',
            'holder'        =>  '',
            'admin_label'   =>  false,
            'heading'       =>  esc_html__('Tablet Items','aventura-plugin'),
            'description'   =>  esc_html__('Number of items display on the tablet','aventura-plugin'),
            'group'         =>  esc_html__( 'Slide Options', 'aventura-plugin' ),
            'param_name'    =>  'tablet_columns',
            'std'           =>  '2',
            'value'         =>  array(
                esc_html__('1','aventura-plugin')   => '1',
                esc_html__('2','aventura-plugin')   => '2',
                esc_html__('3','aventura-plugin')   => '3',
                esc_html__('4','aventura-plugin')   => '4',
                esc_html__('5','aventura-plugin')   => '5',
                esc_html__('6','aventura-plugin')   => '6',
                esc_html__('7','aventura-plugin')   => '7',
                esc_html__('8','aventura-plugin')   => '8',
                esc_html__('9','aventura-plugin')   => '9',
                esc_html__('10','aventura-plugin')   => '10',
            ),
        ),
        array(
            'type'          =>  'dropdown',
            'holder'        =>  '',
            'admin_label'   =>  false,
            'heading'       =>  esc_html__('Tablet Portait Items','aventura-plugin'),
            'description'   =>  esc_html__('Number of items display on the tablet portait','aventura-plugin'),
            'group'         =>  esc_html__( 'Slide Options', 'aventura-plugin' ),
            'param_name'    =>  'tablet_portait_columns',
            'std'           =>  '2',
            'value'         =>  array(
                esc_html__('1','aventura-plugin')   => '1',
                esc_html__('2','aventura-plugin')   => '2',
                esc_html__('3','aventura-plugin')   => '3',
                esc_html__('4','aventura-plugin')   => '4',
                esc_html__('5','aventura-plugin')   => '5',
                esc_html__('6','aventura-plugin')   => '6',
                esc_html__('7','aventura-plugin')   => '7',
                esc_html__('8','aventura-plugin')   => '8',
                esc_html__('9','aventura-plugin')   => '9',
                esc_html__('10','aventura-plugin')   => '10',
            ),
        ),
        array(
            'type'          =>  'dropdown',
            'holder'        =>  '',
            'admin_label'   =>  false,
            'heading'       =>  esc_html__('Mobile Items','aventura-plugin'),
            'description'   =>  esc_html__('Number of items display on the mobile','aventura-plugin'),
            'group'         =>  esc_html__( 'Slide Options', 'aventura-plugin' ),
            'param_name'    =>  'mobile_columns',
            'std'           =>  '1',
            'value'         =>  array(
                esc_html__('1','aventura-plugin')   => '1',
                esc_html__('2','aventura-plugin')   => '2',
                esc_html__('3','aventura-plugin')   => '3',
                esc_html__('4','aventura-plugin')   => '4',
                esc_html__('5','aventura-plugin')   => '5',
                esc_html__('6','aventura-plugin')   => '6',
                esc_html__('7','aventura-plugin')   => '7',
                esc_html__('8','aventura-plugin')   => '8',
                esc_html__('9','aventura-plugin')   => '9',
                esc_html__('10','aventura-plugin')   => '10',
            ),
        ),
        array(
            "type"       => "textfield",
            "class" => "",
            "admin_label" => false,
            "heading"    => esc_html__("Margin Item", "aventura-plugin"),
            'group'         =>  esc_html__( 'Slide Options', 'aventura-plugin' ),
            "param_name" => "tz_margin",
            "value" => "",
            "description"   => esc_html__("Ex: 30", "aventura-plugin"),
        ),
        array(
            'type'          =>  'checkbox',
            'holder'        =>  '',
            'heading'       =>  esc_html__('Auto Play','aventura-plugin'),
            'group'         =>  esc_html__( 'Slide Options', 'aventura-plugin' ),
            'admin_label'   =>  false,
            'param_name'    =>  'auto_play',
            'std'           =>  'true',
            'value'         =>  array(
                esc_html__('Yes','aventura-plugin')       =>  'true',
            ),
        ),
        array(
            'type'          =>  'textfield',
            'holder'        =>  '',
            'heading'       =>  esc_html__('Auto Play Timeout','aventura-plugin'),
            'group'         =>  esc_html__( 'Slide Options', 'aventura-plugin' ),
            'admin_label'   =>  false,
            'param_name'    =>  'timeout',
            'value'         =>  '3000',
        ),
        array(
            'type'          =>  'checkbox',
            'holder'        =>  '',
            'heading'       =>  esc_html__('Loop','aventura-plugin'),
            'group'         =>  esc_html__( 'Slide Options', 'aventura-plugin' ),
            'admin_label'   =>  false,
            'param_name'    =>  'loop',
            'std'           =>  'true',
            'value'         =>  array(
                esc_html__('Yes','aventura-plugin')       =>  'true',
            ),
        ),
        array(
            "type"       => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading"    => esc_html__("Limit Items", "aventura-plugin"),
            "param_name" => "tz_limit",
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