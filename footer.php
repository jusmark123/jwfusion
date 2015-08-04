<?php
/**
* The template for displaying the footer.
*
* Contains the closing of the id=main div and all content after
*
* @package JWFusion
* @since JWFusion 1.0
*/
?>
 
</div><!-- #main .site-main -->
<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="made-here">
    	<h4> ALL OF OUR PRODUCTS ARE PROUDLY MANUFACTURED IN THE USA</h4>
        <img src="<?php echo site_url(); ?>/wp-content/uploads/2015/04/Untitled-1.png" />
    </div>
    <div class="site-info">
		<?php wp_nav_menu (array ( 'theme_location' => 'footer_nav') ); ?> 
       	<div class="site-tagline">
            <p>&copy;2013 Canyonwerks, LLC. All Rights Reserved.</p>
            <p>A JwalkerDzines LLC Creation | <a style="text-shadow:none; text-decoration:underline;" href="http://www.jwalkerdzines.com">www.jwalkerdzines.com</a></p>
    	</div>
		
    </div><!-- .site-info -->
</footer><!-- #colophon .site-footer -->
</div><!-- #page .hfeed .site -->

<?php wp_footer(); ?>
 
</body>
</html>