<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package NFDA-theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> data-pageId="<?php echo get_the_id() ?>">
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <header class="site_header">
            <div class="container">
                <div class="header_wrap">
                    <div class="site_logo">
                        <?php
                    if ( has_custom_logo() ){
                        the_custom_logo();
                    }
                    ?>
                    </div>
                    <button class="toggle_menu"></button>
                    <div class="menu_wrap">
                        <nav>
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'header-menu',
                                'menu' => 'Header',
                                'container_class' => 'menu-inner',
                                'before' => '<div class="a-Wrap">',
                                'after' => '</div>',
                            )
                        )
                            ?>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
<script>
        // Use this js code for set header height    
        let headerHeight = document.querySelector(".site_header").offsetHeight;
        document.querySelector("body").style.setProperty("--headerHeight", headerHeight + "px");
</script>