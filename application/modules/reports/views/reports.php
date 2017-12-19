 <!-- Content area -->
  <div class="content">
    <?php //print "<pre>"; print_r($_SESSION); print "</pre>";?>
    <!-- Main charts -->
    <div class="row">
      <div class="col-md-12">
        <!-- Individual column searching (text inputs) -->
          <div class="panel panel-flat">
            <div class="panel-heading">
              <div class="heading-elements">
                <ul class="icons-list">
                  <li><a data-action="collapse"></a></li>
                  <li><a data-action="reload"></a></li>
                  <li><a data-action="close"></a></li>
                </ul>
              </div>
            </div>

            <div class="panel-body">
            
            
            <div class="col-md-12">
            <div class="col-md-3">
           <div class="form-group">
            <select class="form-control selectbox" name="" data-defaultText="saff" placeholder="staff" required>
              <option value="">Staff</option>
              <option value="Male">Completed orders</option>
              <option value="Female">processing orders</option>
              <option value="Female">Delivered orders</option>
             </select>
           </div>
           <div class="form-group">
            <select class="form-control selectbox" name="" data-defaultText="Customers" required>
              <option value="">Customers</option>
              <option value="Male">All</option>
              <option value="Female">kwame</option>
              <option value="Female">kodjo</option>
             </select>
           </div>
            </div>
             <div class="col-md-3">
              <div class="col-md-6">
                <label>From:</label>
             <div class="input-group">
            <span class="input-group-addon"><i class="icon-calendar text-size-base"></i></span>
            <input type="Date" class="form-control datepicker-menus hasDatepicker" placeholder="Date" id="">
            </div>
            </div>
            <div class="col-md-6">
              <label>To:</label>
            <div class="input-group">
            <span class="input-group-addon"><i class="icon-calendar text-size-base"></i></span>
            <input type="Date" class="form-control datepicker-menus hasDatepicker" placeholder="Date" id="">
            </div>
            </div>
            </div>
            <div class="col-md-3">
             <div class="form-group">
            <select class="form-control selectbox" name="" data-defaultText="Pending Orders" required>
              <option value="">Pending Orders</option>
              <option value="Male">Completed orders</option>
              <option value="Female">processing orders</option>
              <option value="Female">Delivered orders</option>
              <option value="Female">Pending balance</option>
             </select>
           </div>
            </div>
            <div class="col-md-3">
              <center>
            <button type="button" class="btn btn-primary btn-ladda btn-ladda-progress ladda-button legitRipple" data-style="zoom-in"><span class="ladda-label">Spinner + Progress</span><span class="ladda-spinner"></span><div class="ladda-progress" style="width: 180px;"></div><span class="legitRipple-ripple" style="left: 34.2361%; top: 23.6842%; transform: translate3d(-50%, -50%, 0px); width: 204.408%; opacity: 0;"></span></button>
            </div>
            </center>
            </div>
          </div>
          </div>
          <!-- /individual column searching (text inputs) -->
        <div class="panel panel-white">
            

            <div class="panel-body no-padding-bottom">
             

              <table id="allpending_orders" class="table table-responsive table-xs">
              <thead>
                <tr class="bg-slate-800">
                  <th>Client Name</th>
                  <th>Order No #</th>
                  <th>Total Item(s)</th>
                  <th>Due Date</th>
                  <th>Time Left</th>
                  <th>Status</th>
                </tr>
                <tr>
                  <td>nana</td>
                  <td>0002992</td>
                  <td>200</td>
                  <td>11/33/12</td>
                  <td>2 days</td>
                  <td>processing</td>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
            <table id="dispatch_tbl" class="table table-responsive table-xs ">
              <thead>
                <tr class="bg-slate-800">
                  <th>Customers Name</th>
                  <th>Order Number</th>
                  <th>Delivery Method</th>
                  <th>Delivery Location</th>
                  <th>Due Date</th>
                  <th>Phone No 1</th>
                  <th>Phone No 2</th>
                </tr>
                <tr>
                  <td>Kwame</td>
                  <td>0832938</td>
                  <td>Pickup</td>
                  <td>Accra</td>
                  <td>1/12/12</td>
                  <td>0192881292</td>
                  <td></td>
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