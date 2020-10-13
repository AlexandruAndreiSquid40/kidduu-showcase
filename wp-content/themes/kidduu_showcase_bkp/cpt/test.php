<?php
add_action('init', 'test_init');

function test_init() {
    $labels = array(
        'name' => __('Test'),
        'singular_name' => __('Testsingle'),
        'add_new' => __('Add testsingle'),
        'add_new_item' => __('Add new testsingle'),
        'edit_item' => __('Edit testsingle'),
        'new_item' => __('New testsingle'),
        'view_item' => __('View testsingle'),
        'search_items' => __('Search test'),
        'not_found' => __('No testsingle found'),
        'not_found_in_trash' => __('No testsingle found in trash'),
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
        'hierarchical' => false,
        'supports' => array('title', 'editor', 'thumbnail')
    );
    register_post_type('test', $args);
}
/*category*/

function my_taxonomies_testsingles_cpt() {
$labels = array(
'name' => _x('Testcat Categories', 'taxonomy general name'),
'singular_name' => _x('Testcat Categories', 'taxonomy singular name'),
'search_items' => __('Search in testcatsingle categories'),
'all_items' => __('All testcatsingle categories'),
'edit_item' => __('Edit testcatsingle category'),
'update_item' => __('Update testcatsingle category'),
'add_new_item' => __('Add new testcatsingle category'),
'new_item_name' => __('New testcatsingle category'),
'menu_name' => __('Test Categories'),
);
$args = array(
'labels' => $labels,
'hierarchical' => true,
'rewrite'  => array( 'slug' => 'testcatsingle','with_front'=> false ),
);
register_taxonomy('testsingles_cpt_category', 'test', $args);
}
 
add_action('init', 'my_taxonomies_testsingles_cpt', 0);

?>