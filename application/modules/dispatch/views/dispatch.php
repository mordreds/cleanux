 <!-- Content area -->
  <div class="content">
    <?php //print "<pre>"; print_r($_SESSION); print "</pre>";?>
    <!-- Main charts -->
    <div class="row">
      <div class="col-md-12">
        <!-- Individual column searching (text inputs) -->
          <div class="panel panel-flat">
            <div class="panel-heading">
              <div class="heading-elements">
                <ul class="icons-list">
                  <li><a data-action="collapse"></a></li>
                  <li><a data-action="reload"></a></li>
                  <li><a data-action="close"></a></li>
                </ul>
              </div>
            </div>

            <div class="panel-body">
            
            </div>

           <table id="alluser" class="table table-responsive datatable-column-search-inputs">
              <thead>
                <tr class="bg-teal-400">
                  <th>Order #</th>
                    <th>Description</th>
                    <th># Items</th>
                    <th>Total Cost</th>
                    <th>Balance</th>
                    <th>Status</th>
                    <th>Comment</th>
                    <th>Dispatch</th>
                     <th class="text-center">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td data-toggle="modal" data-target="#orders">300123</td>
                    <td>T-shirt,Black Shorts,Blue Shirt,Blue Jean</td>
                    <td>4</td>
                    <td>15.00</td>
                    <td>0.00</td>
                    <td><i data-toggle="modal" data-target="#modal_form_vertical">Washing & Drying</i></td>
                    <td  data-toggle="modal" data-target="#comment">Comment(0)</td>
                    <td>Pickup</td>
                       <td class="text-center">
                    <ul class="icons-list">
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                          <i class="icon-menu9"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                         <li><a href="#"><i class="icon-file-pdf"></i> Delivery</a></li>
                          <li><a href="#"><i class="icon-file-excel"></i>Pickup</a></li>
                        </ul>
                      </li>
                    </ul>
                  </td>
                      </tr>
                      <tr>
                  <td data-toggle="modal" data-target="#orders" >300120</td>
                    <td>T-shirt,Black Shorts,Blue Shirt,</td>
                    <td>3</td>
                    <td>15.00</td>
                    <td>0.00</td>
                    <td><i data-toggle="modal" data-target="#modal_form_vertical">Washing & Drying</i></td>
                    <td  data-toggle="modal" data-target="#comment">Comment(1)</td>

                     <td>delivery</td>
                  <td class="text-center">
                    <ul class="icons-list">
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                          <i class="icon-menu9"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                         <li><a href="#"><i class="icon-file-pdf"></i> Delivery</a></li>
                          <li><a href="#"><i class="icon-file-excel"></i>Pickup</a></li>
                        </ul>
                      </li>
                    </ul>
                  </td>
                      </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td>Order #</td>
                    <td>Description</td>
                    <td>Quantity</td>
                    <td>Total Price</td>
                    <td>Balance</td>
                    <td>Status</td>
                    <td>Tax</td>
                    <td>Comment</td>
                  <td class="text-center">Actions</td>
                      </tr>
              </tfoot>
            </table>
          </div>
          <!-- /individual column searching (text inputs) -->
      
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

