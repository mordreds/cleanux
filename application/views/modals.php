<?php if(isset($_SESSION['user']['id'])) : ?>

<!-- *********** Delete Modal *********** -->
  <script type="text/javascript">
    $(document).on("click",".delete_button",function(){
      $('#deletename_').text($(this).data('deletename'));
      $('.delete_confirmed_').attr('data-formurl',$(this).data('formurl'));
      $('.delete_confirmed_').attr('data-deleteid',$(this).data('deleteid'));
      $('.delete_confirmed_').attr('data-tableid',$(this).data('tableid'));
      $('#delete_modal_').modal('show');
    });
  </script>
  <div id="delete_modal_" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h6 class="modal-title">Delete Confirmation</h6>
        </div>
        <div class="modal-body">
          Do You Want To Really Delete <?php echo "<strong><em id='deletename_'></em></strong>"; ?> .... ?
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-link" data-dismiss="modal">Close</button> &nbsp;&nbsp;
          <button type="button" class="btn btn-danger delete_confirmed_" data-dismiss="modal">Delete</button>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $(document).on("click",".delete_confirmed_",function(){
      let formurl = $(this).data('formurl');
      let tableid = $(this).data('tableid');
      let formData = { 
        'id': $(this).data('deleteid'),
        'delete_item': "Confirmed"
      };
      ajax_post(formurl,formData,tableid);
    });
  </script>

  <script type="text/javascript">
    $(document).on("click",".delete_btn",function(){
      $('#deletename').text($(this).data('displayname'));
      $('.delete_confirmed').attr('data-user_id',$(this).data('dataid'));
      $('.delete_confirmed').attr('data-email',$(this).data('email'));
      $('.delete_confirmed').attr('data-status',$(this).data('state'));
      $('#delete_modal').modal('show');
    });
  </script>
  <div id="delete_modal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h6 class="modal-title">Delete Confirmation</h6>
        </div>
        <div class="modal-body">
          Do You Want To Really Delete <?php echo "<strong><em id='deletename'></em></strong>"; ?> .... ?
          <input type="hidden" id="deleteId" name="deleteid"/> 
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-link" data-dismiss="modal">Close</button> &nbsp;&nbsp;
          <button type="button" class="btn btn-danger delete_confirmed" data-dismiss="modal">Delete</button>
        </div>
      </div>
    </div>
  </div>
<!-- *********** Delete Modal *********** -->

<!-- *********** Reset Password ********* -->
  <script type="text/javascript">
    $('.table').on('click','#reset_password', function(){
      $('#password_reset_displayname').val($(this).data('fullname'));
      $('#change_pwd_submit').attr('data-user_id',$(this).data('id'));
      $('#change_pwd_submit').attr('data-email',$(this).data('username'));
      $('#password_reset_modal').modal('show');
    });
  </script>

  <div id="password_reset_modal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h6 class="modal-title">Reset Password</h6>
        </div>
        <div class="modal-body">
          <div class="form-group has-feedback">
            <label>Username: </label>
            <input id="password_reset_displayname" type="text" placeholder="Your username" class="form-control" readonly>
            <div class="form-control-feedback">
              <i class="icon-user text-muted"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label>Password: </label>
            <input id="new_password" type="password" placeholder="Your password" class="form-control">
            <div class="form-control-feedback">
              <i class="icon-lock text-muted"></i>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-link" data-dismiss="modal">Close</button> &nbsp;&nbsp;
          <button type="button" class="btn btn-success" id="change_pwd_submit" data-dismiss="modal">Save</button>
        </div>
      </div>
    </div>
  </div>
<!-- *********** Reset Password ********* -->

