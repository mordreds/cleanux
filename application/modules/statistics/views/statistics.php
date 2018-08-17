 <!-- Content area -->
  <div class="content">
    <!-- Main charts -->
    <div class="row">
      <div class="col-sm-6 col-md-9">
        <!-- Statisics Widgets -->
        <div class="col-sm-6 col-md-2">
          <div class="panel panel-body panel-body-accent">
            <div class="media no-margin">
              <div class="media-left media-middle">
                <i class="icon-truck icon-3x text-info-400"></i>
              </div>
              <div class="media-body text-right">
                <h3 class="no-margin text-semibold"><?=number_format($delivered_orders)?></h3>
                <span class="text-uppercase text-size-mini text-muted">Total Delivered </span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-2">
          <a href="<?=base_url()?>dispatch">
            <div class="panel panel-body panel-body-accent">
              <div class="media no-margin">
                <div class="media-left media-middle">
                  <i class="icon-basket icon-3x text-success-400"></i>
                </div>
                <div class="media-body text-right">
                  <h3 class="no-margin text-semibold"><?=number_format($awaiting_orders)?></h3>
                  <span class="text-uppercase text-size-mini text-muted">Awaiting Delivery </span>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-sm-6 col-md-2">
          <a href="<?=base_url()?>inhouse">
            <div class="panel panel-body panel-body-accent">
              <div class="media no-margin">
                <div class="media-left media-middle">
                  <i class="icon-watch2 icon-3x text-warning-400"></i>
                </div>
                <div class="media-body text-right">
                  <h3 class="no-margin text-semibold"><?=number_format($overdue_orders)?></h3>
                  <span class="text-uppercase text-size-mini text-muted">OverDue Orders </span>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-sm-6 col-md-2">
          <a href="<?=base_url()?>inhouse">
            <div class="panel panel-body panel-body-accent">
              <div class="media no-margin">
                <div class="media-left media-middle" style="padding-right: 0px">
                  <i class="icon-basket icon-3x text-success-400"></i>
                </div>
                <div class="media-body text-right">
                  <h3 class="no-margin text-semibold"><?=number_format($pending_orders)?></h3>
                  <span class="text-uppercase text-size-mini text-muted">T. Pending Orders</span>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-sm-6 col-md-2">
          <div class="panel panel-body panel-body-accent">
            <div class="media no-margin">
              <div class="media-left media-middle">
                <i class="icon-hour-glass2 icon-3x text-info-400"></i>
              </div>
              <div class="media-body text-right">
                <h3 class="no-margin text-semibold"><?=number_format($daily_orders)?></h3>
                <span class="text-uppercase text-size-mini text-muted">Today's Orders </span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-2">
          <div class="panel panel-body panel-body-accent">
            <div class="media no-margin">
              <div class="media-left media-middle">
                <i class="icon-cash4 icon-3x text-info-400"></i>
              </div>
              <div class="media-body text-right">
                <h3 class="no-margin text-semibold"><?=number_format($total_cash,2)?></h3>
                <span class="text-uppercase text-size-mini text-muted">Today's Cash </span>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Graphs Reporting -->
        <div class="col-md-12">
          <!-- Combination and connection -->
          <div class="panel panel-flat">
            <div class="panel-heading">
              <h5 class="panel-title">Report Overview</h5>
            </div>

            <div class="panel-body">
              <div class="row">
                <div class="col-lg-6">
                  <div class="chart-container">
                    <div class="chart has-fixed-height" id="connect_pie"></div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="chart-container">
                    <div class="chart has-fixed-height" id="connect_column"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /combination and connection -->
        </div>
        <!-- Graphs Reporting -->
      </div>

      <div class="col-sm-6 col-md-3">
        <!-- <div class="panel panel-white">
          <div class="panel-heading">
            <h5 class="panel-title">Announcements & Notices<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
            <div class="heading-elements">
              <a href="#" class="heading-text">See all →</a>
            </div>
          </div>
          <div class="panel-body">
            <ul class="media-list">
              <li class="media">
                <div class="media-left">
                  <a href="#" class="btn border-primary text-primary btn-flat btn-icon btn-rounded btn-sm legitRipple">
                    <i class="icon-spinner11"></i>
                  </a>
                </div>
                <div class="media-body">
                  <a href="#">David Linner</a> requested refund for a double card
                  <div class="media-annotation">12 minutes ago</div>
                </div>
              </li>
            </ul>
          </div>
        </div> -->

         <!-- Left aligned -->
        <div class="panel panel-white"> 
          <div class="panel-heading" style="padding-top: 5px; padding-bottom: 7px;">
            <h5 class="content-group">
              <span class="label label-flat label-rounded label-icon border-grey text-grey mr-10">
                <i class="icon-watch2"></i>
              </span>
              <a href="<?=base_url()?>overview/timeline" class="text-default">
                Timeline - <strong><i><?=(empty($timeline_date)) ? "" : $timeline_date?></i></strong> 
              </a>
            </h5>
            <div class="heading-elements">
              <a href="<?=base_url()?>overview/timeline" class="heading-text">See all →</a>
            </div>
          </div>
          <div class="panel-body border-top-teal">
            <ul class="list-feed list-feed-time">
              <?php 
                $line_colors = array(
                  "border-warning-400",
                  "border-info-400",
                  "border-pink-400",
                  "border-slate-600",
                  "border-teal-400",
                  "border-danger-400"
                );
                if(!empty($timeline)) :  print_r($timeline);
                  foreach($timeline as $record_timeline) : 
                    $color_shuffle = mt_rand(0,5);
                    $bg_color = $line_colors[$color_shuffle];
              ?>
              <li class="<?=$bg_color?>">
                <span class="feed-time text-muted"><?=date('G : i', strtotime($record_timeline->date_created))?></span>
                <a href="#"><?=$record_timeline->client_fullname?></a> placed this order <a href=""><?=$record_timeline->order_number?></a>
              </li>
              <?php endforeach; endif; ?>
            </ul>
          </div>
        </div>
        <!-- /left aligned -->
      </div>
    </div>

    </div> 
  </div>
  <!-- /main charts -->

  <!-- Including Page Settings -->
  <?php include("page_settings.php"); ?>
  <!-- Including Page Settings -->      
      