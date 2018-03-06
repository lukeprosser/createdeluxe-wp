<?php

function createdeluxe_resources() {

    wp_enqueue_style('style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'createdeluxe_resources');


// Get top ancestor
function get_top_ancestor_id() {

    // make $post variable available from within function
    global $post;

    // if page has parent
    if ($post->post_parent) {
        // get id of top page
        $ancestors = array_reverse(get_post_ancestors($post->ID));
        // return first value from array of all ancestors
        return $ancestors[0];
    }
    // otherwise return id of parent page
    return $post->ID;

}

// Does page have children?
function has_children() {
    
    global $post;

    // $pages = get any pages that are a child of the current page
    $pages = get_pages('child_of=' . $post->ID);
    // calculate how many items in array
    return count($pages);

}

// Customise excerpt word count length
function custom_excerpt_length() {
    return 25;
}

add_filter('excerpt_length', 'custom_excerpt_length');


// Theme setup
function createdeluxe_setup() {

    // Navigation menus
    register_nav_menus(array(
        'primary' => __( 'Primary Menu'),
        'footer' => __( 'Footer Menu'),
    ));

    // Add featured image support
    add_theme_support('post-thumbnails');
    add_image_size('small-thumbnail', 180, 120, true);
    add_image_size('banner-image', 920, 210, array('left', 'top'));

    // Add post format support
    add_theme_support('post-formats', array('aside', 'gallery', 'link'));
}

add_action('after_setup_theme', 'createdeluxe_setup');


// Add widget locations
function cdWidgetsInit() {

    register_sidebar( array(
        'name' => 'Sidebar',
        'id' => 'sidebar1',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>'
    ));

    register_sidebar( array(
        'name' => 'Footer Area 1',
        'id' => 'footer1',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>'
    ));

    register_sidebar( array(
        'name' => 'Footer Area 2',
        'id' => 'footer2',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>'
    ));

    register_sidebar( array(
        'name' => 'Footer Area 3',
        'id' => 'footer3',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>'
    ));

    register_sidebar( array(
        'name' => 'Footer Area 4',
        'id' => 'footer4',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>'
    ));

}

add_action('widgets_init', 'cdWidgetsInit');