<script type="text/javascript">
	/************ Page Loading Gif ************/
    $(window).load(function() {
      $(".pageloader").fadeOut("slow");
    });
  /************ Page Loading Gif ************/

  /************ Panel Tabs Retain ************/
  	$(document).ready(function() {
      if(location.hash) {
        $('a[href=' + location.hash + ']').tab('show');
      }
      $(document.body).on("click", "a[data-toggle]", function(event) {
          location.hash = this.getAttribute("href");
      });
    });
    $(window).on('popstate', function() {
      var anchor = location.hash || $("a[data-toggle=tab]").first().attr("href");
      $('a[href=' + anchor + ']').tab('show');
    });
  /************ Panel Tabs Retain ************/

  /************ Notifications ***************/
    function notification(type,message){
      if(type == "success")
        var theme = "alert-styled-left bg-success";
      else if(type == "failed")
        var theme = "alert-styled-left bg-danger"
      else if(type == "warning")
        var theme = "alert-styled-left bg-warning"
      
      $.jGrowl(message, {
        theme: theme
      });
    }

    <?php if(!empty($_SESSION['success'])) : ?>
      $.jGrowl('<?= $this->session->flashdata("success") ?>', {
        theme: 'alert-styled-left bg-success'
      });
    <?php endif; ?>

    <?php if(!empty($_SESSION['error'])) : ?>
      $.jGrowl('<?= $this->session->flashdata("error") ?>', {
        theme: 'alert-styled-left bg-danger'
      });
    <?php endif; ?>

    <?php if(!empty($_SESSION['validation_error'])) : ?>
      $.jGrowl('<?= $this->session->flashdata("validation_error") ?>', {
        theme: 'alert-styled-left bg-danger'
      });
    <?php endif; ?>

    <?php if(!empty($_SESSION['warning'])) : ?>
      $.jGrowl('<?= $this->session->flashdata("warning") ?>', {
        theme: 'alert-styled-left bg-warning'
      });
    <?php endif; ?>

    <?php if(!empty($_SESSION['info'])) : ?>
      $.jGrowl('<?= $this->session->flashdata("info") ?>', {
        theme: 'alert-styled-left bg-info'
      });
    <?php endif; ?>
  /************ Notifications ***************/

  /************ Ajax Post Function  *********/
    function ajax_post(formurl,formData,tableid="null"){
      $.ajax({
        type : 'POST',
        url : formurl,
        data : formData,
        success: function(response) { 
          //console.log(response); exit();
          response = JSON.parse(response)
          
          if(response.success)
          {
            $.jGrowl(response.success, {
              theme: 'alert-styled-left bg-success'
            });
          }
          else if(response.error)
          {
            $.jGrowl(response.error, {
              theme: 'alert-styled-left bg-danger'
            });
          }

          if(tableid != "null")
            $('#'+tableid).DataTable().ajax.reload();
        },
        error: function() {
          $.jGrowl('An Error Occured.<br/>Please Contact Admin', {
            theme: 'alert-styled-left bg-danger'
          });
        }
      });
    } 
  /************ Ajax Post Function  *********/

  /************ SelectBoxIt Plugin  *********/
    function selectbox_initialize(doc_element,tablename,default_select="default"){
      $(doc_element).selectBoxIt({
        autoWidth: false,
        //defaultText: "Select One",
        populate: function(){
          var deferred = $.Deferred(), arr = [], x = -1;
          $.ajax({
          url: '<?= base_url()?>settings/retrieve_alldata/'+tablename+"/"+default_select}).done(function(data) {
            data = JSON.parse(data);

            while(++x < data.length){
              if(data[x].id == default_select)
                arr[x] = { value : data[x].id, text : data[x].name, selected: "selected" };
              else
              arr[x] = { value : data[x].id, text : data[x].name };
            }
            deferred.resolve(arr);
          });
          return deferred;
        }
      });
    }
  /************ SelectBoxIt Plugin  *********/

  /************ SelectBoxIt Plugin  *********/
    function selectbox_pricelist(doc_element,default_select="null"){
      let tablename = "vw_prices";
      $(doc_element).selectBoxIt({
        autoWidth: false,
        defaultText: "Select One",
        populate: function(){
          var deferred = $.Deferred(), arr = [], x = -1;
          $.ajax({
          url: '<?= base_url()?>settings/retrieve_alldata/'+tablename+'/default'}).done(function(data) {
            data = JSON.parse(data);

            while(++x < data.length){
              if(data[x].id == default_select)
                arr[x] = { value : data[x].id, text : data[x].name, selected: "selected" };
              else
              arr[x] = { value : data[x].id, text : data[x].name };
            }
            deferred.resolve(arr);
          });
          return deferred;
        }
      });
    }
  /************ SelectBoxIt Plugin  *********/

  /************ Number Formatting  *********/
    function number_format(num) {
      num += '';
      x = num.split('.');
      x1 = x[0];
      x2 = x.length > 1 ? '.' + x[1] : '';
      var rgx = /(\d+)(\d{3})/;
      while(rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
      }
      return x1 + x2;
    }
  /************ Number Formatting  *********/

  /************ Swtichery Plugin  *********
    function setSwitchery(switchElement,checkedBool) {
      if((checkedBool && !switchElement.ischecked()) || (!checkedBool && switchElement.isChecked())) {
        switchElement.setPosition(true);
        switchElement.handleonChange(true);
      }
    }
  /************ Swtichery Plugin  *********/

  /************************ All Ajax Functions  ******************/
    /******** Retrieve All Data  **********/
      function retrieveData_ajax(formurl,formData,method="POST"){
        $.ajax({
          type : method,
          url : formurl,
          data :formData,
          success: function(response) { 
            response = JSON.parse(response)
            return response;
          },
          error: function() {
            $.jGrowl('An Error Occured.<br/>Please Contact Admin', {
              theme: 'alert-styled-left bg-danger'
            });
          }
        });
      }
    /******** Retrieve All Data  **********/
  /************************ All Ajax Functions  ******************/

  /********* Toggle FullScreen ****************/
    function toggleFullScreen(elem) {
        // ## The below if statement seems to work better ## if ((document.fullScreenElement && document.fullScreenElement !== null) || (document.msfullscreenElement && document.msfullscreenElement !== null) || (!document.mozFullScreen && !document.webkitIsFullScreen)) {
        if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
            if (elem.requestFullScreen) {
                elem.requestFullScreen();
            } else if (elem.mozRequestFullScreen) {
                elem.mozRequestFullScreen();
            } else if (elem.webkitRequestFullScreen) {
                elem.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
            } else if (elem.msRequestFullscreen) {
                elem.msRequestFullscreen();
            }
        } else {
            if (document.cancelFullScreen) {
                document.cancelFullScreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitCancelFullScreen) {
                document.webkitCancelFullScreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            }
        }
      
      document.addEventListener('keydown', function(e) {
      if (e.keyCode == 0 ) { // F11 key
        toggleFullScreen();
      }
    }, false);

    }
  /********* Toggle FullScreen ****************/

      
 </script>