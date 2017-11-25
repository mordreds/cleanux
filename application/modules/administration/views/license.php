
 <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header" style="o">
          <h1 class="pull-left">
            License Info
          </h1>
          <?php 
            if(isset($_SESSION['success']) && !empty($_SESSION['success'])) {
          ?>
          <div class="pull-right">
            <div class="alert alert-success alert-dismissable gh">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    <i class="fa fa-times"></i>
                </button>
                 <?= "<em>".$_SESSION['success']."</em>"; unset($_SESSION['success']); ?>
            </div>
          </div>
          <?php 
                }
            if(isset($_SESSION['error']) && !empty($_SESSION['error'])) {
          ?>
          <div class="pull-right">
            <div class="alert alert-danger alert-dismissable gh">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    <i class="fa fa-times"></i>
                </button>
                <?php 
                    if(validation_errors())
                        print "<em>".validation_errors()."</em>";
                    else {
                        print "<em>".$_SESSION['error']."</em>";
                        unset($_SESSION['error']);
                        }
                ?>
            </div>
          </div>
          <?php
                }
          ?>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
                <form action="" method="Post">
                <div class="box-header with-border"></div><!-- /.box-header -->
                <div class="box-body">
                    <div class="col-md-3">
                       <div style="border: double;">
                          <fieldset>
                            <legend>Licensed To :</legend>
                              <?php 
                                #
                                if(!empty($license_info))
                                {
                                    foreach($license_info As $info)
                                    {
                                        print "<address>";
                                        print $info->name."<br/>";
                                        print $info->address."<br/>";
                                        print $info->email."<br/>";
                                    }
                                }
                              ?>
                          </fieldset>
                        </div>
                         <div style="border: double;margin-top: 20px;">
                      <fieldset>
                        <legend>Licensed To :</legend>
                          <?php 
                            #
                            if(!empty($license_info))
                            {
                                foreach($license_info As $info)
                                {
                                    print "<address>";
                                    print $info->name."<br/>";
                                    print $info->address."<br/>";
                                    print $info->email."<br/>";
                                }
                            }
                          ?>
                      </fieldset>
                    </div>
                    </div>
                    <div class="col-md-4" style="border: double;margin-left: 20px;">
                      <fieldset>
                        <legend>License Agreement</legend>
                          <iframe height="450px" src="<?= base_url()."application/views/license agreement.txt"; ?>">
                            

                          </iframe>
                      </fieldset>
                    </div>
                </div><!-- ./box-body -->
                
                </form>
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b style="color: red;">Trial Version </b> 
        </div>
        <strong> &copy; 2014-2015 <a href="http://wisspri.com" target="_blank" >WissPri Technologies Limited</a>.</strong> All rights reserved.
      </footer>

 