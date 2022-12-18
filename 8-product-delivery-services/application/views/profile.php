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
                  
          <!-- Profile -->
          <div class="col-lg-4 col-xl-3">
            <div class="card">
              <div class="card-body">
                <div class="media align-items-center mb-4">
                  <?php if(!empty($item['image'])) { ?>
                    <img class="mr-3" src="<?php echo base_url().$item['image']; ?>" width="80" height="80" alt="">
                  <?php } else { ?> 
                    <img src="<?php echo base_url(); ?>uploads/users/images/default.jpg" height="40" width="40" alt="">
                  <?php } ?>&nbsp&nbsp
                  <div class="media-body">
                    <h4 class="mb-0"> <?php echo $item['name']; ?></h4>
                    <?php if($this->session->userdata('role')=="SUPER_ADMIN") {?>
                      <p class="text-muted mb-0"> <?php echo $item['role']; ?></p>
                    <?php } else if($this->session->userdata('role')=="SALES_BOYS") {?>
                      <p class="text-muted mb-0"> <?php echo $item['role']; ?></p>
                    <?php } else {?>
                      <p class="text-muted mb-0"> <?php echo $item['mobile']; ?></p>
                    <?php } ?>
                  </div>
                </div>
                <?php if($this->session->userdata('role')=="SALES_BOYS") {?>
                  <h5><?php echo $item['mobile']; ?></h5>
                <?php }?>
                <h5><?php echo $item['email']; ?></h5>
                <?php if($this->session->userdata('role')=="USERS") {?>
                  <hr><p class="text-muted">You Joined DS ON : <b><?php echo $item['created_dt']; ?></b></p>
                <?php }?>
                <?php if($this->session->userdata('role')=="SALES_BOYS") {?>
                  <hr><p class="text-muted"><?php echo $item['_addresses'][0]['address']; ?></p>
                <?php }?>
              </div>
            </div>
          </div>
          <!-- Profile -->

          <!-- change Password -->
          <div class="col-lg-8 col-xl-9">
            <div class="card">
              <div class="card-body">
                     
                <!-- Heading -->
                <div class="card mb-4 wow fadeIn" style="margin-bottom: 0rem !important;">
                  <h2 class="input-default" style="text-align:center;background-color:blue;color:white;padding:10px;font-size:20px"><b>Change Password</b></h2>
                </div>
                <!-- Heading -->

                <!-- Change Password Form -->
                <form action="<?php echo base_url();?>index.php/auth/change/password" method="post" enctype="multipart/form-data">

                  <!-- old new & repeat password -->
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label>Old Password</label>
                      <input type="password" name="old_pass" id="old_pass" class="form-control" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label>New Password</label>
                      <input type="password" name="new_pass" id="new_pass" class="form-control" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Repeat Password</label>
                      <input type="password" name="repeat_pass" id="repeat_pass" class="form-control" required>
                    </div>
                  </div>
                  <!-- old new & repeat password -->

                  <!-- Create Button -->
                  <div style="text-align:center;">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                  </div>
                  <!-- Create Button -->

                </form>
                <!-- Change Password Form -->
              
              </div>
            </div>
          </div>
          <!-- change Password -->
          
          <!-- Edit Profile -->
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                     
                <!-- Heading -->
                <div class="card mb-4 wow fadeIn" style="margin-bottom: 0rem !important;">
                  <h2 class="input-default" style="text-align:center;background-color:blue;color:white;padding:10px;font-size:20px"><b>Edit Profile</b></h2>
                </div>
                <!-- Heading -->

                <!-- Edit Form -->
                <form action="<?php echo base_url();?>index.php/user/updateprofile" method="post" enctype="multipart/form-data">

                  <!-- Send user uuid & address uuid -->
                  <?php if($this->session->userdata('role') == "SALES_BOYS") {?>
                    <input type="hidden" name="address_uuid" value="<?php echo $item['_addresses'][0]['uuid']; ?>">
                  <?php } ?>
                  <!-- Send user uuid & address uuid -->

                  <!-- name & email -->
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label>User Name</label>
                      <input type="text" name="name" id="name" class="form-control" value="<?php echo $item['name']; ?>" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Email</label>
                      <input type="email" name="email" id="email" class="form-control" value="<?php echo $item['email']; ?>" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Mobile Number</label>
                      <input type="text" name="mobile" id="mobile" class="form-control" value="<?php echo $item['mobile']; ?>" readonly>
                    </div>
                  </div>
                  <!-- name & email -->

                  <!-- Change Image -->
                  <div class="form-row">
                    <label>Select an Image with less size</label>
                    <div class="custom-file">
                      <input type="file" name="image" id="image" class="custom-file-input">
                      <label class="custom-file-label">Choose file</label>
                    </div>
                  </div>
                  <!-- Change Image -->

                  <!-- Sales Boy -->
                  <?php if($this->session->userdata('role') == "SALES_BOYS") {?>
                    <!-- city & state -->
                    <br><div class="form-row">
                      <div class="form-group col-md-6">
                        <label>City</label>
                        <input type="text" name="city" id="city" class="form-control" value="<?php echo $item['_addresses'][0]['city']; ?>" readonly>
                      </div>
                      <div class="form-group col-md-6">
                        <label>State</label>
                        <input type="text" name="state" id="state" class="form-control" value="<?php echo $item['_addresses'][0]['state']; ?>" readonly>
                      </div>
                    </div>
                    <!-- city & state -->

                    <!-- country & pincode -->
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>Country</label>
                        <input type="text" name="country" id="country" class="form-control" value="<?php echo $item['_addresses'][0]['country']; ?>" readonly>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Pincode</label>
                        <input type="text" name="pincode" id="pincode" class="form-control" value="<?php echo $item['_addresses'][0]['pincode']; ?>" readonly>
                      </div>
                    </div>
                    <!-- country & pincode -->

                    <!-- address -->
                    <div class="form-group">
                      <label>Full Address</label>
                      <textarea name="address" id="address" class="form-control" required><?php echo $item['_addresses'][0]['address']; ?></textarea>
                    </div>
                    <!-- address -->
                  <?php } ?>

                  <!-- Create Button -->
                  <br>
                  <div style="text-align:center;">
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                  </div>
                  <!-- Create Button -->

                </form>
                <!-- Edit Form -->
                
            </div>
          </div>
        </div>
        <!-- Edit Profile -->

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