<?php

if (!function_exists('theme_customize_register')) :
    function theme_customize_register($wp_customize)
    {
        /*------ Customizer Section ------*/
        $wp_customize->add_section('footer_section', array(
            'title'    => 'Footer',
            'description' => 'Footer Customizer',
            'priority' => 120,
        ));

        /*------ Footer Logo ------*/
        $wp_customize->add_setting('footer_logo', array(
            'default'           => get_bloginfo('template_url') . '/images/logo.png',
            'capability'        => 'edit_theme_options',
            'type'           => 'option',

        ));

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'image_upload_test', array(
            'label'    => 'Footer Logo',
            'section'  => 'footer_section',
            'settings' => 'footer_logo',
        )));

        /*------ Footer Heading ------*/
        $wp_customize->add_setting('footer_heading', array(
            'default'        => "#",
        ));

        $wp_customize->add_control('footer_heading', array(
            'label'   => 'Footer Heading',
            'section' => 'footer_section',
            'type'    => 'text',
        ));

        /*------ Footer Description ------*/
        $wp_customize->add_setting('footer_desc', array(
            'default'        => '#',
        ));

        $wp_customize->add_control('footer_desc', array(
            'label'   => 'Footer Discription',
            'section' => 'footer_section',
            'type'    => 'textarea',
        ));

        /*------ Footer Icon ------*/
        $wp_customize->add_setting('footer_icon', array(
            'default'        => '',
        ));

        $wp_customize->add_control('footer_icon', array(
            'label'   => 'Social Icon',
            'section' => 'footer_section',
            'type'    => 'select',
            'choices' => array(
                'Facebook' => __('Facebook'),
                'Twitter' => __('Twitter'),
                'Instagram' => __('Instagram'),
                'Dribbble' => __('Dribbble'),
                'Pinterest' => __('Pinterest'),
                'Youtube' => __('Youtube'),
                'Linkedin' => __('Linkedin'),
            ),
        ));
    }
    add_action('customize_register', 'theme_customize_register');
endif;

/**
 * https://developer.wordpress.org/reference/hooks/customize_register/
 */



function admin_login_logo_customize_register( $wp_customize ) {
    $wp_customize->add_setting( 'admin_login_logo' ); // Add setting for logo uploader
         
    // Add control for logo uploader (actual uploader)
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'admin_login_logo', array(
        'label'    => __( 'Admin Login Logo', 'admin_login_logo' ),
        'section'  => 'title_tagline',
        'settings' => 'admin_login_logo',
    ) ) );
}
add_action( 'customize_register', 'admin_login_logo_customize_register' );