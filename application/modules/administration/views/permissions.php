 <!-- Content area --> 
  <div class="content">
    <?php //print "<pre>"; print_r($_SESSION); print "</pre>";?>
    <!-- Main charts -->
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-flat">
          <div class="panel-body">
            <div class="tabbable">
              <ul class="nav nav-tabs nav-tabs-bottom" id="userTab">
                <li class="active"><a href="#user_permission" data-toggle="tab">User Permissions<i class="icon-user position-right"></i></a></li>
                <li><a href="#group_permission" data-toggle="tab">Group / Position Permissions <i class="icon-users position-right"></i></a></li>
                <li><a href="#inactive_accounts" data-toggle="tab">Group Members <i class="icon-users position-right"></i></a></li>
              </ul>
              <div class="tab-content">

                <div class="tab-pane active" id="user_permission">
                  <div class="row">
                    <div class="col-md-4">
                      <form action="<?=base_url();?>administration/view_permissions" method="post">
                        <div class="form-group">
                          <label class="display-block">Select User</label>
                          <select id="all_users" class="selectbox" name="user_id">
                            <option value="">Select One</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label class="display-block">Select Group</label>
                          <select id="all_groups" class="selectbox" name="group_id">
                            <option value="">Select One</option>
                          </select>
                        </div>
                        <div class="text-center">
                          <button type="button" id="view_permissions" class="btn bg-teal-400">View Permissions <i class="icon-arrow-right14 position-right"></i></button>
                        </div>
                      </form>
                    </div>
                    <div class="col-md-6">
                      <table id="allPermissions" class="table datatable-responsive">
                        <thead style="background-color:#009688;color:white">
                          <tr>
                            <th> </th>
                            <th> </th>
                            <th> </th>
                            <th> </th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table><br/>
                      <div class="text-center">
                          <button type="submit" class="btn bg-teal-400">Set Permissions <i class="icon-arrow-right14 position-right"></i></button>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                  </div>
                </div>

                <div class="tab-pane" id="group_permission">
                  <div class="row">
                    <div class="col-md-4">
                      <form action="<?=base_url();?>administration/view_permissions" method="post">
                        <div class="form-group">
                          <label class="display-block">Select Group</label>
                          <select id="all_positions" class="selectbox" name="group_id">
                            <option value="">Select One</option>
                          </select>
                        </div>
                        <div class="text-center">
                          <button type="button" id="view_permissions" class="btn bg-teal-400">View Permissions <i class="icon-arrow-right14 position-right"></i></button>
                        </div>
                      </form>
                    </div>
                    <div class="col-md-6">
                      <table id="allPermissions" class="table datatable-responsive">
                        <thead style="background-color:#009688;color:white">
                          <tr>
                            <th></th><th></th><th></th><th></th>
                          </tr>
                        </thead>
                        <tbody></tbody>
                      </table><br/>
                      <div class="text-center">
                          <button type="submit" class="btn bg-teal-400">Set Permissions <i class="icon-arrow-right14 position-right"></i></button>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>

  <!-- Including Page Settings -->
  <?php include("page_settings.php"); ?>
  <!-- Including Page Settings -->
