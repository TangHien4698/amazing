<?php
add_filter( 'rwmb_meta_boxes', 'aventura_newsletter_page_meta_boxes' );
function aventura_newsletter_page_meta_boxes( $aventura_newsletter_page_meta_boxes ) {
    $aventura_newsletter_page_meta_boxes[] = array(
        'id'         => 'aventura_newsletter_page_options',
        'title'      => esc_html__( 'Newsletter Page Options', 'aventura' ),
        'post_types' => 'page',
        'autosave'   => true,
        'fields'     => array(
            array(
                'name'      => esc_html__( 'Newsletter Option', 'aventura' ),
                'id'        => "aventura_newsletter_page_option",
                'type'      => 'select',
                'desc'      => esc_html__('If you select Default, Newsletter will get options in Theme Options','aventura'),
                'options'   => array(
                    'default'  => esc_html__('Default','aventura'),
                    'custom'  => esc_html__('Custom','aventura'),
                ),
                'std'       => 'default',
            ),

            array(
                'name'      => esc_html__( 'Newsletter Type', 'aventura' ),
                'id'        => "aventura_newsletter_page_type",
                'type'      => 'select',
                'desc'      => '',
                'options'   => array(
                    '0'  => esc_html__('Newsletter Type 1','aventura'),
                    '1'  => esc_html__('Newsletter Type 2','aventura'),
                    '2'  => esc_html__('Hide Newsletter','aventura'),
                ),
                'std'       => '0',
            ),

            array(
                'name'  => esc_html__( 'Title', 'aventura' ),
                'id'    => "aventura_newsletter_page_title",
                'type'  => 'text',
                'std'   => esc_html__( 'Submit your newsletter', 'aventura' ),
                'desc'  => '',
            ),

            array(
                'name'  => esc_html__( 'Subtitle', 'aventura' ),
                'id'    => "aventura_newsletter_page_subtitle",
                'type'  => 'text',
                'std'   => esc_html__( 'Register now! We will send you best offers for your trip.', 'aventura' ),
                'desc'  => '',
            ),

            // IMAGE ADVANCED - RECOMMENDED
            array(
                'name'             => esc_html__( 'Background Image', 'aventura' ),
                'id'               => "aventura_newsletter_page_bgimage",
                'type'             => 'image_advanced',
                // Delete image from Media Library when remove it from post meta?
                // Note: it might affect other posts if you use same image for multiple posts
                'force_delete'     => false,
                // Maximum image uploads
                'max_file_uploads' => 1,
                // Display the "Uploaded 1/2 files" status
                'max_status'       => false,
            ),

            array(
                'name' => esc_html__( 'Background Color', 'aventura' ),
                'id'   => "aventura_newsletter_page_bgcolo",
                'type' => 'color',
            )
        ),
    );
    return $aventura_newsletter_page_meta_boxes;
}