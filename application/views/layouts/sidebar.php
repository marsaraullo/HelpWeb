<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo site_url(); ?>/cricket" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>H</b>ELP</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>H</b>ELP</span>
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
              <li class="footer"><a href="<?php echo site_url(); ?>/billmanager">View all</a></li>              
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">              
              <i class="fa fa-user"></i>
              <span class="hidden-xs">
              <?php echo 'User'; ?>
              <i class="fa fa-angle-down"></i></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <p>
                <?php echo 'User'; ?>
                  <small><?php echo 'user@email.com'; ?></small>
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

      <li>
        <a href="pages/widgets.html">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>

      <li>
        <a href="pages/widgets.html">
          <i class="fa fa-circle"></i> <span>Menu 1</span>
        </a>
      </li>        

      <li class="treeview">
        <a href="#">
          <i class="fa fa-circle"></i> <span>Menu 2</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="index.html"> Sub Menu 1</a></li>
          <li><a href="index2.html"> Sub Menu 2</a></li>
          <li><a href="index2.html"> Sub Menu 3</a></li>
          <li><a href="index2.html"> Sub Menu 4</a></li>
          <li><a href="index2.html"> Sub Menu 5</a></li>                                    
        </ul>
      </li>
      <li>
        <a href="pages/widgets.html">
          <i class="fa fa-circle"></i> <span>Menu 3</span>
        </a>
      </li>
      <li>
        <a href="pages/widgets.html">
          <i class="fa fa-circle"></i> <span>Menu 4</span>
        </a>
      </li>
      
      <li class="treeview active">
        <a href="#">
          <i class="fa fa-users"></i> <span>Users</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="users"> Users</a></li>
          <li><a href="roles"> Roles</a></li>
          <li><a href="modules"> Modules</a></li>                                
        </ul>
      </li>      
      
      <li>
        <a href="pages/widgets.html">
          <i class="fa fa-circle"></i> <span>Menu 3</span>
        </a>
      </li>
      
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
