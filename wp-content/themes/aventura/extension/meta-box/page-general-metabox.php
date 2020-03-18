<?php
add_filter( 'rwmb_meta_boxes', 'aventura_page_general_meta_boxes' );
function aventura_page_general_meta_boxes( $aventura_page_general_meta_boxes ) {
    $aventura_page_general_meta_boxes[] = array(
        'id'         => 'aventura_page_general_options',
        'title'      => esc_html__( 'Page General Options', 'aventura' ),
        'post_types' => 'page',
        'autosave'   => true,
        'fields'     => array(
            array(
                'name'      => esc_html__( 'Row Option', 'aventura' ),
                'id'        => "aventura_page_general_row",
                'type'      => 'select',
                'options'   => array(
                    'container'  => esc_html__('Container','aventura'),
                    'no-container'  => esc_html__('No Container','aventura'),
                ),
                'std'       => 'container',
            ),
            array(
                'name'      => esc_html__( 'Padding Top(px)', 'aventura' ),
                'id'        => "aventura_page_general_padding_top",
                'type'      => 'text',
                'std'       => '',
                'desc'      => esc_html__('Default:90px','aventura'),
            ),
            array(
                'name'      => esc_html__( 'Padding Bottom(px)', 'aventura' ),
                'id'        => "aventura_page_general_padding_bottom",
                'type'      => 'text',
                'std'       => '',
                'desc'      => esc_html__('Default:90px','aventura'),
            ),
            array(
                'name' => esc_html__( 'Background Color', 'aventura' ),
                'id'   => "aventura_page_general_backgroud_color",
                'type' => 'color',
            ),
        ),
    );
    return $aventura_page_general_meta_boxes;
}