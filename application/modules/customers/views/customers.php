 <!-- Content area -->
  <div class="content">
    <?php //print "<pre>"; print_r($_SESSION); print "</pre>";?>
    <!-- Main charts -->
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-flat">
          <div class="panel-body">
            <table id="allcustomers" class="table datatable-responsive table-xs">
              <thead>
                <tr class="bg-teal-400">
                  <th>Full name</th>
                  <th>Email </th>
                  <th>Primary Phone </th>
                  <th>Secondary Phone </th>
                  <th>Residence address</th>
                  <th>Company</th>
                  <th>Status</th>
                  <th class="text-center">Actions</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
    </div>
  </div>
  <!-- /main charts -->

<!-- Including Page Settings -->
<?php include("page_settings.php"); ?>
<!-- Including Page Settings -->          