<body class="login-container bg-slate-800"  style="background-image:url(<?=base_url()?>resources/images/1.jpg);">
  <!-- Page container -->
  <div class="page-container">
    <!-- Page content -->
    <div class="page-content">
      <!-- Main content -->
      <div class="content-wrapper">
        <!-- Content area -->
        <div class="content">
          <!-- Advanced login -->
          <form action="<?=base_url()?>access/login_validation" method="post">
            <div class="panel panel-body login-form">
              <div class="text-center">
                <div class="icon-object border-warning-400 text-warning-400"><i class="icon-people"></i></div>
                <h5 class="content-group-lg">Login to your account
                  <?php 
                    if($this->session->flashdata('error'))
                      print '<small class="display-block" style="color:red">'.@$this->session->flashdata('error').'</small>';
                    elseif($this->session->flashdata('attemptleft') > 0)
                      print '<small class="display-block" style="color:red">Invalid Login Credentials. <b>Login Attempt Left: '.@$this->session->flashdata('attemptleft').'</b></small>';
                    else
                      print '<small class="display-block">Enter your credentials</small>';
                  ?>
                </h5>
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
                <button type="submit" name="login" class="btn bg-pink-400 btn-block">Login <i class="icon-circle-right2 position-right"></i></button>
              </div>
              <!-- <div class="content-divider text-muted form-group"><span>or sign in with</span></div>
              <ul class="list-inline form-group list-inline-condensed text-center">
                <li><a href="#" class="btn border-indigo text-indigo btn-flat btn-icon btn-rounded"><i class="icon-facebook"></i></a></li>
                <li><a href="#" class="btn border-pink-300 text-pink-300 btn-flat btn-icon btn-rounded"><i class="icon-dribbble3"></i></a></li>
                <li><a href="#" class="btn border-slate-600 text-slate-600 btn-flat btn-icon btn-rounded"><i class="icon-github"></i></a></li>
                <li><a href="#" class="btn border-info text-info btn-flat btn-icon btn-rounded"><i class="icon-twitter"></i></a></li>
              </ul>-->

              <!-- <div class="content-divider text-muted form-group"><span>Don't have an account?</span></div>
              <a href="login_registration.html" class="btn bg-slate btn-block content-group">Register</a> -->
              <span class="help-block text-center no-margin">By continuing, you're confirming that you've read our <a href="#">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span> 
            </div>
          </form>
          <!-- /advanced login -->
        </div>
        <!-- /content area -->
      </div>
      <!-- /main content -->
    </div>
    <!-- /page content -->
  </div>
  <!-- /page container -->
</body>

