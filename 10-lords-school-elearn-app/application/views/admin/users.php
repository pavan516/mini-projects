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
      
      <!-- start Users -->
      <div class="row wow fadeIn">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">

              <!-- Heading -->
              <div class="card mb-4 wow fadeIn">
                <h2 style="text-align:center;color:blue;margin-top:7px;">
                <b>Add User</b>
              </h2>
              </div>
              <!-- Heading -->

              <!-- Form -->
              <div class="basic-form">
                <form action="<?php echo base_url();?>admin/user/insert" method="post" enctype="multipart/form-data">

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

                  <!-- Select Role -->
                  <div class="form-group">
                    <label>Select Role</label>
                    <select class="form-control" name="role" id="role" onchange="getclasses(this)" required>
                      <?php if($this->session->userdata('role') == "SUPER_ADMIN") {?>
                        <option value="ADMIN" selected>ADMIN</option>
                      <?php }?>
                        <option value="TEACHERS">TEACHERS</option>
                        <option value="STUDENTS">STUDENTS</option>
                    </select>
                  </div>
                  <!-- Select Role -->
                  
                  <!-- getclasses-->
                  <div id="getclasses" class="form-group"></div>

                  <!-- getsections-->
                  <div id="getsections" class="form-group"></div>

                  <script>
                    function getclasses(input_type) {
                      var classes = <?php echo json_encode($classItems); ?>;
                      var selectedValue = input_type.value;
                      var str = '';
                      if (selectedValue=="STUDENTS"){
                        str += '<label>Select Class</label>';
                        str += '<select class="form-control" name="class_id" id="class_id" onchange="getsections(this)" required>';
                        str += '<option value="0">Select Class</option>';
                        for (i = 0; i < classes.length; i++) {
                          str += '<option value="'+classes[i].id+'">'+classes[i].class_code+' ( '+classes[i].class_name+' )</option>';
                        }
                        str += '</select>';
                        document.getElementById('getclasses').innerHTML = str;  
                      }
                    }

                    function getsections(input_type) {
                      var sections = <?php echo json_encode($sectionItems); ?>;
                      var selectedValue = input_type.value;
                      var str = '';
                      str += '<label>Select Section</label>';
                      str += '<select class="form-control" name="section_id" id="section_id">';
                      str += '<option value="0">Select Section</option>';
                      for (i = 0; i < sections.length; i++) {
                        if(selectedValue == sections[i].class_id){
                          str += '<option value="'+sections[i].id+'">'+sections[i].section_code+' ( '+sections[i].section_name+' )</option>';
                        }
                      }
                      str += '</select>';
                      document.getElementById('getsections').innerHTML = str;  
                      
                    }

                    </script>
                    
                  <!-- Name -->
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="User Name" required>
                  </div>
                  <!-- Name -->

                  <!-- Father name -->
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="father_name" id="father_name" class="form-control" placeholder="Father Name" required>
                  </div>
                  <!-- Father name -->

                  <!-- Mobile -->
                  <div class="form-group">
                    <label>Mobile</label>
                    <input type="number" name="mobile" id="mobile" class="form-control" placeholder="Mobile No" required>
                  </div>
                  <!-- Mobile -->

                  <!-- Upload Image -->
                  <div class="form-group">
                    <label>Select an Image with less size</label>
                    <div class="custom-file">
                      <input type="file" name="image" id="image" class="custom-file-input">
                      <label class="custom-file-label">Choose file</label>
                    </div>
                  </div>
                  <!-- Upload Image -->

                  <!-- Create Button -->
                  <div style="text-align:center;">
                    <button type="submit" class="btn btn-primary">Create User</button>
                  </div>
                  <!-- Create Button -->

                </form>
              </div>
              <!-- Form -->
                
            </div>    
          </div>
        </div>
      </div>
      <!-- end Users -->
    </div><br><br><br>
    <!-- Add Users -->

    <?php if($this->session->userdata('role')=="SUPER_ADMIN") {?>

      <!-- List Of All Admins -->
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                  
                <!-- Heading -->
                <div class="card mb-4 wow fadeIn">
                  <h2 style="text-align:center;color:blue;margin-top:7px;"><b>List Of ADMINS</b></h2>
                </div>
                <!-- Heading -->

                <!-- Admins List -->
                <div class="table-responsive">
                  <table  id="datatable" class="table table-striped table-bordered zero-configuration">
                    <thead>
                      <tr style="color:blue;">
                        <th>Id</th>
                        <th>Branch</th>
                        <th>Name</th>
                        <th>Mobile No</th>
                        <th>Created</th>
                        <th>Modified</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if(!empty($admins)) {
                        $count = 1;
                        foreach($admins as $admin) {
                          echo "<tr>";
                            echo "<td id='count'>".$count."</td>";
                            echo "<td>".$admin['_branch']['branch_code']."</td>";
                            echo "<td>".$admin['name']."</td>";
                            echo "<td>".$admin['mobile']."</td>";
                            echo "<td>".$admin['created_dt']."</td>";
                            echo "<td>".$admin['modified_dt']."</td>";?>
                            <td>
                              <a href="<?php echo base_url();?>admin/user/edit/<?php echo $admin['id']; ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                              <a href="<?php echo base_url();?>admin/user/delete/<?php echo $admin['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
                <!-- Admins List -->

              </div>
            </div>
          </div>
        </div>
      </div><br><br>
      <!-- List Of All Admins -->

    <?php } ?>

    <!-- List of Teachers -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
                
              <!-- Heading -->
              <div class="card mb-4 wow fadeIn">
                <h2 style="text-align:center;color:blue;margin-top:7px;"><b>List Of TEACHERS</b></h2>
              </div>
              <!-- Heading -->

              <!-- Teachers List -->
              <div class="table-responsive">
                <table  id="teacher" class="table table-striped table-bordered zero-configuration">
                  <thead>
                    <tr style="color:blue;">
                      <th>Id</th>
                      <th>Branch</th>
                      <th>Name</th>
                      <th>Mobile No</th>
                      <th>Class</th>
                      <th>Section</th>
                      <th>Subject</th>
                      <th style="width:120px">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if(!empty($teachers)) {
                      $count = 1;
                      foreach($teachers as $teacher) {
                        foreach($teacher['_mappings'] as $map) {
                          echo "<tr>";
                          echo "<td id='count'>".$count."</td>";
                          echo "<td>".$teacher['_branch']['branch_code']."</td>";
                          echo "<td>".$teacher['name']."</td>";
                          echo "<td>".$teacher['mobile']."</td>";
                          echo "<td>".$map['_class']['class_code']."</td>";
                          echo "<td>".$map['_section']['section_code']."</td>";
                          echo "<td>".$map['_subject']['subject_code']."</td>";?>
                          <td>
                            <a href="<?php echo base_url();?>admin/user/edit/<?php echo $teacher['id']; ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                            <a href="<?php echo base_url();?>admin/user/delete/<?php echo $teacher['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            <a href="<?php echo base_url();?>admin/teacher/mappings/<?php echo $teacher['id']; ?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
                          </td>
                        <?php echo "</tr>";
                        $count++;
                        }
                      }
                    } else {
                      echo "<tr>";
                        echo "<td colspan='8' style='text-align:center;'>No Data To Display</td>";
                      echo "</tr>";
                    } ?>
                  </tbody>
                </table>
              </div>
              <!-- Teachers List -->

            </div>
          </div>
        </div>
      </div>
    </div><br><br>
    <!-- List Of Teachers -->

    <!-- List of Students -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
                
              <!-- Heading -->
              <div class="card mb-4 wow fadeIn">
                <h2 style="text-align:center;color:blue;margin-top:7px;"><b>List Of STUDENTS</b></h2>
              </div>
              <!-- Heading -->

              <!-- Students List -->
              <div class="table-responsive">
                <table  id="student" class="table table-striped table-bordered zero-configuration">
                  <thead>
                    <tr style="color:blue;">
                      <th>Id</th>
                      <th>Branch</th>
                      <th>Name</th>
                      <th>Father Name</th>
                      <th>Class</th>
                      <th>Section</th>
                      <th>Mobile No</th>
                      <th style="width:120px">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if(!empty($students)) {
                      $count = 1;
                      foreach($students as $student) {
                        echo "<tr>";
                          echo "<td id='count'>".$count."</td>";
                          echo "<td>".$student['_branch']['branch_code']."</td>";
                          echo "<td>".$student['name']."</td>";
                          echo "<td>".$student['father_name']."</td>";
                          echo "<td>".$student['_class']['class_code']."</td>";
                          echo "<td>".$student['_section']['section_code']."</td>";
                          echo "<td>".$student['mobile']."</td>";?>
                          <td>
                            <a href="<?php echo base_url();?>admin/user/edit/<?php echo $student['id']; ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                            <a href="<?php echo base_url();?>admin/user/delete/<?php echo $student['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
              <!-- Students List -->
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- List Of Students -->  

  </main>
  <!--Main layout-->
              
  <!-- Footer & Scripts -->
  <?php include_once("includes/footer.php"); ?>
  <!-- Footer & Scripts -->

</body>
<!-- End Of Body -->
</html>