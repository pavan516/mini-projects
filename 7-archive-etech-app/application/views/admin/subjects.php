<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>ARCHIVE E-TECH</title>

  <!-- Header Links -->
  <?php include_once("includes/headerlinks.php"); ?>
  <!-- Header Links -->
</head>

<!-- Body Started -->
<body class="grey lighten-3">
  
  <!--Main Navigation-->
  <header>
    <?php include_once("includes/headers.php"); ?>
  </header>

  <!--Main layout-->
  <main class="pt-5 mx-lg-5">

    <!-- Add Categories -->
    <div class="container-fluid mt-5">

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
      
      <!-- start Subjects -->
      <div class="row wow fadeIn">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">

              <!-- Heading -->
              <div class="card mb-4 wow fadeIn">
                <h2 style="text-align:center;color:blue;margin-top:7px;"><b>Add Subjects</b></h2>
              </div>
              <!-- Heading -->

              <!-- Form -->
              <div class="basic-form">
                <form action="<?php echo base_url();?>admin/subject/insert" method="post">
                  
                  <!-- Select Study Material -->
                  <div class="form-group">
                    <label>Select Study Material</label>
                    <select class="form-control" name="material_id" id="material_id">
                      <option value="0">Select Study Material</option>
                      <?php 
                      if(!empty($materialItems)) {
                        foreach($materialItems ?? [] as $material) {?>
                          <option value="<?php echo $material['id']; ?>"><?php echo $material['material_code']." ( ".$material['material_name']." )"; ?></option>
                        <?php }
                      }?>
                    </select>
                  </div>
                  <!-- Select Study Material -->

                  <!-- Select Branch -->
                  <div class="form-group">
                    <label>Select Branch</label>
                    <select class="form-control" name="branch_id" id="branch_id">
                      <option value="0">Select Branch</option>
                      <?php 
                      if(!empty($branchItems)) {
                        foreach($branchItems ?? [] as $branch) {?>
                          <option value="<?php echo $branch['id']; ?>"><?php echo $branch['branch_code']." ( ".$branch['branch_name']." )"; ?></option>
                        <?php }
                      }?>
                    </select>
                  </div>
                  <!-- Select Branch -->

                  <!-- subject code & Name -->
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Subject Name</label>
                      <input type="text" name="subject_name" id="subject_name" class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Subject Code</label>
                      <input type="text" name="subject_code" id="subject_code" class="form-control" placeholder="">
                    </div>
                  </div>
                  <!-- subject code & Name -->

                  <!-- Create Button -->
                  <div style="text-align:center;">
                    <button type="submit" class="btn btn-primary">Create</button>
                  </div>
                  <!-- Create Button -->

                </form>
              </div>
              <!-- Form -->
                
            </div>    
          </div>
        </div>
      </div>
      <!-- end Subjects -->
    </div><br>
    <!-- Add Subjects -->

    <!-- List of Subjects -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
                
              <!-- Heading -->
              <div class="card mb-4 wow fadeIn">
                <h2 style="text-align:center;color:blue;margin-top:7px;"><b>List Of Subjects</b></h2>
              </div>
              <!-- Heading -->

              <!-- List Subjects -->
              <div class="table-responsive">
                <table class="table table-striped table-bordered zero-configuration">
                  <thead>
                    <tr style="color:blue;">
                      <th>Id</th>
                      <th>S.M Code</th>
                      <th>Branch Code</th>
                      <th>Subject Name</th>
                      <th>Subject Code</th>
                      <th>Created Date</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if(!empty($items)) {
                      $count = 1;
                      foreach($items as $item) {
                        echo "<tr>";
                          echo "<td>".$count."</td>";
                          echo "<td>".$item['material_code']."</td>";
                          echo "<td>".$item['branch_code']."</td>";
                          echo "<td>".$item['subject_name']."</td>";
                          echo "<td>".$item['subject_code']."</td>";
                          echo "<td>".$item['created_dt']."</td>";?>
                          <td>
                            <form action="<?php echo base_url();?>admin/subject/delete" method="post">
                              <input type="text" name="subject_id" id="subject_id" value="<?php echo $item['id']; ?>" style="display:none;">                          
                              <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                          </td>
                        <?php echo "</tr>";
                        $count++;
                      }
                    } else {
                      echo "<tr>";
                        echo "<td colspan='6' style='text-align:center;'>No Data To Display</td>";
                      echo "</tr>";
                    } ?>
                  </tbody>
                </table>
              </div>
              <!-- Branches List -->
            
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- List Of Branches -->    

  </main>
  <!--Main layout-->
              
  <!-- Footer & Scripts -->
  <?php include_once("includes/footer.php"); ?>
  <!-- Footer & Scripts -->
  
</body>
<!-- End Of Body -->
</html>