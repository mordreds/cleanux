 <!-- Content area -->
  <div class="content">
    <?php //print "<pre>"; print_r($_SESSION); print "</pre>";?>
    <!-- Main charts -->
    <div class="row">
      <div class="col-sm-6 col-md-2">
        <div class="panel panel-body panel-body-accent">
          <div class="media no-margin">
            <div class="media-left media-middle">
              <i class="icon-hour-glass2 icon-3x text-info-400"></i>
            </div>
            <div class="media-body text-right">
              <h3 class="no-margin text-semibold"><?=number_format($pending_orders)?></h3>
              <span class="text-uppercase text-size-mini text-muted">Pending Orders </span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-2">
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
      </div>
      <div class="col-sm-6 col-md-2">
        <div class="panel panel-body panel-body-accent">
          <div class="media no-margin">
            <div class="media-left media-middle" style="padding-right: 0px">
              <i class="icon-basket icon-3x text-success-400"></i>
            </div>
            <div class="media-body text-right">
              <h3 class="no-margin text-semibold"><?=number_format($month_orders)?></h3>
              <span class="text-uppercase text-size-mini text-muted">Successful Orders</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-2">
        <div class="panel panel-body panel-body-accent">
          <div class="media no-margin">
            <div class="media-left media-middle">
              <i class="icon-basket icon-3x text-success-400"></i>
            </div>
            <div class="media-body text-right">
              <h3 class="no-margin text-semibold"><?=number_format($month_orders)?></h3>
              <span class="text-uppercase text-size-mini text-muted">Total Orders </span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-2">
        <div class="panel panel-body panel-body-accent">
          <div class="media no-margin">
            <div class="media-left media-middle">
              <i class="icon-cash2 icon-3x text-success-400"></i>
            </div>
            <div class="media-body text-right">
              <h3 class="no-margin text-semibold"><?=number_format($month_orders)?></h3>
              <span class="text-uppercase text-size-mini text-muted">Total Sales</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-2">
        <div class="panel panel-body panel-body-accent">
          <div class="media no-margin">
            <div class="media-left media-middle">
              <i class="icon-cash2 icon-3x text-success-400"></i>
            </div>
            <div class="media-body text-right">
              <h3 class="no-margin text-semibold"><?=number_format($month_orders)?></h3>
              <span class="text-uppercase text-size-mini text-muted">Total Sales</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-6 col-md-2">
        <div class="panel panel-body text-center">
          <h6 class="text-semibold no-margin-bottom mt-5">January Report</h6>
          <div class="text-size-small text-muted content-group-sm">+24% since 2016</div>
          <div class="svg-center"  id="january_report"></div>
          <div class="row text-center">
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">23,568</h5>
                <span class="text-muted text-size-small">Revenue</span>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">$9,464</h5>
                <span class="text-muted text-size-small">Tax</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-2">
        <div class="panel panel-body text-center">
          <h6 class="text-semibold no-margin-bottom mt-5">Febuary Report</h6>
          <div class="text-size-small text-muted content-group-sm">+24% since 2016</div>
          <div class="svg-center"  id="febuary_report"></div>
          <div class="row text-center">
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">23,568</h5>
                <span class="text-muted text-size-small">Revenue</span>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">$9,464</h5>
                <span class="text-muted text-size-small">Tax</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-2">
        <div class="panel panel-body text-center">
          <h6 class="text-semibold no-margin-bottom mt-5">March Report</h6>
          <div class="text-size-small text-muted content-group-sm">+24% since 2016</div>
          <div class="svg-center"  id="march_report"></div>
          <div class="row text-center">
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">23,568</h5>
                <span class="text-muted text-size-small">Revenue</span>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">$9,464</h5>
                <span class="text-muted text-size-small">Tax</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-2">
        <div class="panel panel-body text-center">
          <h6 class="text-semibold no-margin-bottom mt-5">April Report</h6>
          <div class="text-size-small text-muted content-group-sm">+24% since 2016</div>
          <div class="svg-center"  id="april_report"></div>
          <div class="row text-center">
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">23,568</h5>
                <span class="text-muted text-size-small">Revenue</span>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">$9,464</h5>
                <span class="text-muted text-size-small">Tax</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-2">
        <div class="panel panel-body text-center">
          <h6 class="text-semibold no-margin-bottom mt-5">May Report</h6>
          <div class="text-size-small text-muted content-group-sm">+24% since 2016</div>
          <div class="svg-center"  id="may_report"></div>
          <div class="row text-center">
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">23,568</h5>
                <span class="text-muted text-size-small">Revenue</span>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">$9,464</h5>
                <span class="text-muted text-size-small">Tax</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-2">
        <div class="panel panel-body text-center">
          <h6 class="text-semibold no-margin-bottom mt-5">June Report</h6>
          <div class="text-size-small text-muted content-group-sm">+24% since 2016</div>
          <div class="svg-center"  id="june_report"></div>
          <div class="row text-center">
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">23,568</h5>
                <span class="text-muted text-size-small">Revenue</span>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">$9,464</h5>
                <span class="text-muted text-size-small">Tax</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-2">
        <div class="panel panel-body text-center">
          <h6 class="text-semibold no-margin-bottom mt-5">July Report</h6>
          <div class="text-size-small text-muted content-group-sm">+24% since 2016</div>
          <div class="svg-center"  id="july_report"></div>
          <div class="row text-center">
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">23,568</h5>
                <span class="text-muted text-size-small">Revenue</span>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">$9,464</h5>
                <span class="text-muted text-size-small">Tax</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-2">
        <div class="panel panel-body text-center">
          <h6 class="text-semibold no-margin-bottom mt-5">August Report</h6>
          <div class="text-size-small text-muted content-group-sm">+24% since 2016</div>
          <div class="svg-center"  id="august_report"></div>
          <div class="row text-center">
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">23,568</h5>
                <span class="text-muted text-size-small">Revenue</span>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">$9,464</h5>
                <span class="text-muted text-size-small">Tax</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-2">
        <div class="panel panel-body text-center">
          <h6 class="text-semibold no-margin-bottom mt-5">September Report</h6>
          <div class="text-size-small text-muted content-group-sm">+24% since 2016</div>
          <div class="svg-center"  id="september_report"></div>
          <div class="row text-center">
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">23,568</h5>
                <span class="text-muted text-size-small">Revenue</span>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">$9,464</h5>
                <span class="text-muted text-size-small">Tax</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-2">
        <div class="panel panel-body text-center">
          <h6 class="text-semibold no-margin-bottom mt-5">October Report</h6>
          <div class="text-size-small text-muted content-group-sm">+24% since 2016</div>
          <div class="svg-center"  id="october_report"></div>
          <div class="row text-center">
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">23,568</h5>
                <span class="text-muted text-size-small">Revenue</span>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">$9,464</h5>
                <span class="text-muted text-size-small">Tax</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-2">
        <div class="panel panel-body text-center">
          <h6 class="text-semibold no-margin-bottom mt-5">November Report</h6>
          <div class="text-size-small text-muted content-group-sm">+24% since 2016</div>
          <div class="svg-center"  id="november_report"></div>
          <div class="row text-center">
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">23,568</h5>
                <span class="text-muted text-size-small">Revenue</span>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">$9,464</h5>
                <span class="text-muted text-size-small">Tax</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-2">
        <div class="panel panel-body text-center">
          <h6 class="text-semibold no-margin-bottom mt-5">December Report</h6>
          <div class="text-size-small text-muted content-group-sm">+24% since 2016</div>
          <div class="svg-center"  id="december_report"></div>
          <div class="row text-center">
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">23,568</h5>
                <span class="text-muted text-size-small">Revenue</span>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">$9,464</h5>
                <span class="text-muted text-size-small">Tax</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<<<<<<< Updated upstream

          <div class="row">
            <div class="col-md-6">

              <!-- Basic pie chart -->
              <div class="panel panel-flat">
                <div class="panel-heading">
                  <h5 class="panel-title">Basic pie chart</h5>
                  <div class="heading-elements">
                    <ul class="icons-list">
                              <li><a data-action="collapse"></a></li>
                              <li><a data-action="reload"></a></li>
                              <li><a data-action="close"></a></li>
                            </ul>
                          </div>
                </div>

                <div class="panel-body">
                  <div class="chart-container has-scroll">
                    <div class="chart has-fixed-height has-minimum-width" id="basic_pie"></div>
                  </div>
                </div>
              </div>
              <!-- /bacis pie chart -->


              <!-- Nested pie charts -->
              <div class="panel panel-flat">
                <div class="panel-heading">
                  <h5 class="panel-title">Nested pie charts</h5>
                  <div class="heading-elements">
                    <ul class="icons-list">
                              <li><a data-action="collapse"></a></li>
                              <li><a data-action="reload"></a></li>
                              <li><a data-action="close"></a></li>
                            </ul>
                          </div>
                </div>

                <div class="panel-body">
                  <div class="chart-container has-scroll">
                    <div class="chart has-fixed-height has-minimum-width" id="nested_pie"></div>
                  </div>
                </div>
              </div>
              <!-- /nested pie charts -->


              <!-- Nightingale roses width hidden labels -->
              <div class="panel panel-flat">
                <div class="panel-heading">
                  <h5 class="panel-title">Nightingale roses (hidden labels)</h5>
                  <div class="heading-elements">
                    <ul class="icons-list">
                              <li><a data-action="collapse"></a></li>
                              <li><a data-action="reload"></a></li>
                              <li><a data-action="close"></a></li>
                            </ul>
                          </div>
                </div>

                <div class="panel-body">
                  <div class="chart-container has-scroll">
                    <div class="chart has-fixed-height has-minimum-width" id="rose_diagram_hidden"></div>
                  </div>
                </div>
              </div>
              <!-- /nightingale roses width hidden labels -->


              <!-- Multi level donut -->
              <div class="panel panel-flat">
                <div class="panel-heading">
                  <h5 class="panel-title">Multi level donut chart</h5>
                  <div class="heading-elements">
                    <ul class="icons-list">
                              <li><a data-action="collapse"></a></li>
                              <li><a data-action="reload"></a></li>
                              <li><a data-action="close"></a></li>
                            </ul>
                          </div>
                </div>

                <div class="panel-body">
                  <div class="chart-container has-scroll">
                    <div class="chart has-fixed-height has-minimum-width" id="lasagna_donut"></div>
                  </div>
                </div>
              </div>
              <!-- /multi level donut -->

            </div>

            <div class="col-md-6">

              <!-- Basic donut chart -->
              <div class="panel panel-flat">
                <div class="panel-heading">
                  <h5 class="panel-title">Basic donut chart</h5>
                  <div class="heading-elements">
                    <ul class="icons-list">
                              <li><a data-action="collapse"></a></li>
                              <li><a data-action="reload"></a></li>
                              <li><a data-action="close"></a></li>
                            </ul>
                          </div>
                </div>

                <div class="panel-body">
                  <div class="chart-container has-scroll">
                    <div class="chart has-fixed-height has-minimum-width" id="basic_donut"></div>
                  </div>
                </div>
              </div>
              <!-- /basic donut chart -->


              <!-- Infographic style -->
              <div class="panel panel-flat">
                <div class="panel-heading">
                  <h5 class="panel-title">Infographic style</h5>
                  <div class="heading-elements">
                    <ul class="icons-list">
                              <li><a data-action="collapse"></a></li>
                              <li><a data-action="reload"></a></li>
                              <li><a data-action="close"></a></li>
                            </ul>
                          </div>
                </div>

                <div class="panel-body">
                  <div class="chart-container has-scroll">
                    <div class="chart has-fixed-height has-minimum-width" id="infographic_donut"></div>
                  </div>
                </div>
              </div>
              <!-- /infographic style -->


              <!-- Nightingale roses width visible labels -->
              <div class="panel panel-flat">
                <div class="panel-heading">
                  <h5 class="panel-title">Nightingale roses (visible labels)</h5>
                  <div class="heading-elements">
                    <ul class="icons-list">
                              <li><a data-action="collapse"></a></li>
                              <li><a data-action="reload"></a></li>
                              <li><a data-action="close"></a></li>
                            </ul>
                          </div>
                </div>

                <div class="panel-body">
                  <div class="chart-container has-scroll">
                    <div class="chart has-fixed-height has-minimum-width" id="rose_diagram_visible"></div>
                  </div>
                </div>
              </div>
              <!-- /nightingale roses width hidden labels -->


              <!-- Pie chart timeline -->
              <div class="panel panel-flat">
                <div class="panel-heading">
                  <h5 class="panel-title">Pie chart timeline</h5>
                  <div class="heading-elements">
                    <ul class="icons-list">
                              <li><a data-action="collapse"></a></li>
                              <li><a data-action="reload"></a></li>
                              <li><a data-action="close"></a></li>
                            </ul>
                          </div>
                </div>

                <div class="panel-body">
                  <div class="chart-container has-scroll">
                    <div class="chart has-fixed-height has-minimum-width" id="pie_timeline"></div>
                  </div>
                </div>
              </div>
              <!-- /pie chart timeline -->

            </div>
          </div>


          <!-- Multiple donut charts -->
          <div class="panel panel-flat">
            <div class="panel-heading">
              <h5 class="panel-title">Multiple donuts</h5>
              <div class="heading-elements">
                <ul class="icons-list">
                          <li><a data-action="collapse"></a></li>
                          <li><a data-action="reload"></a></li>
                          <li><a data-action="close"></a></li>
                        </ul>
                      </div>
            </div>

            <div class="panel-body">
              <div class="chart-container has-scroll">
                <div class="chart has-fixed-height has-minimum-width" id="multiple_donuts" style="height: 450px;"></div>
              </div>
            </div>
          </div>
          <!-- /multiple donut charts -->

          <!-- Basic column chart -->
          <div class="panel panel-flat">
            <div class="panel-heading">
              <h5 class="panel-title">Basic column chart</h5>
              <div class="heading-elements">
                <ul class="icons-list">
                          <li><a data-action="collapse"></a></li>
                          <li><a data-action="reload"></a></li>
                          <li><a data-action="close"></a></li>
                        </ul>
                      </div>
            </div>

            <div class="panel-body">
              <div class="chart-container">
                <div class="chart has-fixed-height" id="basic_columns"></div>
              </div>
            </div>
          </div>
          <!-- /basic column chart -->

          <!-- Columns timeline -->
          <div class="panel panel-flat">
            <div class="panel-heading">
              <h5 class="panel-title">Columns timeline</h5>
              <div class="heading-elements">
                <ul class="icons-list">
                          <li><a data-action="collapse"></a></li>
                          <li><a data-action="reload"></a></li>
                          <li><a data-action="close"></a></li>
                        </ul>
                      </div>
            </div>

            <div class="panel-body">
              <div class="chart-container">
                <div class="chart has-fixed-height" id="columns_timeline"></div>
              </div>
            </div>
          </div>
          <!-- /columns timeline -->

          <!-- Stacked bar chart -->
          <div class="panel panel-flat">
            <div class="panel-heading">
              <h5 class="panel-title">Stacked bar chart</h5>
              <div class="heading-elements">
                <ul class="icons-list">
                          <li><a data-action="collapse"></a></li>
                          <li><a data-action="reload"></a></li>
                          <li><a data-action="close"></a></li>
                        </ul>
                      </div>
            </div>

            <div class="panel-body">
              <div class="chart-container">
                <div class="chart has-fixed-height" id="stacked_bars"></div>
              </div>
            </div>
          </div>
          <!-- /stacked bar chart -->

          <!-- Tornado with negative stack -->
          <div class="panel panel-flat">
            <div class="panel-heading">
              <h5 class="panel-title">Negative stack tornado</h5>
              <div class="heading-elements">
                <ul class="icons-list">
                          <li><a data-action="collapse"></a></li>
                          <li><a data-action="reload"></a></li>
                          <li><a data-action="close"></a></li>
                        </ul>
                      </div>
            </div>

            <div class="panel-body">
              <div class="chart-container">
                <div class="chart has-fixed-height" id="tornado_bars_negative"></div>
              </div>
            </div>
          </div>
          <!-- /tornado with negative stack -->

          <!-- Combination and connection -->
          <div class="panel panel-flat">
            <div class="panel-heading">
              <h5 class="panel-title">Combination and connection</h5>
              <div class="heading-elements">
                <ul class="icons-list">
                          <li><a data-action="collapse"></a></li>
                          <li><a data-action="reload"></a></li>
                          <li><a data-action="close"></a></li>
                        </ul>
                      </div>
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

          <!-- Line and bar combination -->
          <div class="panel panel-flat">
            <div class="panel-heading">
              <h5 class="panel-title">Line and bar combination</h5>
              <div class="heading-elements">
                <ul class="icons-list">
                          <li><a data-action="collapse"></a></li>
                          <li><a data-action="reload"></a></li>
                          <li><a data-action="close"></a></li>
                        </ul>
                      </div>
            </div>

            <div class="panel-body">
              <div class="chart-container">
                <div class="chart has-fixed-height" id="line_bar"></div>
              </div>
            </div>
          </div>
          <!-- /line and bar combination -->

          <!-- 3D pie charts -->
          <div class="panel panel-flat">
            <div class="panel-heading">
              <h5 class="panel-title">3D pie charts</h5>
              <div class="heading-elements">
                <ul class="icons-list">
                          <li><a data-action="collapse"></a></li>
                          <li><a data-action="reload"></a></li>
                          <li><a data-action="close"></a></li>
                        </ul>
                      </div>
            </div>

            <div class="panel-body">
              <p class="content-group">A <code>3D pie</code> chart is used to give the chart a 3D look. Often used for aesthetic reasons, the third dimension does not improve the reading of the data; on the contrary, these plots are difficult to interpret because of the distorted effect of perspective associated with the third dimension. The use of superfluous dimensions not used to display the data of interest is discouraged for charts in general, not only for pie charts.</p>

              <div class="row">
                <div class="col-md-6">
                  <div class="chart-container text-center content-group">
                    <div class="display-inline-block" id="google-pie-3d"></div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="chart-container text-center content-group">
                    <div class="display-inline-block" id="google-3d-exploded"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /3D pie charts -->
