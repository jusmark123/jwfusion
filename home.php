<?php 

/**
 *Template Name: Home
 *Theme: JWFusion Responsive Wordpress Theme
 */
 
 get_header();
 
 $product_pages = array(
	'rappel-devices',
	'rope-bags',
	'butt-protector'
 );
 
 function get_cw_cats() {
	$terms = get_terms('product_cat');
	
	return $terms;
 }
 
 
 ?>

<div id="primary" class="content-area">
  <div class="frame-left"> <?php echo do_shortcode('[wowslider id="7"]'); ?> </div>
  <div class="frame-right"> <img id="no-blur" src="<?php echo site_url(); ?>/wp-content/uploads/2013/11/sidebyside.gif" alt="sidebyside" width="2050" height="1526" class="aligncenter size-full wp-image-721" /> 
    <div class="controls">
      <?php foreach( get_cw_cats() as $key => $cat ) { ?>
      <a href="<?php echo site_url(); ?>/product-category/<?php echo $cat->slug;?>" class="home-button" id="<?php echo $cat->slug; ?>"><?php echo $cat->name;?></a>
      <?php }; ?>
    </div>
  </div>
</div>
<script type="text/javascript">
	(function($) {
		$(document).ready(function(e) {
            $('.site-main').css('overflow', 'visible');
        });
	})(jQuery);
</script>
<?php
 get_footer();