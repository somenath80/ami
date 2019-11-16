<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.2
Version: 3.6.2
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>AMI</title>

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
<link type="text/css" rel="stylesheet" href="<?=site_url("assets/global/plugins/font-awesome/css/font-awesome.min.css");?>" />
<link type="text/css" rel="stylesheet" href="<?=site_url("assets/global/plugins/simple-line-icons/simple-line-icons.min.css");?>" />
<link type="text/css" rel="stylesheet" href="<?=site_url("assets/global/plugins/bootstrap/css/bootstrap.min.css");?>" />
<link type="text/css" rel="stylesheet" href="<?=site_url("assets/global/plugins/uniform/css/uniform.default.css");?>" />

<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link type="text/css" rel="stylesheet" href="<?=site_url("assets/global/plugins/jqvmap/jqvmap/jqvmap.css");?>" />
<link type="text/css" rel="stylesheet" href="<?=site_url("assets/global/plugins/morris/morris.css");?>" />
<link type="text/css" rel="stylesheet" href="<?=site_url("assets/global/plugins/select2/select2.css");?>" />
<link type="text/css" rel="stylesheet" href="<?=site_url("assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css");?>" />
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<link type="text/css" rel="stylesheet" href="<?=site_url("assets/pages/css/tasks.css");?>" />
<link type="text/css" rel="stylesheet" href="<?=site_url("assets/global/plugins/dropzone/css/dropzone.css");?>" />

<link rel="stylesheet" type="text/css" href="<?=site_url("assets/global/plugins/bootstrap-datepicker/css/datepicker3.css");?>"/>
<link rel="stylesheet" type="text/css" href="<?=site_url("assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css");?>"/>
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
<link type="text/css" rel="stylesheet" href="<?=site_url("assets/global/css/components-rounded.css");?>" />
<link type="text/css" rel="stylesheet" href="<?=site_url("assets/global/css/plugins.css");?>" />
<link type="text/css" rel="stylesheet" href="<?=site_url("assets/layout3/css/layout.css");?>" />
<link type="text/css" rel="stylesheet" href="<?=site_url("assets/layout3/css/themes/default.css");?>" />
<link type="text/css" rel="stylesheet" href="<?=site_url("assets/layout3/css/custom.css");?>" />
<link type="text/css" rel="stylesheet" href="<?=site_url("assets/layout3/css/remove_image.css");?>" />

<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.css" />

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<!-- <link rel="stylesheet" href="<?php // site_url("assets/layout3/css/star-rating.css");?>" media="all" rel="stylesheet" type="text/css"/> -->

<!-- END THEME STYLES -->
<!--<link rel="shortcut icon" href="favicon.ico"/>-->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-menu-fixed" class to set the mega menu fixed  -->
<!-- DOC: Apply "page-header-top-fixed" class to set the top menu fixed  -->
<body>
<!-- BEGIN HEADER -->
<div class="page-header">
	<!-- BEGIN HEADER TOP -->
	<div class="page-header-top  hidden-lg hidden-md">
		<div class="container">
			<div class="page-logo">
				<a href="<?=site_url("signin");?>"><img src="<?=site_url("uploads/logo_upload/".$result_logo);?>" alt="AMI" class="logo-default" style="width:110px; float:left;" height="30"></a>
			</div>
			<!-- END LOGO -->