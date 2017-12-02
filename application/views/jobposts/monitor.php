
<section class="content">

<div class="box">
  <div class="box-header with-border">
  <h3 class="box-title">Jobs Statistics</h3>
  </div>
  <div class="box-body">
      <div class="row">

        <div class="col-md-6">
           <p class="text-center">
              <i class="fa fa-square text-green"></i> Open
              <i class="fa fa-square text-red"></i> Closed
            </p>
          <div class="chart-responsive">
            <div class="chart" id="jobs-chart" style="height: 300px; position: relative;"></div>
          </div>
        </div>


        <div class="col-md-6">

        <div class="col-lg-6 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-green">
    <div class="inner">
      <h3><?php echo $status['open'] ?></h3>
        <p>Open</p>
    </div>
    
    <div class="icon">
      <i class="fa fa-paperclip"></i>
    </div>
    
      <a href="<?php echo site_url();?>/jobposts" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>

<!-- ./col -->
<div class="col-lg-6 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-red">
    <div class="inner">
      <h3><?php echo $status['closed']; ?></h3>
        <p>Closed</p>
    </div>
    
    <div class="icon">
      <i class="fa fa-paperclip"></i>
    </div>
    
      <a href="<?php echo site_url();?>/jobposts" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>
        </div>

      </div>

      
      
      

</div>
</div>
</section>
<script>
$(function () {
  "use strict"; 
  //DONUT CHART
  var donut = new Morris.Donut({
    "element": "jobs-chart",
    "resize": true,
    "colors": ["#27ae60", "#e74c3c"],
    "data": [
      {"label": "Open", "value": "<?php echo $status['open'] ?>"},
      {"label": "Closed", "value": "<?php echo $status['closed'] ?>"}
    ],
    "hideHover": "auto"
  }); 
}); 
</script>              
                                                                                                             