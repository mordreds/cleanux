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

    var formurl = "<?=base_url()?>overview/search";
    $('#search_submit').click(function(){
      let search_text = $('#search_text').val();
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
            console.log(response[0])
            if(response[0]) {  
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
              if(response[0].sms == 1) {
                console.log(switchery)
                $('[name="sms"]').setPosition(true);
                document.querySelector('.btn_cancel').addEventListener('click', function() {
                  switchery.disable();
                });


                  /*  if (Array.prototype.forEach) {
                  var elems = Array.prototype.slice.call(document.querySelectorAll('.switchery'));
                  elems.forEach(function(html) {
                      var switchery = new Switchery(html);
                  });
                }
                else {
                  var elems = document.querySelectorAll('.switchery');
                  for (var i = 0; i < elems.length; i++) {
                      var switchery = new Switchery(elems[i]);
                  }
                }*/
              }
              else
                $('[name="sms"]').attr('checked',"");
            }
            else { 
              $.jGrowl("No Record Found", {
                theme: 'alert-styled-left bg-danger'
              });
            }
          },
          error: function() {
            $.jGrowl('An Error Occured.<br/>Please Contact Admin', {
              theme: 'alert-styled-left bg-danger'
            });
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
              $.jGrowl('Chart Updated', {
                theme: 'alert-styled-left bg-success'
              });

              let total_order = parseInt($('#order_chart').text()) + 1;
              $('#order_chart').text(total_order);

              /******** Resetting Fields *********/
              $('#weight_onchange').data('selectBox-selectBoxIt').refresh()
              $('#serivce_onchange').data('selectBox-selectBoxIt').refresh()
              $('[name="weight_price"]').val("");
              $('[name="weight_item_description"]').val("");
              $('[name="weight_item_quantity"]').val("");
              /******** Resetting Fields *********/
            }
            else {
              $.jGrowl('Adding To List Failed', {
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
          'item_quantity' : item_quantity
        };

        $.ajax({
          type : 'POST',
          url : formurl,
          data : formData,
          success: function(response) { 
            response = JSON.parse(response);
            
            if(response.success) {
              $.jGrowl('Laundry List Updated', {
                theme: 'alert-styled-left bg-success'
              });

              let total_order = parseInt($('#order_chart').text()) + 1;
              $('#order_chart').text(total_order);

              /******** Resetting Fields ********/
              $('#serivce_onchange').data('selectBox-selectBoxIt').refresh()
              $('#garment_onchange').data('selectBox-selectBoxIt').refresh()
              $('[name="garment_price"]').val("");
              $('[name="total_no_garments"]').val("");
              /******** Resetting Fields *********/
            }
            else {
              $.jGrowl('Adding To List Failed', {
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

    /*$('#active_accounts_tbl').dataTable({
      ajax: {
        type : 'GET',
        url : '<?= base_url()?>administration/retrieve_allusers/active',
        dataSrc: ''
      },
      columns: [
        {data: "fullname"},
        {data: "employee_id"},
        {data: "username"},
        {data: "group_name"},
        {data: "status", render: function(data,type,row,meta) { 
          if(row.status == "active") {
            label_class = "label-success";
          }
          else if(row.status == "inactive"){
            label_class = "label-danger";
          }
          user_status = row.status;
          return '<span class="label '+label_class+'">'+row.status+'</span>';}
        },
        {data: "id", render: function(data,type,row,meta) { 
          if(user_status == "active") {
            button = '<ul class="action_btns"><li><a data-fullname="'+row.fullname+'" data-username="'+row.username+'" data-id="'+row.id+'" id="reset_password" title="Reset Password"><i class="icon-key" style="font-size:21px"></i></a></li><li><a data-popup="tooltip" title="Suspend Account"><i class="deactivate_user icon-lock text-warning" data-dataid="'+row.id+'" data-email="'+row.username+'" data-state="inactive" style="font-size: 21px"></i></a></li><li><a class="" data-popup="tooltip" title="Delete Account"><i class="icon-trash text-danger delete_btn" data-displayname="'+row.fullname+'" data-dataid="'+row.id+'"  data-email="'+row.username+'" data-state="deleted" style="font-size: 20px"></i></a></li></ul>';
          } 
          else if(user_status == "deleted"){ }

          return button; 
          }
        },
      ],
    });*/
  /********** Displaying Services ******/
</script>
<?php endif; ?>
  
