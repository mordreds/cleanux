 <!-- Content area --> 
  <div class="content" style="background:url(<?=base_url()?>resources/images/backgrounds/bg.png);">
    <!-- Main charts -->
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-lg-8 col-md-10">
      <?php 
        if(!empty($dashboard_tabs)) { 
          foreach ($dashboard_tabs as $key => $value) {
            foreach ($value as $menu_obj => $menu_val) { 
      ?>  
        <div class="col-md-3 col-xs-6">
          <div class="content-group">
            <div class="row row-seamless btn-block-group">
              <div class="col-xs-12">
                <a href="<?=$menu_val['link']?>" type="button" class="btn btn-default btn-block btn-float btn-float-lg">
                  <i class=" <?=$menu_val['icon'].' '.$menu_val['bg']?>"></i>
                  <span><?=$menu_val['name']?></span>
                </a>
              </div>
            </div>
          </div> 
        </div>
      <?php 
            } 
          }
        }
      ?>
      </div>
      <div class="col-lg-1"></div>
      <div class="col-lg-2 col-md-2" style="margin-left:-40px;">
        <div class="sidebar-detached">
          <div class="sidebar sidebar-default">
            <div class="sidebar-content">
              <div class="sidebar-category no-margin">
                <div class="category-title" style="padding: 5px 5px 5px 14px;">
                  <h3 style="margin-top: 10px;"><?=$_SESSION['companyinfo']['name']?> </h3>
                  <ul class="nav navigation">
                    <!-- <li>Incooperation Date:<span class="text-muted text-regular "><b>21-10-2015</b> </span></li> -->
                    <li>TIN Number:<span class="text-muted text-regular "><br/><b> <?=@$_SESSION['companyinfo']['tin_number']?></b> </span></li>
                    <li>Postal Address:<span class="text-muted text-regular"><br/><b><?=@$_SESSION['companyinfo']['postal_address']?></b></span></li>
                    <li>Residence Address:<span class="text-muted text-regular"><br/><b><?=@$_SESSION['companyinfo']['residence_address']?></b></span></li>
                    <li>Email Address:<span class="text-muted text-regular"><br/><b><?=@$_SESSION['companyinfo']['email']?></b></span></li>
                    <li>Website Address:<span class="text-muted text-regular"><br/><b><?=@$_SESSION['companyinfo']['website']?></b></span></li>
                  </ul>
                </div>
              </div>
              <div class="sidebar-category">
                <div class="category-content no-padding">
                  <ul class="nav navigation" >
                    <li ><a href="#v_1_1"><i class="icon-bubbles4 text-slate-400" style="color: #333"></i ><p style="color:#333;">Vision:</p><span class="text-muted text-regular pull-left"><?=@$_SESSION['companyinfo']['vision']?></span></a></li>
                    <li class="navigation-divider"></li>
                   <li><a href="#v_1_1"><i class="icon-footprint text-slate-400"></i><p style="color:##333;">Mision:</p><span class="text-muted text-regular pull-left"><?=@$_SESSION['companyinfo']['mission']?></span></a></li>
                    <li class="navigation-divider"></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /main charts -->



