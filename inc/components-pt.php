<?php
/**
 * Register Components post type
 *
 * @return void
 */

function headless_horseman_cpt_component()
{
  /**
   * Post Type: Components.
   */
  $labels = [
    "name" => __("Components", "headless-horseman"),
    "singular_name" => __("Component", "headless-horseman"),
    "menu_name" => __("Components", "headless-horseman"),
    "all_items" => __("All Components", "headless-horseman"),
    "add_new" => __("Add new", "headless-horseman"),
    "add_new_item" => __("Add new Component", "headless-horseman"),
    "edit_item" => __("Edit Component", "headless-horseman"),
    "new_item" => __("New Component", "headless-horseman"),
    "view_item" => __("View Component", "headless-horseman"),
    "view_items" => __("View Components", "headless-horseman"),
    "search_items" => __("Search Components", "headless-horseman"),
    "not_found" => __("No Components found", "headless-horseman"),
    "not_found_in_trash" => __("No Components found in trash", "headless-horseman"),
    "parent" => __("Parent Component:", "headless-horseman"),
    "featured_image" => __("Featured image for this Component", "headless-horseman"),
    "set_featured_image" => __("Set featured image for this Component", "headless-horseman"),
    "remove_featured_image" => __("Remove featured image for this Component", "headless-horseman"),
    "use_featured_image" => __("Use as featured image for this Component", "headless-horseman"),
    "archives" => __("Component archives", "headless-horseman"),
    "insert_into_item" => __("Insert into Component", "headless-horseman"),
    "uploaded_to_this_item" => __("Upload to this Component", "headless-horseman"),
    "filter_items_list" => __("Filter Components list", "headless-horseman"),
    "items_list_navigation" => __("Components list navigation", "headless-horseman"),
    "items_list" => __("Components list", "headless-horseman"),
    "attributes" => __("Components attributes", "headless-horseman"),
    "name_admin_bar" => __("Component", "headless-horseman"),
    "item_published" => __("Component published", "headless-horseman"),
    "item_published_privately" => __("Component published privately.", "headless-horseman"),
    "item_reverted_to_draft" => __("Component reverted to draft.", "headless-horseman"),
    "item_scheduled" => __("Component scheduled", "headless-horseman"),
    "item_updated" => __("Component updated.", "headless-horseman"),
    "parent_item_colon" => __("Parent Component:", "headless-horseman"),
  ];

  $args = [
    "label" => __("Components", "headless-horseman"),
    "labels" => $labels,
    "description" => "",
    "public" => false,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "components",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => ["slug" => "component", "with_front" => false],
    "query_var" => true,
    "supports" => ["title", "editor", "thumbnail"],
    "show_in_graphql" => false,
  ];

  register_post_type("component", $args);
}

add_action('init', 'headless_horseman_cpt_component');
