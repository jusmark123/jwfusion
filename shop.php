<?php
/**
 *Template Name: Shop
 * The template for displaying gallery pag.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package JWFusion
 * @since JWFusion 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
  <?php while ( have_posts() ) : the_post(); ?>
  <?php the_content(); ?>
  <?php endwhile; // end of the loop. ?>
</div>
<!-- #primary .content-area -->
<?php get_footer();
