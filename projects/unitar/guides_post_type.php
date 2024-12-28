<?php
// Register Custom Post Type Guides
function create_guides_cpt() {

    $labels = array(
        'name' => _x( 'Guides', 'Post Type General Name', 'generatepress' ),
        'singular_name' => _x( 'Guide', 'Post Type Singular Name', 'generatepress' ),
        'menu_name' => _x( 'Guides', 'Admin Menu text', 'generatepress' ),
        'name_admin_bar' => _x( 'Guide', 'Add New on Toolbar', 'generatepress' ),
        'archives' => __( 'Guide Archives', 'generatepress' ),
        'attributes' => __( 'Guide Attributes', 'generatepress' ),
        'parent_item_colon' => __( 'Parent Guide:', 'generatepress' ),
        'all_items' => __( 'All Guides', 'generatepress' ),
        'add_new_item' => __( 'Add New Guide', 'generatepress' ),
        'add_new' => __( 'Add New', 'generatepress' ),
        'new_item' => __( 'New Guide', 'generatepress' ),
        'edit_item' => __( 'Edit Guide', 'generatepress' ),
        'update_item' => __( 'Update Guide', 'generatepress' ),
        'view_item' => __( 'View Guide', 'generatepress' ),
        'view_items' => __( 'View Guides', 'generatepress' ),
        'search_items' => __( 'Search Guide', 'generatepress' ),
        'not_found' => __( 'Not found', 'generatepress' ),
        'not_found_in_trash' => __( 'Not found in Trash', 'generatepress' ),
        'featured_image' => __( 'Featured Image', 'generatepress' ),
        'set_featured_image' => __( 'Set featured image', 'generatepress' ),
        'remove_featured_image' => __( 'Remove featured image', 'generatepress' ),
        'use_featured_image' => __( 'Use as featured image', 'generatepress' ),
        'insert_into_item' => __( 'Insert into Guide', 'generatepress' ),
        'uploaded_to_this_item' => __( 'Uploaded to this Guide', 'generatepress' ),
        'items_list' => __( 'Guides list', 'generatepress' ),
        'items_list_navigation' => __( 'Guides list navigation', 'generatepress' ),
        'filter_items_list' => __( 'Filter Guides list', 'generatepress' ),
    );
    $args = array(
        'label' => __( 'Guides', 'generatepress' ),
        'description' => __( '', 'generatepress' ),
        'labels' => $labels,
        'menu_icon' => 'dashicons-admin-post',
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author', 'custom-fields'),
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
    register_post_type( 'guides', $args );

}
add_action( 'init', 'create_guides_cpt', 0 );

// Register Custom Taxonomy for Guide Categories
function create_guides_category_taxonomy() {

    $labels = array(
        'name' => _x( 'Guide Categories', 'Taxonomy General Name', 'generatepress' ),
        'singular_name' => _x( 'Guide Category', 'Taxonomy Singular Name', 'generatepress' ),
        'menu_name' => __( 'Guide Categories', 'generatepress' ),
        'all_items' => __( 'All Categories', 'generatepress' ),
        'new_item_name' => __( 'New Category Name', 'generatepress' ),
        'add_new_item' => __( 'Add New Category', 'generatepress' ),
        'edit_item' => __( 'Edit Category', 'generatepress' ),
        'update_item' => __( 'Update Category', 'generatepress' ),
        'view_item' => __( 'View Category', 'generatepress' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true, // True for category-style
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'show_in_rest' => true,
    );
    register_taxonomy( 'guides_category', array( 'guides' ), $args );

}
add_action( 'init', 'create_guides_category_taxonomy', 0 );

// Register Custom Taxonomy for Guide Tags
function create_guides_tag_taxonomy() {

    $labels = array(
        'name' => _x( 'Guide Tags', 'Taxonomy General Name', 'generatepress' ),
        'singular_name' => _x( 'Guide Tag', 'Taxonomy Singular Name', 'generatepress' ),
        'menu_name' => __( 'Guide Tags', 'generatepress' ),
        'all_items' => __( 'All Tags', 'generatepress' ),
        'new_item_name' => __( 'New Tag Name', 'generatepress' ),
        'add_new_item' => __( 'Add New Tag', 'generatepress' ),
        'edit_item' => __( 'Edit Tag', 'generatepress' ),
        'update_item' => __( 'Update Tag', 'generatepress' ),
        'view_item' => __( 'View Tag', 'generatepress' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => false, // False for tag-style
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'show_in_rest' => true,
    );
    register_taxonomy( 'guides_tag', array( 'guides' ), $args );

}
add_action( 'init', 'create_guides_tag_taxonomy', 0 );
