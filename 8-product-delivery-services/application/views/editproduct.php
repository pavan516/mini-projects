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
        
          <!-- Create An Product -->
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

                <!-- Edit Product -->
                <p class="text-muted"><code></code></p>
                <div id="accordion-two" class="accordion">
                  <div class="card">
                    <div class="card-header" style="padding:0.0rem 0.0rem;">
                      <h5 class="mb-0" data-toggle="collapse" data-target="#createproduct" aria-expanded="true" aria-controls="createproduct" style="text-align:center;background-color:blue;color:white;padding:10px;font-size:20px"><b><i class="fa" aria-hidden="true"></i> VIEW | EDIT - PRODUCT</b></h5>
                    </div>
                    <div id="createproduct" class="collapse show" data-parent="#accordion-two">
                      <div class="card-body" style="padding: 1rem 0rem;">
                        <!-- Basic Form -->
                        <div class="basic-form">
                          <form action="<?php echo base_url(); ?>index.php/product/update" method="post" enctype="multipart/form-data">

                            <!-- product uuid -->
                            <input type="hidden" name="uuid" value="<?php echo $product['uuid']; ?>">
                            <!-- product uuid -->

                            <!-- name & code -->
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label>Product Name <b style="color:red;">*</b></label>
                                <input type="text" name="name" id="name" class="form-control" value="<?php echo $product['name']; ?>" required>
                              </div>
                              <div class="form-group col-md-6">
                                <label>Product Code <b style="color:red;">*</b></label>
                                <input type="text" name="code" id="code" class="form-control" value="<?php echo $product['code']; ?>" required>
                              </div>
                            </div>
                            <!-- name & code -->

                            <!-- original price, currency, discount percentage & selling price -->
                            <div class="form-row">
                              <div class="form-group col-md-3">
                                <label>Original Price <b style="color:red;">*</b></label>
                                <input type="number" name="original_price" id="original_price" class="form-control" value="<?php echo $product['original_price']; ?>" required>
                              </div>
                              <div class="form-group col-md-3">
                                <label>Currency <b style="color:red;">*</b></label>
                                <input type="text" name="currency" id="currency" class="form-control" value="<?php echo $product['currency']; ?>" required>
                              </div>
                              <div class="form-group col-md-3">
                                <label>Discount Percentage <b style="color:red;">*</b></label>
                                <input type="number" name="discount_pct" id="discount_pct" class="form-control" value="<?php echo $product['discount_pct']; ?>" required>
                              </div>
                              <div id="getsellingprice" class="form-group col-md-3">
                                <label>Selling Price</label>
                                <input type="text" name="selling_price" id="selling_price" class="form-control" value="<?php echo $product['selling_price']; ?>" readonly>
                              </div>
                            </div>
                            <!-- original price, currency, discount percentage & selling price -->

                            <!-- product details, tags -->
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label>Product Details</label>
                                <input type="text" name="details" id="details" class="form-control" value="<?php echo $product['details']; ?>">
                              </div>
                              <div class="form-group col-md-6">
                                <label>Product Tags</label>
                                <input type="text" name="tags" id="tags" class="form-control" value="<?php echo $product['tags']; ?>">
                              </div>
                            </div><br>
                            <!-- product details, tags -->

                            <!-- model, batch no, quantity & status -->
                            <div class="form-row">
                              <div class="form-group col-md-3">
                                <label>Year Of Model</label>
                                <input type="date" name="model_year" id="model_year" class="form-control" value="<?php echo $product['model_year']; ?>">
                              </div>
                              <div class="form-group col-md-3">
                                <label>Batch Number</label>
                                <input type="text" name="batchno" id="batchno" class="form-control" value="<?php echo $product['batchno']; ?>">
                              </div>
                              <div class="form-group col-md-3">
                                <label>Quantity <b style="color:red;">*</b></label>
                                <input type="number" name="quantity" id="quantity" class="form-control" value="<?php echo $product['quantity']; ?>" required>
                              </div>
                              <div class="form-group col-md-3">
                                <label>Status</label>
                                <select class="form-control" name="status" id="status">
                                  <?php if($product['status'] == 1) {?>
                                    <option value="1" selected>IN SALE</option>
                                    <option value="0">NOT IN SALE</option>
                                  <?php } else { ?>
                                    <option value="1">IN SALE</option>
                                    <option value="0" selected>NOT IN SALE</option>
                                  <?php } ?>            
                                </select>
                              </div>
                            </div>
                            <!-- model, batch no, quantity & status -->

                            <!-- image -->
                            <div class="form-row">
                              <label>Product Image <?php if(!empty($product['image'])) echo "Image already exist! - Please update if required"; ?></label>
                              <div class="custom-file">
                                <input type="file" name="image" id="image" class="custom-file-input">
                                <label class="custom-file-label">Choose file</label>
                              </div>
                            </div><br>
                            <!-- image -->

                            <!-- Update Button -->
                            <div style="text-align:center;">
                              <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Update Product" />
                              <a href="<?php echo base_url(); ?>index.php/products" class="btn btn-primary">Cancel</a>
                            </div>
                            <!-- Update Button -->
                          
                          </form>
                        </div>
                        <!-- Basic Form -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Edit Product -->
                           
              </div>
            </div>
          </div>
          <!-- Edit Product -->
                    
        </div>
      </div>
    </div>
    <!-- Main Center Body -->
      
    <!-- Footer -->
    <?php include('includes/footer.php'); ?>
    <!-- Footer -->

    <!-- Script For Product Changes -->
    <script type="text/javascript">
    $( document ).ready(function() {
      $('#original_price, #discount_pct, #currency').change(function () {
        var originalprice = ($("#original_price").val() != 0) ? parseFloat($("#original_price").val()) : 0;
        var discountpct = ($("#discount_pct").val() != 0) ? parseFloat($("#discount_pct").val()) : 0;
        var currency = ($("#currency").val() != '') ? $("#currency").val() : "RS";  

        /** calculate selling price */
        if(discountpct != 0) {
          var selling_price = originalprice - ((originalprice*discountpct)/100).toFixed(2);
          selling_price += " "+currency;
          $('#selling_price').val(selling_price);
        } else {
          var selling_price = originalprice+" "+currency;
          $('#selling_price').val(selling_price);
        }
      });
    });
    </script>
    <!-- Script For Product Changes -->

  </div>
  <!-- Main wrapper -->

  <!-- Footer Scripts -->
  <?php include('includes/footerscripts.php'); ?>
  <!-- Footer Scripts -->

</body>
</html>