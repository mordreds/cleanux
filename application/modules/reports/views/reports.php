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
                      <option value="No Selection"><em>Select One</em></option>
                      <option value="All Orders">All Types</option>
                      <option>Pending Orders</option>
                      <option>Pending Balances</option>
                      <option>Processing Orders</option>
                      <option>Dispatch Orders</option>
                      <option>Delivered Orders</option>
                      <option>Cancelled Orders</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="display-block">Select Customer</label>
                    <select class="form-control display_customers" id="customer">
                      <option value="No Selection"></option>
                      <option value="All Customers">All Customers</option>
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
        <div class="panel panel-white" id="search_result" style="display:none">
          <div class="panel-body no-padding-bottom">
            <table id="record_tbl" class="table table-responsive table-xs">
              <thead>
                <tr class="bg-slate-800">
                  <th>Customers Name</th>
                  <th>Order Number</th>
                  <th>Balance</th>
                  <th>Due Date</th>
                  <th>Delivery Method</th>
                  <th>Delivery Location</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
      </div>
  <!-- /main charts -->

<!-- Including Page Settings -->
<?php include("page_settings.php"); ?>
<!-- Including Page Settings -->      