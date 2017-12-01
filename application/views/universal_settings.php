<?php if(isset($_SESSION['user']['roles'])) : ?>

<script type="text/javascript">
  $(document).ready(function() {
    /********** Viewing Laundry Cart ******/
      $('#view_cart').click(function(){
        $('#laundry_cart').DataTable().ajax.reload();
        cart_buttons_switch();
      });

      $('#laundry_cart').dataTable({
        searching: false,
        paging: false,
        order: [],
        autoWidth: false,
        ajax: {
          type : 'GET',
          dataType : 'json',
          url : '<?= base_url()?>overview/laundry_cart',
          dataSrc: '',
          error: function(response){}
        },
        columns: [
          {data: "service_code", render: function(data,type,row,meta){
            return '<div class="media-left media-middle"><a href="#" class="btn bg-brown-400 btn-rounded btn-icon btn-xs"><span class="letter-icon">'+row.service_code+'</span></a></div>';
          }},
          {render: function(data,type,row,meta){
            return '<b><span class="text-muted">'+row.service_name+'</span></b></a>';
          }},
          {render: function(data,type,row,meta){
            let garment = row.garment_name;
            let weight = row.weight_name;
            let return_data = "";

            if(garment)
              return garment;
            else
              return weight;
          }},
          {data: 'quantity'},
          {data: 'price'},
          {render: function(data,type,row,meta){
            if(row.service_name == "Washing Only")
              return row.price;
            else
              return row.quantity * row.price;
          }},
          {render: function(data,type,row,meta){
            return '<i data-deleteid="'+row.array_index+'" class="icon-cross2 text-danger delete_item" style="cursor: pointer;"></i>';
          }},
        ],
      });

      /*$('#laundry_cart thead>tr>th:nth-child(4)').css({'max-width':"5px"});
      $('#laundry_cart thead>tr>th:nth-child(5)').css({'max-width':"5px"});*/

      $('#laundry_cart').on('click','.delete_item',function(){
        let array_index = $(this).data('deleteid');
        let formurl = "<?=base_url()?>overview/delete_from_cart";
        let formData = {'deleteid': array_index};
        ajax_post(formurl,formData,tableid="laundry_cart");

        let total_order = parseInt($('#order_cart').text()) - 1;
        $('#order_cart').text(total_order);
        $('#laundry_cart').DataTable().ajax.reload();
        cart_buttons_switch();
      });

      $('#clear_cart').click(function(){
        let formurl = "<?=base_url()?>overview/clear_cart";
        let formData = {'data': "clear chart"};
        ajax_post(formurl,formData,tableid="laundry_cart");
        location.reload();
      });
    /********** Viewing Laundry Cart ******/

    /****** Retrieving Price List ******/
      let services_formurl = "<?=base_url()?>settings/retrieve_alldata/services/default";
      var service_name = "";
      $.ajax({
        type : 'GET',
        url: services_formurl,
        data : '',
        success: function(response) { 
          response = JSON.parse(response)
          $.each(response, function(index) {
            service_name = '<li><a href="#" data-toggle="tab"><span class="label label-info pull-right">Services</span> '+response[index].name+'</a></li>';
            $(service_name).appendTo('#pricelists');
          });
        },
        error: function() {
          $.jGrowl('An Error Retrieving Price List', {
            theme: 'alert-styled-left bg-danger'
          });
        }
      });
    /****** Retrieving Price List ******/

    /****** Delivery Dropdown ******/
      $(".display_delivery").selectBoxIt({
        autoWidth: false,
        defaultText: "Select One",
        populate: function(){
          var deferred = $.Deferred(), arr = [], x = -1;
          $.ajax({
          url: '<?= base_url()?>settings/retrieve_alldata/delivery/default'}).done(function(data) {
            data = JSON.parse(data);
            while(++x < data.length){
              arr[x] = { value : data[x].id, text : data[x].location, 'data-delivery_days': data[x].duration, 'data-delivery_amount': data[x].price};
            }
            deferred.resolve(arr);
          });
          return deferred;
        }
      });
    /****** Delivery Dropdown ******/

    /********** Total Cost ******/
      $('#checkout').click(function() {
        let t_cost_url = '<?=base_url()?>overview/new_order_totalCost';
        $.ajax({
          type : 'GET',
          url: t_cost_url,
          data : '',
          success: function(response) { 
            response = JSON.parse(response);
            if(response.error) {
              $.jGrowl(response.error, {
                theme: 'alert-styled-left bg-danger'
              });
            }
            else
              $('#cart_total_amount').val("GHC "+response.total);
          },
          error: function() {
            $.jGrowl('An Error Retrieving Total Cost', {
              theme: 'alert-styled-left bg-danger'
            });
          }
        });
      });
    /********** Total Cost ******/

    /********** Delivery OnChange ******/
      $('body').on('change','.display_delivery',function() {
        let collection_date = $('.display_delivery option:selected').data('delivery_days');
        if(!collection_date) {
          collection_date = "No Selection Made";
          let t_cost_url = '<?=base_url()?>overview/new_order_totalCost';
          $.ajax({
            type : 'GET',
            url: t_cost_url,
            data : '',
            success: function(response) { 
              response = JSON.parse(response);
              if(response.error) {
                $.jGrowl(response.error, {
                  theme: 'alert-styled-left bg-danger'
                });
              }
              else
                $('#cart_total_amount').val(response.total);
            },
            error: function() {
              $.jGrowl('An Error Retrieving Total Cost', {
                theme: 'alert-styled-left bg-danger'
              });
            }
          });
        } else {
          collection_date = $('.display_delivery option:selected').data('delivery_days') + " After Due Date (GHS "+$('.display_delivery option:selected').data('delivery_amount')+")";
          /****** Retrieving Cost ******/
            let t_cost_url = '<?=base_url()?>overview/new_order_totalCost';
            var total_cost;

            $.ajax({
              async : false,
              type : 'GET',
              global: false,
              dataType: "json",
              url: t_cost_url,
              success: function(response) { 
                total_cost = response.total;
              },
              error: function() {
                $.jGrowl('An Error Retrieving Total Cost', {
                  theme: 'alert-styled-left bg-danger'
                });
              }
            });
          /****** Retrieving Cost ******/
          delivery_cost = $('.display_delivery option:selected').data('delivery_amount');
          
          let total_sum = parseFloat(total_cost) + parseFloat(delivery_cost);
          $('#cart_total_amount').val(total_sum);
        }

        $('#delivery_notice').text(collection_date);
        
      });
    /********** Delivery OnChange ******/

    /********** Amount Being Paid ******/
      $('.amount_payable').on('input',function(){
        let current_total = $('#cart_total_amount').val();
        let order_balance = $('.order_balance').val();

        alert(current_total);
      });
    /********** Amount Being Paid ******/
  });
  
  /********** Checkout Button Display ******/
    function cart_buttons_switch(){
      var rowCount = $('#laundry_cart tbody tr').length;
      var rowData = $('#laundry_cart tbody tr td:eq(0)').text();
      
      if(rowCount <= 1 && rowData == "No Record(s) Found") {
        $('#proceed_btn').attr('style',"display:none");
        $('#checkout').attr('style',"display:none");
      }
      else if(rowCount >= 1 && rowData != "No Record(s) Found") {
        $('#proceed_btn').attr('style',"display:inline-block");
        $('#checkout').attr('style',"display:inline-block");
      }
    };
  /********** Checkout Button Display ******/

  
</script>
<?php endif; ?>
  