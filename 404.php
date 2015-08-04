<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package JWFusion
 * @since JWFusion 1.0
 */
 
get_header(); ?>

<div id="primary" class="content-area">
  <article id="post-0" class="post error404 not-found">
    <header class="entry-header">
      <h1 class="entry-title">
        <?php _e( 'Oops! That page can&rsquo;t be found.', 'jwfusion' ); ?>
      </h1>
    </header>
    <!-- .entry-header -->
    
    <div class="entry-content">
      <p>
        <?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'jwfusion' ); ?>
      </p>
      <?php get_search_form(); ?>
    </div>
    <!-- .entry-content --> 
  </article>
  <!-- #post-0 .post .error404 .not-found --> 
  
</div>
<!-- #primary .content-area -->

<?php get_footer(); ?>
