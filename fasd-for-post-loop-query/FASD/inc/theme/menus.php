<?php

/* ------ Register Custom Menus ------ */

 
        register_nav_menus(
            array(
                'header' => __('Header Menu'),
                'footer_menu_1'  => __('Footer Menu 1'),
                'footer_menu_2'  => __('Footer Menu 2'),
                'footer_menu_3'  => __('Footer Menu 3'),
                'footer_menu_4'  => __('Footer Menu 4'),
                'footer_menu_5'  => __('Footer Menu 5'),
                'footer_menu_6'  => __('Footer Menu 6'),
            )
        );

    // add caret for submenus
    function dynamicwp_menu_arrow($item_output, $item, $depth, $args) {
        if (in_array('menu-item-has-children', $item->classes)) {
            $arrow = '<span class="subMenuAngle"> <i class="fas fa-caret-down"></i></span>'; // Change the class to your font icon
            $item_output = str_replace('</a>', '</a>'. $arrow .'', $item_output);
        }
        return $item_output;
    }
    add_filter('walker_nav_menu_start_el', 'dynamicwp_menu_arrow', 10, 4);
/* ------ Add List (li) Class In Custom Menu ------ */
// function add_li_class($classes, $item, $args, $depth)
// {
//     if ($args->theme_location == 'header') {
//         $classes[] = 'nav-item';
//     }
//     return $classes;
// }
// add_filter('nav_menu_css_class', 'add_li_class', 10, 4);


/* ------ Add Anchor (a) Class In Custom Menu ------ */
// function add_a_class($atts, $item, $args, $depth)
// {

//     if ($args->theme_location == 'header') {
//         $atts['class'] = "nav-link";
//     }
//     return $atts;
// }
// add_filter('nav_menu_link_attributes', 'add_a_class', 10, 4);
