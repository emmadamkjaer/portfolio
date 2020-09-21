<?php

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

# This function is linking to parent theme and finally to child theme
function my_theme_enqueue_styles() {
    $parenthandle = 'parent-style'; // This is 'Hamilton-style' for the Twenty Hamilton theme theme.
    $theme = wp_get_theme();
   
    # Linking to my mother theme (hamiltion)
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
        array(),  // Array = kæde a variabler. If the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    
     # Linking to my child theme (hamiltion-child)
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') // this only works if you have Version in the style header
    );
}
