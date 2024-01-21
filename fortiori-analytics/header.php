<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <title>Document</title> -->
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php
  $websiteLogoImgUrl = get_template_directory_uri() . '/images/site-logo.png';
  $contactNumber = "123-456-7890";
  ?>

  <header>
    <!-- DESKTOP HEADER -->
    <div class="header-desktop">
      <div class="header-desktop__logo">
        <a href="<?php echo site_url(); ?>">
          <img src="<?php echo $websiteLogoImgUrl; ?>" alt="<?php echo get_bloginfo('name'); ?>">
        </a>
      </div>
      <nav class="header-desktop__navigation">
        <?php
        wp_nav_menu(array(
          'theme_location' => 'header-menu-location',
        ));
        ?>
      </nav>
      <div class="header-desktop__contact">
        <button><a href="tel:+1-<?php echo $contactNumber; ?>" class="button"><i class="fa-solid fa-phone"></i> (+1) <?php echo $contactNumber; ?></a></button>
      </div>
    </div>

    <!-- MOBILE HEADER -->
    <div class="header-mobile">
      <div class="header-mobile__bar">
        <div class="header-mobile__logo">
          <a href="<?php echo site_url(); ?>">
            <img src="<?php echo $websiteLogoImgUrl; ?>" alt="<?php echo get_bloginfo('name'); ?>">
          </a>
        </div>
        <div class="header-mobile__menu">
          <button class="open" title="open">
            <i class="fa-solid fa-bars"></i>
          </button>
          <button class="close" title="close">
            <i class="fa-solid fa-xmark"></i>
          </button>
        </div>
      </div>
      <div class="header-mobile__content hidden">
        <nav class="header-mobile__navigation">
          <?php
          wp_nav_menu(array(
            'theme_location' => 'header-menu-location',
          ));
          ?>
        </nav>
        <div class="header-mobile__contact">
          <button><a href="tel:+1-<?php echo $contactNumber; ?>" class="button"><i class="fa-solid fa-phone"></i> (+1) <?php echo $contactNumber; ?></a></button>
        </div>
      </div>
    </div>
  </header>

  <main>