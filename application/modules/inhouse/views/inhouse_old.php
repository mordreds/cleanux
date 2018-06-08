

 <!-- Content area -->
  <div class="content">
    <?php //print "<pre>"; print_r($_SESSION); print "</pre>";?>
    <!-- Main charts -->
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-flat">
          <div class="panel-body">
                  <!-- Support tickets -->
                  <div class="panel panel-flat">

                    <div class="table-responsive">
                      <table class="table table-xlg text-nowrap">
                        <tbody>
                          <tr>
                            <td class="col-md-4">
                              <div class="media-left media-middle">
                                <div id="tickets-status"></div>
                              </div>

                              <div class="media-left">
                                <h5 class="text-semibold no-margin">14,327 <small class="text-success text-size-base"><i class="icon-arrow-up12"></i> (+2.9%)</small></h5>
                                <span class="text-muted"><span class="status-mark border-success position-left"></span> Jun 16, 10:00 am</span>
                              </div>
                            </td>

                            <td class="col-md-3">
                              <div class="media-left media-middle">
                                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-alarm-add"></i></a>
                              </div>

                              <div class="media-left">
                                <h5 class="text-semibold no-margin">
                                  1,132 <small class="display-block no-margin">total tickets</small>
                                </h5>
                              </div>
                            </td>

                            <td class="col-md-3">
                              <div class="media-left media-middle">
                                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-spinner11"></i></a>
                              </div>

                              <div class="media-left">
                                <h5 class="text-semibold no-margin">
                                  06:25:00 <small class="display-block no-margin">response time</small>
                                </h5>
                              </div>
                            </td>

                            <td class="text-right col-md-2">
                              <a href="#" class="btn bg-teal-400"><i class="icon-statistics position-left"></i> Report</a>
                            </td>
                          </tr>
                        </tbody>
                      </table>  
                    </div>
                  </div>
                  <!-- /support tickets -->
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="panel panel-flat">
          <div class="panel-body">
            <table id="allpending_orders" class="table table-responsive table-xs">
              <thead>
                <tr class="bg-teal-400">
                  <th>Client Name</th>
                  <th>Order No #</th>
                  <th>Total Item(s)</th>
                  <th>Due Date</th>
                  <th>Time Left</th>
                  <th>Status</th>
                  <th class="text-center">Actions</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
          <!-- /individual column searching (text inputs) -->
      
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