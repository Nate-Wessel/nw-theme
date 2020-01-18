<?php
/*
Template Name: Cover page
Description: cover for a section of (probably) gallery pages and subpages
*/

get_header();

// start loop
if(have_posts()){
	the_post();
?>
<div class="cover-page">

	<h1><?php the_title(); ?></h1>

	<?php the_post_thumbnail('cover',array('class'=>'cover-image')); ?>

	<div class="gallery">
	<?php if(get_the_content() != ''){ ?>
		<div class="gallery-item">
			<?php the_content(); ?>
		</div><!--.gallery-item-->
	<?php } ?>

<?php // we start by querying child pages and getting their images and stuff
	$pages = get_pages(array('parent' => $post->ID, 'hierarchical' => false, 'sort_column' => 'menu_order', 'sort_order' => 'DESC'));

	foreach($pages as $page){ 
	// here we're iterating through child pages until... ?>

		<div class="gallery-item">
			<a href="<?php echo $page->guid; ?>">
				<h3><?php echo $page->post_title; ?></h3>
				<?php echo get_the_post_thumbnail($page->ID,'third'); ?>
			</a>
		</div><!--.gallery-item-->

<?php } // we stop iterating through them here ?>

	</div><!--.gallery-->

<?php wp_reset_query(); //reset the query to what it was originally ?>

</div><!--.cover-page-->


<?php
} // end loop 
?>

<?php get_template_part( 'gallery', 'javascript' ); ?>

<?php get_footer(); ?>
