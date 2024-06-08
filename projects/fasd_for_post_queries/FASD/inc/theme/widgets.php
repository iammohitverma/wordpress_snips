<?php

// Show Widgets Sidebar
if (!function_exists('widgets_sidebar')) :
	function widgets_sidebar()
	{
		register_sidebar(array(
			'name'          => __('Footer 1', 'fasd'),
			'id'            => 'footer-1',
			'description'   => __('This is First Footer Widget', 'fasd'),
			'before_widget' => '<div id="%1$s" class="widget_wrap %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widgettitle">',
			'after_title'   => '</h4>',
		));
		register_sidebar(array(
			'name'          => __('Footer 2', 'fasd'),
			'id'            => 'footer-2',
			'description'   => __('This is First Second Widget', 'fasd'),
			'before_widget' => '<div id="%1$s" class="widget_wrap %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widgettitle">',
			'after_title'   => '</h4>',
		));
		register_sidebar(array(
			'name'          => __('Footer 3', 'fasd'),
			'id'            => 'footer-3',
			'description'   => __('This is First Third Widget', 'fasd'),
			'before_widget' => '<div id="%1$s" class="widget_wrap %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widgettitle">',
			'after_title'   => '</h4>',
		));
		register_sidebar(array(
			'name'          => __('Footer 4', 'fasd'),
			'id'            => 'footer-4',
			'description'   => __('This is First Fourth Widget', 'fasd'),
			'before_widget' => '<div id="%1$s" class="widget_wrap %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widgettitle">',
			'after_title'   => '</h4>',
		));
		register_sidebar(array(
			'name'          => __('Footer 5', 'fasd'),
			'id'            => 'footer-5',
			'description'   => __('This is First Fifth Widget', 'fasd'),
			'before_widget' => '<div id="%1$s" class="widget_wrap %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widgettitle">',
			'after_title'   => '</h4>',
		));
		register_sidebar(array(
			'name'          => __('Copyright Left', 'fasd'),
			'id'            => 'copyright_left',
			'description'   => __('This is First Copyright Left Widget', 'fasd'),
			'before_widget' => '<div id="%1$s" class="widget_wrap %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widgettitle">',
			'after_title'   => '</h4>',
		));
		register_sidebar(array(
			'name'          => __('Copyright Right', 'fasd'),
			'id'            => 'copyright_right',
			'description'   => __('This is First Copyright Right Widget', 'fasd'),
			'before_widget' => '<div id="%1$s" class="widget_wrap %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widgettitle">',
			'after_title'   => '</h4>',
		));
	}
	add_action('widgets_init', 'widgets_sidebar');
endif;
