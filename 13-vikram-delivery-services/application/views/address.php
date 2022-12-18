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
      <div class="container-fluid">
        <div class="row">

          <!-- Error Message -->
          <?php if($this->session->flashdata('error')) {
            echo '<div class="col-md-12 alert alert-danger">';
            echo '<strong>'.$this->session->flashdata('error').'</strong>';
            echo '</div><br>';
          }?> 
          <!-- Error Message -->
          <!-- Success Message -->
          <?php if($this->session->flashdata('success')) {
            echo '<div class="col-md-12 alert alert-success">';
            echo '<strong>'.$this->session->flashdata('success').'</strong>';
            echo '</div><br>';
          }?> 
          <!-- Success Message -->
          
          <!-- Add New Address -->
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                     
                <!-- Heading -->
                <div class="card mb-4 wow fadeIn" style="margin-bottom: 0rem !important;">
                  <h2 class="input-default" style="text-align:center;background-color:blue;color:white;padding:10px;font-size:20px"><b>ADD NEW ADDRESS</b></h2>
                </div>
                <!-- Heading -->

                <!-- Add New Address -->
                <form action="<?php echo base_url();?>user/address/insert" method="post" enctype="multipart/form-data">

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

                  <!-- Create Button -->
                  <br>
                  <div style="text-align:center;">
                    <button type="submit" class="btn btn-primary">Add Address</button>
                  </div>
                  <!-- Create Button -->

                </form>
                <!-- Add New Address -->
                
            </div>
          </div>
        </div>
        <!-- Add New Address -->

        <div class="col-12">
            <div class="card">
              <div class="card-body" style="padding: 0.5rem 0.5rem;">
                                          
                <!-- Heading -->
                <div class="card mb-4 wow fadeIn" style="margin-bottom: 0rem !important;">
                  <h2 class="input-default" style="text-align:center;background-color:blue;color:white;padding:10px;font-size:20px"><b>LIST OF ADDRESSES</b></h2>
                </div>
                <!-- Heading -->

                <!-- Delivery Boys -->
                <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered zero-configuration">
                    <thead>
                      <tr style='text-align:center'>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Area</th>
                        <th>Pincode</th>
                        <th>Address</th>
                        <th>Link</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(!empty($items)) {
                      $count = 1;
                      foreach($items as $item) {
                        echo "<tr style='text-align:center'>";
                          echo "<td id='count'>".$count."</td>";
                          echo "<td>".$item['name']."</td>";
                          echo "<td>".$item['country']."/".$item['state']."/".$item['city']."</td>";
                          echo "<td>".$item['pincode']."</td>";
                          echo "<td>".$item['address']."</td>";
                          if(!empty($item['google_map_link'])) {
                            echo "<td><b><a href=".$item['google_map_link']." target='_blank'>GOOGLE MAP LINK</a></b></td>";
                          } else {
                            echo "<td></td>";
                          }?>
                          <td style='word-wrap:break-word;max-width:160px;'>
                            <a href="<?php echo base_url();?>user/address/delete/<?php echo $item['uuid']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>&nbsp
                          </td>
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
                <!-- Delivery Boys -->
              
              </div>
            </div>
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

</body>
</html>