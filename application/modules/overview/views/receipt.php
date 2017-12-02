 <!-- Content area -->
  <div class="content">
    <?php //print "<pre>"; print_r($_SESSION); print "</pre>";?>
    <!-- Main charts -->
    <div class="row">
      <div class="col-md-12">
        <!-- Individual column searching (text inputs) -->
          <div class="panel panel-flat" style="width:380px;">
            
            <div class="col-md-12">
           <div class="col-md-8">
              <div class="panel panel-flat">

        <div class="panel-body" >
         <div class="row" style="padding:2px;">
                <div class="col-sm-6 content-group">
                    <h5 class="text-uppercase text-semibold">BG"s Laundry</h5>
                </div>
                <div class="col-sm-6 content-group">
                  <div class="invoice-details">
                    <ul class="list-condensed list-unstyled">
                      <li><span class="text-semibold">Order #300324</span></li>
                      <li>Date: <span class="text-semibold">May 12, 2015</span></li>
                      <li>Delivery on: <span class="text-semibold">May 12, 2015</span></li>
                    </ul>
                  </div>
                </div>
                <form action="#">
                  <div class="modal-body">
                <table class="">
                    <thead>
                        <tr>
                        <th>#</th>
                            <th>Description</th>
                            <th class="col-sm-1">U.Price</th>
                            <th class="col-sm-1">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>1</td>
                            <td>
                              <h6 class="no-margin">T-Shirt</h6>
                            </td>
                            <td>70</td>
                            <td><span class="text-semibold">3,990</span></td>
                        </tr>
                        <tr>
                        <td>2</td>
                            <td>
                              <h6 class="no-margin">Singlet</h6>
                            </td>
                            <td>70</td>
                            <td><span class="text-semibold">840</span></td>
                        </tr>
                        <tr>
                        <td>3</td>
                            <td>
                              <h6 class="no-margin">Blanket</h6>
                            </td>
                            <td>70</td>
                            <td><span class="text-semibold">2,170</span></td>
                        </tr>
                    </tbody>
                </table>
                  </div>
                   <div class="col-sm-5">
                  <span class="text-muted">Invoice To:</span>
                  <ul class="list-condensed list-unstyled">
                    <li><h5>Rebecca Manes</h5></li>
                    <li><span class="text-semibold">Normand axis LTD</span></li>
                    <li>888-555-2311</li>
                    <li>Delivery/Pick up</li>
                  </ul>
                </div>
                <div class="col-sm-7">
                  <div class="content-group">
                    <h6>Total due</h6>
                    <div class="">
                      <table class="">
                        <tbody >
                          <tr>
                            <th>Subtotal:</th>
                            <td class="text-right">7,000</td>
                          </tr>
                          <tr>
                            <th>Tax: <span class="text-regular">(25%)</span></th>
                            <td class="text-right">1,750</td>
                          </tr>
                          <tr>
                            <th>Total:</th>
                            <td class="text-right text-primary"><hr></hr><h5 class="text-semibold">8,750</h5><hr></hr></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                  </div>
                </div>
                </div>
        </div>

                <div class="box-footer">

                </div><!-- /.box-footer -->
              </div><!-- /. box -->
            </div><!-- /.col -->

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