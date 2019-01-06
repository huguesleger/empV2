<?php
/**
* This is the template that displays all of the <head> section and everything up until <div id="content">
*
* @package Emp
*/
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js" integrity="sha384-kW+oWsYx3YpxvjtZjFXqazFpA7UP/MbiY4jvs+RWZo2+N94PFZ36T6TFkc9O3qoB" crossorigin="anonymous"></script>
</head>

<body <?php body_class(); ?>>
  <div id="page" class="site">
    <?php
  	if ( is_front_page() || is_home() ) {
	do_action('emp_header');
	do_action('emp_after_header');
} else {
 do_action('emp_header');
 do_action('emp_after_header'); ?>
 <?php $post_thumb = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?>
 <?php if ( has_post_thumbnail() ) : ?>
 <header id ="header-page" class="header-page">
   <div class="header-page-content" style="background-image: url(<?php echo $post_thumb; ?>);"></div>
   </header>
 <?php else : ?>
   <header id ="header-page-no-img" class="header-page-no-img">
     <div class="header-page-content-no-img">
       <h1><?php the_title() ?></h1>
     </div>
     </header>
     <?php
  endif;
} ?>
  <div id="content" class="site-content">
