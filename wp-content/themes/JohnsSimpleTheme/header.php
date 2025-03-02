<!DOCTYPE html>
<html <?php language_attributes(); ?>

<head>
   <title><?php bloginfo('name'); ?> &raquo; <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
   <meta charset="<?php bloginfo( 'charset' ); ?>">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
<!--    Standard WP head below -->
   <?php wp_head(); ?>
 </head>
 
  <body <?php body_class(); ?>>
  
   <header class="my-logo">
      <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/Images/logo.jpg" alt="Site Logo" width="50px" height="50px"></a></h1>
   </header>

 <?php wp_nav_menu( array( 'header-menu' => 'header-menu' ) ); ?>