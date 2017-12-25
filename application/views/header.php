<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<title><?=$title?></title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?=base_url()?>resources/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?=base_url()?>resources/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="<?=base_url()?>resources/css/core.css" rel="stylesheet" type="text/css">
	<link href="<?=base_url()?>resources/css/components.css" rel="stylesheet" type="text/css">
	<link href="<?=base_url()?>resources/css/colors.css" rel="stylesheet" type="text/css">
	<link href="<?=base_url()?>resources/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
	<link href="<?=base_url()?>resources/css/extras/animate.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Custom CSS -->
	<style type="text/css">
		.action_btns {
	    list-style-type: none;
	    display: -webkit-inline-box;
	    padding-left: 0px;
		}
		.action_btns li {
			padding-right: 5px;
		}
	</style>
	<!-- Custom CSS -->

	<!-- Core JS files -->
	<script type="text/javascript" src="<?=base_url()?>resources/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>resources/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>resources/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>resources/js/plugins/loaders/blockui.min.js"></script>
  <script type="text/javascript" src="<?=base_url()?>resources/js/core/libraries/jquery_ui/core.min.js"></script>

  <script type="text/javascript" src="<?=base_url()?>resources/js/plugins/forms/styling/switchery.min.js"></script>
  <script type="text/javascript" src="<?=base_url()?>resources/js/plugins/forms/styling/uniform.min.js"></script>
  <script type="text/javascript" src="<?=base_url()?>resources/js/plugins/forms/selects/selectboxit.min.js"></script>
  <script type="text/javascript" src="<?=base_url()?>resources/js/plugins/forms/selects/select2.min.js"></script>

  <script type="text/javascript" src="<?=base_url()?>resources/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>resources/js/plugins/tables/datatables/extensions/select.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>resources/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>resources/js/plugins/tables/datatables/extensions/buttons.min.js"></script> 
	<script type="text/javascript" src="<?=base_url()?>resources/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>resources/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js"></script>


	<script type="text/javascript" src="<?=base_url()?>resources/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>resources/js/plugins/uploaders/fileinput.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>resources/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>resources/js/plugins/pickers/daterangepicker.js"></script>
	<!-- /core JS files -->

  <!-- *********** Custom JS Need For Pages ************ -->
  	<!-- ***** Users Page ***** -->
			<?php if($controller_function == "users") : ?>
		  	<script type="text/javascript" src="<?=base_url()?>resources/js/plugins/forms/inputs/passy.js"></script>
				<script type="text/javascript" src="<?=base_url()?>resources/js/pages/users.js"></script>
		  <?php endif; ?>
		<!-- ***** Users Page ***** -->

  <!-- *********** Custom JS Need For Pages ************ -->
	<script type="text/javascript" src="<?=base_url()?>resources/js/core/app.js"></script>
	<script type="text/javascript" src="<?=base_url()?>resources/js/plugins/ui/ripple.min.js"></script>
  <script type="text/javascript" src="<?=base_url()?>resources/js/plugins/ui/prism.min.js"></script>
	<!-- /theme JS files -->
</head>
<body class="hold-transition">
  <div class="pageloader"></div>
  <?php include_once('nav.php'); ?>