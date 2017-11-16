<?php
	/*********** Rearranging Dashboard Tabs From User Permissions *********/
  $user_roles = $_SESSION['user']['roles'];

  $dashboard_items_details =  $this->model_access->retrieve_all_system_types($_Permission_DB);
 	
 	/********* Creating Different Types Of System ***************/
 	foreach ($dashboard_items_details as $value) {
 		# code...
 		$system_type[] = $value->system_type;
 	}
 	
  $counter = 0;
 	/********* Creating Different Types Of System ***************/
  foreach($user_roles As $role_name) 
  {
    $roles_details = $this->model_access->retrieve_dashboard_tab_details($_Permission_DB,$role_name);
    
    if(!empty($roles_details)) 
    {
    	#Assigning
    	$classification_type = strtolower($roles_details->system_type);

      $dashboard_tabs[$classification_type][$counter]['name'] = $roles_details->name;
      $dashboard_tabs[$classification_type][$counter]['link'] = $roles_details->link;
      $dashboard_tabs[$classification_type][$counter]['icon'] = $roles_details->icon;
      $dashboard_tabs[$classification_type][$counter]['comment'] = $roles_details->comment;
      $dashboard_tabs[$classification_type][$counter]['bg'] = $roles_details->bg;
      $dashboard_tabs[$classification_type][$counter]['privileges'] = explode('|', $roles_details->privileges);
      $counter++;	     	
    }
    
  } 
	/*********** Rearranging Dashboard Tabs From User Permissions *********/
?>

