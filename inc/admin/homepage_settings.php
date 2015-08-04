<?php 
	if( preg_match( '#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'] ) ) { die('You cannot access this page directlu.'); }

	
	function homepage_settings() {
		?>
        <div class="wrapper jwf-wrap">
        	<h1 class="heading">Homepage Settings</h1>
        </div>
        
<?php }?>