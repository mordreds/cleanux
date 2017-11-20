<?php if(isset($_SESSION['user']['roles'])) : ?>

<script type="text/javascript">
 
 /********** Displaying Services ******/
  $('#laundry_chart').dataTable({
    searching: false,
    paging: false,
    ajax: {
      type : 'GET',
      url : '<?= base_url()?>overview/laundry_chart',
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

  $('#view_chart').click(function(){
    $('#laundry_chart').DataTable().ajax.reload();
  });

  $(document).on('click','.delete_item',function(){
    let formurl = '<?= base_url()?>overview/laundry_chart';
  });

  /****** Retrieving Price List ******/

  /****** Retrieving Price List ******/
  let services_formurl = "<?=base_url()?>settings/retrieve_alldata/services/default";
  var service_name = "";
  $.ajax({
    type : 'GET',
    url : services_formurl,
    data : '',
    success: function(response) { 
      response = JSON.parse(response)
      $.each(response, function(index) {
        service_name = '<li><a href="#" data-toggle="tab"><span class="label label-info pull-right">Services</span> '+response[index].name+'</a></li>';
        $(service_name).appendTo('#pricelists');
        //alert(service_name);
      });
    },
    error: function() {
      $.jGrowl('An Error Retrieving Price List', {
        theme: 'alert-styled-left bg-danger'
      });
    }
  });
  //$('').text(service_name);
  
/********** Displaying Services ******/
</script>
<?php endif; ?>
  