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
      
      <!-- start secton -->
      <div class="row wow fadeIn">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">

              <!-- Heading -->
              <div class="card mb-4 wow fadeIn">
                <h2 style="text-align:center;color:blue;margin-top:7px;"><b>Edit Section</b></h2>
              </div>
              <!-- Heading -->

              <!-- Form -->
              <div class="basic-form">
                <form action="<?php echo base_url();?>admin/section/update/<?php echo $item['id']; ?>" method="post" >

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

                  <!-- Select Class -->
                  <div class="form-group">
                    <label>Select Class</label>
                    <select class="form-control" name="class_id" id="class_id" required>
                    <?php 
                        if(!empty($classItems)) {
                          foreach($classItems as $class) {?>
                            <?php if($item['class_id'] == $class['id']) { ?>
                              <option value="<?php echo $class['id']; ?>" selected><?php echo $class['class_code']." ( ".$class['class_name']." )"; ?></option>
                            <?php } else ?>
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
                      <input type="text" name="section_name" id="section_name" class="form-control" value="<?php echo $item['section_name']; ?>" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Section Code</label>
                      <input type="text" name="section_code" id="section_code" class="form-control" value="<?php echo $item['section_code']; ?>">
                    </div>
                  </div>
                  <!-- Section code & Name -->

                  <!-- Create Button -->
                  <div style="text-align:center;">
                    <button type="submit" class="btn btn-primary">Update Section</button>
                  </div>
                  <!-- Create Button -->

                </form>
              </div>
              <!-- Form -->
                
            </div>    
          </div>
        </div>
      </div>
      <!-- end secton -->
    </div><br><br><br>
    <!-- Add secton -->

  </main>
  <!--Main layout-->
              
  <!-- Footer & Scripts -->
  <?php include_once("includes/footer.php"); ?>
  <!-- Footer & Scripts -->

  <!-- CK Script -->
  <script>
    CKEDITOR.replace('description', {});
  </script>
  <!-- Script -->

</body>
<!-- End Of Body -->
</html>