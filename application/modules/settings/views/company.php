 <!-- Content area --> 
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-flat">
          <div class="panel-body"> 
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
        </div>
      </div>
    </div>
  </div>
