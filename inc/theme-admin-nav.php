<div class="col1 left">
	<div class="logo">
    	<a href="#"><img src="<?php echo get_template_directory_uri();?>/images/admin/logo_ngbg_sm.png" /></a>
    </div>
    <div class="menu">
    	<ul>
        	<li>
            	<a href="admin_menu.php?page=functions.php" class="<?php if( $_GET['page']=="functions.php" ){echo "active";}?>">
                	<span class="icon-general-settings">&nbsp;</span>
                	<span class="link">General Settings</span>
				</a>
            </li>
            <li>
            	<a href="admin_menu.php?page=homepage_settings.php" class="<?php if( $_GET['page']=='homepage_settings'){echo "active";} ?>">
                	<span class="icon-home">&nbsp;</span>
                    <span class="link">Homepage Settings</span>
                </a>
            </li>
            <li>
            	<a href="admin_menu.php?page=gallery_settings.php" class="<?php if( $_GET['page']=='gallery_settings'){echo "active";} ?>">
                	<span class="icon-gallery">&nbsp;</span>
                    <span class="link">Gallery Settings</span>
                </a>	
            </li>
            <li>
            	<a href="admin_menu.php?page=manage_sidebars.php" class="<?php if( $_GET['page']=='manage_sidebars'){echo "active";} ?>">
                	<span class="icon-sidebars">&nbsp;</span>
                    <span class="link">Manage Sidebars</span>
                 </a>
            </li>
            <li>
            	<a href="admin_menu.php?page=slider_settings.php" class="<?php if( $_GET['page']=='slider_settings'){echo "active";} ?>">
                	<span class="icon-slider-settings">&nbsp;</span>
                    <span class="link">Slider Settings</span>
                </a>
            </li>
            <li>
            	<a href="admin_menu.php?page=social_links.php" class="<?php if( $_GET['page']=='social_links'){echo "active";} ?>">
                	<span class="icon-social">&nbsp;</span>
                    <span class="link">Social Links</span>
               	</a>
           </li>
      	</ul>
  	</div>
 </div>
 <!--End Left Column-->