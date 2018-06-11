<body class="login-container login-cover">
  <!-- Page container -->
  <div class="page-container">
    <!-- Page content -->
    <div class="page-content">
      <!-- Main content -->
      <div class="content-wrapper">
        <!-- Content area -->
        <div class="content">
          <!-- Registration form -->
          <form action="<?=base_url()?>access/signup_request" method="post">
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-9">
                <div class="panel panel-body app-info col-md-4">
                  <div class="text-center">
                    <div class="icon-object border-slate-300 text-slate-300">
                      <img src="<?=base_url()?>resources/images/logo.png" alt="">
                    </div>
                    <h3>Welcome To Poseidon!</h3>
                    <h4>Lorem ipsum dolor sit amet, nulla consectetur adipiscing elit Sed.</h4>
                    <p> Nam eleifend velit eget dolor vestibulum ornare. Vestibulum est nulla, fermentum eget euismod et, tincidunt at dui. Nulla tellus nisl, semper id justo vel, rutrum finibus risus. Cras vel auctor odio.</p>
                  </div>
                </div>
                <div class="panel registration-form col-md-6 col-sm-12 col-xs-12">
                  <div class="panel-body">
                    <div class="text-center">
                      <h5 class="content-group-lg">Create Account <small class="display-block">All fields are required</small></h5>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group has-feedback">
                          <input type="text" name="surname" class="form-control" placeholder="Surname" required>
                          <div class="form-control-feedback">
                            <i class="icon-user-check text-muted"></i>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group has-feedback">
                          <input type="text" name="othernames" class="form-control" placeholder="Other Name(s)" required>
                          <div class="form-control-feedback">
                            <i class="icon-user-check text-muted"></i>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group has-feedback">
                          <input type="email" name="email" class="form-control" placeholder="Business Email" required>
                          <div class="form-control-feedback">
                            <i class="icon-envelope text-muted"></i>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group has-feedback">
                          <input type="text" name="contact" class="form-control" placeholder="Contact Number(s)" required>
                          <div class="form-control-feedback">
                            <i class="icon-phone text-muted"></i>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group has-feedback">
                          <input type="text" name="Company_name" class="form-control" placeholder="Company Name" required>
                          <div class="form-control-feedback">
                            <i class="icon-office text-muted"></i>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group has-feedback">
                          <input type="text" name="location" class="form-control" placeholder="Company Location" required>
                          <div class="form-control-feedback">
                            <i class="icon-map text-muted"></i>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group has-feedback">
                          <input type="password" name="password" class="form-control" placeholder="Create password" required>
                          <div class="form-control-feedback">
                            <i class="icon-user-lock text-muted"></i>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group has-feedback">
                          <input type="password" class="form-control" placeholder="Repeat password" required>
                          <div class="form-control-feedback">
                            <i class="icon-user-lock text-muted"></i>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" class="styled">
                          Send me <a href="#">Guest Account Credentials</a>
                        </label>
                      </div>

                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="terms" class="styled" checked readonly>
                          Accept <a href="#">Terms of Service</a>
                        </label>
                      </div>

                     <!--  <div class="checkbox">
                        <label>
                          <input type="checkbox" class="styled" checked="checked">
                          I acknowledge that Sprout Social uses my personal information in accordance with its Privacy Policy.
                        </label>
                      </div> -->
                    </div>

                    <div class="text-right">
                      <!-- <button type="button" class="btn btn-link"><i class="icon-arrow-left13 position-left"></i> Back to login form</button> -->
                      <a href="<?=base_url()?>access"><button type="button" class="btn bg-pink-600 btn-labeled btn-labeled-elft ml-10"><b><i class="icon-reset"></i></b> Back to login </button></a>
                      <button name="company_resgister" type="submit" class="btn bg-indigo-400 btn-labeled btn-labeled-right ml-10"><b><i class="icon-plus3"></i></b> Create account</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-1"></div>
            </div>
          </form>
          <!-- /registration form -->
        </div>
        <!-- /content area -->
      </div>
      <!-- /main content -->
    </div>
    <!-- /page content -->
  </div>
  <!-- /page container -->

</body>