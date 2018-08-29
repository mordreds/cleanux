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

  /************** Pending Dispatch Orders *********/
    $('#dispatch_tbl').dataTable({
      order: [],
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
        {data: "date_difference",render: function(data,type,row,meta) { 
          if(row.date_difference < 0) 
            button = '<span class="label label-danger">'+Math.abs(row.date_difference)+' days past</span>';
          else if(row.date_difference == 0) 
            button = '<span class="label label-warning">'+Math.abs(row.date_difference)+' days past</span>';
          else if(row.date_difference > 0) 
            button = '<span class="label label-success">'+Math.abs(row.date_difference)+' days more</span>';
          else
            button = '<span class="label label-warning">Undefined</span>';
          
          return button;
        }},
        {data: "client_phone_no_1"},
        {data: "client_phone_no_2"},
        {render: function(data,type,row,meta) { 
          return '<ul class="action_btns"><li><button data-order_id="'+row.id+'" class="label bg-green-600 view_order_comments">Comments ('+row.total_comments+')</button></li><li><button class="label bg-primary delivered" data-order_id="'+row.id+'" data-order_no="'+row.order_number+'">Delivered <i class="icon-truck position-right"></i></button></li></ul>';
        }}
      ],
    });
  /************** Pending Dispatch Orders *********/

  /************** All Delivered Orders *********/
    $('#alldelivered_orders').dataTable({
      order: [],
      ajax: {
        type : 'GET',
        url : '<?= base_url()?>settings/retrieve_alldata/delivered_orders/default',
        dataSrc: '',
        //success: function(response){console.log(response)},
        error: function() {
          $.jGrowl('Retrieving Orders Failed', {
            theme: 'alert-styled-left bg-danger'
          });
        }
      },
      columns: [
        {data: "order_number",render: function(data,type,row,meta) { 
          return "<a data-action='reload' class='view_order_details' data-order_id='"+row.id+"'>"+row.order_number+"</a>"; 
        }},
        {data: "client"},
        {data: "client_phone_no_1"},
        {data: "delivery_method"},
        {data: "delivery_location"},
        {data: "due_date"},
        {data: "delivery_date"},
        {data: "date_difference",render: function(data,type,row,meta) { 
          if(row.date_difference < 0) 
            button = '<span class="label label-danger">'+Math.abs(row.date_difference)+' days past</span>';
          else if(row.date_difference == 0) 
            button = '<span class="label label-warning">'+Math.abs(row.date_difference)+' days past</span>';
          else if(row.date_difference > 0) 
            button = '<span class="label label-success">On-Time </span>';
            /*button = '<span class="label label-success">'+Math.abs(row.date_difference)+' days Ahead</span>';*/
          else
            button = '<span class="label label-warning">Undefined</span>';
          
          return button;
        }},
        {render: function(data,type,row,meta) { 
          return '<ul class="action_btns"><li><button data-order_id="'+row.id+'" class="label bg-green-600 view_order_comments" data-notify_client="No" data-send_comment="No">Comments ('+row.total_comments+')</button></li></ul>';
        }}
      ],
    });
  /************** All Delivered Orders *********/
</script>
<?php endif; ?>
  
