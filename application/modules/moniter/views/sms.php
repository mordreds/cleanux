 <!-- Content area -->
  <div class="content">
    <?php //print "<pre>"; print_r($_SESSION); print "</pre>";?>
    <!-- Main charts -->
    <div class="row">
      <div class="col-md-12">
        <!-- Individual column searching (text inputs) -->
          <div class="panel panel-flat">
            
            
            </div>
            <div class="col-md-8">
             <div class="col-md-3"></div>
              <div class="panel panel-flat">
                <div class="panel-heading">
                </div>
                <div class="panel-body">
                  <div class="tabbable">
                    <ul class="nav nav-tabs nav-tabs-bottom">
                      <li class="active"><a href="#pricelist" data-toggle="tab" class="legitRipple">Pending Orders<i class="icon-menu7 position-right"></i></a></li>
                      <li><a href="#addprice" data-toggle="tab" class="legitRipple">New Order<i class="icon-truck position-left"></i></a></li>
                      </ul>

                    <div class="tab-content">
                      <div class="tab-pane active" id="pricelist">
                  <div>
                    <fieldset>
                    <div class="table-responsive">
              <table class="table">
                <table class="table">
                <thead>
                  <tr style="background-color:#009688;color:#ffffff">
                    <th>ID #</th>
                    <th>Service/Status</th>
                    <th>Payable</th>
                    <th>Dispatch</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>300120</td>
                    <td data-toggle="modal" data-target="#modal_form_vertical">Washing</td>
                    <td>GHC 39</td>
                    <td>Pick up</td>
                    <td>Done</td>
                  </tr>
                   <tr>
                    <td>300123</td>
                    <td data-toggle="modal" data-target="#modal_form_vertical">Ironing & Pressing</td>
                    <td>Full-Payment</td>
                    <td>Delivery</td>
                    <td>Processing</td>
                  </tr>
               
                    </tbody>
                  </table>
                  </div>
                    </fieldset>
                  </div>
                      </div>

                      <div class="tab-pane" id="addprice">
                    <fieldset>
                        <div class="form-group">
                      <label>Select item type :</label>
                      <div>
                      <select class="select" style="width:400px;">
                      <option value="AZ">Order Munber</option>
                      <option value="CO">Telephone</option>
                      </optgroup>
                      </select>
                      </div>
                      </div>
                      <div class="form-group col-md-4">
                      <input type="text" class="form-control" placeholder="Quantity">
                      </div>
                      <div class="col-md-4">
                      <div class="form-group ">
                      <input type="text" class="form-control" placeholder="Unit Price" readonly>
                      </div>
                      <div class="form-group  pull-right">
                        <input type="text" class="form-control" placeholder="Total Price" readonly>
                      </div>
                      </div>
                      <div class="text-right">
                              <button type="submit" class="btn btn-success legitRipple" data-toggle="modal" data-target="#checkout">Checkout <i class="icon-arrow-right14 position-right"></i></button>
                            </div>
                    </fieldset>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
             <div class="col-md-4">
               <div class="panel panel-flat">
                <div class="panel-heading">
                  <h6 class="panel-title">Order Statistics<a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
                  <div class="heading-elements">
                   
                          </div>
                </div>

                <div class="container-fluid">
                  <div class="row text-center">
                    <div class="col-md-4">
                      <div class="content-group">
                        <h5 class="text-semibold no-margin"><i class="icon-calendar5 position-left text-slate"></i> 2</h5>
                        <span class="text-muted text-size-small">Pending orders</span>
                      </div>
                    </div>

                    <div class="col-md-4">
                       <div class="content-group">
                        <h5 class="text-semibold no-margin"><i class="icon-cash position-left text-slate"></i>0245626487</h5>
                        <span class="text-muted text-size-small">Mobile Money</span>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="content-group">
                        <h5 class="text-semibold no-margin"><i class="icon-cash3 position-left text-slate"></i>GHC 23,464</h5>
                        <span class="text-muted text-size-small">Balance Payable</span>
                      </div>
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

                </g></svg></div>
             
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
          <div id="checkout" class="modal fade">
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
          <div id="modal_form_vertical" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  
                </div>

                <form action="#">
                  <div class="modal-body">
                    <table id="alluser" class="table ">
              <thead>
                <tr class="bg-teal-400">
                  <th >Status</th>
                  <th >Employee</th>
                  
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Check-In</td>
                  <td>external</td>
                  
                    </tr>
                    <tr>
                  <td>Finance verified</td>
                  <td>external</td>
                  
                    </tr>
                    <tr>
                  <td>Washing & Drying</td>
                  <td>external</td>
                  
                    </tr>
                    <tr>
                  <td>Pressing & Folding</td>
                  <td>external</td>
                  
                    </tr>
                    <tr>
                  <td>Dispatched</td>
                  <td>external</td>
                  
                    </tr>
              </tbody>
              
            </table>
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                  
                  </div>
                </form>
              </div>
            </div>
          </div>
  <!-- Vertical form modal -->
          <div id="comment" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h5 class="modal-title">Comment</h5>
                </div>

                <form action="#">
                  <div class="panel panel-flat">
                <div class="panel-body">
                  <div class="form-group">
                        <textarea rows="6" cols="5" class="form-control" placeholder="Enter your message here"></textarea>
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
           