<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Cartridge Lit
 */

get_header(); ?>

<section class="post-featured">

  <?php $featured_query = new WP_Query( 'posts_per_page=15' );
  while ( $featured_query->have_posts() ) : $featured_query->the_post();
  $post_count = 'featured-'.($featured_query->current_post + 1) ?>

  <article class="<?php echo $post_count; ?>" >
    <a class="post-image" href="<?php the_permalink(); ?>" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ) ?>);"></a>
    <div class="post-meta">
      <h1>
        <a href="<?php the_permalink(); ?>">
          <?php the_title(); ?>
        </a>
      </h1>
      <h2><?php echo get_post_meta($post->ID, 'writer', true); ?></h2>
      <time datetime="<?php echo get_the_time( 'c' ); ?>"><?php echo get_the_date(); ?></time>
      <?php the_category(', '); ?>
    </div>
    <div class="post-excerpt">
      <?php the_excerpt(); ?>
    </div>
    <div class="post-mask"></div>
  </article>

  <!-- both chapbook announcements -->
  <?php if ( $featured_query->current_post == 1 ): ?>

  <article class="featured-chap-1" style="background-image: url('<?php $chap_path = get_template_directory_uri(); echo $chap_path."/assets/images/chapbooks/prepare-to-die/front_page_teaser.jpg"; ?>');">
    <div class="chap-top">
      <a href="<?php echo esc_url( home_url( '/prepare-to-die/' ) ); ?>">Read</a>
    </div>
    <div class="chap-bottom">
      <h1>
        <a href="<?php echo esc_url( home_url( '/prepare-to-die/' ) ); ?>">
          Prepare to Die
        </a>
      </h1>
      <h2>by Jess Jenkins</h2>
      <p>The first chapbook from <em>Cartridge Lit</em>. Get your fill of <em>Dark Souls</em> and then some.</p>
    </div>
  </article>

  <article class="featured-chap-2" style="background-image: url('<?php $chap_path = get_template_directory_uri(); echo $chap_path."/assets/images/chapbooks/an-object/front_page_teaser.jpg"; ?>');">
    <div class="chap-top">
      <a href="<?php echo esc_url( home_url( '/an-object-you-cannot-lose/' ) ); ?>">Preview</a>
    </div>
    <div class="chap-bottom">
      <h1>
        <a href="<?php echo esc_url( home_url( '/an-object-you-cannot-lose/' ) ); ?>">
          An Object You Cannot Lose
        </a>
      </h1>
      <h2>by Sam Martone</h2>
      <p>The second <em>Cartridge Lit</em> chapbook, arriving January 26, 2015.</p>
    </div>
  </article>

  <!-- end chapbook announcements -->
  <?php endif; ?>

  <?php endwhile; ?>

</section>
<!-- FEATURED -->

<?php get_footer(); ?>
