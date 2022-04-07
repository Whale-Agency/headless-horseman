<?php
/**
 * Blocks api
 */

add_action('enqueue_block_editor_assets', function() {
  wp_enqueue_script('headless-horseman-block-filters', get_template_directory_uri() . '/inc/blocks/build/index.js', ['wp-edit-post']);
});
