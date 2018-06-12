<!-- Main navbar -->
	<div class="navbar navbar-inverse bg-slate-800 ">
		<div class="navbar-header bg-slate-800">
			<a class="navbar-brand" href="#"> <?="MARKSBON LIMITED" //$_SESSION['companyinfo']['name']?></a>
			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			</ul>
		</div>
		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav navbar-right">
			
			</ul>


		</div>
	</div>
	<!-- /main navbar -->
	

	<!-- /secondary navbar -->
	<div class="navbar navbar-default navbar-fixed-bottom" style="display: none">
		<ul class="nav navbar-nav no-border visible-xs-block">
			<li><a class="text-center collapsed legitRipple" data-toggle="collapse" data-target="#navbar-second"><i class="icon-circle-up2"></i></a></li>
		</ul>

		<div class="navbar-collapse collapse" id="navbar-second">
			<p class="navbar-text"><i class="icon-global-check position-left"></i>marksbon <a href="#" class="navbar-link">Oms</a></p>
			
			<div class="navbar-right">
				<ul class="nav navbar-nav">
					<li><a href="#" class="legitRipple">Help center</a></li>
					<li><a href="#" class="legitRipple">Policy</a></li>
				</ul>
			</div>
		</div>
	</div>

	<!-- Page container -->
  <div class="page-container">
    <div class="page-content">
      <div class="content-wrapper">
      	<?php if($this->uri->segment(1) != "dashboard") : ?>
	        <!-- Page header -->
	        <div class="page-header page-header-default">
	         
	        </div>
	        <!-- /page header -->
        <?php else : 
					endif;
				?>