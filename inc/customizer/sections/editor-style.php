<?php
/**
 * Functions that registers editor color palette section
 * that contains a repeater field to allow admin
 * easily adjust default pallet.
 */

/**
 * Section arguments
 */
$section_args = [
  'title'       => esc_html__( 'Editor style', 'headless-horseman' ),
  'description' => '',
  'panel'       => 'headless_horseman_panel',
];
/**
 * Instantiate new section
 */
new \Kirki\Section( 'editor_style_section', $section_args );

/**
 * Instantiate control
 */
$field_description = __('<h3>Available CSS variables:</h3>');
$color_palette_variables = get_theme_mod( 'editor_color_palette_repeater');
foreach ($color_palette_variables as $color) {
  $field_description .= '--'.sanitize_title($color['name']).'<br>';
}
$field_description .= __('<h3>Entry point selector:</h3> <i>:root</i>');

new \Kirki\Field\Code(
  [
    'settings'    => 'editor_style_setting',
    'label'       => esc_html__( 'Editor CSS', 'headless-horseman' ),
    'description' => __( $field_description, 'headless-horseman' ),
    'section'     => 'editor_style_section',
    'default'     => '',
    'choices'     => [
      'language' => 'css',
    ],
  ]
);

/**
 * Make editor height bigger
 * @return void
 */
function headless_horseman_style_editor_height() {
  wp_enqueue_style('headless_horseman-admin-customizer-style', get_template_directory_uri() . '/inc/customizer/assets/css/style.css');
}
add_action('admin_enqueue_scripts', 'headless_horseman_style_editor_height');

/**
 * Editor custom color variables.
 * @return void
 */
if ( ! function_exists( 'headless_horseman_editor_custom_color_variables' ) ) :
  function headless_horseman_editor_custom_color_variables() {
    add_theme_support( 'editor-styles' );

    $color_palette = get_theme_mod( 'editor_color_palette_repeater');
    $editor_styles = get_theme_mod( 'editor_style_setting');

    $css = ':root {';
    foreach ($color_palette as $color) {
      $css .= '--'.sanitize_title($color['name']).': ' . $color['color'] . ';';
    }
    $css .= '}';

    $css .= $editor_styles;

    //Write css to file
    //$existing_css = file_get_contents(get_template_directory() . '/assets/css/style-editor.css');
    $fp = fopen(get_template_directory() . '/assets/css/style-editor.css', 'w');
    fwrite($fp, $css);
    fclose($fp);

    add_editor_style( './assets/css/style-editor.css' );
  }
endif;
add_action( 'after_setup_theme', 'headless_horseman_editor_custom_color_variables');
