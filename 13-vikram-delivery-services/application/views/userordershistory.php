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

          <!-- Search box -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-body" style="padding: 0.5rem 0.5rem;">

                <!-- Search form -->
                <form action="<?php echo base_url();?>user/orders/history" method="get">

                  <!-- search filters -->
                  <div class="form-row">
                    <div class="form-group col-md-2">
                      <select id="year" name="year" class="form-control">
                        <?php if(!empty($this->input->get('year') ?? "")) {?>
                          <option value="<?php echo $this->input->get('year'); ?>" selected><?php echo $this->input->get('year'); ?></option>
                        <?php } else {?>
                          <option value="" selected>YEAR</option>
                        <?php } ?>
                        <?php for($i=2020; $i<=date('Y'); $i++) {?>
                          <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group col-md-2">
                      <select id="month" name="month" class="form-control">
                        <option value="">MONTH</option>
                        <?php $months = ['01'=>'JANUARY','02'=>'FEBRUARY','03'=>'MARCH','04'=>'APRIL','05'=>'MAY','06'=>'JUNE','07'=>'JULY','08'=>'AUGUST','09'=>'SEPTEMBER','10'=>'OCTOBER','11'=>'NOVEMBER','12'=>'DECEMBER'];
                        foreach($months as $key => $month) {
                          if(!empty($this->input->get('month') ?? "")) {
                            if($this->input->get('month') == $key) {?>
                              <option value="<?php echo $key; ?>" selected><?php echo $month; ?></option>
                            <?php } else {?>
                              <option value="<?php echo $key; ?>"><?php echo $month; ?></option>
                            <?php } ?>
                          <?php } else {?>
                            <option value="<?php echo $key; ?>"><?php echo $month; ?></option>
                          <?php } ?>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group col-md-2">
                      <?php if(!empty($this->input->get('order_date') ?? "")) {?>
                        <input type="date" name="order_date" id="order_date" class="form-control" value="<?php echo $this->input->get('order_date'); ?>">
                      <?php } else {?>
                        <input type="date" name="order_date" id="order_date" class="form-control" placeholder="DATE">
                      <?php } ?>
                    </div>
                    <div class="form-group col-md-2">
                      <select id="order_type" name="order_type" class="form-control">
                        <?php if(!empty($this->input->get('order_type') ?? "")) {?>
                          <option value="<?php echo $this->input->get('order_type'); ?>"><?php echo $this->input->get('order_type'); ?></option>
                        <?php } else {?>
                          <option value="">ORDER TYPE</option>
                        <?php } ?>
                        <option value="">ORDER TYPE</option>
                        <option value="ONLINE">ONLINE</option>
                        <option value="OFFLINE">OFFLINE</option>
                      </select>
                    </div>
                    <div class="form-group col-md-2">
                      <?php if(!empty($this->input->get('order_no') ?? "")) {?>
                        <input type="text" name="order_no" id="order_no" class="form-control" value="<?php echo $this->input->get('order_no'); ?>">
                      <?php } else {?>
                        <input type="text" name="order_no" id="order_no" class="form-control" placeholder="ORDER NO">
                      <?php } ?>
                    </div>
                    <div class="form-group col-md-2" style="text-align:center;padding-top:5px">
                      <button type="submit" name="submit" id="submit" class="btn btn-primary">SEARCH</button>
                      <a href="<?php echo base_url();?>user/orders/history"class="btn btn-primary">RESET</a>
                    </div>
                  </div>
                  <!-- search filters -->

                </form>
                <!-- Search form -->

              </div>
            </div>
          </div>
          <!-- Search box -->
        
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
                            
                            <!-- CLOSED_VDS | CLOSED_USER | DELIVERED-->
                            <?php if($order['delivery_status'] == "CLOSED_VDS") {?>

                              <!-- Heading -->
                              <div class="card mb-4 wow fadeIn" style="margin-bottom: 0rem !important;">
                                <h2 class="input-default" style="text-align:center;background-color:blue;color:white;padding:10px;font-size:20px"><b>ORDER CLOSED</b></h2>
                              </div>
                              <!-- Heading -->

                              <!-- order details-->
                              <table id="example" class="table table-striped table-bordered zero-configuration">
                                <thead>
                                  <tr style='text-align:center'>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Units</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php if(!empty($order['_products'])) {
                                    $totalPrice = 0;
                                    foreach($order['_products'] as $product) {
                                      echo "<tr style='text-align:center'>";
                                        echo "<td>".$product['product']."</td>";
                                        echo "<td>".$product['quantity']."</td>";
                                        echo "<td>".$product['units']."</td>";
                                      echo "</tr>";
                                    }
                                    echo "<tr style='text-align:center'>";
                                      echo "<td colspan=3 style='color:red;'>ORDER CLOSED BY VIKRAM DELIVERY SERVICE</td>";
                                    echo "</tr>";
                                  }?>
                                </tbody>
                              </table><br>
                              <!-- order details-->

                            <?php } else if($order['delivery_status'] == "CLOSED_USER") {?>

                              <!-- Heading -->
                              <div class="card mb-4 wow fadeIn" style="margin-bottom: 0rem !important;">
                                <h2 class="input-default" style="text-align:center;background-color:blue;color:white;padding:10px;font-size:20px"><b>ORDER CLOSED</b></h2>
                              </div>
                              <!-- Heading -->

                              <!-- order details-->
                              <table id="example" class="table table-striped table-bordered zero-configuration">
                                <thead>
                                  <tr style='text-align:center'>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Units</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php if(!empty($order['_products'])) {
                                    $totalPrice = 0;
                                    foreach($order['_products'] as $product) {
                                      echo "<tr style='text-align:center'>";
                                        echo "<td>".$product['product']."</td>";
                                        echo "<td>".$product['quantity']."</td>";
                                        echo "<td>".$product['units']."</td>";
                                      echo "</tr>";
                                    }
                                    echo "<tr style='text-align:center'>";
                                      echo "<td colspan=3 style='color:red;'>ORDER CLOSED BY USER</td>";
                                    echo "</tr>";
                                  }?>
                                </tbody>
                              </table><br>
                              <!-- order details-->

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
                                      echo "<td>PRODUCTS PRICE</td>";
                                      echo "<td colspan=2>".$order['total_customer_price']." RS</td>";
                                    echo "</tr>";
                                    echo "<tr style='text-align:center'>";
                                      echo "<td>DELIVERY CHARGES</td>";
                                      echo "<td colspan=2>".$order['delivery_charges']." RS</td>";
                                    echo "</tr>";
                                    echo "<tr style='text-align:center'>";
                                      echo "<td>TOTAL AMOUNT PAID</td>";
                                      echo "<td colspan=2>";
                                      $totalAmount = $order['total_customer_price']+$order['delivery_charges'];
                                      echo $totalAmount." RS</td>";
                                    echo "</tr>";
                                    echo "<tr style='text-align:center'>";
                                      echo "<td>DELIVERED ON</td>";
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