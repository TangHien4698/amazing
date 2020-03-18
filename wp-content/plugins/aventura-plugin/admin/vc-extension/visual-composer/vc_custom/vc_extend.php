<?php
/*
* VC_ROW
* */
//vc_remove_param('vc_row', 'full_width');
vc_add_param('vc_row',array(
        "type" => "dropdown",
        "heading" => esc_html__('Row Type', 'aventura-plugin'),
        "param_name" => "tz_row_type",
        "weight" => '1',
        "value" => array(
            esc_html__("Full Width", 'aventura-plugin') => 'full_width',
            esc_html__("Container", 'aventura-plugin') => 'grid',
        )
    )
);

vc_add_param(
    'vc_row',array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Gradient', 'aventura-plugin' ),
        'description' => esc_html__( 'Select button display style.', 'aventura-plugin' ),
        'param_name' => 'tz_gradient',
        // partly compatible with btn2, need to be converted shape+style from btn2 and btn1
        'value' => array(
            esc_html__( 'None', 'aventura-plugin' )             => 'none',
            esc_html__( 'Gradient', 'aventura-plugin' )         => 'gradient',
            esc_html__( 'Gradient Custom', 'aventura-plugin' )  => 'gradient-custom',
        ),
    )
);
vc_add_param(
    'vc_row',array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Gradient Color 1', 'aventura-plugin' ),
        'param_name' => 'gradient_color_1',
        'description' => esc_html__( 'Select first color for gradient.', 'aventura-plugin' ),
        'param_holder_class' => 'vc_colored-dropdown vc_btn3-colored-dropdown',
        'value' => getVcShared( 'colors-dashed' ),
        'std' => 'turquoise',
        'dependency' => array(
            'element' => 'tz_gradient',
            'value' => array( 'gradient' ),
        ),
        'edit_field_class' => 'vc_col-sm-6',
    )
);
vc_add_param(
    'vc_row',array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Gradient Color 2', 'aventura-plugin' ),
        'param_name' => 'gradient_color_2',
        'description' => esc_html__( 'Select second color for gradient.', 'aventura-plugin' ),
        'param_holder_class' => 'vc_colored-dropdown vc_btn3-colored-dropdown',
        'value' => getVcShared( 'colors-dashed' ),
        'std' => 'blue',
        // must have default color grey
        'dependency' => array(
            'element' => 'tz_gradient',
            'value' => array( 'gradient' ),
        ),
        'edit_field_class' => 'vc_col-sm-6',
    )
);
vc_add_param(
    'vc_row',array(
        'type' => 'colorpicker',
        'heading' => esc_html__( 'Gradient Color 1', 'aventura-plugin' ),
        'param_name' => 'gradient_custom_color_1',
        'description' => esc_html__( 'Select first color for gradient.', 'aventura-plugin' ),
        'param_holder_class' => 'vc_colored-dropdown vc_btn3-colored-dropdown',
        'value' => '#dd3333',
        'dependency' => array(
            'element' => 'tz_gradient',
            'value' => array( 'gradient-custom' ),
        ),
        'edit_field_class' => 'vc_col-sm-4',
    )
);
vc_add_param(
    'vc_row',array(
        'type' => 'colorpicker',
        'heading' => esc_html__( 'Gradient Color 2', 'aventura-plugin' ),
        'param_name' => 'gradient_custom_color_2',
        'description' => esc_html__( 'Select second color for gradient.', 'aventura-plugin' ),
        'param_holder_class' => 'vc_colored-dropdown vc_btn3-colored-dropdown',
        'value' => '#eeee22',
        'dependency' => array(
            'element' => 'tz_gradient',
            'value' => array( 'gradient-custom' ),
        ),
        'edit_field_class' => 'vc_col-sm-4',
    )
);

vc_add_param('vc_pie',array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Widget Description', 'aventura-plugin' ),
        'param_name' => 'tz_description',
        "weight" => '3',
        'description' => esc_html__( 'Enter text used as widget description.', 'aventura-plugin' ),
        'admin_label' => true,
        )
);
vc_add_param('vc_pie',array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Button Link', 'aventura-plugin' ),
        'param_name' => 'tz_button',
        "weight" => '4',
        'description' => esc_html__( 'Enter link used as button.', 'aventura-plugin' ),
        'admin_label' => true,
        )
);


