<?php
add_filter( 'rwmb_meta_boxes', 'aventura_branchs_meta_boxes' );
function aventura_branchs_meta_boxes( $aventura_branchs_meta_boxes ) {
    $aventura_branchs_meta_boxes[] = array(
        'id'         => 'aventura_branchs_option',
        'title'      => esc_html__( 'Branchs Setting', 'aventura' ),
        'post_types' => 'branchs',
        'autosave'   => true,
        'fields'     => array(
            array(
                'id'   => 'aventura_branchs_address',
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
                'address_field' => 'aventura_branchs_address',
                'api_key'       => 'AIzaSyBklgflt8gHq7eudx5CMKQRJsCWOHDGChw', // https://metabox.io/docs/define-fields/#section-map
            ),
            array(
                'name'      => esc_html__( 'Phone', 'aventura' ),
                'id'        => "aventura_branchs_phone",
                'type'      => 'text',
                'std'       => '888-456-8888',
            ),
            array(
                'name'      => esc_html__( 'Email', 'aventura' ),
                'id'        => "aventura_branchs_email",
                'type'      => 'text',
                'std'       => 'michigantour@gmail.com',
            ),

            array(
                'name'    => esc_html__( 'Message', 'aventura' ),
                'id'      => "aventura_branchs_message",
                'type'    => 'wysiwyg',
                'clone'      => true,
                // Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
                'raw'     => false,
                'std'     => esc_html__( 'WYSIWYG default value', 'aventura' ),
                // Editor settings, see wp_editor() function: look4wp.com/wp_editor
                'options' => array(
                    'textarea_rows' => 4,
                    'teeny'         => true,
                    'media_buttons' => false,
                ),
            ),
        ),
    );
    return $aventura_branchs_meta_boxes;
}