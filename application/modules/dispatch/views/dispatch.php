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
              <span class="text-uppercase text-size-mini text-muted">OverDue Delivery </span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-2">
        <div class="panel panel-body panel-body-accent">
          <div class="media no-margin">
            <div class="media-left media-middle" style="padding-right: 0px">
              <i class="icon-spinner icon-3x text-warning-400"></i>
            </div>
            <div class="media-body text-right">
              <h3 class="no-margin text-semibold"><?=number_format(@$pending_orders)?></h3>
              <span class="text-uppercase text-size-mini text-muted">Pending Delivery</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-2">
        <a href="<?=base_url()?>dispatch/delivered">
          <div class="panel panel-body panel-body-accent">
            <div class="media no-margin">
              <div class="media-left media-middle" style="padding-right: 0px">
                <i class="icon-truck icon-3x text-success-400"></i>
              </div>
              <div class="media-body text-right">
                <h3 class="no-margin text-semibold"><?=number_format(@$delivered_orders)?></h3>
                <span class="text-uppercase text-size-mini text-muted">Successful Delivery</span>
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-12">
        <div class="panel panel-flat">
          <div class="panel-heading" style="border-bottom: 10px solid #eeeded; padding: 10px 20px;">
            <h4 class="panel-title">Dispatch Orders<a class="heading-elements-toggle"><i class="icon-more"></i></a></h4>
          </div>
          <div class="panel-body">
            <table id="dispatch_tbl" class="table table-responsive table-xs">
              <thead>
                <tr class="bg-teal-400">
                  <th>Client Name</th>
                  <th>Order No</th>
                  <th>Delivery Method</th>
                  <th>Location</th>
                  <th>Order Due Date</th>
                  <th>Phone No 1</th>
                  <th>Phone No 2</th>
                   <th class="text-center">Actions</th>
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