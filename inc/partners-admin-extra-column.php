<?php
/**
 * Add extra column to Partners Post Tepy
 */

add_filter( 'manage_partner-logos_posts_columns', 'partners_set_custom_columns' );
function partners_set_custom_columns($columns) {
    $columns['logo_collection'] = __( 'Logo Collection');
    return $columns;
}

add_action( 'manage_partner-logos_posts_custom_column' , 'partners_custom_column', 10, 2 );
function partners_custom_column( $column, $post_id ) {
    if ($column == 'logo_collection') {
        $terms = get_the_terms( $post_id, 'logo_collection');
        foreach ( $terms as $term ) {
            echo $term->name;
        }
    }
}
