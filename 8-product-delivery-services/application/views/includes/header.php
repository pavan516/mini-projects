<?php
$fromDate = date('Y')."-".date('m')."-01";
$toDate = date('Y')."-".date('m')."-".date('d');
?>
<!-- Logo -->
<div class="nav-header" style="text-align:center;">
  <div class="brand-logo">
    <a href="<?php echo base_url(); ?>index.php" style="color:white;padding:1.607rem 0.8125rem;">
      <b class="logo-abbr"><b style="font-size:20px;">DS</b></b>
      <span class="brand-title">
        <b style="color:white;padding:1.607rem 0.8125rem;font-size:15px;">DELIVERY SERVICE</b>
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
              <img src="<?php echo base_url().$this->session->userdata('image') ?>" height="40" width="40" alt="">
            <?php } else { ?>
              <img src="<?php echo base_url(); ?>uploads/users/images/default.jpg" height="40" width="40" alt="">
            <?php } ?>
          </div>
          <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
            <div class="dropdown-content-body">
              <ul>
                <li>
                  <a href="<?php echo base_url(); ?>index.php/user/profile/<?php echo $this->session->userdata('uuid'); ?>"><i class="icon-user"></i> <span>Profile</span></a>
                </li>
                <li>
                  <a href="<?php echo base_url(); ?>index.php/auth/logout"><i class="icon-key"></i> <span>Logout</span></a>
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
          <a href="<?php echo base_url(); ?>index.php/home">
            <i class="icon-speedometer menu-icon"></i><span class="nav-text">DASHBOARD</span>
          </a>
        </li>
        <!-- Tab 1 - Dashboard -->

        <!-- Tab 2 - Products -->
        <li>
          <a href="<?php echo base_url(); ?>index.php/products">
            <i class="fa fa-product-hunt"></i><span class="nav-text">PRODUCTS</span>
          </a>
        </li>
        <!-- Tab 2 - Products -->

        <!-- Tab 3 - Live Orders -->
        <li>
          <a href="<?php echo base_url(); ?>index.php/orders/live">
            <i class="fa fa-shopping-bag"></i><span class="nav-text">LIVE ORDERS</span>
          </a>
        </li>
        <!-- Tab 3 - Live Orders -->

        <!-- Tab 4 - Orders History -->
        <li>
          <a href="<?php echo base_url(); ?>index.php/orders/history?order_from=<?php echo $fromDate; ?>&order_to=<?php echo $toDate; ?>">
            <i class="fa fa-shopping-bag"></i><span class="nav-text">ORDERS HISTORY</span>
          </a>
        </li>
        <!-- Tab 4 - Orders History -->

        <!-- Tab 5 - Super Admins -->
        <li>
          <a href="<?php echo base_url(); ?>index.php/superadmins">
            <i class="fa fa-user-secret"></i><span class="nav-text">SUPER ADMINS</span>
          </a>
        </li>
        <!-- Tab 5 - Super Admins -->

        <!-- Tab 6 - Users -->
        <li>
          <a href="<?php echo base_url(); ?>index.php/users">
            <i class="fa fa-users"></i><span class="nav-text">USERS</span>
          </a>
        </li>
        <!-- Tab 6 - Users -->

        <!-- Tab 7 - Sales Boys -->
        <li>
          <a href="<?php echo base_url(); ?>index.php/salesboys">
            <i class="fa fa-user-secret"></i><span class="nav-text">SALES BOYS</span>
          </a>
        </li>
        <!-- Tab 7 - Sales Boys -->

        <!-- Tab 8 - Address -->
        <li class="mega-menu mega-menu-sm">
          <a class="has-arrow" href="javascript:void()" aria-expanded="false">
            <i class="fa fa-address-card"></i><span class="nav-text">ADDRESSES</span>
          </a>
          <ul aria-expanded="false">
            <li><a href="<?php echo base_url(); ?>index.php/country">COUNTRIES</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/state">STATES</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/city">CITIES</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/area">AREAS</a></li>
          </ul>
        </li>
        <!-- Tab 8 - Address -->

      <?php } ?>
      <!----------------->
      <!-- SUPER ADMIN -->
      <!----------------->

      <!------------------->
      <!-- SALES BOYS -->
      <!------------------->
      <?php if($this->session->userdata('role') == "SALES_BOYS") { ?>

        <!-- Tab 1 - Dashboard -->
        <li>
          <a href="<?php echo base_url(); ?>index.php/home">
            <i class="icon-speedometer menu-icon"></i><span class="nav-text">DASHBOARD</span>
          </a>
        </li>
        <!-- Tab 1 - Dashboard -->

        <!-- Tab 2 - Orders -->
        <li>
          <a href="<?php echo base_url(); ?>index.php/salesboy/orders">
            <i class="fa fa-shopping-bag"></i><span class="nav-text">ORDERS</span>
          </a>
        </li>
        <!-- Tab 2 - Orders -->

        <!-- Tab 3 - Orders History -->
        <li>
          <a href="<?php echo base_url(); ?>index.php/salesboy/orders/history?order_from=<?php echo $fromDate; ?>&order_to=<?php echo $toDate; ?>">
            <i class="fa fa-shopping-bag"></i><span class="nav-text">ORDERS HISTORY</span>
          </a>
        </li>
        <!-- Tab 3 - Orders History -->

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
          <a href="<?php echo base_url(); ?>index.php/home">
            <i class="icon-speedometer menu-icon"></i><span class="nav-text">DASHBOARD</span>
          </a>
        </li>
        <!-- Tab 1 - Dashboard -->

        <!-- Tab 2 - Orders -->
        <li>
          <a href="<?php echo base_url(); ?>index.php/user/orders">
            <i class="fa fa-shopping-bag"></i><span class="nav-text">PENDING ORDERS</span>
          </a>
        </li>
        <!-- Tab 2 - Orders -->

        <!-- Tab 3 - Orders History -->
        <li>
          <a href="<?php echo base_url(); ?>index.php/user/orders/history?order_from=<?php echo $fromDate; ?>&order_to=<?php echo $toDate; ?>">
            <i class="fa fa-shopping-bag"></i><span class="nav-text">ORDERS HISTORY</span>
          </a>
        </li>
        <!-- Tab 3 - Orders History -->

        <!-- Tab 4 - Address -->
        <li>
          <a href="<?php echo base_url(); ?>index.php/user/address">
            <i class="fa fa-address-card"></i><span class="nav-text">ADDRESS</span>
          </a>
        </li>
        <!-- Tab 4 - Address -->

      <?php } ?>
      <!----------->
      <!-- USERS -->
      <!----------->
                    
    </ul>
  </div>
</div>
<!-- Sidebar -->