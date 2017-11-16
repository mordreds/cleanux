 <!-- Content area -->
  <div class="content">
    <?php //print "<pre>"; print_r($_SESSION); print "</pre>";?>
    <!-- Main charts -->
    <div class="row">
      <div class="col-md-12">
        <!-- Individual column searching (text inputs) -->
          <div class="panel panel-flat">
            
            <div class="col-md-12">
           <div class="col-md-8">
              <div class="panel panel-flat">
                <div class="box-header with-border">
                  <h3 class="box-title"></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="col-md-12">
                    <select class="form-control" onchange="value.1">
                      <option>---- Select Service Type ----</option>
                      <option value="1"> Washing </option>
                      <option value="2">Washing / Ironing</option>
                      <option value="">Ironing</option>
                      <option value="">Dry / Cleaning</option>
                    </select>
                  </div><br/><br/><br/>
                  <div class="row" style="padding: 0px 15px;margin-bottom:15px">

                  </div>
                  <div id="1" style="display:block">
                    <div class="row" style="padding:0px 15px"><div class="col-md-6">
                      <select class="form-control" name="" onchange="">
                        <option>--- Select KG Category ---</option>
                        <option value="">0 - 1kg</option>
                        <option value="">1kg - 2kg</option>
                        <option value="">2kg - 3kg</option>
                      </select>
                      <br/>
                      <div class="input-group">
                        <span class="input-group-addon">Description</span>
                        <input name="Matitemdesc" type="text" class="form-control" placeholder="Product Details / Vendor">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-group">
                        <span class="input-group-addon">Charged Price:</span>
                        <input name="Matitemqty" type="number" class="form-control" min="0" onkeyup="">
                      </div><br/>
                      <div class="input-group">
                        <span class="input-group-addon">Item Quantity:</span>
                        <input name="Matitemunit" type="number" class="form-control" min="0" onkeyup="" style="display:block">
                      </div>
                    </div></div>
                    <div class="row"><div class="col-md-5"></div>
                    <div class="col-md-1">
                      <br/>
                      <button type="button" class="btn btn-success" id="addNewMat"><i class="fa fa-list"></i> Add To List</button>
                    </div>
                    <div class="col-md-6"></div></div>
                    <div class="col-md-12">
                      <hr/>
                      <table class="table table-bordered" style="font-size:14px;" id="mattable">
                        <thead class="bg-blue" style="color: white;">
                          <th style="width: 4%">#</th>
                          <th style="width: 40%">Weight /KG</th>
                          <th style="width: 33%">Description</th>
                          <th style="width: 7%">Qty</th>
                          <th style="width: 5%">Rate(₵)</th>
                          <th style="width: 5%">Total(₵)</th>
                          <th style="width: 6%;text-align:center">Action</th>
                        </thead>
                        <tbody>
                          <tr></tr>
                        </tbody>
                      </table>
                    </div><!-- /.col -->
                  </div>
                  <div id="2" style="display:block">
                    <div class="row" style="padding:0px 15px"><div class="col-md-6">
                      <select class="form-control" name="Machprocesstype" onchange="">
                        <option>--- Select Garment ---</option>
                        <option value="">Trousers</option>
                        <option value="">T-shirts-white</option>
                        <option value="">Singlets</option>
                      </select>
                      <br/>
                      <div class="input-group">
                        <span class="input-group-addon">Description</span>
                        <input name="Machitemdesc" type="text" class="form-control" placeholder="Machine Description / Vendors /">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-group">
                        <span class="input-group-addon">Charged Price:</span>
                        <input name="Machtime" type="text" class="form-control 2waydate">
                      </div><br/>
                      <div class="input-group">
                        <span class="input-group-addon">Quantity:</span>
                        <input name="Machitemunit" type="number" class="form-control" min="0" style="display:block">
                      </div>
                      <br/>
                    </div></div>
                    <div class="row"><div class="col-md-5"></div>
                    <div class="col-md-1">
                      <br/>
                      <button type="button" class="btn btn-success" id="addNewMach"><i class="fa fa-list"></i> Add To List</button>
                    </div>
                    <div class="col-md-6"></div></div>
                    <div class="col-md-12">
                      <hr/>
                      <table class="table table-bordered table-reponsive" style="font-size:14px;" id="machtable">
                        <thead style="background-color: #009688;color: white;">
                          <th style="width: 5%">#</th>
                          <th style="width: 25%">Garment</th>
                          <th style="width: 25%">Description</th>
                          <th style="width: 5%">Qty</th>
                          <th style="width: 5%">Amt(₵)</th>
                          <th style="width: 5%">Action</th>
                        </thead>
                        <tbody>
                          <tr></tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div id="" style="display:block">
                    <div class="row" style="padding:0px 15px"><div class="col-md-6">
                      <select class="form-control" name="Machprocesstype" onchange="">
                        <option>--- Select Garment ---</option>
                        <option value="">Trousers</option>
                        <option value="">T-shirts-white</option>
                        <option value="">Singlets</option>
                      </select>
                      <br/>
                      <div class="input-group">
                        <span class="input-group-addon">Description:</span>
                        <input name="Labqty" type="number" class="form-control" min="0" placeholder="5">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-group">
                        <span class="input-group-addon">Charged Price:</span>
                        <input name="Labunit" type="number" class="form-control" min="0" placeholder="1000">
                      </div>
                      <br/>
                      <div class="input-group">
                        <span class="input-group-addon">Quantity:</span>
                        <input name="Labamt" type="number" class="form-control" min="0" placeholder="5000">
                      </div>
                      <br/>
                      <div class="input-group">
                        <span class="input-group-addon">Note</span>
                        <input name="Labnote" type="text" class="form-control" placeholder="2 Years Experience">
                      </div>
                    </div></div>
                    <div class="col-md-5"></div>
                    <div class="col-md-1">
                      <br/>
                      <button type="button" id="addNewLab" class="btn btn-success"><i class="fa fa-list"></i> Add To List</button>
                    </div>
                    <div class="col-md-6"></div>
                    <div class="col-md-12">
                      <hr/>
                      <table class="table table-bordered" style="font-size:14px;" id="labtable">
                        <thead style="background-color: #006142;color: white;">
                          <th style="width: 3%">#</th>
                          <th style="width: 20%">Garment</th>
                          <th style="width: 7%">Description</th>
                          <th style="width: 5%">Qty</th>
                          <th style="width: 10%">Total (₵)</th>
                          <th style="width: 7%%">Action</th>
                        </thead>
                        <tbody>
                          <tr></tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div id="" style="display:block">
                    <div class="col-md-6">
                      <select class="form-control" name="Machprocesstype" onchange="">
                        <option>--- Select Garment ---</option>
                        <option value="">Trousers</option>
                        <option value="">T-shirts-white</option>
                        <option value="">Singlets</option>
                      </select>
                      <br/>
                      <div class="input-group">
                        <span class="input-group-addon">Description:</span>
                        <input name="name" type="text" class="form-control" placeholder="Name Of Labour">
                      </div>
                      <br/>
                    </div>
                    <div class="col-md-6">
                      <div class="input-group">
                        <span class="input-group-addon">Charged Price:</span>
                        <input name="unit" type="number" class="form-control" min="0">
                      </div>
                      <br/>
                      <div class="input-group">
                        <span class="input-group-addon">Quantity:</span>
                        <input name="amt" type="number" class="form-control" min="0">
                      </div>
                      <br/>
                    </div>
                    <div class="col-md-5"></div>
                    <div class="col-md-5">
                      <br/>
                      <button type="submit" class="btn btn-success"><i class="fa fa-list"></i> Add To List</button>
                    </div>
                    <div class="col-md-6"></div>
                    <div class="col-md-12">
                      <hr/>
                      <table class="table table-bordered" style="font-size:14px;">
                        <thead style="background-color: #009688;color: white;">
                         <th style="width: 3%">#</th>
                          <th style="width: 20%">Garment</th>
                          <th style="width: 7%">Description</th>
                          <th style="width: 5%">Qty</th>
                          <th style="width: 10%">Total (₵)</th>
                          <th style="width: 7%%">Action</th>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1.</td>
                            <td>Crane</td>
                            <td>To Lift Heavy Machines To Tky Level</td>
                            <td>3 Months</td>
                            <td>100</td>
                            <td>6000</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                  <div class="pull-right">
                    <button class="btn btn-primary" id="" data-toggle="modal" data-target="#preview" type="button"><i class="fa fa-th"></i> Preview All</button>
                
                  </div>
                </div><!-- /.box-footer -->
              </div><!-- /. box -->
            </div><!-- /.col -->
            <div class="col-md-4">
             <div class="panel panel-flat">
             <div class="panel-heading">
                  <h6 class="panel-title">YourAccount<a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
                  <div class="heading-elements">
                   
                          </div>
                </div>
                  <div class="row text-center">
                    <div class="col-md-6">
                      <div class="content-group">
                        <h5 class="text-semibold no-margin"><i class="icon-calendar5 position-left text-slate"></i> 2</h5>
                        <span class="text-muted text-size-small">Pending orders</span>
                      </div>
                    </div>

                   

                    <div class="col-md-6">
                      <div class="content-group">
                        <h5 class="text-semibold no-margin"><i class="icon-cash3 position-left text-slate"></i>GHC 23,464</h5>
                        <span class="text-muted text-size-small">Balance Payable</span>
                      </div>
                    </div>
                  </div>
                    <div class="panel-heading">
                  <h6 class="panel-title">Price List</h6>
                 
                </div>

                <div class="panel-body">
                  <div class="tabbable nav-tabs-vertical nav-tabs-right">
                    <div class="tab-content">
                      <div class="tab-pane active has-padding" id="right-tab1">
                        <table class="table">
                    <thead>
                        <tr>
                            <th>Item Description</th>
                            <th class="col-sm-1">Unit Price</th>
                            <th class="col-sm-1">Bulk</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                              <h6 class="no-margin">White Shirt</h6>
                            </td>
                            <td>$70</td>
                            <td><span class="text-semibold">$3,990</span></td>
                        </tr>
                        <tr>
                            <td>
                              <h6 class="no-margin">Long Sleeve-white</h6>
                            </td>
                            <td>$70</td>
                            <td><span class="text-semibold">$840</span></td>
                        </tr>
                        <tr>
                            <td>
                              <h6 class="no-margin">Boxers White</h6>
                            </td>
                            <td>$70</td>
                            <td><span class="text-semibold">$2,170</span></td>
                        </tr>
                    </tbody>
                </table>
                      </div>

                      <div class="tab-pane has-padding" id="right-tab2">
                        Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid laeggin.
                      </div>

                      <div class="tab-pane has-padding" id="right-tab3">
                        DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg whatever.
                      </div>

                      <div class="tab-pane has-padding" id="right-tab4">
                        Aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthet.
                      </div>
                    </div>

                    <ul class="nav nav-tabs nav-tabs-highlight">
                      <li class="active"><a href="#right-tab1" data-toggle="tab"><span class="label label-info pull-right">Services</span> Washing</a></li>
                      <li><a href="#right-tab2" data-toggle="tab"><span class="label label-info pull-right">Services</span> Ironing</a></li>
                       <li><a href="#right-tab3" data-toggle="tab"><span class="label label-info pull-right">Fixed</span> Delivery</a></li>
                    </ul>
                  </div>
                </div>
                </div>
            </div>
          </div>
    </div>
  </div>
  <!-- /main charts -->




  <!-- All Users Data Table Ajax -->
  <script type="text/javascript">
    var user_status = "default";
    $('#allusers').dataTable({
        ajax: '<?= base_url()?>administration/retrieve_allusers',
        columns: [
          {data: "firstname"},
          {data: "lastname"},
          {data: "email"},
          {data: "group_name"},
          {data: "status", render: function(data,type,row,meta) { 
            if(row.status == "active") {
              label_class = "label-success";
              user_status = row.status;
            }
            else if(row.status == "inactive"){
              label_class = "label-danger";
              user_status = row.status;
            }

            return '<span class="label '+label_class+'">'+row.status+'</span>'}
          },
          {data: "id", render: function(data,type,row,meta) { 
            if(user_status == "active") {
              button = '<ul class="icons-list"><li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu9"></i></a><ul class="dropdown-menu dropdown-menu-right"><li><a href="#"><i class="icon-file-pdf"></i> Export to .pdf</a></li><li><a href="#"><i class="icon-file-excel"></i> Export to .csv</a></li><li><a href="#"><i class="icon-file-word"></i> Export to .doc</a></li></ul></li></ul>';
            } 
            else if(user_status == "inactive") {
              button = "<button type='submit' name='activate_user' class='btn btn-success btn-xs'><i class='fa fa-unlock'></i> Activate</button>";
            }
            return button; }
          },
        ],
    });
 // Alert dialog

  </script>
  <!-- All Users Data Table Ajax -->

