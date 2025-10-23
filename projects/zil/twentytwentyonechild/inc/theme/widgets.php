<?php

// remove parent theme widget
function remove_footer_widgets()
{
    unregister_sidebar('sidebar-1');
}
add_action('widgets_init', 'remove_footer_widgets', 11);


/**
 * Add a sidebar.
 */
function twentytwentyonechild_theme_slug_widgets_init()
{
    register_sidebar(array(
        'name' => __('Header Buttons', 'twentytwentyonechild'),
        'id' => 'header_btns',
        'description' => __('', 'twentytwentyonechild'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => __('Footer Top', 'twentytwentyonechild'),
        'id' => 'footer_top',
        'description' => __('', 'twentytwentyonechild'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => __('Footer One', 'twentytwentyonechild'),
        'id' => 'footer_one',
        'description' => __('', 'twentytwentyonechild'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => __('Footer Two', 'twentytwentyonechild'),
        'id' => 'footer_two',
        'description' => __('', 'twentytwentyonechild'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => __('Footer Three', 'twentytwentyonechild'),
        'id' => 'footer_three',
        'description' => __('', 'twentytwentyonechild'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => __('Footer Four', 'twentytwentyonechild'),
        'id' => 'footer_four',
        'description' => __('', 'twentytwentyonechild'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => __('Footer Copyright', 'twentytwentyonechild'),
        'id' => 'footer_copyright',
        'description' => __('', 'twentytwentyonechild'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => '</h4>',
    ));
}
add_action('widgets_init', 'twentytwentyonechild_theme_slug_widgets_init');