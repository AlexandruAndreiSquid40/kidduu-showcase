<?php

function fm_register_my_menus() {
    register_nav_menus(
            array(
                'header-menu' => __('Header Menu'),
                'footer-menu' => __('Footer Menu'),
            )
    );
}

add_action('init', 'fm_register_my_menus');

function fm_init_sidebars() {
    register_sidebar(array(
        'name' => 'sidebar',
        'id' => 'sidebar',
        'before_widget' => '<div class="sidebar-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h1>',
        'after_title' => '</h1>',
    ));
}

add_action('init', 'fm_init_sidebars');

add_theme_support('post-thumbnails');
if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    //set_post_thumbnail_size( 150, 150 );
}

if (function_exists('add_image_size')) {
    // add_image_size('test', 960, 419, true);
    add_image_size('pages_select', 327, 162, true);
    add_image_size('latest_news_home', 443, 248, true);
    add_image_size('events_home', 402, 200, true);
    add_image_size('banner_home', 1920, 457, true);
    add_image_size('banner_default', 1920, 457, true);
}

add_action('wp_enqueue_scripts', 'trigger_custom_scripts');

function trigger_custom_scripts() {
    wp_enqueue_script('jquery');

    wp_register_script('jquery_modernizr', get_template_directory_uri() . '/js/modernizr.custom.js', array('jquery'));
    wp_enqueue_script('jquery_modernizr');

    wp_register_script('jquery_custom', get_template_directory_uri() . '/js/custom.js', array('jquery'));
    wp_enqueue_script('jquery_custom');

    wp_register_style('css_wordpress', get_template_directory_uri() . '/css/wordpress.css');
    wp_enqueue_style('css_wordpress');

    /*SLICK SLIDER*/
    wp_register_style('css_slick', get_template_directory_uri() . '/addon/slick/slick.css');
    wp_enqueue_style('css_slick');

    wp_register_style('css_slick_theme', get_template_directory_uri() . '/addon/slick/slick-theme.css');
    wp_enqueue_style('css_slick_theme');

    wp_register_script('jquery_slick', get_template_directory_uri() . '/addon/slick/slick.js', array('jquery'));
    wp_enqueue_script('jquery_slick');

    /*CUSTOM FONTS*/
    wp_register_style('css_fonts', get_template_directory_uri() . '/fonts/stylesheet.css');
    wp_enqueue_style('css_fonts');
}






add_filter('wp_image_editors', 'change_graphic_lib');
function change_graphic_lib($array) {
    return array('WP_Image_Editor_GD', 'WP_Image_Editor_Imagick');
}
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');
/* end image upload plroblem solver */

 add_post_type_support( 'page', 'excerpt' );
 add_post_type_support( 'events', 'excerpt' );




function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
}

// include_once 'cpt/test.php';
include_once 'cpt/cpt_events.php';
include 'helper/helper.php';
include 'inc/breadcrumbs.php';
include 'inc/widget-class.php';
include 'inc/widget-links/widget-links.php';
include 'inc/options.php';
include 'inc/options-acf.php';
include 'inc/comment.php';