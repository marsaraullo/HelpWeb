  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
  <h1>Job Posts</h1>
  <br>
    <a href="<?php echo site_url().'/jobposts'; ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</a>

    <ol class="breadcrumb">
      <li><a href="<?php echo site_url().'/jobposts'; ?>">Job Posts</a></li>
      <li class="active">Job</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="box">
            <div class="box-body">        
                <ul class="list-group">
                <li class="list-group-item text-center"><h3><?php echo $jobdata->title; ?> <small>
                <?php if($jobdata->helper_id==""){
                        echo '<i class="fa fa-circle text-green"></i>';
                    }else{
                         echo '<i class="fa fa-circle text-red"></i>';
                    } ?> </small></h3></li>
                <li class="list-group-item">ID: <?php echo $id; ?></li>
                    <li class="list-group-item">Description: <?php echo $jobdata->description; ?></li>
                    <li class="list-group-item">Price: <strong>PHP <?php echo $jobdata->min_cost ?> - <?php echo $jobdata->max_cost; ?></strong></li>
                    <li class="list-group-item">Posted by: <i class="fa fa-user"></i> <?php echo $jobdata->lastname.', '.$jobdata->firstname; ?></li>
                    <li class="list-group-item">Address: <?php echo $jobdata->address; ?></li>
                    <li class="list-group-item">Date posted: <?php echo $jobdata->datetime; ?></li>
                    <li class="list-group-item">Status: 
                        <?php if($jobdata->helper_id!=""){
                            echo '<span class="text-danger"><strong>Closed</strong></span>';
                    }else{
                        echo '<span class="text-success"><strong>Open!</strong></span>';
                    } ?></li>
                </ul>


                <table class="table table-striped table-hover">
                    <tr>
                        <th>Applicant</th>
                        <th>Action</th>
                    </tr>

                    <?php
                    if(count($jobapplicants)>0){
                    foreach($jobapplicants as $row){
                    ?>
                    <tr>
                        <td><?php echo $row->lastname.', '.$row->firstname; ?></td>
                        <td><a href="<?php echo site_url().'/jobposts/accept_applicant/'.$row->job_id; ?>/<?php echo $row->user_id;?>" class="btn btn-info">Hire!</a></td>
                    </tr>
                    <?php
                    }
                    }else{
                        ?>
                        <tr>
                        <td>&nbsp;</td>
                        <td>No record found.</td>
                    </tr>
                        <?php
                    }
                    ?>
                </table>

            </div>
        </div>

  </section>
</div>