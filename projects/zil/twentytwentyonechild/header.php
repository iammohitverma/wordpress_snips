<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> <?php twentytwentyone_the_html_classes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
	<div id="preloader">
		<svg width="300px" height="200px" viewBox="0 0 187.3 93.7" preserveAspectRatio="xMidYMid meet" style="left: 50%; top: 50%; position: absolute; transform: translate(-50%, -50%) matrix(1, 0, 0, 1, 0, 0);">
  <path stroke="#004250" id="outline" fill="none" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" 
        d="M93.9,46.4c9.3,9.5,13.8,17.9,23.5,17.9s17.5-7.8,17.5-17.5s-7.8-17.6-17.5-17.5c-9.7,0.1-13.3,7.2-22.1,17.1 				c-8.9,8.8-15.7,17.9-25.4,17.9s-17.5-7.8-17.5-17.5s7.8-17.5,17.5-17.5S86.2,38.6,93.9,46.4z" />
  <path id="outline-bg" opacity="0.07" fill="none" stroke="#01c5bf" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" 
        d="				M93.9,46.4c9.3,9.5,13.8,17.9,23.5,17.9s17.5-7.8,17.5-17.5s-7.8-17.6-17.5-17.5c-9.7,0.1-13.3,7.2-22.1,17.1 				c-8.9,8.8-15.7,17.9-25.4,17.9s-17.5-7.8-17.5-17.5s7.8-17.5,17.5-17.5S86.2,38.6,93.9,46.4z" />
				</svg>
	</div>
    <?php wp_body_open(); ?>
    <div id="page" class="site">


        <header class="site_header">
            <div class="container">
                <div class="inner">
                    <div class="logo_wrap">
                        <?php
                        $custom_logo_id = get_theme_mod('custom_logo');
                        $logo = wp_get_attachment_image_src($custom_logo_id, 'full');

                        //   if logo image does'nt exist call site title and tagline
                        if (has_custom_logo()) {
                            // Output custom logo manually with link
                            $logo_url = esc_url($logo[0]);
                            $home_url = esc_url(home_url('/'));
                            $site_name = esc_attr(get_bloginfo('name'));

                            echo '<a href="' . $home_url . '" title="' . $site_name . '" rel="home">';
                            echo '<img src="' . $logo_url . '" alt="' . $site_name . '">';
                            echo '</a>';
                        } else { ?>
                            <a href="<?php bloginfo('url'); ?>"
                                title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
                            <!-- <p><?php bloginfo('description'); ?></p> -->
                            <?php
                        }
                        ?>
                    </div>

                    <button class="toggle-menu"></button>

                    <div class="navigation_wrap">
                        <?php
                        wp_nav_menu(array(
                            'menu_class' => "header_menu",
                            'container' => "nav",
                            'theme_location' => "header_menu",
                            'before' => '<div class="a-Wrap">',
                            'after' => '</div>',
                        ));
                        ?>
                        <div class="header_btns">
                            <?php if (is_active_sidebar('header_btns')) { ?>
                                <?php dynamic_sidebar('header_btns'); ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </header>