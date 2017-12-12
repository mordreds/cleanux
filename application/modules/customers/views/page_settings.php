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
        {data: "fullname"},
        {data: "gender"},
        {data: "email"},
        {data: "phone_number_1"},
        {data: "phone_number_2"},
        {data: "residence_address"},
        {data: "company"},
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
            button = '<ul class="action_btns"><li><a data-client_tel="'+row.phone_number_1+'" data-id="'+row.id+'" id="new_order" title="New Order"><i class="icon-basket" style="font-size:21px"></i></a></li><li><a data-client_tel="'+row.phone_number_1+'" data-id="'+row.id+'" id="new_order" title="New Order"><i class="icon-envelop3" style="font-size:21px"></i></a></li><li><a data-client_tel="'+row.phone_number_1+'" data-id="'+row.id+'" id="new_order" title="New Order"><i class="icon-pencil" style="font-size:21px"></i></a></li><li><a data-popup="tooltip" title="Suspend Account"><i class="deactivate_user icon-lock text-warning" data-dataid="'+row.id+'" data-email="'+row.username+'" data-state="inactive" style="font-size: 21px"></i></a></li><li><a class="" data-popup="tooltip" title="Delete Account"><i class="icon-trash text-danger delete_btn" data-displayname="'+row.fullname+'" data-dataid="'+row.id+'"  data-email="'+row.username+'" data-state="deleted" style="font-size: 20px"></i></a></li></ul>';
          } 
          else if(user_status == "deleted"){ }

          return button; 
          }
        },
      ],
    });

    $(document).on("click",".deactivate_user",function(){
      let formData = { 
        'user_id': $(this).data('dataid'),
        'email': $(this).data('email'),
        'status': $(this).data('state')
      };
      $.ajax({
        type : 'POST',
        url : '<?= base_url()?>administration/users/account_status',
        data : formData,
        success: function(response) {
          $.jGrowl('User Deactivation Successful', {
              /*header: 'Process Successful',*/
            theme: 'alert-styled-left bg-success'
          });
          $('#inactive_acct_tbl').DataTable().ajax.reload();
          $('#active_accounts_tbl').DataTable().ajax.reload();
        },
        error: function() {
          alert("Error Transmitting Data")
        }
      });
    });

    $(document).on("click",".delete_confirmed",function(){
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
    });
  /************** All Customers Table *********/
</script>
<?php endif; ?>
  
