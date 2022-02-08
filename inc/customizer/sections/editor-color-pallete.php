<?php
/**
 * Functions that registers editor color pallet section
 * that contains a repeater field to allow admin
 * easily adjust default pallet.
 */

/**
 * Section arguments
 */
$section_args = [
  'title'       => esc_html__( 'Editor color pallete', 'headless-horseman' ),
  'description' => '',
  'panel'       => 'headless_horseman_demo_panel',
];

/**
 * Instantiate new section
 */
new \Kirki\Section( 'editor_color_pallete_section', $section_args );

/**
 * Instantiate control
 */
new \Kirki\Field\Repeater(
  [
    'settings'    => 'editor_color_pallete_repeater',
    'label'       => esc_html__( 'Editor color pallete', 'headless_horseman' ),
    'description' => esc_html__( 'Color pallete will be used inside gutenberg editor.', 'headless_horseman' ),
    'section'     => 'editor_color_pallete_section', // the section ID
    'row_label'    => [
      'type'  => 'field',
      'value' => esc_html__( 'Color name', 'headless_horseman' ),
      'field' => 'name',
    ],
    'default'     => [
      [
        'name'   => esc_html__( 'White', 'headless_horseman' ),
        'color'    => '#FFFFFF',
      ],
    ],
    'fields'      => [
      'name'   => [
        'type'        => 'text',
        'label'       => esc_html__( 'Color name', 'headless_horseman' ),
        'description' => esc_html__( 'This will be the label for your color', 'headless_horseman' ),
      ],
      'color'    => [
        'type'        => 'color',
        'label'       => esc_html__( 'Color code', 'headless_horseman' ),
      ],
    ],
  ]
);

/**
 * Add custom color palette go gutenberg editor
 */
if ( ! function_exists( 'headless_horseman_add_gutenberg_color_palette' ) ) :
  function headless_horseman_add_gutenberg_color_palette() {
    //Get color pallet from customizer options
    $color_pallete = get_theme_mod( 'editor_color_pallete_repeater');

    //Generate color slug
    $color_pallete = array_map(function($color_item) {
      $color_item['slug'] = sanitize_title($color_item['name']);
      return $color_item;
    }, $color_pallete);

    //Generate editor color pallete
    add_theme_support(
      'editor-color-palette',
      $color_pallete
    );
  }
endif;
add_action('after_setup_theme', 'headless_horseman_add_gutenberg_color_palette');
