<?php
get_header();

// start loop
if(have_posts()){
	the_post();
?>
<div id="page">

<h1 class="page-title"><?php the_title(); ?></h1>

<?php 
	the_content(); 

	# link to any related pages/projects
	$kids = get_post_meta($post->ID, "link_to", false);
	
	if($kids){ ?>
	<ul id="subpages">
		<?php foreach($kids as $child_id){ 
		$child = get_post($child_id);
		?>
		
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
