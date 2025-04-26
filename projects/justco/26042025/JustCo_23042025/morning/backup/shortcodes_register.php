<?php

// the boring concept section shortcode
function boring_concept_func( $atts ) {
    $attributes = shortcode_atts( array(
        'limit' => 4
    ), $atts );

    ob_start();

    // include template with the arguments
    get_template_part( 'inc/theme/gsap/boring_concept', null, array('attributes' => $attributes) );

    return ob_get_clean();
}
add_shortcode( 'boring_concept', 'boring_concept_func' );


// the boring process section shortcode
function boring_process_func( $atts ) {
    $attributes = shortcode_atts( array(
        'limit' => 4
    ), $atts );

    ob_start();

    // include template with the arguments
    get_template_part( 'inc/theme/gsap/boring_process', null, array('attributes' => $attributes) );

    return ob_get_clean();
}
add_shortcode( 'boring_process', 'boring_process_func' );


// the boring addons section shortcode
function boring_addons_func( $atts ) {
    $attributes = shortcode_atts( array(
        'limit' => 4
    ), $atts );

    ob_start();

    // include template with the arguments
    get_template_part( 'inc/theme/gsap/boring_addons', null, array('attributes' => $attributes) );

    return ob_get_clean();
}
add_shortcode( 'boring_addons', 'boring_addons_func' );



// mcdonald house image slider shortcode:-
function macdonald_house_galery( $atts ) {
	
	ob_start();

	get_template_part( '/inc/tbo/shortcodes/macdonald_house_slider' );

	return ob_get_clean();

}
add_shortcode( 'macdonald_house', 'macdonald_house_galery' );