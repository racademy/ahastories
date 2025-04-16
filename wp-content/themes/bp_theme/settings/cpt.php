<?php
function bp_register_programmes_cpt()
{
    $labels = [
        'name' => _x('Programmes', 'Post type general name', 'bp_theme'),
        'singular_name' => _x('Programme', 'Post type singular name', 'bp_theme'),
        'menu_name' => __('Programmes', 'bp_theme'),
        'name_admin_bar' => __('Programme', 'bp_theme'),
        'add_new' => __('Add New', 'bp_theme'),
        'add_new_item' => __('Add New Programme', 'bp_theme'),
        'new_item' => __('New Programme', 'bp_theme'),
        'edit_item' => __('Edit Programme', 'bp_theme'),
        'view_item' => __('View Programme', 'bp_theme'),
        'all_items' => __('All Programmes', 'bp_theme'),
        'search_items' => __('Search Programmes', 'bp_theme'),
        'parent_item_colon' => __('Parent Programmes:', 'bp_theme'),
        'not_found' => __('No programmes found.', 'bp_theme'),
        'not_found_in_trash' => __('No programmes found in Trash.', 'bp_theme'),
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => ['slug' => 'programmes'],
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-welcome-learn-more',
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'taxonomies' => ['programme_category'],
        'show_in_rest' => true,
    ];

    register_post_type('programmes', $args);
}

function bp_register_programme_taxonomy()
{
    $labels = [
        'name' => _x('Programme Categories', 'taxonomy general name', 'bp_theme'),
        'singular_name' => _x('Programme Category', 'taxonomy singular name', 'bp_theme'),
        'search_items' => __('Search Categories', 'bp_theme'),
        'all_items' => __('All Categories', 'bp_theme'),
        'parent_item' => __('Parent Category', 'bp_theme'),
        'parent_item_colon' => __('Parent Category:', 'bp_theme'),
        'edit_item' => __('Edit Category', 'bp_theme'),
        'update_item' => __('Update Category', 'bp_theme'),
        'add_new_item' => __('Add New Category', 'bp_theme'),
        'new_item_name' => __('New Category Name', 'bp_theme'),
        'menu_name' => __('Programme Categories', 'bp_theme'),
    ];

    $args = [
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => ['slug' => 'programme-category'],
        'show_in_rest' => true,
    ];

    register_taxonomy('programme_category', ['programmes'], $args);
}

add_action('init', 'bp_register_programmes_cpt');
add_action('init', 'bp_register_programme_taxonomy');
