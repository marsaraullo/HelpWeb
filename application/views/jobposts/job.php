  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <a href="<?php echo site_url().'/jobposts'; ?>" class="btn btn-default">Back</a>
    </br><br>
    <h2><?php echo $id; ?>: <small><?php echo $jobdata->title; ?></small></h2>
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
                    <li class="list-group-item">Description: <?php echo $jobdata->description; ?></li>
                    <li class="list-group-item">Price: <strong>PHP <?php echo $jobdata->min_cost ?> - <?php echo $jobdata->max_cost; ?></strong></li>
                    <li class="list-group-item">Posted by: <?php echo $jobdata->lastname.', '.$jobdata->firstname; ?></li>
                    <li class="list-group-item">Address: <?php echo $jobdata->address; ?></li>
                </ul>
                <p class="pull-right"><strong>Date Posted:</strong> <?php echo $jobdata->datetime; ?></p>


                <table class="table table-hover">
                    <tr>
                        <th>Applicant</th>
                        <th>Action</th>
                    </tr>

                    <?php
                    foreach($jobapplicants as $row){
                    ?>
                    <tr>
                        <td><?php echo $row->lastname.', '.$row->firstname; ?></td>
                        <td><a href="<?php echo site_url().'/jobposts/acceptapplicant'; ?>" class="btn btn-info">Hire!</a></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>

            </div>
        </div>

  </section>
</div>