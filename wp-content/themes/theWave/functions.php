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


//registers header to my menus 

function register_my_menus() {
    register_nav_menus(array(
        'header-menu' => __('Header Menu'),
    ));
}
add_action('after_setup_theme', 'register_my_menus');


function mytheme_setup() {
    add_theme_support('post-thumbnails'); // Enable featured images
}
add_action('after_setup_theme', 'mytheme_setup');


//allows wordpress to use bootstraps nav dropdown functionalities 
//not really using this for this nav so can probs remove it 
class Bootstrap_NavWalker extends Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '<ul class="dropdown-menu">';
    }

    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        
        if ( in_array('menu-item-has-children', $classes) ) {
            $class_names .= ' dropdown';
        }

        $output .= '<li class="nav-item ' . esc_attr( $class_names ) . '">';

        $attributes  = ' class="nav-link';
        if ( in_array('menu-item-has-children', $classes) ) {
            $attributes .= ' dropdown-toggle" data-bs-toggle="dropdown"';
        } else {
            $attributes .= '"';
        }

        $attributes .= ' href="' . esc_attr( $item->url ) . '"';
        $output .= '<a' . $attributes . '>';
        $output .= apply_filters( 'the_title', $item->title, $item->ID );
        $output .= '</a>';
    }

    function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= '</li>';
    }

    function end_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '</ul>';
    }
}
