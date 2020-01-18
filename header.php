<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-type" content="<?php bloginfo('html_type'); ?>">
		<title><?php bloginfo('name'); ?></title>
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url')?>" >
		<meta name="description" content="Cartography and data visualisation">
		<meta name="author" content="Nate Wessel">
		<meta id="meta" name="viewport" content="width=device-width; initial-scale=1.0" />
		<?php wp_head(); ?>
	</head>
<body>

<nav>
<p id='site-title'><?php bloginfo('name');?></p>
<?php 
# print the menu
$nav_args = array(
	'container' => '',
	'class'     => ''
);
wp_nav_menu($nav_args); 
// insert an extra nav link on pages that have a parent
if($post->post_parent) { 
	$parent_link = get_permalink($post->post_parent); ?>
<a href="<?php echo $parent_link; ?>" title="up a page" id='parent-link'></a>
<?php } ?>
</nav>