<!-- *********** Edit Laundry Service ********* -->
  <script type="text/javascript">
    $('.table').on('click','.edit_service', function(){
      $('#service_displayname').val($(this).data('name'));
      $('#service_description').val($(this).data('desc'));
      $('#edit_service_submit').attr('data-id',$(this).data('id'));
      $('#edit_service_submit').attr('data-service_name',$(this).data('name'));
      $('#edit_service_submit').attr('data-service_desc',$(this).data('desc'));
      $('#edit_service_submit').attr('data-tableid',$(this).data('tableid'));
      $('#edit_service_submit').attr('data-formurl',"<?=base_url()?>settings/save_services");
      $('#edit_service').modal('show');
    });
  </script>

  <div id="edit_service" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-teal-400">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h6 class="modal-title">Edit Service</h6>
        </div>
        <div class="modal-body">
          <div class="form-group has-feedback">
            <label  class="display-block">Name: </label>
            <input id="service_displayname" type="text" class="form-control">
          </div>
          <div class="form-group has-feedback">
            <label  class="display-block">Description: </label>
            <input id="service_description" type="text" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-link" data-dismiss="modal">Close</button> &nbsp;&nbsp;
          <button type="button" class="btn btn-primary" id="edit_service_submit" data-dismiss="modal">Save</button>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $(document).on("click","#edit_service_submit",function(){
      let formurl = $(this).data('formurl');
      let tableid = $(this).data('tableid');
      let formData = { 
        'id': $(this).data('id'),
        'service_name': $('#service_displayname').val(),
        'service_desc': $('#service_description').val(),
      };
      ajax_post(formurl,formData,tableid);
    });
  </script>
<!-- *********** Edit Laundry Service ********* -->

<!-- *********** checkinig out  ********* -->
  <script type="text/javascript">
    $('.table').on('click','.edit_service', function(){
      $('#service_displayname').val($(this).data('name'));
      $('#service_description').val($(this).data('desc'));
      $('#edit_service_submit').attr('data-id',$(this).data('id'));
      $('#edit_service_submit').attr('data-service_name',$(this).data('name'));
      $('#edit_service_submit').attr('data-service_desc',$(this).data('desc'));
      $('#edit_service_submit').attr('data-tableid',$(this).data('tableid'));
      $('#edit_service_submit').attr('data-formurl',"<?=base_url()?>settings/save_services");
      $('#edit_service').modal('show');
    });
  </script>

  <div id="checkingout" class="modal fade">
    <div class="modal-dialog" style="width:350px;">
      <div class="modal-content">
        <div class="modal-header ">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form>
       <div class="modal-body">
                    <div class="form-group">
                      <div class="row">
                      <div class="col-sm-2"></div>
                        <div class="col-sm-4">
                          <label>Pick Up</label><p>(Free)</p>
                          <input type="radio" class="styled" name="pick" >
                        </div>
                        <div class="col-sm-2"></div>
                        <div class="col-sm-4">
                          <label>Delivery</label><p>(5.00)</p>
                          <input type="radio"  class="styled" name="pick">
                        </div>
                      </div>
                    </div>
                    <hr></hr>
                    <div class="form-group">
                     <div class="row">
                     <div class="col-sm-3"></div>
                      <div class="col-sm-6">
                          <label>Delivery Date</label>
                          <input type="date" placeholder="0.00" data-mask="0.00" class="form-control">
                        </div>
                        <div class="col-sm-3"></div>
                        </div>
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-6">
                          <label>Total </label>
                          <input type="text" placeholder="0.00" class="form-control" readonly>
                          
                        </div>

                        <div class="col-sm-6">
                          <label>Amount Paying</label>
                          <input type="text" placeholder="0.00" data-mask="0.00" class="form-control">
                        </div>
                      </div>
                    </div>
                  </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-denger pull-left" data-dismiss="modal">Discard</button> &nbsp;&nbsp;
          <button type="button" class="btn btn-warning btn-xs heading-btn legitRipple" data-toggle="modal" data-target="#checkout"> Proceed</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $(document).on("click","#edit_service_submit",function(){
      let formurl = $(this).data('formurl');
      let tableid = $(this).data('tableid');
      let formData = { 
        'id': $(this).data('id'),
        'service_name': $('#service_displayname').val(),
        'service_desc': $('#service_description').val(),
      };
      ajax_post(formurl,formData,tableid);
    });
  </script>
<!-- *********** check out ********* -->

