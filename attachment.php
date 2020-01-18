<?php
get_header();

// start loop
if(have_posts()){
	the_post();
?>
<div id="attachment">
	<h1><?php the_title();?></h1>

<?php // echo an image tag with link or just a link if not image
if( wp_attachment_is_image($post_id) ){ ?>
	<img src="<?php echo wp_get_attachment_image_src($post_id, 'large')[0];?>" class="attachment">
<?php }else{ ?>
	<a src="<?php echo wp_get_attachment_link($post_id,$permalink=true);?>"></a>
<?php } ?>

<?php the_content(); ?>

<?php } // end loop ?>

</div><!--#attachment-->

<?php get_footer(); ?>
