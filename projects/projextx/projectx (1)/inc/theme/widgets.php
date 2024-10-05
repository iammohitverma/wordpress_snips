<?php

// Show Widgets Sidebar
if (!function_exists('widgets_sidebar')) :
	function widgets_sidebar()
	{
		register_sidebar(array(
			'name'          => __('Top Footer', 'custom_theme'),
			'id'            => 'top_footer',
			'description'   => __('This is First Footer Widget', 'custom_theme'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>',
		));
		register_sidebar(array(
			'name'          => __('Footer Description', 'custom_theme'),
			'id'            => 'footer_description',
			'description'   => __('This is Second Footer Widget', 'custom_theme'),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		));
		register_sidebar(array(
			'name'          => __('Footer Company Menu ', 'custom_theme'),
			'id'            => 'footer_company_menu',
			'description'   => __('This is third Footer Widget', 'custom_theme'),
			'before_widget' => '<div id="%1$s" class="widget_wrap %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="widgettitle">',
			'after_title'   => '</h6>',
		));
		register_sidebar(array(
			'name'          => __('Footer Explore Menu ', 'custom_theme'),
			'id'            => 'footer_explore_menu',
			'description'   => __('This is third Footer Widget', 'custom_theme'),
			'before_widget' => '<div id="%1$s" class="widget_wrap %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="widgettitle">',
			'after_title'   => '</h6>',
		));
		register_sidebar(array(
			'name'          => __('Footer Further Menu ', 'custom_theme'),
			'id'            => 'footer_further_menu',
			'description'   => __('This is third Footer Widget', 'custom_theme'),
			'before_widget' => '<div id="%1$s" class="widget_wrap %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="widgettitle">',
			'after_title'   => '</h6>',
		));
		register_sidebar(array(
			'name'          => __('Footer Contact', 'custom_theme'),
			'id'            => 'footer_contact',
			'description'   => __('This is Fourth Footer Widget', 'custom_theme'),
			'before_widget' => '<div id="%1$s" class="widget_wrap">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6>',
			'after_title'   => '</h6>',
		));
		register_sidebar(array(
			'name'          => __('Bottom Footer', 'custom_theme'),
			'id'            => 'bottom_footer',
			'description'   => __('This is Blog Sidebar Widget', 'custom_theme'),
			'before_widget' => '',
			'after_widget'  => '',
		));
	}
	add_action('widgets_init', 'widgets_sidebar');
endif;
