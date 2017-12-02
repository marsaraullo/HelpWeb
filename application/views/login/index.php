
    <div class="login-box">
    <!-- /.login-logo -->
    <div class="login-logo text-center">
      <img src="<?php echo base_url(); ?>resources/images/help_banner.png" width="350px" alt="Help!">
    </div>    
    <div class="login-box-body bg-gray">
      <p class="login-box-msg">Login</p>

      <?php echo form_open('help/login'); ?>
        <div class="form-group">
          <input type="text" name="username" class="form-control" placeholder="Username" maxlength="20" required />
        </div>
        <div class="form-group">
          <input type="password" name="password" class="form-control" placeholder="Password" maxlength="30" required />
        </div>
        <div class="row">
          <div class="col-xs-12">
            <input type="submit" class="btn btn-login btn-block" name="btn_submit" value="Log in">
          </div>
          <!-- /.col -->
        </div>
      <?php echo form_close(); ?>

    </div>
    <!-- /.login-box-body -->
      <div class="login-footer">
      <strong>Copyright &copy; <?php echo date("Y"); ?> <a href="#" target="_blank">Help!</a></strong> All rights reserved.
    </div>
  </div>

