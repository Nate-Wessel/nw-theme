<?php get_header(); ?>
<!--search.php-->
<?php if ( have_posts() ) : ?>
<?php /* Start the Loop */ ?>
<div id="search">
<?php 
	while ( have_posts() ) : the_post();
?>
	<a href="<?php the_permalink() ?>" title="Permalink to <?php the_title(); ?>">
		<div class="result">
			<?php
				if(has_post_thumbnail()){
					$args = array('class' => 'thumbnail');
					the_post_thumbnail('thumbnail', $args);
				} 
			?>
			<h2><?php the_title(); ?></h2>
			<span class="date"><?php the_date(); ?></span>

		</div><!--.result-->
	</a>
<?php
	endwhile;
?>

<h3>Don't see what you're looking for?</h3>
<p>Take a deep breath and go outside. <small>Or try searching:</small></p>

<?php get_search_form(); ?>

<?php else : ?>
	<div class="result">
		<h2>Nope.</h2>
		<h6>Try again?</h6>
		<?php get_search_form(); ?>
	</div><!--.result-->
<?php endif; ?>

</div><!--#search-->

<?php get_footer(); ?>
