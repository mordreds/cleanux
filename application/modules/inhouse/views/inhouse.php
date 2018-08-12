  <!-- Content area -->
  <div class="content">
    <!-- Main charts -->
    <div class="row">
      <div class="col-sm-6 col-md-2">
        <div class="panel panel-body panel-body-accent">
          <div class="media no-margin">
            <div class="media-left media-middle">
              <i class="icon-watch2 icon-3x text-warning-400"></i>
            </div>
            <div class="media-body text-right">
              <h3 class="no-margin text-semibold"><?=number_format(@$overdue_orders)?></h3>
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
              <h3 class="no-margin text-semibold"><?=number_format(@$pending_orders)?></h3>
              <span class="text-uppercase text-size-mini text-muted">T. Pending Orders</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-2">
        <div class="panel panel-body panel-body-accent">
          <div class="media no-margin">
            <div class="media-left media-middle" style="padding-right: 0px">
              <i class="icon-hour-glass icon-3x text-success-400"></i>
            </div>
            <div class="media-body text-right">
              <h3 class="no-margin text-semibold"><?=number_format($processing_orders)?></h3>
              <span class="text-uppercase text-size-mini text-muted">Processing Orders</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-2">
        <a href="<?=base_url()?>inhouse/cancelled_orders">
          <div class="panel panel-body panel-body-accent">
            <div class="media no-margin">
              <div class="media-left media-middle" style="padding-right: 0px">
                <i class="icon-cancel-square icon-3x text-danger-400"></i>
              </div>
              <div class="media-body text-right">
                <h3 class="no-margin text-semibold"><?=number_format(@$cancelled_orders)?></h3>
                <span class="text-uppercase text-size-mini text-muted">Cancelled Orders</span>
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-12">
        <div class="panel panel-flat">
          <div class="panel-heading" style="border-bottom: 10px solid #eeeded; padding: 10px 20px;">
            <h4 class="panel-title">All Awaiting Orders<a class="heading-elements-toggle"><i class="icon-more"></i></a></h4>
          </div>
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
 
<!-- Including Page Settings -->
<?php include("page_settings.php"); ?>
<!-- Including Page Settings -->           