<?php
add_filter( 'rwmb_meta_boxes', 'aventura_home_slide_metaboxs' );
function aventura_home_slide_metaboxs( $aventura_home_slide_metaboxs ) {
    $aventura_home_slide_metaboxs[] = array(
        'id'         => 'aventura_home_slide_option',
        'title'      => esc_html__( 'Home Slide Option', 'aventura' ),
        'post_types' => 'page',
        'autosave'   => true,
        'fields'     => array(
            array(
                'name'      => esc_html__( 'Logo Type', 'aventura' ),
                'id'        => "aventura_home_slide_logo_type",
                'type'      => 'select',
                'options'   => array(
                    'text'     => esc_html__('Logo Text', 'aventura'),
                    'image'    => esc_html__('Logo Image', 'aventura'),
                ),
                'desc'      => '',
                'std'       => 'image',
            ),

            array(
                'name'  => esc_html__( 'Logo Text', 'aventura' ),
                'id'    => "aventura_home_slide_logo_text",
                'type'  => 'text',
                'std'   => esc_html__( 'Aventura', 'aventura' ),
            ),

            array(
                'name'             => esc_html__( 'Image Upload', 'aventura' ),
                'id'               => "aventura_home_slide_logo_image",
                'type'             => 'image',
                // Delete image from Media Library when remove it from post meta?
                // Note: it might affect other posts if you use same image for multiple posts
                'force_delete'     => false,
                // Maximum image uploads
                'max_file_uploads' => 1,
            ),

            array(
                'type' => 'divider',
            ),

            array(
                'name'  => esc_html__( 'Revolution', 'aventura' ),
                'id'    => "aventura_home_slide_revolution",
                'type'  => 'text',
                'std'   => '',
                'desc'  => esc_html__('Insert the alias of slider revolution here.','aventura')
            ),

            array(
                'type' => 'divider',
            ),

            array(
                'name'      => esc_html__( 'Search Option', 'aventura' ),
                'id'        => "aventura_home_slide_search_option",
                'type'      => 'select',
                'options'   => array(
                    'show'     => esc_html__('Show', 'aventura'),
                    'hide'     => esc_html__('Hide', 'aventura'),
                ),
                'desc'      => '',
                'std'       => 'show',
            ),

            array(
                'name'      => esc_html__( 'Field Name Option', 'aventura' ),
                'id'        => "aventura_home_slide_search_field_name_option",
                'type'      => 'select',
                'options'   => array(
                    'show'     => esc_html__('Show', 'aventura'),
                    'hide'     => esc_html__('Hide', 'aventura'),
                ),
                'desc'      => '',
                'std'       => 'show',
            ),

            array(
                'name'  => esc_html__( 'Field Name Label', 'aventura' ),
                'id'    => "aventura_home_slide_search_field_name_label",
                'type'  => 'text',
                'std'   => esc_html__( 'Keywords', 'aventura' ),
            ),

            array(
                'name'      => esc_html__( 'Field Destination Option', 'aventura' ),
                'id'        => "aventura_home_slide_search_field_destination_option",
                'type'      => 'select',
                'options'   => array(
                    'show'     => esc_html__('Show', 'aventura'),
                    'hide'     => esc_html__('Hide', 'aventura'),
                ),
                'desc'      => '',
                'std'       => 'show',
            ),

            array(
                'name'  => esc_html__( 'Field Destination Label', 'aventura' ),
                'id'    => "aventura_home_slide_search_field_destination_label",
                'type'  => 'text',
                'std'   => esc_html__( 'Destination', 'aventura' ),
            ),

            array(
                'name'      => esc_html__( 'Field Date Option', 'aventura' ),
                'id'        => "aventura_home_slide_search_field_date_option",
                'type'      => 'select',
                'options'   => array(
                    'show'     => esc_html__('Show', 'aventura'),
                    'hide'     => esc_html__('Hide', 'aventura'),
                ),
                'desc'      => '',
                'std'       => 'show',
            ),

            array(
                'name'  => esc_html__( 'Field Date Label', 'aventura' ),
                'id'    => "aventura_home_slide_search_field_date_label",
                'type'  => 'text',
                'std'   => esc_html__( 'Date', 'aventura' ),
            ),

            array(
                'name'      => esc_html__( 'Field Duration Option', 'aventura' ),
                'id'        => "aventura_home_slide_search_field_duration_option",
                'type'      => 'select',
                'options'   => array(
                    'show'     => esc_html__('Show', 'aventura'),
                    'hide'     => esc_html__('Hide', 'aventura'),
                ),
                'desc'      => '',
                'std'       => 'show',
            ),

            array(
                'name'  => esc_html__( 'Field Duration Label', 'aventura' ),
                'id'    => "aventura_home_slide_search_field_duration_label",
                'type'  => 'text',
                'std'   => esc_html__( 'Duration', 'aventura' ),
            ),

            array(
                'name'      => esc_html__( 'Field Categoy Option', 'aventura' ),
                'id'        => "aventura_home_slide_search_field_category_option",
                'type'      => 'select',
                'options'   => array(
                    'show'     => esc_html__('Show', 'aventura'),
                    'hide'     => esc_html__('Hide', 'aventura'),
                ),
                'desc'      => '',
                'std'       => 'show',
            ),

            array(
                'name'  => esc_html__( 'Field Category Label', 'aventura' ),
                'id'    => "aventura_home_slide_search_field_category_label",
                'type'  => 'text',
                'std'   => esc_html__( 'Category', 'aventura' ),
            ),

            array(
                'name'      => esc_html__( 'Field Language Option', 'aventura' ),
                'id'        => "aventura_home_slide_search_field_language_option",
                'type'      => 'select',
                'options'   => array(
                    'show'     => esc_html__('Show', 'aventura'),
                    'hide'     => esc_html__('Hide', 'aventura'),
                ),
                'desc'      => '',
                'std'       => 'show',
            ),

            array(
                'name'  => esc_html__( 'Field Language Label', 'aventura' ),
                'id'    => "aventura_home_slide_search_field_language_label",
                'type'  => 'text',
                'std'   => esc_html__( 'Language', 'aventura' ),
            ),

            array(
                'name'  => esc_html__( 'Button Search', 'aventura' ),
                'id'    => "aventura_home_slide_search_button",
                'type'  => 'text',
                'std'   => esc_html__( 'Search', 'aventura' ),
            ),
        ),
    );
    return $aventura_home_slide_metaboxs;
}