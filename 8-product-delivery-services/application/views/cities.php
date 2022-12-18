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
        
          <!-- Create city -->
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

                <!-- Create city -->
                <p class="text-muted"><code></code></p>
                <div id="accordion-one" class="accordion">
                  <div class="card">
                    <div class="card-header" style="padding:0.0rem 0.0rem;">
                      <h5 class="mb-0 collapsed" data-toggle="collapse" data-target="#createorder" aria-expanded="false" aria-controls="createorder" style="text-align:center;background-color:blue;color:white;padding:10px;font-size:20px"><b><i class="fa" aria-hidden="true"></i> CREATE NEW CITY</b></h5>
                    </div>
                    <div id="createorder" class="collapse" data-parent="#accordion-one">
                      <div class="card-body" style="padding: 1rem 0rem;">
                        <!-- Basic Form -->
                        <div class="basic-form">
                          <form action="<?php echo base_url(); ?>index.php/city/insert" method="post">

                            <!-- add city -->
                            <div class="form-row">
                              <!-- select country -->
                              <div class="form-group col-md-3">
                                <label>Country</label>
                                <select id="country_id" name="country_id" class="form-control" onchange="getStates(this)">
                                  <option value="0">Select Country</option>
                                  <?php if(!empty($countries)) {
                                    foreach($countries as $country) {?>
                                      <option value="<?php echo $country['id']; ?>"><?php echo $country['country_code']; ?></option>
                                    <?php }
                                  } ?>
                                </select>
                              </div>
                              <!-- select country -->
                              <!-- Select state -->
                              <div id="getstates" class="form-group col-md-3">
                                <label>State</label>
                                <input type="text" class="form-control" value="Please select country to display states" disabled>
                              </div>
                              <!-- Select state -->
                              <!-- get states using script -->
                              <script>
                              function getStates(input_type) {

                                // Assign tables & converted to js array 
                                var states = <?php echo json_encode($states); ?>;
                                                     
                                // Get selected field name & value
                                var selectedText = input_type.options[input_type.selectedIndex].innerHTML;
                                var selectedValue = input_type.value;
                                var str = "";
                                str += '<label>State</label>';
                                str += '<select class="form-control" name="state_id" id="state_id">';
                                str += '<option value="0">Select State</option>';
                                for (i = 0; i < states.length; i++) {
                                  if(selectedValue == states[i].country_id) {
                                    str += '<option value="'+states[i].id+'">'+states[i].state_code+'</option>';
                                  }
                                }
                                str += '</select>';
                                document.getElementById('getstates').innerHTML = str;
                              }
                              </script>
                              <!-- get states using script -->
                              <!-- code & name-->
                              <div class="form-group col-md-3">
                                <label>City Code</label>
                                <input type="text" name="city_code" id="city_code" class="form-control" placeholder="City Code" required>
                              </div>
                              <div class="form-group col-md-3">
                                <label>City Name</label>
                                <input type="text" name="city_name" id="city_name" class="form-control" placeholder="City Name" required>
                              </div>
                              <!-- code & name-->
                            </div>
                            <!-- Add city -->

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
                <!-- Create city -->
                   
              </div>
            </div>
          </div>
          <!-- Create city -->

          <!-- List Of cities -->
          <div class="col-12">
            <div class="card">
              <div class="card-body" style="padding: 0.5rem 0.5rem;">

                <!-- Accordian List Of cities -->
                <p class="text-muted"><code></code></p>
                <div id="accordion-two" class="accordion">
                  <div class="card">
                    <div class="card-header" style="padding:0.0rem 0.0rem;">
                      <h5 class="mb-0" data-toggle="collapse" data-target="#viewcities" aria-expanded="true" aria-controls="viewcities" style="text-align:center;background-color:blue;color:white;padding:10px;font-size:20px"><b><i class="fa" aria-hidden="true"></i> LIST OF CITIES</b></h5>
                    </div>
                    <div id="viewcities" class="collapse show" data-parent="#accordion-two">
                      <div class="card-body" style="padding: 1rem 0rem;">

                        <!-- cities -->
                        <div class="table-responsive">
                          <table id="example" class="table table-striped table-bordered zero-configuration">
                            <thead>
                              <tr style='text-align:center'>
                                <th>Id</th>
                                <th>city Code</th>
                                <th>city Name</th>
                                <th>Country Code</th>
                                <th>State Code</th>
                                <th>Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(!empty($cities)) {
                              $count = 1;
                              foreach($cities as $city) {
                                echo "<tr style='text-align:center'>";
                                  echo "<td id='count'>".$count."</td>";
                                  echo "<td>".$city['city_code']."</td>";
                                  echo "<td>".$city['city_name']."</td>";
                                  echo "<td>".$city['_state']['_country']['country_code']."</td>";
                                  echo "<td>".$city['_state']['state_code']."</td>";?>
                                  <td style='word-wrap:break-word;max-width:160px;'>
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal<?php echo $city['id']; ?>"><i class="fa fa-edit"></i></a>&nbsp
                                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deletemodal<?php echo $city['id']; ?>"><i class="fa fa-trash"></i></a>&nbsp
                                  </td>
                                <?php echo "</tr>";
                                $count++;?>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="myModal<?php echo $city['id']; ?>" role="dialog">
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
                                          <form action="<?php echo base_url(); ?>index.php/city/update/<?php echo $city['id']; ?>" method="post">

                                            <!-- add city -->
                                            <div class="form-row">
                                              <!-- country -->
                                              <div class="form-group col-md-3">
                                                <label>Country</label>
                                                <input type="text" class="form-control" value="<?php echo $city['_state']['_country']['country_code']; ?>" disabled>
                                              </div>
                                              <!-- country -->
                                              <!-- state -->
                                              <div id="geteditstates_<?php echo $city['id']; ?>" class="form-group col-md-3">
                                                <label>State</label>
                                                <input type="text" class="form-control" value="<?php echo $city['_state']['state_code']; ?>" disabled>
                                              </div>
                                              <!-- state -->
                                              <!-- code & name-->
                                              <div class="form-group col-md-3">
                                                <label>City Code</label>
                                                <input type="text" name="city_code" class="form-control" value="<?php echo $city['city_code']; ?>" required>
                                              </div>
                                              <div class="form-group col-md-3">
                                                <label>City Name</label>
                                                <input type="text" name="city_name" class="form-control" value="<?php echo $city['city_name']; ?>" required>
                                              </div>
                                              <!-- code & name-->
                                            </div>
                                            <!-- Add city -->

                                            <!-- Create Button -->
                                            <div style="text-align:center;">
                                              <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                            <!-- Create Button -->

                                          </form>
                                        </div>
                                        <!-- Basic Form -->

                                      </div>
                                    </div>
                                    <!-- Modal content-->
                                    
                                  </div>
                                </div>
                                <!-- Edit Modal -->

                                <!-- Delete Modal -->
                                <div class="modal fade" id="deletemodal<?php echo $city['id']; ?>" role="dialog">
                                  <div class="modal-dialog">
                                  
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      </div>
                                      <div class="modal-body">
                                        <!-- Heading -->
                                        <div class="card mb-4 wow fadeIn" style="margin-bottom: 0rem !important;">
                                          <h2 class="input-default" style="text-align:center;background-color:blue;color:white;padding:10px;font-size:20px"><b>Delete City Confirmation</b></h2>
                                        </div>
                                        <!-- Heading -->
                                        <!-- Basic Form -->
                                        <div class="basic-form">
                                          <form action="<?php echo base_url();?>index.php/city/delete/<?php echo $city['id']; ?>" method="post">

                                            <!-- Message -->
                                            <p><b>Do You Wont To Delete City?</b></p>
                                            <!-- Message -->

                                            <!-- Create Button -->
                                            <div style="text-align:center;">
                                              <button type="submit" name="submit" class="btn btn-danger">YES</button>
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

  </div>
  <!-- Main wrapper -->

  <!-- Footer Scripts -->
  <?php include('includes/footerscripts.php'); ?>
  <!-- Footer Scripts -->

</body>
</html>