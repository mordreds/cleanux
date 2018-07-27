  <!-- Content area -->
  <div class="content">
    <!-- Main charts -->
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-3">
          <!-- Available hours -->
          <div class="panel text-center">
            <div class="panel-body">
              <div class="content-group ">
                <h5 class="text-semibold no-margin"><a href="#" class="btn border-pink text-pink btn-flat btn-rounded btn-icon btn-xs legitRipple"><i class="icon-statistics"></i></a> 5,689</h5>
                <span class="text-muted text-size-small">laundry Pending</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <!-- Available hours -->
          <div class="panel text-center">
            <div class="panel-body">
              <div class="content-group">
                <h5 class="text-semibold no-margin"><a href="#" class="btn border-blue text-blue btn-flat btn-rounded btn-icon btn-xs legitRipple"><i class="icon-statistics"></i></a> 5,689</h5>
                <span class="text-muted text-size-small">laundry Processing</span>
              </div>
            </div>
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