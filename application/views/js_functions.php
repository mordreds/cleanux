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

    <?php if(!empty($_SESSION['warning'])) : ?>
      $.jGrowl('<?= $this->session->flashdata("warning") ?>', {
        theme: 'alert-styled-left bg-danger'
      });
    <?php endif; ?>
  /************ Notifications ***************/
 </script>