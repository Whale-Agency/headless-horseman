<?php
/**
 * Miscellaneous functions
 */

/**
 * Add Reusable Blocks link to Wordpress main menu
 */
add_action( 'admin_menu', function() {
  add_menu_page( 'Reusable Blocks', 'Reusable Blocks', 'read', 'edit.php?post_type=wp_block', '', 'dashicons-editor-table', 22 );
});
