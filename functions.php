<?php
function twentyseventeen_child_enqueue_styles() {
    $parent_style = 'parent-style';
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
		// google maps
		wp_enqueue_script( 'google-maps', 'https://maps.googleapis.com/maps/api/js' );
		wp_enqueue_script( 'map', get_stylesheet_directory_uri() . '/map.js', array(), '1.0', true );

}
add_action( 'wp_enqueue_scripts', 'twentyseventeen_child_enqueue_styles' );
