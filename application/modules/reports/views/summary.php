 <!-- Content area -->
 <style type="text/css">
   .nav-tabs[class*=bg-]>.active>a {
    background-color: rgba(0, 0, 0, .3);
   }
 </style>
  <div class="content">
    <!-- Dashboard content -->
    <div class="row">
      <div class="col-lg-12">
        <!-- My messages -->
        <div class="panel panel-flat">
          <!-- Tabs -->
          <ul class="nav nav-lg nav-tabs nav-justified no-margin no-border-radius bg-teal-400 border-top border-top-teal-300">
            <?php 
              $months = array_reverse(array(
                1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April',
                5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August',
                9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December'
              ),TRUE);
              $current_month = gmdate('F');
              $months = array_splice($months,(12 - gmdate('m')),12,TRUE); 
              
              foreach ($months as $key => $month_name) {
                # Checking months already experienced
                if($month_name == $current_month)
                  $active = "active";
                else
                  $active = "";

                print '
                  <li class="'.$active.'">
                    <a href="#'.$month_name.'" class="text-size-small text-uppercase" data-toggle="tab">
                      '.strtoupper($month_name).'
                    </a>
                  </li>';
              }
            ?>
          </ul>
          <!-- /tabs -->

          <!-- Tabs content -->
          <div class="tab-content">
            <?php $active = "active";  if(!empty($monthly_stat)):foreach($monthly_stat as $key=>$value) : ?>
            <div class="tab-pane <?=$active?> fade in no-padding" id="<?=$key?>">
              <div class="table-responsive">
                <table class="table table-xlg text-nowrap">
                  <tbody>
                    <tr>
                      <td class="col-md-1">
                        <div class="media-left media-middle">
                          <a href="#" class="btn border-info-400 text-info-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-cash4"></i></a>
                        </div>
                        <div class="media-left">
                          <h5 class="text-bold no-margin">
                            <?=number_format($value['total_cash'],2)?> 
                            <small class="display-block no-margin">Total Service Revenue</small>
                          </h5>
                        </div>
                      </td>

                      <td class="col-md-1">
                        <div class="media-left media-middle">
                         <a href="#" class="btn border-success-400 text-success-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-truck"></i></a>
                        </div>
                        <div class="media-left">
                          <h5 class="text-bold no-margin">
                            <?=number_format($value['total_delivery_cash'],2)?> 
                            <small class="display-block no-margin">Delivery Revenue</small>
                          </h5>
                        </div>
                      </td>

                      <td class="col-md-1">
                        <div class="media-left media-middle">
                          <a href="#" class="btn border-warning-400 text-warning-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-percent"></i></a>
                        </div>
                        <div class="media-left">
                          <h5 class="text-bold no-margin">
                            <?=number_format($value['tax_payable'],2)?> 
                            <small class="display-block no-margin">VAT Payable</small>
                          </h5>
                        </div>
                      </td>

                      <td class="col-md-1">
                        <div class="media-left media-middle">
                          <a href="#" class="btn border-success-400 text-success-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-cash2"></i></a>
                        </div>
                        <div class="media-left">
                          <h5 class="text-bold no-margin">
                            <?=number_format($value['total_cash'] + $value['total_delivery_cash'] - $value['tax_payable'],2)?> 
                            <small class="display-block no-margin">Profit Earned</small>
                          </h5>
                        </div>
                      </td>

                      <td class="text-right col-md-2">
                        <a href="<?=base_url()?>reports/generate_report" class="btn bg-info-800"><i class="icon-statistics position-left"></i> Generate Report</a>
                      </td>
                    </tr>
                  </tbody>
                </table>  
              </div>

              <div class="table-responsive">
                <table class="table text-nowrap">
                  <thead>
                    <tr>
                      <th>Campaign</th>
                      <th class="col-md-2">Quantity</th>
                      <th class="col-md-2">Changes</th>
                      <th class="col-md-2">Budget</th>
                      <th class="col-md-2">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="active border-double">
                      <td colspan="5">Statistics</td>
                      <td class="text-right">
                        <span class="progress-meter" id="today-progress" data-progress="30"></span>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="media-left media-middle">
                          <a href="#" class="btn border-info-400 text-info-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-list"></i></a>
                        </div>
                        <div class="media-left">
                          <div class=""><a href="#" class="text-default text-semibold">Total Orders</a></div>
                          <div class="text-muted text-size-small">
                            <span class="status-mark border-blue position-left"></span>
                            02:00 - 03:00
                          </div>
                        </div>
                      </td>
                      <td><span class="text-bold"><?=number_format($value['total_orders'])?></span></td>
                      <td><span class="text-success-600"><i class="icon-stats-growth2 position-left"></i> 2.43%</span></td>
                      <td><h6 class="text-semibold">$5,489</h6></td>
                      <td><span class="label bg-blue">Active</span></td>
                    </tr>
                    <tr>
                      <td>
                        <div class="media-left media-middle">
                          <a href="#" class="btn border-warning-400 text-warning-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-hour-glass2"></i></a>
                        </div>
                        <div class="media-left">
                          <div class=""><a href="#" class="text-default text-semibold">Pending Orders</a></div>
                          <div class="text-muted text-size-small">
                            <span class="status-mark border-danger position-left"></span>
                            13:00 - 14:00
                          </div>
                        </div>
                      </td>
                      <td><span class="text-bold"><?=number_format($value['pending_orders'])?></span></td>
                      <td><span class="text-success-600"><i class="icon-stats-growth2 position-left"></i> 3.12%</span></td>
                      <td><h6 class="text-semibold">$2,592</h6></td>
                      <td><span class="label bg-danger">Closed</span></td>
                    </tr>
                    <tr>
                      <td>
                        <div class="media-left media-middle">
                          <a href="#" class="btn border-danger-400 text-danger-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-watch2"></i></a>
                        </div>
                        <div class="media-left">
                          <div class=""><a href="#" class="text-default text-semibold">Overdue Orders</a></div>
                          <div class="text-muted text-size-small">
                            <span class="status-mark border-grey-400 position-left"></span>
                            10:00 - 11:00
                          </div>
                        </div>
                      </td>
                      <td><span class="text-bold"><?=number_format($value['overdue_orders'])?></span></td>
                      <td><span class="text-danger"><i class="icon-stats-decline2 position-left"></i> - 8.02%</span></td>
                      <td><h6 class="text-semibold">$1,268</h6></td>
                      <td><span class="label bg-grey-400">Hold</span></td>
                    </tr>
                    <tr>
                      <td>
                        <div class="media-left media-middle">
                          <a href="#" class="btn border-success-400 text-success-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-truck"></i></a>
                        </div>
                        <div class="media-left">
                          <div class=""><a href="#" class="text-default text-semibold">Delivered Orders</a></div>
                          <div class="text-muted text-size-small">
                            <span class="status-mark border-grey-400 position-left"></span>
                            04:00 - 05:00
                          </div>
                        </div>
                      </td>
                      <td><span class="text-bold"><?=number_format($value['delivered_orders'])?></span></td>
                      <td><span class="text-success-600"><i class="icon-stats-growth2 position-left"></i> 2.78%</span></td>
                      <td><h6 class="text-semibold">$7,467</h6></td>
                      <td><span class="label bg-grey-400">Hold</span></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- Graphs Reporting --
              <div class="panel">
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
              </div>
              <!-- Graphs Reporting -->
            </div>
            <?php $active = ""; endforeach; endif; ?>
          </div>
          <!-- /tabs content -->
        </div>
        <!-- /my messages -->
      </div>
    </div>
    <!-- /dashboard content -->

    <!-- Main charts -->
    <div class="row">
      <div class="col-sm-6 col-md-9">
        <!-- Graphs Reporting -->
        <div class="col-md-12">
          <!-- Combination and connection --
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
    </div>

    </div> 
  </div>
  <!-- /main charts -->

  <!-- Including Page Settings -->
  <?php include("page_settings.php"); ?>
  <!-- Including Page Settings -->      
      