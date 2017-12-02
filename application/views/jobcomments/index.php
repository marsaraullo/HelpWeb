  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Job Comments
    </h1>
    <ol class="breadcrumb">
      <li class="active">Job Comments</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">

        <div class="col-lg-12 col-xs-12">
            <div id="devices-chart"></div>
        </div>

        <div class="col-lg-12 col-xs-12">
            <div id="analytics-chart"></div>
        </div>
      <!-- ./col -->
    </div>      
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Morris.js charts -->
<script src="<?php echo base_url(); ?>resources/js/raphael/raphael.min.js"></script>
<script src="<?php echo base_url(); ?>resources/js/morris.js/morris.min.js"></script>


<script>

function refresh_devices(){
$("#devices-chart").load('<?php echo site_url(); ?>/meshtv/dashboard_devices');
//console.clear();
setTimeout(refresh_devices, 5000);
} 

function refresh_analytics(){
$("#analytics-chart").load('<?php echo site_url(); ?>/meshtv/dashboard_analytics');
//console.clear();
setTimeout(refresh_analytics, 5000);
}   

$(document).ready(function(){
refresh_devices();
refresh_analytics();

});    

</script>
