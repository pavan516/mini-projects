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
      
      <!-- start Userss -->
      <div class="row wow fadeIn">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">

              <!-- Heading -->
              <div class="card mb-4 wow fadeIn">
                <h2 style="text-align:center;color:blue;margin-top:7px;"><b>Edit User</b></h2>
              </div>
              <!-- Heading -->

              <!-- Form -->
              <div class="basic-form">
                <form action="<?php echo base_url();?>admin/user/update/<?php echo $item['id']; ?>" method="post" enctype="multipart/form-data">

                  <!-- Select Branch -->
                  <?php if($this->session->userdata('role') == "SUPER_ADMIN") {?>
                    <div class="form-group">
                      <label>Select Branch</label>
                      <select class="form-control" name="branch_id" id="branch_id">
                        <?php 
                        if(!empty($branchItems)) {
                          foreach($branchItems as $branch) {?>
                            <?php if($item['branch_id'] == $branch['id']) { ?>
                              <option value="<?php echo $branch['id']; ?>" selected><?php echo $branch['branch_code']." ( ".$branch['branch_name']." )"; ?></option>
                            <?php } else ?>
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
                      <?php 
                        if($item['role']=="ADMIN") { ?>
                          <option value="ADMIN" selected>ADMIN</option>
                        <?php } else if($item['role']=="TEACHERS") { ?>
                          <option value="TEACHERS" selected>TEACHERS</option>
                        <?php } else if($item['role']=="STUDENTS") { ?>
                          <option value="STUDENTS">STUDENTS</option>
                        <?php } ?>
                        <option value="ADMIN">ADMIN</option>
                        <option value="TEACHERS">TEACHERS</option>
                        <option value="STUDENTS">STUDENTS</option>
                    </select>
                  </div>
                  <!-- Select Role -->
                  
                  <!-- getclasses-->
                  <div id="getclasses" class="form-group">
                    <?php if($item['class_id'] != 0) {?>
                      <input type="text" class="form-control" value="<?php echo $item['_class']['class_code'];?>" disabled>
                    <?php } ?>
                  </div>

                  <!-- getsections-->
                  <div id="getsections" class="form-group">
                    <?php if($item['section_id'] != 0) {?>
                      <input type="text" class="form-control" value="<?php echo $item['_section']['section_code'];?>" disabled>
                    <?php } ?>
                  </div>

                  <!-- Name -->
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?php echo $item['name']; ?>" required>
                  </div>
                  <!-- Name -->

                  <!-- Father Name -->
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="father_name" id="father_name" class="form-control" value="<?php echo $item['father_name']; ?>" required>
                  </div>
                  <!-- Father Name -->

                  <!-- Mobile -->
                  <div class="form-group">
                    <label>Mobile</label>
                    <input type="number" name="mobile" id="mobile" class="form-control" value="<?php echo $item['mobile']; ?>" required>
                  </div>
                  <!-- Mobile -->

                  <!-- Upload Image -->
                  <div class="form-group">
                    <label>
                      Select an Image with less size 
                      <?php if(empty($item['image'])) {
                        echo "( <b style='color:red'>NO-IMAGE PLEASE SELECT</b> )"; 
                      } else {
                        echo "( <b style='color:green'>IMAGE EXIST - MODIFY IMAGE IF REQUIRED</b> )";
                      }?></label>
                    <div class="custom-file">
                      <input type="file" name="image" id="image" class="custom-file-input">
                      <label class="custom-file-label">Choose file</label>
                    </div>
                  </div>
                  <!-- Upload Image -->

                  <!-- Create Button -->
                  <div style="text-align:center;">
                    <button type="submit" class="btn btn-primary">Update User</button>
                    <a type="button" class="btn btn-primary" href="<?php echo base_url();?>admin/users">Cancel</a>
                  </div>
                  <!-- Create Button -->

                </form>
              </div>
              <!-- Form -->
                
            </div>    
          </div>
        </div>
      </div>
      <!-- end Userss -->
    </div><br><br><br>
    <!-- Add Userss -->

  </main>
  <!--Main layout-->
              
  <!-- Footer & Scripts -->
  <?php include_once("includes/footer.php"); ?>
  <!-- Footer & Scripts -->

  <!-- Script -->
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
  <!-- Script -->
                    
</body>
<!-- End Of Body -->
</html>