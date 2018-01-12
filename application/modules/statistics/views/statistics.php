 <!-- Content area -->
  <div class="content">
    <?php //print "<pre>"; print_r($_SESSION); print "</pre>";?>
    <!-- Main charts -->
    <div class="row">
      <div class="col-sm-6 col-md-2">
        <div class="panel panel-body panel-body-accent">
          <div class="media no-margin">
            <div class="media-left media-middle">
              <i class="icon-hour-glass2 icon-3x text-info-400"></i>
            </div>

            <div class="media-body text-right">
              <h3 class="no-margin text-semibold"><?=number_format($pending_orders)?></h3>
              <span class="text-uppercase text-size-mini text-muted">Pending Orders </span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-2">
        <div class="panel panel-body panel-body-accent">
          <div class="media no-margin">
            <div class="media-left media-middle">
              <i class="icon-watch2 icon-3x text-warning-400"></i>
            </div>

            <div class="media-body text-right">
              <h3 class="no-margin text-semibold"><?=number_format($overdue_orders)?></h3>
              <span class="text-uppercase text-size-mini text-muted">OverDue Orders </span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-2">
        <div class="panel panel-body panel-body-accent">
          <div class="media no-margin">
            <div class="media-left media-middle" style="padding-right: 0px">
              <i class="icon-basket icon-3x text-success-400"></i>
            </div>
            <div class="media-body text-right">
              <h3 class="no-margin text-semibold"><?=number_format($month_orders)?></h3>
              <span class="text-uppercase text-size-mini text-muted">Successful Orders</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-2">
        <div class="panel panel-body panel-body-accent">
          <div class="media no-margin">
            <div class="media-left media-middle" style="padding-right: 0px">
              <i class="icon-truck icon-3x text-warning-400"></i>
            </div>
            <div class="media-body text-right">
              <h3 class="no-margin text-semibold"><?=number_format($pending_orders)?></h3>
              <span class="text-uppercase text-size-mini text-muted">OverDue Delivery </span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-2">
        <div class="panel panel-body panel-body-accent">
          <div class="media no-margin">
            <div class="media-left media-middle">
              <i class="icon-basket icon-3x text-success-400"></i>
            </div>
            <div class="media-body text-right">
              <h3 class="no-margin text-semibold"><?=number_format($month_orders)?></h3>
              <span class="text-uppercase text-size-mini text-muted">Total Orders </span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-2">
        <div class="panel panel-body panel-body-accent">
          <div class="media no-margin">
            <div class="media-left media-middle">
              <i class="icon-cash2 icon-3x text-success-400"></i>
            </div>
            <div class="media-body text-right">
              <h3 class="no-margin text-semibold"><?=number_format($month_orders)?></h3>
              <span class="text-uppercase text-size-mini text-muted">Total Sales</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-2">
        <div class="panel panel-body text-center">
          <h6 class="text-semibold no-margin-bottom mt-5">Orders in April</h6>
          <div class="text-size-small text-muted content-group-sm">+24% since 2016</div>
          <div class="svg-center" id="donut_basic_stats"></div>
          <div class="row text-center">
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">23,568</h5>
                <span class="text-muted text-size-small">Revenue</span>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">$9,464</h5>
                <span class="text-muted text-size-small">Tax</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12">

        <div class="panel panel-body col-xs-9">
          <div class="row text-center">
            <div class="col-xs-2">
              <p><i class="icon-hour-glass3 icon-2x display-inline-block text-info"></i></p>
              <h5 class="text-semibold no-margin"><?=number_format($pending_orders)?></h5>
              <span class="text-muted text-size-small">Pending Orders</span>
            </div>
            <div class="col-xs-2">
              <p><i class="icon-hour-glass2 icon-2x display-inline-block text-info"></i></p>
              <h5 class="text-semibold no-margin"><?=number_format($pending_orders)?></h5>
              <span class="text-muted text-size-small">Processing Orders</span>
            </div>
            <div class="col-xs-2">
              <p><i class="icon-watch2 icon-2x display-inline-block text-danger"></i></p>
              <h5 class="text-semibold no-margin"><?=number_format($pending_orders)?></h5>
              <span class="text-muted text-size-small">Overdue Orders</span>
            </div>
            <div class="col-xs-2">
              <p><i class="icon-truck icon-2x display-inline-block text-danger"></i></p>
              <h5 class="text-semibold no-margin"><?=number_format($pending_orders)?></h5>
              <span class="text-muted text-size-small">Overdue Dispatch</span>
            </div>
            <div class="col-xs-2">
              <p><i class="icon-cart5 icon-2x display-inline-block text-success"></i></p>
              <h5 class="text-semibold no-margin"><?=number_format($month_orders)?></h5>
              <span class="text-muted text-size-small">Successful Orders</span>
            </div>
            <div class="col-xs-2">
              <p><i class="icon-cash2 icon-2x display-inline-block text-success"></i></p>
              <h5 class="text-semibold no-margin">GHC 9,693</h5>
              <span class="text-muted text-size-small">Daily Sales</span>
            </div>
          </div>
        </div>
        <div class="panel panel-body col-xs-3">
          <div class="row text-center">
            <div class="col-xs-6">
              <p><i class="icon-users2 icon-2x display-inline-block text-info"></i></p>
              <h5 class="text-semibold no-margin"><?=number_format($total_users)?></h5>
              <span class="text-muted text-size-small">users</span>
            </div>
            <div class="col-xs-6">
              <p><i class="icon-users4 icon-2x display-inline-block text-warning"></i></p>
              <h5 class="text-semibold no-margin"><?=number_format($total_customers)?></h5>
              <span class="text-muted text-size-small">Customers</span>
            </div>
          </div>
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