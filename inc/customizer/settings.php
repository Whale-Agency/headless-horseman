<?php

/**
 * Add a panel.
 *
 * @link https://kirki.org/docs/getting-started/panels.html
 */
new \Kirki\Panel(
  'headless_horseman_demo_panel',
  [
    'priority'    => 10,
    'title'       => esc_html__( 'Headless Horseman settings', 'headless-horseman' ),
    'description' => esc_html__( 'Contains sections for all Headless Horseman controls.', 'headless-horseman' ),
  ]
);

/**
 * Add Sections.
 */
require get_template_directory() . '/inc/customizer/sections/editor-color-pallete.php';
