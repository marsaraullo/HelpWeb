  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Users
      </h1>
      <ol class="breadcrumb">
        <li class="active">Users</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <section class="content" id="record">
        <?php
        include('userdata.php');
        ?>
    </section>

        <div class="well">
                <table id="datalist" class="display responsive nowrap" width="100%">
                    <thead>
                        <tr>
                            <th width="5%" class="hidden-xs hidden-sm">ID</th>
                            <th width="10%">User Name</th>
                            <th width="10%" class="hidden-xs hidden-sm">First Name</th>
                            <th width="10%" class="hidden-xs hidden-sm">Last Name</th>
                            <th width="20%" class="hidden-xs hidden-sm">E-mail</th>
                            <th width="21%">Role</th>
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
    ajax: { url: '<?php echo site_url(); ?>/users/get_data', type: 'POST' },
    columns: [
        {data:'id', className:"hidden-xs hidden-sm"},
        {data:'username'},
        {data:'firstname', className:"hidden-xs hidden-sm"},
        {data:'lastname', className:"hidden-xs hidden-sm"},
        {data:'email', className:"hidden-xs hidden-sm"},
        {data:'roletasks'},
        {data:'action'}
    ]
});

$(document).on('click', '.notifications', function(){
$('.notification_count').html("");
load_unseen_notification('yes');
});


});

function view_record(id){
$.get("<?php echo site_url() . "/users/update_user/"; ?>"+id+"/1",'',function (datahtml){
    $("#record").html(datahtml);
    window.scrollTo(0,0);
});
};

function update_record(id){
$.post("<?php echo site_url() . "/users/update_user/"; ?>"+id,"id="+id,function (datahtml){
    $("#record").html(datahtml);
    window.scrollTo(0,0);
});
};

function delete_record(id){
if (confirm("Delete record id no. "+id+"?")){
    $.get("<?php echo site_url() . "/users/delete_user/"; ?>"+id,'',function (retval){
        alert(retval);
        if (retval == 'Record has been deleted.'){
            window.location = "<?php echo site_url() . "/users"; ?>";
        } else {
            alert('Failed to delete record.');
        }
    });
}
};
-->
</script>
