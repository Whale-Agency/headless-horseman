<?php

/**
 * Function filter reusable blocks and generate a new array
 * that has the content of the block item.
 * @param $mods
 * @return mixed
 */
function headless_horseman_reusable_blocks_callback( $mods ) {
  $new_array = [];

  foreach ($mods['hh_reusable_blocks'] as $mod) {
    //get post object
    $data = get_post($mod['id']);

    $new_array[str_replace( '-', '_', sanitize_title($mod['name']))] = [
      'name' => $mod['name'],
      'id' => $mod['id'],
      'content' => $data->post_content
    ];
  }

  $mods['hh_reusable_blocks'] = $new_array;

  return $mods;
}
add_filter( 'headless_horseman_reusable_blocks', 'headless_horseman_reusable_blocks_callback' );


/**
 * Function filter color palette and generate a new array
 * with slug key instead of numeric one.
 * @param $mods
 * @return mixed
 */
function headless_horseman_color_palette_callback( $mods ) {
  $new_array = [];

  foreach ($mods['hh_color_palette'] as $mod) {
    $new_array[str_replace( '-', '_', sanitize_title($mod['name']))] = [
      'name' => $mod['name'],
      'color' => $mod['color']
    ];
  }

  $mods['hh_color_palette'] = $new_array;

  return $mods;
}
add_filter( 'headless_horseman_color_palette', 'headless_horseman_color_palette_callback' );
