 <!-- Content area -->
  <div class="content">
    <?php //print "<pre>"; print_r($_SESSION); print "</pre>";?>
    <!-- Main charts -->
    <div class="row">
      <div class="col-md-12">
        <!-- Individual column searching (text inputs) -->
          <div class="panel panel-flat">
            
            <div class="col-md-12">
            <div class="col-md-3">
            </div>
              <div class="col-md-6">
              <div class="panel panel-flat">
                <div class="panel-heading">
                </div>

                <div class="panel-body">
                  <div class="tabbable">
                    <ul class="nav nav-tabs nav-tabs-bottom">
                      <li ><a href="#right-icon-tab1" data-toggle="tab" class="legitRipple">History<i class="icon-menu7 position-right"></i></a></li>
                      <li class="active"><a href="#right-icon-tab2" data-toggle="tab" class="legitRipple">New Code<i class="icon-key position-left"></i></a></li>
                      </ul>

                    <div class="tab-content">
                      <div class="tab-pane " id="right-icon-tab1">
                  <div>
                    <fieldset>
                    <div class="table-responsive">
              <table class="table">
                <table class="table">
                <thead>
                  <tr style="background-color:#009688;color:#ffffff">
                    <th>Code #</th>
                    <th>Duration</th>
                    <th>Days Left</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>300120</td>
                    <td>30 days</td>
                    <td  >5</td>
                  </tr>
                   <tr>
                    <td>300120</td>
                    <td>30 days</td>
                   <td  >0</td>
                  </tr>
               
                    </tbody>
                  </table>
                  </div>
                    </fieldset>
                  </div>
                      </div>

                      <div class="tab-pane active" id="right-icon-tab2">
                          <fieldset>

                      <div class="row">
                      <div class="col-md-3"></div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <input type="text" placeholder="Code" class="form-control">
                          </div>
                        </div>

                      <button type="submit" class="btn btn-warning btn-xs legitRipple">Activate <i class="icon-arrow-right14 position-right"></i></button>
                    
                        <div class="col-md-3"></div>
                      </div></fieldset>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <div class="col-md-3">
            </div>
            </div>
            
  </div>
  </table>
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

                <form action="#">
                  <div class="modal-body">
                    <table id="alluser" class="table ">
              <thead>
                <tr class="bg-teal-400">
                  <th >Status</th>
                  <th >Last Name</th>
                  
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Check-In</td>
                  <td>Bismark</td>
                  
                    </tr>
                    <tr>
                  <td>Finance verified</td>
                  <td>Bismark</td>
                  
                    </tr>
                    <tr>
                  <td>Washing & Drying</td>
                  <td>Bismark</td>
                  
                    </tr>
                    <tr>
                  <td>Pressing & Folding</td>
                  <td>Bismark</td>
                  
                    </tr>
                    <tr>
                  <td>Dispatched</td>
                  <td>Bismark</td>
                  
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
           