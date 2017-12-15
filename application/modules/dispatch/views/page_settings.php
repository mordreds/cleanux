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
    $('#dispatch_tbl').dataTable({
      ajax: {
        type : 'GET',
        url : '<?= base_url()?>settings/retrieve_alldata/dispatch_orders/default',
        dataSrc: '',
        //success: function(response){console.log(response)},
        error: function() {
          $.jGrowl('Retrieving Orders Failed', {
            theme: 'alert-styled-left bg-danger'
          });
        }
      },
      columns: [
        {data: "client"},
        {data: "order_number",render: function(data,type,row,meta) { 
          return "<a data-action='reload' class='view_order_details' data-order_id='"+row.id+"'>"+row.order_number+"</a>"; 
        }},
        {data: "delivery_method"},
        {data: "delivery_location"},
        {data: "client_phone_no_1"},
        {data: "client_phone_no_2"},
        {render: function(data,type,row,meta) { 
          return '<ul class="action_btns"><li><button class="label bg-primary dispatch" data-order_id="'+row.id+'" data-order_no="'+row.order_number+'">Delivered <i class="icon-truck position-right"></i></button></li></ul>';
        }}
      ],
    });
  /************** All Pending Orders Table *********/
</script>
<?php endif; ?>
  
