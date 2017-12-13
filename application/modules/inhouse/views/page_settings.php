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

  /************** All Pending Orders Table *********/
    $('#allpending_orders').dataTable({
      ajax: {
        type : 'GET',
        url : '<?= base_url()?>settings/retrieve_alldata/inhouse_orders/default',
        dataSrc: '',
        //success: function(response){console.log(response)},
        error: function() {
          $.jGrowl('Retrieving Orders Failed', {
            theme: 'alert-styled-left bg-danger'
          });
        }
      },
      columns: [
        {data: "order_number"},
        {data: "date_created"},
        {data: "total_cost"},
        {data: "due_date"},
        {render: function(data,type,row,meta) { 
          if(row.processing_stage == "Pending") 
            label_class = "label-default";
          else if(row.processing_stage == "Washing") 
            label_class = "label-warning";
          else if(row.processing_stage == "Drying") 
            label_class = "label-warning";
          else if(row.processing_stage == "Ironing") 
            label_class = "label-warning";
          else if(row.processing_stage == "Ready For Dispatch") 
            label_class = "label-success";
          
          return '<span class="label '+label_class+' change_order_status" style="cursor:pointer">'+row.processing_stage+'</span>';
        }},
        {render: function(data,type,row,meta) { 
          return '<ul class="action_btns"><li><button data-order_id="'+row.id+'" class="label bg-green-600 view_order_comments">Comments (1)</button></li><li><button class="label bg-primary" data-order="'+row.id+'" set_delivery>Set For Delivery <i class="icon-truck position-right"></i></button></li></ul>';
        }}
      ],
    });
  /************** All Pending Orders Table *********/
</script>
<?php endif; ?>
  
