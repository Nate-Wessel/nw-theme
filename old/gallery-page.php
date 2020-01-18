<?php
/*
Template Name: Gallery
*/

get_header();

// start loop
if(have_posts()){
	the_post();
?>
<div class="gallery">

	<h1 class="gallery-item"><?php the_title(); ?></h1>

<?php // we start by querying child pages and getting their images and stuff

	$pages = get_pages(array('parent' => $post->ID, 'hierarchical' => false, 'sort_column' => 'menu_order', 'sort_order' => 'DESC'));

	foreach($pages as $page){ 
	// here we're iterating through child pages until... ?>

		<div class="gallery-item has-project-page">
			<a href="<?php echo get_page_link($page->ID); ?>" title="">
				<h3><?php echo $page->post_title; ?></h3> 
				<?php echo get_the_post_thumbnail($page->ID,'third'); ?>
			</a>
		</div><!--.gallery-item-->

<?php } // we stop iterating through them here ?>

<?php wp_reset_query(); //reset the query to what it was originally ?>

	<div class="post-content">

<!-- print the post content which should only be a gallery or paragraph with class=gallery-item-->
	<?php the_content(); ?>

	</div><!--.post-content-->

</div><!--#gallery-->

<?php } // end loop ?>

<?php get_template_part( 'gallery', 'javascript' ); ?>

<?php /*print footer*/ get_footer(); ?>
