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
