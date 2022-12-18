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
        
          <!-- Create An Order -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-body" style="padding: 0.5rem 0.5rem;">

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

                <!-- Time check -->
                <?php if(date("H") <= 7 || date("H") >= 22) { ?>
                  <!-- Heading -->
                  <div class="card mb-4 wow fadeIn" style="margin-bottom: 0rem !important;">
                    <h2 class="input-default" style="text-align:center;background-color:blue;color:white;padding:10px;font-size:20px"><b>CURRENTLY NOT ACCEPTING ORDER - SERVICE TIME (8AM TO 10PM)</b></h2>
                  </div>
                  <!-- Heading -->
                <?php } else { ?>
                  <!-- Create An Order -->
                  <p class="text-muted"><code></code></p>
                  <div id="accordion-one" class="accordion">
                    <div class="card">
                      <div class="card-header" style="padding:0.0rem 0.0rem;">
                        <h5 class="mb-0 collapsed" data-toggle="collapse" data-target="#createorder" aria-expanded="false" aria-controls="createorder" style="text-align:center;background-color:blue;color:white;padding:10px;font-size:20px"><b><i class="fa" aria-hidden="true"></i> CREATE NEW ORDER</b></h5>
                      </div>
                      <div id="createorder" class="collapse" data-parent="#accordion-one">
                        <div class="card-body" style="padding: 1rem 0rem;">
                          <!-- Basic Form -->
                          <div class="basic-form">
                            <form id="insertorders" method="post">

                              <!-- Initialize variable -->
                              <?php $index = 0; ?>
                              <!-- Initialize variable -->
                              
                              <!-- Select address -->
                              <?php if(empty($addresses)) { ?>
                                <!-- city, state, country, pincode -->
                                <div class="form-row">
                                  <div class="form-group col-md-3">
                                    <label>City</label>
                                    <input type="text" name="city" id="city" class="form-control" value="GAJWEL" readonly>
                                  </div>
                                  <div class="form-group col-md-3">
                                    <label>State</label>
                                    <input type="text" name="state" id="state" class="form-control" value="TELANGANA" readonly>
                                  </div>
                                  <div class="form-group col-md-3">
                                    <label>Country</label>
                                    <input type="text" name="country" id="country" class="form-control" value="INDIA" readonly>
                                  </div>
                                  <div class="form-group col-md-3">
                                    <label>Pincode</label>
                                    <input type="text" name="pincode" id="pincode" class="form-control" value="502278" readonly>
                                  </div>
                                </div>
                                <!-- city, state, country, pincode -->

                                <!-- Address Name -->
                                <div class="form-row">
                                  <label>Address Name</label>
                                  <input type="text" name="name" id="name" class="form-control" placeholder="Address Name" required>
                                </div><br>
                                <!-- Address Name -->

                                <!-- Google map link -->
                                <div class="form-row">
                                  <label>Share Google Map Link Of Your Home Address | From Here : <b><a href="https://www.google.com/maps" target="_blank">CLICK HERE</a></b></label>
                                  <input type="text" name="google_map_link" id="google_map_link" class="form-control" placeholder="Google Map Link">
                                </div><br>
                                <!-- Google map link -->

                                <!-- address -->
                                <div class="form-group">
                                  <label>If You Are Not Aware Of Google Maps, Please share your home address</label>
                                  <textarea name="address" id="address" rows="5" class="form-control" placeholder="Home Address"></textarea>
                                </div>
                                <!-- address -->
                              <?php } else { ?>
                                <!-- Address -->
                                <div class="form-row">
                                  <div class="form-group col-md-12">
                                    <select id="address_uuid" name="address_uuid" class="form-control">
                                      <option value="">Select Address To Deliver</option>
                                      <?php if(!empty($addresses)) {
                                        foreach($addresses as $address) {?>
                                          <option value="<?php echo $address['uuid']; ?>"><?php echo $address['name']; ?></option>
                                        <?php }
                                      } ?>
                                    </select>
                                  </div>
                                </div>
                                <!-- Address -->
                              <?php } ?>
                              <!-- Select address -->

                              <!-- Add Products -->
                              <div class="form-row">
                                <!-- Products -->
                                <div class="form-group col-md-6">
                                  <input type="text" name="orders[<?php echo $index; ?>][product]" id="orders[<?php echo $index; ?>][product]" class="form-control" placeholder="Product name (ex: apple/tamato/rice-bag/etc..)" required>
                                </div>
                                <!-- Products -->
                                <!-- Quantity -->
                                <div class="form-group col-xs-6">
                                  <select id="orders[<?php echo $index; ?>][quantity]" name="orders[<?php echo $index; ?>][quantity]" class="form-control">
                                    <option value="other">Select Quantity</option>
                                    <?php for($i=1; $i<=1000; $i++) {?>
                                      <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                                <!-- Quantity -->
                                <!-- Units -->
                                <div class="form-group col-xs-6">
                                  <select id="orders[<?php echo $index; ?>][units]" name="orders[<?php echo $index; ?>][units]" class="form-control">
                                    <option value="other">Unit Type</option>
                                    <option value="units">Units</option>
                                    <option value="grams">Grams</option>
                                    <option value="kgs">Kgs</option>
                                    <option value="dozens">Dozens</option>
                                    <option value="litres">Litres</option>
                                  </select>
                                </div>
                                <!-- Units -->
                              </div>
                              <!-- product, quantity & units -->

                              <!-- New products will add here -->
                              <div id="new_products_will_add_here"></div>
                              <!-- New products will add here -->

                              <!-- Create Button -->
                              <div style="text-align:center;">
                                <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
                                <button id="addnewproduct" class="add_field_button btn btn-primary"><i class="fa fa-plus" style="font-size:20px;"></i></button>
                              </div>
                              <!-- Create Button -->

                              <!-- Result -->
                              <div id="result"></div>
                              <!-- Result -->

                              <!-- Insert orders -->
                              <script>  
                              $(document).ready(function()
                              {   
                                $('#insertorders').on('submit', function(event)
                                {
                                  event.preventDefault();
                                  $.ajax({
                                    url: "<?php echo base_url(); ?>user/order/insert",
                                    method:"POST",
                                    data:new FormData(this),
                                    contentType:false,
                                    cache:false,
                                    processData:false,
                                    success: function(data){
                                      top.location.href="<?php echo base_url(); ?>user/orders";//redirection	
                                    }
                                  })
                                });
                              }); 
                              </script>
                              <!-- Insert orders -->

                              <!-- Add New Textarea For Add -->
                              <script type="text/javascript">
                              jQuery(document).ready(function() {
                                // Input Fields
                                var wrapper   		= $("#new_products_will_add_here"); //Fields wrapper
                                var add_button    = $("#addnewproduct"); //Add button ID
                                
                                // Add New Product
                                var x = <?php echo $index; ?>; //initlal text box count
                                jQuery(add_button).click(function(e){ //on add input button click
                                  e.preventDefault();
                                  x++; // Increment the value
                                  $(wrapper).append('<hr><div class="form-row"><div class="form-group col-md-6"><input type="text" name="orders['+x+'][product]" id="orders['+x+'][product]" class="form-control" placeholder="Product name (ex: apple/tamato/rice-bag/etc..)" ></div><div class="form-group col-xs-6"><select id="orders['+x+'][quantity]" name="orders['+x+'][quantity]" class="form-control"><option value="other">Select Quantity</option><?php for($i=1; $i<=1000; $i++) {?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?></select></div><div class="form-group col-xs-6"><select id="orders['+x+'][units]" name="orders['+x+'][units]" class="form-control"><option value="other">Unit Type</option><option value="units">Units</option><option value="grams">Grams</option><option value="kgs">Kgs</option><option value="dozens">Dozens</option><option value="litres">Litres</option></select></div><div class="form-group col-xs-6"><a href="#" style="background-color:#000000;color:white;" class="remove_field btn btn-default"><i class="fa fa-trash-o" style="font-size:25px"></i></a></div></div>'); //add input box
                                });
                                
                                // Remove Text Box
                                $(document).on("click", ".remove_field", function(e) { //user click on remove text
                                  e.preventDefault(); $(this).parent().parent('div').remove(); x--;
                                })
                              });
                              </script>
                              <!-- End Of Add New Textarea For Add -->
                            
                            </form>
                          </div>
                          <!-- Basic Form -->
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Create An Order -->
                <?php } ?>
                           
              </div>
            </div>
          </div>
          <!-- Create An Order -->

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
                              <p style="text-align:center;">
                                Request Sent To <b>VIKRAM DELIVERY SERVICE</b><br><br>
                                We Will Notify The <br><b>Order Acceptance | Delivery Charges | Estimated Time Of Delivery</b><br><br>
                                Through SMS To Your Contact No <b><?php echo $this->session->userdata('mobile'); ?>
                              </p>
                            <?php } else if($order['delivery_status'] == "PENDING_USER") {?>
                              
                              <!-- Note -->
                              <b><p style="font-size:10px;text-align:center;">PLEASE CONTACT VIKRAM: 8187848405 For Any Support!</p></b>
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
                                      echo "<td colspan=3>DELIVERY CHARGES: ".$order['delivery_charges']." RS</td>";
                                    echo "</tr>";
                                    echo "<tr style='text-align:center'>";
                                      echo "<td colspan=3>ESTIMATED TIME OF DELIVERY: ".$order['exp_delivery_mins']." MINUTES</td>";
                                    echo "</tr>";
                                    echo "<tr style='text-align:center'>";
                                      echo "<td colspan=3>";?>
                                        <form action="<?php echo base_url();?>order/userupdate/status" method="post">
                                          <!-- Order uuid -->
                                          <input type="hidden" name="order_uuid" value="<?php echo $order['uuid']; ?>">
                                          <!-- Order uuid -->
                                          <!-- Accept order / Reject Order -->
                                          <div class="form-row">
                                            <select class="form-control" name="delivery_status" id="delivery_status">
                                              <option value="ACCEPTED">ACCEPT ORDER</option>
                                              <option value="CLOSED_USER">REJECT ORDER</option>
                                            </select>
                                          </div><br>
                                          <!-- Accept order / Reject Order -->
                                          <!-- Create Button -->
                                          <div style="text-align:center;">
                                            <button type="submit" class="btn btn-primary">SUBMIT</button>
                                          </div>
                                          <!-- Create Button -->
                                        </form>
                                      <?php echo "</td>";
                                    echo "</tr>";
                                  } else {
                                    echo "<tr>";
                                      echo "<td colspan='9' style='text-align:center;'>NO ITEMS ORDERED</td>";
                                    echo "</tr>";
                                  }?>
                                </tbody>
                              </table>
                              <!-- Show List of Items ordered -->
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
                                              foreach($order['_products'] as $product) {
                                                echo "<tr style='text-align:center'>";
                                                  echo "<td>".$product['product']."</td>";
                                                  echo "<td>".$product['quantity']." ".$product['units']."</td>";
                                                  echo "<td>".$product['customer_price']."</td>";
                                                echo "</tr>";
                                              }
                                              echo "<tr style='text-align:center'>";
                                                echo "<td>CUSTOMER PRICE</td>";
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
                                        <!-- order details-->
                                        
                                        <!-- Heading -->
                                        <div class="card mb-4 wow fadeIn" style="margin-bottom: 0rem !important;">
                                          <h2 class="input-default" style="text-align:center;background-color:blue;color:white;padding:10px;font-size:20px"><b>PRODUCT PURCHASE DETAILS</b></h2>
                                        </div>
                                        <!-- Heading -->
                                        
                                        <!-- order details-->
                                        <table id="example" class="table table-striped table-bordered zero-configuration">
                                          <thead>
                                            <tr style='text-align:center'>
                                              <th>Product</th>
                                              <th>Shop Name</th>
                                              <th>Mobile No</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <?php if(!empty($order['_products'])) {
                                              foreach($order['_products'] as $product) {
                                                echo "<tr style='text-align:center'>";
                                                  echo "<td>".$product['product']."</td>";
                                                  echo "<td>".$product['purchased_from']." ".$product['units']."</td>";
                                                  echo "<td>".$product['shop_mobile_no']."</td>";
                                                echo "</tr>";
                                              }
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