<?php
// Check if function doesn't exist already
if (!function_exists('twentytwentyonechild_register_nav_menu')) {

    function twentytwentyonechild_register_nav_menu()
    {
        // Unregister the parent theme's menu location
        unregister_nav_menu('primary');
        unregister_nav_menu('footer');

        // Register your own custom menu locations
        register_nav_menus(array(
            'header_menu' => __('Header Menu', 'twentytwentyonechild'),
            'footer_menu' => __('Footer Menu', 'twentytwentyonechild'),
        ));
    }

    // Run after parent theme has registered its menus (priority 20)
    add_action('after_setup_theme', 'twentytwentyonechild_register_nav_menu', 20);
}



// add caret for submenus
function twentytwentyonechild_menu_arrow($item_output, $item, $depth, $args)
{
    if (in_array('menu-item-has-children', $item->classes)) {
        $arrow = '<button class="submenu_btn"> <i class="fas fa-chevron-down"></i></button>'; // Change the class to your font icon
        $item_output = str_replace('</a>', '</a>' . $arrow . '', $item_output);
    }
    return $item_output;
}
add_filter('walker_nav_menu_start_el', 'twentytwentyonechild_menu_arrow', 10, 4);