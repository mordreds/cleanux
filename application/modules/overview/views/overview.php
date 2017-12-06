 <!-- Content area -->
  <div class="content">
    <?php //print "<pre>"; print_r(@$_SESSION['laundry']); print "</pre>";?>
    <div class="row">
      <div class="col-md-12">
          <div class="panel panel-flat">
            <div class="col-md-12">
              <div class="col-md-8">
                <div class="panel panel-flat">
                  <div class="panel-body" style="padding: 2px 10px 5px 10px;">
                    <div class="tabbable">
                      <ul class="nav nav-tabs nav-tabs-bottom" id="overview_tabs">
                        <li class="active"><a href="#client_info" data-toggle="tab" class="legitRipple">Client Info <i class="icon-user position-right"></i></a></li>
                        <li><a href="#neworder" data-toggle="tab" class="legitRipple">New Order <i class="icon-user position-right"></i></a></li>
                        <li><a href="#billing_info" data-toggle="tab" class="legitRipple">Billing Info <i class="icon-cash3 position-left text-slate"></i></a></li>
                      </ul>
                      <div class="tab-content">
                        <div class="tab-pane active" id="client_info">
                          <form action="<?=base_url()?>settings/save_client_info" method="post" onsubmit="javascript(return false)">
                            <input type="hidden" name="id"/>
                            <input type="hidden" name="update_item"/>
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
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="checkbox checkbox-switchery">
                                    <label><input type="checkbox" name="sms" class="switchery" checked>
                                      SMS Alert
                                    </label>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="checkbox checkbox-switchery">
                                    <label><input type="checkbox" name="online" class="switchery">
                                    Online Portal
                                    </label>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-5"></div>
                            <div class="col-md-1">
                              <button type="submit" class="btn btn-primary legitRipple">Save <i class="icon-database2 position-right"></i></button>
                            </div>
                            <div class="col-md-6"></div>
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
                                  <button type="button" id="add_to_others" class="btn btn-primary legitRipple">Add To List <i class="icon-database2 position-right"></i></button>
                                </div>
                                <div class="col-md-6"></div>
                              </div>
                            </div>
                          </form>
                        </div>
                        <div class="tab-pane" id="billing_info">
                          <div class="row">
                            <table id="" class="table table-xxs">
                            <thead>
                              <tr style="background-color: #009688;color:white;" > 
                                <th>Order No #</th>
                                <th>Total</th>
                                <th>Payed</th>
                                <th>Balance</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>300777</td>
                                <td>50</td>
                                <td>30</td>
                                <td>20</td>
                                <td><button  data-toggle="modal" data-target="#Payment" class="label bg-blue">Pay<i class="icon-cash3 position-right "></i></button></td>
                              </tr>
                              <tr>
                                <td>300777</td>
                                <td>50</td>
                                <td>30</td>
                                <td>20</td>
                                <td><button data-toggle="modal" data-target="#Payment" class="label bg-blue">Pay<i class="icon-cash3 position-right "></i></button> </td>
                              </tr>
                            </tbody>
                          </table>
                          </div>
                          <button type="submit" class="btn btn-primary btn-xs legitRipple">Save <i class="icon-database position-right"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="panel panel-flat">
                  <div class="panel-body"  style="padding: 2px 10px 5px 10px;">
                    <div class="tabbable">
                      <ul class="nav nav-tabs nav-tabs-bottom">
                        <li class="active"><a href="#Search" data-toggle="tab" class="legitRipple">Search <i class="icon-eye8 position-right"></i></a></li>
                        <li><a href="#Remarks" data-toggle="tab" class="legitRipple"> <i class="icon-menu7 position-left"></i> Total Orders <span class="badge bg-warning-400" id=""><?=@$total_orders?></span></a></li>                  
                      </ul>
                      <div class="tab-content">
                        <div class="tab-pane active" id="Search">
                          <div class="panel panel-flat">
                            <div class="panel-body">
                              <div class="form-group">
                                <input type="text" id="search_text" value="<?=@$new_client_number?>" placeholder="Order Number or Phone Number :" class="form-control">
                              </div>
                              <button type="button" class="btn btn-primary" id="search_submit">Search  <i class="icon-search4 position-right"></i></button>
                              <button type="button" class="btn btn-danger clear_cart">Clear Record <i class="icon-x position-right"></i></button>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="Remarks" style="margin-top:-33px;">
                          <table id="todays_order" class="table table-xs">
                            <thead>
                              <tr style="background-color:#009688;color:#ffffff"> 
                                <th>Order No #</th>
                                <th>Total Cost</th>
                                <th>Time</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>300777</td>
                                <td>Kwesi</td>
                                <td>1000</td>
                              </tr>
                            </tbody>
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
              <div class="table-responsive">
                <table class="table table-xxs" id="pending_order_table">
                  <thead>
                    <tr style="background-color:#009688;color:#ffffff">
                      <th>Order #</th>
                      <th>Total Cost</th>
                      <th>Status</th>
                      <th>Date</th>
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

          <div id="comment" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h5 class="modal-title">Comment</h5>
                </div>

                <form action="#">
                  <div class="panel panel-flat">
                <div class="panel-body">
                  <div class="form-group">
                        <textarea rows="6" cols="5" class="form-control" placeholder="Enter your message here"></textarea>
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

  <!-- Including Page Settings -->
  <?php include("page_settings.php"); ?>
  <!-- Including Page Settings -->      
           