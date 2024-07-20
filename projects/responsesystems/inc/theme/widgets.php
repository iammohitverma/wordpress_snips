<?php

// Show Widgets Sidebar
if (!function_exists('widgets_sidebar')) :
	function widgets_sidebar()
	{
		register_sidebar(array(
			'name'          => __('Footer Logo', 'custom_theme'),
			'id'            => 'footer-logo',
			'description'   => __('Footer widget for logo', 'custom_theme'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>',
		));
		register_sidebar(array(
			'name'          => __('Footer Menu', 'custom_theme'),
			'id'            => 'footer-menu',
			'description'   => __('Footer widget for menu', 'custom_theme'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>',
		));
		register_sidebar(array(
			'name'          => __('Footer Social Icons', 'custom_theme'),
			'id'            => 'footer-sci',
			'description'   => __('Footer widget for social icons', 'custom_theme'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>',
		));
		register_sidebar(array(
			'name'          => __('Footer Copyright', 'custom_theme'),
			'id'            => 'footer-copyright',
			'description'   => __('Footer widget for Copyright', 'custom_theme'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>',
		));
	}
	add_action('widgets_init', 'widgets_sidebar');
endif;
