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

                  <!-- Select date -->
                  <div class="form-group">
                    <label>Select class</label>
                    <input type="date" name="post_on" id="post_on" class="form-control" value="<?php echo $item['post_on']; ?>" required>
                  </div>
                  <!-- Select date -->

                  <!-- Select class -->
                  <div class="form-group">
                    <label>Select class</label>
                    <select class="form-control" name="class_id" id="class_id" onchange="getSectionsSubjects(this)">
                      <option value="0">Select Class (Please re-select the class to modify any subject/section)</option>
                      <?php 
                      if(!empty($classItems)) {
                        foreach($classItems ?? [] as $class) {
                          if($item['_class']['id'] == $class['id']) {?>
                            <option value="<?php echo $class['id']; ?>" selected><?php echo $class['class_code']." ( ".$class['class_name']." )"; ?></option>
                          <?php } else {?>
                            <option value="<?php echo $class['id']; ?>"><?php echo $class['class_code']." ( ".$class['class_name']." )"; ?></option>
                          <?php }
                        }
                      }?>
                    </select>
                  </div>
                  <!-- Select class -->

                  <!-- getsubjects-->
                  <div id="getsubjects" class="form-group">
                    <label>Selected Subject</label>
                    <input type="text" name="subject_id" id="subject_id" value="<?php echo $item['_subject']['subject_code'] ?>" class="form-control" disabled>
                  </div>

                  <!-- getsections-->
                  <div id="getsections" class="form-group">
                    <label>Selected Sections</label>
                    <?php foreach($item['_sections'] as $section) {?>
                      <input type="text" value="<?php echo $section['section_code'] ?>" class="form-control" disabled>
                    <?php } ?>
                  </div>

                  <!-- Title -->
                  <div class="form-group">
                    <label>Title Of The Homework</label>
                    <input type="text" name="title" id="title" class="form-control" value="<?php echo $item['title'] ?>" required>
                  </div>
                  <!-- Title -->

                  <!-- Description -->
                  <div class="form-group">
                    <label>Complete Description About Post</label>
                    <textarea name="description" id="description" class="form-control" ><?php echo $item['description'] ?></textarea>
                  </div>
                  <!-- Short Description -->

                  <!-- Post Type -->
                  <div class="form-group">
                    <label>Post Type</label>
                    <input type="text" name="post_type" id="post_type" class="form-control" value="<?php echo $item['post_type'] ?>" disabled>
                  </div>
                  <!-- Post Type -->

                  <!-- For Youtube -->
                  <?php if($item['post_type'] == "YOUTUBE") { ?>
                    <!-- Share Your Youtube URL -->
                    <div class="form-group">
                      <label>Share Your Youtube URL</label>
                      <input type="text" name="youtube_url" id="youtube_url" class="form-control" value="<?php echo $item['youtube_url'] ?>">
                    </div>
                    <!-- Share Your Youtube URL -->
                  <?php }?>
                  <!-- For Youtube -->

                  <!-- For NOTES -->
                  <?php if($item['post_type'] == "NOTES") { ?>
                    <!-- Upload File -->
                    <div class="form-group">
                      <label>
                        Select The Document / PDF / IMAGE / DOCX / EXCEL
                        <?php if(empty($item['filepath'])) {
                          echo "( <b style='color:red'>NO-FILE PLEASE SELECT</b> )"; 
                        } else {
                          echo "( <b style='color:green'>FILE EXIST - MODIFY FILE IF REQUIRED</b> )";
                        }?></label>
                      <div class="custom-file">
                        <input type="file" name="file" id="file" class="custom-file-input">
                        <label class="custom-file-label">Choose file</label>
                      </div>
                    </div>
                    <!-- Upload File -->
                  <?php }?>
                  <!-- For NOTES -->

                  <!-- For NOTIFICATIONS -->
                  <?php if($item['post_type'] == "NOTIFICATIONS") { ?>
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
                  <?php }?>
                  <!-- For NOTIFICATIONS -->

                  <!-- Status -->
                  <div class="form-group">
                    <label>Select Status</label>
                    <select class="form-control" name="status" id="status">
                      <option value="1">ACTIVE</option>
                      <option value="0">DRAFT</option>                        
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

  <!-- Script -->
  <script>
    function getSectionsSubjects(input_type) {

      // selected value
      var selectedValue = input_type.value;
      
      // To show subject items
      var str1 = ''
      var subjects = <?php echo json_encode($subjectItems); ?>;
      str1 += '<label>Select subject</label>';
      str1 += '<select class="form-control" name="subject_id" id="subject_id">';
      str1 += '<option value="0">Select Subject</option>';
      for (i = 0; i < subjects.length; i++) {
        if(selectedValue == subjects[i].class_id){
          str1 += '<option value="'+subjects[i].id+'">'+subjects[i].subject_code+' ( '+subjects[i].subject_name+' )</option>';
        }
      }
      str1 += '</select>';
      document.getElementById('getsubjects').innerHTML = str1;

      // To show section items
      var str = '';
      var sections = <?php echo json_encode($sectionItems); ?>;
      for (i = 0; i < sections.length; i++) {
        if(selectedValue == sections[i].class_id){
          str += '&nbsp&nbsp';
          str += '<input type="checkbox" value="'+sections[i].id+'" name="sections[]" id="sections[]">';
          str += '&nbsp&nbsp';
          str += '<label>   '+sections[i].section_code+' ( '+sections[i].section_name+' )</label>';
        }
      }
      document.getElementById('getsections').innerHTML = str;
    }
  </script>
  <!-- Script -->

</body>
<!-- End Of Body -->
</html>