
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; <?php echo date("Y"); ?> <a href="#" target="_blank">Help!</a></strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->



<script>
function load_unseen_notification(view = ''){
  $.ajax({
    url:"<?php echo site_url() ?>/notifications_users/get_all_notifications",
    method:"POST",
    data:{view:view},
    dataType:"json",
    success:function(data){
      $('.menu').html(data.notification);
      if(data.unseen_notification > 0){
        $('.notification_count').html(data.unseen_notification);
      }else{
        $('.notification_count').html("");
      }
    }
  });
  setTimeout(load_unseen_notification, 5000);
}



$(document).ready(function(){
  load_unseen_notification();  

$(document).on('click', '.notifications', function(){
  $('.notification_count').html("");
  load_unseen_notification('yes');
  });

});
</script>

<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>resources/js/jquery-ui/jquery-ui.min.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>resources/js/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>resources/js/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<!-- FastClick -->
<script src="<?php echo base_url(); ?>resources/js/fastclick/lib/fastclick.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>resources/dist/js/adminlte.min.js"></script>
</body>
</html>