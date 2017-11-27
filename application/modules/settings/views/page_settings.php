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
          {data: "description"},
          {data: "id", render: function(data,type,row,meta) { 
            button = '<ul class="action_btns"><li><a class="edit_service" data-id="'+row.id+'" data-name="'+row.name+'" data-desc="'+row.description+'" data-tableid="laundry_services" data-popup="tooltip" title="Edit"><i class="icon-pencil text-primary" style="font-size: 21px"></i></a></li><li><a class="" data-popup="tooltip" title="Delete"><i class="icon-trash text-danger delete_button" style="font-size: 20px" data-deletename="'+row.name+'" data-deleteid="'+row.id+'" data-formurl="'+service_formurl+'" data-tableid="laundry_services"></i></a></li></ul>';
            return button; 
            }
          },
        ], 
      });
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
            button = '<ul class="action_btns"><li><a class="edit_weight_btn" data-id="'+row.id+'" data-name="'+row.weight+'" data-desc="'+row.description+'" data-service="'+row.service+'" data-tableid="laundry_weights" data-popup="tooltip" title="Edit"><i class="icon-pencil text-primary" style="font-size: 21px"></i></a></li><li><a class="" data-popup="tooltip" title="Delete"><i class="icon-trash text-danger delete_button" style="font-size: 20px" data-deletename="'+row.weight+'" data-deleteid="'+row.id+'" data-formurl="'+weight_formurl+'" data-tableid="laundry_weights"></i></a></li></ul>';
            return button; 
            }
          },
        ], 
      });
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
            button = '<ul class="action_btns"><li><a class="edit_garment_btn" data-id="'+row.id+'" data-name="'+row.name+'" data-desc="'+row.description+'" data-tableid="laundry_garments" data-popup="tooltip" title="Edit"><i class="icon-pencil text-primary" style="font-size: 21px"></i></a></li><li><a class="" data-popup="tooltip" title="Delete"><i class="icon-trash text-danger delete_button" style="font-size: 20px" data-deletename="'+row.name+'" data-deleteid="'+row.id+'" data-formurl="'+garment_formurl+'" data-tableid="laundry_garments"></i></a></li></ul>';
            return button; 
            }
          },
        ], 
      });
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

    /********** Displaying Services ******/
      $(document).ready(function() {
        selectbox_initialize('.display_services','services');
        selectbox_initialize('.display_garments','garments');
      });

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
</script>
<?php endif; ?>
  
