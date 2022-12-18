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
      
      <!-- start Notifications -->
      <div class="row wow fadeIn">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">

              <!-- Heading -->
              <div class="card mb-4 wow fadeIn">
                <h2 style="text-align:center;color:blue;margin-top:7px;"><b>Edit Notiication</b></h2>
              </div>
              <!-- Heading -->

              <!-- Form -->
              <div class="basic-form">
                <form action="<?php echo base_url();?>admin/notification/update/<?php echo $item['id']; ?>" method="post">

                  <!-- Select Category -->
                  <div class="form-group">
                    <label>Select Category</label>
                    <select class="form-control" name="category_id" id="category_id">
                      <option value="0">Remove Category</option>
                      <?php 
                      if(!empty($categoryItems)) {
                        foreach($categoryItems ?? [] as $category) {
                          if($item['category_id']==$category['id']) {?>
                            <option value="<?php echo $category['id']; ?>" selected><?php echo $category['category_code']." ( ".$category['category_name']." )"; ?></option>
                          <?php } else { ?>
                            <option value="<?php echo $category['id']; ?>"><?php echo $category['category_code']." ( ".$category['category_name']." )"; ?></option>
                          <?php }
                        }
                      }?>
                    </select>
                  </div>
                  <!-- Select Category -->
                    
                  <!-- Title -->
                  <div class="form-group">
                    <label>Title Of The Notification</label>
                    <input type="text" name="title" id="title" class="form-control" value="<?php echo $item['title']; ?>" required>
                  </div>
                  <!-- Title -->

                  <!-- Description -->
                  <div class="form-group">
                    <label>Complete Description For Notification</label>
                    <textarea name="description" id="description" class="form-control" ><?php echo $item['description']; ?></textarea>
                  </div>
                  <!-- Description -->

                  <!-- Status -->
                  <div class="form-group">
                    <label>Select Status</label>
                    <select class="form-control" name="status" id="status">
                      <?php if($item['status']==1) {?>
                        <option value="1" selected>ACTIVE</option>
                        <option value="0">DRAFT</option>
                      <?php } else {?>
                        <option value="1">ACTIVE</option>
                        <option value="0" selected>DRAFT</option>
                      <?php } ?>
                    </select>
                  </div>

                  <!-- Update Button -->
                  <div style="text-align:center;">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a type="button" class="btn btn-primary" href="<?php echo base_url();?>admin/notifications">Cancel</a>
                  </div>
                  <!-- Update Button -->

                </form>
              </div>
              <!-- Form -->
                
            </div>    
          </div>
        </div>
      </div>
      <!-- end Notifications -->
    </div><br><br><br>
    <!-- Add Notifications -->

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