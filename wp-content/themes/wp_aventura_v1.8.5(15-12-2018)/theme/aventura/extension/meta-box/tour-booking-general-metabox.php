<?php
add_filter( 'rwmb_meta_boxes', 'aventura_tour_booking_genneral_metabox' );
function aventura_tour_booking_genneral_metabox( $aventura_tour_booking_genneral_metabox ) {
    $aventura_tour_booking_genneral_metabox[] = array(
        'id'         => 'aventura_tour_booking_general_option',
        'title'      => esc_html__( 'Book & Contact Options', 'aventura' ),
        'post_types' => 'tour',
        'autosave'   => true,
        'fields'     => array(
            array(
                'name'      => esc_html__( 'Booking Head Option', 'aventura' ),
                'id'        => "aventura_tour_booking_head_option",
                'type'      => 'select',
                'options'   => array(
                    'default' => esc_html__('Default', 'aventura'),
                    'custom'  => esc_html__('Custom', 'aventura'),
                ),
                'desc'      => esc_html__('If you select Default, Booking Head will get options in Theme Options/Tour Setting/Tour Detail/Booking Head.','aventura'),
                'std'       => 'daily',
            ),

            array(
                'name'      => esc_html__( 'Booking Head Display', 'aventura' ),
                'id'        => "aventura_tour_booking_head_display",
                'type'      => 'select',
                'options'   => array(
                    'show'  => esc_html__('Show', 'aventura'),
                    'hide'  => esc_html__('Hide', 'aventura'),
                ),
                'desc'      => '',
                'std'       => 'daily',
            ),

            array(
                'name'      => esc_html__( 'Booking Form Option', 'aventura' ),
                'id'        => "aventura_tour_booking_form_option",
                'type'      => 'select',
                'options'   => array(
                    'default' => esc_html__('Default', 'aventura'),
                    'custom'  => esc_html__('Custom', 'aventura'),
                ),
                'desc'      => esc_html__('If you select Default, Booking Form will get options in Theme Options/Tour Setting/Tour Detail/Booking Form.','aventura'),
                'std'       => 'daily',
            ),

            array(
                'name'      => esc_html__( 'Booking Form Display', 'aventura' ),
                'id'        => "aventura_tour_booking_form_display",
                'type'      => 'select',
                'options'   => array(
                    'show'  => esc_html__('Show', 'aventura'),
                    'hide'  => esc_html__('Hide', 'aventura'),
                ),
                'desc'      => '',
                'std'       => 'daily',
            ),

            array(
                'name'      => esc_html__( 'Contact Option', 'aventura' ),
                'id'        => "aventura_tour_contact_option",
                'type'      => 'select',
                'options'   => array(
                    'default' => esc_html__('Default', 'aventura'),
                    'custom'  => esc_html__('Custom', 'aventura'),
                ),
                'desc'      => esc_html__('If you select Default, Booking Form will get options in Theme Options/Tour Setting/Contact/Display Option.','aventura'),
                'std'       => 'daily',
            ),

            array(
                'name'      => esc_html__( 'Contact Display', 'aventura' ),
                'id'        => "aventura_tour_contact_display",
                'type'      => 'select',
                'options'   => array(
                    'show'  => esc_html__('Show', 'aventura'),
                    'hide'  => esc_html__('Hide', 'aventura'),
                ),
                'desc'      => '',
                'std'       => 'daily',
            ),
        ),
    );
    return $aventura_tour_booking_genneral_metabox;
}