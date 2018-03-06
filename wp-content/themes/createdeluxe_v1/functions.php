<?php

// Link CSS and JavaScript
function createdeluxe_resources() {
  wp_enqueue_style('style', get_stylesheet_uri());
  wp_enqueue_script('main', trailingslashit(get_template_directory_uri()) . 'js/main.js', '', '1.1', true);
  if ( is_front_page() || is_page( 'contact') ) {
    wp_enqueue_script('parallax', trailingslashit(get_template_directory_uri()) . 'js/parallax.js', '', '1.1', true);
  }
}
add_action('wp_enqueue_scripts', 'createdeluxe_resources');

// Link Google Fonts
function custom_add_google_fonts() {
  wp_enqueue_style( 'custom-google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:400,500,700', false );
 }
 add_action( 'wp_enqueue_scripts', 'custom_add_google_fonts' );

// Link Font Awesome
function fa_enqueue_script() {
  wp_enqueue_script('fontawesome', trailingslashit(get_template_directory_uri()) .  'js/fontawesome-all.js', false);
}
add_action('wp_enqueue_scripts', 'fa_enqueue_script');

// Theme setup
function createdeluxe_setup() {

    // Navigation menus
    register_nav_menus(array(
        'primary' => __( 'Primary Menu'),
        'footer' => __( 'Footer Menu'),
    ));

    // Add featured image support
    add_theme_support('post-thumbnails');
    add_image_size('small-thumbnail', 680, 9999);
    add_image_size('banner-image', 920, 210, array('center', 'top'));

    // Add post format support
    add_theme_support('post-formats', array('aside', 'gallery', 'link'));
}
add_action('after_setup_theme', 'createdeluxe_setup');


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

// excerpt word count length
function custom_excerpt_length() {
    return 50;
}
add_filter('excerpt_length', 'custom_excerpt_length');

// Add widget locations
function cdWidgetsInit() {

    register_sidebar( array(
        'name' => 'Sidebar',
        'id' => 'sidebar1',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));

    register_sidebar( array(
        'name' => 'Footer Area 1',
        'id' => 'footer1',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));

}
add_action('widgets_init', 'cdWidgetsInit');
