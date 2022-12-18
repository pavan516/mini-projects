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
        
          <!-- Create state -->
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

                <!-- Create state -->
                <p class="text-muted"><code></code></p>
                <div id="accordion-one" class="accordion">
                  <div class="card">
                    <div class="card-header" style="padding:0.0rem 0.0rem;">
                      <h5 class="mb-0 collapsed" data-toggle="collapse" data-target="#createorder" aria-expanded="false" aria-controls="createorder" style="text-align:center;background-color:blue;color:white;padding:10px;font-size:20px"><b><i class="fa" aria-hidden="true"></i> CREATE NEW STATE</b></h5>
                    </div>
                    <div id="createorder" class="collapse" data-parent="#accordion-one">
                      <div class="card-body" style="padding: 1rem 0rem;">
                        <!-- Basic Form -->
                        <div class="basic-form">
                          <form action="<?php echo base_url(); ?>index.php/state/insert" method="post">

                            <!-- Add State -->
                            <div class="form-row">
                              <!-- select country -->
                              <div class="form-group col-md-4">
                                <select id="country_id" name="country_id" class="form-control">
                                  <?php if(!empty($countries)) {
                                    foreach($countries as $country) {?>
                                      <option value="<?php echo $country['id']; ?>"><?php echo $country['country_code']; ?></option>
                                    <?php }
                                  } ?>
                                </select>
                              </div>
                              <!-- select country -->
                              <!-- code & name-->
                              <div class="form-group col-md-4">
                                <input type="text" name="state_code" id="state_code" class="form-control" placeholder="State Code" required>
                              </div>
                              <div class="form-group col-md-4">
                                <input type="text" name="state_name" id="state_name" class="form-control" placeholder="State Name" required>
                              </div>
                              <!-- code & name-->
                            </div>
                            <!-- Add State -->

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
                <!-- Create state -->
                
                           
              </div>
            </div>
          </div>
          <!-- Create state -->

          <!-- List Of States -->
          <div class="col-12">
            <div class="card">
              <div class="card-body" style="padding: 0.5rem 0.5rem;">

                <!-- Accordian List Of States -->
                <p class="text-muted"><code></code></p>
                <div id="accordion-two" class="accordion">
                  <div class="card">
                    <div class="card-header" style="padding:0.0rem 0.0rem;">
                      <h5 class="mb-0" data-toggle="collapse" data-target="#viewstates" aria-expanded="true" aria-controls="viewstates" style="text-align:center;background-color:blue;color:white;padding:10px;font-size:20px"><b><i class="fa" aria-hidden="true"></i> LIST OF STATES</b></h5>
                    </div>
                    <div id="viewstates" class="collapse show" data-parent="#accordion-two">
                      <div class="card-body" style="padding: 1rem 0rem;">

                        <!-- States -->
                        <div class="table-responsive">
                          <table id="example" class="table table-striped table-bordered zero-configuration">
                            <thead>
                              <tr style='text-align:center'>
                                <th>Id</th>
                                <th>State Code</th>
                                <th>State Name</th>
                                <th>Country Code</th>
                                <th>Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(!empty($states)) {
                              $count = 1;
                              foreach($states as $state) {
                                echo "<tr style='text-align:center'>";
                                  echo "<td id='count'>".$count."</td>";
                                  echo "<td>".$state['state_code']."</td>";
                                  echo "<td>".$state['state_name']."</td>";
                                  echo "<td>".$state['_country']['country_code']."</td>";?>
                                  <td style='word-wrap:break-word;max-width:160px;'>
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal<?php echo $state['id']; ?>"><i class="fa fa-edit"></i></a>&nbsp
                                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deletemodal<?php echo $state['id']; ?>"><i class="fa fa-trash"></i></a>&nbsp
                                  </td>
                                <?php echo "</tr>";
                                $count++;?>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="myModal<?php echo $state['id']; ?>" role="dialog">
                                  <div class="modal-dialog">
                                  
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      </div>
                                      <div class="modal-body">
                                        <!-- Heading -->
                                        <div class="card mb-4 wow fadeIn" style="margin-bottom: 0rem !important;">
                                          <h2 class="input-default" style="text-align:center;background-color:blue;color:white;padding:10px;font-size:20px"><b>Edit State</b></h2>
                                        </div>
                                        <!-- Heading -->
                                        <!-- Basic Form -->
                                        <div class="basic-form">
                                          <form action="<?php echo base_url(); ?>index.php/state/update/<?php echo $state['id']; ?>" method="post">

                                            <!-- Add State -->
                                            <div class="form-row">
                                              <!-- code & name-->
                                              <div class="form-group col-md-6">
                                                <input type="text" name="state_code" id="state_code" class="form-control" value="<?php echo $state['state_code']; ?>" required>
                                              </div>
                                              <div class="form-group col-md-6">
                                                <input type="text" name="state_name" id="state_name" class="form-control" value="<?php echo $state['state_name']; ?>" required>
                                              </div>
                                              <!-- code & name-->
                                            </div>
                                            <!-- Add State -->

                                            <!-- Create Button -->
                                            <div style="text-align:center;">
                                              <button type="submit" name="submit" id="submit" class="btn btn-primary">Update</button>
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                            <!-- Create Button -->

                                          </form>
                                        </div>
                                        <!-- Basic Form -->
                                      </div>
                                    </div>
                                    
                                  </div>
                                </div>
                                <!-- Edit Modal -->

                                <!-- Delete Modal -->
                                <div class="modal fade" id="deletemodal<?php echo $state['id']; ?>" role="dialog">
                                  <div class="modal-dialog">
                                  
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      </div>
                                      <div class="modal-body">
                                        <!-- Heading -->
                                        <div class="card mb-4 wow fadeIn" style="margin-bottom: 0rem !important;">
                                          <h2 class="input-default" style="text-align:center;background-color:blue;color:white;padding:10px;font-size:20px"><b>Delete State Confirmation</b></h2>
                                        </div>
                                        <!-- Heading -->
                                        <!-- Basic Form -->
                                        <div class="basic-form">
                                          <form action="<?php echo base_url();?>index.php/state/delete/<?php echo $state['id']; ?>" method="post">

                                            <!-- Message -->
                                            <p><b>Do You Wont To Delete State?</b></p>
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
                              <?php }
                            } else {
                              echo "<tr>";
                                echo "<td colspan='9' style='text-align:center;'>No Data To Display</td>";
                              echo "</tr>";
                            } ?>
                            </tbody>
                          </table>
                        </div>
                        <!-- Countries -->

                      </div>
                    </div>
                  </div>
                </div>
                <!-- Accordian List Of Countries -->
              
              </div>
            </div>
          </div>
          <!-- List Of Countries -->
          
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