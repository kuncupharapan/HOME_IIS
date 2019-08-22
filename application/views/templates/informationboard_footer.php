<footer class="footer">
    <div class="d-flex justify-content-center p-2">
        <span class="svgfooterbg text-t1greenmed">Tim Pengembang SI-TI PTIPK &copy; 2018-2019</span>
    </div>
</footer>
</body>
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery-3.3.1.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo base_url() ?>js/jquery-3.3.1.min.js"><\/script>')</script>
<script type="text/javascript" src="<?php echo base_url() ?>bootstrap/js/bootstrap.bundle.js"></script>
<script type="text/javascrip" src="<?php echo base_url() ?>js/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo base_url() ?>js/pg-calendar/dist/js/pignose.calendar.min.js"></script>
<script type="text/javascript">
  $("#infoboardsidemenu").append("<div class=\"p-2 sidemenu active\" id=\"agenda\><a href=\"#\"><i class=\"far fa-calendar-alt fa-fw\"></i></a></div>");
  $("#infoboardsidemenu").append("<div class=\"p-2 sidemenu \" id=\"agenda\><a href=\"#\"><i class=\"fas fa-bullhorn fa-fw\"></i></a></div>");
  $("#infoboardsidemenu").append("<div class=\"p-2 sidemenu\" id=\"agenda\><a href=\"#\"><i class=\"far fa-newspaper fa-fw\"></i></a></div>");
  $("div.sidemenu").on("mouseover", function(){
      if($(this).hasClass("active")){
          $(this).css({"background-color":"#FF8C6E"})
      } else {
          $(this).css({"background-color":"#FF8C6E"})
          if($(this).hasClass("mouseleave")){
              $(this).removeClass("mouseleave")
          }
          $(this).addClass("mouseover");
      }
  }).on("mouseleave", function(){
      if($(this).hasClass("active")){
          $(this).css({"background-color":"#F34213"})
      } else {
          $(this).css({"background-color":"#F34213"})
          $(this).removeClass("mouseover");
          $(this).addClass("mouseleave");
      }
      
  }).on("click", function(){
      $("div.sidemenu").removeClass("active mouseover");
      $(this).addClass("active");
  })
</script>
</html>