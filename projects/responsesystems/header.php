<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package responsesystems-theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> data-pageId="<?php echo get_the_id() ?>">
    <?php wp_body_open(); ?>
    <div id="page" class="site">

    
    <header>
        <div class="container">
            <div class="inner">
                <div class="logo_wrap">
                    <?php 
                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                        
                        //   if logo image does'nt exist call site title and tagline
                        if ( has_custom_logo() ) {
                            the_custom_logo();
                        } else {?>
                            <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
                            <!-- <p><?php bloginfo('description'); ?></p> -->
                        <?php
                        }
                    ?>
                </div>

                <button class="toggle_menu"></button>

                <div class="navigationWrap">
                    <?php
                        wp_nav_menu(
                            array(
                                'theme_location'   =>     'header',
                                'menu'             =>     'header-menu',
                                'menu_id'          =>     'primary-menu',
                                'container'  =>     'nav',
                                'container_class'  =>     'menu-inner',
                                'before'           =>     '<div class="a-Wrap">', 
                                'after'            =>     '</div>', 
                            )
                        );
                    ?>
                </div>                
            </div>
        </div>
    </header>

    <!-- <section class="hero">
        <img src="http://responsesystems.local/wp-content/uploads/2024/07/asset_1.png" alt="">
    </section> -->