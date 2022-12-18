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

                <!-- Create Super Admin -->
                <p class="text-muted"><code></code></p>
                <div id="accordion-one" class="accordion">
                  <div class="card">
                    <div class="card-header" style="padding:0.0rem 0.0rem;">
                      <h5 class="mb-0 collapsed" data-toggle="collapse" data-target="#createsuperadmin" aria-expanded="false" aria-controls="createsuperadmin" style="text-align:center;background-color:blue;color:white;padding:10px;font-size:20px"><b><i class="fa" aria-hidden="true"></i> CREATE SUPER-ADMIN</b></h5>
                    </div>
                    <div id="createsuperadmin" class="collapse" data-parent="#accordion-one">
                      <div class="card-body" style="padding: 1rem 0rem;">
                        <!-- Basic Form -->
                        <div class="basic-form">
                          <form action="<?php echo base_url();?>index.php/superadmin/insert" method="post" enctype="multipart/form-data">

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
                <!-- Create Super Admin -->
                           
              </div>
            </div>
          </div>
          <!-- Create Super Admin -->

          <!-- List Of Super Admins -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-body" style="padding: 0.5rem 0.5rem;">

                <!-- Heading -->
                <div class="card mb-4 wow fadeIn" style="margin-bottom: 0rem !important;">
                  <h2 class="input-default" style="text-align:center;background-color:blue;color:white;padding:10px;font-size:20px"><b>SUPER ADMINS</b></h2>
                </div>
                <!-- Heading -->

                <!-- Super Admins -->
                <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered zero-configuration">
                    <thead>
                      <tr style='text-align:center'>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Verified</th>
                        <th>OTP</th>
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
                          if(!empty($item['image'])) {
                            echo "<td><img src='".base_url().$item['image']."' alt='Image Missing' width='50' height='50'></td>";
                          } else {
                            echo "<td><img src='".base_url()."uploads/users/images/default.jpg' alt='Image Missing' width='50' height='50'></td>";
                          }
                          echo "<td>".$item['name']."</td>";
                          echo "<td>".$item['mobile']."</td>";
                          echo "<td>".$item['email']."</td>";
                          if($item['verified']==1) echo "<td style='color:green;'>VERIFIED</td>"; else echo "<td style='color:red;'>NOT-VERIFIED</td>";
                          echo "<td>".$item['otp']."</td>";?>
                          <td style='word-wrap:break-word;max-width:160px;'>
                            <a href="<?php echo base_url();?>index.php/superadmin/delete/<?php echo $item['uuid']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>&nbsp
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
                <!-- Super Admins -->
                          
              </div>
            </div>
          </div>
          <!-- List Of Super admins -->          
                    
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