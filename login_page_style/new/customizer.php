<!-- <?php

if (!function_exists('theme_customize_register')) :
    function theme_customize_register($wp_customize)
    {
        /*------ Login Customizer Section ------*/
        require get_template_directory() . '/inc/theme/parts/login_customizer.php';

        // do your custom customizer code from below
    }
    add_action('customize_register', 'theme_customize_register');


    // for header customizer options:-
    function theme_header_customize_register($wp_customize)
    {
        $wp_customize->add_section('header', array(
            'title'       => 'Header',
            'priority'    => 10,
        ));

        //For video
        $wp_customize->add_setting( 'video_section', array(
            'transport' => 'refresh',
        ) );
        $wp_customize->add_control( new WP_Customize_Upload_Control ( $wp_customize, 'video_section', array(
            'label' => __( 'Video', 'my_theme' ),
            'section' => 'header',
            'settings' => 'video_section',
        ) ) );

        //For placeholder image
        $wp_customize->add_setting( 'placeholder_image', array(
            'transport' => 'refresh',
        ) );
        $wp_customize->add_control( new WP_Customize_Image_Control  ( $wp_customize, 'placeholder_image', array(
            'label' => __( 'Placeholder Image', 'my_theme' ),
            'section' => 'header',
            'settings' => 'placeholder_image',
        ) ) );

        //For video play icon
        $wp_customize->add_setting( 'video_play_button', array(
            'transport' => 'refresh',
        ) );
        $wp_customize->add_control( new WP_Customize_Image_Control  ( $wp_customize, 'video_play_button', array(
            'label' => __( 'Video icon', 'my_theme' ),
            'section' => 'header',
            'settings' => 'video_play_button',
        ) ) );

        //For video play icon text
        $wp_customize->add_setting( 'video_play_button_text', array(
            'default'   => '',
            'transport' => 'refresh',
        ) );
        $wp_customize->add_control( 'video_play_button_text', array(
            'label'    => __( 'Placeholder image text', 'my_theme' ),
            'section'  => 'header',
            'settings' => 'video_play_button_text',
            'type'     => 'text', // Adjust control type if needed
        ) );

        //for contact us button
        $wp_customize->add_setting( 'contact_us', array(
            'default'   => '',
            'transport' => 'refresh',
        ) );
        $wp_customize->add_control( 'contact_us', array(
            'label'    => __( 'Contact us', 'my_theme' ),
            'section'  => 'header',
            'settings' => 'contact_us',
            'type'     => 'text', // Adjust control type if needed
        ) );

        //for contact No
        $wp_customize->add_setting( 'contact_no', array(
            'default'   => '',
            'transport' => 'refresh',
        ) );
        $wp_customize->add_control( 'contact_no', array(
            'label'    => __( 'Contact no', 'my_theme' ),
            'section'  => 'header',
            'settings' => 'contact_no',
            'type'     => 'text', // Adjust control type if needed
        ) );

         //for email address
         $wp_customize->add_setting( 'email_address', array(
            'default'   => '',
            'transport' => 'refresh',
        ) );
        $wp_customize->add_control( 'email_address', array(
            'label'    => __( 'Email', 'my_theme' ),
            'section'  => 'header',
            'settings' => 'email_address',
            'type'     => 'email', // Adjust control type if needed
        ) );
    }
    add_action('customize_register', 'theme_header_customize_register');

    // for footer customizer options:-
    function theme_footer_customize_register($wp_customize){
        $wp_customize->add_section('footer', array(
            'title'       => 'Footer',
            'priority'    => 10,
        ));

        //footer logo
        $wp_customize->add_setting( 'footer_logo', array(
            'transport' => 'refresh',
        ) );
        $wp_customize->add_control( new WP_Customize_Image_Control  ( $wp_customize, 'footer_logo', array(
            'label' => __( 'Footer logo', 'my_theme' ),
            'section' => 'footer',
            'settings' => 'footer_logo',
        ) ) );

        //for contact no
        $wp_customize->add_setting( 'footer_contact_no', array(
            'default'   => '',
            'transport' => 'refresh',
        ) );
        $wp_customize->add_control( 'footer_contact_no', array(
            'label'    => __( 'Contact no', 'my_theme' ),
            'section'  => 'footer',
            'settings' => 'footer_contact_no',
            'type'     => 'tel', // Adjust control type if needed
        ) );

        //for email address
        $wp_customize->add_setting( 'footer_email_address', array(
            'default'   => '',
            'transport' => 'refresh',
        ) );
        $wp_customize->add_control( 'footer_email_address', array(
            'label'    => __( 'Email', 'my_theme' ),
            'section'  => 'footer',
            'settings' => 'footer_email_address',
            'type'     => 'email', // Adjust control type if needed
        ) );

        //for address
        $wp_customize->add_setting( 'address', array(
            'default'   => '',
            'transport' => 'refresh',
        ) );
        $wp_customize->add_control( 'address', array(
            'label'    => __( 'Address', 'my_theme' ),
            'section'  => 'footer',
            'settings' => 'address',
            'type'     => 'textarea', // Adjust control type if needed
        ) );

        //for contact us
        $wp_customize->add_setting( 'footer_contact_us', array(
            'default'   => '',
            'transport' => 'refresh',
        ) );
        $wp_customize->add_control( 'footer_contact_us', array(
            'label'    => __( 'Contact us', 'my_theme' ),
            'section'  => 'footer',
            'settings' => 'footer_contact_us',
            'type'     => 'text', // Adjust control type if needed
        ) );

        //for instagram link
        $wp_customize->add_setting( 'instagram_link', array(
            'default'   => '',
            'transport' => 'refresh',
        ) );
        $wp_customize->add_control( 'instagram_link', array(
            'label'    => __( 'Instagram link', 'my_theme' ),
            'section'  => 'footer',
            'settings' => 'instagram_link',
            'type'     => 'url', // Adjust control type if needed
        ) );

        //for facebook link
        $wp_customize->add_setting( 'facebook_link', array(
            'default'   => '',
            'transport' => 'refresh',
        ) );
        $wp_customize->add_control( 'facebook_link', array(
            'label'    => __( 'Facebook link', 'my_theme' ),
            'section'  => 'footer',
            'settings' => 'facebook_link',
            'type'     => 'url', // Adjust control type if needed
        ) );

        //for linkedin link
        $wp_customize->add_setting( 'linkedin_link', array(
            'default'   => '',
            'transport' => 'refresh',
        ) );
        $wp_customize->add_control( 'linkedin_link', array(
            'label'    => __( 'Linkedin link', 'my_theme' ),
            'section'  => 'footer',
            'settings' => 'linkedin_link',
            'type'     => 'url', // Adjust control type if needed
        ) );

        //for home link
        $wp_customize->add_setting( 'Home_link', array(
            'default'   => '',
            'transport' => 'refresh',
        ) );
        $wp_customize->add_control( 'Home_link', array(
            'label'    => __( 'Home link', 'my_theme' ),
            'section'  => 'footer',
            'settings' => 'Home_link',
            'type'     => 'url', // Adjust control type if needed
        ) );

        //for copyright text
        $wp_customize->add_setting( 'copyright_text', array(
            'default'   => '',
            'transport' => 'refresh',
        ) );
        $wp_customize->add_control( 'copyright_text', array(
            'label'    => __( 'Copyright text', 'my_theme' ),
            'section'  => 'footer',
            'settings' => 'copyright_text',
            'type'     => 'text', // Adjust control type if needed
        ) );

        //for okmg text
        $wp_customize->add_setting( 'okmg_text', array(
            'default'   => '',
            'transport' => 'refresh',
        ) );
        $wp_customize->add_control( 'okmg_text', array(
            'label'    => __( 'Okmg text', 'my_theme' ),
            'section'  => 'footer',
            'settings' => 'okmg_text',
            'type'     => 'text', // Adjust control type if needed
        ) );
    }
    add_action('customize_register', 'theme_footer_customize_register');
endif; -->