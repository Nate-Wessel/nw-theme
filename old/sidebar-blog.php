<div class='sidebar'>
	<h3>Old Posts</h3>
	<ul>
		<?php 
			$args = array(
				'type'        => 'yearly',
				'show_post_count' => true,
				'echo'            => true,
				'order'           => 'DESC'
			);
			wp_get_archives($args); 
		?>
	</ul>
	<h3>Categories</h3>
	<ul>
		<?php 
			$args = array(
				'show_count' => true,
				'echo'       => true,
				'hide-empty' => true,
				'title_li'   => '',
				'orderby'    => 'count',
				'order'      => 'desc'
			);
			wp_list_categories($args); 
		?>
	</ul>
	<?php get_search_form(); ?>
	<?php //dynamic_sidebar('blog-sidebar'); ?>
</div>
