<?php


// print js library for print page
wp_enqueue_script( 'print-js', get_template_directory_uri() . '/assets/js/printjs/jQuery.print.js', array(), _JN_VERSION, true );







// Create shortcode for publications
function publications_posts_with_filter_func( $atts ) {
    $attributes = shortcode_atts( array(
        'limit' => 4
    ), $atts );

    ob_start();

    // include template with the arguments
    get_template_part( 'inc/shortcodes/publications_posts_with_filter', null, array('attributes' => $attributes) );

    return ob_get_clean();
}
add_shortcode( 'publications_posts_with_filter', 'publications_posts_with_filter_func' );