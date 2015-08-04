<?php
/**
 * The Template for displaying all single posts.
 *
 * @package JWFusion
 * @since JWFusion 1.0
 */
 
get_header(); ?>
 
        <div id="primary" class="content-area">
 
            <?php while ( have_posts() ) : the_post(); ?>
 
 
                <?php get_template_part( 'content', 'single' ); ?>
 
 
            <?php endwhile; // end of the loop. ?>
            
        </div><!-- #primary .content-area -->
        
<?php get_footer(); ?>