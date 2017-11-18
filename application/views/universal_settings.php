<?php if(isset($_SESSION['user']['roles'])) : ?>

<script type="text/javascript">
 
 /********** Displaying Services ******/
    $(document).ready(function() {
      $('#laundry_cart').dataTable({
        searching: false,
        paging: false,
        ajax: {
          type : 'GET',
          url : '<?= base_url()?>overview/laundry_cart',
          dataSrc: '',
          error: function(){}
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

    $('#view_cart').click(function(){
      $('#laundry_cart').DataTable().ajax.reload();
    });

    $(document).on('click','.delete_item',function(){
      let formurl = '<?= base_url()?>overview/laundry_cart';

    });

    $('#clear_cart').click(function(){
      let formurl = "<?=base_url()?>overview/clear_cart";
      let formData = {'data': "clear chart"};
      ajax_post(formurl,formData,tableid="laundry_cart");
      location.reload();
    });
  /********** Displaying Services ******/
</script>
<?php endif; ?>
  