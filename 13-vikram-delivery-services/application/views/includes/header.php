<!-- Logo -->
<div class="nav-header" style="text-align:center;">
  <div class="brand-logo">
    <a href="<?php echo base_url(); ?>" style="color:white;padding:1.607rem 0.8125rem;">
      <b class="logo-abbr"><b style="font-size:20px;">VDS</b></b>
      <span class="brand-title">
        <b style="color:white;padding:1.607rem 0.8125rem;font-size:15px;">VIKRAM DELIVERY SERVICE</b>
      </span>
    </a>
  </div>
</div>
<!-- Logo -->

<!-- Top Header -->
<div class="header">
  <div class="header-content clearfix">

    <!-- Left side  -->
    <div class="header-left">
      <div class="input-group icons">
        <div class="input-group-prepend">
          <a href="<?php echo $_SERVER['REQUEST_URI']; ?>" class="btn btn-primary"><i class="fa fa-refresh" style="font-size:17px"></i></a>
        </div>
      </div>
    </div>
    <!-- Left side  -->

    <!-- Right side -->
    <div class="header-right">
      <ul class="clearfix">

        <!-- Mobile Menu -->
        <div class="nav-control">
          <div class="hamburger">
            <span class="toggle-icon"><i class="icon-menu"></i></span>
          </div>
        </div>
        <!-- Mobile Menu -->

        <!-- User profile -->
        <li class="icons dropdown">
          <div class="user-img c-pointer position-relative" data-toggle="dropdown">
            <?php if(!empty($this->session->userdata('image'))) { ?>
              <img src="<?php echo $this->session->userdata('image') ?>" height="40" width="40" alt="">
            <?php } else { ?>
              <img src="<?php echo base_url(); ?>uploads/users/images/default.jpg" height="40" width="40" alt="">
            <?php } ?>
          </div>
          <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
            <div class="dropdown-content-body">
              <ul>
                <li>
                  <a href="<?php echo base_url(); ?>user/profile/<?php echo $this->session->userdata('uuid'); ?>"><i class="icon-user"></i> <span>Profile</span></a>
                </li>
                <li>
                  <a href="<?php echo base_url(); ?>auth/logout"><i class="icon-key"></i> <span>Logout</span></a>
                </li>
              </ul>
            </div>
          </div>
        </li>
        <!-- User profile -->

      </ul>
    </div>
  </div>
</div>
<!-- Top Header -->

