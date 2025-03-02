<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
   <meta charset="<?php bloginfo('charset'); ?>">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?php echo wp_get_document_title(); ?></title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
   <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="site-header bg-dark-gray py-1 mb-5">
   <div class="container">
   <nav class="navbar navbar-expand-lg bg-dark-gray">
   <div class="container">
      <a class="navbar-brand fw-light me-5 fs-2" href="<?php echo esc_url(home_url('/')); ?>">The Wave</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
         <?php
         wp_nav_menu(array(
            'theme_location' => 'header-menu',
            'container'      => false,
            'menu_class'     => 'navbar-nav fs-5 text-uppercase',
            'fallback_cb'    => '__return_false',
            'depth'          => 2,
            'walker'         => new Bootstrap_NavWalker(), 
            'item_spacing'   => 'preserve', 
         ));
         ?>
      </div>
   </div>
</nav>

   </div>
</header>
