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
	$link_IDs = get_post_meta($post->ID, "link_to", false);
	shuffle($link_IDs);
	if($link_IDs){ ?>
	<ul id="subpages">
		<?php foreach($link_IDs as $link_id){ 
		$p = get_post($link_id);
		?>

	<li class='subpage'>
		<a href="<?php echo get_permalink($p->ID); ?>">
			<?php
			if(has_post_thumbnail($p->ID)){
				echo get_the_post_thumbnail($p->ID,'thumbnail');
			}
			?>
			<h2><?php echo $p->post_title;?></h2>
		</a>

		<span class="excerpt">
		<?php if(has_excerpt($p->ID)){ echo get_the_excerpt($p->ID); }?>
		</span>
	</li> <!--.subpage-->
<?php
		} # foreach link
?>	</ul> <!--#subpages--> <?php	
	} # if link_IDs
} // end loop 
?>

</div><!--#page-->

<?php get_footer(); ?>
