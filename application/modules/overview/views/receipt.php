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
 <body>
    <div class="content">
      <div class="row" style="max-width: 325px">
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
                    <th>Description</th>
                    <th style="width: 15px !important; text-align: center; padding: 0px">Qty</th>
                    <th style="width: 15px !important; text-align: center; padding: 0px">Unit</th>
                    <th style="width: 15px !important; text-align: center; padding: 0px">Total</th>
                  </tr>
                </thead>
                <tbody style="font-style: italic;"></tbody>
              </table>
              <hr/>
              <div class="col-xs-5">
                <span class="text-muted">Invoice To:</span>
                <ul class="list-condensed list-unstyled">
                  <li><span class="text-semibold" id="receipt_client"></span></li>
                </ul>
                <span class="text-muted">Delivery Method:</span>
                <ul class="list-condensed list-unstyled">
                  <li class="text-semibold" id="receipt_delivery_method"></li>
                </ul>
                <span class="text-muted">Balance:</span>
                <ul class="list-condensed list-unstyled">
                  <li class="text-semibold" id="receipt_balance"></li>
                </ul>
              </div>
              <div class="col-xs-7">
                <span class="text-muted">Total Due:</span>
                <div class="content-group">
                  <div class="table-responsive no-border">
                    <table class="table table-xxs" style="position: absolute;">
                      <tbody>
                        <tr>
                          <th>Subtotal:</th>
                          <td class="text-right" id="receipt_subtotal"></td>
                        </tr>
                        <tr>
                          <th>Tax<span class="text-regular" id="receipt_tax"></span>:</th>
                          <td class="text-right" id="receipt_tax_value"></td>
                        </tr>
                        <tr>
                          <th>Delivery:</th>
                          <td class="text-right" id="receipt_delivery_cost"></td>
                        </tr>
                        <tr>
                          <th>Total(GH¢):</th>
                          <td class="text-right text-primary"><h5 class="text-semibold" id="receipt_total_cost"></h5></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
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
            $('#receipt_balance').text(response[0].balance);
            $('#receipt_total_cost').text(response[0].total_cost);
            $('#receipt_tax').text('('+response[0].tax+'%)');
            $('#receipt_tax_value').text(response[0].tax_value);
            $('#receipt_client').text(response[0].client);
            $('#receipt_delivery_method').text(response[0].delivery_method);
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
