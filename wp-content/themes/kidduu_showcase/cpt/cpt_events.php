<?php
add_action('init', 'test_init');

function test_init() {
    $labels = array(
        'name' => __('Events'),
        'singular_name' => __('Event'),
        'add_new' => __('Add Event'),
        'add_new_item' => __('Add new Event'),
        'edit_item' => __('Edit Event'),
        'new_item' => __('New Events'),
        'view_item' => __('View Events'),
        'search_items' => __('Search Event'),
        'not_found' => __('No event found'),
        'not_found_in_trash' => __('No event found in trash'),
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'menu_icon' => 'dashicons-clipboard', // http://melchoyce.github.io/dashicons/
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'show_in_rest' => true,
        'hierarchical' => false,
        'supports' => array('title', 'editor', 'thumbnail')
    );
    register_post_type('events', $args);
}


?>