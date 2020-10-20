<?php

if( function_exists('acf_add_options_page') ) {
    // documentation of the function at: https://www.advancedcustomfields.com/resources/acf_add_options_page/
    $global_options = acf_add_options_page(array(
        'page_title' => __('Global Options'),
//        'menu_title' => __('My Options'),
//        'menu_slug' => 'my-options',
//        'capability' => 'edit_posts',
//        'position' => '',
//        'parent_slug' => 'my-parent-page',
//        'icon_url' => '',
        'redirect' => false,
//        'post_id' => 'options',
//        'autoload' => false,
//        'update_button' => __('Update', 'acf'),
//        'updated_message' => __("Options Updated", 'acf'),
    ));

//     $header = acf_add_options_page(array(
//         'page_title' => __('Header'),
// //        'menu_title' => __('Header'),
// //        'menu_slug' => 'my-options',
// //        'capability' => 'edit_posts',
// //        'position' => '',
//         'parent_slug' => $global_options['menu_slug'],
// //        'icon_url' => '',
// //        'redirect' => true,
// //        'post_id' => 'options',
// //        'autoload' => false,
// //        'update_button' => __('Update', 'acf'),
// //        'updated_message' => __("Options Updated", 'acf'),
//     ));

    $footer = acf_add_options_page(array(
        'page_title' => __('Footer'),
//        'menu_title' => __('Header'),
//        'menu_slug' => 'my-options',
//        'capability' => 'edit_posts',
//        'position' => '',
        'parent_slug' => $global_options['menu_slug'],
//        'icon_url' => '',
//        'redirect' => true,
//        'post_id' => 'options',
//        'autoload' => false,
//        'update_button' => __('Update', 'acf'),
//        'updated_message' => __("Options Updated", 'acf'),
    ));

}