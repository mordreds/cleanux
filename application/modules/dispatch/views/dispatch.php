 <!-- Content area -->
  <div class="content">
    <?php //print "<pre>"; print_r($_SESSION); print "</pre>";?>
    <!-- Main charts -->
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-flat">
          <div class="panel-body">
            <table id="dispatch_tbl" class="table table-responsive table-xs">
              <thead>
                <tr class="bg-teal-400">
                  <th>Client Name</th>
                  <th>Order No</th>
                  <th>Delivery Method</th>
                  <th>Location</th>
                  <th>Due Date</th>
                  <th>Phone No 1</th>
                  <th>Phone No 2</th>
                   <th class="text-center">Actions</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
          <!-- /individual column searching (text inputs) -->
      
    </div>
  </div>
  <!-- /main charts -->


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


<!-- Including Page Settings -->
<?php include("page_settings.php"); ?>
<!-- Including Page Settings --> 