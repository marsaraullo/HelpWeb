  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
  <div id="jobmonitor"></div>

</section>

</div>

<!-- Morris.js charts -->
<script src="<?php echo base_url(); ?>resources/js/raphael/raphael.min.js"></script>
<script src="<?php echo base_url(); ?>resources/js/morris.js/morris.min.js"></script>

<script>
function refresh_jobmonitor(){
  $("#jobmonitor").load('<?php echo site_url();?>/help/get_jobsmonitor');
  setTimeout(refresh_jobmonitor, 5000);
}     

$(document).ready(function(){
  refresh_jobmonitor();
});


</script>