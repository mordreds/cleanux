 <!-- Content area -->
  <div class="content">
    <?php //print "<pre>"; print_r($_SESSION); print "</pre>";?>
    <!-- Main charts -->
    <div class="row">
      <div class="col-md-12">
        <!-- Individual column searching (text inputs) -->
          
            <div class="col-md-8">
             <!-- Single mail -->
              <div class="panel panel-white">

                <!-- Mail toolbar -->
                <div class="panel-toolbar panel-toolbar-inbox">
                  <div class="navbar navbar-default">
                    <ul class="nav navbar-nav visible-xs-block no-border">
                      <li>
                        <a class="text-center collapsed" data-toggle="collapse" data-target="#inbox-toolbar-toggle-single">
                          <i class="icon-circle-down2"></i>
                        </a>
                      </li>
                    </ul>

                    <div class="navbar-collapse collapse" id="inbox-toolbar-toggle-single">
                      <div class="btn-group navbar-btn">
                        <button type="button" class="btn bg-blue"><i class="icon-checkmark3 position-left"></i> Send mail</button>
                      </div>

                      <div class="btn-group navbar-btn">
                        <button type="button" class="btn btn-default"><i class="icon-plus2"></i> <span class="hidden-xs position-right">Save</span></button>
                        <button type="button" class="btn btn-default"><i class="icon-cross2"></i> <span class="hidden-xs position-right">Cancel</span></button>

                                  <div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-menu7"></i>
                            <span class="caret"></span>
                          </button>

                          <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li><a href="#">One more line</a></li>
                          </ul>
                        </div>
                      </div>

                      <div class="pull-right-lg">
                        <div class="btn-group navbar-btn">
                          <button type="button" class="btn btn-default"><i class="icon-printer"></i> <span class="hidden-xs position-right">Print</span></button>
                          <button type="button" class="btn btn-default"><i class="icon-new-tab2"></i> <span class="hidden-xs position-right">Share</span></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /mail toolbar -->


                <!-- Mail details -->
                <div class="table-responsive mail-details-write">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td style="width: 150px">To:</td>
                        <td class="no-padding"><input type="text" class="form-control" placeholder="Add recipients"></td>
                        <td style="width: 250px" class="text-right">
                          <ul class="list-inline list-inline-separate no-margin">
                            <li><a href="#">Copy</a></li>
                            <li><a href="#">Hidden copy</a></li>
                          </ul>
                        </td>
                      </tr>
                      <tr>
                        <td>Subject:</td>
                        <td class="no-padding"><input type="text" class="form-control" placeholder="Add subject"></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2">
                          <ul class="list-inline no-margin">
                            <li><a href="#"><i class="icon-attachment position-left"></i> Attach files</a></li>
                            <li><a href="#"><i class="icon-google-drive position-left"></i> Google Drive</a></li>
                            <li><a href="#"><i class="icon-dropbox position-left"></i> Dropbox</a></li>
                          </ul>
                        </td>
                        <td class="text-right">
                          <a href="#"><i class="icon-cloud-upload2 position-left"></i> Cloud drive</a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /mail details -->


                <!-- Mail container -->
                <div class="mail-container-write">
                  <div class="summernote">

       </div>
                </div>
                <!-- /mail container -->


                <!-- Attachments -->
                <div class="mail-attachments-container">
                  <h6 class="mail-attachments-heading">2 Attachments</h6>

                  <ul class="mail-attachments">
                    <li>
                      <span class="mail-attachments-preview">
                        <i class="icon-file-pdf icon-2x"></i>
                      </span>

                      <div class="mail-attachments-content">
                        <span class="text-semibold">new_december_offers.pdf</span>

                        <ul class="list-inline list-inline-condensed no-margin">
                          <li class="text-muted">174 KB</li>
                          <li><a href="#">View</a></li>
                          <li><a href="#">Remove</a></li>
                        </ul>
                      </div>
                    </li>

                    <li>
                      <span class="mail-attachments-preview">
                        <i class="icon-file-pdf icon-2x"></i>
                      </span>

                      <div class="mail-attachments-content">
                        <span class="text-semibold">assignment_letter.pdf</span>

                        <ul class="list-inline list-inline-condensed no-margin">
                          <li class="text-muted">736 KB</li>
                          <li><a href="#">View</a></li>
                          <li><a href="#">Remove</a></li>
                        </ul>
                      </div>
                    </li>
                  </ul>
                </div>
                <!-- /attachments -->

              </div>
            </div>
              <!-- /single mail -->
            <div class="col-md-4">
              
              
            <div class="sidebar sidebar-default">
              <div class="sidebar-content">

                <!-- Sub navigation -->
                <div class="sidebar-category">
                  <div class="category-title">
                    <span>Navigation</span>
                    <ul class="icons-list">
                      <li><a href="#" data-action="collapse"></a></li>
                    </ul>
                  </div>

                  <div class="category-content no-padding">
                    <ul class="navigation navigation-alt navigation-accordion no-padding-bottom">
                      <li class="navigation-header">Folders</li>
                      <li><a href="#" class="legitRipple"><i class="icon-drawer-in"></i> Inbox <span class="badge badge-success">32</span></a></li>
                      <li><a href="#" class="legitRipple"><i class="icon-drawer3"></i> Drafts</a></li>
                      <li><a href="#" class="legitRipple"><i class="icon-drawer-out"></i> Sent mail</a></li>
                      <li><a href="#" class="legitRipple"><i class="icon-stars"></i> Starred</a></li>
                      <li class="navigation-divider"></li>
                      <li><a href="#" class="legitRipple"><i class="icon-spam"></i> Spam <span class="badge badge-danger">99+</span></a></li>
                      <li><a href="#" class="legitRipple"><i class="icon-bin"></i> Trash</a></li>
                     
                    </ul>
                  </div>
                </div>
                <!-- /sub navigation -->



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
           