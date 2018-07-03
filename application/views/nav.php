<?php
	/*********** Rearranging Dashboard Tabs From User Permissions *********/
  $user_roles = $_SESSION['user']['roles'];

  $dashboard_items_details =  $this->model_access->retrieve_all_system_types($_Default_DB);
 	
 	/********* Creating Different Types Of System ***************/
 	foreach ($dashboard_items_details as $value) {
 		# code...
 		$system_type[] = $value->system_type;
 	}
 	
  $counter = 0;
 	/********* Creating Different Types Of System ***************/
  foreach($user_roles As $role_name) 
  {
    $roles_details = $this->model_access->retrieve_dashboard_tab_details($_Default_DB,$role_name);
    
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
	<div class="navbar navbar-inverse bg-slate-800 ">
		<div class="navbar-header bg-slate-800">
			<a class="navbar-brand" href="<?=base_url();?>dashboard"> <?=$_SESSION['companyinfo']['name']?></a>
			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			</ul>
		</div>
		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<i class="icon-list"></i>
						<span class="visible-xs-inline-block position-right"></span>
						<span class="status-mark border-orange-400"></span>
					</a>
					<div class="dropdown-menu dropdown-content">
						<div class="panel panel-flat">
    					<div class="table-responsive">
    						<table class="table text-nowrap table-xxs" id="pricelists_alt">
    							<thead style="background-color: #dae2e6;">
    								<tr>
    									<th><h4 class="panel-title">Price Lists</h4></th>
    									<th class="col-md-2">Unit Price</th>
    									<th class="col-md-2">Bulk Price</th>
    								</tr>
    							</thead>
    							<tbody>
    							</tbody>
    						</table>
    					</div>
    				</div>
                				<!-- /marketing campaigns -->
						<!-- <ul class="media-list dropdown-content-body width-350" style="width:650px !important; max-height:650px;">
							<div class="tabbable nav-tabs-vertical nav-tabs-right">
                <div class="tab-content">
                  <div class="tab-pane active has-padding" id="right-tab1">
                    <table class="table">
	                    <thead>
	                      <tr>
	                          <th>Item Description</th>
	                          <th class="col-sm-1">Unit Price</th>
	                          <th class="col-sm-1">Bulk</th>
	                      </tr>
	                    </thead>
                    <tbody>
                        <tr>
                            <td>
                              <h6 class="no-margin">White Shirt</h6>
                            </td>
                            <td>GHC70</td>
                            <td><span class="text-semibold">GHC3,990</span></td>
                        </tr>
                        <tr>
                            <td>
                              <h6 class="no-margin">Long Sleeve-white</h6>
                            </td>
                            <td>GHC70</td>
                            <td><span class="text-semibold">GHC840</span></td>
                        </tr>
                        <tr>
                            <td>
                              <h6 class="no-margin">Boxers White</h6>
                            </td>
                            <td>GHC70</td>
                            <td><span class="text-semibold">GHC2,170</span></td>
                        </tr>
                    </tbody>
                </table>
                      </div>
                    </div>

                    <ul class="nav nav-tabs nav-tabs-highlight" style="width:100px !important;" id="pricelists"></ul>
                  </div>
						</ul>
 -->
						<div class="dropdown-content-footer">
							<a href="#"><i class="icon-menu display-block"></i></a>
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
									<a href="#" class="media-heading text-semibold"></a>
									<span class="display-block text-muted text-size-small">Lead </span>
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
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" id="view_cart">
						<i class="icon-basket"></i>
						<span class="visible-xs-inline-block position-right">Messages</span>
						<span class="badge bg-warning-400" id="order_cart"><?=sizeof(@$_SESSION['laundry']['new_order']['orders'])?></span>
					</a>

					<div class="dropdown-menu dropdown-content">
						<div class="table-responsive">
							<table class="table table-responsive table-xxs" id="laundry_cart">
                <thead>
                  <tr style="background-color:#009688;color:#ffffff">
                    <th>Code</th>
                    <th>Service</th>
                    <th>Description</th>
                    <th>Qty</th>
                    <th>Unit</th>
                    <th>Total</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
              <div>
              	<div class="col-md-2">
              		<button class="btn btn-xs btn-danger clear_cart" style="padding:5px;">Clear All <i class="icon-trash"></i></button>
              	</div>
              	<div class="col-md-2 pull-right" style="padding:5px;">
              		<button class="btn btn-primary btn-xs pull-right" data-toggle="modal" data-target="#delivery" id="checkout">Checkout <i class="icon-forward"></i></button>
              	</div>
              </div>
						</div>
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
						<li class="divider"></li>
						<li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>
						
					</ul>
				</li>
				<li><a href="<?=base_url()?>access/logout"><i class="icon-switch2"></i> Logout</a></li>
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
	          <div class="breadcrumb-line">
	            <ul class="breadcrumb">
	              <li><a href="<?=base_url();?>dashboard"><i class="icon-home2 position-left"></i> Home</a></li>
	              <li><a href="#"><?=$page_controller?></a></li>
	              <li class="active"><a href="#"><?=$controller_function?></a></li>
	            </ul>
	          </div>
	        </div>
	        <!-- /page header -->
        <?php else : 
					endif;
				?>