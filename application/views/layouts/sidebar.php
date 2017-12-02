<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo site_url(); ?>/help" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>H!</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>H</b>ELP!</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle notifications" data-toggle="dropdown">
              <i class="fa fa-bell"></i>
              <span class="label label-warning notification_count"></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header"><strong><i class="fa fa-bell"></i> Notifications</strong></li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">

                </ul>
              </li>
              <li class="footer"><a href="<?php echo site_url(); ?>/jobposts">View all</a></li>              
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">              
            <i class="fa fa-user"></i>
            <span class="hidden-xs">
            <?php if (!isset($_SESSION['username'])){
                      echo '&nbsp;';
                  } else {
                      echo $_SESSION['username'];
                  }
                  ?> <i class="fa fa-angle-down"></i></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <p>
                <?php if (!isset($_SESSION['username'])){
                      echo '&nbsp;';
                  } else {
                      echo $_SESSION['username'];
                  }
                  ?>
                <small><?php if (!isset($_SESSION['username'])){
                      echo '&nbsp;';
                  } else {
                      echo $_SESSION['email'];
                  }
                  ?></small>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-right">
                <a href="<?php echo site_url() . '/help/logout'; ?>" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
    <?php
        echo $this->userlogin->check_assigned_controllers_access('Dashboard', array(1 => 'Dashboard'), 'fa fa-dashboard');
        echo $this->userlogin->check_assigned_controllers_access('Job Posts', array(2 => 'Job Posts'), 'fa fa-paperclip');
        echo $this->userlogin->check_assigned_controllers_access('Job Comments', array(3 => 'Job Comments'), 'fa fa-comment');
        echo $this->userlogin->check_assigned_controllers_access('Notifications', array(4 => 'Notifications'), 'fa fa-bell');        
        echo $this->userlogin->check_assigned_controllers_access('Users', array(5 => 'Users'), 'fa fa-users');  
        echo $this->userlogin->check_assigned_controllers_access('Roles', array(6 => 'Roles'), 'fa fa-user-circle');
        //echo $this->userlogin->check_assigned_controllers_access('Modules', array(7 => 'Modules'), 'fa fa-cubes');      
        echo $this->userlogin->check_assigned_controllers_access('Home', array(8 => 'Home'), 'fa fa-home');
        echo $this->userlogin->check_assigned_controllers_access('Job Posts', array(9 => 'Job Posts'), 'fa fa-paperclip'); 
        echo $this->userlogin->check_assigned_controllers_access('Notifications', array(10 => 'Notifications'), 'fa fa-bell');       
        ?>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
