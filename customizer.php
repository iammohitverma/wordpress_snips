<?php

if (!function_exists('theme_customize_register')) :
    function theme_customize_register($wp_customize)
    {
        /*------ Login Customizer Section ------*/
        require get_template_directory() . '/inc/theme/parts/login_customizer.php';

        // do your custom customizer code from below

         $wp_customize->add_panel('footer_content_panel', array(
        'title'            => __('Footer'),
        'description'      => __('Customize the footer content and appearance.'),
        'priority'         => 160,
    ));
    $wp_customize->add_section('footer_content_section', array(
        'title'       => __('Content'),
        'description' => __('Edit footer content'),
        'priority'    => 100,
        'panel'       => 'footer_content_panel',
    ));


    $wp_customize->add_setting('footer_logo', array(
        'default'           => '', 
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_logo_control', array(
        'label'       => __('Footer Logo', 'mytheme'),
        'section'     => 'footer_content_section',
        'settings'    => 'footer_logo',
        'description' => __('Upload a logo for the footer.'),
    )));


    $wp_customize->add_setting('footer_text', array(
        'default'           => __('Default Footer Text'),
        'transport'         => 'refresh', 
    ));
    $wp_customize->add_control('footer_text_control', array(
        'label'       => __('Footer Text'),
        'section'     => 'footer_content_section', 
        'settings'    => 'footer_text',
        'type'        => 'textarea',
    ));

    $wp_customize->add_setting('footer_phone', array(
        'default'           => __(''),
        'transport'         => 'refresh', 
    ));
    $wp_customize->add_control('footer_phone_control', array(
        'label'       => __('Phone Number'),
        'section'     => 'footer_content_section', 
        'settings'    => 'footer_phone',
        'type'        => 'text',
    ));
    
    $wp_customize->add_setting('footer_address1', array(
        'default'           => __(''),
        'transport'         => 'refresh', 
    ));
    $wp_customize->add_control('footer_address1_control', array(
        'label'       => __('Address1'),
        'section'     => 'footer_content_section', 
        'settings'    => 'footer_address1',
        'type'        => 'text',
    ));

     $wp_customize->add_setting('footer_address2', array(
        'default'           => __(''),
        'transport'         => 'refresh', 
    ));
    $wp_customize->add_control('footer_address2_control', array(
        'label'       => __('Address2'),
        'section'     => 'footer_content_section', 
        'settings'    => 'footer_address2',
        'type'        => 'text',
    ));


    
    $wp_customize->add_setting( 'facebook_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw', 
    ) );

   
    $wp_customize->add_control( 'facebook_url_control', array(
        'label'    => __( 'Facebook URL'),
        'section'  => 'footer_content_section',
        'settings' => 'facebook_url',
        'type'     => 'url',
    ) );
    
   


    $wp_customize->add_setting( 'insta_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );

   
    $wp_customize->add_control( 'insta_url_control', array(
        'label'    => __( 'Instagram URL'),
        'section'  => 'footer_content_section',
        'settings' => 'insta_url',
        'type'     => 'url',
    ) );
    

    $menus = wp_get_nav_menus();
    $choices = array();

    // If there are menus, populate them as choices
    if ( ! empty( $menus ) ) {
        foreach ( $menus as $menu ) {
            $choices[$menu->term_id] = $menu->name;
        }
    }

    $wp_customize->add_setting('menu_option_1_heading', array(
        'default'           => __(''),
        'transport'         => 'refresh', 
    ));
    $wp_customize->add_control('menu_option_1_heading_control', array(
        'label'       => __('Footer Menu 1 Heading'),
        'section'     => 'footer_content_section', 
        'settings'    => 'menu_option_1_heading',
        'type'        => 'text',
    ));

    
    $wp_customize->add_setting( 'menu_option_1', array(
        'default'           => 'default-menu',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ) );


    $wp_customize->add_control( 'menu_option_1_control', array(
        'label'    => __( 'Footer Menu 1'),
        'section'  => 'footer_content_section',
        'settings' => 'menu_option_1',
        'type'     => 'select',
        'choices'  => $choices,  
    ) );

     $wp_customize->add_setting('menu_option_2_heading', array(
        'default'           => __(''),
        'transport'         => 'refresh', 
    ));
    $wp_customize->add_control('menu_option_2_heading_control', array(
        'label'       => __('Footer Menu 2 Heading'),
        'section'     => 'footer_content_section', 
        'settings'    => 'menu_option_2_heading',
        'type'        => 'text',
    ));

    $wp_customize->add_setting( 'menu_option_2', array(
        'default'           => 'default-menu',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( 'menu_option_2_control', array(
        'label'    => __( 'Footer Menu 2'),
        'section'  => 'footer_content_section',
        'settings' => 'menu_option_2',
        'type'     => 'select',
        'choices'  => $choices,  
    ) );
    
     $wp_customize->add_setting('menu_option_3_heading', array(
        'default'           => __(''),
        'transport'         => 'refresh', 
    ));
    $wp_customize->add_control('menu_option_3_heading_control', array(
        'label'       => __('Footer Menu 3 Heading'),
        'section'     => 'footer_content_section', 
        'settings'    => 'menu_option_3_heading',
        'type'        => 'text',
    ));

    $wp_customize->add_setting( 'menu_option_3', array(
        'default'           => 'default-menu',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( 'menu_option_3_control', array(
        'label'    => __( 'Footer Menu 3'),
        'section'  => 'footer_content_section',
        'settings' => 'menu_option_3',
        'type'     => 'select',
        'choices'  => $choices,  
    ) );

     $wp_customize->add_setting('menu_option_4_heading', array(
        'default'           => __(''),
        'transport'         => 'refresh', 
    ));
    $wp_customize->add_control('menu_option_4_heading_control', array(
        'label'       => __('Footer Menu 4 Heading'),
        'section'     => 'footer_content_section', 
        'settings'    => 'menu_option_4_heading',
        'type'        => 'text',
    ));

    $wp_customize->add_setting( 'menu_option_4', array(
        'default'           => 'default-menu',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( 'menu_option_4_control', array(
        'label'    => __( 'Footer Menu 4'),
        'section'  => 'footer_content_section',
        'settings' => 'menu_option_4',
        'type'     => 'select',
        'choices'  => $choices,  
    ) );

      $wp_customize->add_setting('menu_option_5_heading', array(
        'default'           => __(''),
        'transport'         => 'refresh', 
    ));
    $wp_customize->add_control('menu_option_5_heading_control', array(
        'label'       => __('Footer Menu 5 Heading'),
        'section'     => 'footer_content_section', 
        'settings'    => 'menu_option_5_heading',
        'type'        => 'text',
    ));

    $wp_customize->add_setting( 'menu_option_5', array(
        'default'           => 'default-menu',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( 'menu_option_5_control', array(
        'label'    => __( 'Footer Menu 5'),
        'section'  => 'footer_content_section',
        'settings' => 'menu_option_5',
        'type'     => 'select',
        'choices'  => $choices,  
    ) );

          $wp_customize->add_setting('menu_option_6_heading', array(
        'default'           => __(''),
        'transport'         => 'refresh', 
    ));
    $wp_customize->add_control('menu_option_6_heading_control', array(
        'label'       => __('Footer Menu 6 Heading'),
        'section'     => 'footer_content_section', 
        'settings'    => 'menu_option_6_heading',
        'type'        => 'text',
    ));

    $wp_customize->add_setting( 'menu_option_6', array(
        'default'           => 'default-menu',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( 'menu_option_6_control', array(
        'label'    => __( 'Footer Menu 6'),
        'section'  => 'footer_content_section',
        'settings' => 'menu_option_6',
        'type'     => 'select',
        'choices'  => $choices,  
    ) );


    $wp_customize->add_setting('my_account', array(
        'default'           => __(''),
        'transport'         => 'refresh', 
    ));
    $wp_customize->add_control('my_account_control', array(
        'label'       => __('My Account Button Text'),
        'section'     => 'footer_content_section', 
        'settings'    => 'my_account',
        'type'        => 'text',
    ));

    $wp_customize->add_setting( 'my_account_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );

   
    $wp_customize->add_control( 'my_account_url_control', array(
        'label'    => __( 'My Account URL'),
        'section'  => 'footer_content_section',
        'settings' => 'my_account_url',
        'type'     => 'url',
    ) );

     $wp_customize->add_setting('contact_us', array(
        'default'           => __(''),
        'transport'         => 'refresh', 
    ));
    $wp_customize->add_control('contact_us_control', array(
        'label'       => __('Contact Us Text'),
        'section'     => 'footer_content_section', 
        'settings'    => 'contact_us',
        'type'        => 'text',
    ));

    $wp_customize->add_setting( 'contact_us_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );

   
    $wp_customize->add_control( 'contact_us_url_control', array(
        'label'    => __( 'Contact Us URL'),
        'section'  => 'footer_content_section',
        'settings' => 'contact_us_url',
        'type'     => 'url',
    ) );

    $wp_customize->add_setting('blog', array(
        'default'           => __(''),
        'transport'         => 'refresh', 
    ));
    $wp_customize->add_control('blog_control', array(
        'label'       => __('Blog Text'),
        'section'     => 'footer_content_section', 
        'settings'    => 'blog',
        'type'        => 'text',
    ));

    $wp_customize->add_setting( 'blog_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );

   
    $wp_customize->add_control( 'blog_url_control', array(
        'label'    => __( 'Blog URL'),
        'section'  => 'footer_content_section',
        'settings' => 'blog_url',
        'type'     => 'url',
    ) );

    $wp_customize->add_setting('faq', array(
        'default'           => __(''),
        'transport'         => 'refresh', 
    ));
    $wp_customize->add_control('faq_control', array(
        'label'       => __('Faqs Text'),
        'section'     => 'footer_content_section', 
        'settings'    => 'faq',
        'type'        => 'text',
    ));

    $wp_customize->add_setting( 'faq_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );

   
    $wp_customize->add_control( 'faq_url_control', array(
        'label'    => __( 'Faqs URL'),
        'section'  => 'footer_content_section',
        'settings' => 'faq_url',
        'type'     => 'url',
    ) );




     $wp_customize->add_section( 'footer_copyrights_content_section', array(
        'title'       => __( 'Copyright Content', 'mytheme' ),
        'description' => __( 'Edit the footer copyright text', 'mytheme' ),
        'priority'    => 120,
        'panel'       => 'footer_content_panel', 
    ) );

    $wp_customize->add_setting( 'footer_copyright_text', array(
        'default'           => __( '© 2024 Your Company Name. All Rights Reserved.', 'mytheme' ),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( 'footer_copyright_text_control', array(
        'label'    => __( 'Copyright Text', 'mytheme' ),
        'section'  => 'footer_copyrights_content_section',
        'settings' => 'footer_copyright_text',
        'type'     => 'text',
    ) );

    $wp_customize->add_setting('privacypolicy', array(
        'default'           => __(''),
        'transport'         => 'refresh', 
    ));
    $wp_customize->add_control('privacypolicy_control', array(
        'label'       => __('Privacy Policy Text'),
        'section'     => 'footer_copyrights_content_section', 
        'settings'    => 'privacypolicy',
        'type'        => 'text',
    ));

    $wp_customize->add_setting( 'privacypolicy_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );

   
    $wp_customize->add_control( 'privacypolicy_url_control', array(
        'label'    => __( 'Privacy Policy URL'),
        'section'  => 'footer_copyrights_content_section',
        'settings' => 'privacypolicy_url',
        'type'     => 'url',
    ) );

    $wp_customize->add_setting('termandcondition', array(
        'default'           => __(''),
        'transport'         => 'refresh', 
    ));
    $wp_customize->add_control('termandcondition_control', array(
        'label'       => __('Terms & Conditions Text'),
        'section'     => 'footer_copyrights_content_section', 
        'settings'    => 'termandcondition',
        'type'        => 'text',
    ));

    $wp_customize->add_setting( 'termandcondition_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );

   
    $wp_customize->add_control( 'termandcondition_url_control', array(
        'label'    => __( 'Terms & Conditions URL'),
        'section'  => 'footer_copyrights_content_section',
        'settings' => 'termandcondition_url',
        'type'     => 'url',
    ) );

    $wp_customize->add_setting('siteby', array(
        'default'           => __(''),
        'transport'         => 'refresh', 
    ));
    $wp_customize->add_control('siteby_control', array(
        'label'       => __('Site By Text'),
        'section'     => 'footer_copyrights_content_section', 
        'settings'    => 'siteby',
        'type'        => 'text',
    ));

     $wp_customize->add_setting('siteby_logo', array(
        'default'           => '', 
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'siteby_logo_control', array(
        'label'       => __('Site Logo', 'mytheme'),
        'section'     => 'footer_copyrights_content_section',
        'settings'    => 'siteby_logo',
        'description' => __('Upload a logo for the footer.'),
    )));

    $wp_customize->add_setting( 'siteby_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );

   
    $wp_customize->add_control( 'siteby_url_control', array(
        'label'    => __( 'Site URL'),
        'section'  => 'footer_copyrights_content_section',
        'settings' => 'siteby_url',
        'type'     => 'url',
    ) );


    }
    add_action('customize_register', 'theme_customize_register');
endif;