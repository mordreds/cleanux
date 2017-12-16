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
      order: [],
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
        {data: "client"},
        {data: "order_number",render: function(data,type,row,meta) { 
          return "<a data-action='reload' class='view_order_details' data-order_id='"+row.id+"'>"+row.order_number+"</a>"; 
        }},
        {data: "total_order_items"},
        {data: "due_date"},
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
        {render: function(data,type,row,meta) { 
          if(row.status == "Pending") 
            label_class = "label-default";
          else if(row.status == "Processing") 
            label_class = "label-primary";
          else if(row.status == "Dispatch") 
            label_class = "label-success";
          else if(row.status == "Completed") 
            label_class = "label-success";
          else if(row.status == "Cancelled") 
            label_class = "label-danger";
          else
            label_class = "";
          
          return '<ul class="icons-list"><li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="label '+label_class+' change_order_status" style="cursor:pointer">'+row.status+'</span></a><ul class="dropdown-menu dropdown-menu-right"><li><a href="#"><i class="icon-file-stats"></i> Pending</a></li><li><a href="#"><i class="icon-file-text2"></i> Processing</a></li><li><a href="#"><i class="icon-file-locked"></i> Dispatch</a></li><li class="divider"></li></ul></li></ul>';
        }},
        {render: function(data,type,row,meta) { 
          return '<ul class="action_btns"><li><button data-order_id="'+row.id+'" class="label bg-green-600 view_order_comments">Comments ('+row.total_comments+')</button></li><li><button class="label bg-primary dispatch" data-order_id="'+row.id+'" data-order_no="'+row.order_number+'">Dispatch <i class="icon-truck position-right"></i></button></li></ul>';
        }}
      ],
    });
  /************** All Pending Orders Table *********/
</script>
<?php endif; ?>
  
