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

  /********** Search Order / Info  ************/
    $(document).ready(function() {
      <?php if(!empty($new_client_number)) 
        print "$('#search_submit').click()";
      ?>
    });
    
    $('#search_submit').click(function(e){
      let search_text = $('#search_text').val();
      var formurl = "<?=base_url()?>overview/search";
      if(search_text == "")
        notification("failed","Order Number / Phone Number Required ");
      else {
        let formData = { 
          'search_text': search_text
        };

        $.ajax({
          type : 'POST',
          url : formurl,
          data : formData,
          success: function(response) { 
            response = JSON.parse(response)
            var total_billing_cost = "";
            if(response[0]) {  
              /****** Client Info ***********/
                $('[name="id"]').val(response[0].id);
                $('[name="fullname"]').val(response[0].fullname);
                $('[name="fullname"]').attr('readonly',"readonly");
                $('[name="company_name"]').val(response[0].company);
                $('[name="company_name"]').attr('readonly',"readonly");
                $('[name="residence_addr"]').val(response[0].residence_address);
                $('[name="residence_addr"]').attr('readonly',"readonly");
                $('[name="postal_addr"]').val(response[0].postal_address);
                $('[name="postal_addr"]').attr('readonly',"readonly");
                $('[name="primary_tel"]').val(response[0].phone_number_1);
                $('[name="primary_tel"]').attr('readonly',"readonly");
                $('[name="secondary_tel"]').val(response[0].phone_number_2);
                $('[name="secondary_tel"]').attr('readonly',"readonly");
                $('[name="email"]').val(response[0].email);
                $('[name="email"]').attr('readonly',"readonly");
                $('[name="gender_alt"]').val(response[0].gender);
                $('[name="gender_alt"]').attr('style',"display:block");
                $('[name="gender"]').attr('style',"display:none");
              /****** Client Info ***********/

              /****** Pending Order Table ***********/
                $('#pending_order_table').DataTable().destroy();
                if(search_text.length >= 10) {
                  $('#pending_order_table').DataTable({
                    searching: false,
                    paging: false,
                    order: [],
                    autoWidth: false,
                    ajax: {
                      type : 'GET',
                      url : "<?= base_url()?>overview/search_order_by_telno/"+search_text,
                      dataSrc: '',
                      error: function() {
                        $.jGrowl("Retrieving Pending Orders Failed", {
                          theme: 'alert-styled-left bg-danger'
                        });
                      }
                    },
                    columns: [
                      {data: "order_number",render: function(data,type,row,meta) { 
                        total_billing_cost += row.total_cost;
                        return "<a href='#' data-action='reload' class='view_order_details' data-order_id='"+row.id+"'>"+row.order_number+"</a>"; 
                      }},
                      {data: "total_cost"},
                      {data: "total_amount_paid"},
                      {data: "balance"},
                      {data: "delivery_location"},
                      {render: function(data,type,row,meta) { 
                        if(row.status == "Pending")
                          label_color = "label-default";
                        else if(row.status == "Processing")
                          label_color = "label-primary";
                        else if(row.status == "Dispatched")
                          label_color = "label-success";
                        else if(row.status == "Completed")
                          label_color = "label-success";
                        else
                          label_color = "label-default";
                        return "<span class='label "+label_color+"'>"+row.status+"</span>"; 
                      }},
                      {data: "date_created"},
                      {render: function(data,type,row,meta) { 
                        let balance = row.balance;
                        if(balance > 0)
                          pay_button = '<li><button class="label bg-blue pay_bill" data-total_balance="'+row.balance+'" data-order_id="'+row.id+'">Pay<i class="icon-cash3 position-right "></i></button></li>'; 
                        else
                          pay_button = "";

                        return '<ul class="action_btns"><li><button data-order_id="'+row.id+'" class="label bg-green-600 view_order_comments">Comments ('+row.total_comments+')</button></li>'+pay_button+'</ul>'; 
                      }},
                    ],
                  });

                  $('#pending_order_table_display').attr('style',"display:block");
                }
                else { 
                  $('#pending_order_table').DataTable().destroy();
                  $('#pending_order_table').DataTable({
                    searching: false,
                    paging: false,
                    order: [],
                    autoWidth: false,
                    ajax: {
                      type : 'GET',
                      url : "<?= base_url()?>overview/search_order_by_orderno/"+search_text,
                        dataSrc: '',
                      error: function() {
                        $.jGrowl("Retrieving Pending Orders Failed", {
                          theme: 'alert-styled-left bg-danger'
                        });
                      }
                    },
                    columns: [
                      {data: "order_number",render: function(data,type,row,meta) { 
                        return "<a href='#' data-action='reload' class='view_order_details' data-order_id='"+row.id+"'>"+row.order_number+"</a>"; 
                      }},
                      {data: "total_cost"},
                      {data: "total_amount_paid"},
                      {data: "balance"},
                      {data: "delivery_method"},
                      {render: function(data,type,row,meta) { 
                        if(row.status == "Pending")
                          label_color = "label-default";
                        else if(row.status == "Processing")
                          label_color = "label-primary";
                        else if(row.status == "Dispatched")
                          label_color = "label-success";
                        else if(row.status == "Completed")
                          label_color = "label-success";
                        else
                          label_color = "label-default";
                        return "<span class='label "+label_color+"'>"+row.status+"</span>"; 
                      }},
                      {data: "date_created"},
                      {render: function(data,type,row,meta) { 
                        let balance = row.balance;
                        if(balance > 0)
                          pay_button = '<li><button class="label bg-blue pay_bill" data-total_balance="'+row.balance+'" data-order_id="'+row.id+'">Pay<i class="icon-cash3 position-right "></i></button></li>'; 
                        else
                          pay_button = "";

                        return '<ul class="action_btns"><li><button data-order_id="'+row.id+'" class="label bg-green-600 view_order_comments">Comments ('+row.total_comments+')</button></li>'+pay_button+'</ul>'; 
                      }},
                    ],
                  });

                  $('#pending_order_table_display').attr('style',"display:block")
                }
              /****** Pending Order Table ***********/

              /****** Billing Info **********/
              $('[name="billing_info_total_cost"]').val();
              $('[name="billing_info_total_amount_paid"]').val();
              /****** Billing Info **********/

              /****** Billing Info Table ***********
              
              /****** Billing Info Table ***********/
            }
            else { 
              $.jGrowl("No Record Found", {
                theme: 'alert-styled-left bg-danger'
              });
            }
          }
        });
      }
    });
  /********** Search Order / Info ************/

  /********** Displaying Services ******/
    $(document).ready(function() {
      selectbox_initialize('.display_services','services');
      selectbox_initialize('.display_garments','garments');

      $('.display_services').change(function(){
        $('[name="garment_price"]').val("");
        $('[name="weight_price"]').val("");
        //$('#weight_onchange').val("");

        let service_id = $(this).val();

        if(service_id == 1) {
          $('#washing_requiredFields').show(300);
          $('#other_requiredFields').hide();
        }
        else if(service_id != "") {
          $('#washing_requiredFields').hide();
          $('#other_requiredFields').show(300);
        }
        else {
          $('#washing_requiredFields').hide(300);
          $('#other_requiredFields').hide(300);
        }
      });
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

    $('#weight_onchange').change(function(){
      let weight_id = $(this).val();
      let service_id = $('#serivce_onchange').val();
      let formurl = "<?=base_url()?>settings/retrieve_alldata/vw_prices/default/service_id~weight_id/"+service_id+"~"+weight_id;

      $.ajax({
        type : 'GET',
        url : formurl,
        success: function(response) { 
          response = JSON.parse(response);
          if(response[0]) {
            let price = response[0].amount;
            $('[name="weight_price"]').val(price);
            $('[name="weight_price"]').attr('data-pricelist_id',response[0].id);
          }
          else
            $('[name="weight_price"]').val("");
          
        },
        error: function() {
          $.jGrowl('An Error Occured.<br/>Please Contact Admin', {
            theme: 'alert-styled-left bg-danger'
          });
        }
      });
    });

    $('#garment_onchange').change(function(){
      let garment_id = $(this).val();
      let service_id = $('#serivce_onchange').val();
      let formurl = "<?=base_url()?>settings/retrieve_alldata/vw_prices/default/service_id~garment_id/"+service_id+"~"+garment_id;

      $.ajax({
        type : 'GET',
        url : formurl,
        success: function(response) { 
          response = JSON.parse(response);
          if(response[0]) {
            let price = response[0].amount;
            $('[name="garment_price"]').val(price);
            $('[name="garment_price"]').attr('data-pricelist_id',response[0].id);
          }
          else
            $('[name="garment_price"]').val("");
        },
        error: function() {
          $.jGrowl('An Error Occured.<br/>Please Contact Admin', {
            theme: 'alert-styled-left bg-danger'
          });
        }
      });
    });

    $('#add_to_weight').click(function(){
      let service_id = $('#serivce_onchange').val();
      let service_name = $('#serivce_onchange option:selected').text();
      let weight_id = $('#weight_onchange').val();
      let weight_name = $('#weight_onchange option:selected').text();
      let price = $('[name="weight_price"]').val();
      let pricelist_id = $('[name="weight_price"]').data('pricelist_id');
      let description = $('[name="weight_item_description"]').val();
      let quantity = $('[name="weight_item_quantity"]').val();
      
      /******** Error Checking **********/
      if(service_id == "") {
        $.jGrowl('Service Type Required', {
          theme: 'alert-styled-left bg-danger'
        });
      }
      else if(weight_id == "") {
        $.jGrowl('Weight Required', {
          theme: 'alert-styled-left bg-danger'
        });
      }
      else if(price == "") {
        $.jGrowl('Price Cannot Be Empty', {
          theme: 'alert-styled-left bg-danger'
        });
      }
      else if(description == "") {
        $.jGrowl('Description Cannot Be Empty', {
          theme: 'alert-styled-left bg-danger'
        });
      }
      /******** Error Checking **********/
      else {
        let formurl = "<?=base_url()?>overview/save_to_list/washing_only";
        let formData = {
          'service_id' : service_id,
          'service_name' : service_name,
          'weight_id' : weight_id,
          'weight_name' : weight_name,
          'price' : price,
          'pricelist_id': pricelist_id,
          'description' : description,
          'quantity' : quantity
        };

        $.ajax({
          type : 'POST',
          url : formurl,
          data : formData,
          success: function(response) { 
            response = JSON.parse(response);
            
            if(response.success) {
              $.jGrowl('Cart Updated', {
                theme: 'alert-styled-left bg-success'
              });

              let total_order = parseInt($('#order_cart').text()) + 1;
              $('#order_cart').text(total_order);

              /******** Resetting Fields *********/
              $('#weight_onchange').data('selectBox-selectBoxIt').refresh()
              $('#serivce_onchange').data('selectBox-selectBoxIt').refresh()
              $('[name="weight_price"]').val("");
              $('[name="weight_item_description"]').val("");
              $('[name="weight_item_quantity"]').val("");
              /******** Resetting Fields *********/
            } else {
              $.jGrowl(response.error, {
                theme: 'alert-styled-left bg-danger'
              });
            }
          },
          error: function() {
            $.jGrowl('Adding To List Failed', {
              theme: 'alert-styled-left bg-danger'
            });
          }
        });
      }
    });

    $('#add_to_others').click(function(){
      let service_id = $('#serivce_onchange').val();
      let service_name = $('#serivce_onchange option:selected').text();
      let garment_id = $('#garment_onchange').val();
      let garment_name = $('#garment_onchange option:selected').text();
      let price = $('[name="garment_price"]').val();
      let pricelist_id = $('[name="garment_price"]').data('pricelist_id');
      let item_quantity = $('[name="total_no_garments"]').val();
      /******** Error Checking **********/
      if(service_id == "") {
        $.jGrowl('Service Type Required', {
          theme: 'alert-styled-left bg-danger'
        });
      }
      else if(garment_id == "") {
        $.jGrowl('Garment Required', {
          theme: 'alert-styled-left bg-danger'
        });
      }
      else if(price == "") {
        $.jGrowl('Price Cannot Be Empty', {
          theme: 'alert-styled-left bg-danger'
        });
      }
      else if(item_quantity == "") {
        $.jGrowl('Total No Of Items Required', {
          theme: 'alert-styled-left bg-danger'
        });
      }
      /******** Error Checking **********/
      else {
        let formurl = "<?=base_url()?>overview/save_to_list/others";
        let formData = {
          'service_id' : service_id,
          'service_name' : service_name,
          'garment_id' : garment_id,
          'garment_name' : garment_name,
          'price' : price,
          'pricelist_id': pricelist_id,
          'item_quantity' : item_quantity
        };

        $.ajax({
          type : 'POST',
          url : formurl,
          data : formData,
          success: function(response) { 
            response = JSON.parse(response);
            if(response.success) {
              $.jGrowl('Cart Updated', {
                theme: 'alert-styled-left bg-success'
              });
              let total_order = parseInt($('#order_cart').text()) + 1;
              $('#order_cart').text(total_order);
              /******** Resetting Fields ********/
              $('#serivce_onchange').data('selectBox-selectBoxIt').refresh()
              $('#garment_onchange').data('selectBox-selectBoxIt').refresh()
              $('[name="garment_price"]').val("");
              $('[name="total_no_garments"]').val("");
              /******** Resetting Fields *********/
            }
            else {
              $.jGrowl(response.error, {
                theme: 'alert-styled-left bg-danger'
              });
            }
          },
          error: function() {
            $.jGrowl('Adding To List Failed', {
              theme: 'alert-styled-left bg-danger'
            });
          }
        });
      }
    });
  /********** Displaying Services ******/

  $(document).ready(function(){
    /********** Todays Order ************/
      $('#todays_order').DataTable({
        searching: false,
        paging: false,
        order: [],
        autoWidth: false,
        ajax: {
          type : 'GET',
          url : '<?= base_url()?>overview/retrieve_order/today/5',
          dataSrc: '',
          error: function() {
            $.jGrowl("Retrieving Today's Order Failed", {
              theme: 'alert-styled-left bg-danger'
            });
          }
        },
        columns: [
          {data: "order_number",render: function(data,type,row,meta) { 
            return "<a href='#' class='view_order_receipt' data-order_id='"+row.id+"'>"+row.order_number+"</a>"; 
          }},
          {data: "total_cost"},
          {data: "date_created"},
        ],
      });

      $(document).on("click",".view_order_receipt",function(){
        let order_id = $(this).data('order_id');
        $.ajax({
          type : 'POST',
          url : '<?= base_url()?>overview/search_order_details_by_orderno/'+order_id+'/search',
          //data : order_id,
          success: function(response) {
            response = JSON.parse(response);
            $('#receipt_orderno').text('Order #'+response[0].order_number);
            $('#receipt_date').text(response[0].date_created);
            $('#receipt_duedate').text(response[0].due_date);
            $('#receipt_subtotal').text(response[0].subtotal);
            $('#receipt_balance').text(response[0].balance);
            $('#receipt_total_cost').text(response[0].total_cost);
            $('#receipt_tax').text('('+response[0].tax+'%)');
            $('#receipt_tax_value').text(response[0].tax_value);
            $('#receipt_client').text(response[0].client);
            $('#receipt_delivery_method').text(response[0].delivery_method);
            $('#receipt_delivery_cost').text(response[0].delivery_cost);
            $('#print_receipt').attr('data-order',order_id);

            $('#receipt_table').DataTable().destroy();
            $('#receipt_table').DataTable({
              searching: false,
              paging: false,
              order: [],
              autoWidth: false,
              bInfo: false,
              data: response,
              columnDefs: [
                  { "width": "5%", "targets": 0 }
                ],
              columns: [
                {data: "description"},
                {data: "quantity"},
                {data: "unit_price"},
                {data: "total_sums"},
              ],
              aoColumnDefs: [
                { "bSortable": false, "aTargets": [ "_all" ] }
              ]
            });
          },
          error: function() {
            $.jGrowl('User Deletion Failed', {
              theme: 'alert-styled-left bg-danger'
            });
          }
        });
        $('#order_receipt').modal('show');
      });
    /********** Todays Order ************/

    /********** Print Button ************/
    <?php if($order_id = $this->session->flashdata('order_successful')) : ?>
      window.open("<?=base_url()?>overview/receipt/<?=$order_id?>","_blank");
    <?php endif; ?>
    $('#print_receipt').click(function(){
      window.open("<?=base_url()?>overview/receipt/"+$(this).data('order'),"_blank");
    });
    /********** Print Button ************/
  });
</script>
<?php endif; ?>
  