<!-- Vertical form modal -->
          <div id="modal_form_vertical" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  
                </div>
                <div class="row" style="padding:20px;">
                <div class="col-sm-6 content-group">
                  <img src="<?=base_url()?>resources/assets/images/logo_demo.png" class="content-group mt-10" alt="" style="width: 120px;">
                  <ul class="list-condensed list-unstyled">
                    <li>2269 Elba Lane</li>
                    <li>Paris, France</li>
                    <li>888-555-2311</li>
                  </ul>
                </div>
                <div class="col-sm-6 content-group">
                  <div class="invoice-details">
                    <h5 class="text-uppercase text-semibold">Order #300324</h5>
                    <ul class="list-condensed list-unstyled">
                      <li>Date: <span class="text-semibold">January 12, 2015</span></li>
                      <li>Due date: <span class="text-semibold">May 12, 2015</span></li>
                    </ul>
                  </div>
                </div>
                <form action="#">
                  <div class="modal-body">
                    <div class="table">
                <table class="table">
                    <thead>
                        <tr>
                        <th>#</th>
                            <th>Item Description</th>
                            <th class="col-sm-1">Unit Price</th>
                            <th class="col-sm-1">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>1</td>
                            <td>
                              <h6 class="no-margin">Create UI design model</h6>
                            </td>
                            <td>$70</td>
                            <td><span class="text-semibold">$3,990</span></td>
                        </tr>
                        <tr>
                        <td>2</td>
                            <td>
                              <h6 class="no-margin">Support tickets list doesn't support commas</h6>
                            </td>
                            <td>$70</td>
                            <td><span class="text-semibold">$840</span></td>
                        </tr>
                        <tr>
                        <td>3</td>
                            <td>
                              <h6 class="no-margin">Fix website issues on mobile</h6>
                            </td>
                            <td>$70</td>
                            <td><span class="text-semibold">$2,170</span></td>
                        </tr>
                    </tbody>
                </table>
                
            </div>
                  </div>
                   <div class="col-sm-7">
                  <span class="text-muted">Invoice To:</span>
                  <ul class="list-condensed list-unstyled">
                    <li><h5>Rebecca Manes</h5></li>
                    <li><span class="text-semibold">Normand axis LTD</span></li>
                    <li>888-555-2311</li>
                    <li><a href="#">rebecca@normandaxis.ltd</a></li>
                  </ul>
                </div>
                <div class="col-sm-5">
                  <div class="content-group">
                    <h6>Total due</h6>
                    <div class="table-responsive no-border">
                      <table class="table">
                        <tbody>
                          <tr>
                            <th>Subtotal:</th>
                            <td class="text-right">$7,000</td>
                          </tr>
                          <tr>
                            <th>Tax: <span class="text-regular">(25%)</span></th>
                            <td class="text-right">$1,750</td>
                          </tr>
                          <tr>
                            <th>Total:</th>
                            <td class="text-right text-primary"><h5 class="text-semibold">$8,750</h5></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                    <div class="text-right">
                      <button type="button" class="btn btn-primary btn-labeled legitRipple"><b><i class="icon-paperplane"></i></b> Send invoice</button>
                    </div>
                  </div>
                </div>
                </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-xs heading-btn legitRipple"><i class="icon-printer position-left"></i> Print</button>
                  
                  </div>
                </form>
              </div>
            </div>
          </div>
  <!-- Vertical form modal -->
          <div id="preview" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title"><i class="fa fa-print"></i> Preview</h4>
            </div>
            <div class="modal-body">
              <form action="" method="post">
              <input type="hidden" name="taskid" value="" />
              <input type="hidden" name="employee_id" value="" />
                <section class="invoice">
                  <div class="row invoice-info">
                   
                  <div class="row">
                    <div class="col-xs-12">
                      <legend>Tools / Materials</legend>
                      <table class="table table-bordered" style="font-size:14px;" id="">
                      </table>
                    </div><!-- /.col -->
                  </div>
                 
                  <div class="row">
                    <div class="col-xs-12">
                      <legend>Machine / Equipment</legend>
                      <table class="table table-bordered" style="font-size:14px;" id="">
                      </table>
                    </div><!-- /.col -->
                  </div>

                  <div class="row">
                    <div class="col-xs-12">
                      <legend>Labour</legend>
                      <table class="table table-bordered" style="font-size:14px;" id="">
                      </table>
                    </div><!-- /.col -->
                  </div>
                  <div class="row">
                    <div class="col-xs-12">
                      <legend>Finance</legend>
                      <table class="table table-bordered" style="font-size:14px;" id="financemodaltable">
                      </table>
                    </div><!-- /.col -->
                  </div>
                   <div class="col-xs-8">
                     <div class="col-sm-4 invoice-col">
                      Prepared by
                      <address>
                        <strong>Mr. Bismark KK Manu</strong><br>
                       
                      </address>
                    </div><!-- /.col -->
                   </div>
                  <!-- this row will not appear when printing -->
                  <div class="row no-print">
                    <div class="col-xs-12">
                      <a href="invoice-print.html" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Print</a>
                       <button type="submit" name="send_request" class="btn btn-success" ><i class="fa fa-envelope-o"></i> Send</button>
                      </div>
                    </div>
                  </div>
                </section>
              </form>
            </div>
              </div>
            </div>
          </div>         
  <!-- Vertical form modal -->
          <div id="Addnewproduct" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h5 class="modal-title">Add to Items</h5>
                </div>

                <form action="#">
                  <div class="modal-body">
                    <div class="form-group">
                      <div class="row">
                        

                       <div class="form-group">
                    <label>Select Garments</label>
                    <div class="input-group">
                      <span class="input-group-addon">
                        <input type="checkbox" class="styled" name="input-addon-checkbox" checked="checked">
                      </span>

                      <div class="multi-select-full">
                        <select class="multiselect" multiple="select">
                          <option value="cheese">Cheese</option>
                          <option value="tomatoes">Tomatoes</option>
                          <option value="mozarella">Mozzarella</option>
                          <option value="mushrooms">Mushrooms</option>
                        </select>
                      </div>
                    </div>                  
                  </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <div class="form-group">
                    <label>Priority</label>
                    <div class="multi-select-auto">
                      <select class="multiselect-auto" multiple="select">
                        <option value="cheese">High</option>
                        <option value="tomatoes">Low</option>
                        <option value="mozarella">Express</option>
                      </select>
                    </div>
                  </div>


                        <div class="col-sm-6">
                          <label>Unit Price</label>
                          <input type="text" placeholder="GHC 5.00" class="form-control">
                        </div>
                         <div class="col-sm-6">
                          <label>Quantity</label>
                          <input type="text" placeholder="Quantity" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-6">
                          <label> Total Price</label>
                          <input type="text" placeholder="GHC 5.00" class="form-control">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit form</button>
                  </div>
                </form>
              </div>
            </div>
          </div>         