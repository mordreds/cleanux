<?php if(isset($_SESSION['user']['roles'])) : ?>

<script type="text/javascript">
  $(document).ready(function() {
    /********** Viewing Laundry Cart ******/
      $('#view_cart').click(function(){
        $('#laundry_cart').DataTable().ajax.reload();
      });

      $('#laundry_cart').dataTable({
        searching: false,
        paging: false,
        order: [],
        ajax: {
          type : 'GET',
          dataType : 'json',
          url : '<?= base_url()?>overview/laundry_cart',
          dataSrc: '',
          error: function(response){}
        },
        columnsDef: [
          {
            targets: [1],
            width: "4%"
          }
        ],
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
    

      $('#laundry_cart').on('click','.delete_item',function(){
        let array_index = $(this).data('deleteid');
        let formurl = "<?=base_url()?>overview/delete_from_cart";
        let formData = {'deleteid': array_index};
        ajax_post(formurl,formData,tableid="laundry_cart");

        let total_order = parseInt($('#order_cart').text()) - 1;
        $('#order_cart').text(total_order);
        $('#laundry_cart').DataTable().ajax.reload();
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

    /****** Retrieving Delivery ******/
      $(".display_delivery").selectBoxIt({
        autoWidth: false,
        defaultText: "Select One",
        populate: function(){
          var deferred = $.Deferred(), arr = [], x = -1;
          $.ajax({
          url: '<?= base_url()?>settings/retrieve_alldata/delivery/default'}).done(function(data) {
            data = JSON.parse(data);
            while(++x < data.length){
              arr[x] = { value : data[x].id, text : data[x].location };
            }
            deferred.resolve(arr);
          });
          return deferred;
        }
      });
    /****** Retrieving Delivery ******/
  });
</script>
<?php endif; ?>
  