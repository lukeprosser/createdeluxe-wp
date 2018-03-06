<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <!-- header -->
  <header class='shrink'>

    <!-- container -->
    <div class="container">

      <!-- header-grid -->
      <div class="header-grid">
        <!-- brand -->
        <div class="brand">
          <h1><a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/img/cd-logo.png" /></a></h1>
        </div><!-- /brand -->
        <!-- site-nav -->
        <nav class="site-nav">
          <div class="nav-menu">
            <span class="close-btn"><i class="fas fa-times fa-lg"></i></span>
            <?php
              // connect primary menu
              $args = array(
                  'theme_location' => 'primary'
              );
              // display primary menu
              wp_nav_menu( $args );
            ?>
          </div>
          <span class="mobile-btn"><i class="fas fa-bars fa-lg"></i></span>
          <div class="overlay"></div>
        </nav><!-- /site-nav -->
      </div><!-- /header-grid -->

    </div><!-- /container -->

  </header><!-- /header -->
