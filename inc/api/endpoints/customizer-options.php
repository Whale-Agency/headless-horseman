<?php
/**
 * Customizer options endpoint
 */

add_action( 'rest_api_init', function () {
  register_rest_route( 'hh/v1', '/customizer', array(
    'methods' => 'GET',
    'callback' => function() {
      $mods = get_theme_mods();

      //Add content to reusable blocks
      $mods = apply_filters('headless_horseman_reusable_blocks', $mods);

      //Apply color palette filter
      $mods = apply_filters('headless_horseman_color_palette', $mods);

      return($mods);
    },
    'args' => array(),
    'permission_callback' => ''
  ));
});
