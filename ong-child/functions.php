<?php
function my_theme_enqueue_styles() {

    $parent_style = 'ong';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/assets/css/style.min.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}

function my_theme_enqueue_scripts() {
	wp_register_script( 'main-script', get_stylesheet_directory_uri() . '/assets/js/script.min.js', array(), '1.0.0' );
	wp_enqueue_script( 'main-script' );
}


add_action( 'get_footer', 'my_theme_enqueue_scripts' );
add_action( 'get_footer', 'my_theme_enqueue_styles' );
add_action( 'wp_default_scripts', 'move_jquery_into_footer' );

//function for move jquery wordpress to footer
function move_jquery_into_footer( $wp_scripts ) {

    if( is_admin() ) {
        return;
    }

    $wp_scripts->add_data( 'jquery', 'group', 1 );
    $wp_scripts->add_data( 'jquery-core', 'group', 1 );
    $wp_scripts->add_data( 'jquery-migrate', 'group', 1 );
}
