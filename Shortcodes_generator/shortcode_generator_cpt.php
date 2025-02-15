<?php
// Register Custom Post Type Shortcodes
function create_shortcodes_cpt() {

	$labels = array(
		'name' => _x( 'Shorcodes', 'Post Type General Name', 'textdomain' ),
		'singular_name' => _x( 'Shortcodes', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => _x( 'Shorcodes', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar' => _x( 'Shortcodes', 'Add New on Toolbar', 'textdomain' ),
		'archives' => __( 'Shortcodes Archives', 'textdomain' ),
		'attributes' => __( 'Shortcodes Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Shortcodes:', 'textdomain' ),
		'all_items' => __( 'All Shorcodes', 'textdomain' ),
		'add_new_item' => __( 'Add New Shortcodes', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New Shortcodes', 'textdomain' ),
		'edit_item' => __( 'Edit Shortcodes', 'textdomain' ),
		'update_item' => __( 'Update Shortcodes', 'textdomain' ),
		'view_item' => __( 'View Shortcodes', 'textdomain' ),
		'view_items' => __( 'View Shorcodes', 'textdomain' ),
		'search_items' => __( 'Search Shortcodes', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into Shortcodes', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Shortcodes', 'textdomain' ),
		'items_list' => __( 'Shorcodes list', 'textdomain' ),
		'items_list_navigation' => __( 'Shorcodes list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter Shorcodes list', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'Shortcodes', 'textdomain' ),
		'description' => __( '', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-admin-post',
		'supports' => array('title', 'editor', 'custom-fields'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'shortcodes', $args );

}
add_action( 'init', 'create_shortcodes_cpt', 0 );