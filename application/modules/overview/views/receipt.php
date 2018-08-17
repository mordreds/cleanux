 <!DOCTYPE html>
 <html>
 <head>
   <title>Receipt</title>
   <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>resources/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>resources/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>resources/css/core.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>resources/css/components.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>resources/css/colors.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>resources/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>resources/css/extras/animate.min.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->
  <script type="text/javascript" src="<?=base_url()?>resources/js/core/libraries/jquery.min.js"></script>
  <script type="text/javascript" src="<?=base_url()?>resources/js/plugins/tables/datatables/datatables.min.js"></script>

 </head>
 <body style="font-size: 9px">
    <div class="content">
      <div class="row" style="max-width: 218px">
        <div class="col-xs-12">
          <div class="panel panel-flat">
            <div class="panel-body" style="padding: 5px;">
              <div class="col-xs-6 content-group">
                <h6 class="text-uppercase text-semibold"><?=$_SESSION['companyinfo']['name']?></h6>
              </div>
              <div class="col-xs-6 content-group">
                <div class="invoice-details">
                  <ul class="list-condensed list-unstyled">
                    <li style="text-align: right;"><span class="text-semibold" id="receipt_orderno"></span></li>
                    <li style="text-align: right;">Date: <span class="text-semibold" id="receipt_date"></span></li>
                    <li style="text-align: right;">Due Date: <span class="text-semibold" id="receipt_duedate"></span></li>
                  </ul>
                </div>
              </div>
              <table class="table table-xxs" id="receipt_table">
                <thead>
                  <tr>
                    <th>Item</th>
                    <th style="width: 10px !important; text-align: center; padding: 0px">Code</th>
                    <th style="width: 10px !important; text-align: center; padding: 0px">Qty</th>
                    <th style="width: 10px !important; text-align: center; padding: 0px">Unit</th>
                    <th style="width: 10px !important; text-align: center; padding: 0px">Total</th>
                  </tr>
                </thead>
                <tbody style="font-style: italic;"></tbody>
              </table>
              <hr/>
              <div class="col-xs-5">
                <span class="text-muted">Invoice To:</span>
                <ul class="list-condensed list-unstyled">
                  <li><span class="text-semibold" id="receipt_client"></span></li>
                  <li>(<span class="text-semibold" id="receipt_delivery_location"></span>)</li>
                </ul>
                <span class="text-muted">Amount Paid:</span>
                <ul class="list-condensed list-unstyled">
                  <li class="text-semibold" id="receipt_amt_paid"></li>
                </ul>
                <span class="text-muted">Balance:</span>
                <ul class="list-condensed list-unstyled">
                  <li class="text-semibold" id="receipt_balance"></li>
                </ul>
              </div>
              <div class="col-xs-7">
                <div class="content-group">
                  <div class="table-responsive no-border">
                    <table class="table table-xxs" style="table-layout: fixed; width: 150px;">
                      <tbody>
                        <tr>
                          <th>Subtotal:</th>
                          <td id="receipt_subtotal"></td>
                        </tr>
                        <tr>
                          <th>VAT<span class="text-regular" id="receipt_tax"></span>:</th>
                          <td id="receipt_tax_value"></td>
                        </tr>
                        <tr>
                          <th>Delivery:</th>
                          <td id="receipt_delivery_cost"></td>
                        </tr>
                        <tr>
                          <th>Total:</th>
                          <td class="text-center text-primary"><h5 class="" id="receipt_total_cost"></h5></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              -------------------------------------------------------------------------------------
              <p><strong>NB :</strong><em> Management shall only bear <strong> 30% </strong> cost of items missing, damaged or stolen. Also we are not responsible for items missing or damaged after 3 months.</em></p>
              <p><strong>Customer Care: +233541786220</strong></p>
            </div>
          </div>
        </div><!-- /. box -->
      </div><!-- /.col -->
    </div>

    <script type="text/javascript">
      $(document).ready(function(){
        let order_id = "<?php echo $order; ?>";
        $.ajax({
          type : 'POST',
          url : '<?= base_url()?>overview/search_order_details_by_orderno/'+order_id+'/search',
          success: function(response) {
            response = JSON.parse(response);
            $('#receipt_orderno').text('Order #'+response[0].order_number);
            $('#receipt_date').text(response[0].date_created);
            $('#receipt_duedate').text(response[0].due_date);
            $('#receipt_subtotal').text(response[0].subtotal);
            $('#receipt_amt_paid').text(response[0].amount_paid);
            $('#receipt_balance').text(response[0].balance);
            $('#receipt_total_cost').text(response[0].total_cost);
            $('#receipt_tax').text('('+response[0].tax+'%)');
            $('#receipt_tax_value').text(response[0].tax_value);
            $('#receipt_client').text(response[0].client);
            $('#receipt_delivery_location').text(response[0].delivery_location);
            $('#receipt_delivery_cost').text(response[0].delivery_cost);

            $('#receipt_table').DataTable().destroy();
            $('#receipt_table').DataTable({
              searching: false,
              paging: false,
              order: [],
              autoWidth: false,
              bInfo: false,
              data: response,
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
            window.print();
            window.close(500);
          },
          error: function() {
            $.jGrowl('User Deletion Failed', {
              theme: 'alert-styled-left bg-danger'
            });
          }
        });
      });
    </script>
 </body>
 </html>
