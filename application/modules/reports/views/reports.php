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
            <div class="col-md-4">
            <div class="input-group">
            <span class="input-group-addon"><i class="icon-calendar"></i></span>
            <input type="text" class="form-control datepicker-menus hasDatepicker" placeholder="Duration" id="">
            </div>
            </div>

            <div class="col-md-4">
             <div class="input-group">
            <span class="input-group-addon"><i class="icon-search4 text-size-base"></i></span>
            <input type="text" class="form-control datepicker-menus hasDatepicker" placeholder="Staff" id="">
            </div>
            </div>
            <div class="col-md-4">
              <center>
            <button type="button" class="btn btn-primary btn-ladda btn-ladda-progress ladda-button legitRipple" data-style="zoom-in"><span class="ladda-label">Spinner + Progress</span><span class="ladda-spinner"></span><div class="ladda-progress" style="width: 180px;"></div><span class="legitRipple-ripple" style="left: 34.2361%; top: 23.6842%; transform: translate3d(-50%, -50%, 0px); width: 204.408%; opacity: 0;"></span></button>
            </div>
            </center>
            </div>
          </div>
          </div>
          <!-- /individual column searching (text inputs) -->
      
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