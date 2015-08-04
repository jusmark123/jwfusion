<?php
/**

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

get_header(); 
global $woocommerce?>

    <div id="primary" class="content-area"></div>
     <?php /* if( is_shop() ) {
		add_action('woocommerce_before_shop_loop','add_left_frame', 5 );
		add_action('woocommerce_after_shop_loop', 'add_right_frame', 5 );
		add_action('woocommerce_after_shop_loop', 'close_right_frame', 15 );
	  } */?>
  
    
        <?php while ( have_posts() ) : the_post(); ?>
        
            <?php the_content(); ?>
            
        <?php endwhile; // end of the loop. ?>
        
    </div><!-- #primary .content-area -->
    
<?php get_footer();
