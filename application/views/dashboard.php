<!-- BEGIN PAGE CONTAINER -->

<div class="page-container">

	<!-- BEGIN PAGE HEAD -->

	<div class="page-head">
		<div class="container">

			<!-- BEGIN PAGE TITLE -->

			<!--<div class="page-title">
				<h1>Dashboard</h1>
			</div>-->

			<!-- END PAGE TITLE -->

		</div>
	</div>

	<!-- END PAGE HEAD -->

	<!-- BEGIN PAGE CONTENT -->

	<div class="page-content">
		<div class="container">

			<!-- BEGIN PAGE BREADCRUMB -->

			<!--<ul class="page-breadcrumb breadcrumb">
				<li>
					<a href="<?=site_url("signin/dashboard");?>">Dashboard</a>
				</li>
			</ul>-->

			<!-- END PAGE BREADCRUMB -->

			<!-- BEGIN PAGE CONTENT INNER -->
			
			<div class="row margin-top-10">

            	<!-- BEGIN PAGE CONTENT-->

				
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
						<div class="dashboard-stat blue-madison">
							<div class="visual">
								<i class="icon-user fa-icon-medium"></i>
							</div>
							<div class="details">
								<div class="number">
									 <?php /*?><?=$result_user?><?php */?>
								</div>

								<div class="desc">
									 My Profile
								</div>
							</div>

							<a class="more" href="<?=site_url("myaccount");?>">
							View more <i class="m-icon-swapright m-icon-white"></i>
							</a>
						</div>
					</div>
                    <!-- <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
						<div class="dashboard-stat purple">
							<div class="visual">
								<i class="fa fa-group fa-icon-medium"></i>
							</div>

							<div class="details">
								<div class="number">
									 <?php /*?><?=$result_page?><?php */?>
								</div>
                                
								<div class="desc">
									 <script type="text/javascript"></script>Schools
								</div>
							</div>
                            <?php if(!in_array(2, $this->session->userdata('b_permission'))){?>
								<a class="more" href="<?=site_url("schools");?>">
                                    View more <i class="m-icon-swapright m-icon-white"></i>
                                </a>
							<?php }else{?>
								<a class="more" href="<?=site_url("schools");?>">
                                    View more <i class="m-icon-swapright m-icon-white"></i>
                                </a>
							<?php }?>
						</div>
					</div> -->
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">

						<div class="dashboard-stat red-intense">

							<div class="visual">

								<i class="fa fa-user fa-icon-medium"></i>

							</div>

							<div class="details">

								<div class="number">
									 <?php /*?><?=$result_advertisment?><?php */?>
								</div>
								<div class="desc">
									 Settings
								</div>
							</div>
							<?php if(!in_array(3, $this->session->userdata('b_permission'))){?>
								<a class="more" href="<?=site_url("settings");?>">
                                    View more <i class="m-icon-swapright m-icon-white"></i>
                                </a>
							<?php }else{?>
								<a class="more" href="<?=site_url("settings");?>">
                                    View more <i class="m-icon-swapright m-icon-white"></i>
                                </a>
							<?php }?>

						</div>

					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">

						<div class="dashboard-stat stat green">

							<div class="visual">
								<i class="fa fa-file-code-o fa-icon-medium"></i>
							</div>

							<div class="details">
								<div class="number">
									 <?php /*?><?=$result_advertisment?><?php */?>
								</div>
								<div class="desc">
									 User
								</div>
							</div>
                            
                            <?php if(!in_array(7, $this->session->userdata('b_permission'))){?>
								<a class="more" href="<?=site_url("adminuser");?>">
                                    View more <i class="m-icon-swapright m-icon-white"></i>
                                </a>
							<?php }else{?>
								<a class="more" href="<?=site_url("adminuser");?>">
                                    View more <i class="m-icon-swapright m-icon-white"></i>
                                </a>
							<?php }?>

						</div>

					</div>
				
					<!-- <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
						<div class="dashboard-stat green-haze">
							<div class="visual">
								<i class="fa fa-tags fa-icon-medium"></i>
							</div>
							<div class="details">
								<div class="number">
									 <?php /*?><?=$result_user?><?php */?>
								</div>

								<div class="desc">
									 Grades
								</div>
							</div>
							
                            <?php if(!in_array(4, $this->session->userdata('b_permission'))){?>
								<a class="more" href="<?=site_url("classes");?>">
                                    View more <i class="m-icon-swapright m-icon-white"></i>
                                </a>
							<?php }else{?>
								<a class="more" href="<?=site_url("classes");?>">
                                    View more <i class="m-icon-swapright m-icon-white"></i>
                                </a>
							<?php }?>
                            
						</div>
					</div> -->

					
                    <!-- <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
						<div class="dashboard-stat red">
							<div class="visual">
								<i class="fa fa-book fa-icon-medium"></i>
							</div>

							<div class="details">
								<div class="number">
									 <?php /*?><?=$result_page?><?php */?>
								</div>
                                
								<div class="desc">
									 Books
								</div>
							</div>
                            
                            <?php if(!in_array(6, $this->session->userdata('b_permission'))){?>
								<a class="more" href="<?=site_url("accessdenied");?>">
                                    View more <i class="m-icon-swapright m-icon-white"></i>
                                </a>
							<?php }else{?>
								<a class="more" href="<?=site_url("books");?>">
                                    View more <i class="m-icon-swapright m-icon-white"></i>
                                </a>
							<?php }?>
                            
						</div>
					</div> -->
					<!--<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">

						<div class="dashboard-stat stat green">

							<div class="visual">
								<i class="fa fa-file-code-o fa-icon-medium"></i>
							</div>

							<div class="details">
								<div class="number">
									 <?php /*?><?=$result_advertisment?><?php */?>
								</div>
								<div class="desc">
									 Code Generator
								</div>
							</div>
                            
                            <?php if(!in_array(7, $this->session->userdata('b_permission'))){?>
								<a class="more" href="<?=site_url("accessdenied");?>">
                                    View more <i class="m-icon-swapright m-icon-white"></i>
                                </a>
							<?php }else{?>
								<a class="more" href="<?=site_url("codegenerator");?>">
                                    View more <i class="m-icon-swapright m-icon-white"></i>
                                </a>
							<?php }?>

						</div>

					</div>-->
				
					<!-- <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
						<div class="dashboard-stat purple">
							<div class="visual">
								<i class="fa fa-group fa-icon-medium"></i>
							</div>
							<div class="details">
								<div class="number">
									 <?php /*?><?=$result_user?><?php */?>
								</div>

								<div class="desc">
									 Customers
								</div>
							</div>
							
                            <?php if(!in_array(9, $this->session->userdata('b_permission'))){?>
								<a class="more" href="<?=site_url("accessdenied");?>">
                                    View more <i class="m-icon-swapright m-icon-white"></i>
                                </a>
							<?php }else{?>
								<a class="more" href="<?=site_url("customers");?>">
                                    View more <i class="m-icon-swapright m-icon-white"></i>
                                </a>
							<?php }?>
                            
						</div>
					</div> -->
                    <!-- <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
						<div class="dashboard-stat blue-madison">
							<div class="visual">
								<i class="fa fa-server fa-icon-medium"></i>
							</div>

							<div class="details">
								<div class="number">
									 <?php /*?><?=$result_page?><?php */?>
								</div>
                                
								<div class="desc">
									 Orders
								</div>
							</div>
                            
                            <?php if(!in_array(10, $this->session->userdata('b_permission'))){?>
								<a class="more" href="<?=site_url("accessdenied");?>">
                                    View more <i class="m-icon-swapright m-icon-white"></i>
                                </a>
							<?php }else{?>
								<a class="more" href="<?=site_url("order");?>">
                                    View more <i class="m-icon-swapright m-icon-white"></i>
                                </a>
							<?php }?>
                            
						</div>
					</div> -->
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">

						<div class="dashboard-stat stat green-haze">

							<div class="visual">
								<i class="fa fa-cogs fa-icon-medium"></i>
							</div>

							<div class="details">
								<div class="number">
									 <?php /*?><?=$result_advertisment?><?php */?>
								</div>
								<div class="desc">
									 Settings
								</div>
							</div>
							
                            <?php if(!in_array(1, $this->session->userdata('b_permission'))){?>
								<a class="more" href="<?=site_url("accessdenied");?>">
                                    View more <i class="m-icon-swapright m-icon-white"></i>
                                </a>
							<?php }else{?>
								<a class="more" href="<?=site_url("settings");?>">
                                    View more <i class="m-icon-swapright m-icon-white"></i>
                                </a>
							<?php }?>

						</div>

					</div>
				
				<!-- END PAGE CONTENT-->
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->