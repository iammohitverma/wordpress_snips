<?php

// latest_blogs_shortcode_func
function latest_blogs_shortcode_func( $atts ) {
    $attributes = shortcode_atts( array(
        'heading' => 'The Latest Posts'
    ), $atts );

    ob_start();

    // include template with the arguments
    get_template_part( 'inc/src/latest_blogs', null, array('attributes' => $attributes) );

    return ob_get_clean();
}
add_shortcode( 'latest_blogs', 'latest_blogs_shortcode_func' );