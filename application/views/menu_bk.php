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
                        <a href="<?=site_url("admin");?>">
                            <img src="<?=site_url("uploads/logo_upload/".$result_logo);?>" alt="Books Portal" height="51" width="150"/>
                        </a>
                    </div>
                    <!-- END LOGO -->
                    </li>

					<li class="<?=($this->uri->segment(2) == "signin") ? "active" : "";?>">
						<a href="<?=site_url("signin/dashboard");?>">Dashboard</a>

					</li>
                    
                    <li class="menu-dropdown mega-menu-dropdown <?=($this->uri->segment(2) == "settings" || $this->uri->segment(2) == "content" || $this->uri->segment(2) == "color" || $this->uri->segment(2) == "banner" || $this->uri->segment(2) == "category") ? "active" : "";?>">

                        <a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">
						Settings <i class="fa fa-angle-down"></i>
						</a>
                        
                        <ul class="dropdown-menu">
							<li>
								<a href="<?=site_url("settings");?>" class="iconify">
								<i class="fa fa-cogs"></i>
								General Settings </a>
							</li>
							<!-- <li>
                                <a href="<?=site_url("banner");?>" class="iconify">
                                <i class="fa fa-cogs"></i>
                                Banner Management </a>
                            </li>
							<li>
                                <a href="<?=site_url("content");?>" class="iconify">
                                <i class="fa fa-cogs"></i>
                                Web Content </a>
                            </li>
                            <li>
                                <a href="<?=site_url("color");?>" class="iconify">
                                <i class="fa fa-cogs"></i>
                                Colour Management </a>
                            </li>
                            <li>
								<a href="<?=site_url("category");?>" class="iconify">
								<i class="fa fa-cogs"></i>
								Category </a>
							</li> -->
							<!-- <li>
								<a href="<?=site_url("subcategory");?>" class="iconify">
								<i class="fa fa-tags"></i>
								Sub category </a>
							</li> -->

							
						</ul>

					</li>
					<li class="menu-dropdown mega-menu-dropdown <?=($this->uri->segment(2) == "adminuser" || $this->uri->segment(2) == "usertype") ? "active" : "";?>">
                        <a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">
						Users <i class="fa fa-angle-down"></i>
						</a>
                        <ul class="dropdown-menu">
							<li>
								<a href="<?=site_url("usertype");?>" class="iconify">
								<i class="fa fa-group"></i>
								User Group </a>
							</li>
							<li>
								<a href="<?=site_url("adminuser");?>" class="iconify">
								<i class="fa fa-user"></i>
								Users </a>
							</li>
						</ul>
					</li>
                    
                    <li class="menu-dropdown mega-menu-dropdown <?=($this->uri->segment(2) == "customers" || $this->uri->segment(2) == "order") ? "active" : "";?>">

                        <a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">
						Customers <i class="fa fa-angle-down"></i>
						</a>
                        
                        <ul class="dropdown-menu">
							<li>
								<a href="<?=site_url("customers");?>" class="iconify">
								Customers</a>
							</li>
							<li>
								<a href="<?=site_url("plant");?>" class="iconify">
								Plant Management </a>
							</li>
						</ul>
                        

					</li>
					<li class="menu-dropdown mega-menu-dropdown <?=($this->uri->segment(2) == "customers" || $this->uri->segment(2) == "order") ? "active" : "";?>">
                        <a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">
						Work Assignment <i class="fa fa-angle-down"></i>
						</a>
                        
                        <ul class="dropdown-menu">
							<li>
								<a href="<?=site_url("work/creatework");?>" class="iconify">
								Forms</a>
							</li>
							<li>
								<a href="<?=site_url("work");?>" class="iconify">
								Works Listings</a>
							</li>
						</ul>
                        

					</li>
					<li class="menu-dropdown mega-menu-dropdown <?=($this->uri->segment(2) == "customers" || $this->uri->segment(2) == "order") ? "active" : "";?>">
                        <a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">
						Assignment <i class="fa fa-angle-down"></i>
						</a>
                        
                        <ul class="dropdown-menu">
							<li>
								<a href="<?=site_url("assignwork");?>" class="iconify">
								Works Listings</a>
							</li>
						</ul>
						<ul class="dropdown-menu">
							<li>
								<a href="<?=site_url("treeview");?>" class="iconify">
								Tree View</a>
							</li>
						</ul>
					</li>
					<!-- <li class="menu-dropdown mega-menu-dropdown <?=($this->uri->segment(2) == "report") ? "active" : "";?>">

                        <a href="<?=site_url("report");?>" class="dropdown-toggle">
						Report <i class="fa fa-angle-down"></i>
						</a>
					</li> -->
                    
                    <!--<li class="menu-dropdown mega-menu-dropdown <?=($this->uri->segment(2) == "question") ? "active" : "";?>">

                        <a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">
						Quiz <i class="fa fa-angle-down"></i>
						</a>
                        
                        <ul class="dropdown-menu">
                          <li>
                              <a href="<?=site_url("question");?>" class="iconify"><i class="fa fa-group"></i> Question </a>
                          </li>
												
						</ul>
                        

					</li>-->
                    
                    </ul>

                    

			<!-- END MEGA MENU -->

		</div>
        
        
            <div class="hor-menu hidden-xs hidden-sm" style="float:right;">

				<ul class="nav navbar-nav">
                    <li class="menu-dropdown mega-menu-dropdown <?=($this->uri->segment(2) == "myaccount" || $this->uri->segment(2) == "logout") ? "active" : "";?>">
                      <a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">
                      Welcome, <?=$this->session->userdata('b_username')?> <i class="fa fa-angle-down"></i>
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