<!-- Sidebar -->
<div class="nk-sidebar">           
  <div class="nk-nav-scroll">
    <ul class="metismenu" id="menu">

      <!----------------->
      <!-- SUPER ADMIN -->
      <!----------------->
      <?php if($this->session->userdata('role') == "SUPER_ADMIN") { ?>

        <!-- Tab 1 - Dashboard -->
        <li>
          <a href="<?php echo base_url(); ?>home">
            <i class="icon-speedometer menu-icon"></i><span class="nav-text">DASHBOARD</span>
          </a>
        </li>
        <!-- Tab 1 - Dashboard -->

        <!-- Tab 2 - Orders -->
        <li class="mega-menu mega-menu-sm">
          <a class="has-arrow" href="javascript:void()" aria-expanded="false">
            <i class="fa fa-shopping-bag"></i><span class="nav-text">ORDERS</span>
          </a>
          <ul aria-expanded="false">
            <li><a href="<?php echo base_url(); ?>orders/create">CREATE OFFLINE ORDER</a></li>
            <li><a href="<?php echo base_url(); ?>orders/live">VIEW LIVE ORDERS</a></li>
            <li><a href="<?php echo base_url(); ?>orders/history">VIEW ORDERS HISTORY</a></li>
            <!-- <li><a href="<?php echo base_url(); ?>orders/income">VIEW MONTHLY ORDERS STATISTICS</a></li> -->
          </ul>
        </li>
        <!-- Tab 2 - Orders -->

        <!-- Tab 3 - Delivery Boys -->
        <li class="mega-menu mega-menu-sm">
          <a class="has-arrow" href="javascript:void()" aria-expanded="false">
            <i class="fa fa-user-secret"></i><span class="nav-text">DELIVERY BOYS</span>
          </a>
          <ul aria-expanded="false">
            <li><a href="<?php echo base_url(); ?>deliveryboy/create">CREATE DELIVERY BOY</a></li>
            <li><a href="<?php echo base_url(); ?>deliveryboys">VIEW DELIVERY BOYS</a></li>
          </ul>
        </li>
        <!-- Tab 3 - Delivery Boys -->

        <!-- Tab 4 - Super Admins -->
        <li class="mega-menu mega-menu-sm">
          <a class="has-arrow" href="javascript:void()" aria-expanded="false">
            <i class="fa fa-user-secret"></i><span class="nav-text">SUPER ADMINS</span>
          </a>
          <ul aria-expanded="false">
            <li><a href="<?php echo base_url(); ?>superadmin/create">CREATE SUPER-ADMIN</a></li>
            <li><a href="<?php echo base_url(); ?>superadmins">VIEW SUPER-ADMINS</a></li>
          </ul>
        </li>
        <!-- Tab 4 - Super Admins -->

        <!-- Tab 5 - Users -->
        <li>
          <a href="<?php echo base_url(); ?>users">
            <i class="fa fa-users"></i><span class="nav-text">USERS</span>
          </a>
        </li>
        <!-- Tab 5 - Users -->

      <?php } ?>
      <!----------------->
      <!-- SUPER ADMIN -->
      <!----------------->

      <!------------------->
      <!-- DELIVERY BOYS -->
      <!------------------->
      <?php if($this->session->userdata('role') == "DELIVERY_BOYS") { ?>

        <!-- Tab 1 - Dashboard -->
        <li>
          <a href="<?php echo base_url(); ?>home">
            <i class="icon-speedometer menu-icon"></i><span class="nav-text">DASHBOARD</span>
          </a>
        </li>
        <!-- Tab 1 - Dashboard -->

        <!-- Tab 2 - Orders -->
        <li class="mega-menu mega-menu-sm">
          <a class="has-arrow" href="javascript:void()" aria-expanded="false">
            <i class="fa fa-shopping-bag"></i><span class="nav-text">ORDERS</span>
          </a>
          <ul aria-expanded="false">
            <li><a href="<?php echo base_url(); ?>deliveryboy/orders">VIEW ORDERS</a></li>
            <li><a href="<?php echo base_url(); ?>deliveryboy/orders/history">VIEW ORDERS HISTORY</a></li>
          </ul>
        </li>
        <!-- Tab 2 - Orders -->

      <?php } ?>
      <!------------------->
      <!-- DELIVERY BOYS -->
      <!------------------->

      <!----------->
      <!-- USERS -->
      <!----------->
      <?php if($this->session->userdata('role') == "USERS") { ?>

        <!-- Tab 1 - Dashboard -->
        <li>
          <a href="<?php echo base_url(); ?>home">
            <i class="icon-speedometer menu-icon"></i><span class="nav-text">DASHBOARD</span>
          </a>
        </li>
        <!-- Tab 1 - Dashboard -->

        <!-- Tab 2 - Orders -->
        <li class="mega-menu mega-menu-sm">
          <a class="has-arrow" href="javascript:void()" aria-expanded="false">
            <i class="fa fa-shopping-bag"></i><span class="nav-text">ORDERS</span>
          </a>
          <ul aria-expanded="false">
            <li><a href="<?php echo base_url(); ?>user/orders">CREATE/VIEW ORDERS</a></li>
            <li><a href="<?php echo base_url(); ?>user/orders/history">VIEW ORDERS HISTORY</a></li>
            <!-- <li><a href="<?php echo base_url(); ?>user/orders/expenses">VIEW MONTHLY EXPENSES</a></li> -->
          </ul>
        </li>
        <!-- Tab 2 - Orders -->

        <!-- Tab 3 - Address -->
        <li>
          <a href="<?php echo base_url(); ?>user/address">
            <i class="fa fa-address-card"></i><span class="nav-text">ADDRESS</span>
          </a>
        </li>
        <!-- Tab 3 - Address -->

      <?php } ?>
      <!----------->
      <!-- USERS -->
      <!----------->
                    
    </ul>
  </div>
</div>
<!-- Sidebar -->