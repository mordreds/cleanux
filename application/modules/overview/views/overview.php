 <!-- Content area -->
 <?php //print_r($_SESSION['laundry']); ?>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
          <div class="panel panel-flat">
            <div class="col-md-12">
              <div class="col-md-7">
                <div class="panel panel-flat">
                  <div class="panel-body" style="padding: 2px 10px 5px 10px;">
                    <div class="tabbable">
                      <ul class="nav nav-tabs nav-tabs-bottom" id="overview_tabs">
                        <li class="active"><a href="#client_info" data-toggle="tab" class="legitRipple">Client Info <i class="icon-user position-right"></i></a></li>
                        <li><a href="#neworder" data-toggle="tab" class="legitRipple">New Order <i class="icon-user position-right"></i></a></li>
                        <!-- <li><a href="#billing_info" data-toggle="tab" class="legitRipple">Billing Info <i class="icon-cash3 position-left text-slate"></i></a></li> -->
                      </ul>
                      <div class="tab-content">
                        <div class="tab-pane active" id="client_info">
                          <form action="<?=base_url()?>settings/save_client_info" method="post">
                            <input type="hidden" name="id"/>
                            <input type="hidden" name="update_item"/>
                            
                            <div id="client_submit_form" class="col-md-12">
                              <div class="">
                                <div class="col-md-4 col-sm-4">
                                  <div class="form-group">
                                    <input type="text" name="fullname" placeholder="Full Name :" class="form-control" required>
                                  </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="form-group">
                                    <input type="text" name="company_name" placeholder="Company Name (optional) :" class="form-control">
                                  </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="form-group">
                                    <input type="text" style="display:none" name="gender_alt" class="form-control" readonly >
                                    <select class="form-control selectbox" name="gender" data-defaultText="Gender" required>
                                      <option value="">Select One</option>
                                      <option value="Male">Male</option>
                                      <option value="Female">Female</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="">
                                <div class="col-md-4 col-sm-4">
                                  <div class="form-group">
                                    <input type="text" name="residence_addr" placeholder="Residence Address" class="form-control" required>
                                  </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="form-group">
                                    <input type="text" name="postal_addr" placeholder="Postal Address" class="form-control">
                                  </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="form-group">
                                    <input type="email" name="email" placeholder="Email Address:" class="form-control">
                                  </div>
                                </div>
                              </div>
                              <div class="">
                                <div class="col-md-4 col-sm-4">
                                  <div class="form-group">
                                    <input type="text" name="primary_tel" placeholder="Phone No #1:" class="form-control" minlength="10" required>
                                  </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="form-group">
                                    <input type="text" name="secondary_tel" placeholder="Phone No #2:" class="form-control">
                                  </div>
                                </div>
                                <div class="col-md-1" style="margin-right: 25px">
                                  <div class="form-group">
                                    <div class="checkbox checkbox-switchery">
                                      <label><input type="checkbox" name="sms" class="switchery" checked>
                                        SMS
                                      </label>
                                    </div>
                                  </div>
                                </div>
                                <!-- <div class="col-md-1" style="margin-right: 22px">
                                  <div class="form-group">
                                    <div class="checkbox checkbox-switchery">
                                      <label><input type="checkbox" name="email_alert" class="switchery" disabled>
                                      Email 
                                      </label>
                                    </div>
                                  </div>
                                </div> -->
                                <div class="col-md-1">
                                  <div class="form-group">
                                    <div class="checkbox checkbox-switchery">
                                      <label><input type="checkbox" name="online" class="switchery" disabled>
                                       Portal
                                      </label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-5"></div>
                              <div class="col-md-1">
                                <button id="save_btn" type="submit" class="btn btn-primary legitRipple">Save <i class="icon-database2 position-right"></i></button>
                              </div>
                              <div class="col-md-6"></div>
                            </div>
                            
                            <div class="col-md-12" id="client_summary_info" style="display:none">
                              <div class="col-md-4">
                                <div class="panel-body bg-teal border-radius-top text-center" style="padding: 7px">
                                    <ul class="list-inline no-margin-bottom">
                                      <li><a href="#" class="btn bg-teal-700 btn-rounded btn-icon legitRipple"><i class="icon-phone"></i></a></li>
                                      <li><a href="#" class="btn bg-teal-700 btn-rounded btn-icon legitRipple"><i class="icon-office"></i></a></li>
                                      <li><a href="#" class="btn bg-teal-700 btn-rounded btn-icon legitRipple"><i class="icon-mailbox"></i></a></li>
                                      <li><a href="#" class="btn bg-teal-700 btn-rounded btn-icon legitRipple"><i class="icon-envelop4"></i></a></li>
                                    </ul>
                                  </div>

                                   <div class="panel panel-body no-border-top no-border-radius-top">
                                    <div class="form-group mt-5">
                                      <label class="text-semibold">Phone No #:</label>
                                      <span class="pull-right-sm"><a href="" id="client_phone">phone No #1 / phone No #2</a></span>
                                    </div>

                                    <div class="form-group">
                                      <label class="text-semibold">Company :</label>
                                      <span class="pull-right-sm"><a href="#" id="client_company_info">Company Name</a></span>
                                    </div>

                                    <div class="form-group">
                                      <label class="text-semibold">Postal Addr :</label>
                                      <span class="pull-right-sm"><a href="#" id="client_postal">corporate@domain.com</a></span>
                                    </div>

                                    <div class="form-group no-margin-bottom">
                                      <label class="text-semibold">Email:</label>
                                      <span class="pull-right-sm"><a href="#" id="client_email">personal@domain.com</a></span>
                                    </div>
                                  </div> 
                              </div>
                              <div class="col-md-4">
                                <div class="thumbnail">
                                  <div class="thumb thumb-rounded">
                                    <img src="<?=base_url()?>/resources/images/users/default.png" alt="">
                                  </div>

                                  <div class="caption text-center">
                                    <h6 class="text-semibold no-margin client_name">James Alexander</h6>
                                    <small class="display-block client_residence">Lead developer</small>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="panel panel-body no-border-top no-border-radius-top">
                                  <div class="row text-center">
                                    <div class="col-xs-4">
                                      <p><i class="icon-basket icon-2x display-inline-block text-info"></i></p>
                                      <h5 class="text-semibold no-margin client_pending_orders">2,345</h5>
                                      <span class="text-muted text-size-small">Pending</span>
                                    </div>

                                    <div class="col-xs-4">
                                      <p><i class="icon-point-up icon-2x display-inline-block text-warning"></i></p>
                                      <h5 class="text-semibold no-margin client_completed_orders">3,568</h5>
                                      <span class="text-muted text-size-small">Completed</span>
                                    </div>

                                    <div class="col-xs-4">
                                      <p><i class="icon-cash3 icon-2x display-inline-block text-success"></i></p>
                                      <h5 class="text-semibold no-margin client_total_balance">$9,693</h5>
                                      <span class="text-muted text-size-small">Balance</span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>
                        <div class="tab-pane" id="neworder">
                          <form action="" method="post">
                            <div class="">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="display-block">Select Service <span class="text-danger">*</span></label>
                                  <select id="serivce_onchange" class="form-control display_services" name="service_id" >
                                    <option value="">Select One</option>
                                  </select>
                                </div>
                              </div>
                              <div id="washing_requiredFields" style="display:none">
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label class="display-block">Select Weight <span class="text-danger">*</span></label>
                                    <select id="weight_onchange" class="form-control display_weights" name="weight_id">
                                      <option value="">Select One</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label class="display-block">Unit Price <span class="text-danger">*</span></label>
                                    <input type="number" name="weight_price" class="form-control" readonly>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label class="display-block">Item(s) Description <span class="text-danger">*</span></label>
                                    <input type="text" name="weight_item_description" class="form-control">
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label class="display-block">Total No. Of Item(s) <span class="text-danger">*</span></label>
                                    <input type="number" name="weight_item_quantity" class="form-control" min="1">
                                  </div>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-5"></div>
                                <div class="col-md-1">
                                  <button type="button" id="add_to_weight" class="btn btn-primary legitRipple">Add To List <i class="icon-database2 position-right"></i></button>
                                </div>
                                <div class="col-md-6"></div>
                              </div>
                              <div id="other_requiredFields" style="display:none">
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label class="display-block">Select Garment <span class="text-danger">*</span></label>
                                    <select id="garment_onchange" class="form-control display_garments" name="garment_id">
                                      <option value="">Select One</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label class="display-block">Unit Price <span class="text-danger">*</span></label>
                                    <input type="number" name="garment_price" class="form-control" readonly>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label class="display-block">Total No. Of Items <span class="text-danger">*</span></label>
                                      <input type="number" name="total_no_garments" class="form-control" min="1">
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-5"></div>
                                <div class="col-md-1">
                                  <button type="button" data-action="reload" id="add_to_others" class="btn btn-primary legitRipple">Add To List <i class="icon-database2 position-right"></i></button>
                                </div>
                                <div class="col-md-6"></div>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-5">
                <div class="panel panel-flat">
                  <div class="panel-body"  style="padding: 2px 10px 5px 10px;">
                    <div class="tabbable">
                      <ul class="nav nav-tabs nav-tabs-bottom">
                        <li class="active"><a href="#search" data-toggle="tab" class="legitRipple">Search <i class="icon-eye8 position-right"></i></a></li>
                        <li><a href="#orders" data-toggle="tab" class="legitRipple"> <i class="icon-menu7 position-left"></i> Today's Orders <span class="badge bg-warning-400" id=""><?=@$total_orders?></span></a></li>
                        <li><a href="#customers" data-toggle="tab" class="legitRipple">Customers <i class="icon-users position-right"></i></a></li>                  
                      </ul>
                      <div class="tab-content">
                        <div class="tab-pane active" id="search">
                          <div class="panel panel-flat">
                            <div class="panel-body">
                              <div class="form-group">
                                <input type="text" id="search_text" value="<?=@$new_client_number?>" placeholder="Order Number or Phone Number :" class="form-control">
                              </div>
                              <button type="button" data-action="reload" class="btn btn-primary" id="search_submit">Search  <i class="icon-search4 position-right"></i></button>
                              <form action="<?=base_url()?>overview/clear_record" method="post" style="display:inline">
                                <button type="submit" class="btn btn-warning pull-right">Clear Record <i class="icon-x position-right"></i></button>
                              </form>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="orders" style="margin-top:-33px;">
                          <table id="todays_order" class="table table-xs">
                            <thead>
                              <tr style="background-color:#009688;color:#ffffff"> 
                                <th>Order #</th>
                                <th>Total Cost</th>
                                <th>Time</th>
                              </tr>
                            </thead>
                            <tbody></tbody>
                          </table>    
                        </div>
                        <div class="tab-pane" id="customers" style="margin-top:-33px;">
                          <table id="allcustomers" class="table datatable-responsive table-xxs">
                            <thead>
                              <tr class="bg-teal-400">
                                <th>Full name</th>
                                <th>Phone No #</th>
                                <th class="text-center">Actions</th>
                              </tr>
                            </thead>
                            <tbody></tbody>
                          </table>    
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12" id="pending_order_table_display" style="display:none">
            <div class="panel panel-flat">
              <div class="panel-heading">
                <h4 class="panel-title">Pending Orders<a class="heading-elements-toggle"><i class="icon-more"></i></a></h4>
              </div>
            
              <div class="table-responsive">
                <table class="table table-xxs" id="pending_order_table">
                  <thead>
                    <tr style="background-color:#009688;color:#ffffff">
                      <th>Order #</th>
                      <th>Total Cost</th>
                      <th>Amount Paid</th>
                      <th>Balance</th>
                      <th>Delivery Method</th>
                      <th>Status</th>
                      <th>Date Of Order</th>
                      <th>Due Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
  <!-- /main charts -->   

  <!-- Including Page Settings -->
  <?php include("page_settings.php"); ?>
  <!-- Including Page Settings -->      
           