			<!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <div style="width:155px; float:right;">
             
             <div class="hor-menu" style="float:left; margin-left:10px;">
				<ul class="nav navbar-nav my-nav" style="margin-top:5px;">
                	
                    <li class="menu-dropdown mega-menu-dropdown" style="float:right; width:122px;">
                        <a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">
						Welcome, <span style="font-weight:bold; color:#fff;"><?=$this->session->userdata('b_username')?> <i class="fa fa-angle-down"></i></span>
						</a>
                        <ul class="dropdown-menu">
							<li>
								<a href="<?=site_url("signin/logout");?>" class="iconify">
                               Log out</a>
							</li>
						</ul>
					</li>
                    </ul>
			<!-- END MEGA MENU -->
		</div>
			<a href="javascript:;" class="menu-toggler"></a>
            </div>   
			<!-- END RESPONSIVE MENU TOGGLER -->
		</div>
	</div>

	<!-- END HEADER TOP -->
	<!-- BEGIN HEADER MENU -->
	<div class="page-header-menu">
		<div class="container">
			<!-- BEGIN MEGA MENU -->
			<!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
			<!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
			<div class="hor-menu ">
				<ul class="nav navbar-nav">
                	<li>
                    <!-- BEGIN LOGO -->
                    <div class="logo  hidden-xs">
                        <a href="<?=site_url("treeview");?>">
                            <img src="<?=site_url("uploads/logo_upload/".$result_logo);?>" alt="AMI" height="51" width="150"/>
                        </a>
                    </div>
                    <!-- END LOGO -->
                    </li>

					<li class="<?=($this->uri->segment(1) == "treeview") ? "active" : "";?>">
						<!--<a href="<?=site_url("signin/dashboard");?>">Dashboard</a>-->
                        <a href="<?=site_url("treeview");?>">Dashboard</a>
					</li>
                    <?php if($this->session->userdata('b_username') == "admin" || $this->session->userdata('b_user_type') != 3){?>
                    <li class="menu-dropdown mega-menu-dropdown <?=($this->uri->segment(1) == "settings" || $this->uri->segment(1) == "usertype" || $this->uri->segment(1) == "adminuser") ? "active" : "";?>">

                        <a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">
						Administration<i class="fa fa-angle-down"></i>
						</a>
                        
                        <ul class="dropdown-menu">
							<li <?=($this->uri->segment(1) == "settings") ? "active" : "";?>>
								<a href="<?=site_url("settings");?>" class="iconify">
								<i class="fa fa-cogs"></i>
								Site Administration </a>
							</li>
							<!-- <li>
                                <a href="<?=site_url("signin/dashboard");?>" class="iconify">
                                <i class="fa fa-cogs"></i>
                                Menu </a>
                            </li> -->
                            <li <?=($this->uri->segment(1) == "usertype") ? "active" : "";?>>
								<a href="<?=site_url("usertype");?>" class="iconify">
								<i class="fa fa-group"></i>
								User Role Management</a>
							</li>
							<li <?=($this->uri->segment(1) == "adminuser") ? "active" : "";?>>
								<a href="<?=site_url("adminuser");?>" class="iconify">
								<i class="fa fa-user"></i>
								User Management </a>
							</li>
						</ul>

					</li>
					<?php }?>
					
                    <?php if($this->session->userdata('b_user_type') != 3){?>
                    <li class="menu-dropdown mega-menu-dropdown <?=($this->uri->segment(2) == "creatework" || $this->uri->segment(1) == "customers" || $this->uri->segment(1) == "plant") ? "active" : "";?>">

                        <a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">
						Configuration <i class="fa fa-angle-down"></i>
						</a>
                        
                        <ul class="dropdown-menu">
							<li <?=($this->uri->segment(1) == "customers") ? "active" : "";?>>
								<a href="<?=site_url("customers");?>" class="iconify">
								Company Management</a>
							</li>
							<li <?=($this->uri->segment(1) == "plant") ? "active" : "";?>>
								<a href="<?=site_url("plant");?>" class="iconify">
								Plant Management </a>
							</li>
							<li <?=($this->uri->segment(2) == "creatework") ? "active" : "";?>>
								<a href="<?=site_url("work/creatework");?>" class="iconify">
								Forms Management</a>
							</li>
						</ul>
                        

					</li>
					<?php }?>
					<?php if($this->session->userdata('b_user_type') != 3){?>
					<li class="menu-dropdown mega-menu-dropdown <?=($this->uri->segment(1) == "work" && $this->uri->segment(2) == "") ? "active" : "";?>">
                        <a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">
						Work Assignment <i class="fa fa-angle-down"></i>
						</a>
                        
                        <ul class="dropdown-menu">
							<li <?=($this->uri->segment(1) == "work" && $this->uri->segment(2) == "") ? "active" : "";?>>
								<a href="<?=site_url("work");?>" class="iconify">
								Assignment List</a>
							</li>
						</ul>
                        

					</li>
					<?php }?>
					<?php if($this->session->userdata('b_user_type') == 3){?>
					<li class="menu-dropdown mega-menu-dropdown <?=($this->uri->segment(2) == "assigned") ? "active" : "";?>">
                        <a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">
						Assigned Work<i class="fa fa-angle-down"></i>
						</a>
                        <ul class="dropdown-menu">
							<li>
								<a href="<?=site_url("work/assigned");?>" class="iconify">
								Assigned Work List</a>
							</li>
						</ul>
					</li>
					<?php }?>
					
                    </ul>

                    

			<!-- END MEGA MENU -->

		</div>
        
        
            <div class="hor-menu hidden-xs hidden-sm" style="float:right;">

				<ul class="nav navbar-nav">
                    <li class="menu-dropdown mega-menu-dropdown <?=($this->uri->segment(2) == "myaccount" || $this->uri->segment(2) == "logout") ? "active" : "";?>">
                      <a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">
                      Welcome, <?=$this->session->userdata('b_fname')." ".$this->session->userdata('b_lname')?> <i class="fa fa-angle-down"></i>
                      </a>
                      <ul class="dropdown-menu">
                         <li><a href="<?=site_url("myaccount");?>"><i class="icon-user"></i> My Profile</a></li>
                         <li class="divider"></li>
                         <li><a href="<?=site_url("signin/logout");?>" style="font-weight:bold;"><i class="fa fa-power-off"></i> Log Out</a></li>
                      </ul>
                   </li>
                    </ul>

                    

			<!-- END MEGA MENU -->

		</div>

	</div>

	<!-- END HEADER MENU -->

</div>

<!-- END HEADER -->