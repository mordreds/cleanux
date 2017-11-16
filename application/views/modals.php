<?php if(isset($_SESSION['user']['id'])) : ?>

<!-- *********** Delete Modal *********** -->
  <script type="text/javascript">
    $(document).on("click",".delete_btn",function(){
      $('#deletename').text($(this).data('displayname'));
      $('.delete_confirmed').attr('data-user_id',$(this).data('dataid'));
      $('.delete_confirmed').attr('data-email',$(this).data('email'));
      $('.delete_confirmed').attr('data-status',$(this).data('state'));
      $('#delete_modal').modal('show');
    });
  </script>
  <div id="delete_modal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h6 class="modal-title">Delete Confirmation</h6>
        </div>
        <div class="modal-body">
          Do You Want To Really Delete <?php echo "<strong><em id='deletename'></em></strong>"; ?> .... ?
          <input type="hidden" id="deleteId" name="deleteid"/> 
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-link" data-dismiss="modal">Close</button> &nbsp;&nbsp;
          <button type="button" class="btn btn-danger delete_confirmed" data-dismiss="modal">Delete</button>
        </div>
      </div>
    </div>
  </div>
<!-- *********** Delete Modal *********** -->

<!-- *********** Reset PAssword ********* -->
  <script type="text/javascript">
    $('.table').on('click','#reset_password', function(){
      $('#password_reset_displayname').val($(this).data('fullname'));
      $('#change_pwd_submit').attr('data-user_id',$(this).data('id'));
      $('#change_pwd_submit').attr('data-email',$(this).data('username'));
      $('#password_reset_modal').modal('show');
    });
  </script>

  <div id="password_reset_modal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h6 class="modal-title">Reset Password</h6>
        </div>
        <div class="modal-body">
          <div class="form-group has-feedback">
            <label>Username: </label>
            <input id="password_reset_displayname" type="text" placeholder="Your username" class="form-control" readonly>
            <div class="form-control-feedback">
              <i class="icon-user text-muted"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label>Password: </label>
            <input id="new_password" type="password" placeholder="Your password" class="form-control">
            <div class="form-control-feedback">
              <i class="icon-lock text-muted"></i>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-link" data-dismiss="modal">Close</button> &nbsp;&nbsp;
          <button type="button" class="btn btn-success" id="change_pwd_submit" data-dismiss="modal">Save</button>
        </div>
      </div>
    </div>
  </div>
<!-- *********** Reset PAssword ********* -->

<?php endif; ?>