<?php

// admin_enqueue_scripts
function my_admin_enqueue_scripts() {
    
    wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/assets/css/admin-style.css', false, '1.0.0' );
    wp_enqueue_style( 'custom_wp_admin_css' );

     // Enqueue jQuery from Google CDN
     wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js', array(), null, true);
    // Enqueue your JavaScript file
    wp_enqueue_script('custom-admin-script', get_template_directory_uri() . '/assets/js/custom-admin-script.js', array('jquery'), '1.0', true);
    
}
add_action('admin_enqueue_scripts', 'my_admin_enqueue_scripts');

