<?php
/*
*	---------------------------------------------------------------------
*	This file create and contains the Destination post_type meta elements
*	---------------------------------------------------------------------
*/
add_action('init', 'aventura_create_branchs');
function aventura_create_branchs()
{
    $aventura_labels = array(
        'name' => esc_html_x('Branches', 'post type general name', 'aventura-plugin'),
        'singular_name' => esc_html_x('Branches', 'post type singular name', 'aventura-plugin'),
        'add_new' => esc_html_x('New Branch', 'branchs', 'aventura-plugin'),
        'add_new_item' => esc_html__('Add New Branch', 'aventura-plugin'),
        'edit_item' => esc_html__('Edit Branch', 'aventura-plugin'),
        'new_item' => esc_html__('New Branch', 'aventura-plugin'),
        'all_items' => esc_html__('All Branch', 'aventura-plugin'),
        'view_item' => esc_html__('View Branch', 'aventura-plugin'),
        'search_items' => esc_html__('Search Branch', 'aventura-plugin'),
        'not_found' =>  esc_html__('No Branch found', 'aventura-plugin'),
        'not_found_in_trash' => esc_html__('No Branch found in Trash', 'aventura-plugin'),
        'parent_item_colon' => '',
        'menu_name' => esc_html__("Branches", 'aventura-plugin')
    );
    $aventura_args = array(
        "labels" => $aventura_labels,
        "public" => true,
        'has_archive' => true,
        "show_ui" => true,
        "capability_type" => "post",
        "menu_position" => 5,
        'menu_icon' => 'dashicons-share',
        "hierarchical" => false,
        "rewrite" => true,
        "supports" => array("title", "editor", "excerpt", "thumbnail","comments")
    );
    register_post_type('branchs', $aventura_args);
    register_taxonomy(
        "branchs-category", array( "branchs" ), array(
        "hierarchical"   => true,
        "label"          => esc_html__("Branch Categories","aventura-plugin"),
        "singular_label" => esc_html__("Branch Categories","aventura-plugin"),
        "rewrite"        => true ));
    register_taxonomy_for_object_type('branchs-category', 'branchs');
}

// filter for destination first page
add_filter("manage_edit-branchs_columns", "aventura_show_branchs_column");
function aventura_show_branchs_column($aventura_columns)
{
    $aventura_columns = array(
        "cb"                => "<input type=\"checkbox\" />",
        "title"             => esc_html__("Title","aventura-plugin"),
        "branchs-category"  => esc_html__("Branch Categories","aventura-plugin"),
        "date"              => esc_html__("Date","aventura-plugin"),
    );
    return $aventura_columns;
}

add_action("manage_posts_custom_column", "aventura_branchs_custom_columns");
function aventura_branchs_custom_columns($aventura_column)
{
    global $post;
    switch ($aventura_column) {
        case "branchs-category":
            echo get_the_term_list($post->ID, 'branchs-category', '', ', ', '');
            break;
    }
}


