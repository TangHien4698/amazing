<?php
  /*
  *	---------------------------------------------------------------------
  *	This file create and contains the Destination post_type meta elements
  *	---------------------------------------------------------------------
  */
  add_action('init', 'aventura_create_destination');
  function aventura_create_destination()
  {
    $aventura_labels = array(
      'name' => esc_html_x('Destinations', 'post type general name', 'aventura-plugin'),
      'singular_name' => esc_html_x('Destination', 'post type singular name', 'aventura-plugin'),
      'add_new' => esc_html_x('New Destination', 'destination', 'aventura-plugin'),
      'add_new_item' => esc_html__('Add New Destination', 'aventura-plugin'),
      'edit_item' => esc_html__('Edit Destination', 'aventura-plugin'),
      'new_item' => esc_html__('New Destination', 'aventura-plugin'),
      'all_items' => esc_html__('All Destination', 'aventura-plugin'),
      'view_item' => esc_html__('View Destination', 'aventura-plugin'),
      'search_items' => esc_html__('Search Destination', 'aventura-plugin'),
      'not_found' =>  esc_html__('No Destination found', 'aventura-plugin'),
      'not_found_in_trash' => esc_html__('No Destination found in Trash', 'aventura-plugin'),
      'parent_item_colon' => '',
      'menu_name' => esc_html__("Destinations", 'aventura-plugin')
    );
    $aventura_args = array(
        "labels" => $aventura_labels,
        "public" => true,
        "show_ui" => true,
        "capability_type" => "post",
        "menu_position" => 5,
        'menu_icon' => 'dashicons-location',
        "hierarchical" => false,
        "rewrite" => true,
        "supports" => array("title", "editor", "excerpt", "thumbnail","comments")
    );
    register_post_type('destination', $aventura_args);
  }

  // filter for destination first page
  add_filter("manage_edit-destination_columns", "aventura_show_destination_column");
  function aventura_show_destination_column($aventura_columns)
  {
    $aventura_columns = array(
      "cb"                => "<input type=\"checkbox\" />",
      "title"             => esc_html__("Title","aventura-plugin"),
      "date"              => esc_html__("Date","aventura-plugin"),
    );
    return $aventura_columns;
  }

