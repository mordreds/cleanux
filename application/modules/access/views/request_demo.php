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
          <form action="<?=base_url()?>access/save_demo_request" method="post">
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
                      <h5 class="content-group-lg">New Demo Request 
                        <!-- Notifications -->
                        <?php 
                          if($this->session->flashdata('error'))
                            print '<small class="display-block" style="color:red">'.@$this->session->flashdata('error').'</small>';
                          else
                            print '<small class="display-block">All fields are required</small>';
                          if($this->session->flashdata('error_alert')) {
                        ?>
                          <script type="text/javascript">
                            swal({
                                title: "Oops...",
                                text: "<?=$this->session->flashdata('error_alert')?>!",
                                confirmButtonColor: "#EF5350",
                                type: "error"
                            });
                          </script>

                        <?php } else if($this->session->flashdata('success_alert')) { ?>

                          <script type="text/javascript">
                            // Success alert
                            swal({
                                title: "Request Sent!",
                                text: "<?=$this->session->flashdata('success_alert')?>!",
                                confirmButtonColor: "#66BB6A",
                                type: "success"
                            });
                          </script>

                        <?php } else if($this->session->flashdata('info_alert')) { ?>

                          <script type="text/javascript">
                            // Success alert
                            swal({
                                title: "Notice!",
                                text: "<?=$this->session->flashdata('info_alert')?>!",
                                confirmButtonColor: "#2196F3",
                                type: "info"
                            });
                          </script>
                          
                        <?php } else {} ?>
                        <!-- Notifications -->
                      </h5>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group has-feedback">
                          <input type="text" name="firstname" class="form-control" placeholder="First Name" value="<?=$this->session->flashdata('firstname');?>" required>
                          <div class="form-control-feedback">
                            <i class="icon-user-check text-muted"></i>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group has-feedback">
                          <input type="text" name="lastname" class="form-control" placeholder="Last Name" value="<?=$this->session->flashdata('lastname');?>" required>
                          <div class="form-control-feedback">
                            <i class="icon-user-check text-muted"></i>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group has-feedback">
                          <input type="email" name="email" class="form-control" placeholder="Business Email" value="<?=$this->session->flashdata('email');?>" required>
                          <div class="form-control-feedback">
                            <i class="icon-envelope text-muted"></i>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group has-feedback">
                          <input type="text" name="contact" class="form-control" placeholder="Contact Number(s)" value="<?=$this->session->flashdata('contact');?>" required>
                          <div class="form-control-feedback">
                            <i class="icon-phone text-muted"></i>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group has-feedback">
                          <input type="text" name="company_name" class="form-control" placeholder="Company Name" value="<?=$this->session->flashdata('company_name');?>" required>
                          <div class="form-control-feedback">
                            <i class="icon-office text-muted"></i>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group has-feedback">
                          <input type="text" name="location" class="form-control" placeholder="Company Location" value="<?=$this->session->flashdata('location');?>" required>
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
                          <input type="password" name="confirm_password" class="form-control" placeholder="Repeat password" required>
                          <div class="form-control-feedback">
                            <i class="icon-user-lock text-muted"></i>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group has-feedback">
                          <textarea name="expectations" class="form-control" placeholder="Tell us what you'd like to see in the demo (expectations or problems)" required rows="4" style="resize: none"><?=$this->session->flashdata('expectations');?></textarea>
                           <div class="form-control-feedback">
                            <i class="icon-file-eye text-muted"></i>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="text-right">
                      <button name="demo_request" type="submit" class="btn bg-teal-800 btn-labeled btn-labeled-right ml-10"><b><i class="icon-arrow-right14"></i></b> submit request</button>
                      <a href="<?=base_url()?>access"><button type="button" class="btn bg-pink-600 btn-labeled btn-labeled-elft ml-10"><b><i class="icon-reset"></i></b> Back to login </button></a>
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