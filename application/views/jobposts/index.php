  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Job Posts</h1>
    <ol class="breadcrumb">
      <li class="active">Job Posts</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->

    <section class="content" id="record">
            <?php
            include('jobpostdata.php');
            ?>
    </section>

        <div class="well">
                    <table id="datalist" class="display responsive nowrap" width="100%">
                        <thead>
                            <tr>
                                <th width="5%" class="hidden-xs hidden-sm">ID</th>
                                <th width="5%" class="hidden-xs hidden-sm">Date</th>
                                <th width="10%">Title</th>
                                <th width="10%" class="hidden-xs hidden-sm">Min cost</th>
                                <th width="10%">Actual cost</th>
                                <th width="10%" class="hidden-xs hidden-sm">Max cost</th>
                                <th width="10%" class="hidden-xs hidden-sm">Asker</th>
                                <th width="10%" class="hidden-xs hidden-sm">Status</th>
                                <th width="5%">Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
            </div>         

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/datatables.net/css/jquery.dataTables.min.css">
<script src="<?php echo base_url(); ?>resources/js/datatables.net/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
<!--
$(document).ready(function(){
load_unseen_notification();  

  $('#datalist').DataTable({
      processing: true,
      serverSide: true,
      ajax: { url: '<?php echo site_url(); ?>/jobposts/get_data', type: 'POST' },
      order: [[ 1, "desc" ]],
      columns: [
          {data:'id', className:"hidden-xs hidden-sm"},
          {data:'datetime', className:"hidden-xs hidden-sm"},
          {data:'title'},
          {data:'min_cost', className:"hidden-xs hidden-sm"},
          {data:'actual_cost'},
          {data:'max_cost', className:"hidden-xs hidden-sm"},
          {data:'asker_id', className:"hidden-xs hidden-sm"},
          {data:'status', className:"hidden-xs hidden-sm"},
          {data:'action'}
      ]
  });

$(document).on('click', '.notifications', function(){
$('.notification_count').html("");
load_unseen_notification('yes');
});


});

function view_record(id){
  $.get("<?php echo site_url() . "/jobposts/update_jobpost/"; ?>"+id+"/1",'',function (datahtml){
      $("#record").html(datahtml);
      window.scrollTo(0,0);
  });
};
function update_record(id){
  $.post("<?php echo site_url() . "/jobposts/update_jobpost/"; ?>"+id,"id="+id,function (datahtml){
      $("#record").html(datahtml);
      window.scrollTo(0,0);
  });
};
function delete_record(id){
  if (confirm("Delete record id no. "+id+"?")){
      $.get("<?php echo site_url() . "/jobposts/delete_jobpost/"; ?>"+id,'',function (retval){
          if (retval == 'Record has been deleted.'){
              window.location = "<?php echo site_url() . "/jobposts"; ?>";
          } else {
              alert('Failed to delete record.');
          }
      });
  }
};
-->
</script>
