 <!-- Content area --> 
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-flat">
          <div class="panel-body"> 
            <div class="tabbable">
              <ul class="nav nav-tabs nav-tabs-bottom" id="userTab">
                <li class="active"><a href="#company_details" data-toggle="tab">Company Details <i class="icon-office position-right"></i></a></li>
                <li><a href="#departments" data-toggle="tab">Departments <i class="icon-office position-right"></i></a></li>
                <li><a href="#positions" data-toggle="tab">Positions <i class="icon-medal2 position-right"></i></a></li>
                <li><a href="#new_employee" data-toggle="tab">New Employee <i class="icon-user position-right"></i></a></li>
                <li><a href="#employees" data-toggle="tab">All Employees <i class="icon-users position-right"></i></a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="company_details">
                  <form action="<?=base_url()?>/settings/save_company_details" method="post">
                    <input type="hidden" name="id" value="<?=@strtoupper($company_info[0]->id)?>">
                    <div class="row">
                      <div class="col-md-9">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="display-block">Company Name <span style="color:red;">*</span></label>
                            <input type="text" name="name" class="form-control" value="<?=@strtoupper($company_info[0]->name)?>" style="font-weight: 800;" required>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="display-block">Mission Statement</label>
                            <input type="text" name="mission" class="form-control" value="<?=@strtoupper($company_info[0]->mission)?>" style="font-weight: 800;">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="display-block">Vision Statement</label>
                            <input type="text" name="vision" class="form-control" value="<?=@strtoupper($company_info[0]->vision)?>" style="font-weight: 800;">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="display-block">Postal Address</label>
                            <input type="text" name="postal_addr" class="form-control" value="<?=@strtoupper($company_info[0]->postal_address)?>" style="font-weight: 800;">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="display-block">Residence Address  <span style="color:red;">*</span></label>
                            <input type="text" name="residence_addr" class="form-control" required value="<?=@strtoupper($company_info[0]->residence_address)?>" style="font-weight: 800;">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="display-block">Primary Phone No #  <span style="color:red;">*</span></label>
                            <input type="text" name="phone_num_1" class="form-control" required value="<?=@strtoupper($company_info[0]->telephone_1)?>" style="font-weight: 800;">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="display-block">Secondary Phone No #  <span style="color:red;">*</span></label>
                            <input type="text" name="phone_num_2" class="form-control" value="<?=@strtoupper($company_info[0]->telephone_2)?>" required style="font-weight: 800;">
                          </div>
                        </div>
                        <!-- <div class="col-md-6 col-sm-12 col-xs-12">
                          <div class="form-group">
                            <label class="display-block">Fax</label>
                            <input type="text" name="fax" class="form-control" value="<?=@strtoupper($company_info[0]->fax)?>" style="font-weight: 800;">
                          </div>
                        </div> -->
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="display-block">Email</label>
                            <input type="email" name="email" class="form-control" value="<?=@strtolower($company_info[0]->email)?>" style="font-weight: 800;">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="display-block">Website</label>
                            <input type="text" name="website" class="form-control" value="<?=@strtolower($company_info[0]->website)?>" style="font-weight: 800;">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="display-block">GPS Location</label>
                            <input type="text" name="gps_location" class="form-control" value="<?=@strtolower($company_info[0]->gps_location)?>" style="font-weight: 800;">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="display-block">TIN</label>
                            <input type="text" name="tin_number" class="form-control" value="<?=@strtoupper($company_info[0]->tin_number)?>" style="font-weight: 800;">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="display-block" style="padding-bottom: 4px">Company Logo</label>
                            <input type="file" class="file-input" accept="image/*" data-main-class="input-group-xs" data-show-preview="false" data-show-upload="false" name="logo" disabled>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="row">
                          
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary legitRipple">Save <i class="icon-database2 position-right"></i></button>
                  </form>
                </div>

                <div class="tab-pane" id="departments">
                  <div class="row">
                    <div class="col-md-5">
                      <form action="<?=base_url();?>settings/save_department" method="post" style="margin-left: 10px; margin-right: 10px">
                        <div class="row">
                          <div class="col-md-11">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="display-block">Parent Department</label>
                                  <select name="parent_department" class="display_departments">
                                    <option value=""><em>Select One</em></option>
                                  </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="display-block">Department Name <span style="color:red;">*</span></label>
                                 <input type="text" name="department" class="form-control" required>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-11">
                            <div class="form-group">
                              <label class="display-block">Description <span style="color:red;">*</span></label>
                               <input type="text" name="description" class="form-control" required>
                            </div>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
                      </form>
                    </div>
                    <div class="col-md-7">
                      <table id="department_tbl" class="table datatable-responsive table-xxs">
                        <thead style="background-color:#009688;color:white">
                          <tr>
                            <th style="width: 5%">ID</th>
                            <th>Name</th>
                            <th>Reports To</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th class="text-center" style="width: 10%">Actions</th>
                          </tr>
                        </thead>
                        <tbody></tbody>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="tab-pane" id="positions">
                  <div class="row">
                    <div class="col-md-5">
                      <form action="<?=base_url();?>settings/save_position" method="post" style="margin-left: 10px; margin-right: 10px">
                        <div class="row">
                          <div class="col-md-11">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="display-block">Parent Postion (<em>If Any</em>) <span style="color:red;">*</span></label>
                                <select name="parent_position" class="display_positions">
                                   <option value=""><em>Select One</em></option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="display-block">Name <span style="color:red;">*</span></label>
                                 <input type="text" name="position_name" class="form-control" required>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-11">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="display-block">Department <span style="color:red;">*</span></label>
                                 <select id="" name="department" class="display_departments">
                                    <option value=""><em>Select One</em></option>
                                 </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="display-block">Salary (<em>GH₵</em>) <span style="color:red;">*</span></label>
                                 <input type="number" min="0" name="salary" class="form-control" required>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-11">
                            <div class="form-group">
                              <label class="display-block">Duties & Responsibilities</label>
                               <input type="text" name="description" class="form-control">
                            </div>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
                      </form>
                    </div>
                    <div class="col-md-7">
                      <table id="positions_tbl" class="table datatable-responsive table-xxs">
                        <thead style="background-color:#009688;color:white">
                          <tr>
                            <th style="width: 4%">ID</th>
                            <th>Name</th>
                            <th>Reports To</th>
                            <th>Description</th>
                            <th>Department</th>
                            <th>Status</th>
                            <th class="text-center" style="width: 20%">Actions</th>
                          </tr>
                        </thead>
                        <tbody></tbody>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="tab-pane" id="new_employee">
                  <form action="<?=base_url()?>administration/save_employee" method="post">
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="display-block">First Name <span style="color:red;">*</span></label>
                          <input type="text" name="first_name" class="form-control" value="<?=set_value('first_name')?>" required>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="display-block">Middle Name </label>
                          <input type="text" name="middle_name" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="display-block">Last Name <span style="color:red;">*</span></label>
                          <input type="text" name="last_name" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="display-block">Gender <span style="color:red;">*</span></label>
                          <select name="gender" class="selectbox" data-required="true">
                            <option value=""><em>Select One</em></option>
                            <option>Male</option>
                            <option>Female</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="display-block">Marital Status <span style="color:red;">*</span></label>
                          <select name="marital_status" class="selectbox">
                            <option value=""><em>Select One</em></option>
                            <option>Single</option>
                            <option>Married</option>
                            <option>Divorced</option>
                            <option>Widowed</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="display-block">Residence Address <span style="color:red;">*</span></label>
                          <input type="text" name="residence_addr" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="display-block">Primary Phone No <span style="color:red;">*</span></label>
                          <input type="text" name="primary_tel" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="display-block">Secondary Phone No</label>
                          <input type="text" name="secondary_tel" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="display-block">Email <span style="color:red;">*</span></label>
                          <input type="email" name="email" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="display-block" style="padding-bottom: 4px">Position <span style="color:red;">*</span></label>
                          <select name="position" class="display_positions" required>
                            <option value=""><em>Select One</em></option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="display-block" style="padding-bottom: 4px">Upload Photo <!-- <span style="color:red;">*</span> --></label>
                          <input type="file" class="file-input" accept="image/*" data-main-class="input-group-xs" data-show-preview="false" data-show-upload="false" name="logo" disabled>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="display-block" style="padding-bottom: 4px">ID Card Photo <!-- <span style="color:red;">*</span> --></label>
                          <input type="file" class="file-input" accept="image/*" data-main-class="input-group-xs" data-show-preview="false" data-show-upload="false" name="logo" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <h4 style="text-align: center;margin: 0px">
                        <label style="color:#b57171;">
                          Emergency Contact Info
                        </label>
                      </h4>
                      <hr style="margin: 0px" />
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="display-block">Contact Name <span style="color:red;">*</span> <!-- (<em style="color:#b57171">Emergency</em>) --></label>
                          <input type="text" name="emergency_fullname" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="display-block">Residence Address <span style="color:red;">*</span> <!-- (<em style="color:#b57171">Emergency</em>) --></label>
                          <input type="text" name="emergency_residence" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="display-block">Phone Number <span style="color:red;">*</span> <!-- (<em style="color:#b57171">Emergency</em>) --></label>
                          <input type="text" name="emergency_phone_1" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="display-block">Relationship <span style="color:red;">*</span> <!-- (<em style="color:#b57171">Emergency</em>) --></label>
                          <select name="emergency_relationship" class="selectbox">
                            <option value=""><em>Select One</em></option>
                            <option>Father</option>
                            <option>Mother</option>
                            <option>Sibling</option>
                            <option>Guardian</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-2">
                        <button type="submit" class="btn btn-primary legitRipple">Save <i class="icon-arrow-right14 position-right"></i></button>
                      </div>
                      <div class="col-md-4"></div>
                    </div>
                  </form>
                </div>

                <div class="tab-pane" id="employees">
                  <div class="row">
                    <table id="allemployees" class="table datatable-responsive table-xxs">
                      <thead style="">
                        <tr class="bg-teal-400">
                          <th style="width: 100px">ID #</th>
                          <th style="width: 250px">Fullname</th>
                          <th style="width: 160px">Phone No.</th>
                          <th style="width: 150px">Email </th>
                          <th>Residence</th>
                          <th>Emergency</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody></tbody>
                    </table>
                  </div>
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