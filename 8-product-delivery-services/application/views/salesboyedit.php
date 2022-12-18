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

					<!-- Heading -->
					<a href="<?php echo base_url(); ?>index.php/salesboys" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Go Back</a>
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
          
          <!-- Add Sales Boy Address -->
          <div class="col-lg-12"><br>
            <div class="card">
              <div class="card-body">
                     
                <!-- Heading -->
                <div class="card mb-4 wow fadeIn" style="margin-bottom: 0rem !important;">
                  <h2 class="input-default" style="text-align:center;background-color:blue;color:white;padding:10px;font-size:20px">ADD NEW AREA TO <b><?php echo strtoupper($user['name']); ?></b></h2>
                </div>
                <!-- Heading -->

                <!-- Add Sales Boy Address -->
                <form action="<?php echo base_url();?>index.php/salesboy/address/insert" method="post" enctype="multipart/form-data">

									<!-- Sales boy uuid -->
									<input type="hidden" name="user_uuid" id="user_uuid" value="<?php echo $user['uuid']; ?>" />
									<!-- Sales boy uuid -->

                  <!-- select country, state, city -->
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

                    <!-- Select city -->
                    <div id="getcities" class="form-group col-md-3">
                      <label>City</label>
                      <input type="text" class="form-control" value="Please select country & State to display cities" disabled>
                    </div>
                    <!-- Select city -->

                    <!-- Select Area -->
                    <div id="getareas" class="form-group col-md-3">
                      <label>Area</label>
                      <input type="text" class="form-control" value="Please select country, State & City to display areas" disabled>
                    </div>
                    <!-- Select Area -->

                    <!-- get states/cities/areas using script -->
                    <script>
                      // get states
                      function getStates(input_type) {

                        // Assign tables & converted to js array 
                        var states = <?php echo json_encode($states); ?>;
                                            
                        // Get selected field name & value
                        var selectedText = input_type.options[input_type.selectedIndex].innerHTML;
                        var selectedValue = input_type.value;
                        var str = "";
                        str += '<label>State</label>';
                        str += '<select class="form-control" name="state_id" id="state_id" onchange="getCities(this)">';
                        str += '<option value="0">Select State</option>';
                        for (i = 0; i < states.length; i++) {
                          if(selectedValue == states[i].country_id) {
                            str += '<option value="'+states[i].id+'">'+states[i].state_code+'</option>';
                          }
                        }
                        str += '</select>';
                        document.getElementById('getstates').innerHTML = str;
                      }

                      // get Cities
                      function getCities(input_type) {

                        // Assign tables & converted to js array 
                        var cities = <?php echo json_encode($cities); ?>;
                                            
                        // Get selected field name & value
                        var selectedText = input_type.options[input_type.selectedIndex].innerHTML;
                        var selectedValue = input_type.value;
                        var str = "";
                        str += '<label>City</label>';
                        str += '<select class="form-control" name="city_id" id="city_id" onchange="getAreas(this)">';
                        str += '<option value="0">Select City</option>';
                        for (i = 0; i < cities.length; i++) {
                          if(selectedValue == cities[i].state_id) {
                            str += '<option value="'+cities[i].id+'">'+cities[i].city_code+'</option>';
                          }
                        }
                        str += '</select>';
                        document.getElementById('getcities').innerHTML = str;
                      }

                      // get Areas
                      function getAreas(input_type) {

                        // Assign tables & converted to js array 
                        var areas = <?php echo json_encode($areas); ?>;
                                            
                        // Get selected field name & value
                        var selectedText = input_type.options[input_type.selectedIndex].innerHTML;
                        var selectedValue = input_type.value;
                        var str = "";
                        str += '<label>Area</label>';
                        str += '<select class="form-control" name="area_id" id="area_id">';
                        str += '<option value="0">Select Area</option>';
                        for (i = 0; i < areas.length; i++) {
                          if(selectedValue == areas[i].city_id) {
                            str += '<option value="'+areas[i].id+'">'+areas[i].area_code+'</option>';
                          }
                        }
                        str += '</select>';
                        document.getElementById('getareas').innerHTML = str;
                      }
                    </script>
                    <!-- get states/cities/areas using script -->

                  </div>
                  <!-- select country, state, city -->

                  <!-- Create Button -->
                  <br>
                  <div style="text-align:center;">
                    <button type="submit" class="btn btn-primary">Add Address</button>
                  </div>
                  <!-- Create Button -->

                </form>
                <!-- Add Sales Boy Address -->
                
            </div>
          </div>
        </div>
        <!-- Add Sales Boy Address -->

				<!-- List Of Sales Boy Addresses -->
        <div class="col-12">
					<div class="card">
						<div class="card-body" style="padding: 0.5rem 0.5rem;">
                                          
                <!-- Heading -->
                <div class="card mb-4 wow fadeIn" style="margin-bottom: 0rem !important;">
                  <h2 class="input-default" style="text-align:center;background-color:blue;color:white;padding:10px;font-size:20px">AREAS MAPPED TO <b><?php echo strtoupper($user['name']); ?></b></h2>
                </div>
                <!-- Heading -->

                <!-- Sales Boy Addresses -->
                <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered zero-configuration">
                    <thead>
                      <tr style='text-align:center'>
                        <th>Id</th>
                        <th>Area</th>
                        <th>Pincode</th>
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
                          if($item['area_id'] != 0) {
                            echo "<td>".$item['_area']['_city']['_state']['_country']['country_code']." -> ".$item['_area']['_city']['_state']['state_code']." -> ".$item['_area']['_city']['city_code']." -> ".$item['_area']['area_code']."</td>";
                            echo "<td>".$item['_area']['pincode']."</td>";
                          } else {
                            echo "<td></td>";
                            echo "<td></td>";
                          }?>
                          <td style='word-wrap:break-word;max-width:160px;'>
                            <a href="<?php echo base_url();?>index.php/salesboy/address/delete/<?php echo $item['uuid']; ?>/<?php echo $user['uuid']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>&nbsp
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
                <!-- Sales Boys -->
              
            </div>
          </div>
				</div>
				<!-- List Of Sales Boy Addresses -->

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