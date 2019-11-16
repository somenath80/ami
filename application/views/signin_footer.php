<div class="copyright">

	 <?php echo $result_copyright->copyright; ?>

</div>

<!-- END LOGIN -->

<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->

<!-- BEGIN CORE PLUGINS -->

<!--[if lt IE 9]>

<script src="../../assets/global/plugins/respond.min.js"></script>

<script src="../../assets/global/plugins/excanvas.min.js"></script> 

<![endif]-->

<script type="text/javascript" src="<?=site_url("assets/global/plugins/jquery.min.js");?>"></script>

<script type="text/javascript" src="<?=site_url("assets/global/plugins/jquery-migrate.min.js");?>"></script>

<script type="text/javascript" src="<?=site_url("assets/global/plugins/bootstrap/js/bootstrap.min.js");?>"></script>

<script type="text/javascript" src="<?=site_url("assets/global/plugins/jquery.blockui.min.js");?>"></script>

<script type="text/javascript" src="<?=site_url("assets/global/plugins/uniform/jquery.uniform.min.js");?>"></script>

<script type="text/javascript" src="<?=site_url("assets/global/plugins/jquery.cokie.min.js");?>"></script>

<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL PLUGINS -->

<script type="text/javascript" src="<?=site_url("assets/global/plugins/jquery-validation/js/jquery.validate.min.js");?>"></script>

<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->

<script type="text/javascript" src="<?=site_url("assets/global/scripts/metronic.js");?>"></script>

<script type="text/javascript" src="<?=site_url("assets/admin/layout3/scripts/layout.js");?>"></script>

<script type="text/javascript" src="<?=site_url("assets/admin/layout3/scripts/demo.js");?>"></script>

<script type="text/javascript" src="<?=site_url("assets/admin/pages/scripts/login.js");?>"></script>

<!-- END PAGE LEVEL SCRIPTS -->

<script>

jQuery(document).ready(function() {     

	Metronic.init(); // init metronic core components

	Layout.init(); // init current layout

	Login.init();

	Demo.init();

});

</script>

<!-- END JAVASCRIPTS -->

</body>

<!-- END BODY -->

</html>