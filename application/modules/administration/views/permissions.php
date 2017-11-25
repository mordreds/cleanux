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
                <li><a href="#new_account" data-toggle="tab">Create New User <i class="icon-user position-right"></i></a></li>
                <li><a href="#inactive_accounts" data-toggle="tab">Group Permissions <i class="icon-users position-right"></i></a></li>
                <li><a href="#inactive_accounts" data-toggle="tab">Group Members <i class="icon-users position-right"></i></a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="user_permission">
                  <div class="row">
                    <div class="col-md-4" style="">
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
                    <div class="col-md-6" id="allpermissions_display" style="">
                      <table id="allpermission" class="table datatable-responsive">
                        <thead style="background-color:#009688;color:white">
                          <tr>
                            <th> </th>
                            <th> </th>
                            <th> </th>
                            <th> </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><input type="checkbox" class="styled"> &nbsp;&nbsp; Permission 1</td>
                            <td><input type="checkbox" class="styled"> &nbsp;&nbsp; Permission 1</td>
                            <td><input type="checkbox" class="styled"> &nbsp;&nbsp; Permission 1</td>
                            <td><input type="checkbox" class="styled"> &nbsp;&nbsp; Permission 1</td>
                          </tr>
                          <tr>
                            <td><input type="checkbox" class="styled"> &nbsp;&nbsp; Permission 1</td>
                            <td><input type="checkbox" class="styled"> &nbsp;&nbsp; Permission 1</td>
                            <td><input type="checkbox" class="styled"> &nbsp;&nbsp; Permission 1</td>
                            <td><input type="checkbox" class="styled"> &nbsp;&nbsp; Permission 1</td>
                          </tr>
                          <tr>
                            <td><input type="checkbox" class="styled"> &nbsp;&nbsp; Permission 1</td>
                            <td><input type="checkbox" class="styled"> &nbsp;&nbsp; Permission 1</td>
                            <td><input type="checkbox" class="styled"> &nbsp;&nbsp; Permission 1</td>
                            <td><input type="checkbox" class="styled"> &nbsp;&nbsp; Permission 1</td>
                          </tr>
                          <tr>
                            <td><input type="checkbox" class="styled"> &nbsp;&nbsp; Permission 1</td>
                            <td><input type="checkbox" class="styled"> &nbsp;&nbsp; Permission 1</td>
                            <td><input type="checkbox" class="styled"> &nbsp;&nbsp; Permission 1</td>
                            <td><input type="checkbox" class="styled"> &nbsp;&nbsp; Permission 1</td>
                          </tr>
                        </tbody>
                      </table><br/>
                      <div class="text-center">
                          <button type="submit" class="btn bg-teal-400">Set Permissions <i class="icon-arrow-right14 position-right"></i></button>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                  </div>
                </div>

                <div class="tab-pane" id="new_account">
                  <form action="<?=base_url();?>administration/new_user" method="post" style="margin-left: 10px; margin-right: 10px">
                    <input type="hidden" id="bio_id" name="biodata_id" />
                    <input type="hidden" id="fullname" name="fullname" />
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="display-block">Select Department</label>
                          <select id="all_departments" class="form-control"></select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="display-block">Select Employee</label>
                          <select id="department_employees" class="selectbox"></select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="display-block">Staff ID</label>
                          <input id="employeeid" type="text" value="" name="employee_id" class="form-control" readonly required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="display-block">Email</label>
                          <input id="email" type="email" name="email" class="form-control" readonly required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="display-block">User Group</label>
                          <select id="usertypes" name="usergroup" class="" required></select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="display-block">Password</label>
                          <div class="label-indicator-absolute">
                            <input type="password" name="password" class="form-control" required>
                            <span class="label password-indicator-label-absolute"></span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type="submiy" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
                  </form>
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
