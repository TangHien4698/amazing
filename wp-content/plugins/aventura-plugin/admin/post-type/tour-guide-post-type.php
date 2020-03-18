<?php
  /*
  *	---------------------------------------------------------------------
  *	This file create and contains the Tour Guide post_type meta elements
  *	---------------------------------------------------------------------
  */
  add_action('init', 'aventura_create_tour_guide');
  function aventura_create_tour_guide()
  {
    $aventura_labels = array(
      'name' => esc_html_x('Tour Guides', 'post type general name', 'aventura-plugin'),
      'singular_name' => esc_html_x('Tour Guide', 'post type singular name', 'aventura-plugin'),
      'add_new' => esc_html_x('New Tour Guide', 'tour_guide', 'aventura-plugin'),
      'add_new_item' => esc_html__('Add New Tour Guide', 'aventura-plugin'),
      'edit_item' => esc_html__('Edit Tour Guide', 'aventura-plugin'),
      'new_item' => esc_html__('New Tour Guide', 'aventura-plugin'),
      'all_items' => esc_html__('All Tours Guide', 'aventura-plugin'),
      'view_item' => esc_html__('View Tour Guide', 'aventura-plugin'),
      'search_items' => esc_html__('Search Tour Guide', 'aventura-plugin'),
      'not_found' => esc_html__('No Tour Guide found', 'aventura-plugin'),
      'not_found_in_trash' => esc_html__('No Tour Guide found in Trash', 'aventura-plugin'),
      'parent_item_colon' => '',
      'menu_name' => esc_html__("Tour Guides", 'aventura-plugin')
    );
    $aventura_args = array(
        "labels" => $aventura_labels,
        "public" => true,
        "show_ui" => true,
        "capability_type" => "post",
        "menu_position" => 5,
        'menu_icon' => 'dashicons-businessman',
        "hierarchical" => false,
        "rewrite" => true,
        "supports" => array("title", "editor", "excerpt", "thumbnail")
    );
    register_post_type('tour_guide', $aventura_args);

  }

  // filter for portfolio first page
  add_filter("manage_edit-tour_guide_columns", "aventura_show_tour_guide_column");
  function aventura_show_tour_guide_column($aventura_columns)
  {
    $aventura_columns = array(
      "cb"                => "<input type=\"checkbox\" />",
      "title"             => esc_html__("Title","aventura-plugin"),
      "date"              => esc_html__("Date","aventura-plugin"),
    );

    return $aventura_columns;
  }


