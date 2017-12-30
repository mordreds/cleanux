<?php if(isset($_SESSION['user']['roles'])) : ?>
<script type="text/javascript">
  $(document).ready(function(){
    /************** Default Settings **************/
      $.extend( $.fn.dataTable.defaults, {
        autoWidth: false,
        responsive: true,
        columnDefs: [{ 
            orderable: false,
            width: '100px',
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

    /********** Displaying User Groups ************/
      $("#usertypes").selectBoxIt({
        autoWidth: false,
        defaultText: "Select One",
        populate: function(){
          var deferred = $.Deferred(), arr = [], x = -1;
          $.ajax({
          url: '<?=base_url()?>administration/usergroups'}).done(function(data) {
            data = JSON.parse(data);
            $("#usertypes").data("selectBox-selectBoxIt").add({value:"", text: "<em>Select One</em>"});  
            $.each(data, function(array_index) {
              $("#usertypes").data("selectBox-selectBoxIt").add({ value: data[array_index].id, text: data[array_index].name});
            });
          });
        }
      });
    /********** Displaying User Groups ************/

    /********** Users Page ************************/
      <?php if($controller_function == "users") : ?>
        /********** Activated Accounts ************/
          $('#active_accounts_tbl').dataTable({
            ajax: {
              type : 'GET',
              url : '<?= base_url()?>administration/retrieve_allusers/active',
              dataSrc: '',
              error: function() {
                $.jGrowl('Retrieving Active Users Failed', {
                  theme: 'alert-styled-left bg-danger'
                });
              }
            },
            columns: [
              {data: "fullname"},
              {data: "employee_id"},
              {data: "username"},
              {data: "group_name"},
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
                  button = '<ul class="action_btns"><li><a data-fullname="'+row.fullname+'" data-username="'+row.username+'" data-id="'+row.id+'" id="reset_password" title="Reset Password"><i class="icon-key" style="font-size:21px"></i></a></li><li><a data-popup="tooltip" title="Suspend Account"><i class="deactivate_user icon-lock text-warning" data-dataid="'+row.id+'" data-email="'+row.username+'" data-state="inactive" style="font-size: 21px"></i></a></li><li><a class="" data-popup="tooltip" title="Delete Account"><i class="icon-trash text-danger delete_btn" data-displayname="'+row.fullname+'" data-dataid="'+row.id+'"  data-email="'+row.username+'" data-state="deleted" style="font-size: 20px"></i></a></li></ul>';
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
        /********** Activated Accounts ************/

        /********** Inactivated Accounts **********/
          $('#inactive_acct_tbl').dataTable({
            ajax: {
              type : 'GET',
              url : '<?= base_url()?>administration/retrieve_allusers/inactive',
              dataSrc: '',
              error: function() {
                $.jGrowl('Retrieving In-active Users Failed', {
                  theme: 'alert-styled-left bg-danger'
                });
              }
            },
            columns: [
              {data: "fullname"},
              {data: "employee_id"},
              {data: "username"},
              {data: "group_name"},
              {data: "status", render: function(data,type,row,meta) { 
                if(row.status == "active") {
                  label_class = "label-success";
                }
                else if(row.status == "inactive"){
                  label_class = "label-danger";
                }
                user_status = row.status;
                return '<span class="label '+label_class+'">'+row.status+'</span>'}
              },
              {data: "id", render: function(data,type,row,meta) { 
                button = '<a title="Activate Account"><i class="activate_user icon-unlocked2 text-success" data-dataid="'+row.id+'"data-email="'+row.username+'" data-state="active" style="font-size: 22px"></i></a>&nbsp;&nbsp;';
                
                return button; 
                }
              },
            ],
          });

          $(document).on("click",".activate_user",function(){
            let formData = { 
              'user_id': $(this).data('dataid'),
              'email': $(this).data('email'),
              'status': $(this).data('state'),
            };
            $.ajax({
              type : 'POST',
              url : '<?= base_url()?>administration/users/account_status',
              data : formData,
              success: function(response) {
                $.jGrowl('User Activation Successful', {
                    /*header: 'Process Successful',*/
                  theme: 'alert-styled-left bg-success'
                });
                //$('#userTab a[href="#active_accounts"]').tab('show');
                $('#active_accounts_tbl').DataTable().ajax.reload();
                $('#inactive_acct_tbl').DataTable().ajax.reload();
              },
              error: function() {
                alert("Error Transmitting Data")
              }
            });
          });
        /********** Inactivated Accounts **********/

        /********** Deleted Accounts **************/
          $('#del_acct_tbl').dataTable({
            ajax: {
              type : 'GET',
              url : '<?= base_url()?>administration/retrieve_allusers/deleted',
              dataSrc: '',
              error: function() {
                $.jGrowl('Retrieving Deleted Users Failed', {
                  theme: 'alert-styled-left bg-danger'
                });
              }
            },
            columns: [
              {data: "fullname"},
              {data: "employee_id"},
              {data: "username"},
              {data: "group_name"},
              {data: "status", render: function(data,type,row,meta) { 
                return '<span class="label label-danger">Deleted</span>'}
              },
              {data: "id", render: function(data,type,row,meta) {
                button = "<strong><em>No Action Available</em></strong>";
                return button;
              }
              },
            ],
          });
        /********** Deleted Accounts **************/

        /********** Displaying Departments ********/
          $("#all_departments").selectBoxIt({
            autoWidth: false,
            defaultText: "Select One",
            populate: function(){
              var deferred = $.Deferred(), arr = [], x = -1;
              $.ajax({
              url: '<?= base_url()?>administration/all_departments'}).done(function(data) {
                data = JSON.parse(data);  
                while(++x < data.length){
                  arr.push(data[x].name);
                }
                deferred.resolve(arr);
              });
              return deferred;
            }
          });
          $("#all_departments").data("selectBox-selectBoxIt").add({value:"", text: "<em>Select One</em>"});
        /********** Displaying Departments ********/

        /**** Displaying Department Employees *****/
          $("#all_departments").change(function(){
            var department = $(this).val();
            /***** Resetting Fields *****/
            $("#department_employees").data("selectBox-selectBoxIt").remove();
            $("#department_employees").data("selectBox-selectBoxIt").add({value:"", text: "<em>Select One</em>"});
            $("#employeeid").val("");
            $("#email").val("");
            $("#phone_num").val("");
            /***** Resetting Fields *****/
            $.ajax({
              type: 'GET',
              url: '<?= base_url()?>administration/department_employees/'+department,
              dataSrc: '',
              datatype: 'json',
              success: function(data) {
                let employees = JSON.parse(data);
                $.each(employees, function(array_index) {
                  $("#department_employees").data("selectBox-selectBoxIt").add({value: employees[array_index].id, text: employees[array_index].fullname, 'data-empid': employees[array_index].employee_id,'data-email': employees[array_index].email,'data-phone_num': employees[array_index].phone_number_1,'data-fullname': employees[array_index].fullname,
                    //'data-iconurl':"../"+employees[array_index].profile_photo
                  });
                });
              },
              error: function() {
                $.jGrowl('Retrieving Employees Failed', {
                  theme: 'alert-styled-left bg-danger'
                });
              }
            });
          });
        /**** Displaying Department Employees *****/

        /********* Displaying Employee ID *********/
          $("#department_employees").change(function(){
            $("#employeeid").val($(this).find(':selected').data('empid'));

            $("#email").val($(this).find(':selected').data('email'));
            $("#email").attr('readonly',"readonly");

            $("#phone_num").val($(this).find(':selected').data('phone_num'));
            $("#phone_num").attr('readonly',"readonly");

            $("#bio_id").val($(this).find(':selected').val());
            $("#fullname").val($(this).find(':selected').data('fullname'));
          });
        /********* Displaying Employee ID *********/

        /********* Reset Password *****************/
          $(document).on('click','#change_pwd_submit',function(){
            let formData = { 
              'user_id': $(this).data('user_id'),
              'email': $(this).data('email'),
              'new_password': $('#new_password').val()
            };
            $.ajax({
              type : 'POST',
              url : '<?= base_url()?>administration/users/reset_password',
              data : formData,
              success: function(response) {
                $.jGrowl('Password Reset Successful', {
                  theme: 'alert-styled-left bg-success'
                });
                $('#password_reset_displayname').val("");
                $('#new_password').val("");
                $('#del_acct_tbl').DataTable().ajax.reload();
                $('#inactive_acct_tbl').DataTable().ajax.reload();
                $('#active_accounts_tbl').DataTable().ajax.reload();
              },
              error: function() {
                $.jGrowl('Password Reset Failed', {
                  theme: 'alert-styled-left bg-danger'
                });
              }
            });
          });
        /********* Reset Password *****************/

        /********* Passy Password Meter ***********/
          var $inputLabel = $('.label-indicator input');
          var $inputLabelAbsolute = $('.label-indicator-absolute input');
          var $inputGroup = $('.group-indicator input');

          var $outputLabel = $('.label-indicator > span');
          var $outputLabelAbsolute = $('.label-indicator-absolute > span');
          var $outputGroup = $('.group-indicator > span');

          $.passy.requirements.length.min = 4;
          // Strength meter
          var feedback = [
            {color: '#D55757', text: 'Weak', textColor: '#fff'},
            {color: '#EB7F5E', text: 'Normal', textColor: '#fff'},
            {color: '#3BA4CE', text: 'Good', textColor: '#fff'},
            {color: '#40B381', text: 'Strong', textColor: '#fff'}
          ];
          // Absolute positioned label
          $inputLabelAbsolute.passy(function(strength) {
              $outputLabelAbsolute.text(feedback[strength].text);
              $outputLabelAbsolute.css('background-color', feedback[strength].color).css('color', feedback[strength].textColor);
          });
        /********* Passy Password Meter ***********/

      <?php endif; ?>
    /**************************************** Users Page ***********************************/

    /**************************************** Permissions Page ***********************************/
      <?php if($controller_function == "permissions") : ?>
      $(document).ready(function(){
        /********* Table Initializations ************/
          /********* Permissions Table ************/
            $('#allPermissions').dataTable({
              searching: false,
              order: [],
              paging: false,
              ajax: {
                type : 'GET',
                url : '<?=base_url()?>administration/view_allPermissions',
                dataSrc: '',
                error: function() {
                  $.jGrowl('Retrieving Permissions Failed', {
                    theme: 'alert-styled-left bg-danger'
                  });
                }
              },
              columns: [
                {data: function(type,row,meta) { 
                   return '<input type="checkbox" class="styled"> &nbsp;&nbsp; '+type[0].name.toUpperCase();
                  }
                },
                {data: function(type,row,meta) { 
                   return '<input type="checkbox" class="styled"> &nbsp;&nbsp; '+type[1].name.toUpperCase();
                  }
                },
                {data: function(type,row,meta) { 
                   return '<input type="checkbox" class="styled"> &nbsp;&nbsp; '+type[2].name.toUpperCase();
                  }
                },
              ],
            });
          /********* Permissions Table ************/
        /********* Table Initializations ************/

        /****** Displaying Permission ****/
          /****** All Users ******/
          $.ajax({
            type: 'POST',
            url: '<?= base_url()?>settings/retrieve_permissions/users',
            datatype: 'json',
            success: function(data) {
              var employees = JSON.parse(data);
              
              $.each(employees, function(array_index) {
                $("#all_users").data("selectBox-selectBoxIt").add({ value: employees[array_index].id, text: employees[array_index].fullname, 'data-empid': employees[array_index].employee_id,'data-email': employees[array_index].work_email,'data-phone_num': employees[array_index].phone_number_1,'data-fullname': employees[array_index].fullname,
                  'data-iconurl':"../"+employees[array_index].profile_photo
                });
              });
            },
            error: function() {
              $.jGrowl('Retrieving Users Failed', {
                theme: 'alert-styled-left bg-danger'
              });
            }
          });

          $.ajax({
            type: 'POST',
            url: '<?= base_url()?>settings/retrieve_permissions/groups',
            datatype: 'json',
            success: function(data) {
              var employees = JSON.parse(data);
              
              $.each(employees, function(array_index) {
                $("#all_groups").data("selectBox-selectBoxIt").add({ value: employees[array_index].id, text: employees[array_index].name,
                });
              });
            },
            error: function() {
              $.jGrowl('Retrieving Users Failed', {
                theme: 'alert-styled-left bg-danger'
              });
            }
          });

          $('#view_permissions').click(function(){
            let user = $('[name="user_id"]').val();
            let group = $('[name="group_id"]').val();

            if(user == "" && group == "") {
              $.jGrowl('No Selection Made', {
                theme: 'alert-styled-left bg-danger'
              });
            } else {
              let formData = {'user_id':user, 'group_id':group};
              $.ajax({
                type: 'POST',
                url: '<?= base_url()?>administration/view_permissions',
                datatype: 'json',
                data: formData,
                success: function(data) {
                  var employees = JSON.parse(data);
                  let output = "<tr>"
                  $.each(employees, function(array_index) {
                    $("#all_groups").data("selectBox-selectBoxIt").add({ value: employees[array_index].id, text: employees[array_index].name,
                    });
                  });
                },
                error: function() {
                  $.jGrowl('Retrieving Users Failed', {
                    theme: 'alert-styled-left bg-danger'
                  });
                }
              });
            }
          });
        /********* Displaying Permission *********/
        
        /********** Displaying User Groups **********/
          $("#usertypes").selectBoxIt({
            autoWidth: false,
            defaultText: "Select One",
            populate: function(){
              var deferred = $.Deferred(), arr = [], x = -1;
              $.ajax({
              url: '<?=base_url()?>administration/usergroups/roles_privileges_group'}).done(function(data) {
                data = JSON.parse(data);  
                $.each(data, function(array_index) {
                  $("#usertypes").data("selectBox-selectBoxIt").add({ value: data[array_index].id, text: data[array_index].name});
                });
              });
            }
          });
        /********** Displaying User Groups **********/
      });
      <?php endif; ?>
    /**************************************** Permissions Page ***********************************/
  });
</script>
<?php endif; ?>
  
