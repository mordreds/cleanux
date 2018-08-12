

 <!-- Content area -->
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-flat">
          <div class="panel-heading" style="border-bottom: 10px solid #eeeded; padding: 10px 20px;">
            <h4 class="panel-title">All Cancelled Orders<a class="heading-elements-toggle"><i class="icon-more"></i></a></h4>
          </div>
          <div class="panel-body">
            <table id="allcancelled_orders" class="table table-responsive table-xs">
              <thead>
                <tr class="bg-teal-400">
                  <th>Client Name</th>
                  <th>Order No #</th>
                  <th>No. Of Item(s)</th>
                  <th>Due Date</th>
                  <th>Time Left</th>
                  <th>Status</th>
                  <th class="text-center">Actions</th>
                  <th>Date Cancelled</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
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