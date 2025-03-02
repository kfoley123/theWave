<?php

//adds boostrap styling 

function enqueue_bootstrap() {
    // Bootstrap CSS
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css', array(), '5.3.0');
    
    // Theme stylesheet (make sure this comes after Bootstrap for proper styling overrides)
    wp_enqueue_style('theme-style', get_stylesheet_uri(), array('bootstrap-css'), wp_get_theme()->get('Version'));
    
    // Bootstrap JS (Requires jQuery, but WP includes it by default)
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array(), '5.3.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_bootstrap');

//overwrite default category title that includes the word category: title name

function custom_category_title($title) {
    if (is_category()) {
        $title = single_cat_title('', false);
    }
    return $title;
}
add_filter('get_the_archive_title', 'custom_category_title');

// Theme setup
function the_wave_block_theme_setup() {
    // Register navigation menus
    register_nav_menus([
        'primary' => __('Primary Menu', 'the-wave-block'),
    ]);

    // Enable support for featured images
    add_theme_support('post-thumbnails');

    // Add support for editor styles
    add_theme_support('editor-styles');
    add_editor_style('style.css'); // Ensures editor matches front-end styles

    // Enable title tag support
    add_theme_support('title-tag');

    // Add support for responsive embeds
    add_theme_support('responsive-embeds');

    // Add support for block styles
    add_theme_support('wp-block-styles');

    // Add support for align-wide
    add_theme_support('align-wide');
}
add_action('after_setup_theme', 'the_wave_block_theme_setup');

