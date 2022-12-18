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
      
          <!-- 2nd row -->
          <div class="row">

            <!-- Live Orders -->
            <div class="col-lg-4 col-sm-6">
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
            <div class="col-lg-4 col-sm-6">
              <div class="card gradient-4">
                <div class="card-body">
                  <h3 class="card-title text-white">DELIVERED ORDERS</h3>
                  <div class="d-inline-block">
                    <h2 class="text-white"><?php echo $statistic['total_orders_delivered']; ?></h2>
                    <p class="text-white mb-0"><?php echo date('Y-m-d'); ?></p>
                  </div>
                  <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                </div>
              </div>
            </div>
            <!-- Accepted Orders -->

            <!-- Net Profit -->
            <div class="col-lg-4 col-sm-6">
              <div class="card gradient-2">
                <div class="card-body">
                  <h3 class="card-title text-white">NET PROFIT</h3>
                  <div class="d-inline-block">
                    <h2 class="text-white"><?php echo $statistic['total_profit']." ₹"; ?></h2>
                    <p class="text-white mb-0"><?php echo date('Y-m-d'); ?></p>
                  </div>
                  <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                </div>
              </div>
            </div>
            <!-- Net Profit -->

          </div>
          <!-- 2nd row -->

          <!-- 1st row -->
          <div class="row">

            <!-- Amount To Receive -->
            <div class="col-lg-3 col-sm-6">
              <div class="card gradient-4">
                <div class="card-body">
                  <h3 class="card-title text-white">AMOUNT TO RECEIVE</h3>
                  <div class="d-inline-block">
                    <h2 class="text-white"><?php echo $statistic['total_amount_to_receive']." ₹"; ?></h2>
                    <p class="text-white mb-0"><?php echo date('Y-m-d'); ?></p>
                  </div>
                  <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                </div>
              </div>
            </div>
            <!-- Amount To Receive -->

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

            <!-- Total Sales Boys -->
            <div class="col-lg-3 col-sm-6">
              <div class="card gradient-2">
                <div class="card-body">
                  <h3 class="card-title text-white">SALES BOYS</h3>
                  <div class="d-inline-block">
                    <h2 class="text-white"><?php echo $statistic['total_salesboys']; ?></h2>
                    <p class="text-white mb-0"><?php echo date('Y-m-d'); ?></p>
                  </div>
                  <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                </div>
              </div>
            </div>
            <!-- Total Sales Boys -->

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

          </div>
          <!-- 1st row -->

          
      
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
                    <h2 class="text-white"><?php echo $statistic['total_orders_delivered']; ?></h2>
                    <p class="text-white mb-0"><?php echo date('Y-m-d'); ?></p>
                  </div>
                  <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                </div>
              </div>
            </div>
            <!-- Accepted Orders -->

            <!-- Need To Pay -->
            <div class="col-lg-3 col-sm-6">
              <div class="card gradient-1">
                <div class="card-body">
                  <h3 class="card-title text-white">AMOUNT TO PAY</h3>
                  <div class="d-inline-block">
                    <h2 class="text-white"><?php echo $statistic['total_amount_to_pay']." ₹"; ?></h2>
                    <p class="text-white mb-0"><?php echo date('Y-m-d'); ?></p>
                  </div>
                  <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                </div>
              </div>
            </div>
            <!-- Need To Pay -->

            <!-- Net Profit -->
            <div class="col-lg-3 col-sm-6">
              <div class="card gradient-2">
                <div class="card-body">
                  <h3 class="card-title text-white">NET EXPENDITURE</h3>
                  <div class="d-inline-block">
                    <h2 class="text-white"><?php echo $statistic['total_expenditure']." ₹"; ?></h2>
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