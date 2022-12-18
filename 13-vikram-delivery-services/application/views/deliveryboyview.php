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
        
        <!-- Statistics -->
        <div class="row">

          <!-- Total Orders -->
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
          <!-- Total Orders -->

        </div>
        <!-- Statistics -->

        <!-- Orders History -->
        <div class="row">

          <!-- Error Message -->
          <?php if($this->session->flashdata('error')) {
            echo '<div class="col-md-12 alert alert-danger">';
            echo '<strong>'.$this->session->flashdata('error').'</strong>';
            echo '</div>';
          }?> 
          <!-- Error Message -->
          <!-- Success Message -->
          <?php if($this->session->flashdata('success')) {
            echo '<div class="col-md-12 alert alert-success">';
            echo '<strong>'.$this->session->flashdata('success').'</strong>';
            echo '</div>';
          }?> 
          <!-- Success Message -->
      
          <!-- List Of Orders -->
          <?php if(!empty($orders)) {?>
            <div class="col-md-12">
              <div class="card">
                <div class="card-body" style="padding: 0.5rem 0.5rem;">

                  <!-- Orders loop -->
                  <?php $collapsed = ""; $expand = true; $show = " show";
                  foreach($orders as $order) {
                    $color = str_pad( dechex( mt_rand( 0, 127 ) ), 2, '0', STR_PAD_LEFT).str_pad( dechex( mt_rand( 0, 127 ) ), 2, '0', STR_PAD_LEFT).str_pad( dechex( mt_rand( 0, 127 ) ), 2, '0', STR_PAD_LEFT);?>

                    <!-- Each Order -->
                    <p class="text-muted"><code></code></p>
                    <div id="accordion-two" class="accordion">
                      <div class="card">

                        <!-- Heading -->
                        <div class="card-header" style="padding:0.0rem 0.0rem;">
                          <h5 class="mb-0<?php echo $collapsed; ?>" data-toggle="collapse" data-target="#accordianTwo_<?php echo $order['uuid']; ?>" aria-expanded="<?php echo $expand; ?>" aria-controls="<?php echo $order['uuid']; ?>" style="background-color:#<?php echo $color; ?>;color:white;padding:10px;font-size:18px"><b><i class="fa" aria-hidden="true"></i> Order Id: <?php echo $order['order_no']." ( ".(new DateTime($order['created_dt']))->format('Y-m-d')." )"; ?> </b></h5>
                        </div>
                        <!-- Heading -->

                        <!-- List of orders -->
                        <div id="accordianTwo_<?php echo $order['uuid']; ?>" class="collapse<?php echo $show; ?>" data-parent="#accordion-two">
                          <div class="card-body" style="padding: 1rem 0rem;">
                            
                            <!-- Accept -->
                            <?php if($order['delivery_status'] == "DELIVERYBOY_ASSIGNED") {?>
                              
                              <!-- Heading -->
                              <div class="card mb-4 wow fadeIn" style="margin-bottom: 0rem !important;">
                                <h2 class="input-default" style="text-align:center;background-color:blue;color:white;padding:10px;font-size:20px"><b>LIVE ORDER - DELIVERY BOY ON-SITE</b></h2>
                              </div>
                              <!-- Heading -->

                            <?php } else if($order['delivery_status'] == "ARRIVING") {?>
                                  
                              <!-- Heading -->
                              <div class="card mb-4 wow fadeIn" style="margin-bottom: 0rem !important;">
                                <h2 class="input-default" style="text-align:center;background-color:blue;color:white;padding:10px;font-size:20px"><b>BILL</b></h2>
                              </div>
                              <!-- Heading -->
    
                              <!-- product items-->
                              <table id="example" class="table table-striped table-bordered zero-configuration">
                                <thead>
                                  <tr style='text-align:center'>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php if(!empty($order['_products'])) {
                                    $totalPrice = 0;
                                    foreach($order['_products'] as $product) {
                                      echo "<tr style='text-align:center'>";
                                        echo "<td>".$product['product']."</td>";
                                        echo "<td>".$product['quantity']." ".$product['units']."</td>";
                                        echo "<td>".$product['customer_price']."</td>";
                                      echo "</tr>";
                                    }
                                    echo "<tr style='text-align:center'>";
                                      echo "<td>PRODUCTS PRICE</td>";
                                      echo "<td colspan=2>".$order['total_customer_price']." RS</td>";
                                    echo "</tr>";
                                    echo "<tr style='text-align:center'>";
                                      echo "<td>DELIVERY CHARGES</td>";
                                      echo "<td colspan=2>".$order['delivery_charges']." RS</td>";
                                    echo "</tr>";
                                    echo "<tr style='text-align:center'>";
                                      echo "<td>TOTAL AMOUNT TO PAY</td>";
                                      echo "<td colspan=2>";
                                      $totalAmount = $order['total_customer_price']+$order['delivery_charges'];
                                      echo $totalAmount." RS</td>";
                                    echo "</tr>";
                                    echo "<tr style='text-align:center'>";
                                      echo "<td>DOWNLOAD BILL</td>";
                                      echo "<td colspan=2>";
                                        echo "<form action='".base_url()."order/download/bill/".$order['uuid']."' method='post'>";
                                          echo "<input type='submit' name='submit' class='btn btn-primary' value='Download'>";
                                        echo "</form>";
                                      echo "</td>";
                                    echo "</tr>";
                                  }?>
                                </tbody>
                              </table><br>
                              <!-- product items-->
    
                            <?php } else if($order['delivery_status'] == "DELIVERED") {?>
                              
                              <!-- Heading -->
                              <div class="card mb-4 wow fadeIn" style="margin-bottom: 0rem !important;">
                                <h2 class="input-default" style="text-align:center;background-color:blue;color:white;padding:10px;font-size:20px"><b>ORDER DELIVERED</b></h2>
                              </div>
                              <!-- Heading -->

                              <!-- order details-->
                              <table id="example" class="table table-striped table-bordered zero-configuration">
                                <thead>
                                  <tr style='text-align:center'>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php if(!empty($order['_products'])) {
                                    $totalPrice = 0;
                                    foreach($order['_products'] as $product) {
                                      echo "<tr style='text-align:center'>";
                                        echo "<td>".$product['product']."</td>";
                                        echo "<td>".$product['quantity']." ".$product['units']."</td>";
                                        echo "<td>".$product['customer_price']."</td>";
                                      echo "</tr>";
                                    }
                                    echo "<tr style='text-align:center'>";
                                      echo "<td>ORIGINAL PRICE</td>";
                                      echo "<td colspan=2>".$order['total_original_price']." RS</td>";
                                    echo "</tr>";
                                    echo "<tr style='text-align:center'>";
                                      echo "<td>CUSTOMER PRICE</td>";
                                      echo "<td colspan=2>".$order['total_customer_price']." RS</td>";
                                    echo "</tr>";
                                    echo "<tr style='text-align:center'>";
                                      echo "<td>DELIVERY CHARGES</td>";
                                      echo "<td colspan=2>".$order['delivery_charges']." RS</td>";
                                    echo "</tr>";
                                    echo "<tr style='text-align:center'>";
                                      echo "<td>TOTAL AMOUNT USER PAID</td>";
                                      echo "<td colspan=2>";
                                      $totalAmount = $order['total_customer_price']+$order['delivery_charges'];
                                      echo $totalAmount." RS</td>";
                                    echo "</tr>";
                                    echo "<tr style='text-align:center'>";
                                      echo "<td>DELIVERED AT</td>";
                                      echo "<td colspan=2>".$order['delivered_at']."</td>";
                                    echo "</tr>";
                                    echo "<tr style='text-align:center'>";
                                      echo "<td>DOWNLOAD BILL</td>";
                                      echo "<td colspan=2>";
                                        echo "<form action='".base_url()."order/download/bill/".$order['uuid']."' method='post'>";
                                          echo "<input type='submit' name='submit' class='btn btn-primary' value='Download'>";
                                        echo "</form>";
                                      echo "</td>";
                                    echo "</tr>";
                                  }?>
                                </tbody>
                              </table><br>
                              <!-- order details-->

                            <?php } ?>

                          </div>
                        </div>
                        <!-- List of orders -->
                        
                      </div>
                    </div>
                  <?php $collapsed = " collapsed"; $expand = false; $show = ""; } ?>
                  <!-- Orders loop -->
                            
                </div>
              </div>
            </div>

          <?php } else {?>
            <div class="col-md-12">
              <div class="card">
                <div class="card-body" style="padding: 0.5rem 0.5rem;">
                  <!-- Heading -->
                  <div class="card mb-4 wow fadeIn" style="margin-bottom: 0rem !important;">
                    <h2 class="input-default" style="text-align:center;background-color:blue;color:white;padding:10px;font-size:20px"><b>NO ORDERS PLACED YET</b></h2>
                  </div>
                  <!-- Heading -->
                </div>
              </div>
            </div>
          <?php } ?>
          <!-- List Of Orders -->          
                  
        </div>
        <!-- Orders History -->
        
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