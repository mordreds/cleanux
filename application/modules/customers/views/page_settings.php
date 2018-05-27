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
        search: '<span>Search:</span> _INPUT_',
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

  /************** All Customers Table *********/
    $('#allcustomers').dataTable({
      ajax: {
        type : 'GET',
        url : '<?= base_url()?>settings/retrieve_alldata/clients/default',
        dataSrc: '',
        error: function() {
          $.jGrowl('Retrieving Active Users Failed', {
            theme: 'alert-styled-left bg-danger'
          });
        }
      },
      columns: [
        {data: "fullname",render: function(data,type,row,meta) { 
          return '<div class="media" style="display:inline-flex"><a href="#" onclick="return false;" class="media-left"><img src="<?=base_url()?>/resources/images/users/default.jpg" width="40" height="40" class="img-circle img-md" alt=""></a><div class="media-middle"><a href="#" onclick="return false;" class="text-semibold">'+row.fullname+'</a><div class="text-muted text-size-small">Latest order: 2016.08.20</div></div></div>'; 
        }},
        {data: "email", render: function(data,type,row,meta) {
          return '<a href="<?=base_url()?>sms/?s='+row.email+'">'+row.email+'</a>'
        }},
        {data: "phone_number_1", render: function(data,type,row,meta){
          return '<ul class="list list-unstyled no-margin"><li class="no-margin"><i class="icon-phone text-size-base text-success position-left"></i>Primary #: <a href="#">'+row.phone_number_1+'</a></li><li class="no-margin"><i class="icon-phone text-size-base text-danger position-left"></i><em>Secondary #: <a href="#" class="text-muted text-size-small">'+row.phone_number_2+'</a></em></li></ul>'
        }},
        {data: "residence_address"},
        {data: "pending_orders", render: function(data,type,row,meta) {
          return '<ul class="list list-unstyled no-margin"><li class="no-margin"><i class="icon-infinite text-size-base text-warning position-left"></i>Pending: <a href="#">'+row.pending_orders+' orders</a></li><li class="no-margin"><i class="icon-checkmark3 text-size-base text-success position-left"></i>Processed: <a href="#">'+row.completed_orders+' orders</a></li></ul>'
        }},
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
            button = '<ul class="icons-list"><li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a><ul class="dropdown-menu dropdown-menu-right"><li><a class="edit_client_info" data-fullname="'+row.fullname+'" data-gender="'+row.gender+'" data-company="'+row.company+'" data-residence_address="'+row.residence_address+'" data-postal_address="'+row.postal_address+'" data-phone_number_1="'+row.phone_number_1+'" data-phone_number_2="'+row.phone_number_2+'" data-email="'+row.email+'" data-sms_alert="'+row.sms_alert+'" data-online_access="'+row.online_access+'" data-status="'+row.status+'" data-client_id="'+row.id+'" data-popup="tooltip" data-original-title="Edit Info" ><i class="icon-pencil text-warning" style="font-size:18px"></i> Edit Client Info</a></li><li><a class="customer_new_order" data-client_tel="'+row.phone_number_1+'" data-popup="tooltip" data-original-title="Create Order"><i class="icon-basket text-primary" style="font-size:18px"></i> Make New Order</a></li><li><a href="<?=base_url()?>sms/?tel='+row.phone_number_1+'" data-client_tel="'+row.phone_number_1+'" data-id="'+row.id+'" data-popup="tooltip" data-original-title="Send SMS"><i class="icon-envelop3 text-success" style="font-size:18px"></i> Send SMS</a></li><li class="divider"></li><li><a class="" data-popup="tooltip" data-popup="tooltip" data-original-title="Delete"><i class="icon-trash text-danger delete_button" data-deletename="'+row.fullname+'" data-deleteid="'+row.id+'" data-formurl="<?=base_url()?>settings/save_client_info" data-tableid="allcustomers" style="font-size: 18px"></i> Delete Customer</a></li></ul></li></ul>';
          } 
          else if(user_status == "deleted"){ }

          return button; 
          }
        },
      ],
    });

    $(document).on("click",".customer_new_order",function(){
      let client_number = $(this).data('client_tel');
      let overview_url = "<?=base_url()?>overview";
      $.ajax({
        type : 'POST',
        url : '<?= base_url()?>settings/customer_new_order/'+client_number,
        success: function(response) {
          window.location.replace(overview_url);
        },
        error: function() {
          $.jGrowl('Error Transmitting Data', {
            theme: 'alert-styled-left bg-danger'
          });
        }
      });
    });

    /*$(document).on("click",".delete_confirmed",function(){
      let formData = { 
        'user_id': $(this).data('user_id'),
        'email': $(this).data('email'),
        'status': $(this).data('status')
      };
      $.ajax({
        type : 'POST',
        url : '<?= base_url()?>administration/users/account_status',
        data : formData,
        success: function(response) {
          $.jGrowl('User Deletion Successful', {
            theme: 'alert-styled-left bg-success'
          });
          $('#del_acct_tbl').DataTable().ajax.reload();
          $('#inactive_acct_tbl').DataTable().ajax.reload();
          $('#active_accounts_tbl').DataTable().ajax.reload();
        },
        error: function() {
          $.jGrowl('User Deletion Failed', {
            theme: 'alert-styled-left bg-danger'
          });
        }
      });
    });*/
  /************** All Customers Table *********/
</script>
<?php endif; ?>
  
