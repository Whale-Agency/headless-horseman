<?php
/**
 * Register default footer endpoint
 */

add_action( 'rest_api_init', function () {
  register_rest_route( 'hh/v1', '/footer', array(
    'methods' => 'GET',
    'callback' => function() {
      $default_footer_block = get_theme_mod('footer_block_select');
      return(get_post($default_footer_block));
    },
    'args' => array(),
    'permission_callback' => ''
  ));
});
