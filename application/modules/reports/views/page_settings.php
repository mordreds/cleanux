<?php if(isset($_SESSION['user']['roles'])) : ?>

<script type="text/javascript">
  /************** Default Settings **************/
    $.extend($.fn.dataTable.defaults, {
        autoWidth: false,
        dom: '<"datatable-header"fBl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
        language: {
            search: '<span>Filter:</span> _INPUT_',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
        },
        buttons: [],
    });
  /************** Default Settings **************/
  /********** Displaying Services ******/
    $(document).ready(function() {
      selectbox_initialize('.display_services','services');

      $(".display_customers").selectBoxIt({
        autoWidth: false,
        defaultText: "Select One",
        populate: function(){
          var deferred = $.Deferred(), arr = [], x = -1;
          $.ajax({
          url: '<?= base_url()?>settings/retrieve_alldata/clients/default'}).done(function(data) {
            data = JSON.parse(data);
            while(++x < data.length){
              arr[x] = { value : data[x].id, text : data[x].fullname };
            }
            deferred.resolve(arr);
          });
          return deferred;
        }
      });

      $('#search').click(function(){
        /**** Variable Declaration ******/
        let formurl = "<?=base_url()?>reports/fetch_order";
        let order_type = $('#order_type option:selected').val();
        let customer  = $('#customer option:selected').val();
        
        if(order_type == "No Selection" && customer == "No Selection") {
          $.jGrowl("No Selection Made", {
            theme: 'alert-styled-left bg-danger'
          });
          return;
        }
        let formdata = {
          'order_type' : order_type,
          'customer' : customer,
          'daterange' : $('#daterange').val(),
        };
        /**** Variable Declaration ******/
        /**** Fetch Data Ajax Call ******/
        $('#record_tbl').DataTable().destroy();
        $('#record_tbl').DataTable({
          /*searching: false,*/
          /*paging: false,*/
          buttons: {
            buttons: [
              {
                extend: 'copyHtml5',
                className: 'btn bg-teal-400',
                text: '<i class="icon-copy3 position-left" title="Copy"></i> COPY'
              },
              {
                  extend: 'csvHtml5',
                  className: 'btn bg-teal-400',
                  text: '<i class="icon-file-spreadsheet position-left"></i> CSV',
                  fieldSeparator: '\t',
                  extension: '.csv'
              },
              {
                extend: 'pdfHtml5',
                className: 'btn bg-teal-400',
                  text: '<i class="icon-file-pdf position-left"></i> PDF',
              },
              {
                extend: 'print',
                className: 'btn bg-teal-400',
                text: '<i class="icon-printer position-left" title="Print All"></i> ALL'
              },
              {
                extend: 'print',
                className: 'btn bg-teal-400',
                text: '<i class="icon-three-bars position-left" title="Print Selected"></i> SELECTED',
                exportOptions: {
                  modifier: {
                      selected: true
                  }
                }
              }
            ],
          },
          select: true,
          order: [],
          autoWidth: false,
          ajax: {
            type : 'POST',
            url : formurl,
            data : formdata,
            dataSrc: "",
            error: function() {
              $.jGrowl("Retrieving Report Failed", {
                theme: 'alert-styled-left bg-danger'
              });
            }
          },
          columns: [
            {data: "client_fullname",render: function(data,type,row,meta) { 
              return "<a href='#' class='view_client_info' data-client_id='"+row.client_id+"'>"+row.client_fullname+"</a>"; 
            }},
            {data: "order_number",render: function(data,type,row,meta) { 
              return "<a href='#' data-action='reload' class='view_order_details' data-order_id='"+row.id+"'>"+row.order_number+"</a>"; 
            }},
            {data: "balance"},
            {data: "due_date"},
            {data: "delivery_method"},
            {data: "delivery_location"},
            {render: function(data,type,row,meta) { 
              if(row.status == "Pending")
                label_color = "label-default";
              else if(row.status == "Processing")
                label_color = "label-primary";
              else if(row.status == "Dispatched")
                label_color = "label-success";
              else if(row.status == "Completed")
                label_color = "label-success";
              else if(row.status == "Cancelled")
                label_color = "label-danger";
              else
                label_color = "label-default";
              return "<span class='label "+label_color+"'>"+row.status+"</span>"; 
            }},
          ],
        });
        /**** Fetch Data Ajax Call ******/
        $('#search_result').attr('style',"display:block");
      });
    });
  /********** Displaying Services ******/


  $('.dataTables_filter input[type=search]').attr('placeholder','Type to filter...');
</script>
<?php endif; ?>
  