<!-- Main navbar -->
	<div class="navbar navbar-inverse bg-teal ">
		<div class="navbar-header">
			<a class="navbar-brand" href="<?=base_url();?>dashboard"> <?=$_SESSION['companyinfo']['name']?></a>

			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<i class="icon-bell3"></i>
						<span class="visible-xs-inline-block position-right">Git updates</span>
						<span class="status-mark border-orange-400"></span>
					</a>
					
					<div class="dropdown-menu dropdown-content">
						<div class="dropdown-content-heading">
							Notification
							<ul class="icons-list">
								<li><a href="#"><i class="icon-sync"></i></a></li>
							</ul>
						</div>

						<ul class="media-list dropdown-content-body width-350">
							<li class="media">
								<div class="media-left">
									<a href="#" class="btn border-primary text-primary btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-pull-request"></i></a>
								</div>

								<div class="media-body">
									Drop the IE <a href="#">specific hacks</a> for temporal inputs
									<div class="media-annotation">4 minutes ago</div>
								</div>
							</li>

							<li class="media">
								<div class="media-left">
									<a href="#" class="btn border-warning text-warning btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-commit"></i></a>
								</div>
								
								<div class="media-body">
									Add full font overrides for popovers and tooltips
									<div class="media-annotation">36 minutes ago</div>
								</div>
							</li>
						</ul>

						<div class="dropdown-content-footer">
							<a href="#" data-popup="tooltip" title="" data-original-title="All activity"><i class="icon-menu display-block"></i></a>
						</div>
					</div>
				</li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-people"></i>
						<span class="visible-xs-inline-block position-right">Users</span>
					</a>
					
					<div class="dropdown-menu dropdown-content">
						<div class="dropdown-content-heading">
							Users online
							<ul class="icons-list">
								<li><a href="#"><i class="icon-gear"></i></a></li>
							</ul>
						</div>

						<ul class="media-list dropdown-content-body width-300">
							<li class="media">
								<div class="media-left"><img src="<?=base_url()?>resources/images/users/default.jpg" class="img-circle img-sm" alt=""></div>
								<div class="media-body">
									<a href="#" class="media-heading text-semibold">Jordana Ansley</a>
									<span class="display-block text-muted text-size-small">Lead web developer</span>
								</div>
								<div class="media-right media-middle"><span class="status-mark border-success"></span></div>
							</li>
						</ul>

						<div class="dropdown-content-footer">
							<a href="#" data-popup="tooltip" title="All users"><i class="icon-menu display-block"></i></a>
						</div>
					</div>
				</li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-bubbles4"></i>
						<span class="visible-xs-inline-block position-right">Messages</span>
						<span class="badge bg-warning-400">2</span>
					</a>

					<div class="dropdown-menu dropdown-content">
						<div class="dropdown-content-heading">
							Activity
							<ul class="icons-list">
								<li><a href="#"><i class="icon-menu7"></i></a></li>
							</ul>
						</div>

						<ul class="media-list dropdown-content-body width-350">
							<li class="media">
								<div class="media-left">
									<a href="#" class="btn bg-success-400 btn-rounded btn-icon btn-xs"><i class="icon-mention"></i></a>
								</div>

								<div class="media-body">
									<a href="#">Taylor Swift</a> mentioned you in a post "Angular JS. Tips and tricks"
									<div class="media-annotation">4 minutes ago</div>
								</div>
							</li>

							<li class="media">
								<div class="media-left">
									<a href="#" class="btn bg-pink-400 btn-rounded btn-icon btn-xs"><i class="icon-paperplane"></i></a>
								</div>
								
								<div class="media-body">
									Special offers have been sent to subscribed users by <a href="#">Donna Gordon</a>
									<div class="media-annotation">36 minutes ago</div>
								</div>
							</li>
						</ul>
					</div>
				</li>

        <?php
          $profile_pic = (!isset($_SESSION['user']['profile_pic'])) ? base_url()."resources/images/users/default.jpg" : $_SESSION['user']['profile_pic'];
        ?>
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?=$profile_pic?>" alt="Profile Picture">
						<span><?=$_SESSION['user']['fullname']?></span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="<?=base_url()?>user/profile"><i class="icon-user-plus"></i> My profile</a></li>
						<li><a href="#"><i class="icon-coins"></i> My balance</a></li>
						<li><a href="#"><span class="badge badge-warning pull-right">58</span> <i class="icon-comment-discussion"></i> Messages</a></li>
						<li class="divider"></li>
						<li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>
						<li><a href="<?=base_url()?>access/logout"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->

	<!-- Secondary navbar -->
	<?php if($this->uri->segment(1) != "dashboard") : ?>
	<div class="navbar navbar-default navbar-xs" style="z-index:995">
		<ul class="nav navbar-nav no-border visible-xs-block">
			<li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second-toggle"><i class="icon-circle-down2"></i></a></li>
		</ul>

		<div class="navbar-collapse collapse" id="navbar-second-toggle">
			<ul class="nav navbar-nav">
				<?php 
					if(!empty($dashboard_tabs)) { 
						foreach ($dashboard_tabs as $key => $value) {
							# code... 
				?>
				<li class="dropdown mega-menu mega-menu-wide">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <!-- data-hover="dropdown"> -->
						<i class="icon-make-group position-left"></i> <?=$key?>
						<!-- <span class="badge badge-inline badge-warning position-right">47</span> -->
						<span class="caret"></span>
					</a>

					<div class="dropdown-menu dropdown-content">
						<div class="dropdown-content-body">
							<div class="row">
							  <?php  foreach ($value as $menu_obj => $menu_val) { ?>
									<div class="col-md-2">
										<span class="menu-heading underlined"><strong><?=$menu_val['name']?></strong></span>
										<ul class="menu-list">
											<?php foreach($menu_val['privileges'] as $sub_menu) { ?>
											<li><a href="<?=$menu_val['link']?>"><?=$sub_menu?></a></li>
											<?php } ?>
										</ul> 
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</li>
				<?php
						}
					}
				?>
			</ul>
		</div>
	</div>
	<?php else : 
		endif;
	?>
	<!-- /secondary navbar -->
	<div class="navbar navbar-default navbar-fixed-bottom">
		<ul class="nav navbar-nav no-border visible-xs-block">
			<li><a class="text-center collapsed legitRipple" data-toggle="collapse" data-target="#navbar-second"><i class="icon-circle-up2"></i></a></li>
		</ul>

		<div class="navbar-collapse collapse" id="navbar-second">
			<p class="navbar-text"><i class="icon-global-check position-left"></i>marksbon <a href="#" class="navbar-link">Oms</a></p>
			

			<div class="navbar-right">
				<ul class="nav navbar-nav">
					<li><a href="#" class="legitRipple">Help center</a></li>
					<li><a href="#" class="legitRipple">Policy</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle legitRipple" data-toggle="dropdown" aria-expanded="false">
							<i class="icon-cog3"></i>
							<span class="visible-xs-inline-block position-right">Settings</span>
							<span class="caret"></span>
						</a>

						<ul class="dropdown-menu dropdown-menu-right">
							<li><a href="#"><i class="icon-dribbble3"></i> Dribbble</a></li>
							<li><a href="#"><i class="icon-pinterest2"></i> Pinterest</a></li>
							<li><a href="#"><i class="icon-github"></i> Github</a></li>
							<li><a href="#"><i class="icon-stackoverflow"></i> Stack Overflow</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<!-- Page container -->
  <div class="page-container">

    <!-- Page content -->
    <div class="page-content">

      <!-- Main content -->
      <div class="content-wrapper">
      	<?php if($this->uri->segment(1) != "dashboard") : ?>
        <!-- Page header -->
        <div class="page-header page-header-default">
          <div class="breadcrumb-line">
            <ul class="breadcrumb">
              <li><a href="<?=base_url();?>dashboard"><i class="icon-home2 position-left"></i> Home</a></li>
              <li><a href="#"><?=$page_controller?></a></li>
              <li class="active"><a href="#"><?=$controller_function?></a></li>
            </ul>
            <ul class="breadcrumb-elements" >
							<li class="dropdown" >
								<a href="#" class="dropdown-toggle legitRipple" data-toggle="dropdown">
									<i class="icon-gear position-left"></i>
								</a>
							</li>
						</ul>
          </div>
        </div>
        <!-- /page header -->
        <?php else : 
					endif;
				?>