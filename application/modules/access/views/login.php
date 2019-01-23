<body class="login-container login-cover">
  <!-- Page container -->
  <div class="page-container">
    <!-- Page content -->
    <div class="page-content">
      <!-- Main content -->
        <!-- Main content -->
      <div class="content-wrapper">

        <!-- Content area -->
        <div class="content pb-20">

          <!-- Form with validation -->
          <form action="<?=base_url()?>access/login_validation" method="post" class="form-validate">
            <div class="panel panel-body login-form">
              <div class="text-center">
                <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                <h5 class="content-group">Login to your account 
                  <?php 
                    if($this->session->flashdata('error'))
                      print '<small class="display-block" style="color:red">'.@$this->session->flashdata('error').'</small>';
                    elseif($this->session->flashdata('attemptleft') > 0)
                      print '<small class="display-block" style="color:red">Invalid Login Credentials. <b>Login Attempt Left: '.@$this->session->flashdata('attemptleft').'</b></small>';
                    else
                      print '<small class="display-block">Your credentials</small>';
                  ?>
                </h5> <br/>
              </div>

              <div class="form-group has-feedback has-feedback-left">
                <input type="email" class="form-control" placeholder="Email" oncopy="return false;" onpaste="return false;" onselectstart="return false;" autocomplete="off" name="email" required>
                <div class="form-control-feedback">
                  <i class="icon-user text-muted"></i>
                </div>
              </div>

              <div class="form-group has-feedback has-feedback-left">
                 <input type="password" class="form-control" placeholder="Password" oncopy="return false;" onpaste="return false;" onselectstart="return false;" autocomplete="off" name="passwd" required>
                <div class="form-control-feedback">
                  <i class="icon-lock2 text-muted"></i>
                </div>
              </div>

              <div class="form-group login-options">
                <div class="row">
                  <div class="col-sm-6">
                    <label class="checkbox-inline">
                      <input type="checkbox" class="styled" checked="checked">
                      Remember
                    </label>
                  </div>

                  <div class="col-sm-6 text-right">
                    <a href="<?=base_url()?>access/password_reset">Forgot password?</a>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <button type="submit" name="login" class="btn bg-teal-800 btn-block">Login <i class="icon-arrow-right14 position-right"></i></button>
              </div>
            </div>
          </form>
          <!-- /form with validation -->

        </div>
        <!-- /content area -->

      </div>
      <!-- /main content -->

      <!-- /main content -->
    </div>
    <!-- /page content -->
  </div>
  <!-- /page container -->

</body>