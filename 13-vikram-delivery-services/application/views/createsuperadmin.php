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
      <div class="container-fluid mt-3" style="padding: 0rem 0rem;">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
                                
              <!-- Heading -->
              <div class="card mb-4 wow fadeIn" style="margin-bottom: 0rem !important;">
                <h2 class="input-default" style="text-align:center;background-color:blue;color:white;padding:10px;font-size:20px"><b>ADD SUPER ADMIN</b></h2>
              </div>
              <!-- Heading -->

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

              <!-- Basic Form -->
              <div class="basic-form">
                <form action="<?php echo base_url();?>superadmin/insert" method="post" enctype="multipart/form-data">

                  <!-- name & email -->
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>User Name</label>
                      <input type="text" name="name" id="name" class="form-control" placeholder="User Name" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Email</label>
                      <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                    </div>
                  </div>
                  <!-- name & email -->

                  <!-- mobile & password -->
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Mobile Number</label>
                      <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile Number" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Password</label>
                      <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                  </div>
                  <!-- mobile & password -->

                  <!-- city & state -->
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>City</label>
                      <input type="text" name="city" id="city" class="form-control" value="GAJWEL" readonly>
                    </div>
                    <div class="form-group col-md-6">
                      <label>State</label>
                      <input type="text" name="state" id="state" class="form-control" value="TELANGANA" readonly>
                    </div>
                  </div>
                  <!-- city & state -->

                  <!-- country & pincode -->
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Country</label>
                      <input type="text" name="country" id="country" class="form-control" value="INDIA" readonly>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Pincode</label>
                      <input type="text" name="pincode" id="pincode" class="form-control" value="502278" readonly>
                    </div>
                  </div>
                  <!-- country & pincode -->

                  <!-- address -->
                  <div class="form-group">
                    <label>Full Address</label>
                    <textarea name="address" id="address" class="form-control" placeholder="FULL ADDRESS" required></textarea>
                  </div>
                  <!-- address -->

                  <!-- Upload Image & status-->
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Select an Image with less size</label>
                      <div class="custom-file">
                        <input type="file" name="image" id="image" class="custom-file-input">
                        <label class="custom-file-label">Choose file</label>
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Select Status</label>
                      <select class="form-control" name="status" id="status">
                        <option value="1">ACTIVE</option>
                        <option value="0">MAKE ACTIVE LATER</option>                        
                      </select>
                    </div>
                  </div>
                  <!-- Upload Image & status -->

                  <!-- Create Button -->
                  <div style="text-align:center;">
                    <button type="submit" class="btn btn-primary">Add Super Admin</button>
                  </div>
                  <!-- Create Button -->

                </form>
              </div>
              <!-- Basic Form -->

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