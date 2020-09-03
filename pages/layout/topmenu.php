<header class="main-header">
    <!-- Logo -->
    <a href="../dashboard" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="https://eduskillsfoundation.org/wp-content/uploads/2019/10/icon.png" width="100%"/></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="https://eduskillsfoundation.org/wp-content/uploads/2020/06/cropped-logo-2-1.png" width="100%"/></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="https://ui-avatars.com/api/?name=<?php echo $userinfo["firstname"]?>&rounded=true" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $userinfo["firstname"]?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="https://ui-avatars.com/api/?name=<?php echo $userinfo["firstname"]?>&rounded=true" class="img-circle" alt="User Image">

                <p>
                 Welcome <?php echo $userinfo["firstname"]." ".$userinfo["lastname"]?>
                  
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="/pages/auth/logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button 
          <li>
            <a href="../../#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>-->
        </ul>
      </div>
    </nav>
  </header>