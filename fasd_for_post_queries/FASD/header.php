<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fasd-theme
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
    

    <header class="fasd_header">
        <div class="top_bar">
            <div class="container">
                <div class="inner">
                    <div class="right_items">
                        <ul>
                            <?php
                            // Loop through each topbar link item
                            for ($i = 1; $i <= 2; $i++) {
                                $icon_key = 'topbar_text_item_' . $i . '_icon';
                                $text_key = 'topbar_text_item_' . $i . '_text';
                                $link_key = 'topbar_text_item_' . $i . '_link';

                                $icon = get_theme_mod($icon_key);
                                $text = get_theme_mod($text_key);
                                $link = get_theme_mod($link_key);

                                // Check if all required fields are filled
                                if (!empty($icon) && !empty($text) && !empty($link)) {
                                    ?>
                                    <li>
                                        <a href="<?php echo esc_url($link); ?>">
                                            <img src="<?php echo esc_url($icon); ?>" alt="<?php echo esc_attr($text); ?>" class="icon">
                                            <span class="text"><?php echo esc_html($text); ?></span>
                                        </a>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                            <li class="search_toggle_mobile">
                                <button>
                                    <svg focusable="false" aria-label="Search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24px"><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path></svg>
                                </button>
                            </li>
                        </ul>
                        <div class="search_wrap">
                            <?php echo do_shortcode('[ivory-search id="57" title="Custom Search Form"]');?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main_header">
            <div class="container">
                <div class="inner">
                    <div class="logoBx">
                                    
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
                            wp_nav_menu(  array(
                                'menu'              => "header", 
                                'menu_class'        => "main-menu", 
                                'menu_id'           => "primary-menu", 
                                'container'         => "nav", 
                                'theme_location'    => "header", 
                                'before'               => '<div class="a-Wrap">', 
                                'after'                => '</div>', 
                            ) );
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </header>