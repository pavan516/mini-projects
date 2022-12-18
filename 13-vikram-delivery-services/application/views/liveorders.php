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
                            <?php if($order['delivery_status'] == "PENDING_VDS") {?>

                              <!-- Note -->
                              <b><p style="font-size:20px;text-align:center;">NOTE: PLEASE CONTACT USER AT : <?php echo $order['_user']['mobile']; ?> If You Have Any Questions!</p></b>
                              <!-- Note -->
                              
                              <!-- Show List of Items ordered -->
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
                                  if(!empty($order['_products'])) {
                                    foreach($order['_products'] as $product) {
                                      echo "<tr style='text-align:center'>";
                                        echo "<td>".$product['product']."</td>";
                                        echo "<td>".$product['quantity']."</td>";
                                        echo "<td>".$product['units']."</td>";
                                      echo "</tr>";
                                    }
                                    echo "<tr style='text-align:center'>";
                                      if(!empty($order['_address']['address'])) {
                                        echo "<td colspan=3>ADDRESS: ".$order['_address']['address']."</td>";
                                      } else if(!empty($order['_address']['google_map_link'])) {
                                        echo "<td colspan=3>ADDRESS: <b><a href=".$order['_address']['google_map_link'] ?? ""." target='_blank'>GOOGLE MAP LINK</a></b></td>";
                                      } else {
                                        echo "<td colspan=3>ADDRESS NOT PROVIDED</td>";
                                      }
                                    echo "</tr>";
                                  } else {
                                    echo "<tr>";
                                      echo "<td colspan='9' style='text-align:center;'>NO ITEMS ORDERED</td>";
                                    echo "</tr>";
                                  }?>
                                </tbody>
                              </table>
                              <!-- Show List of Items ordered -->
                              
                              <!-- Update Order Status -->
                              <div class="card">
                                <div class="card-body">
                                  <form action="<?php echo base_url();?>order/vdsupdate/status" method="post">

                                    <!-- Order uuid -->
                                    <input type="hidden" name="order_uuid" value="<?php echo $order['uuid']; ?>">
                                    <!-- Order uuid -->

                                    <!-- delivery charges & time -->
                                    <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label>Delivery Charges</label>
                                        <input type="number" name="delivery_charges" id="delivery_charges" class="form-control" placeholder="Delivery Charges (ex: 25)" required>
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label>Time Of Delivery (In Minutes)</label>
                                        <input type="number" name="exp_delivery_at" id="exp_delivery_at" class="form-control" placeholder="Delivery Time In Minutes (ex: 45)" required>
                                      </div>
                                    </div>
                                    <!-- delivery charges & time -->

                                    <!-- Accept order / Reject Order -->
                                    <div class="form-row">
                                      <label>Select Status</label>
                                      <select class="form-control" name="delivery_status" id="delivery_status">
                                        <option value="PENDING_USER">ACCEPT ORDER</option>
                                        <option value="CLOSED_VDS">REJECT ORDER</option>
                                      </select>
                                    </div><br>
                                    <!-- Accept order / Reject Order -->

                                    <!-- Create Button -->
                                    <div style="text-align:center;">
                                      <button type="submit" class="btn btn-primary">SUBMIT</button>
                                    </div>
                                    <!-- Create Button -->

                                  </form>
                                </div>
                              </div>
                              <!-- Update Order Status -->
                              
                            <?php } else if($order['delivery_status'] == "PENDING_USER") {?>

                              <!-- Message -->
                              <p style="text-align:center;"><b>Please Be Patience Until User accept Your Order! - Contact User For More Details: <?php echo $order['_user']['mobile']; ?></b></p>
                              <!-- Message -->
                              
                            <?php } else if($order['delivery_status'] == "ACCEPTED") {?>
                              <!-- Update Order Status -->
                              <div class="card">
                                <div class="card-body">
                                  <form action="<?php echo base_url();?>order/vdsupdate/deliveryboy" method="post">

                                    <!-- Order uuid -->
                                    <input type="hidden" name="order_uuid" value="<?php echo $order['uuid']; ?>">
                                    <!-- Order uuid -->

                                    <!-- Address -->
                                    <div class="form-row">
                                      <label>Address</label>
                                      <?php if(!empty($order['_address']['address'])) {?>
                                        <textarea class="form-control" placeholder="Address: <?php echo $order['_address']['address']; ?>" readonly></textarea>
                                      <?php } else { ?>
                                        <b>Address: <a href="<?php echo $order['_address']['google_map_link']; ?>" target="_blank">GOOGLE MAP LINK</a></b>
                                      <?php } ?>
                                    </div><br>
                                    <!-- Address -->

                                    <!-- Delivery Boys -->
                                    <div class="form-row">
                                      <label>Assign Delivery Boy</label>
                                      <select class="form-control" name="deliveryboy_uuid" id="deliveryboy_uuid">
                                        <?php if(!empty($deliveryboys)) {
                                          foreach($deliveryboys as $deliveryboy) {
                                            echo '<option value="'.$deliveryboy['uuid'].'">'.$deliveryboy['name'].' - '.$deliveryboy['_addresses'][0]['address'].'</option>';
                                          }
                                        }?>
                                      </select>
                                    </div><br>
                                    <!-- Delivery Boys -->

                                    <!-- Create Button -->
                                    <div style="text-align:center;">
                                      <button type="submit" class="btn btn-primary">ORDER ASSIGN TO DELIVERY BOY</button>
                                    </div>
                                    <!-- Create Button -->

                                  </form>
                                </div>
                              </div>
                              <!-- Update Order Status -->
                              
                            <?php } else { ?>
                              <!-- Tab names -->
                              <ul class="nav nav-pills mb-3">
                                <li class="nav-item">
                                  <a href="#navpills-1" class="nav-link active" data-toggle="tab" aria-expanded="true">STATUS</a>
                                </li>
                                <li class="nav-item">
                                  <a href="#navpills-2" class="nav-link" data-toggle="tab" aria-expanded="false">PRICES & BILL</a>
                                </li>
                              </ul>
                              <!-- Tab names -->

                              <!-- List of tabs list -->
                              <div class="tab-content br-n pn">

                                <!-- TAB 1 -->
                                <div id="navpills-1" class="tab-pane active">
                                  <div class="row align-items-center">
                                    <div class="col-sm-6 col-md-8 col-xl-10">

                                      <!-- Progress bar -->
                                      <div class="holder">
                                        <ul class="SteppedProgress Vertical">
                                          <?php 
                                          if($order['delivery_status'] == "ACCEPTED") {?>
                                            <li class="complete boxed"><span>ORDER ACCEPTED</span></li>
                                            <li class="current"><span>DELIVERY BOY STARTED</span></li>
                                            <li class="boxed"><span>PURCHASING</span></li>
                                            <li class="boxed"><span>ARRIVING</span></li>
                                            <li class="boxed"><span>DELIVERED</span></li>
                                          <?php } else if($order['delivery_status'] == "DELIVERYBOY_ASSIGNED") {?>
                                            <li class="complete boxed"><span>ORDER ACCEPTED</span></li>
                                            <li class="complete boxed"><span>DELIVERY BOY STARTED</span></li>
                                            <li class="current"><span>PURCHASING</span></li>
                                            <li class="boxed"><span>ARRIVING</span></li>
                                            <li class="boxed"><span>DELIVERED</span></li>
                                          <?php } else if($order['delivery_status'] == "ARRIVING") {?>
                                            <li class="complete boxed"><span>ORDER ACCEPTED</span></li>
                                            <li class="complete boxed"><span>DELIVERY BOY STARTED</span></li>
                                            <li class="complete boxed"><span>PURCHASING</span></li>
                                            <li class="current"><span>ARRIVING</span></li>
                                            <li class="boxed"><span>DELIVERED</span></li>
                                          <?php }?>
                                        </ul>
                                      </div>
                                      <!-- Progress bar -->
                                    </div>
                                  </div>
                                </div>
                                <!-- TAB 1 -->

                                <!-- TAB 2 -->
                                <div id="navpills-2" class="tab-pane">
                                  <div class="card">
                                    <div class="card-body" style="padding: 0.5rem 0.5rem;">

                                      <?php if($order['delivery_status'] == "ARRIVING") {?>
                                        <!-- Heading -->
                                        <div class="card mb-4 wow fadeIn" style="margin-bottom: 0rem !important;">
                                          <h2 class="input-default" style="text-align:center;background-color:blue;color:white;padding:10px;font-size:20px"><b>ORDER PRICE DETAILS</b></h2>
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
                                                echo "<td>TOTAL AMOUNT NEED TO PAY BY CUSTOMER</td>";
                                                echo "<td colspan=2>";
                                                $totalAmount = $order['total_customer_price']+$order['delivery_charges'];
                                                echo $totalAmount." RS</td>";
                                              echo "</tr>";
                                              echo "<tr style='text-align:center'>";
                                                echo "<td>NET PROFIT ON ORDER</td>";
                                                echo "<td colspan=2>";
                                                $netProfit = $order['delivery_charges'] + ($order['total_customer_price']-$order['total_original_price']);
                                                echo $netProfit." RS</td>";
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

                                        <!-- DOWNLOAD BILL -->
                                        <script>  
                                        $(document).ready(function()
                                        {   
                                          $('#downloadbill').on('submit', function(event)
                                          {
                                            event.preventDefault();
                                            $.ajax({
                                              url: "<?php echo base_url(); ?>order/download/bill/<?php echo $order['uuid']; ?>",
                                              method:"POST",
                                              contentType:false,
                                              cache:false,
                                              processData:false,
                                              success: function(data){}
                                            })
                                          });
                                        }); 
                                        </script>
                                        <!-- DOWNLOAD BILL -->

                                      <?php } else {?>
                                        <p style="text-align:center;"><b>We update your product prices & generate bill. Once our delivery boy purchase your products & Update Prices. Thank You!</b></p>
                                      <?php } ?>

                                    </div>
                                  </div>
                                </div>
                                <!-- TAB 2 -->

                              </div>
                              <!-- List of tabs list -->

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

  </div>
  <!-- Main wrapper -->

  <!-- Footer Scripts -->
  <?php include('includes/footerscripts.php'); ?>
  <!-- Footer Scripts -->

  <!-- Script -->
  <script>
  $('#example').dataTable({
    "bPaginate": false,
    "bLengthChange": false,
    "bFilter": false,
    "bInfo": false,
    "bAutoWidth": false
  });
  </script>
  <!-- Script -->

</body>
</html>