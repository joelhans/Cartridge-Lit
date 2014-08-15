<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Cartridge Lit
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<link rel="icon" type="image/png" href="<?php bloginfo( 'template_directory' ); ?>/assets/images/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="<?php bloginfo( 'template_directory' ); ?>/assets/images/favicon-16x16.png" sizes="16x16">
<link rel="icon" type="image/png" href="<?php bloginfo( 'template_directory' ); ?>/assets/images/favicon-32x32.png" sizes="32x32">

<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/assets/stylesheets/build/style.min.css" type="text/css" media="all">
<link href="http://fonts.googleapis.com/css?family=Ubuntu:500,500italic,400italic|Vollkorn:400italic,400,700|Roboto+Slab" rel="stylesheet" type="text/css">

<script src="<?php bloginfo( 'template_directory' ); ?>/assets/javascripts/build/script.min.js"></script>

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<header id="header" class="site-header" role="banner">
  <div class="container">

    <div class="title">

      <img class="header-logo" src="<?php bloginfo( 'template_directory' ); ?>/assets/images/cartridge_lit_logo.png" />
      <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

    </div>

    <!--<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>-->

  </div>
</header>

<div class="nav">

  <nav role="navigation">

    <div class="nav-left">

      <!-- NAV ITEM | NAV FICTION -->
      <div class="nav-item nav-fiction">

        <a href="<?php echo esc_url( get_category_link( get_cat_ID( 'Fiction' ) ) ) ?>">Fiction</a>

        <!-- NAV DROPDOWN FICTION -->
        <div class="nav-dropdown-fiction">

          <!-- DROPDOWN FEATURED (FICTION) -->
          <section class="dropdown-featured" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ) ?>);">
            <?php
              $sticky = get_option('sticky_posts');
              $args = array( 'posts_per_page' => 1, 'category_name' => 'fiction', 'post__in' => $sticky, 'ignore_sticky_posts' => 1 );
              query_posts($args);
              if ( have_posts() ) : while (have_posts()) : the_post();
            ?>

            <a href="<?php the_permalink(); ?>" class="featured-full-link"></a>

            <h1><?php the_title(); ?></h1>

          <?php endwhile; wp_reset_postdata(); endif; ?>

          </section>
          <!-- /DROPDOWN FEATURED (FICTION) -->

          <!-- DROPDOWN RECENT (FICTION) -->
          <section class="dropdown-recent">
            <?php
              $args = array( 'posts_per_page' => 3, 'category_name' => 'fiction', 'orderby' => 'date', 'order' => 'DESC' );
              query_posts($args);
              if ( have_posts() ) : while (have_posts()) : the_post();
            ?>


            <h1><?php the_title(); ?></h1>

            <?php endwhile; wp_reset_postdata(); endif; ?>
          </section>
          <!-- /DROPDOWN RECENT (FICTION) -->

        </div>
        <!-- /NAV DROPDOWN FICTION -->

      </div>
      <!-- /NAV ITEM | NAV FICTION -->

      <div class="nav-item nav-poetry">

        <a href="<?php echo esc_url( get_category_link( get_cat_ID( 'Poetry' ) ) ) ?>">Poetry</a>

        <div class="nav-dropdown-poetry">
          <?php
            $sticky = get_option('sticky_posts');
            $args = array(
              'posts_per_page' => 1,
              'category_name' => 'poetry',
              'post__in' => $sticky,
              'ignore_sticky_posts' => 1
              );
            query_posts($args);
          ?>
          <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
          <h1><?php the_title(); ?></h1>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
          <?php endif; ?>

          <?php
            $args = array(
              'posts_per_page' => 3,
              'category_name' => 'poetry'
              );
            query_posts($args);
          ?>
          <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
          <h1><?php the_title(); ?></h1>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
          <?php endif; ?>
        </div>

      </div>

      <div class="nav-item nav-non-fiction">

        <a href="<?php echo esc_url( get_category_link( get_cat_ID( 'Non-Fiction' ) ) ) ?>">Non-fiction</a>

        <div class="nav-dropdown-non-fiction">
          <?php
            $sticky = get_option('sticky_posts');
            $args = array(
              'posts_per_page' => 1,
              'category_name' => 'non-fiction',
              'post__in' => $sticky,
              'ignore_sticky_posts' => 1
              );
            query_posts($args);
          ?>
          <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
          <h1><?php the_title(); ?></h1>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
          <?php endif; ?>

          <?php
            $args = array(
              'posts_per_page' => 3,
              'category_name' => 'non-fiction'
              );
            query_posts($args);
          ?>
          <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
          <h1><?php the_title(); ?></h1>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
          <?php endif; ?>
        </div>

      </div>

      <!--
      <a href="<?php echo esc_url( home_url( '/chapbooks/' ) ); ?>">Chapbooks</a>
      <a href="<?php echo esc_url( home_url( '/the-airship/' ) ); ?>">The Airship (blog)</a> -->
    </div>

    <div class="nav-right">
      <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" >About</a>
      <a href="<?php echo esc_url( home_url( '/submissions/' ) ); ?>" rel="home">Submissions</a>
      <a href="<?php echo esc_url( home_url( '/contributors/' ) ); ?>" rel="home">Contributors</a>
      <a href="<?php echo esc_url( home_url( '/masthead/' ) ); ?>">Masthead</a>
    </div>

  </nav>

</div>

<div id="page" class="hfeed site">
