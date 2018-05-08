<?php if(isset($_SESSION['user']['roles'])) : ?>

<script type="text/javascript">
  /************** Default Settings **************/
    $.extend( $.fn.dataTable.defaults, {
      autoWidth: false,
      responsive: true,
      columnDefs: [{ 
          orderable: false,
          width: '100px'
      }],
      dom: '<"datatable-header"fl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
      language: {
        search: '<span>Filter:</span> _INPUT_',
        lengthMenu: '<span>Show:</span> _MENU_',
        paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
      },
      drawCallback: function () {
        $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
      },
      preDrawCallback: function() {
        $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
      }
    });
  /************** Default Settings **************/

  /***************************** New Registration Page *****************************/
    <?php if($controller_function == "new_registration") : ?>
    $(document).ready(function(){
      /********** Laundry Services ************/
        var service_formurl = "<?=base_url()?>settings/save_services";
        $('#laundry_services').dataTable({
          searching : false,
          paging: false,
          ajax: {
            type : 'GET',
            url : '<?= base_url()?>settings/retrieve_alldata/services/default',
            dataSrc: ''
          },
          columns: [
            {data: "id", render: function(data,type,row,meta) { 
                return meta.row +1;
              } 
            },
            {data: "name"},
            {render: function(data,type,row,meta){
              return '<div class="media-left media-middle"><a href="#" class="btn bg-brown-400 btn-rounded btn-icon btn-xs"><span class="letter-icon">'+row.code+'</span></a></div>';
            }},
            {data: "description"},
            {data: "id", render: function(data,type,row,meta) { 
              if(row.name == "Washing Only")
                button = "";
              else
              button = '<ul class="action_btns"><li><a class="" data-popup="tooltip" title="Delete"><i class="icon-trash text-danger delete_button" style="font-size: 20px" data-deletename="'+row.name+'" data-deleteid="'+row.id+'" data-formurl="'+service_formurl+'" data-tableid="laundry_services"></i></a></li></ul>';
              return button; 
              }
            },
          ], 
        });
        /* <li><a class="edit_service" data-id="'+row.id+'" data-name="'+row.name+'" data-desc="'+row.description+'" data-tableid="laundry_services" data-popup="tooltip" title="Edit"><i class="icon-pencil text-primary" style="font-size: 21px"></i></a></li> */
      /********** Laundry Services ************/

      /********** Laundry Weights  ************/
        var weight_formurl = "<?=base_url()?>settings/save_weight";
        $('#laundry_weights').dataTable({
          searching : false,
          paging: false,
          ajax: {
            type : 'GET',
            url : '<?= base_url()?>settings/retrieve_alldata/vw_weights/default',
            dataSrc: ''
          },
          columns: [
            {data: "id", render: function(data,type,row,meta) { 
                return meta.row +1;
              } 
            },
            {data: "service"},
            {data: "weight"},
            {data: "description"},
            {data: "id", render: function(data,type,row,meta) { 
              button = '<ul class="action_btns"><li><a class="" data-popup="tooltip" title="Delete"><i class="icon-trash text-danger delete_button" style="font-size: 20px" data-deletename="'+row.weight+'" data-deleteid="'+row.id+'" data-formurl="'+weight_formurl+'" data-tableid="laundry_weights"></i></a></li></ul>';
              return button; 
              }
            },
          ], 
        });
        /*
          <li><a class="edit_weight_btn" data-id="'+row.id+'" data-name="'+row.weight+'" data-desc="'+row.description+'" data-service="'+row.service+'" data-tableid="laundry_weights" data-popup="tooltip" title="Edit"><i class="icon-pencil text-primary" style="font-size: 21px"></i></a></li>
        */
      /********** Laundry Weights  ************/

      /********** Laundry Garments  ************/
        var garment_formurl = "<?=base_url()?>settings/save_garment";
        $('#laundry_garments').dataTable({
          searching : false,
          paging: false,
          ajax: {
            type : 'GET',
            url : '<?= base_url()?>settings/retrieve_alldata/garments/default',
            dataSrc: ''
          },
          columns: [
            {data: "id", render: function(data,type,row,meta) { 
                return meta.row +1;
              } 
            },
            {data: "name"},
            {data: "description"},
            {data: "id", render: function(data,type,row,meta) { 
              button = '<ul class="action_btns"><li><a class="" data-popup="tooltip" title="Delete"><i class="icon-trash text-danger delete_button" style="font-size: 20px" data-deletename="'+row.name+'" data-deleteid="'+row.id+'" data-formurl="'+garment_formurl+'" data-tableid="laundry_garments"></i></a></li></ul>';
              return button; 
              }
            },
          ], 
        });
        /*
          <li><a class="edit_garment_btn" data-id="'+row.id+'" data-name="'+row.name+'" data-desc="'+row.description+'" data-tableid="laundry_garments" data-popup="tooltip" title="Edit"><i class="icon-pencil text-primary" style="font-size: 21px"></i></a></li>
        */
      /********** Laundry Garments  ************/

      /********** Laundry Prices    ************/
        var prices_formurl = "<?=base_url()?>settings/save_price";
        let display = "";
        $('#laundry_prices').dataTable({
          searching : false,
          paging: false,
          ajax: {
            type : 'GET',
            url : '<?= base_url()?>settings/retrieve_alldata/vw_prices/default',
            dataSrc: ''
          },
          columns: [
            {data: "id", render: function(data,type,row,meta) { 
                return meta.row +1;
              } 
            },
            {data: "service_name"},
            {data: "description", render: function(data,type,row,meta){
              if(row.weight_id > 0 && row.garment_id > 0)
                display = row.garment_name+" ("+row.weight+")";
              else if(row.weight_id > 0)
                display = row.weight;
              else if(row.garment_id > 0)
                display = row.garment_name

              return display
            }},
            {data: "amount",},
            {data: "id", render: function(data,type,row,meta) { 
              button = '<ul class="action_btns"><li><a class="edit_price_btn" data-id="'+row.id+'" data-service_id="'+row.service_id+'" data-weight_id="'+row.weight_id+'" data-garment_id="'+row.garment_id+'" data-amount="'+row.amount+'" data-tableid="laundry_prices" data-popup="tooltip" title="Edit"><i class="icon-pencil text-primary" style="font-size: 21px"></i></a></li><li><a class="" data-popup="tooltip" title="Delete"><i class="icon-trash text-danger delete_button" style="font-size: 20px" data-deletename="'+row.service_name+' - '+display+'" data-deleteid="'+row.id+'" data-formurl="'+prices_formurl+'" data-tableid="laundry_prices"></i></a></li></ul>';
              return button; 
            }}, 
          ], 
        });
      /********** Laundry Prices    ************/

      /******* Laundry Delivery Prices  *******/
        var service_formurl = "<?=base_url()?>settings/save_delivery";
        $('#laundry_delivery_prices').dataTable({
          searching : false,
          paging: false,
          ajax: {
            type : 'GET',
            url : '<?= base_url()?>settings/retrieve_alldata/delivery/default',
            dataSrc: ''
          },
          columns: [
            {data: "id", render: function(data,type,row,meta) { 
                return meta.row +1;
              } 
            },
            {data: "location"},
            {data: "duration"},
            {data: "price"},
            {data: "id", render: function(data,type,row,meta) { 
              button = '<ul class="action_btns"><li><a class="edit_delivery_price_btn" data-id="'+row.id+'" data-location="'+row.location+'" data-duration="'+row.duration+'" data-price="'+row.price+'" data-tableid="laundry_delivery_prices" data-popup="tooltip" title="Edit"><i class="icon-pencil text-primary" style="font-size: 21px"></i></a></li><li><a class="" data-popup="tooltip" title="Delete"><i class="icon-trash text-danger delete_button" style="font-size: 20px" data-deletename="'+row.location+'" data-deleteid="'+row.id+'" data-formurl="'+service_formurl+'" data-tableid="laundry_delivery_prices"></i></a></li></ul>';
              return button; 
              }
            },
          ], 
        });
        /*  */
      /******* Laundry Delivery Prices  *******/

      /********** Displaying Services *********/
        selectbox_initialize('.display_services','services');
        selectbox_initialize('.display_garments','garments');
        
        $(".display_weights").selectBoxIt({
          autoWidth: false,
          defaultText: "Select One",
          populate: function(){
            var deferred = $.Deferred(), arr = [], x = -1;
            $.ajax({
            url: '<?= base_url()?>settings/retrieve_alldata/vw_weights/default'}).done(function(data) {
              data = JSON.parse(data);
              while(++x < data.length){
                arr[x] = { value : data[x].id, text : data[x].weight };
              }
              deferred.resolve(arr);
            });
            return deferred;
          }
        });
      /********** Displaying Services ******/
    });
    <?php endif; ?>
  /***************************** New Registration Page *****************************/

  /***************************** Company Settings      *****************************/
    <?php if($controller_function == "company") : ?>
    $(document).ready(function(){
      selectbox_initialize('.display_departments','departments','views');
      selectbox_initialize('.display_positions','positions');

      /********** Tables Managment ********/
        /******* Employees ********/
          $('#allemployees').dataTable({
            order:[],
            ajax: {
              type : 'GET',
              url : '<?= base_url()?>settings/retrieve_alldata/employees/views',
              dataSrc: ''
            },
            columns: [
              {data:"employee_id"},
              {render: function(data,type,row,meta){
                return '<div class="media-left media-middle"><a href="#" class="btn bg-teal-400 btn-rounded btn-icon btn-xs"><span class="letter-icon">A</span></a></div><div class="media-body"><a href="#" class="display-inline-block text-default text-semibold letter-icon-title">'+row.fullname+'</a><div class="text-muted text-size-small"><span class="status-mark border-blue position-left"></span> '+row.current_position+'</div></div>';
              }},
              {data:"phone_number_1",render: function(data,type,row,meta){
                return '<a class="text-default display-inline"><span class="text-semibold">'+row.phone_number_1+'</span><div class="text-muted text-size-small"><span class="status-mark border-blue position-left"></span> '+row.phone_number_2+'</div></a>';
              }},
              {data:"email"},
              {data:"residence_address"},
              {data:"phone_number_1",render: function(data,type,row,meta){
                return '<a class="text-default display-inline"><span class="text-semibold">'+row.emergency_fullname+'</span><div class="text-muted text-size-small"><span class="status-mark border-blue position-left"></span> '+row.emergency_phone_1+'</div></a>';
              }},
              {data: "id", render: function(data,type,row,meta) { 
                if(row.status == "active") {
                  button = '<ul class="action_btns" style="margin-bottom:0px"><li><a class="edit_employee_info" data-firstname="'+row.first_name+'" data-lastname="'+row.last_name+'" data-middlename="'+row.middle_name+'" data-gender="'+row.gender+'"  data-marital="'+row.marital_status+'" data-residence_address="'+row.residence_address+'"  data-phone_number_1="'+row.phone_number_1+'" data-phone_number_2="'+row.phone_number_2+'" data-email="'+row.email+'" data-employee_id="'+row.id+'" data-position="'+row.position_id+'" data-emergency_fullname="'+row.emergency_fullname+'" data-emergency_phone_1="'+row.emergency_phone_1+'" data-emergency_residence="'+row.emergency_residence+'" data-emergency_relationship="'+row.emergency_relationship+'" data-popup="tooltip" data-original-title="Edit Info" ><i class="icon-pencil" style="font-size:18px"></i></a></li><li><a data-client_tel="'+row.phone_number_1+'" data-id="'+row.id+'" data-popup="tooltip" data-original-title="Send SMS"><i class="icon-envelop3" style="font-size:18px"></i></a></li><li><a class="" data-popup="tooltip" data-popup="tooltip" data-original-title="Delete"><i class="icon-trash text-danger delete_button" data-deletename="'+row.fullname+'" data-deleteid="'+row.id+'" data-formurl="<?=base_url()?>administration/delete_record" data-tableid="allemployees" data-keyword="employee" style="font-size: 18px"></i></a></li></ul>';
                } 
                else if(user_status == "deleted"){ }

                return button; 
                }
              },
            ]
          });
        /******* Employees ********/

        /******* Departments ********/
          $('#department_tbl').dataTable({
            searching : false,
            paging: false,
            ajax: {
              type : 'GET',
              url : '<?= base_url()?>settings/retrieve_alldata/departments/views',
              dataSrc: '',
            },
            columns: [
              {data: "id", render: function(data,type,row,meta) { 
                  return meta.row +1;
                } 
              },
              {data: "name"},
              {data: "description",render: function(data,type,row,meta) {
                return row.description.substring(0,37);
              }},
              {data: "parent_department_name"},
              {data: "status",render: function(data,type,row,meta) {
                if(row.status == "active") {
                  label_class = "label-success";
                }
                else if(row.status == "suspended"){
                  label_class = "label-warning bg-orange";
                }
                else if(row.status == "deleted"){
                  label_class = "label-danger";
                }

                return '<span class="label '+label_class+'">'+row.status+'</span>';
              }},
              {data: "id", render: function(data,type,row,meta) { 
                button = '<ul class="action_btns"><li><a class="edit_department" data-id="'+row.id+'"  data-tableid="department_tbl" data-popup="tooltip" title="Edit Department" data-name="'+row.name+'" data-descrip="'+row.description+'" data-p_dept="'+row.parent_department_name+'"><i class="icon-pencil text-primary" style="font-size: 21px"></i></a></li><li><a class="" data-popup="tooltip" title="Delete"><i class="icon-trash text-danger delete_button" style="font-size: 20px" data-deletename="'+row.name+'" data-deleteid="'+row.id+'" data-tableid="department_tbl"></i></a></li></ul>';
                return button; 
                }
              },
            ], 
          });
        /******* Departments ********/
        
        /******* Positions ********/
          $('#positions_tbl').dataTable({
            searching : false,
            paging: false,
            ajax: {
              type : 'GET',
              url : '<?= base_url()?>settings/retrieve_alldata/positions/views',
              dataSrc: '',
            },
            columns: [
              {data: "id", render: function(data,type,row,meta) { 
                  return meta.row +1;
                } 
              },
              {data: "name"},
              {data: "parent_position_name"},
              {data: "description",render: function(data,type,row,meta) {
                return row.description.substring(0,37);
              }},
              {data: "status"},
              {data: "status",render: function(data,type,row,meta) {
                if(row.status == "active") {
                  label_class = "label-success";
                }
                else if(row.status == "suspended"){
                  label_class = "label-warning bg-orange";
                }
                else if(row.status == "deleted"){
                  label_class = "label-danger";
                }

                return '<span class="label '+label_class+'">'+row.status+'</span>';
              }},
              {data: "id", render: function(data,type,row,meta) { 
                button = '<ul class="action_btns"><li><a class="edit_department" data-id="'+row.id+'"  data-tableid="department_tbl" data-popup="tooltip" title="Edit Department" data-name="'+row.name+'" data-descrip="'+row.description+'" data-p_dept="'+row.parent_department_name+'"><i class="icon-pencil text-primary" style="font-size: 21px"></i></a></li><li><a class="" data-popup="tooltip" title="Delete"><i class="icon-trash text-danger delete_button" style="font-size: 20px" data-deletename="'+row.name+'" data-deleteid="'+row.id+'" data-tableid="department_tbl"></i></a></li></ul>';
                return button; 
                }
              },
            ], 
          });
        /******* Positions ********/
      /********** Tables Managment ********/
    });
    <?php endif; ?>
  /***************************** Company Settings      *****************************/
</script>
<?php endif; ?>
  
