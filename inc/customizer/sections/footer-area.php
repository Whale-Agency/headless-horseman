<?php
/**
 * Default footer block
 */

/**
 * Section arguments
 */
$section_args = [
  'title'       => esc_html__( 'Footer', 'headless-horseman' ),
  'description' => '',
  'panel'       => 'headless_horseman_panel',
];

/**
 * Instantiate new section
 */
new \Kirki\Section( 'footer_section', $section_args );

/**
 * Function that creates a control containing the available sidebars as choices.
 *
 * @return void
 */
function headless_horseman_footer_select() {
  //query args
  $args = array(
    'post_type'              => array('wp_block'),
    'post_status'            => array('publish'),
    'posts_per_page'         => -1,
  );

  //query the footer block
  $query = new WP_Query($args);
  $reusable_blocks = $query->get_posts();

  //prepare options
  $select_options = [];
  foreach ($reusable_blocks as $reusable_block) {
    $select_options[$reusable_block->ID] = $reusable_block->post_title;
  }
  if ( ! class_exists( 'Kirki' ) ) {
    return;
  }

  new \Kirki\Field\Select(
    [
      'settings'    => 'footer_block',
      'label'       => esc_html__( 'Footer selection', 'headless-horseman' ),
      'description' => esc_html__( 'Pick any reusable block to use it as a default footer.', 'headless-horseman' ),
      'section'     => 'footer_area_section',
      'default'     => 'primary',
      'choices'     => $select_options,
      'priority'    => 30,
    ]
  );
}
add_action( 'init', 'headless_horseman_footer_select', 999 );
