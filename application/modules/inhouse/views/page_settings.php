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
          $.jGrowl('Internal Server Error. <br/>Retrieving Orders Failed.', {
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
          
          return '<ul class="icons-list"><li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="label '+label_class+' change_order_status" style="cursor:pointer">'+row.status+'</span></a><ul class="dropdown-menu dropdown-menu-right"><li><a href="#" class="change_status" data-status="Pending" data-tableid="allpending_orders" data-order_id="'+row.id+'"><i class="icon-file-stats"></i> Pending</a></li><li><a href="#" class="change_status" data-status="Processing" data-tableid="allpending_orders" data-order_id="'+row.id+'"><i class="icon-hour-glass"></i> Processing</a></li><li><a href="#" class="change_status" data-status="Dispatch" data-tableid="allpending_orders" data-order_id="'+row.id+'" data-order_no="'+row.order_number+'"><i class="icon-truck"></i> Dispatch</a></li><li class="divider"></li><li ><a href="#" style="color:red" class="change_status" data-status="Cancelled" data-tableid="allpending_orders" data-order_id="'+row.id+'" data-order_no="'+row.order_number+'"><i class="icon-cross2"></i> Cancel</a></li></ul></li></ul>';
        }},
        {render: function(data,type,row,meta) { 
          return '<ul class="action_btns" style="margin-bottom:0px;"><li><button data-order_id="'+row.id+'" class="label bg-green-600 view_order_comments">Comments ('+row.total_comments+')</button></li></ul>';
        }}
      ],
    });
    /* <li><button class="label bg-primary dispatch" data-order_id="'+row.id+'" data-order_no="'+row.order_number+'">Dispatch <i class="icon-truck position-right"></i></button></li>*/
  /************** All Pending Orders Table *********/

  /************** All Cancelled Orders Table *********/
    $('#allcancelled_orders').dataTable({
      order: [],
      ajax: {
        type : 'GET',
        url : '<?= base_url()?>settings/retrieve_alldata/cancelled_orders/default',
        dataSrc: '',
        //success: function(response){console.log(response)},
        error: function() {
          $.jGrowl('Internal Server Error. <br/>Retrieving Orders Failed.', {
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
          
          return '<ul class="icons-list"><li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="label '+label_class+' change_order_status" style="cursor:pointer">'+row.status+'</span></a><ul class="dropdown-menu dropdown-menu-right"><li><a href="#" class="change_status" data-status="Pending" data-tableid="allpending_orders" data-order_id="'+row.id+'"><i class="icon-file-stats"></i> Pending</a></li><li><a href="#" class="change_status" data-status="Processing" data-tableid="allpending_orders" data-order_id="'+row.id+'"><i class="icon-hour-glass"></i> Processing</a></li><li><a href="#" class="change_status" data-status="Dispatch" data-tableid="allpending_orders" data-order_id="'+row.id+'" data-order_no="'+row.order_number+'"><i class="icon-truck"></i> Dispatch</a></li><li class="divider"></li><li ><a href="#" style="color:red" class="change_status" data-status="Cancelled" data-tableid="allpending_orders" data-order_id="'+row.id+'" data-order_no="'+row.order_number+'"><i class="icon-cross2"></i> Cancel</a></li></ul></li></ul>';
        }},
        {data: "reason_for_cancel"},
        {render: function(data,type,row,meta) { 
          return '<ul class="action_btns" style="margin-bottom:0px;"><li><button data-order_id="'+row.id+'" class="label bg-green-600 view_order_comments">Comments ('+row.total_comments+')</button></li></ul>';
        }},
        {data: "date_modified"}
      ],
    });
  /************** All Pending Orders Table *********/

  /************** Changing Status ******************/
    $(document).on("click",".change_status",function(){
      let status = $(this).data('status');
      
      if(status == "Dispatch") {
        let order_id = $(this).data('order_id');
        let order_no = $(this).data('order_no');
        
        $('#orderno_').text(order_no);
        $('[name="dispatch_order_id"]').val(order_id);
        $('#confirm_dispatch').modal('show');
      }
      else if(status == "Cancelled") {
        let order_id = $(this).data('order_id');
        let order_no = $(this).data('order_no');
        let formurl = "<?=base_url()?>inhouse/change_order_status/sync";
        let modal_heading = "Confirm Cancel";
         
        $('#modal_heading').text(modal_heading);
        $('#confirmation_modal_form').attr('action',formurl);
        $('#cancel_orderno_').text(order_no);
        $('[name="order_id"]').val(order_id);
        $('[name="status"]').val("Cancelled");
        
        $('#confirmation_modal').modal('show');
      }
      else {
        let formurl = "<?=base_url()?>inhouse/order_complete";
        let tableid = $(this).data('tableid');
        let formData = { 
          'dispatch_order_id': $(this).data('order_id'),
          'status': status
        };
        ajax_post(formurl,formData,tableid);
      }
    });
  /************** Changing Status ******************/

   /**************Statistics for inhouse ******************/
   
    
  /************** Statistics for inhouse ******************/
</script>

<?php endif; ?>
  
