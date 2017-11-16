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

                    <ul class="nav nav-tabs nav-tabs-highlight" style="width:100px !important;">
                      <li class="active"><a href="#right-tab1" data-toggle="tab"><span class="label label-info pull-right">Services</span> Washing</a></li>
                      <li><a href="#right-tab2" data-toggle="tab"><span class="label label-info pull-right">Services</span> Ironing</a></li>
                       <li><a href="#right-tab3" data-toggle="tab"><span class="label label-info pull-right">Fixed</span> Delivery</a></li>
                    </ul>
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
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" id="view_chart">
						<i class="icon-basket"></i>
						<span class="visible-xs-inline-block position-right">Messages</span>
						<span class="badge bg-warning-400" id="order_chart"><?=sizeof(@$_SESSION['laundry']['new_order'])?></span>
					</a>

					<div class="dropdown-menu dropdown-content">
						<div class="table-responsive">
							<table class="table table-responsive" style="margin-top: 2px" id="laundry_chart">
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
              		<button class="btn btn-xs btn-danger" style="padding:5px;">Clear All <i class="icon-trash"></i></button>
              	</div>
              	<div class="col-md-2 pull-right" style="padding:5px;">
              		<button class="btn btn-primary btn-xs pull-right" data-toggle="modal" data-target="#checkout">Checkout <i class="icon-forward"></i></button>
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

	<!-- Secondary navbar --
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
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <!-- data-hover="dropdown"> --
						<i class="icon-make-group position-left"></i> <?=$key?>
						<!-- <span class="badge badge-inline badge-warning position-right">47</span
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
				<!--	<li class="dropdown">
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
					</li>-->
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
          <div id="modal_form_vertical" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  
                </div>
                <div class="row" style="padding:20px;">
                <div class="col-sm-6 content-group">
                  <img src="" class="content-group mt-10" alt="" style="width: 120px;">
                  <ul class="list-condensed list-unstyled">
                    <li>2269 Elba Lane</li>
                    <li>Paris, France</li>
                    <li>888-555-2311</li>
                  </ul>
                </div>
                <div class="col-sm-6 content-group">
                  <div class="invoice-details">
                    <h5 class="text-uppercase text-semibold">Order #300324</h5>
                    <ul class="list-condensed list-unstyled">
                      <li>Date: <span class="text-semibold">January 12, 2015</span></li>
                      <li>Due date: <span class="text-semibold">May 12, 2015</span></li>
                    </ul>
                  </div>
                </div>
                <form action="#">
                  <div class="modal-body">
                    <div class="table">
                <table class="table">
                    <thead>
                        <tr>
                        <th>#</th>
                            <th>Item Description</th>
                            <th class="col-sm-1">Unit Price</th>
                            <th class="col-sm-1">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>1</td>
                            <td>
                              <h6 class="no-margin">Create UI design model</h6>
                            </td>
                            <td>$70</td>
                            <td><span class="text-semibold">$3,990</span></td>
                        </tr>
                        <tr>
                        <td>2</td>
                            <td>
                              <h6 class="no-margin">Support tickets list doesn't support commas</h6>
                            </td>
                            <td>$70</td>
                            <td><span class="text-semibold">$840</span></td>
                        </tr>
                        <tr>
                        <td>3</td>
                            <td>
                              <h6 class="no-margin">Fix website issues on mobile</h6>
                            </td>
                            <td>$70</td>
                            <td><span class="text-semibold">$2,170</span></td>
                        </tr>
                    </tbody>
                </table>
                
            </div>
                  </div>
                   <div class="col-sm-7">
                  <span class="text-muted">Invoice To:</span>
                  <ul class="list-condensed list-unstyled">
                    <li><h5>Rebecca Manes</h5></li>
                    <li><span class="text-semibold">Normand axis LTD</span></li>
                    <li>888-555-2311</li>
                    <li><a href="#">rebecca@normandaxis.ltd</a></li>
                  </ul>
                </div>
                <div class="col-sm-5">
                  <div class="content-group">
                    <h6>Total due</h6>
                    <div class="table-responsive no-border">
                      <table class="table">
                        <tbody>
                          <tr>
                            <th>Subtotal:</th>
                            <td class="text-right">$7,000</td>
                          </tr>
                          <tr>
                            <th>Tax: <span class="text-regular">(25%)</span></th>
                            <td class="text-right">$1,750</td>
                          </tr>
                          <tr>
                            <th>Total:</th>
                            <td class="text-right text-primary"><h5 class="text-semibold">$8,750</h5></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                    <div class="text-right">
                      <button type="button" class="btn btn-primary btn-labeled legitRipple"><b><i class="icon-paperplane"></i></b> Send invoice</button>
                    </div>
                  </div>
                </div>
                </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-xs heading-btn legitRipple"><i class="icon-printer position-left"></i> Print</button>
                  
                  </div>
                </form>
              </div>
            </div>
          </div>
        <!-- /page header -->
        <?php else : 
					endif;
				?>