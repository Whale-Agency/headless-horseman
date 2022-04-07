<?php

/**
 * Add a panel.
 *
 * @link https://kirki.org/docs/getting-started/panels.html
 */
new \Kirki\Panel(
  'headless_horseman_panel',
  [
    'priority'    => 10,
    'title'       => esc_html__( 'Headless Horseman', 'headless-horseman' ),
    'description' => esc_html__( 'Contains sections for all Headless Horseman controls.', 'headless-horseman' ),
  ]
);

/**
 * Add editor color palette.
 */
require get_template_directory() . '/inc/customizer/sections/editor-color-palette.php';

/**
 * Add editor style.
 */
require get_template_directory() . '/inc/customizer/sections/editor-style.php';

/**
 * Add default footer area.
 */
require get_template_directory() . '/inc/customizer/sections/footer-area.php';

/**
 * Add reusable blocks area
 */
require get_template_directory() . '/inc/customizer/sections/reusable-blocks.php';