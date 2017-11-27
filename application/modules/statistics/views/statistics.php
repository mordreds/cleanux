 <!-- Content area -->
  <div class="content">
    <?php //print "<pre>"; print_r($_SESSION); print "</pre>";?>
    
    <!-- Main charts -->
    <div class="row">
      <div class="col-md-12">
        <!-- Individual column searching (text inputs) -->
        <legend> Garment status</legend>
          <div class="panel panel-flat">

           <table id="alluser" class="table table-responsive datatable-column-search-inputs">
              <thead>
                <tr class="bg-teal-400">
                  <th style="background-color:#405c8b;color:#ffffff">Status</th>
                    <th style="background-color:#009688;color:#ffffff">1 Day </th>
                    <th style="background-color:#509600;color:#ffffff">1 - 2 Days</th>
                    <th style="background-color:#f1d316;color:#ffffff">2 - 3 Days</th>
                    <th style="background-color:rgb(255, 153, 0);color:#ffffff">3 - 5 Days</th>
                    <th style="background-color:#f11616;color:#ffffff">5 - 10 Days</th>
                    <th style="background-color:#121213;color:#ffffff">10 - 15 Days and Beyond</th>
                  <th class="text-center">Total</th>
                   <th class="text-center">GHC</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td >Washing</td>
                    <td><i data-toggle="modal" data-target="#orders">0</i></td>
                    <td><i data-toggle="modal" data-target="#orders">1</i></td>
                    <td><i data-toggle="modal" data-target="#orders">0</i></td>
                    <td><i data-toggle="modal" data-target="#orders">1</i></td>
                    <td><i data-toggle="modal" data-target="#orders">0</i></td>
                    <td><i data-toggle="modal" data-target="#orders">5</i></td>
                  <td >7</td>
                  <td >GHC 70</td>
                      </tr>
                      <tr>
                  <td>Washing & Ironing</td>
                    <td><i data-toggle="modal" data-target="#orders">0</i></td>
                    <td><i data-toggle="modal" data-target="#orders">0</i></td>
                    <td><i data-toggle="modal" data-target="#orders">1</i></td>
                    <td><i data-toggle="modal" data-target="#orders">0</i></td>
                     <td><i data-toggle="modal" data-target="#orders">0</i></td>
                    <td><i data-toggle="modal" data-target="#orders">5</i></td>
                  <td >6</td>
                  <td >GHC 70</td>
                      </tr>
                         <tr>
                  <td>Ironing</td>
                    <td><i data-toggle="modal" data-target="#orders">0</i></td>
                    <td><i data-toggle="modal" data-target="#orders">0</i></td>
                    <td><i data-toggle="modal" data-target="#orders">1</i></td>
                    <td><i data-toggle="modal" data-target="#orders">0</i></td>
                     <td><i data-toggle="modal" data-target="#orders">0</i></td>
                    <td><i data-toggle="modal" data-target="#orders">5</i></td>
                  <td >6</td>
                  <td >GHC 70</td>
                      </tr>
                         <tr>
                  <td>Dry & Cleaning</td>
                    <td><i data-toggle="modal" data-target="#orders">0</i></td>
                    <td><i data-toggle="modal" data-target="#orders">0</i></td>
                    <td><i data-toggle="modal" data-target="#orders">1</i></td>
                    <td><i data-toggle="modal" data-target="#orders">0</i></td>
                     <td><i data-toggle="modal" data-target="#orders">0</i></td>
                    <td><i data-toggle="modal" data-target="#orders">5</i></td>
                  <td >6</td>
                  <td >GHC 70</td>
                      </tr>
              </tbody>
              <tfoot>
                 <tr class="bg-teal-400">
                  <th style="background-color:#405c8b;color:#ffffff">Status</th>
                    <th style="background-color:#009688;color:#ffffff">1 Day </th>
                    <th style="background-color:#509600;color:#ffffff">1 - 2 Days</th>
                    <th style="background-color:#f1d316;color:#ffffff">2 - 3 Days</th>
                    <th style="background-color:rgb(255, 153, 0);color:#ffffff">3 - 5 Days</th>
                    <th style="background-color:#f11616;color:#ffffff">5 - 10 Days</th>
                    <th style="background-color:#121213;color:#ffffff">10 - 15 Days and Beyond</th>
                  <th class="text-center">Total</th>
                  <th class="text-center">GHC</th>
                </tr>
              </tfoot>
            </table>

          </div>
          <!-- /individual column searching (text inputs) -->
          <legend>Flow Chart</legend>
      <!-- Combo chart -->
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

              <div class="chart-container">
                <div class="chart" id="google-combo"></div>
              </div>
            </div>
          </div>
          <!-- /combo chart -->
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
                  <th >order#</th>
                  <th >Customer</th>
                  <th > Action</th>
                  
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                 3004546
                  </td>
                  <td>Kwame</td>
                   <td><a href="<?= base_url()?>overview"><i class="icon-eye text-primary" style="font-size: 21px"></a></i></td>
                    </tr>
                    <tr>
                  <td>300676
                  </td>
                  <td>solomon</td>
                   <td><a href="<?= base_url()?>overview"><i class="icon-eye text-primary" style="font-size: 21px"></a></i></td>
                    </tr>
                   
              </tbody>
              
            </table>
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