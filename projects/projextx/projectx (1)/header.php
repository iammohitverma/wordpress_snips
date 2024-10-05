<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package projectx-theme
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
        
    <header class="projectx_header">
        <div class="container">
            <div class="header_inner">
                <div class="logo_wrap">
                    <?php 
                        $regular_logo_id = get_theme_mod( 'custom_logo' );
                        $regular_logo = wp_get_attachment_image_src( $regular_logo_id , 'full' );
                        
                        $sticky_logo = get_theme_mod( 'sticky_logo' );
                        
                        // Check if the logo exists
                        if ( has_custom_logo() ) {
                            // Output the regular logo initially
                            echo '<a href="'.esc_url(home_url('/')).'"><img src="'.$regular_logo[0].'" alt="'.get_bloginfo('name').'" class="regular-logo" /></a>';
                            
                            // Output the sticky logo but keep it hidden initially
                            echo '<a href="'.esc_url(home_url('/')).'"><img src="'.$sticky_logo.'" alt="'.get_bloginfo('name').'" class="sticky-logo" style="display:none;" /></a>';
                        } else { ?>
                            <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
                        <?php 
                        }
                    ?>
                </div>

                
                <button class="menu_toggle_btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <div class="navigationWrap">
                    <?php
                        wp_nav_menu(  array(
                            'menu'              => "primary", 
                            'menu_class'        => "main-menu", 
                            'menu_id'           => "primary-menu", 
                            'container'         => "nav", 
                            'theme_location'    => "header", 
                            'before'            => '<div class="a-Wrap">',
                            'after'             => '</div>',
                        ) );
                    ?>
                </div>
            </div>
        </div>
    </header>