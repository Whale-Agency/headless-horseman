<?php
/**
 * Customizer options endpoint
 */

add_action( 'rest_api_init', function () {
  register_rest_route( 'hh/v1', '/customizer', array(
    'methods' => 'GET',
    'callback' => function() {
      $mods = get_theme_mods();
      return($mods);
    },
    'args' => array(),
    'permission_callback' => ''
  ));
});
