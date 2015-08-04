<?php 

if( preg_match( '#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'] ) ) { die('You cannot access this page directlu.'); }

if( !class_exists( 'jwfLoader' ) ) {
	class jwfLoader {
		
		var $version 	= '8.25.13';
		var $minimum_WP = '3.0';
		var $options 	= '';
		var $manage_settings;
		
		function jwfLoader() {
			
			if ( ( !$this->required_version() ) || ( !$this->memory_limit_check() ) ) 
				return;
				
			set_exception_handler( array( &$this, 'exception_handler') );
			
			$this->load_options();
			$this->define_constants();
			$this->define_tables();
			$this->load_libraries();
			
			add_action( 'init', array(&$this, 'test_head_footer_init' ) );
			add_action( 'wp_head', array( &$this, 'jwfusion_version' ) );
		}

		function required_version() {
			global $wp_version;
			
			$wp_good = version_compare( $wp_version, $this->minimum_WP, '>=');
			
			if( ( $wp_good == FALSE ) ) {
				add_action( 'admin_noitces', create_function( '' , 'global $jwf; printf( \'<div id="message" class="error"><p><strong>\' . __(\'Sorry, JWFUsion requires WordPress %s or higher\', "jwfusion" ) . \'</strong></p></div>\', $jwf->minimum_WP );') );
				return false;
			}
			return true;
		}
		
		function memory_limit_check() {
			return true;		
		}
		
		function define_tables() {
			global $wpdb;
			
			//add db pointes
			$wpdb->jwfusers			=$wpdb->prefix . 'jwf_users';
			$wpdb->jwfgroups 		=$wpdb->prefix . 'jwf_groups';
			$wpdb->jwfdownloadable 	=$wpdb->prefix . 'jwf_downloadable';
		}
			
		function define_constants() {
			global $wp_version;
			
			define( 'JWFVERSION', $this->version );
			define( 'WINABSPATH', str_replace( "\\", "/", ABSPATH ) );
			define( 'JWFOLDER', dirname(__FILE__) );
		}
		
		function load_libraries() {			
			if( is_admin ) {
				require_once( dirname(__FILE__) . '/admin.php' );
				$this->jwfAdminPanel = new jwfAdminPanel();
			}
		}
		
		function jwfusion_version() {
		
		}
	
		function test_head_footer_init() {
		
		}
		
		function load_options() {
			
		}
		
		function exception_handler($ex)
		{
			if (get_class($ex) != 'E_Clean_Exit') throw $ex;
		}
	}
	
	global $jwf;
	$jwf - new jwfLoader();
}
?>