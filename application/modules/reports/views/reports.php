 <!-- Content area -->
  <div class="content">
    <?php //print "<pre>"; print_r($_SESSION); print "</pre>";?>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-flat">
          <div class="panel-body">
            <form action="#" method="post" onsubmit="javascript(return false);">
              <div class="col-md-12">
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="display-block">Select Order Type</label>
                    <select class="form-control selectbox" id="order_type">
                      ccccccc
                      <option value="All_Orders">All Types</option>
                      <option>Pending Orders</option>
                      <option>Pending Balances</option>
                      <option>Processing Orders</option>
                      <option>Dispatch Orders</option>
                      <option>Delivered Orders</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="display-block">Select Customer</label>
                    <select class="form-control display_customers" id="customer">
                      <option value=""></option>
                      <option value="All_Customers">All Customers</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="display-block">Select Date: </label>
                    <div class="input-group">
                        <input type="text" id="daterange" name="daterange" class="form-control daterange-datemenu" value="03/18/2013 - 03/23/2013"> 
                        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                      </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="display-block"></label><br/>
                    <button type="button" id="search" class="btn bg-teal-400">Search</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="panel panel-white">
          <div class="panel-body no-padding-bottom">
            <table id="record_tbl" class="table table-responsive table-xs">
              <thead>
                <tr class="bg-slate-800">
                  <th>Customers Name</th>
                  <th>Order Number</th>
                  <th>Due Date</th>
                  <th>Delivery Method</th>
                  <th>Delivery Location</th>
                  <th>Phone #</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>

            <button type="button" class="btn btn-default btn-xs heading-btn"><i class="icon-file-check position-left"></i> Save</button>
                <a  href="<?=base_url()?>reports/printout" type="button" target="_blink" class="btn btn-default btn-xs heading-btn pull-right"><i class="icon-printer position-left"></i> Print</a>
          </div>
    </div>
  </div>
  <!-- /main charts -->




  <!-- All Users Data Table Ajax -->
  <script type="text/javascript">
    var user_status = "default";
    $('#allusers').dataTable();
  </script>
  <!-- All Users Data Table Ajax -->

  <!-- Vertical form modal -->
          <div id="history" class="modal fade">
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
          <div id="orders" class="modal fade">
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
                  <th >Select</th>
                  <th >Description</th>
                  <th > UID</th>
                  
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                  <div class="checkbox">
                  <input type="checkbox" name="single_basic_checkbox" required="required">
                  </div>
                  </td>
                  <td>T-shirt</td>
                   <td>lab123</td>
                    </tr>
                    <tr>
                  <td>
                  <div class="checkbox">
                  <input type="checkbox" name="single_basic_checkbox" required="required">
                  </div>
                  </td>
                  <td>T-shirt</td>
                   <td>lab124</td>
                    </tr>
                    <tr>
                  <td>
                  <div class="checkbox">
                  <input type="checkbox" name="single_basic_checkbox" required="required">
                  </div>
                  </td>
                  <td>Blue Shirt</td>
                   <td>lab123</td>
                    </tr>
                    <tr>
                  <td>
                  <div class="checkbox">
                  <input type="checkbox" name="single_basic_checkbox" required="required">
                  </div>
                  </td>
                  <td>white long sleeves</td>
                   <td>lab123</td>
                    </tr>
                    <tr>
                  <td>
                  <div class="checkbox">
                  <input type="checkbox" name="single_basic_checkbox" required="required">
                  </div>
                  </td>
                  <td>Blue Jeans </td>
                   <td>lab123</td>
                    </tr>
                    <tr>
                  <td>
                  <div class="checkbox">
                  <input type="checkbox" name="single_basic_checkbox" required="required">
                  </div>
                  </td>
                  <td>Black Shorts</td>
                   <td>lab123</td>
                    </tr>
              </tbody>
              
            </table>
                  </div>

                  <div class="col-sm-6 content-group" >
                  <center >
                    <h6 style="font-size:50px;font-weight:500px;margin-bottom:-20px;"><b>300324</b></h6>
                    <ul class="list-condensed list-unstyled" >
                      <li style="margin-bottom:-5px;"><span class="text-semibold" >T-Shirt-white</span></li>
                      <li style="margin-bottom:-5px;">UID:<span class="text-semibold">lad4546</span></li>
                      <li>Date:<span class="text-semibold">May 12, 2015</span></li>
                    </ul>
                      </center>
                </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Print Tags</button>
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
  <!-- Vertical form modal -->
          <div id="Finance" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h5 class="modal-title">Comment</h5>
                </div>

                <form action="#">
                  <div class="panel panel-flat">
                <div class="panel-body">
                  <div class="row">
                     
                        <div class="col-md-6">
                          <div class="form-group">
                          <label>Amount Payable</label>
                            <input type="text" placeholder="150.00" class="form-control" readonly>
                          </div>
                        </div>
                   

                        <div class="col-md-6">
                          <div class="form-group">
                           <label>Amount Paying</label>
                            <input type="text" placeholder="State/Province:" class="form-control">
                          </div>
                        </div>
                      </div>
                      </div>
              </div>

                  <div class="modal-footer">
                 <button type="submit" class="btn btn-warning pull-left">Proceed On Credit</button>
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