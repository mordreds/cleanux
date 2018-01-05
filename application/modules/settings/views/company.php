 <!-- Content area --> 
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-flat">
          <div class="panel-body"> 
            <div class="tabbable">
              <ul class="nav nav-tabs nav-tabs-bottom" id="userTab">
                <li class="active"><a href="#company_details" data-toggle="tab">Company Details <i class="icon-office position-right"></i></a></li>
                <li><a href="#new_employee" data-toggle="tab">New Employee <i class="icon-user position-right"></i></a></li>
                <li><a href="#all_employees" data-toggle="tab">All Employees <i class="icon-users position-right"></i></a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="company_details">
                  <form action="<?=base_url()?>/settings/save_company_details" method="post">
                    <input type="hidden" name="id" value="<?=@strtoupper($company_info[0]->id)?>">
                    <div class="row">
                      <div class="col-md-7">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="display-block">Company Name</label>
                            <input type="text" name="name" class="form-control" value="<?=@strtoupper($company_info[0]->name)?>" required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="display-block">Postal Address</label>
                            <input type="text" name="postal_addr" class="form-control" value="<?=@strtoupper($company_info[0]->postal_address)?>">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="display-block">Residence Address</label>
                            <input type="text" name="residence_addr" class="form-control" required value="<?=@strtoupper($company_info[0]->residence_address)?>">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="display-block">Primary Phone Number</label>
                            <input type="text" name="phone_num_1" class="form-control" required value="<?=@strtoupper($company_info[0]->telephone_1)?>">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="display-block">Secondary Phone Number</label>
                            <input type="text" name="phone_num_2" class="form-control" value="<?=@strtoupper($company_info[0]->telephone_2)?>" required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="display-block">Fax</label>
                            <input type="text" name="fax" class="form-control" value="<?=@strtoupper($company_info[0]->fax)?>">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="display-block">Email</label>
                            <input type="email" name="email" class="form-control" value="<?=@strtolower($company_info[0]->email)?>">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="display-block">Website</label>
                            <input type="text" name="website" class="form-control" value="<?=@strtolower($company_info[0]->website)?>">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="display-block">Mission Statement</label>
                            <input type="text" name="mission" class="form-control" value="<?=@ucwords($company_info[0]->mission)?>">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="display-block">Vision Statement</label>
                            <input type="text" name="vision" class="form-control" value="<?=@ucwords($company_info[0]->vision)?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="row">
                          <div class="col-md-11">
                          <div class="form-group">
                            <label class="display-block">Tin Number</label>
                            <input type="text" name="tin_number" class="form-control" value="<?=@strtoupper($company_info[0]->tin_number)?>">
                          </div>
                        </div>
                          <div class="col-md-11">
                            <div class="form-group">
                              <label class="display-block" style="padding-bottom: 4px">Company Logo</label>
                              <input type="file" class="file-input" accept="image/*" data-main-class="input-group-xs" data-show-preview="false" data-show-upload="false" name="logo">
                            </div>
                          </div>
                          <div class="col-md-11">
                            <div class="form-group">
                              <label class="display-block" style="padding-bottom: 4px">Document (s)</label>
                              <input type="file" multiple="multiple" class="file-input" accept=".doc,.docx"  data-main-class="input-group-xs" data-show-preview="false" data-show-upload="false" name="mission_doc">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary legitRipple">Save <i class="icon-database2 position-right"></i></button>
                  </form>
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
                          <label class="display-block">Phone Number 1 <span style="color:red;">*</span></label>
                          <input type="text" name="primary_tel" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="display-block">Phone Number 2</label>
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
                          <select name="position" class="display_positions" required></select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="display-block" style="padding-bottom: 4px">Upload Photo <!-- <span style="color:red;">*</span> --></label>
                          <input type="file" class="file-input" accept="image/*" data-main-class="input-group-xs" data-show-preview="false" data-show-upload="false" name="logo">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="display-block" style="padding-bottom: 4px">ID Card Photo <!-- <span style="color:red;">*</span> --></label>
                          <input type="file" class="file-input" accept="image/*" data-main-class="input-group-xs" data-show-preview="false" data-show-upload="false" name="logo">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="display-block">Contact Name <span style="color:red;">*</span> (<em style="color:#b57171">emergency</em>)</label>
                          <input type="text" name="emergency_fullname" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="display-block">Residence Address <span style="color:red;">*</span> (<em style="color:#b57171">emergency</em>)</label>
                          <input type="text" name="emergency_residence" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="display-block">Phone Number <span style="color:red;">*</span> (<em style="color:#b57171">emergency</em>)</label>
                          <input type="text" name="emergency_phone_1" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="display-block">Relationship <span style="color:red;">*</span> (<em style="color:#b57171">emergency</em>)</label>
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
                <div class="tab-pane" id="all_employees">
                  <div class="row">
                    <table id="allemployees" class="table datatable-responsive table-xxs">
                      <thead style="">
                        <tr class="bg-teal-400">
                          <th style="width: 50px">ID #</th>
                          <th style="width: 250px">Fullname</th>
                          <th style="width: 160px">Phone No.</th>
                          <th style="width: 150px">Email </th>
                          <th>Residence</th>
                          <th>Emergency</th>
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