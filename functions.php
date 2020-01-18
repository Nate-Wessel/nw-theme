<?php 
// random stuff
add_editor_style();
add_theme_support('menus');


// remove unecessary links from wp_head()
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');

// galleries and images
add_theme_support('post-thumbnails');
add_image_size( 'third', 275, 4000, false );
add_image_size( 'cover', 800, 500, true );
add_image_size( 'blog', 480, 1000, false );

// Add the menu
register_nav_menu( 'main', "It's the only menu" );

add_post_type_support( 'page', 'excerpt' );

?>