<!-- *********** check out ********* -->
  <script type="text/javascript">
    $('.table').on('click','.edit_service', function(){
      $('#service_displayname').val($(this).data('name'));
      $('#service_description').val($(this).data('desc'));
      $('#edit_service_submit').attr('data-id',$(this).data('id'));
      $('#edit_service_submit').attr('data-service_name',$(this).data('name'));
      $('#edit_service_submit').attr('data-service_desc',$(this).data('desc'));
      $('#edit_service_submit').attr('data-tableid',$(this).data('tableid'));
      $('#edit_service_submit').attr('data-formurl',"<?=base_url()?>settings/save_services");
      $('#edit_service').modal('show');
    });
  </script>

  <div id="checkout" class="modal fade">
    <div class="modal-dialog" style="width:350px;">
      <div class="modal-content">
        <div class="modal-header ">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
         <div class="row" style="padding:2px;">
                <div class="col-sm-6 content-group">
                </div>
                <div class="col-sm-6 content-group">
                  <div class="invoice-details">
                    <h5 class="text-uppercase text-semibold">BG"s Laundry</h5>
                    <ul class="list-condensed list-unstyled">
                      <li><span class="text-semibold">Order #300324</span></li>
                      <li>Date: <span class="text-semibold">May 12, 2015</span></li>
                      <li>Delivery on: <span class="text-semibold">May 12, 2015</span></li>
                    </ul>
                  </div>
                </div>
                <form action="#">
                  <div class="modal-body">
                <table class="table">
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
                    <div class="table-responsive no-border">
                      <table class="table">
                        <tbody>
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
                            <td class="text-right text-primary"><h5 class="text-semibold">8,750</h5></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                  </div>
                </div>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-link" data-dismiss="modal">Close</button> &nbsp;&nbsp;
                    <button type="button" class="btn btn-default btn-xs heading-btn legitRipple"><i class="icon-printer position-left"></i> Print</button>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $(document).on("click","#edit_service_submit",function(){
      let formurl = $(this).data('formurl');
      let tableid = $(this).data('tableid');
      let formData = { 
        'id': $(this).data('id'),
        'service_name': $('#service_displayname').val(),
        'service_desc': $('#service_description').val(),
      };
      ajax_post(formurl,formData,tableid);
    });
  </script>

<!-- *********** Edit Laundry Weights ********* -->
  <script type="text/javascript">
    $('.table').on('click','.edit_weight_btn', function(){
      var selectbox = $('select.display_services').selectBoxIt().data('selectBox-selectBoxIt');
      selectbox.setOption({selectOption: $(this).data('id')});

      /*$('#weight_serviceType').val($(this).data('service'));*/
      $('#weight_displayname').val($(this).data('name'));
      $('#weight_description').val($(this).data('desc'));
      $('#edit_weight_submit').attr('data-id',$(this).data('id'));
      $('#edit_weight_submit').attr('data-weight_name',$(this).data('name'));
      $('#edit_weight_submit').attr('data-weight_desc',$(this).data('desc'));
      $('#edit_weight_submit').attr('data-tableid',$(this).data('tableid'));
      $('#edit_weight_submit').attr('data-formurl',"<?=base_url()?>settings/save_weight");
      $('#edit_weight').modal('show');
    });
  </script>

  <div id="edit_weight" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-teal-400">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h6 class="modal-title">Edit Weight Info</h6>
        </div>
        <div class="modal-body">
          <div class="form-group has-feedback">
            <label  class="display-block">Service Type: </label>
            <select id="new_service" class="form-control display_services" name="service_type"></select>
          </div>
          <div class="form-group has-feedback">
            <label  class="display-block">Name: </label>
            <input id="weight_displayname" type="text" class="form-control">
          </div>
          <div class="form-group has-feedback">
            <label  class="display-block">Description: </label>
            <input id="weight_description" type="text" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-link" data-dismiss="modal">Close</button> &nbsp;&nbsp;
          <button type="button" class="btn btn-primary" id="edit_weight_submit" data-dismiss="modal">Save <i class="icon-arrow-right14 position-right"></i></button>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $(document).on("click","#edit_weight_submit",function(){
      let formurl = $(this).data('formurl');
      let tableid = $(this).data('tableid');
      let formData = { 
        'id': $(this).data('id'),
        'service_type': $('#new_service').val(),
        'weight': $('#weight_displayname').val(),
        'weight_description': $('#weight_description').val(),
      };
      ajax_post(formurl,formData,tableid);
    });
  </script>
<!-- *********** Edit Laundry Weights ********* -->

