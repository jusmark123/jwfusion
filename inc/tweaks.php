<?php
/**
 * Custom functions for JWFusion Responsive Wordpress Theme
 *
 * @package JWFusion
 * @since JWFusion 1.0
 */
 
 //Get wp_nav_menu() fallback, wp_page_menu()
 function jwf_page_menu_args( $args ) {
	 $args['show_home'] = true;
	 return $args;
 }
 add_filter( 'wp_page_menu_args' , 'jwf_page_menu_args' );
 
 function jwf_body_classes( $classes ) {
	 //Add a class of group-blog with more than 1 published author
	 if ( is_multi_author() ) {
		 $classes[] = 'group-blog';
	 }
	 
	 return $classes;
 }
 add_filter( 'body_class', 'jwf_body_classes' );
 
function jwf_enhanced_image_navigation( $url, $id ) {
	//Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 	if( ! is_attachment() && ! wp_attachment_is_image( $id ) )
		return $url;
		
	$image = get_post( $id );
	if ( ! empty( $image->post_parent ) && $image->post_parent != $id )
		$url .= '#main';
		
	return $url;
}
add_filter( 'attachment_link', 'jwf_enhanced_image_navigation', 10, 2 );
?>