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

                <!-- Create An Order -->
                <p class="text-muted"><code></code></p>
                <div id="accordion-one" class="accordion">
                  <div class="card">
                    <div class="card-header" style="padding:0.0rem 0.0rem;">
                      <h5 class="mb-0" data-toggle="collapse" data-target="#createorder" aria-expanded="true" aria-controls="createorder" style="text-align:center;background-color:blue;color:white;padding:10px;font-size:20px"><b><i class="fa" aria-hidden="true"></i> CREATE OFFLINE ORDER</b></h5>
                    </div>
                    <div id="createorder" class="collapse show" data-parent="#accordion-one">
                      <div class="card-body" style="padding: 1rem 0rem;">
                        <!-- Basic Form -->
                        <div class="basic-form">
                          <form id="insertorders" method="post">

                            <!-- Initialize variable -->
                            <?php $index = 0; ?>
                            <!-- Initialize variable -->

                            <!-- delivery charges & time -->
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label>Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
                              </div>
                              <div class="form-group col-md-6">
                                <label>Mobile Number</label>
                                <input type="number" name="mobile" id="mobile" class="form-control" placeholder="Mobile Number" required>
                              </div>
                            </div>
                            <!-- delivery charges & time -->

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
                            
                            <!-- product, quantity & units -->
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <input type="text" name="orders[<?php echo $index; ?>][product]" id="orders[<?php echo $index; ?>][product]" class="form-control" placeholder="Product name (ex: apple/tamato/rice-bag/etc..)" required>
                              </div>
                              <div class="form-group col-xs-6">
                                <select id="orders[<?php echo $index; ?>][quantity]" name="orders[<?php echo $index; ?>][quantity]" class="form-control">
                                  <option value="other">Select Quantity</option>
                                  <?php for($i=1; $i<=1000; $i++) {?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                  <?php } ?>
                                </select>
                              </div>
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
                                  url: "<?php echo base_url(); ?>order/offline/insert",
                                  method:"POST",
                                  data:new FormData(this),
                                  contentType:false,
                                  cache:false,
                                  processData:false,
                                  success: function(data){
                                    top.location.href="<?php echo base_url(); ?>orders/live";//redirection
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
                           
              </div>
            </div>
          </div>
          <!-- Create An Order -->

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