class WPBakeryShortCode_Banner_Slider extends WPBakeryShortCodesContainer {}
vc_map( array(
    "name" => "Banner Slider",
    "base" => "banner_slider",
    "weight" => 1,
    "as_parent" => array('only' => 'banner_slider_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "category" => 'Aventura',
    "icon" => "icon-element",
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "attach_image",
            "heading"       => esc_html__("Background Image", "aventura-plugin"),
            "param_name"    => "tz_bg_banner",
            "description"   => esc_html__("Upload Background Image Of Banner.  ", "aventura-plugin"),
        ),
        array(
            "type"          => "checkbox",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Auto Play", "aventura-plugin"),
            "param_name"    => "auto_play",
            "description"   => esc_html__("", "aventura-plugin"),
            "value"         => array(
                esc_html__("Yes", "aventura-plugin")        => 'true',
            ),
        ),
        array(
            'type'          =>  'textfield',
            'holder'        =>  '',
            'heading'       =>  esc_html__('Auto Play Timeout','aventura-plugin'),
            'param_name'    =>  'timeout',
            'value'         =>  '3000',
        ),
        array(
            "type"          => "checkbox",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Loop", "aventura-plugin"),
            "param_name"    => "loop",
            "description"   => esc_html__("", "aventura-plugin"),
            "value"         => array(
                esc_html__("Yes", "aventura-plugin")        => 'true',
            ),
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
    ),
    "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_Banner_Slider_Item  extends WPBakeryShortCode {}
$posts = get_posts( array(
    'posts_per_page' => -1,
    'post_type' => 'tour'
));
$result = array();
foreach ( $posts as $post )	{
    $result[] = array(
        'value' => $post->ID,
        'label' => $post->post_title,
    );
}
vc_map( array(
    "name" => "Banner Slider Item",
    "base" => "banner_slider_item",
    "icon" => "icon-element",
    "category" => 'Aventura',
    "allowed_container_element" => 'vc_row',
    "as_child" => array('only' => 'banner_slider'), // Use only|except attributes to limit parent (separate multiple values with comma)
    "params" => array(
        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Type Option", "aventura-plugin"),
            "param_name"    => "tz_type",
            "description"   => esc_html__("", "aventura-plugin"),
            "value"         => array(
                esc_html__("Select Type", "aventura-plugin")        => '',
                esc_html__("Post Tour", "aventura-plugin")             => '1',
                esc_html__("Custom Post", "aventura-plugin")             => '2'),
        ),
        array(
            'type'          => 'autocomplete',
            'heading'       => esc_html__( 'Include Post Tour Name', 'aventura-plugin' ),
            'param_name'    => 'tz_tour_post',
            'admin_label'   =>  true,
            'description'   => esc_html__( 'Add Post by title.', 'aventura-plugin' ),
            'settings'      => array(
                'multiple'  => false,
                'sortable'  => true,
                'groups'    => true,
                'values'    => $result
            ),
            "dependency"    => array('element' => 'tz_type', 'value' => '1'),
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading"      => esc_html__("Title", "aventura-plugin"),
            "param_name"   => "tz_title",
            "description"  => "Input title for item slider",
            "value" => "",
            "dependency"    => array('element' => 'tz_type', 'value' => '2'),
        ),

        array(
            "type"       => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading"    => esc_html__("country", "aventura-plugin"),
            "param_name" => "tz_country",
            "value" => "",
            "dependency"    => array('element' => 'tz_type', 'value' => '2'),
        ),

        array(
            "type"          => "textfield",
            "class"         => "",
            "heading"       => esc_html__("Description", "aventura-plugin"),
            "param_name"    => "tz_description",
            "value"         => "",
            "dependency"    => array('element' => 'tz_type', 'value' => '2'),
        ),
        array(
            "type"          => "textfield",
            "class"         => "",
            "heading"       => esc_html__("Price", "aventura-plugin"),
            "param_name"    => "tz_price",
            "value"         => "",
            "dependency"    => array('element' => 'tz_type', 'value' => '2'),
        ),
        array(
            "type"          => "textfield",
            "class"         => "",
            "heading"       => esc_html__("Button Label", "aventura-plugin"),
            "param_name"    => "tz_button",
            "value"         => "",
            "dependency"    => array('element' => 'tz_type', 'value' => array('1','2')),
        ),
        array(
            "type"          => "textfield",
            "class"         => "",
            "heading"       => esc_html__("Link Button", "aventura-plugin"),
            "param_name"    => "tz_link",
            "value"         => "",
            "dependency"    => array('element' => 'tz_type', 'value' => array('1','2')),
        ),

    )
) );
class WPBakeryShortCode_Customer extends WPBakeryShortCodesContainer {}
vc_map( array(
    "name" => "Customer",
    "base" => "customer",
    "weight" => 1,
    "as_parent" => array('only' => 'customer_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "category" => 'Aventura',
    "icon" => "icon-element",
    "show_settings_on_create" => true,
    "params" => array(
        array(
            'type'          =>  'dropdown',
            'holder'        =>  '',
            'admin_label'   =>  false,
            'heading'       =>  esc_html__('Desktop Items','aventura-plugin'),
            'description'   =>  esc_html__('Number of items display on the desktop','aventura-plugin'),
            'param_name'    =>  'desktop_columns',
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
            'heading'       =>  esc_html__('Desktop Small Items','aventura-plugin'),
            'description'   =>  esc_html__('Number of items display on the desktop small','aventura-plugin'),
            'param_name'    =>  'desktop_small_columns',
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
            'heading'       =>  esc_html__('Tablet Items','aventura-plugin'),
            'description'   =>  esc_html__('Number of items display on the tablet','aventura-plugin'),
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
            "param_name" => "tz_margin",
            "value" => "",
            "description"   => esc_html__("Ex: 30", "aventura-plugin"),
        ),
        array(
            "type"          => "checkbox",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Auto Play", "aventura-plugin"),
            "param_name"    => "auto_play",
            "description"   => esc_html__("", "aventura-plugin"),
            "value"         => array(
                esc_html__("Yes", "aventura-plugin")        => 'true',
            ),
        ),
        array(
            'type'          =>  'textfield',
            'holder'        =>  '',
            'heading'       =>  esc_html__('Auto Play Timeout','aventura-plugin'),
            'param_name'    =>  'timeout',
            'value'         =>  '3000',
        ),
        array(
            "type"          => "checkbox",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Loop", "aventura-plugin"),
            "param_name"    => "loop",
            "description"   => esc_html__("", "aventura-plugin"),
            "value"         => array(
                esc_html__("Yes", "aventura-plugin")        => 'true',
            ),
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
    ),
    "js_view" => 'VcColumnView'
) );
class WPBakeryShortCode_Customer_Item  extends WPBakeryShortCode {}
vc_map( array(
    "name" => "Customer Item",
    "base" => "customer_item",
    "icon" => "icon-element",
    "category" => 'Aventura',
    "allowed_container_element" => 'vc_row',
    "as_child" => array('only' => 'customer'), // Use only|except attributes to limit parent (separate multiple values with comma)
    "params" => array(
        array(
            "type" => "attach_image",
            "heading"       => esc_html__("Image Customer", "aventura-plugin"),
            "param_name"    => "tz_bg",
            "description"   => esc_html__("Upload Image Customer.  ", "aventura-plugin"),
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading"      => esc_html__("Rating", "aventura-plugin"),
            "param_name"   => "tz_rating",
            "description"  => "Input rating for customer(Min=1, Max=5)",
            "value" => "",
        ),
        array(
            "type"          => "textfield",
            "class"         => "",
            "heading"       => esc_html__("Description", "aventura-plugin"),
            "param_name"    => "tz_description",
            "value"         => "",
        ),
        array(
            "type"          => "textfield",
            "class"         => "",
            "heading"       => esc_html__("Name", "aventura-plugin"),
            "param_name"    => "tz_name",
            "value"         => "",
        ),
        array(
            "type"          => "textfield",
            "class"         => "",
            "heading"       => esc_html__("Company", "aventura-plugin"),
            "param_name"    => "tz_company",
            "value"         => "",
        ),

    )
) );
?>