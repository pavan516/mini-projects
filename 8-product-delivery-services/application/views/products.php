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

                <!-- Create An Product -->
                <p class="text-muted"><code></code></p>
                <div id="accordion-one" class="accordion">
                  <div class="card">
                    <div class="card-header" style="padding:0.0rem 0.0rem;">
                      <h5 class="mb-0 collapsed" data-toggle="collapse" data-target="#createproduct" aria-expanded="false" aria-controls="createproduct" style="text-align:center;background-color:blue;color:white;padding:10px;font-size:20px"><b><i class="fa" aria-hidden="true"></i> CREATE NEW PRODUCT</b></h5>
                    </div>
                    <div id="createproduct" class="collapse" data-parent="#accordion-one">
                      <div class="card-body" style="padding: 1rem 0rem;">
                        <!-- Basic Form -->
                        <div class="basic-form">
                          <form action="<?php echo base_url(); ?>index.php/product/insert" method="post" enctype="multipart/form-data">

                            <!-- name & code -->
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label>Product Name <b style="color:red;">*</b></label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Product Name" required>
                              </div>
                              <div class="form-group col-md-6">
                                <label>Product Code <b style="color:red;">*</b></label>
                                <input type="text" name="code" id="code" class="form-control" placeholder="Product Code" required>
                              </div>
                            </div>
                            <!-- name & code -->

                            <!-- original price, currency, discount percentage & selling price -->
                            <div class="form-row">
                              <div class="form-group col-md-3">
                                <label>Original Price <b style="color:red;">*</b></label>
                                <input type="number" name="original_price" id="original_price" class="form-control" value="0" required>
                              </div>
                              <div class="form-group col-md-3">
                                <label>Currency <b style="color:red;">*</b></label>
                                <input type="text" name="currency" id="currency" class="form-control" value="₹" required>
                              </div>
                              <div class="form-group col-md-3">
                                <label>Discount Percentage <b style="color:red;">*</b></label>
                                <input type="number" name="discount_pct" id="discount_pct" class="form-control" value="0" required>
                              </div>
                              <div id="getsellingprice" class="form-group col-md-3">
                                <label>Selling Price</label>
                                <input type="text" name="selling_price" id="selling_price" class="form-control" value="0" readonly>
                              </div>
                            </div>
                            <!-- original price, currency, discount percentage & selling price -->

                            <!-- product details, tags -->
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label>Product Details</label>
                                <input type="text" name="details" id="details" class="form-control" placeholder="Product Details">
                              </div>
                              <div class="form-group col-md-6">
                                <label>Product Tags</label>
                                <input type="text" name="tags" id="tags" class="form-control" placeholder="comma seperated tags">
                              </div>
                            </div><br>
                            <!-- product details, tags -->

                            <!-- model, batch no, quantity & status -->
                            <div class="form-row">
                              <div class="form-group col-md-3">
                                <label>Year Of Model</label>
                                <input type="date" name="model_year" id="model_year" class="form-control">
                              </div>
                              <div class="form-group col-md-3">
                                <label>Batch Number</label>
                                <input type="text" name="batchno" id="batchno" class="form-control" placeholder="Batch Number">
                              </div>
                              <div class="form-group col-md-3">
                                <label>Quantity <b style="color:red;">*</b></label>
                                <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Total Products In Hands For Sale" required>
                              </div>
                              <div class="form-group col-md-3">
                                <label>Status</label>
                                <select class="form-control" name="status" id="status">
                                  <option value="1">IN SALE</option>
                                  <option value="0">NOT IN SALE</option>                        
                                </select>
                              </div>
                            </div>
                            <!-- model, batch no, quantity & status -->

                            <!-- image -->
                            <div class="form-row">
                              <label>Product Image</label>
                              <div class="custom-file">
                                <input type="file" name="image" id="image" class="custom-file-input" accept="image/x-png,image/gif,image/jpeg" required>
                                <label class="custom-file-label">Choose file</label>
                              </div>
                            </div><br>
                            <!-- image -->

                            <!-- Create Button -->
                            <div style="text-align:center;">
                              <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <!-- Create Button -->
                          
                          </form>
                        </div>
                        <!-- Basic Form -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Create An Product -->
                           
              </div>
            </div>
          </div>
          <!-- Create An Product -->

          <!-- List Of Products -->
          <?php if(!empty($products)) {?>
            <div class="col-md-12">
              <div class="card">
                <div class="card-body" style="padding: 0.5rem 0.5rem;">

                  <!-- Heading -->
                  <div class="card mb-4 wow fadeIn" style="margin-bottom: 0rem !important;">
                    <h2 class="input-default" style="text-align:center;background-color:blue;color:white;padding:10px;font-size:20px"><b>LIST OF PRODUCTS</b></h2>
                  </div>
                  <!-- Heading -->

                  <!-- Products -->
                  <div class="table-responsive">
                  <table id="example" class="table table-striped table-bordered zero-configuration">
                      <thead>
                        <tr style='text-align:center'>
                          <th>Id</th>
                          <th>Image</th>
                          <th>Name</th>
                          <th>Selling Price</th>
                          <th>Original Price</th>
                          <th>Discount %</th>
                          <th>Quantity</th>
                          <th>Model Year</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      if(!empty($products)) {
                        $count = 1; 
                        foreach($products as $item) {
                          echo "<tr style='text-align:center'>";
                            echo "<td id='count'>".$count."</td>";
                            if(!empty($item['image'])) {
                              echo "<td><img src='".base_url().$item['image']."' alt='Image Missing' width='50' height='50'></td>";
                            } else { 
                              echo "<td><img src='".base_url()."uploads/products/images/default.jpg' alt='Image Missing' width='50' height='50'></td>";
                            }
                            echo "<td>".$item['name']."(".$item['code'].")</td>";
                            echo "<td>".$item['selling_price']." ".$item['currency']."</td>";
                            echo "<td>".$item['original_price']." ".$item['currency']."</td>";
                            echo "<td>".$item['discount_pct']." %</td>";
                            echo "<td>".$item['quantity']."</td>";
                            echo "<td>".$item['model_year']."</td>";?>
                            <td style='word-wrap:break-word;max-width:160px;'>
                              <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deletemodal<?php echo $item['uuid']; ?>"><i class="fa fa-trash"></i></a>&nbsp
                              <a href="<?php echo base_url();?>index.php/product/edit/<?php echo $item['uuid']; ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                            </td>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="deletemodal<?php echo $item['uuid']; ?>" role="dialog">
                              <div class="modal-dialog">
                              
                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  </div>
                                  <div class="modal-body">
                                    <!-- Heading -->
                                    <div class="card mb-4 wow fadeIn" style="margin-bottom: 0rem !important;">
                                      <h2 class="input-default" style="text-align:center;background-color:blue;color:white;padding:10px;font-size:20px"><b>Delete Product Confirmation</b></h2>
                                    </div>
                                    <!-- Heading -->
                                    <!-- Basic Form -->
                                    <div class="basic-form">
                                      <form action="<?php echo base_url();?>index.php/product/delete/<?php echo $item['uuid']; ?>" method="post">

                                        <!-- Message -->
                                        <p><b>Do You Wont To Delete Product?</b></p>
                                        <!-- Message -->

                                        <!-- Create Button -->
                                        <div style="text-align:center;">
                                          <button type="submit" name="submit" id="submit" class="btn btn-danger">YES</button>
                                          <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
                                        </div>
                                        <!-- Create Button -->

                                      </form>
                                    </div>
                                    <!-- Basic Form -->
                                  </div>
                                </div>
                                
                              </div>
                            </div>
                            <!-- Delete Modal -->

                          <?php echo "</tr>";
                          $count++;
                        }
                      } else {
                        echo "<tr>";
                          echo "<td colspan='9' style='text-align:center;'>No Data To Display</td>";
                        echo "</tr>";
                      } ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- Products -->
                            
                </div>
              </div>
            </div>
          <?php } ?>
          <!-- List Of Products -->          
                    
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