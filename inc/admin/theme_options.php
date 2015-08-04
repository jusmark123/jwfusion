<?php 
/* Theme: JWFusion Responsive Wordpress Theme
 *
 * Author: Justin Walker
 * 
 * Version: 8.26.13
 *
 *
 *
 */
 
if( preg_match( '#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'] ) ) { die('You cannot access this page directlu.'); }

function theme_options() {
	?>
    <div class="wrapper jwf-wrap">
    	<img class="logo" src="<?php basename(__FILE__) . '/screenshot.png'; ?>" />
    	<h1 class="heading">JWFusion</h1>
    </div>
<?php } ?>
    