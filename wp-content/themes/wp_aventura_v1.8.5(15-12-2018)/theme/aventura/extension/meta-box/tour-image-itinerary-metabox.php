<?php
add_filter( 'rwmb_meta_boxes', 'aventura_tour_image_itinerary_meta_boxes' );
function aventura_tour_image_itinerary_meta_boxes( $aventura_meta_boxes ) {
    $aventura_meta_boxes[] = array(
        'id'         => 'aventura_tour_image_itinerary_metabox',
        'title'      => esc_html__( 'Itinerary Image', 'aventura' ),
        'post_types' => 'tour',
        'context'    => 'side',
        'priority'   => 'low',
        'autosave'   => true,
        'fields'     => array(

            // IMAGE ADVANCED - RECOMMENDED
            array(
                'name'             => esc_html__( 'Image Upload', 'aventura' ),
                'id'               => "aventura_tour_image_itinerary_option",
                'type'             => 'image_advanced',
                // Delete image from Media Library when remove it from post meta?
                // Note: it might affect other posts if you use same image for multiple posts
                'force_delete'     => false,
                // Maximum image uploads
                'max_file_uploads' => 1,
                // Display the "Uploaded 1/2 files" status
                'max_status'       => false,
            ),
        ),
    );
    return $aventura_meta_boxes;
}