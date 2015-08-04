<?php 
/**
 * Jwfusion functions and definitions
 *
 *
 #@package JWFusion
 *since JWFusion 1.0
 */
 
//Check if content width is set
if(!isset($content_width) ) 
	$content_width = 1440; /* pixels */
		
if( ! function_exists( 'jwfusion_setup' ) ):

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
		'mobile_top_nav' => __( 'Mobile Top Menu', 'jwfusion' ),
		'footer_nav'=> __( 'Footer Menu', 'jwfusion' )
	));
	
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'post-formats', array( 'video', 'gallery', 'audio' ));
	add_theme_support( 'woocommerce' );
	add_post_type_support( 'post', 'post-formats' );
	
}
endif;

add_action( 'after_setup_theme', 'jwfusion_setup' );

function jwfusion_widgets_init() {
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

add_action( 'widgets_init', 'jwfusion_widgets_init' );

//Enqueue scripts and styles
function jwfusion_scripts() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'custom', get_template_directory_uri() . '/css/custom.css' );
	wp_enqueue_style( 'large', get_template_directory_uri(). '/css/width-1280.css','','','screen and (min-width:1035px)');
	wp_enqueue_style( 'medium', get_template_directory_uri() . '/css/width-768.css','','','screen and (min-width:768px) and (max-width:1035px)');
	wp_enqueue_style( 'small', get_template_directory_uri() . '/css/width-320.css','','','screen and (max-width:768px)');
	
 	wp_enqueue_style( 'jquery-ui', '//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css');
	
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/scripts/frontend/custom.js', array('jquery', 'jquery-ui-core','jquery-ui-button') );
	
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
 
    wp_enqueue_script( 'navigation', get_template_directory_uri() . '/scripts/frontend/navigation.js', array(), '20120206', true );
}
add_action( 'wp_enqueue_scripts', 'jwfusion_scripts' );

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
remove_action( 'woocommerce_product_tabs', 'woocommerce_product_reviews_tab', 30);
remove_action( 'woocommerce_product_tab_panels', 'woocommerce_checkout_after_order_review', 30);

add_filter( 'woocommerce_product_tabs', 'sb_woo_remove_reviews_tab', 98);

function sb_woo_remove_reviews_tab($tabs) {

 unset($tabs['reviews']);

 return $tabs;
}

add_action('woocommerce_before_single_product_summary', 'add_left_frame', 5);
add_action('woocommerce_before_checkout_form', 'add_left_frame' );
add_action('woocommerce_before_single_product_summary', 'add_right_frame', 25 );
add_action('woocommerce_checkout_after_customer_details', 'add_right_frame' );
add_action('woocommerce_after_single_product_summary', 'close_right_frame', 25);
add_action('woocommerce_checkout_after_order_review', 'add_SSL_seal' );

//Get page number
function get_page_number() {
	if( get_query_var('paged') ) {
		print ' | ' . __( 'Page', 'JWFusion' ) . get_query_var('paged');
	}
} //End get_page_number

function jwfusion_register_custom_background() {
	$args = array(
		'default-color'          => 'e9e0d1',
	);
	
	$args = apply_filters( 'jwfusion_custom_background_args', $args );
 
    if ( function_exists( 'wp_get_theme' ) ) {
        add_theme_support( 'custom-background', $args );
    } else {
        define( 'BACKGROUND_COLOR', $args['default-color'] );
        define( 'BACKGROUND_IMAGE', $args['default-image'] );
        add_custom_background();
    }
}
add_action( 'after_setup_theme', 'jwfusion_register_custom_background' );
 
require( get_template_directory() . '/inc/custom-header.php' ); 

if ( function_exists( 'add_theme_support' ) ) {
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

$inc_path = ( TEMPLATEPATH . '/inc/' );

function add_left_frame() {
	//echo is_shop();
	echo '<div class="frame-left">';
}

function add_right_frame() {
	echo '</div>';
	echo '<div class="frame-right">';
}

function close_right_frame() {
	echo '</div>';	
}

function add_SSL_seal() {
	echo '<!-- GeoTrust QuickSSL [tm] Smart  Icon tag. Do not edit. -->
<script language="javascript" type="text/javascript" src="//smarticon.geotrust.com/si.js"></script>
<!-- end  GeoTrust Smart Icon tag -->';
}