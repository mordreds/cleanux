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
						<i class="icon-list"></i>
						<span class="visible-xs-inline-block position-right">Get updates</span>
						<span class="status-mark border-orange-400"></span>
					</a>
					
					<div class="dropdown-menu dropdown-content">
						<div class="dropdown-content-heading">
							Price List
							<ul class="icons-list">
								<li><a href="#"><i class="icon-sync"></i></a></li>
							</ul>
						</div>

						<ul class="media-list dropdown-content-body width-350" style="width:650px !important; max-height:650px;">
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
                            <td>$70</td>
                            <td><span class="text-semibold">$3,990</span></td>
                        </tr>
                        <tr>
                            <td>
                              <h6 class="no-margin">Long Sleeve-white</h6>
                            </td>
                            <td>$70</td>
                            <td><span class="text-semibold">$840</span></td>
                        </tr>
                        <tr>
                            <td>
                              <h6 class="no-margin">Boxers White</h6>
                            </td>
                            <td>$70</td>
                            <td><span class="text-semibold">$2,170</span></td>
                        </tr>
                    </tbody>
                </table>
                      </div>

                      <div class="tab-pane has-padding" id="right-tab2">
                        Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid laeggin.
                      </div>

                      <div class="tab-pane has-padding" id="right-tab3">
                        DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg whatever.
                      </div>

                      <div class="tab-pane has-padding" id="right-tab4">
                        Aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthet.
                      </div>
                    </div>

                    <ul class="nav nav-tabs nav-tabs-highlight" style="width:100px !important;" id="pricelists"></ul>
                  </div>
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
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" id="view_cart">
						<i class="icon-basket"></i>
						<span class="visible-xs-inline-block position-right">Messages</span>
						<span class="badge bg-warning-400" id="order_cart"><?=sizeof(@$_SESSION['laundry']['new_order'])?></span>
					</a>

					<div class="dropdown-menu dropdown-content">
						<div class="table-responsive">
							<table class="table table-responsive" id="laundry_cart">
                <thead>
                  <tr style="background-color:#009688;color:#ffffff">
                    <th>Code</th>
                    <th style="width: 50%">Service</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Unit</th>
                    <th>Total</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
              <div>
              	<div class="col-md-2">
              		<button class="btn btn-xs btn-danger" id="clear_cart" style="padding:5px;">Clear All <i class="icon-trash"></i></button>
              	</div>
              	<div class="col-md-2 pull-right" style="padding:5px;">
              		<button class="btn btn-primary btn-xs pull-right" data-toggle="modal" data-target="#checkingout">Checkout <i class="icon-forward"></i></button>
              	</div>
              </div>

							<table class="table text-nowrap" style="display:none;">
								<thead>
									<tr style="background-color:#f8f8f8">
										<th colspan="3">Check out</th>
										<th class="text-right">
											<span class="badge bg-warning-400"><?=sizeof(@$_SESSION['laundry']['new_order'])?></span>
										</th>
									</tr>
								</thead>
								<?php 

								?>
								<tbody>
									<tr>
										<td class="text-center">
											<i class="icon-cross2 text-danger" style="cursor: pointer;"></i>
										</td>
										<td>
											<div class="media-left media-middle">
												<a href="#" class="btn bg-brown-400 btn-rounded btn-icon btn-xs">
													<span class="letter-icon">W</span>
												</a>
											</div>

											<div class="media-body" style="padding-top: 7px;">
												<a href="#" class="display-inline-block text-muted letter-icon-title">
													<span class="display-block text-muted">Washing</span>  
												</a>
											</div>
										</td>
										<td>
											<a href="#" class="text-default display-inline-block" style="cursor: default">
												<span class="display-block text-default">1 - 15 KG</span>
											</a>
										</td>
										<td>
											<a href="#" class="text-default display-inline-block" style="cursor: default">
												<span class="display-block text-default">GHC 500</span>
											</a>
										</td>
									</tr>
								</tbody>
							</table>
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
						<li><a href="<?=base_url()?>access/logout"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
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
          </div>
        </div>

        <!-- Vertical form modal -->
                            <td>$70</td>
                          </tr>
					<div id="modal_form_vertical" class="modal fade">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h5 class="modal-title">Vertical form</h5>
								</div>

								<form action="#">
									<div class="modal-body">
										<div class="form-group">
											<div class="row">
												<div class="col-sm-6">
													<label>First name</label>
													<input type="text" placeholder="Eugene" class="form-control">
												</div>

												<div class="col-sm-6">
													<label>Last name</label>
													<input type="text" placeholder="Kopyov" class="form-control">
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<div class="col-sm-6">
													<label>Address line 1</label>
													<input type="text" placeholder="Ring street 12" class="form-control">
												</div>

												<div class="col-sm-6">
													<label>Address line 2</label>
													<input type="text" placeholder="building D, flat #67" class="form-control">
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<div class="col-sm-4">
													<label>City</label>
													<input type="text" placeholder="Munich" class="form-control">
												</div>

												<div class="col-sm-4">
													<label>State/Province</label>
													<input type="text" placeholder="Bayern" class="form-control">
												</div>

												<div class="col-sm-4">
													<label>ZIP code</label>
													<input type="text" placeholder="1031" class="form-control">
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<div class="col-sm-6">
													<label>Email</label>
													<input type="text" placeholder="eugene@kopyov.com" class="form-control">
													<span class="help-block">name@domain.com</span>
												</div>

												<div class="col-sm-6">
													<label>Phone #</label>
													<input type="text" placeholder="+99-99-9999-9999" data-mask="+99-99-9999-9999" class="form-control">
													<span class="help-block">+99-99-9999-9999</span>
												</div>
											</div>
										</div>
									</div>

									<div class="modal-footer">
										<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary">Submit form</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<!-- /vertical form modal -->
        <!-- /page header -->
        <?php else : 
					endif;
				?>