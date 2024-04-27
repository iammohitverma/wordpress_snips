<?php
function fasd_customize_register($wp_customize){

    // Sections 
    $wp_customize->add_section('header_section', array(
        'title'    => __('Header Topbar', ' fasd'),
        'description' => '',
        'priority' => 120,
    ));   

    //  =============================
    //  Topbar links item text
    //  =============================
    $topbar_texts = array(
        'item_1_icon' => __('Item 1 Icon', 'fasd'), // Add the new field for Item 1 Icon
        'item_1_text' => __('Item 1 Text', 'fasd'),
        'item_1_link' => __('Item 1 Link', 'fasd'),
        'item_2_icon' => __('Item 2 Icon', 'fasd'), // Add the new field for Item 2 Icon
        'item_2_text' => __('Item 2 Text', 'fasd'),
        'item_2_link' => __('Item 2 Link', 'fasd'),
    );
    
    foreach ($topbar_texts as $key => $label) {
        $setting_key = 'topbar_text_' . strtolower($key);
        $control_type = (strpos($key, 'icon') !== false) ? 'image' : 'textarea'; // Set control type based on the key containing 'icon'
    
        // Add Setting
        $wp_customize->add_setting($setting_key, array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',
            'type'              => 'theme_mod',
        ));
    
        // Add Control
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, $setting_key, array(
            'label'    => $label,
            'section'  => 'header_section',
            'settings' => $setting_key,
            'type'     => $control_type, // Use the control type determined above
        )));
    }
  
}
add_action('customize_register', 'fasd_customize_register');

function my_theme_customize_register( $wp_customize ) {
    $wp_customize->add_section('footer_contact_form', array(
        'title'       => 'Footer Contact Form',
        'priority'    => 10,
    ));
    // Section bg color
    $wp_customize->add_setting( 'section_bg_color', array(
        'default' => '#ffffff',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'section_bg_color', array(
        'label' => __( 'Section Background Color', 'my_theme' ),
        'section' => 'footer_contact_form',
        'settings' => 'section_bg_color',
    ) ) );
    // adding top heading
    $wp_customize->add_setting( 'top_heading', array(
        'default'   => '',
        'transport' => 'postMessage', // Corrected parameter
    ) );
    $wp_customize->add_control( 'top_heading', array(
        'label'    => __( 'Top Heading', 'my_theme' ),
        'section'  => 'footer_contact_form',
        'settings' => 'top_heading',
        'type'     => 'text', // Adjust control type if needed
    ) );
     // Adding top Description
     $wp_customize->add_setting( 'top_description', array(
        'default'   => '',
        'transport' => 'postMessage', // Corrected parameter
    ) );
    $wp_customize->add_control( 'top_description', array(
        'label'    => __( 'Top Description', 'my_theme' ),
        'section'  => 'footer_contact_form',
        'settings' => 'top_description',
        'type'     => 'textarea', // Set control type to 'textarea'
    ) );

    //  contact form shortcode
     $wp_customize->add_setting( 'contact_form_shortcode', array(
        'default'   => '',
        'transport' => 'postMessage', // Corrected parameter
    ) );
    $wp_customize->add_control( 'contact_form_shortcode', array(
        'label'    => __( 'Contact Form Shortcode', 'my_theme' ),
        'section'  => 'footer_contact_form',
        'settings' => 'contact_form_shortcode',
        'type'     => 'text', // Set control type to 'textarea'
    ) );
    // adding bottom heading
    $wp_customize->add_setting( 'bottom_heading', array(
        'default'   => '',
        'transport' => 'postMessage', // Corrected parameter
    ) );
    $wp_customize->add_control( 'bottom_heading', array(
        'label'    => __( 'Bottom Heading', 'my_theme' ),
        'section'  => 'footer_contact_form',
        'settings' => 'bottom_heading',
        'type'     => 'text', // Adjust control type if needed
    ) );
     // Adding bottom Description
     $wp_customize->add_setting( 'bottom_description', array(
        'default'   => '',
        'transport' => 'postMessage', // Corrected parameter
    ) );
    $wp_customize->add_control( 'bottom_description', array(
        'label'    => __( 'Bottom Description', 'my_theme' ),
        'section'  => 'footer_contact_form',
        'settings' => 'bottom_description',
        'type'     => 'textarea', // Set control type to 'textarea'
    ) );
}
add_action( 'customize_register', 'my_theme_customize_register' );