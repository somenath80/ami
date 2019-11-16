<!-- BEGIN BODY -->
<body class="login">

<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->

<!-- BEGIN LOGO -->
<div class="logo">
	<a href="<?=site_url();?>">
		<img src="<?=site_url("uploads/logo_upload/".$result_logo);?>" alt="AMI"/>
	</a>
</div>
<!-- END LOGO -->

<!-- BEGIN LOGIN -->

<div class="content">

	<!-- BEGIN LOGIN FORM -->

	<form id="formsignin" name="formsignin" class="login-form" action="<?=site_url("signin/authorization/")?>" method="post">

		<h3 class="form-title">Sign In</h3>

		<?php if($this->session->flashdata('user_ermsg') != "") { ?>

          <div class="alert alert-danger alert-dismissable" style="margin-top:10px;">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>

            <?=$this->session->flashdata('user_ermsg');?>

          </div>

        <?php }else{ ?>        

		<div class="alert alert-danger display-hide">

			<button class="close" data-close="alert"></button>

			<span>Invalid username / password !</span>

		</div>

        <?php }?>
        
        <?php if($this->session->flashdata('user_msg') != "") { ?>

        <div class="alert alert-success alert-dismissable" style="margin-top:10px;">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>

            <strong>Success&nbsp;!&nbsp;</strong> <?=$this->session->flashdata('user_msg');?>

        </div>

        <?php } ?>

		<div class="form-group">

			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->

			<label class="control-label visible-ie8 visible-ie9">Username</label>

			<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" style="background-color:#FFF;"/>

		</div>

		<div class="form-group">

			<label class="control-label visible-ie8 visible-ie9">Password</label>

			<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" style="background-color:#FFF;"/>

		</div>

		<div class="form-actions">

			<button type="submit" class="btn btn-success uppercase">Login</button>

			<!--<label class="rememberme check">

			<input type="checkbox" name="remember" value="1"/>Remember </label>-->

			<a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>

		</div>

	</form>

	<!-- END LOGIN FORM -->

	<!-- BEGIN FORGOT PASSWORD FORM -->

	<form class="forget-form" action="<?=site_url("signin/forgetpassword/")?>" method="post">

		<h3>Forget Password ?</h3>

		<p>Enter your e-mail address below to reset your password.</p>

		<div class="form-group">

			<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>

		</div>

		<div class="form-actions">

			<button type="button" id="back-btn" class="btn btn-default">Back</button>

			<button type="submit" class="btn btn-success uppercase pull-right">Submit</button>

		</div>

	</form>

	<!-- END FORGOT PASSWORD FORM -->

</div>

