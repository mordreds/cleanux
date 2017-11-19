 <!-- Content area -->
  <div class="content">
    <?php //print "<pre>"; print_r(@$_SESSION['laundry']); print "</pre>";?>
    <!-- Main charts -->
    <div class="row">
      <div class="col-md-12">
        <!-- Individual column searching (text inputs) -->
          <div class="panel panel-flat">
            
            <div class="col-md-12">
              <div class="col-md-8">
              <div class="panel panel-flat">
                <div class="panel-body">
                  <div class="tabbable">
                    <ul class="nav nav-tabs nav-tabs-bottom" id="overview_tabs">
                      <li class="active"><a href="#client_info" data-toggle="tab" class="legitRipple">Client Info <i class="icon-user position-right"></i></a></li>
                      <li><a href="#neworder" data-toggle="tab" class="legitRipple">New Order <i class="icon-user position-right"></i></a></li>
                      <li><a href="#right-icon-tab3" data-toggle="tab" class="legitRipple">Billing Info<i class="icon-cash3 position-left text-slate"></i></a></li>
                    </ul>
                    <div class="tab-content">
                      <div class="tab-pane active" id="client_info">
                        <form action="<?=base_url()?>settings/save_client_info" method="post" onsubmit="javascript(return false)">
                          <input type="hidden" name="id"/>
                          <input type="hidden" name="update_item"/>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <input type="text" name="fullname" placeholder="Full Name :" class="form-control" required>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <input type="text" name="company_name" placeholder="Company Name (optional) :" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <input type="text" name="residence_addr" placeholder="Residence Address" class="form-control" required>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <input type="text" name="postal_addr" placeholder="Postal Address" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <input type="text" name="primary_tel" placeholder="Phone No #1:" class="form-control" minlength="10" required>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <input type="text" name="secondary_tel" placeholder="Phone No #2:" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <input type="email" name="email" placeholder="Email:" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <div class="checkbox checkbox-switchery">
                                  <label><input type="checkbox" name="sms" class="switchery" checked>
                                    SMS Arlet
                                  </label>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <div class="checkbox checkbox-switchery">
                                  <label><input type="checkbox" name="online" class="switchery">
                                    Online Access
                                  </label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <button type="submit" class="btn btn-primary legitRipple">Save <i class="icon-database2 position-right"></i></button>
                        </form>
                      </div>
                      <div class="tab-pane" id="neworder">
                        <form action="" method="post">
                          <div class="row">
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
                      <div class="tab-pane" id="right-icon-tab3">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                            <label>Amount Payable</label>
                              <input type="text" placeholder="150.00" class="form-control" readonly>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                             <label>Outstanding Balance</label>
                              <input type="text" placeholder="50.00" class="form-control" readonly>
                            </div>
                          </div>
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
                <div class="panel-body">
                  <div class="tabbable">
                    <ul class="nav nav-tabs nav-tabs-bottom">
                      <li class="active"><a href="#Search" data-toggle="tab" class="legitRipple">Search <i class="icon-eye8 position-right"></i></a></li>
                      <li><a href="#Remarks" data-toggle="tab" class="legitRipple">Order History<i class="icon-menu7 position-left"></i></a></li>                  
                    </ul>
                    <div class="tab-content">
                      <div class="tab-pane active" id="Search">
                        <div class="panel panel-flat">
                          <div class="panel-body">
                            <div class="form-group">
                              <input type="text" id="search_text" value="<?=@$new_client_number?>" placeholder="Order Number or Phone Number :" class="form-control">
                            </div>
                            <button type="button" class="btn btn-primary" id="search_submit">Search  <i class="icon-search4 position-right"></i></button>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane" id="Remarks">
                        <table  class="table">
                          <tbody>
                            <tr>
                              <td>300777</td>
                              <td>GHC 340</td>
                                </tr>
                                <tr>
                             <td>300777</td>
                              <td>GHC 340</td>
                                </tr>
                                <tr>
                              <td>300777</td>
                              <td>GHC 340</td>
                                </tr>
                                <tr>
                              <td>300777</td>
                              <td>GHC 340</td>
                                </tr>
                                <tr>
                              <td>300777</td>
                              <td>GHC 340</td>
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
        <!--    <div class="col-md-4">

              <div class="panel panel-flat">
                <div class="panel-body">
                  <div class="form-group">
                    <input type="text" id="search_text" value="<?=@$new_client_number?>" placeholder="Order Number or Phone Number :" class="form-control">
                  </div>
                  <button type="button" class="btn btn-primary" id="search_submit">Search  <i class="icon-search4 position-right"></i></button>
                </div>
              </div>
            </div>-->
          </div>
          <div class="col-md-12" style="display:none">
            <div class="panel panel-flat">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr style="background-color:#009688;color:#ffffff">
                      <th>Order #</th>
                      <th>Description</th>
                      <th>Quantity</th>
                      <th>unit price</th>
                      <th>Total price</th>
                      <th>Status</th>
                      <th>Tax</th>
                      <th>Comment</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>300120</td>
                      <td>T-shirt</td>
                      <td>3</td>
                      <td>5.00</td>
                      <td>15.00</td>
                      <td><i data-toggle="modal" data-target="#modal_form_vertical">Dispatched</i></td>
                      <td>5.00</td>
                      <td  data-toggle="modal" data-target="#comment">Comment(1)</td>
                    </tr>
                     <tr>
                      <td>300123</td>
                      <td>T-shirt</td>
                      <td>3</td>
                      <td>5.00</td>
                      <td>15.00</td>
                      <td><i data-toggle="modal" data-target="#modal_form_vertical">Dispatched</i></td>
                      <td>5.00</td>
                      <td  data-toggle="modal" data-target="#comment"><b style="color:red">Comment(1)</b></td>
                    </tr>
                 
                  </tbody>
                </table>
              </div>
            </div>
            </div>
          </div>
    </div>
  </div>
  <!-- /main charts -->

  <!-- All Users Data Table Ajax -->
  <script type="text/javascript">
    var user_status = "default";
    $('#allusers').dataTable({
        ajax: '<?= base_url()?>administration/retrieve_allusers',
        columns: [
          {data: "firstname"},
          {data: "lastname"},
          {data: "email"},
          {data: "group_name"},
          {data: "status", render: function(data,type,row,meta) { 
            if(row.status == "active") {
              label_class = "label-success";
              user_status = row.status;
            }
            else if(row.status == "inactive"){
              label_class = "label-danger";
              user_status = row.status;
            }

            return '<span class="label '+label_class+'">'+row.status+'</span>'}
          },
          {data: "id", render: function(data,type,row,meta) { 
            if(user_status == "active") {
              button = '<ul class="icons-list"><li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu9"></i></a><ul class="dropdown-menu dropdown-menu-right"><li><a href="#"><i class="icon-file-pdf"></i> Export to .pdf</a></li><li><a href="#"><i class="icon-file-excel"></i> Export to .csv</a></li><li><a href="#"><i class="icon-file-word"></i> Export to .doc</a></li></ul></li></ul>';
            } 
            else if(user_status == "inactive") {
              button = "<button type='submit' name='activate_user' class='btn btn-success btn-xs'><i class='fa fa-unlock'></i> Activate</button>";
            }
            return button; }
          },
        ],
    });
 // Alert dialog

  </script>
  <!-- All Users Data Table Ajax -->

<!-- Vertical form modal -->
          <div id="modal_form_vertical" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  
                </div>

                <form action="#">
                  <div class="modal-body">
                    <table id="alluser" class="table ">
              <thead>
                <tr class="bg-teal-400">
                  <th >Status</th>
                  <th >Last Name</th>
                  
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Check-In</td>
                  <td>Bismark</td>
                  
                    </tr>
                    <tr>
                  <td>Finance verified</td>
                  <td>Bismark</td>
                  
                    </tr>
                    <tr>
                  <td>Washing & Drying</td>
                  <td>Bismark</td>
                  
                    </tr>
                    <tr>
                  <td>Pressing & Folding</td>
                  <td>Bismark</td>
                  
                    </tr>
                    <tr>
                  <td>Dispatched</td>
                  <td>Bismark</td>
                  
                    </tr>
              </tbody>
              
            </table>
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                  
                  </div>
                </form>
              </div>
            </div>
          </div>
  <!-- Vertical form modal -->
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
           