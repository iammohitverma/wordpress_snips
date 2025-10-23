<?php

if (!function_exists('theme_customize_register')):
    function theme_customize_register($wp_customize)
    {
        /*------ Login Customizer Section ------*/
        $path = get_stylesheet_directory() . '/inc/theme/customizer/login_customizer.php';

        require $path;


        // do your custom customizer code from below
    }
    add_action('customize_register', 'theme_customize_register');
endif;