<?php
/* Admin Section for JWFusion Responsive Wordpress Theme
 *
 *
 * @package JWFusion
 * @author: Justin Walker
 */
 
 class jwfAdminPanel {
	 
	 //constructor
	 
	function __construct() {
		 
		//Admin Theme Options 
		add_action( 'admin_menu', array( &$this, 'add_menu' ) );
		
		add_action( 'admin_scripts', array( &$this, 'load_scripts' ) );
		add_action( 'admin_styles', array( &$this, 'load_styles') );
		
		add_action( 'admin_enqueue_scripts', array( &$this, 'buffer' ), 0);
		add_action( 'admin_scripts', array( &$this, 'output'), PHP_INT_MAX);		
	}
	
	function buffer() {
		if ( isset( $_REQUEST['page'] ) && strpos( $_REQUEST['page'], 'jwfusion') !== FALSE ) {
			ob_start();
		}
	}
		
	function output() {
		if ( isset( $_REQUEST['page'] ) && strpos( $_REQUEST['page'], 'jwfusion') !== FALSE ) {
			$plugin_folder = JWFFOLDER;
			$skipjs_count = 0;
			$html = ob_get_contents();
			ob_end_clean();
			
			if( !defined( 'JWF_JQUERY_CONFLICT_DETECTION' ) ) {
				define( 'JWF_JQUERY_CONFLICT_DETECTION', TRUE );
			}
			
			if( JWF_JQUERY_CONFLICT_DETECTION ) {
				if( preg_match_all( "/<script.*wp-content.*jquery[-_\.](min\.)?js.*<\script>/", $html, $matches, PREG_SET_ORDER ) ) {
					foreach( $matches as $match ) {
						$old_script - arrary_shift( $match );
						if(strpos( $old_script, JWFFOLDER ) === FALSE )
							$html = str_replace( $old_script, '', $html );
					}
				}
				
				// Detect custom jQuery UI script and remove
				if ( preg_match_all( "/<script.*wp-content.*jquery[-_\.]ui.*<\/script>/", $html, $matches, PREG_SET_ORDER ) ) {
					$detected_jquery_ui = TRUE;
					foreach( $matches as $match ) {
						$old_script = array_shift( $match );
						if (strpos( $old_script, JWFFOLDER ) === FALSE )
							$html = str_replace( $old_script, '', $html );
					}
				}
				
				if (isset($_REQUEST['skipjs'])) {
					foreach ($_REQUEST['skipjs'] as $js) {
						$js = preg_quote($js);
						if (preg_match_all("#<script.*{$js}.*</script>#", $html, $matches, PREG_SET_ORDER)) {
							foreach ($matches as $match) {
								$old_script = array_shift($match);
								if (strpos($old_script, JWFFOLDER) === FALSE)
									$html = str_replace($old_script, '', $html);
							}
						}
					}
					$skipjs_count = count($_REQUEST['skipjs']);
				}
				
				// Use WordPress built-in version of jQuery
				$jquery_url = includes_url('js/jquery/jquery.js');
				$html = implode('', array(
					"<script type='text/javascript' src='{$jquery_url}'></script>\n",
					"<script type='text/javascript'>
					window.onerror = function(msg, url, line){
						if (url.match(/\.js$|\.js\?/)) {
							if (window.location.search.length > 0) {
								if (window.location.search.indexOf(url) == -1)
									window.location.search += '&skipjs[{$skipjs_count}]='+url;
							}
							else {
								window.location.search = '?skipjs[{$skipjs_count}]='+url;
							}
						}
						return true;
					};</script>\n",
					$html
				));
			}

			echo $html;
		}
	}
	
	function add_menu() {
		add_menu_page( 'Theme Options', 'Theme Options' , 'manage_options', 'theme_options', array(&$this, 'show_page'), get_template_directory_uri()."/images/admin/admin-menu-icon.png" );
		add_submenu_page( 'theme_options', 'Homepage Settings', 'Homepage Settings', 'manage_options', 'homepage_settings',array(&$this, 'show_page') );
		add_submenu_page( 'theme_options', 'Manage Sidebars', 'Manage Sidebars', 'manage_options', 'manage_sidebars', array(&$this, 'show_page') );
		add_submenu_page( 'theme_options', 'Manage Users', 'Manage Users', 'manage_options', 'manage_users', array(&$this, 'show_page') );
		add_submenu_page( 'theme_options', 'Social Links', 'Social Links', 'manage_options', 'social_links', array(&$this, 'show_page') );
	}
	
	function show_page() {
		switch( $_GET['page'] ) {
			case 'homepage_settings':
				include_once( dirname(__FILE__) . '/homepage_settings.php' );
				homepage_settings();
				break;
			case 'manage_sidebars':
				include_once( dirname(__FILE__) . '/manage_sidebars.php' );
				manage_sidebars();
				break;
			case 'manage_users':
				include_once( dirname(__FILE__) . '/manage_users.php' );
				manage_users();
				break;
			case 'social_links':
				include_once( dirname(__FILE__) . '/social_links.php' );
				social_links();
				break;
			default:
				include_once( dirname(__FILE__) . '/theme_options.php' );	
				theme_options();
				break;
		}
	}
}
?>