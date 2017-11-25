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
                <li class="active"><a href="#service" data-toggle="tab">Services <i class="icon-menu3 position-right"></i></a></li>
                <li><a href="#weight" data-toggle="tab">Weights <i class="icon-menu3 position-right"></i></a></li>
                <li><a href="#garments" data-toggle="tab">Garments<i class="icon-menu3 position-right"></i></a></li>
                <li><a href="#pricing" data-toggle="tab">Pricing<i class="icon-menu3 position-right"></i></a></li>
                <li><a href="#delivery" data-toggle="tab">delivery<i class="icon-menu3 position-right"></i></a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="service">
                  <div class="row">
                    <div class="col-md-5">
                      <form action="<?=base_url();?>settings/save_services" method="post" style="margin-left: 10px; margin-right: 10px">
                        <div class="row">
                          <div class="col-md-11">
                            <div class="form-group">
                              <label class="display-block">Name</label>
                               <input type="text" name="service_name" class="form-control" required>
                            </div>
                          </div>
                          <div class="col-md-11">
                            <div class="form-group">
                              <label class="display-block">Description</label>
                               <input type="text" name="service_desc" class="form-control">
                            </div>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
                      </form>
                    </div>
                    <div class="col-md-7">
                      <table id="laundry_services" class="table datatable-responsive">
                        <thead style="background-color:#009688;color:white">
                          <tr>
                            <th style="width: 5%">ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th class="text-center" style="width: 20%">Actions</th>
                          </tr>
                        </thead>
                        <tbody></tbody>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="tab-pane" id="weight">
                  <div class="row">
                    <div class="col-md-5">
                      <form action="<?=base_url();?>settings/save_weight" method="post" style="margin-left: 10px; margin-right: 10px">
                        <div class="row">
                          <div class="col-md-11">
                            <div class="form-group">
                              <label class="display-block">Select Service</label>
                              <select class="form-control display_services" name="service_id">
                                <option value="">Select One</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-8">
                            <div class="form-group">
                              <label class="display-block">Weight</label>
                               <input type="text" name="weight" class="form-control" required>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label class="display-block">Unit</label>
                              <select id="services" class="form-control selectbox" name="weight_unit" required>
                                <option value="KG">Kilograms (KG)</option>
                                <option value="g">Grams (g)</option>
                                <option value="T">Tonnes (T)</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-11">
                            <div class="form-group">
                              <label class="display-block">Description</label>
                               <input type="text" name="weight_description" class="form-control">
                            </div>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
                      </form>
                    </div>
                    <div class="col-md-7">
                      <table id="laundry_weights" class="table datatable-responsive">
                        <thead style="background-color:#009688;color:white">
                          <tr>
                            <th style="width: 5%">ID</th>
                            <th>Service</th>
                            <th>Weight</th>
                            <th>Description</th>
                            <th style="width: 10%" class="text-center">Actions</th>
                          </tr>
                        </thead>
                        <tbody></tbody>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="tab-pane" id="garments">
                  <div class="row">
                    <div class="col-md-5">
                      <form action="<?=base_url();?>settings/save_garment" method="post" style="margin-left: 10px; margin-right: 10px">
                        <div class="row">
                          <div class="col-md-11">
                            <div class="form-group">
                              <label class="display-block">Name</label>
                               <input type="text" name="garment_name" class="form-control" required>
                            </div>
                          </div>
                          <div class="col-md-11">
                            <div class="form-group">
                              <label class="display-block">Description</label>
                               <input type="text" name="garment_desc" class="form-control" required>
                            </div>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
                      </form>
                    </div>
                    <div class="col-md-7">
                      <table id="laundry_garments" class="table datatable-responsive">
                        <thead style="background-color:#009688;color:white">
                          <tr>
                            <th style="width: 5%">ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th class="text-center" style="width: 10%">Actions</th>
                          </tr>
                        </thead>
                        <tbody></tbody>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="tab-pane" id="pricing">
                  <div class="row">
                    <div class="col-md-5">
                      <form action="<?=base_url();?>settings/save_price" method="post" style="margin-left: 10px; margin-right: 10px">
                        <div class="row">
                          <div class="col-md-11">
                            <div class="form-group">
                              <label class="display-block">Select Service</label>
                              <select class="form-control display_services" name="service_id">
                                <option value="">Select One</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-11">
                            <div class="form-group">
                              <label class="display-block">Select Weight</label>
                              <select class="form-control display_weights" name="weight_id">
                                <option value="">Select One</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-11">
                            <div class="form-group">
                              <label class="display-block">Select Garment</label>
                              <select class="form-control display_garments" name="garment_id">
                                <option value="">Select One</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-11">
                            <div class="form-group">
                              <label class="display-block">Amount</label>
                               <input type="number" name="amount" class="form-control" min="0" required>
                            </div>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
                      </form>
                    </div>
                    <div class="col-md-7">
                      <table id="laundry_prices" class="table datatable-responsive">
                        <thead style="background-color:#009688;color:white">
                          <tr>
                            <th style="width: 5%">ID</th>
                            <th>Service</th>
                            <th>Description</th>
                            <th>Amount (GHC)</th>
                            <th style="width: 10%" class="text-center">Actions</th>
                          </tr>
                        </thead>
                        <tbody></tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="delivery">
                  <div class="row">
                    <div class="col-md-5">
                      <form action="<?=base_url();?>settings/save_price" method="post" style="margin-left: 10px; margin-right: 10px">
                        <div class="row">
                          <div class="col-md-11">
                            <div class="form-group">
                              <label class="display-block">Delivery Location   <span style="color:red;">*</span></label>
                               <input type="text" name="" class="form-control"  required>
                            </div>
                          </div>
                          <div class="col-md-11">
                            <div class="form-group">
                              <label class="display-block">Duration (Days)  <span style="color:red;">*</span></label>
                               <input type="number" name="" class="form-control" min="1"  required>
                            </div>
                          </div>
                          <div class="col-md-11">
                            <div class="form-group">
                              <label class="display-block">Price
                              </label>
                               <input type="text" name="" class="form-control"  required>
                            </div>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
                      </form>
                    </div>
                    <div class="col-md-7">
                      <table id="laundry_delivery_prices" class="table datatable-responsive">
                        <thead style="background-color:#009688;color:white">
                          <tr>
                            <th style="width: 5%">ID</th>
                            <th>Delivery Location</th>
                            <th>Duration</th>
                            <th>Amount (GHC)</th>
                            <th style="width: 10%" class="text-center">Actions</th>
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
  <!-- /main charts -->

  <!-- Including Page Settings -->
  <?php include("page_settings.php"); ?>
  <!-- Including Page Settings -->