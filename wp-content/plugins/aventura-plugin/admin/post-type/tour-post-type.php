<?php
  /*
  *	---------------------------------------------------------------------
  *	This file create and contains the Tour post_type meta elements
  *	---------------------------------------------------------------------
  */
  add_action('init', 'aventura_create_tour');
  function aventura_create_tour()
  {
    $aventura_labels = array(
      'name' => esc_html_x('Tours', 'post type general name', 'aventura-plugin'),
      'singular_name' => esc_html_x('Tour', 'post type singular name', 'aventura-plugin'),
      'add_new' => esc_html_x('New Tour', 'tour', 'aventura-plugin'),
      'add_new_item' => esc_html__('Add New Tour', 'aventura-plugin'),
      'edit_item' => esc_html__('Edit Tour', 'aventura-plugin'),
      'new_item' => esc_html__('New Tour', 'aventura-plugin'),
      'all_items' => esc_html__('All Tours', 'aventura-plugin'),
      'view_item' => esc_html__('View Tour', 'aventura-plugin'),
      'search_items' => esc_html__('Search Tour', 'aventura-plugin'),
      'not_found' => esc_html__('No Tour found', 'aventura-plugin'),
      'not_found_in_trash' => esc_html__('No Tour found in Trash', 'aventura-plugin'),
      'parent_item_colon' => '',
      'menu_name' => esc_html__("Tours", 'aventura-plugin')
    );
    $aventura_args = array(
        "labels" => $aventura_labels,
        "public" => true,
        'has_archive' => true,
        "show_ui" => true,
        "capability_type" => "post",
        "menu_position" => 5,
        'menu_icon' => 'dashicons-palmtree',
        "hierarchical" => false,
        "rewrite" => true,
        "supports" => array("title", "editor", "excerpt", "thumbnail", "page-attributes","comments")
    );
    register_post_type('tour', $aventura_args);
    register_taxonomy(
      "tour-category", array( "tour" ), array(
      "hierarchical"   => true,
      "label"          => esc_html__("Tour Categories","aventura-plugin"),
      "singular_label" => esc_html__("Tour Categories","aventura-plugin"),
      "rewrite"        => true ));

    register_taxonomy(
        "tour-language", array( "tour" ), array(
        "hierarchical"   => true,
        "label"          => esc_html__("Tour Language","aventura-plugin"),
        "singular_label" => esc_html__("Tour Language","aventura-plugin"),
        "rewrite"        => true ));

  }

  // filter for portfolio first page
  add_filter("manage_edit-tour_columns", "aventura_show_tour_column");
  function aventura_show_tour_column($aventura_columns)
  {
    $aventura_columns = array(
      "cb"                => "<input type=\"checkbox\" />",
      "title"             => esc_html__("Title","aventura-plugin"),
      "tour-category"     => esc_html__("Tour Categories","aventura-plugin"),
      "tour-language"     => esc_html__("Tour Language","aventura-plugin"),
      "date"              => esc_html__("date","aventura-plugin")
    );
    return $aventura_columns;
  }

  add_action("manage_posts_custom_column", "aventura_tour_custom_columns");
  function aventura_tour_custom_columns($aventura_column)
  {
    global $post;
    switch ($aventura_column) {
      case "tour-category":
        echo get_the_term_list($post->ID, 'tour-category', '', ', ', '');
        break;

      case "tour-language":
        echo get_the_term_list($post->ID, 'tour-language', '', ', ', '');
        break;
    }
  }