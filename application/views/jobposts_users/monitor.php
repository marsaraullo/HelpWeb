
<section class="content">

<div class="box">
  <div class="box-header with-border">
  <h3 class="box-title">Recent Job Posts</h3>
  </div>
  <div class="box-body">
      <div class="row">

        <div class="col-md-12">
            <table class="table table-striped table-hover">
              <tr>
                <th>Date Time</th>
                <th>Job post</th>
                <th>Asker</th>
                <th>Price Range</th>
                <th>Action</th>
              </tr>

              <?php
                foreach($recentjobs as $row){
              ?>
                  <tr>
                    <td><?php echo $row->datetime; ?></td>
                    <td><?php echo $row->title; ?></td>
                    <td><?php echo $row->lastname.', '.$row->firstname; ?></td>
                    <td><strong><?php echo 'P '.$row->min_cost.' - '.'P '.$row->max_cost; ?></strong></td>
                    <td>
                    <?php
                      if($row->helper_id==""){
                      ?>
                      <a class="btn btn-primary" onClick="return confirm('Are you sure you want to apply on this job?')" href="<?php echo site_url(); ?>/jobposts_users/apply/<?php echo $row->id; ?>">Apply</a>
                    <?php
                      }else{
                        echo '<i class="fa fa-circle text-red"></i> Closed';
                      }
                    ?>
                    </td>
                  </tr>
              <?php
                }
              ?>
            </table>
        </div>


        <div class="col-md-12">

        </div>

      </div>

      

</div>
</div>


        <div class="col-md-12">

        </div>

      </div>

      

</div>
</div>

</section>
             
                                                                                                             