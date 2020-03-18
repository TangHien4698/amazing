<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Pie Chart', 'aventura-plugin' ),
	'base' => 'vc_pie',
	'class' => '',
	'icon' => 'icon-wpb-vc_pie',
	'category' => esc_html__( 'Content', 'aventura-plugin' ),
	'description' => esc_html__( 'Animated pie chart', 'aventura-plugin' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Widget title', 'aventura-plugin' ),
			'param_name' => 'title',
			'description' => esc_html__( 'Enter text used as widget title (Note: located above content element).', 'aventura-plugin' ),
			'admin_label' => true,
		),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Widget Description', 'aventura-plugin' ),
            'param_name' => 'description',
            'description' => esc_html__( 'Enter text used as widget description.', 'aventura-plugin' ),
            'admin_label' => true,
        ),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Value', 'aventura-plugin' ),
			'param_name' => 'value',
			'description' => esc_html__( 'Enter value for graph (Note: choose range from 0 to 100).', 'aventura-plugin' ),
			'value' => '50',
			'admin_label' => true,
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Label value', 'aventura-plugin' ),
			'param_name' => 'label_value',
			'description' => esc_html__( 'Enter label for pie chart (Note: leaving empty will set value from "Value" field).', 'aventura-plugin' ),
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Units', 'aventura-plugin' ),
			'param_name' => 'units',
			'description' => esc_html__( 'Enter measurement units (Example: %, px, points, etc. Note: graph value and units will be appended to graph title).', 'aventura-plugin' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Color', 'aventura-plugin' ),
			'param_name' => 'color',
			'value' => getVcShared( 'colors-dashed' ) + array( esc_html__( 'Custom', 'aventura-plugin' ) => 'custom' ),
			'description' => esc_html__( 'Select pie chart color.', 'aventura-plugin' ),
			'admin_label' => true,
			'param_holder_class' => 'vc_colored-dropdown',
			'std' => 'grey',
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Custom color', 'aventura-plugin' ),
			'param_name' => 'custom_color',
			'description' => esc_html__( 'Select custom color.', 'aventura-plugin' ),
			'dependency' => array(
				'element' => 'color',
				'value' => array( 'custom' ),
			),
		),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Button Link', 'aventura-plugin' ),
            'param_name' => 'button',
            'description' => esc_html__( 'Enter link used as button.', 'aventura-plugin' ),
            'admin_label' => true,
        ),
		vc_map_add_css_animation(),
		array(
			'type' => 'el_id',
			'heading' => esc_html__( 'Element ID', 'aventura-plugin' ),
			'param_name' => 'el_id',
			'description' => sprintf( __( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'aventura-plugin' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Extra class name', 'aventura-plugin' ),
			'param_name' => 'el_class',
			'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'aventura-plugin' ),
		),
		array(
			'type' => 'css_editor',
			'heading' => esc_html__( 'CSS box', 'aventura-plugin' ),
			'param_name' => 'css',
			'group' => esc_html__( 'Design Options', 'aventura-plugin' ),
		),
	),
);
