<?php
get_header();

// start loop
if(have_posts()){
	the_post();
?>
<div id="page">

<?php if(count(get_post_ancestors($post->ID))>0){ 
// don't display titles for top-level pages, which should be in the menu ?>
	<h1 class="page-title"><?php the_title(); ?></h1>
<?php } ?>

<?php 
	the_content(); 

	# list child pages if any
	$args = array(
		'post_parent'=>$post->ID,
		'orderby'=>'menu_order',
		'order'=>'ASC',
		'post_status'=>'publish'
	);
	$kids = get_children($args);
	
	if($kids){ ?>
	<ul id="subpages">
		<?php foreach($kids as $child){ ?>
		
	<li class='subpage'>
		<a href="<?php echo get_permalink($child->ID); ?>">
			<?php
			if(has_post_thumbnail($child->ID)){
				echo get_the_post_thumbnail($child->ID,'thumbnail');
			}
			?>
			<h2><?php echo $child->post_title;?></h2>
		</a>
		
		<span class="excerpt">
		<?php if(has_excerpt($child->ID)){ echo get_the_excerpt($child->ID); }?>
		</span>
	</li> <!--.subpage-->
<?php
		} # foreach subpage
?>	</ul> <!--#subpages--> <?php	
	} # if subpages
} // end loop 
?>

</div><!--#page-->

<?php get_footer(); ?>