=======
<<<<<<< Updated upstream
>>>>>>> Stashed changes
    <!-- <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <div class="row">
=======
    
    <!-- <div class="row">
>>>>>>> Stashed changes
      <div class="panel panel-body text-center">
        <div class="col-md-2">
          <h6 class="text-semibold no-margin-bottom mt-5">January Report</h6>
          <div class="text-size-small text-muted content-group-sm">+24% since 2016</div>
          <div class="svg-center" id="january1_report"></div>
          <div class="row text-center">
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">23,568</h5>
                <span class="text-muted text-size-small">Revenue</span>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">$9,464</h5>
                <span class="text-muted text-size-small">Tax</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <h6 class="text-semibold no-margin-bottom mt-5">Febuary Report</h6>
          <div class="text-size-small text-muted content-group-sm">+24% since 2016</div>
          <div class="svg-center"  id="febuary1_report"></div>
          <div class="row text-center">
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">23,568</h5>
                <span class="text-muted text-size-small">Revenue</span>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">$9,464</h5>
                <span class="text-muted text-size-small">Tax</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <h6 class="text-semibold no-margin-bottom mt-5">March Report</h6>
          <div class="text-size-small text-muted content-group-sm">+24% since 2016</div>
          <div class="svg-center"  id="march1_report"></div>
          <div class="row text-center">
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">23,568</h5>
                <span class="text-muted text-size-small">Revenue</span>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">$9,464</h5>
                <span class="text-muted text-size-small">Tax</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <h6 class="text-semibold no-margin-bottom mt-5">April Report</h6>
          <div class="text-size-small text-muted content-group-sm">+24% since 2016</div>
          <div class="svg-center"  id="april1_report"></div>
          <div class="row text-center">
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">23,568</h5>
                <span class="text-muted text-size-small">Revenue</span>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">$9,464</h5>
                <span class="text-muted text-size-small">Tax</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <h6 class="text-semibold no-margin-bottom mt-5">May Report</h6>
          <div class="text-size-small text-muted content-group-sm">+24% since 2016</div>
          <div class="svg-center"  id="may1_report"></div>
          <div class="row text-center">
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">23,568</h5>
                <span class="text-muted text-size-small">Revenue</span>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">$9,464</h5>
                <span class="text-muted text-size-small">Tax</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <h6 class="text-semibold no-margin-bottom mt-5">June Report</h6>
          <div class="text-size-small text-muted content-group-sm">+24% since 2016</div>
          <div class="svg-center"  id="june1_report"></div>
          <div class="row text-center">
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">23,568</h5>
                <span class="text-muted text-size-small">Revenue</span>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">$9,464</h5>
                <span class="text-muted text-size-small">Tax</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <h6 class="text-semibold no-margin-bottom mt-5">July Report</h6>
          <div class="text-size-small text-muted content-group-sm">+24% since 2016</div>
          <div class="svg-center"  id="july1_report"></div>
          <div class="row text-center">
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">23,568</h5>
                <span class="text-muted text-size-small">Revenue</span>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">$9,464</h5>
                <span class="text-muted text-size-small">Tax</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <h6 class="text-semibold no-margin-bottom mt-5">August Report</h6>
          <div class="text-size-small text-muted content-group-sm">+24% since 2016</div>
          <div class="svg-center"  id="august1_report"></div>
          <div class="row text-center">
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">23,568</h5>
                <span class="text-muted text-size-small">Revenue</span>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">$9,464</h5>
                <span class="text-muted text-size-small">Tax</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <h6 class="text-semibold no-margin-bottom mt-5">September Report</h6>
          <div class="text-size-small text-muted content-group-sm">+24% since 2016</div>
          <div class="svg-center"  id="september1_report"></div>
          <div class="row text-center">
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">23,568</h5>
                <span class="text-muted text-size-small">Revenue</span>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">$9,464</h5>
                <span class="text-muted text-size-small">Tax</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <h6 class="text-semibold no-margin-bottom mt-5">October Report</h6>
          <div class="text-size-small text-muted content-group-sm">+24% since 2016</div>
          <div class="svg-center"  id="october1_report"></div>
          <div class="row text-center">
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">23,568</h5>
                <span class="text-muted text-size-small">Revenue</span>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">$9,464</h5>
                <span class="text-muted text-size-small">Tax</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <h6 class="text-semibold no-margin-bottom mt-5">November Report</h6>
          <div class="text-size-small text-muted content-group-sm">+24% since 2016</div>
          <div class="svg-center"  id="november1_report"></div>
          <div class="row text-center">
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">23,568</h5>
                <span class="text-muted text-size-small">Revenue</span>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">$9,464</h5>
                <span class="text-muted text-size-small">Tax</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <h6 class="text-semibold no-margin-bottom mt-5">December Report</h6>
          <div class="text-size-small text-muted content-group-sm">+24% since 2016</div>
          <div class="svg-center"  id="december1_report"></div>
          <div class="row text-center">
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">23,568</h5>
                <span class="text-muted text-size-small">Revenue</span>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="mt-20">
                <h5 class="text-semibold no-margin">$9,464</h5>
                <span class="text-muted text-size-small">Tax</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->

      <!-- <div class="col-md-12">
        <div class="panel panel-body col-xs-9">
          <div class="row text-center">
            <div class="col-xs-2">
              <p><i class="icon-hour-glass3 icon-2x display-inline-block text-info"></i></p>
              <h5 class="text-semibold no-margin"><?=number_format($pending_orders)?></h5>
              <span class="text-muted text-size-small">Pending Orders</span>
            </div>
            <div class="col-xs-2">
              <p><i class="icon-hour-glass2 icon-2x display-inline-block text-info"></i></p>
              <h5 class="text-semibold no-margin"><?=number_format($pending_orders)?></h5>
              <span class="text-muted text-size-small">Processing Orders</span>
            </div>
            <div class="col-xs-2">
              <p><i class="icon-watch2 icon-2x display-inline-block text-danger"></i></p>
              <h5 class="text-semibold no-margin"><?=number_format($pending_orders)?></h5>
              <span class="text-muted text-size-small">Overdue Orders</span>
            </div>
            <div class="col-xs-2">
              <p><i class="icon-truck icon-2x display-inline-block text-danger"></i></p>
              <h5 class="text-semibold no-margin"><?=number_format($pending_orders)?></h5>
              <span class="text-muted text-size-small">Overdue Dispatch</span>
            </div>
            <div class="col-xs-2">
              <p><i class="icon-cart5 icon-2x display-inline-block text-success"></i></p>
              <h5 class="text-semibold no-margin"><?=number_format($month_orders)?></h5>
              <span class="text-muted text-size-small">Successful Orders</span>
            </div>
            <div class="col-xs-2">
              <p><i class="icon-cash2 icon-2x display-inline-block text-success"></i></p>
              <h5 class="text-semibold no-margin">GHC 9,693</h5>
              <span class="text-muted text-size-small">Daily Sales</span>
            </div>
          </div>
        </div>
        <div class="panel panel-body col-xs-3">
          <div class="row text-center">
            <div class="col-xs-6">
              <p><i class="icon-users2 icon-2x display-inline-block text-info"></i></p>
              <h5 class="text-semibold no-margin"><?=number_format($total_users)?></h5>
              <span class="text-muted text-size-small">users</span>
            </div>
            <div class="col-xs-6">
              <p><i class="icon-users4 icon-2x display-inline-block text-warning"></i></p>
              <h5 class="text-semibold no-margin"><?=number_format($total_customers)?></h5>
              <span class="text-muted text-size-small">Customers</span>
            </div>
          </div>
        </div>   
      </div> -->
  </div>
  <!-- /main charts -->

  <!-- Including Page Settings -->
  <?php include("page_settings.php"); ?>
  <!-- Including Page Settings -->      
      