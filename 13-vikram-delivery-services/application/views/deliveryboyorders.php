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
                            
                            <!-- acceptance code -->
                            <?php if($order['delivery_status'] == "DELIVERYBOY_ASSIGNED") {?>
                                  
                              <!-- Note -->
                              <b><p style="font-size:10px;text-align:center;">please contact <?php echo $order['_user']['name'].' @ '.$order['_user']['mobile'].' for any questions!';?></p></b>
                              <hr>
                              <!-- Note -->

                              <!-- Address -->
                              <?php if(!empty($order['_address']['address'])) {?>
                                <textarea class="form-control" placeholder="Address: <?php echo $order['_address']['address']; ?>" readonly></textarea>
                              <?php } else {?>
                                <p style="text-align:center;"><b>Address: <a href="<?php echo $order['_address']['google_map_link']; ?>" target="_blank">GOOGLE MAP LINK</a></b></p><hr>
                              <?php } ?>
                              <!-- Address -->
                              
                              <!-- product, quantity, units, original & customer price-->
                              <?php
                              $count = 1;
                              if(!empty($order['_products'])) {
                                foreach($order['_products'] as $product) {?>
                                  
                                  <!-- Heading -->
                                  <div class="card mb-4 wow fadeIn" style="margin-bottom: 0rem !important;">
                                    <h2 class="input-default" style="text-align:center;background-color:blue;color:white;padding:10px;font-size:20px"><b>PRODUCT <?php echo $count; ?></b></h2>
                                  </div>
                                  <!-- Heading -->

                                  <!-- Form -->
                                  <form id="updateorderitem_<?php echo $product['id']; ?>" method="post">

                                    <!-- product, quantity, units, original & customer price-->
                                    <table id="example" class="table table-striped table-bordered zero-configuration">
                                      <thead>
                                        <tr style='text-align:center'>
                                          <th>Product</th>
                                          <th>Quantity</th>
                                          <th>Units</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php
                                        echo "<tr style='text-align:center'>";
                                          echo "<td>".$product['product']."</td>";
                                          echo "<td>".$product['quantity']."</td>";
                                          echo "<td>".$product['units']."</td>";
                                        echo "</tr>";
                                        echo "<tr style='text-align:center'>";
                                          echo "<td>Availability</td>";
                                          echo "<td colspan=2>";
                                            echo "<select name='orderitem[availability]' class='form-control' style='width:180px;'>";
                                              echo "<option value='1'>AVAILABLE</option>";
                                              echo "<option value='0'>UN-AVAILABLE</option>";
                                            echo "</select>";
                                          echo "</td>";
                                        echo "</tr>";
                                        echo "<tr style='text-align:center'>";
                                          echo "<td>Original Price</td>";
                                          echo "<td colspan=2>";
                                            echo "<input type='number' name='orderitem[original_price]' value='".$product['original_price']."' class='form-control' style='width:180px;' required>";
                                          echo "</td>";
                                        echo "</tr>";
                                        echo "<tr style='text-align:center'>";
                                          echo "<td>Customer Price</td>";
                                          echo "<td colspan=2>";
                                            echo "<input type='number' name='orderitem[customer_price]' value='".$product['customer_price']."' class='form-control' style='width:180px;' required>";
                                          echo "</td>";
                                        echo "</tr>";
                                        echo "<tr style='text-align:center'>";
                                          echo "<td>Purchased From</td>";
                                          echo "<td colspan=2>";
                                            echo "<input type='text' name='orderitem[purchased_from]' value='".$product['purchased_from']."' class='form-control' style='width:180px;' required>";
                                          echo "</td>";
                                        echo "</tr>";
                                        echo "<tr style='text-align:center'>";
                                          echo "<td>Shop Mobile No</td>";
                                          echo "<td colspan=2>";
                                            echo "<input type='number' name='orderitem[shop_mobile_no]' value='".$product['shop_mobile_no']."' class='form-control' style='width:180px;' required>";
                                          echo "</td>";
                                        echo "</tr>";
                                        echo "<tr style='text-align:center'>";
                                          echo "<td colspan=3>";
                                            echo "<button type='submit' class='btn btn-primary'>SAVE</button>";
                                            echo "<div id='result_".$product['id']."'></div>";
                                          echo "</td>";
                                        echo "</tr>";
                                        ?>
                                      </tbody>
                                    </table>
                                    <!-- product, quantity, units, original & customer price-->

                                  </form>
                                  <!-- Form -->

                                  <!-- update order item -->
                                  <script>  
                                  $(document).ready(function()
                                  {   
                                    $('#updateorderitem_<?php echo $product['id']; ?>').on('submit', function(event)
                                    {
                                      event.preventDefault();
                                      $.ajax({
                                        url: "<?php echo base_url(); ?>order/item/update/<?php echo $product['id']; ?>",
                                        method:"POST",
                                        data:new FormData(this),
                                        contentType:false,
                                        cache:false,
                                        processData:false,
                                        success: function(data){
                                          $('#result_<?php echo $product['id']; ?>').fadeIn().html("<h5 style='color:green;'>"+ data + "</h5>");
                                          setTimeout(function() {
                                              $('#result_<?php echo $product['id']; ?>').fadeOut('fast');
                                          }, 3000);	
                                        }
                                      })
                                    });
                                  }); 
                                  </script>
                                  <!-- update order item -->

                                <?php $count += 1; }
                              }?>
                              <!-- product, quantity, units, original & customer price-->

                              <!-- Completed Submission -->
                              <form action="<?php echo base_url();?>deliveryboy/order/update/status" method="post">
                                <input type="hidden" name="order_uuid" value="<?php echo $order['uuid']; ?>">
                                <div style="text-align:center;">
                                  <button type="submit" class="btn btn-primary">ALL PRODUCTS TAKEN</button>
                                </div>
                              </form>
                              <!-- Completed Submission -->
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

                              <!-- Completed Submission -->
                              <form action="<?php echo base_url();?>deliveryboy/order/delivered" method="post">
                                <input type="hidden" name="order_uuid" value="<?php echo $order['uuid']; ?>">
                                <div style="text-align:center;">
                                  <button type="submit" class="btn btn-primary">PAYMENT RECEIVED & ORDER DELIVERED</button>
                                </div>
                              </form>
                              <!-- Completed Submission -->

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