<?php
/**
 * The main template file.
 *
 * homepage file for JWFusion Responsive Wordpress Theme
 *
 * @package JWFusion
 * @since JWFusion 1.0
 */ 
get_header(); ?>

<div id="primary" class="content-area">
		<?php if ( have_posts() )  : ?>
        	
        	<?php while ( have_posts() ) : the_post(); ?>
        	
			<?php endwhile; ?>  

        <?php endif; ?>
</div><!-- #primary .content-area -->

<?php get_footer();