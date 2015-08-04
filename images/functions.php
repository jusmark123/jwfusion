<?php 
/**
 * Jwfusion functions and definitions
 *
 *
 #@package JWFusion
 *since JWFusion 1.0
 */
 
//Check if content width is set
if(!isset($content_width)) 
	$content_width = 1440; /* pixels */

if( ! function_exists( 'jwf_setup' ) ) {

	function jwfusion_setup() {
		//Custom template tags
		require( get_template_directory() . '/inc/template-tags.php' );
	
		//Custom functions
		require( get_template_directory() . '/inc/tweaks.php' );
	
		//Make theme available for translation
		load_theme_textdomain( 'jwfusion', get_template_directory() . '/languages' );
	
		//Add default posts and comments RSS feed links
		add_theme_support( 'automatic-feed-links' );
	
		//Enable suport for the Aside Post Format
		add_theme_support( 'post-formats', array( 'aside' ) );
	
		//Register Navigation Menus
		register_nav_menus( array(
			'top_nav'	=> __( 'Top Menu', 'jwfusion' ),
			'main_nav'  => __( 'Main Menu', 'jwfusion' ),
			'mobile_nav'=> __( 'Mobile Menu', 'jwfusion' ),
			'footer_nav'=> __( 'Footer Menu', 'jwfusion' )
		));
	
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'post-formats', array( 'video', 'gallery', 'audio' ));
	}
}

add_action( 'after_setup_theme', 'jwfusion_setup' );

function jwf_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Primary Widget Area', 'jwfusion' ),
        'id' => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ) );
 
    register_sidebar( array(
        'name' => __( 'Secondary Widget Area', 'jwfusion' ),
        'id' => 'sidebar-2',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ) );
}
add_action( 'widgets_init', 'jwf_widgets_init' );


//Enqueue scripts and styles
function jwfusion_scripts() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
 
    wp_enqueue_script( 'navigation', get_template_directory_uri() . '/scripts/frontend/navigation.js', array(), '20120206', true );
 
    if ( is_singular() && wp_attachment_is_image() ) {
        wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/scripts/frontend/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
    }
}
add_action( 'wp_enqueue_scripts', 'jwfusion_scripts' );

remove_action( 'woocommerce_product_tabs', 'woocommerce_product_reviews_tab', 30);
remove_action( 'woocommerce_product_tab_panels', 'woocommerce_product_reviews_panel', 30);

add_filter( 'woocommerce_product_tabs', 'sb_woo_remove_reviews_tab', 98);

function sb_woo_remove_reviews_tab($tabs) {

 unset($tabs['reviews']);

 return $tabs;
}

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);


add_action('woocommerce_before_main_content', 'jwfusion', 10);
add_action('woocommerce_after_main_content', 'jwfusion', 10);

add_theme_support( 'woocommerce' );

function my_theme_wrapper_start() {
  echo '<section id="main">';
}

function my_theme_wrapper_end() {
  echo '</section>';
}
	
//Get page number
function get_page_number() {
	if( get_query_var('paged') ) {
		print ' | ' . __( 'Page', 'JWFusion' ) . get_query_var('paged');
	}
} //End get_page_number

/**
 * Setup the WordPress core custom background feature.
 *
 * Use add_theme_support to register support for WordPress 3.4+
 * as well as provide backward compatibility for previous versions.
 * Use feature detection of wp_get_theme() which was introduced
 * in WordPress 3.4.
 *
 * Hooks into the after_setup_theme action.
 *
 */
$defaults = array(
	'default-image'          => get_template_directory_uri() . 'images/background-test.jpg',
	'random-default'         => false,
	'width'                  => 1285,
	'height'                 => 200,
	'flex-height'            => false,
	'flex-width'             => false,
	'default-text-color'     => '',
	'header-text'            => true,
	'uploads'                => true,
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
);	
add_theme_support( 'custom-header', $defaults );


$defaults = array(
	'default-color'          => '',
	'default-image'          => '',
	'wp-head-callback'       => '_custom_background_cb',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
);
add_theme_support( 'custom-background', $defaults );
 
//Add post-formats to posts
add_post_type_support( 'post', 'post-formats' );

//Add comments template file
comments_template( $file, $separate_comments );


if (function_exists( 'add_theme_support' )){
	add_filter('manage_posts_columns', 'posts_columns', 5);
	add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);
}

function posts_columns($defaults){
	$defaults[ 'my_post_thumbs' ] = __( 'Featured Image' );
	return $defaults;
}

function posts_custom_columns( $column_name, $id ) {
	if( $column_name === 'my_post_thumbs' ){
		echo the_post_thumbnail( array( 125,80 ) );
	}
}

//Get post thumbnail if thumbnail exists
function get_post_img($post_id, $width, $height) {
	$image_id = get_post_thumbnail_id($post_id);
	$image_url = wp_get_attachment_image_src($image_id, array($width, $height), true);
	if( $image_url[1] == $width and $image_url[2] == $height ) {
		return get_the_post_thumbnail($post_id, array($width, $height));
	} else {
		return get_the_post_thumbnail($post_id, "full");
	}
}

function get_attachment_image_src($attachment_id, $width, $height){
	$image_url = wp_get_attachment_image_src($attachment_id, array($width, $height), true);
	if( $image_url[1] == $width and $image_url[2] == $height );
	else $image_url = wp_get_attachement_image_src($attachment_id, "full", true);
	return $image_url[0];
}

add_filter( 'woocommerce_get_availability', 'custom_get_availability', 1, 2);
  
function custom_get_availability( $availability, $_product ) {
  
    //change text "Out of Stock' to 'SOLD OUT'
    if ( !$_product->is_in_stock() ) $availability['availability'] = __('Sorry out of stock. We are sewing more bags right now.', 'woocommerce');
        return $availability;
    }

$inc_path = ( TEMPLATEPATH . '/inc/' );