<!-- *********** Edit Laundry Garments ********* -->
  <script type="text/javascript">
    $('.table').on('click','.edit_garment_btn', function(){
      $('#garment_displayname').val($(this).data('name'));
      $('#garment_description').val($(this).data('desc'));
      $('#edit_garment_submit').attr('data-id',$(this).data('id'));
      $('#edit_garment_submit').attr('data-garment_name',$(this).data('name'));
      $('#edit_garment_submit').attr('data-garment_desc',$(this).data('desc'));
      $('#edit_garment_submit').attr('data-tableid',$(this).data('tableid'));
      $('#edit_garment_submit').attr('data-formurl',"<?=base_url()?>settings/save_garment");
      $('#edit_garment').modal('show');
    });
  </script>

  <div id="edit_garment" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-teal-400">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h6 class="modal-title">Edit Weight Info</h6>
        </div>
        <div class="modal-body">
          <div class="form-group has-feedback">
            <label  class="display-block">Name: </label>
            <input id="garment_displayname" type="text" class="form-control">
          </div>
          <div class="form-group has-feedback">
            <label  class="display-block">Description: </label>
            <input id="garment_description" type="text" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-link" data-dismiss="modal">Close</button> &nbsp;&nbsp;
          <button type="button" class="btn btn-primary" id="edit_garment_submit" data-dismiss="modal">Save <i class="icon-arrow-right14 position-right"></i></button>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $(document).on("click","#edit_garment_submit",function(){
      let formurl = $(this).data('formurl');
      let tableid = $(this).data('tableid');
      let formData = { 
        'id': $(this).data('id'),
        'garment_name': $('#garment_displayname').val(),
        'garment_desc': $('#garment_description').val(),
      };
      ajax_post(formurl,formData,tableid);
    });
  </script>
<!-- *********** Edit Laundry Garments ********* -->

<!-- *********** Edit Laundry Price ********* -->
  <script type="text/javascript">
    $('.table').on('click','.edit_price_btn', function(){
      let service_id = $(this).data("service_id");
      let weight_id  = $(this).data("weight_id");
      let garment_id  = $(this).data("garment_id");

      selectbox_initialize('#price_service_type','services',service_id);
      selectbox_initialize('#price_garments','garments',garment_id);
      
      var weights = $("#price_weight").selectBoxIt({
        autoWidth: false,
        defaultText: "Select One",
        populate: function(){
          var deferred = $.Deferred(), arr = [], x = -1;
          $.ajax({
          url: '<?= base_url()?>settings/retrieve_alldata/vw_weights/default'}).done(function(data) {
            data = JSON.parse(data);
            while(++x < data.length){
              if(data[x].id == weight_id)
                arr[x] = { value : data[x].id, text : data[x].weight, selected: "selected" };
              else
              arr[x] = { value : data[x].id, text : data[x].weight };
            }
            deferred.resolve(arr);
          });
          return deferred;
        }
      });
      
      $('#amount').val($(this).data('amount'));

      $('#edit_price_submit').attr('data-id',$(this).data('id'));
      $('#edit_price_submit').attr('data-service_id',$(this).data('service_id'));
      $('#edit_price_submit').attr('data-weight_id',$(this).data('weight_id'));
      $('#edit_price_submit').attr('data-garment_id',$(this).data('garment_id'));
      $('#edit_price_submit').attr('data-tableid',$(this).data('tableid'));
      $('#edit_price_submit').attr('data-formurl',"<?=base_url()?>settings/save_price");
      $('#edit_price_list').modal('show');
    });
  </script>

  <div id="edit_price_list" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-teal-400">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h6 class="modal-title">Edit Price Info</h6>
        </div>
        <div class="modal-body">
          <div class="form-group has-feedback">
            <label  class="display-block">Service Type: </label>
            <select id="price_service_type" class="form-control" name="service_type">
              <option value="">Select One</option>
            </select>
          </div>
          <div class="form-group has-feedback">
            <label  class="display-block">Service Weight: </label>
            <select id="price_weight" class="form-control display_weights" name="weight">
              <option value="">Select One</option>
            </select>
          </div>
          <div class="form-group has-feedback">
            <label  class="display-block">Service Garment: </label>
            <select id="price_garments" class="form-control" name="weight">
              <option value="">Select One</option>
            </select>
          </div>
          <div class="form-group has-feedback">
            <label  class="display-block">Amount: </label>
            <input id="amount" type="text" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-link" data-dismiss="modal">Close</button> &nbsp;&nbsp;
          <button type="button" class="btn btn-primary" id="edit_price_submit" data-dismiss="modal">Save <i class="icon-arrow-right14 position-right"></i></button>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $(document).on("click","#edit_price_submit",function(){
      let formurl = $(this).data('formurl');
      let tableid = $(this).data('tableid');
      let formData = { 
        'id': $(this).data('id'),
        'service_id': $('#price_service_type').val(),
        'weight_id': $('#price_weight').val(),
        'garment_id': $('#price_garments').val(),
        'amount': $('#amount').val(),
      };
      ajax_post(formurl,formData,tableid);
    });
  </script>
<!-- *********** Edit Laundry Price ********* -->


<?php endif; ?>