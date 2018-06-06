<body class="login-container login-cover">

  <!-- Main navbar --
  <div class="navbar navbar-inverse bg-indigo">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?=base_url()?>"><img src="<?=base_url()?>resources/images/logo_light.png" alt=""></a>

      <ul class="nav navbar-nav pull-right visible-xs-block">
        <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
      </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="#">
            <i class="icon-display4"></i> <span class="visible-xs-inline-block position-right"> Go to website</span>
          </a>
        </li>

        <li>
          <a href="#">
            <i class="icon-user-tie"></i> <span class="visible-xs-inline-block position-right"> Contact admin</span>
          </a>
        </li>

        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown">
            <i class="icon-cog3"></i>
            <span class="visible-xs-inline-block position-right"> Options</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <!-- /main navbar -->

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
                <div class="icon-object border-slate-300 text-slate-300">
                  <img src="<?=base_url()?>resources/images/logo.png" alt="">
                </div>
                <h5 class="content-group-lg">Login to your account
                  <?php 
                    if($this->session->flashdata('error'))
                      print '<small class="display-block" style="color:red">'.@$this->session->flashdata('error').'</small>';
                    elseif($this->session->flashdata('attemptleft') > 0)
                      print '<small class="display-block" style="color:red">Invalid Login Credentials. <b>Login Attempt Left: '.@$this->session->flashdata('attemptleft').'</b></small>';
                    else
                      print '<small class="display-block">Enter your credentials below</small>';
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
                <button type="submit" name="login" class="btn bg-pink-400 btn-block">Login <i class="icon-arrow-right14 position-right"></i></button>
              </div>

              <div class="content-divider text-muted form-group"><span>Don't have an account?</span></div>
              <a href="<?=base_url()?>access/signup" class="btn bg-indigo-400 btn-block legitRipple">Sign up</a><br/>

              <div class="content-divider text-muted form-group"><span>or signup with</span></div>
              <ul class="list-inline form-group list-inline-condensed text-center">
                <li><a href="#" class="btn border-pink text-pink btn-flat btn-icon btn-rounded"><i class="icon-google"></i></a></li>
                <li><a href="#" class="btn border-indigo text-indigo btn-flat btn-icon btn-rounded"><i class="icon-facebook"></i></a></li>
                <li><a href="#" class="btn border-info text-info btn-flat btn-icon btn-rounded"><i class="icon-twitter"></i></a></li>
                <li><a href="#" class="btn border-slate-600 text-slate-600 btn-flat btn-icon btn-rounded"><i class="icon-linkedin"></i></a></li>
              </ul>

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