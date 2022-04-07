<?php
/**
 * Functions that registers reusable block section
 * that contains a repeater field to allow admin
 * to bring reusable blocks to frontend.
 */

/**
 * Section arguments
 */
$section_args = [
  'title'       => esc_html__( 'Reusable blocks', 'headless-horseman' ),
  'description' => '',
  'panel'       => 'headless_horseman_panel',
];
/**
 * Instantiate new section
 */
new \Kirki\Section( 'reusable_blocks_section', $section_args );

/**
 * Instantiate control
 */
new \Kirki\Field\Repeater(
  [
    'settings'    => 'hh_reusable_blocks',
    'label'       => esc_html__( 'Reusable blocks', 'headless_horseman' ),
    'description' => esc_html__( 'Select blocks that you want to bring to the frontend.', 'headless_horseman' ),
    'section'     => 'reusable_blocks_section', // the section ID
    'row_label'    => [
      'type'  => 'field',
      'value' => esc_html__( 'Block name', 'headless_horseman' ),
      'field' => 'name',
    ],
    'fields'      => [
      'name'   => [
        'type'        => 'text',
        'label'       => esc_html__( 'Block name', 'headless_horseman' ),
        'description' => esc_html__( 'The name will be serialized to be a key to the block', 'headless_horseman' ),
      ],
      'id'    => [
        'type'        => 'select',
        'choices' 	  => headless_horseman_get_reusable_blocks_list(),
        'label'       => esc_html__( 'Block ID', 'headless_horseman' ),
      ],
    ],
  ]
);

/**
 * Get the list of reusable block to use as options for the select field
 * @return array
 */
function headless_horseman_get_reusable_blocks_list() {
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
  $select_options = [
    '' => 'Select a block',
  ];
  foreach ($reusable_blocks as $reusable_block) {
    $select_options[$reusable_block->ID] = $reusable_block->post_title;
  }

  return $select_options;
}
