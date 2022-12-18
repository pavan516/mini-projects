<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>LORDS E-LEARN</title>

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
      
      <!-- start Sections -->
      <div class="row wow fadeIn">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">

              <!-- Heading -->
              <div class="card mb-4 wow fadeIn">
                <h2 style="text-align:center;color:blue;margin-top:7px;"><b>Add section</b></h2>
              </div>
              <!-- Heading -->

              <!-- Form -->
              <div class="basic-form">
                <form action="<?php echo base_url();?>admin/section/insert" method="post">
                  
                  <!-- Select Branch -->
                  <?php if($this->session->userdata('role') == "SUPER_ADMIN") {?>
                    <div class="form-group">
                      <label>Select Branch</label>
                      <select class="form-control" name="branch_id" id="branch_id">
                        <option value="0" selected>Select Branch</option>
                        <?php 
                        if(!empty($branchItems)) {
                          foreach($branchItems ?? [] as $branch) {?>
                            <option value="<?php echo $branch['id']; ?>"><?php echo $branch['branch_code']." ( ".$branch['branch_name']." )"; ?></option>
                          <?php }
                        }?>
                      </select>
                    </div>
                  <?php } ?>
                  <!-- Select Branch -->

                  <!-- Select Class -->
                  <div class="form-group">
                    <label>Select Class</label>
                    <select class="form-control" name="class_id" id="class_id" required>
                      <option value="0">Select Class</option>
                      <?php 
                      if(!empty($classItems)) {
                        foreach($classItems ?? [] as $class) {?>
                          <option value="<?php echo $class['id']; ?>"><?php echo $class['class_code']." ( ".$class['class_name']." )"; ?></option>
                        <?php }
                      }?>
                    </select>
                  </div>
                  <!-- Select Class -->

                  <!-- Section code & Name -->
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Section Name</label>
                      <input type="text" name="section_name" id="section_name" class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Section Code</label>
                      <input type="text" name="section_code" id="section_code" class="form-control" placeholder="">
                    </div>
                  </div>
                  <!-- Section code & Name -->

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
      <!-- end Sections -->
    </div><br>
    <!-- Add Sections -->

    <!-- List of Sections -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
                
              <!-- Heading -->
              <div class="card mb-4 wow fadeIn">
                <h2 style="text-align:center;color:blue;margin-top:7px;"><b>List Of Sections</b></h2>
              </div>
              <!-- Heading -->

              <!-- List Sections -->
              <div class="table-responsive">
                <table class="table table-striped table-bordered zero-configuration">
                  <thead>
                    <tr style="color:blue;">
                      <th>Id</th>
                      <th>Branch</th>
                      <th>Class</th>
                      <th>Section Code</th>
                      <th>Section Name</th>
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
                          echo "<td>".$item['_branch']['branch_code']."</td>";
                          echo "<td>".$item['_class']['class_code']."</td>";
                          echo "<td>".$item['section_code']."</td>";
                          echo "<td>".$item['section_name']."</td>";
                          echo "<td>".$item['created_dt']."</td>";?>
                          <td>
                            <a href="<?php echo base_url();?>admin/section/edit/<?php echo $item['id']; ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                            <a href="<?php echo base_url();?>admin/section/delete/<?php echo $item['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                          </td>
                        <?php echo "</tr>";
                        $count++;
                      }
                    } else {
                      echo "<tr>";
                        echo "<td colspan='7' style='text-align:center;'>No Data To Display</td>";
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