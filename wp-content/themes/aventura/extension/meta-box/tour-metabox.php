<?php
add_filter( 'rwmb_meta_boxes', 'aventura_tour_meta_boxes' );
function aventura_tour_meta_boxes( $aventura_tour_meta_boxes ) {
    $aventura_tour_meta_boxes[] = array(
        'id'         => 'aventura_tour_option',
        'title'      => esc_html__( 'Tour Info', 'aventura' ),
        'post_types' => 'tour',
        'autosave'   => true,
        'fields'     => array(
            array(
                'name'      => esc_html__( 'Tour Type', 'aventura' ),
                'id'        => "aventura_tour_type",
                'type'      => 'select',
                'options'   => array(
                    'daily'     => esc_html__('Daily Tour', 'aventura'),
                    'external'  => esc_html__('External Tour', 'aventura'),
                    'special'   => esc_html__('Special Tour', 'aventura'),
                ),
                'desc'      => '',
                'std'       => 'daily',
            ),

            array(
                'name'       => esc_html__( 'Departure Date', 'aventura' ),
                'id'         => "aventura_departure_date",
                'type'       => 'date',
                // jQuery date picker options. See here http://api.jqueryui.com/datepicker
                'js_options' => array(
                    'appendText'      => esc_html__( '(yyyy-mm-dd)', 'aventura' ),
                    'dateFormat'      => esc_html__( 'yy-mm-dd', 'aventura' ),
                    'changeMonth'     => true,
                    'changeYear'      => true,
                    'showButtonPanel' => true,
                ),
            ),

            array(
                'name'       => esc_html__( 'Start Date', 'aventura' ),
                'id'         => "aventura_tour_start_date",
                'type'       => 'date',
                // jQuery date picker options. See here http://api.jqueryui.com/datepicker
                'js_options' => array(
                    'appendText'      => esc_html__( '(yyyy-mm-dd)', 'aventura' ),
                    'dateFormat'      => esc_html__( 'yy-mm-dd', 'aventura' ),
                    'changeMonth'     => true,
                    'changeYear'      => true,
                    'showButtonPanel' => true,
                ),
            ),

            array(
                'name'       => esc_html__( 'End Date', 'aventura' ),
                'id'         => "aventura_tour_end_date",
                'type'       => 'date',
                // jQuery date picker options. See here http://api.jqueryui.com/datepicker
                'js_options' => array(
                    'appendText'      => esc_html__( '(yyyy-mm-dd)', 'aventura' ),
                    'dateFormat'      => esc_html__( 'yy-mm-dd', 'aventura' ),
                    'changeMonth'     => true,
                    'changeYear'      => true,
                    'showButtonPanel' => true,
                ),
            ),

            array(
                'name'  => esc_html__( 'Available Days', 'aventura' ),
                'id'      => "aventura_available_days",
                'desc'  => esc_html__( 'Please select available days in each week. Please leave a blank if all days are available in each week.', 'aventura' ),
                'type' => 'select',
                'multiple' => true,
                'options' => array(
                    '0' => esc_html__( 'Sunday', 'aventura' ),
                    '1' => esc_html__( 'Monday', 'aventura' ),
                    '2' => esc_html__( 'Tuesday', 'aventura' ),
                    '3' => esc_html__( 'Wednesday', 'aventura' ),
                    '4' => esc_html__( 'Thursday', 'aventura' ),
                    '5' => esc_html__( 'Friday', 'aventura' ),
                    '6' => esc_html__( 'Saturday', 'aventura' ),
                ),
            ),

            array(
                'name'       => esc_html('Departure Time'),
                'id'         => 'aventura_departure_time',
                'type'       => 'time',

                // Time options, see here http://trentrichardson.com/examples/timepicker/
                'js_options' => array(
                    'stepMinute'      => 1,
                    'controlType'     => 'select',
                    'showButtonPanel' => false,
                    'oneLine'         => false,
                ),

                // Display inline?
                'inline'     => false,
                'clone' => true
            ),


            array(
                'name' => esc_html__( 'Note', 'aventura' ),
                'desc' => '',
                'id'   => "aventura_tour_external_note",
                'type' => 'textarea',
                'cols' => 20,
                'rows' => 3,
                'std'   => esc_html__( 'Click button below to book this tour!', 'aventura' )
            ),
            array(
                'name'  => esc_html__( 'Button Text', 'aventura' ),
                'id'    => "aventura_tour_external_button",
                'type'  => 'text',
                'std'   => esc_html__( 'Book Now', 'aventura' )
            ),

            array(
                'name'  => esc_html__( 'Tour External Link', 'aventura' ),
                'id'    => "aventura_tour_external_link",
                'type'  => 'text',
                'std'   => esc_html__( '#', 'aventura' ),
            ),

            array(
                'name'  => esc_html__( 'Duration Label', 'aventura' ),
                'id'    => "aventura_tour_duration",
                'type'  => 'text',
                'std'   => esc_html__( '5 day', 'aventura' ),
                'desc'  => esc_html__('Displayed in front end. Eg: 3 days 2 nights.','aventura'),
            ),

            array(
                'name' => esc_html__( 'Duration Value', 'aventura' ),
                'id'   => "aventura_tour_duration_value",
                'type' => 'number',
                'min'  => 1,
                'step' => 1,
                'desc'  => esc_html__( 'Used to calculate duration in number and not displayed in front end.Unit: day', 'aventura' ),
            ),

            array(
                'type' => 'divider',
            ),

            array(
                'name'        => esc_html__( 'Destination', 'aventura' ),
                'id'          => "aventura_tour_destination",
                'type'        => 'post',
                'post_type'   => 'destination',
                'field_type'  => 'checkbox_list',
                'placeholder' => esc_html__( 'Select an Item', 'aventura' ),
                'query_args'  => array(
                    'post_status'    => 'publish',
                    'posts_per_page' => - 1,
                ),
            ),

            array(
                'name'        => esc_html__( 'Tour Guide', 'aventura' ),
                'id'          => "aventura_tour_guide",
                'type'        => 'post',
                'post_type'   => 'tour_guide',
                'field_type'  => 'select_advanced',
                'placeholder' => esc_html__( 'Select an Item', 'aventura' ),
                'query_args'  => array(
                    'post_status'    => 'publish',
                    'posts_per_page' => - 1,
                ),
            ),

            array(
                'type' => 'divider',
            ),

            array(
                'name' => esc_html__('Manage People?','aventura'),
                'id'   => 'aventura_tour_manager_people',
                'type' => 'checkbox',
                'std'  => 1, // 0 or 1
            ),

            array(
                'name' => esc_html__('Total People Of Tour','aventura'),
                'id'   => 'aventura_tour_total_people',
                'type' => 'number',

                'min'  => 0,
                'step' => 1,
            ),



            array(
                'type' => 'divider',
            ),

            array(
                'id'      => 'aventura_add_combo_tour',
                'name'    => 'Add Combo Tours',
                'type'    => 'fieldset_text',

                // Options: array of key => Label for text boxes
                // Note: key is used as key of array of values stored in the database
                'options' => array(
                    'name_combo'    => 'Name Combo',
                    'people_combo'  => 'Total People Of Combo',
                    'price_combo'   => 'Price Combo',
                ),

                'std' => '',
                // Is field cloneable?
                'clone' => true,
            ),

            array(
                'name'  => esc_html__( 'Adult Price', 'aventura' ),
                'id'    => "aventura_adult_price",
                'type'  => 'text',
                'desc'  => esc_html__('Price per adult','aventura'),
                'std'   => '',
            ),
            array(
                'name'  => esc_html__( 'Child Price', 'aventura' ),
                'id'    => "aventura_child_price",
                'type'  => 'text',
                'desc'  => esc_html__('Price per child','aventura'),
                'std'   => '',
            ),

            array(
                'name'       => esc_html__( 'Discount', 'aventura' ),
                'id'         => "aventura_tour_discount",
                'type'       => 'slider',
                // Text labels displayed before and after value
                'prefix'     => '',
                'suffix'     => esc_html__( ' %', 'aventura' ),
                // jQuery UI slider options. See here http://api.jqueryui.com/slider/
                'js_options' => array(
                    'min'  => 0,
                    'max'  => 100,
                    'step' => 1,
                ),
                // Default value
                'desc' => esc_html__('Discount of this tour, by percent','aventura'),
                'std' => 0,
            ),

            array(
                'type' => 'divider',
            ),

            array(
                'name'             => esc_html__( 'Gallery', 'aventura' ),
                'id'               => "aventura_tour_gallery",
                'type'             => 'image_advanced',
                // Delete image from Media Library when remove it from post meta?
                // Note: it might affect other posts if you use same image for multiple posts
                'force_delete'     => false,
                // Maximum image uploads
                'max_file_uploads' => '',
                // Display the "Uploaded 1/2 files" status
                'max_status'       => true,
            ),

            array(
                'type' => 'divider',
            ),

            array(
                'id'   => 'address',
                'name' => esc_html__( 'Address', 'aventura' ),
                'type' => 'text',
                'std'  => esc_html__( 'Hanoi, Vietnam', 'aventura' ),
            ),
            array(
                'id'            => 'map',
                'name'          => esc_html__( 'Location', 'aventura' ),
                'type'          => 'map',
                // Default location: 'latitude,longitude[,zoom]' (zoom is optional)
                'std'           => '-6.233406,-35.049906,8',
                // Name of text field where address is entered. Can be list of text fields, separated by commas (for ex. city, state)
                'address_field' => 'address',
                'api_key'       => 'AIzaSyBklgflt8gHq7eudx5CMKQRJsCWOHDGChw', // https://metabox.io/docs/define-fields/#section-map
            ),

            array(
                'name' => esc_html__( 'Introduce Location', 'aventura' ),
                'desc' => '',
                'id'   => "aventura_introduce_location",
                'type' => 'textarea',
                'cols' => 20,
                'rows' => 3,
            ),

            array(
                'type' => 'divider',
            ),

            array(
                'name'    => esc_html__( 'Itinerary', 'aventura' ),
                'id'      => "aventura_tour_itinerary",
                'type'    => 'wysiwyg',
            ),
        ),
    );
    return $aventura_tour_meta_boxes;
}