<?php
/**
 * Reusable blocks endpoint
 */

add_action( 'rest_api_init', function () {
  register_rest_route( 'hh/v1', '/reusable-blocks/(?P<id>\d+)', array(
    'methods' => 'GET',
    'callback' => function($request) {
      $block_id = $request['id'];
      return(get_post($block_id));
    },
    'args' => array(),
    'permission_callback' => ''
  ));
});
