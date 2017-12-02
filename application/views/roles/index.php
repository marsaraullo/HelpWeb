  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Roles
    </h1>
    <ol class="breadcrumb">
      <li class="active">Roles</li>
    </ol>
  </section>

    <!-- Main content -->
    <section class="content">
    <section class="content" id="record">
        <?php
        include('roledata.php');
        ?>
    </section>

        <div class="well">
                <table id="datalist" class="display responsive nowrap" width="100%">
                    <thead>
                        <tr>
                            <th width="5%">ID</th>
                            <th width="10%">Role</th>
                            <th width="20%" class="hidden-xs hidden-sm">Tasks</th>
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
    ajax: { url: '<?php echo site_url(); ?>/roles/get_data', type: 'POST' },
    columns: [
        {data:'id'},
        {data:'rolename'},
        {data:'roletasks', className:"hidden-xs hidden-sm"},
        {data:'action'}
    ]
});

$(document).on('click', '.notifications', function(){
$('.notification_count').html("");
load_unseen_notification('yes');
});


});

function view_record(id){
$.get("<?php echo site_url() . "/roles/update_role/"; ?>"+id+"/1",'',function (datahtml){
    $("#record").html(datahtml);
    window.scrollTo(0,0);
});
};

function update_record(id){
$.post("<?php echo site_url() . "/roles/update_role/"; ?>"+id,"id="+id,function (datahtml){
    $("#record").html(datahtml);
    window.scrollTo(0,0);
});
};

function delete_record(id){
if (confirm("Delete record id no. "+id+"?")){
    $.get("<?php echo site_url() . "/roles/delete_role/"; ?>"+id,'',function (retval){
        alert(retval);
        if (retval == 'Record has been deleted.'){
            window.location = "<?php echo site_url() . "/roles"; ?>";
        } else {
            alert('Failed to delete record.');
        }
    });
}
};
-->
</script>
