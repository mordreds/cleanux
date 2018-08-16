  <!-- Content area -->
        <div class="content">

          <!-- Timeline -->
          <div class="timeline timeline-right">
            <div class="timeline-container">

              <!-- Blog post -->
              <div class="timeline-row">
                <div class="timeline-icon">
                  <img src="assets/images/demo/users/face12.jpg" alt="">
                </div>

                <div class="row">
                  <?php 
                    if(!empty($timeline)) :  
                      $counter = 1; 
                      foreach($timeline as $record_timeline) : 
                  ?>
                  <div class="col-md-3" style="width:350px;">
                    <div class="panel panel-flat timeline-content">
                      <div class="panel-heading">
                        <h6 class="panel-title"><?=$record_timeline->client_fullname?></h6>
                        <div class="heading-elements">
                          <span class="heading-text"><i class="icon-checkmark-circle position-left text-success"></i> 3 hours ago</span>
                        </div>
                      </div>

                      <div class="panel-body">
                        <div class="row" style="padding:2px;">
                          <div class="col-sm-6 content-group">
                            <h5 class="text-uppercase text-semibold"><?=$_SESSION['companyinfo']['name']?></h5>
                          </div>
                          <div class="col-sm-6 content-group">
                            <div class="invoice-details">
                              <ul class="list-condensed list-unstyled">
                                <li>Order: <span class="text-semibold" id="receipt_orderno_<?=$counter?>"></span></li>
                                <li>Date: <span class="text-semibold" id="receipt_date_<?=$counter?>"></span></li>
                                <li>Due Date: <span class="text-semibold" id="receipt_duedate_<?=$counter?>"></span></li>
                              </ul>
                            </div>
                          </div>
                          <div class="modal-body no-padding">
                            <table class="table table-xxs" id="receipt_table_<?=$counter?>">
                              <thead>
                                <tr>
                                  <th>Description</th>
                                  <th style="width: 15px !important; text-align: center; padding: 0px">Code</th>
                                  <th style="width: 15px !important; text-align: center; padding: 0px">Qty</th>
                                  <th style="width: 15px !important; text-align: center; padding: 0px">Unit</th>
                                  <th style="width: 15px !important; text-align: center; padding: 0px">Total</th>
                                </tr>
                              </thead>
                              <tbody style="font-style: italic;"></tbody>
                            </table>
                          </div>
                          <div class="col-xs-5">
                            <span class="text-muted">Invoice To:</span>
                            <ul class="list-condensed list-unstyled">
                              <li><span class="text-semibold" id="receipt_client_<?=$counter?>"></span></li>
                              <li>(<span class="text-semibold" id="receipt_delivery_location_<?=$counter?>"></span>)</li>
                            </ul>
                            <span class="text-muted">Amount Paid:</span>
                            <ul class="list-condensed list-unstyled">
                              <li class="text-semibold" id="receipt_amt_paid_<?=$counter?>"></li>
                            </ul>
                            <span class="text-muted">Balance:</span>
                            <ul class="list-condensed list-unstyled">
                              <li class="text-semibold" id="receipt_balance_<?=$counter?>"></li>
                            </ul>
                          </div>
                          <div class="col-xs-7">
                            <span class="text-muted">Total Due:</span>
                            <div class="content-group">
                              <h6></h6>
                              <div class="table-responsive no-border">
                                <table class="table table-xxs">
                                  <tbody>
                                    <tr>
                                      <th>Subtotal:</th>
                                      <td class="text-right" id="receipt_subtotal_<?=$counter?>"></td>
                                    </tr>
                                    <tr>
                                      <th>VAT <span class="text-regular" id="receipt_tax_<?=$counter?>"></span>:</th>
                                      <td class="text-right" id="receipt_tax_value_<?=$counter?>"></td>
                                    </tr>
                                    <tr>
                                      <th>Delivery:</th>
                                      <td class="text-right" id="receipt_delivery_cost_<?=$counter?>"></td>
                                    </tr>
                                    <tr>
                                      <th>Total (GH¢):</th>
                                      <td class="text-right text-primary"><h5 class="text-semibold" id="receipt_total_cost_<?=$counter?>"></h5></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                          -------------------------------------------------------------------------
                            <p><strong>NB :</strong><em> Management shall only bear <strong> 30% </strong> cost of clothes and items missing, damaged or stolen. Also we are not responsible for items missing or damaged after 3 months.</em></p>
                            <p><strong>Customer Care: +233541786220</strong></p>
                        </div>

                      </div>
                    </div>
                  </div>
                  <script type="text/javascript">
                    order_id = <?=$record_timeline->id?>;
                    $.ajax({
                      type : 'POST',
                      url : '<?= base_url()?>overview/search_order_details_by_orderno/'+order_id+'/search',
                      //data : order_id,
                      success: function(response) {
                        response = JSON.parse(response);
                        $('#receipt_orderno_<?=$counter?>').text('Order #'+response[0].order_number);
                        $('#receipt_date_<?=$counter?>').text(response[0].date_created);
                        $('#receipt_duedate_<?=$counter?>').text(response[0].due_date);
                        $('#receipt_subtotal_<?=$counter?>').text(response[0].subtotal);
                        $('#receipt_amt_paid_<?=$counter?>').text(response[0].amount_paid);
                        $('#receipt_balance_<?=$counter?>').text(response[0].balance);
                        $('#receipt_total_cost_<?=$counter?>').text(response[0].total_cost);
                        $('#receipt_tax_<?=$counter?>').text('('+response[0].tax+'%)');
                        $('#receipt_tax_value_<?=$counter?>').text(response[0].tax_value);
                        $('#receipt_client_<?=$counter?>').text(response[0].client);
                        $('#receipt_delivery_location_<?=$counter?>').text(response[0].delivery_location);
                        $('#receipt_delivery_cost_<?=$counter?>').text(response[0].delivery_cost);
                        $('#print_receipt_<?=$counter?>').attr('data-order',order_id);

                        $('#receipt_table_<?=$counter?>').DataTable().destroy();
                        $('#receipt_table_<?=$counter?>').DataTable({
                          searching: false,
                          responsive: false,
                          paging: false,
                          order: [],
                          autoWidth: false,
                          bInfo: false,
                          data: response,
                          columnDefs: [
                              { "width": "5%", "targets": 0 }
                            ],
                          columns: [
                            {data: "description"},
                            {data: "service_code"},
                            {data: "quantity"},
                            {data: "unit_price"},
                            {data: "total_sums"},
                          ],
                          aoColumnDefs: [
                            { "bSortable": false, "aTargets": [ "_all" ] }
                          ]
                        });
                      },
                      error: function() {
                        $.jGrowl('User Deletion Failed', {
                          theme: 'alert-styled-left bg-danger'
                        });
                      }
                    });
                  </script>
                  <?php $counter++; endforeach; endif; ?>
                </div>
              </div>
              <!-- /blog post -->
            </div>
          </div>
          <!-- /timeline -->
        </div>
        <!-- /content area -->
  <!-- /main charts -->   

  <!-- Including Page Settings -->
  <?php include("page_settings.php"); ?>
  <!-- Including Page Settings -->      
           