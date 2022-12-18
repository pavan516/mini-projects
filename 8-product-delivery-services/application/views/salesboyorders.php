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
      <div class="container-fluid" style="padding: 0.5rem 0.5rem;">
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
                            
                              <!-- Address -->
                              <textarea class="form-control" style="text-align:center;"; readonly>
                                Address: <?php 
                                echo $order['_address']['address'].", ";
                                echo $order['_address']['_area']['_city']['city_name'].", ";
                                echo $order['_address']['_area']['_city']['_state']['state_name'].", PINCODE: ";
                                echo $order['_address']['_area']['pincode']; ?>
                              </textarea>
                              <!-- Address -->

                              <!-- order details-->
                              <table class="table table-striped table-bordered table-hover" width="100%" cellspacing="0">
                                <thead>
                                  <tr style='text-align:center'>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Discount</th>
                                    <th>Total Price</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php if(!empty($order['_products'])) {
                                    foreach($order['_products'] as $product) {
                                      echo "<tr style='text-align:center'>";
                                        echo "<td><img src='".base_url().$product['_product']['image']."' style='width:50px;height:50px;'>".$product['_product']['name']."</td>";
                                        echo "<td>".$product['quantity']." X ".$product['_product']['original_price']." = ".$product['quantity']*$product['_product']['original_price']." ".$order['_products'][0]['_product']['currency']."</td>";
                                        echo "<td>".$product['_product']['discount_pct']." %</td>";
                                        echo "<td>";
                                          echo $product['_product']['currency']." ".$product['quantity']*$product['_product']['selling_price'];
                                        echo "</td>";
                                      echo "</tr>";
                                    }
                                  }?>
                                  <tr>
                                    <td style='text-align:center' colspan="3">Total Original Price</td>
                                    <td><?php echo $order['_products'][0]['_product']['currency']." ".$order['total_original_price']; ?></td>
                                  </tr>
                                  <tr>
                                    <td style='text-align:center' colspan="3">Total Discount</td>
                                    <td><?php echo $order['_products'][0]['_product']['currency']." ".$order['total_discount_price']; ?></td>
                                  </tr>
                                  <tr>
                                    <td style='text-align:center' colspan="3">Total Amount To Pay</td>
                                    <td><?php echo $order['_products'][0]['_product']['currency']." ".$order['total_selling_price']; ?></td>
                                  </tr>
                                  <tr style='text-align:center'>
                                    <td colspan=4>
                                      <form action="<?php echo base_url();?>index.php/salesboy/order/delivered" method="post">
                                        <input type="hidden" name="order_uuid" value="<?php echo $order['uuid']; ?>">
                                        <div style="text-align:center;">
                                          <button type="submit" class="btn btn-primary">AMOUNT RECEIVED & PRODUCTS DELIVERED</button>
                                        </div>
                                      </form>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                              <!-- order details-->
                            
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
      </div>
    </div>
    <!-- Main Center Body -->
      
    <!-- Footer -->
    <?php include('includes/footer.php'); ?>
    <!-- Footer -->
<script>
</script>
  </div>
  <!-- Main wrapper -->

  <!-- Footer Scripts -->
  <?php include('includes/footerscripts.php'); ?>
  <!-- Footer Scripts -->

</body>
</html>