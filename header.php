<?php
/**
 * Default Header of JWFusion Responsive Wordpress Theme
 *
 * @package JWFusion
 * @since JWFusion 1.0
 */
 ?>
<!DOCTYPE html>
<!--[if IE 8]><html id="ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width" />
<title>
<?php
	if( is_page( 'products' ) ) {
		echo 'Shop | Quality Canyoneering Rope Bags';
	} else {
		global $page, $paged;  wp_title( '|', true, 'right' );
	}
	
	if ( is_user_logged_in() ) {
	  $current_user = wp_get_current_user();
	  $userName = get_user_meta( $current_user->ID, 'first_name', true);
	}
?>
</title>
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/frontend/favicon.png" />
<link rel="profile" href="//gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/scripts/frontend/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); 
global $woocommerce; ?>
<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
<header id="masthead" class="site-header" role="banner">
  <hgroup>
    <div class="large">
      <h1><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"> <img class="logo-large" src="<?php echo get_template_directory_uri(); ?>/images/frontend/header_logo.png" /> </a></h1>
      <nav role="top_navigation" class="site-top-navigation top-navigation">
<?php	if ( $userName ) { ?>
            <div class="welcome">Welcome <?php echo $userName;?></div><?php
        }
        wp_nav_menu( array( 'theme_location'  => 'top_nav' ) ); ?>
      </nav>
      <h2 class="site_description">
        <?php bloginfo( 'description' ); ?>
      </h2>
      <div class="contact">
        <h2 class="info">Order Online or Call Today</h2>
        <h2 class="phone">702-649-1077</h2>
      </div>
      <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" /> 
      <nav role="navigation" class="site-navigation main-navigation">
    	<?php wp_nav_menu( array( 'theme_location' => 'main_nav' ) ); ?>
  	  </nav>
    </div>
    <div class="mobile"> <a href="<?php echo home_url( '/' );?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="mobile-home"> <img class="logo-m" src="<?php echo get_template_directory_uri(); ?>/images/frontend/header_logo_small.gif" /> </a>
      <?php wp_nav_menu( array( 'theme_location' => 'mobile_top_nav' ) ); ?>
     <div class="site_description_m">
      <h4><?php bloginfo( 'description' ); ?> <br> Call Us Today 702-649-1077</h4>
     </div> 
     <?php if ( $userName ) { ?>
    	 <div class="mobile-welcome">
      		<h4>Welcome <?php echo $userName;?></h4>
         </div>
     <?php } ?>
      <li class="trigger mobile"><img class="menu-trigger" src="<?php echo site_url() ?>/wp-content/uploads/2015/05/Menu1.png" /></li>
      <nav role="navigation" class="mobile-navigation mobile">
        <?php wp_nav_menu( array( 'theme_location' => 'mobile_nav') ); ?>
      </nav>
  	</div>
    <!-- .site-navigation .main-navigation -->
    <div class="storenotice" style="text-align: center; background:#FFFFFF;"></div>  
  </hgroup>
  
</header>
<!-- #masthead .site-header -->
<div id="main" class="site-main">
