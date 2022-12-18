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
      
      <!-- start Posts -->
      <div class="row wow fadeIn">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">

              <!-- Heading -->
              <div class="card mb-4 wow fadeIn">
                <h2 style="text-align:center;color:blue;margin-top:7px;"><b>Edit Post</b></h2>
              </div>
              <!-- Heading -->

              <!-- Form -->
              <div class="basic-form">
                <form action="<?php echo base_url();?>admin/post/update/<?php echo $item['id']; ?>" method="post" enctype="multipart/form-data">

                  <!-- Select Branches & Subjects -->
                  <div class="form-row">
                    <!-- Select Branch -->
                    <div class="form-group col-md-6">
                      <label>Select Branch</label>
                      <select class="form-control" name="branch_id" id="branch_id" disabled>
                        <?php 
                        if(!empty($branchItems)) {
                          foreach($branchItems ?? [] as $branch) {
                            if($item['branch_id']==$branch['id']) {?>
                              <option value="<?php echo $branch['id']; ?>" selected><?php echo $branch['branch_code']." ( ".$branch['branch_name']." )"; ?></option>
                            <?php } else { ?>
                              <option value="0">Cant Update Branch!</option>
                            <?php }
                          }
                        }?>
                      </select>
                    </div>
                    <!-- Select Branch -->
                    <!-- Select Subjects -->
                    <div class="form-group col-md-6">
                      <label>Select Subject</label>
                      <select class="form-control" name="subject_id" id="subject_id" disabled>
                        <?php 
                        if(!empty($subjectItems)) {
                          foreach($subjectItems ?? [] as $subject) {
                            if($item['subject_id']==$subject['id']) {?>
                              <option value="<?php echo $subject['id']; ?>" selected><?php echo $subject['subject_code']." ( ".$subject['subject_name']." )"; ?></option>
                            <?php } else { ?>
                              <option value="0">Cant Update Subject!</option>
                            <?php }
                          }
                        }?>
                      </select>
                    </div>
                    <!-- Select Subjects -->
                  </div>
                  <!-- Select Branches & Subjects --> 

                  <!-- Title -->
                  <div class="form-group">
                    <label>Title Of The Post</label>
                    <input type="text" name="title" id="title" class="form-control" value="<?php echo $item['title']; ?>" required>
                  </div>
                  <!-- Title -->

                  <!-- Short Description -->
                  <div class="form-group">
                    <label>Short Description For Post</label>
                    <textarea name="short_description" id="short_description" class="form-control"><?php echo $item['short_description']; ?></textarea>
                  </div>
                  <!-- Short Description -->

                  <!-- Post Type -->
                  <div class="form-group">
                    <label>Select Post Type</label>
                    <select class="form-control" name="post_type" id="post_type" required>
                      <?php if($item['post_type']=="DOCUMENTS") {?>
                        <option value="DOCUMENTS" selected>DOCUMENTS</option>
                        <option value="YOUTUBE">YOUTUBE</option>
                      <?php } else {?>
                        <option value="DOCUMENTS">DOCUMENTS</option>
                        <option value="YOUTUBE" selected>YOUTUBE</option>
                      <?php } ?>
                    </select>
                  </div>
                  <!-- Post Type -->
                  
                  <!-- Upload File -->
                  <div class="form-group">
                    <label>
                      Select The Document
                      <?php if(empty($item['image'])) {
                        echo "( <b style='color:red'>NO FILE UPLOADED</b> )"; 
                      } else {
                        echo "( <b style='color:green'>FILE EXIST</b> )";
                      }?></label>
                    <div class="custom-file">
                      <input type="file" name="image" id="image" class="custom-file-input">
                      <label class="custom-file-label">Choose file</label>
                    </div>
                  </div>
                  <!-- Upload File -->

                  <!-- Share Your Youtube URL -->
                  <div class="form-group">
                    <label>Share Your Youtube URL</label>
                    <input type="text" name="youtube_url" id="youtube_url" class="form-control" value="<?php echo $item['youtube_url']; ?>">
                  </div>
                  <!-- Share Your Youtube URL -->

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
                    <a type="button" class="btn btn-primary" href="<?php echo base_url();?>admin/posts">Cancel</a>
                  </div>
                  <!-- Update Button -->

                </form>
              </div>
              <!-- Form -->
                
            </div>    
          </div>
        </div>
      </div>
      <!-- end Posts -->
    </div><br><br><br>
    <!-- Add Posts -->

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