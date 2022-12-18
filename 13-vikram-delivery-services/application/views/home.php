<!DOCTYPE html>
<html lang="en">

  <!-- Head -->
  <?php include('includes/head.php'); ?>
  <!-- Head -->

<!-- Body -->
<body>

  <!-- Pre-loader -->
  <?php include('includes/preloader.php'); ?>
  <!-- Pre-loader -->

  <!-- Main wrapper -->
  <div id="main-wrapper">

    <!-- Header -->
    <?php include('includes/header.php'); ?>
    <!-- Header -->

    <!-- Main Center Body -->
    <div class="content-body">
      <div class="container-fluid mt-3">
        
        <?php if($this->session->userdata('role') == "SUPER_ADMIN") { ?>
      
          <!-- 1st row -->
          <div class="row">

            <!-- Total Users -->
            <div class="col-lg-3 col-sm-6">
              <div class="card gradient-1">
                <div class="card-body">
                  <h3 class="card-title text-white">USERS</h3>
                  <div class="d-inline-block">
                    <h2 class="text-white"><?php echo $statistic['total_users']; ?></h2>
                    <p class="text-white mb-0"><?php echo date('Y-m-d'); ?></p>
                  </div>
                  <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                </div>
              </div>
            </div>
            <!-- Total Users -->

            <!-- Total Delivery Boys -->
            <div class="col-lg-3 col-sm-6">
              <div class="card gradient-2">
                <div class="card-body">
                  <h3 class="card-title text-white">DELIVERY BOYS</h3>
                  <div class="d-inline-block">
                    <h2 class="text-white"><?php echo $statistic['total_deliveryboys']; ?></h2>
                    <p class="text-white mb-0"><?php echo date('Y-m-d'); ?></p>
                  </div>
                  <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                </div>
              </div>
            </div>
            <!-- Total Delivery Boys -->

            <!-- Total Super Admins -->
            <div class="col-lg-3 col-sm-6">
              <div class="card gradient-3">
                <div class="card-body">
                  <h3 class="card-title text-white">SUPER ADMINS</h3>
                  <div class="d-inline-block">
                    <h2 class="text-white"><?php echo $statistic['total_superadmins']; ?></h2>
                    <p class="text-white mb-0"><?php echo date('Y-m-d'); ?></p>
                  </div>
                  <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                </div>
              </div>
            </div>
            <!-- Total Super Admins -->

            <!-- Total SMS Left -->
            <div class="col-lg-3 col-sm-6">
              <div class="card gradient-4">
                <div class="card-body">
                  <h3 class="card-title text-white">SMS LEFT</h3>
                  <div class="d-inline-block">
                    <h2 class="text-white"><?php echo $statistic['total_sms_left']; ?></h2>
                    <p class="text-white mb-0"><?php echo date('Y-m-d'); ?></p>
                  </div>
                  <span class="float-right display-5 opacity-5"><i class="fa fa-mobile"></i></span>
                </div>
              </div>
            </div>
            <!-- Total SMS Left -->

          </div>
          <!-- 1st row -->

          <!-- 2nd row -->
          <div class="row">

            <!-- Live Orders -->
            <div class="col-lg-3 col-sm-6">
              <div class="card gradient-3">
                <div class="card-body">
                  <h3 class="card-title text-white">LIVE ORDERS</h3>
                  <div class="d-inline-block">
                    <h2 class="text-white"><?php echo $statistic['total_live_orders']; ?></h2>
                    <p class="text-white mb-0"><?php echo date('Y-m-d'); ?></p>
                  </div>
                  <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                </div>
              </div>
            </div>
            <!-- Live Orders -->

            <!-- Accepted Orders -->
            <div class="col-lg-3 col-sm-6">
              <div class="card gradient-4">
                <div class="card-body">
                  <h3 class="card-title text-white">DELIVERED ORDERS</h3>
                  <div class="d-inline-block">
                    <h2 class="text-white"><?php echo $statistic['total_accepted_orders']; ?></h2>
                    <p class="text-white mb-0"><?php echo date('Y-m-d'); ?></p>
                  </div>
                  <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                </div>
              </div>
            </div>
            <!-- Accepted Orders -->

            <!-- Rejected Orders -->
            <div class="col-lg-3 col-sm-6">
              <div class="card gradient-1">
                <div class="card-body">
                  <h3 class="card-title text-white">REJECTED ORDERS</h3>
                  <div class="d-inline-block">
                    <h2 class="text-white"><?php echo $statistic['total_rejected_orders']; ?></h2>
                    <p class="text-white mb-0"><?php echo date('Y-m-d'); ?></p>
                  </div>
                  <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                </div>
              </div>
            </div>
            <!-- Rejected Orders -->

            <!-- Net Profit -->
            <div class="col-lg-3 col-sm-6">
              <div class="card gradient-2">
                <div class="card-body">
                  <h3 class="card-title text-white">NET PROFIT Profit</h3>
                  <div class="d-inline-block">
                    <h2 class="text-white"><?php echo $statistic['total_profit']." RS"; ?></h2>
                    <p class="text-white mb-0"><?php echo date('Y-m-d'); ?></p>
                  </div>
                  <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                </div>
              </div>
            </div>
            <!-- Net Profit -->

          </div>
          <!-- 2nd row -->
      
        <?php } else if($this->session->userdata('role') == "USERS") { ?>

          <!-- 1st row -->
          <div class="row">

            <!-- Live Orders -->
            <div class="col-lg-3 col-sm-6">
              <div class="card gradient-3">
                <div class="card-body">
                  <h3 class="card-title text-white">LIVE ORDERS</h3>
                  <div class="d-inline-block">
                    <h2 class="text-white"><?php echo $statistic['total_live_orders']; ?></h2>
                    <p class="text-white mb-0"><?php echo date('Y-m-d'); ?></p>
                  </div>
                  <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                </div>
              </div>
            </div>
            <!-- Live Orders -->

            <!-- Accepted Orders -->
            <div class="col-lg-3 col-sm-6">
              <div class="card gradient-4">
                <div class="card-body">
                  <h3 class="card-title text-white">DELIVERED ORDERS</h3>
                  <div class="d-inline-block">
                    <h2 class="text-white"><?php echo $statistic['total_accepted_orders']; ?></h2>
                    <p class="text-white mb-0"><?php echo date('Y-m-d'); ?></p>
                  </div>
                  <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                </div>
              </div>
            </div>
            <!-- Accepted Orders -->

            <!-- Rejected Orders -->
            <div class="col-lg-3 col-sm-6">
              <div class="card gradient-1">
                <div class="card-body">
                  <h3 class="card-title text-white">REJECTED ORDERS</h3>
                  <div class="d-inline-block">
                    <h2 class="text-white"><?php echo $statistic['total_rejected_orders']; ?></h2>
                    <p class="text-white mb-0"><?php echo date('Y-m-d'); ?></p>
                  </div>
                  <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                </div>
              </div>
            </div>
            <!-- Rejected Orders -->

            <!-- Net Profit -->
            <div class="col-lg-3 col-sm-6">
              <div class="card gradient-2">
                <div class="card-body">
                  <h3 class="card-title text-white">NET EXPENDITURE</h3>
                  <div class="d-inline-block">
                    <h2 class="text-white"><?php echo $statistic['total_expenditure']." RS"; ?></h2>
                    <p class="text-white mb-0"><?php echo date('Y-m-d'); ?></p>
                  </div>
                  <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                </div>
              </div>
            </div>
            <!-- Net Profit -->

          </div>
          <!-- 1st row -->
      
        <?php } else { ?>

          <!-- 1st row -->
          <div class="row">

            <!-- All Orders -->
            <div class="col-lg-3 col-sm-6">
              <div class="card gradient-3">
                <div class="card-body">
                  <h3 class="card-title text-white">TOTAL ORDERS</h3>
                  <div class="d-inline-block">
                    <h2 class="text-white"><?php echo $statistic['total_orders']; ?></h2>
                    <p class="text-white mb-0"><?php echo date('Y-m-d'); ?></p>
                  </div>
                  <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                </div>
              </div>
            </div>
            <!-- All Orders -->

          </div>
          <!-- 1st row -->
          
        <?php } ?>
        
      </div>
    </div>
    <!-- Main Center Body -->
      
    <!-- Footer -->
    <?php include('includes/footer.php'); ?>
    <!-- Footer -->

  </div>
  <!-- Main wrapper -->

  <!-- Footer Scripts -->
  <?php include('includes/footerscripts.php'); ?>
  <!-- Footer Scripts -->

</body>
</html>