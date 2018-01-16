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
    <!-- <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <div class="row">
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
    </div>

      <div class="col-md-12">
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
      