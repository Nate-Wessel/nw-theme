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

function adding_custom_meta_boxes( $post_type, $post ) {
	add_meta_box(
		"nw_related_posts",      # ID
		"Related Posts",         # metabox title
		"nw_related_posts_meta", # callback function to display box contents
		"page",                  # post type effected
		"side", "low",           # location, priority
		null                     # callback args
	);
}
add_action( 'add_meta_boxes', 'adding_custom_meta_boxes', 10, 2 );

function nw_related_posts_meta(){
	# posts/pages to select from metabox 
	$posts = get_posts(array( 
		'post_type' => ['page','cv_project'], 
		'numberposts' => -1 ,# return all
		'orderby' => 'title',
		'order' => 'ASC'
	));
	$selected_posts = get_post_meta($object->ID, "link_to", false);
	?>
	<div>
		<p>Select related posts to display below page content:</p>
		<select name="link_to[]" size='10' multiple>
		<?php foreach($posts as $post){
			$selected = in_array(strval($post->ID),$selected_posts) ? 'selected' : '';
			echo "\t\t\t<option value='$post->ID' $selected>$post->post_title</option>\n";
		}?>
		</select>
	</div>
<?php
}

?>
