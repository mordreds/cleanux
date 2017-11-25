<?php if(isset($_SESSION['user']['roles'])) : ?>

<script type="text/javascript">
 
  /********** Displaying Services ******/
    $(document).ready(function() {
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
          error: function(response){
            console.log(response);
          }
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
            return row.quantity * row.price;
          }},
          {render: function(data,type,row,meta){
            return '<i data-deleteid="'+row.array_index+'" class="icon-cross2 text-danger delete_item" style="cursor: pointer;"></i>';
          }},
        ],
      });
    });

    $(document).on('click','.delete_item',function(){
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
  /********** Displaying Services ******/

  /****** Retrieving Price List ******/
    let services_formurl = "<?=base_url()?>settings/retrieve_alldata/services/default";
    var service_name = "";
    $.ajax({
      type : 'GET',
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
</script>
<?php endif; ?>
  