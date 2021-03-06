<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package JWFusion
 * @since JWFusion 1.0
 */
?>
 
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content">
        <?php the_content(); ?>
        <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'jwfusion' ), 'after' => '</div>' ) ); ?>
        <?php edit_post_link( __( 'Edit', 'jwfusion' ), '<span class="edit-link">', '</span>' ); ?>
    </div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->