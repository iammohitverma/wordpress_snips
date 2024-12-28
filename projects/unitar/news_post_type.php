<?php

// Register Custom Post Type News
function create_news_cpt() {

    $labels = array(
        'name' => _x( 'News', 'Post Type General Name', 'generatepress' ),
        'singular_name' => _x( 'News', 'Post Type Singular Name', 'generatepress' ),
        'menu_name' => _x( 'News', 'Admin Menu text', 'generatepress' ),
        'name_admin_bar' => _x( 'News', 'Add New on Toolbar', 'generatepress' ),
        'archives' => __( 'News Archives', 'generatepress' ),
        'attributes' => __( 'News Attributes', 'generatepress' ),
        'parent_item_colon' => __( 'Parent News:', 'generatepress' ),
        'all_items' => __( 'All News', 'generatepress' ),
        'add_new_item' => __( 'Add New News', 'generatepress' ),
        'add_new' => __( 'Add New', 'generatepress' ),
        'new_item' => __( 'New News', 'generatepress' ),
        'edit_item' => __( 'Edit News', 'generatepress' ),
        'update_item' => __( 'Update News', 'generatepress' ),
        'view_item' => __( 'View News', 'generatepress' ),
        'view_items' => __( 'View News', 'generatepress' ),
        'search_items' => __( 'Search News', 'generatepress' ),
        'not_found' => __( 'Not found', 'generatepress' ),
        'not_found_in_trash' => __( 'Not found in Trash', 'generatepress' ),
        'featured_image' => __( 'Featured Image', 'generatepress' ),
        'set_featured_image' => __( 'Set featured image', 'generatepress' ),
        'remove_featured_image' => __( 'Remove featured image', 'generatepress' ),
        'use_featured_image' => __( 'Use as featured image', 'generatepress' ),
        'insert_into_item' => __( 'Insert into News', 'generatepress' ),
        'uploaded_to_this_item' => __( 'Uploaded to this News', 'generatepress' ),
        'items_list' => __( 'News list', 'generatepress' ),
        'items_list_navigation' => __( 'News list navigation', 'generatepress' ),
        'filter_items_list' => __( 'Filter News list', 'generatepress' ),
    );
    $args = array(
        'label' => __( 'News', 'generatepress' ),
        'description' => __( '', 'generatepress' ),
        'labels' => $labels,
        'menu_icon' => 'dashicons-admin-post',
        'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author', 'custom-fields' ),
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
    register_post_type( 'news', $args );
}
add_action( 'init', 'create_news_cpt', 0 );

// Register Custom Taxonomy for News Categories
function create_news_category_taxonomy() {

    $labels = array(
        'name' => _x( 'News Categories', 'Taxonomy General Name', 'generatepress' ),
        'singular_name' => _x( 'News Category', 'Taxonomy Singular Name', 'generatepress' ),
        'menu_name' => __( 'News Categories', 'generatepress' ),
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
    register_taxonomy( 'news_category', array( 'news' ), $args );
}
add_action( 'init', 'create_news_category_taxonomy', 0 );

// Register Custom Taxonomy for News Tags
function create_news_tag_taxonomy() {

    $labels = array(
        'name' => _x( 'News Tags', 'Taxonomy General Name', 'generatepress' ),
        'singular_name' => _x( 'News Tag', 'Taxonomy Singular Name', 'generatepress' ),
        'menu_name' => __( 'News Tags', 'generatepress' ),
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
    register_taxonomy( 'news_tag', array( 'news' ), $args );
}
add_action( 'init', 'create_news_tag_taxonomy', 0 );
