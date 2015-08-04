<?
/*
 *
 *
 *
 */
	if( preg_match( '#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'] ) ) { die('You cannot access this page directlu.'); }
	
	function manage_users() {
		?>
        <div class="wrapper jwf-wrap">
        	<h1 class="heading">Manage Users</h1>
            <p>Manage users and permissions below</p>
            <div style="width:100%" class="nav-bar">
            	<ul>
                	<a href="dirname(__FILE__) . '/manage-users.php'"><li id="manager-users" class="tabs">Manage Users</li></a>
                    <li id="manage-usergroups" class="tabs">Manage Groups</li>
                </ul>
                
        </div>
			
<?php } ?>

