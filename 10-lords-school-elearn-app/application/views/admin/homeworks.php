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
      
      <!-- start Home Works -->
      <div class="row wow fadeIn">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">

              <!-- Heading -->
              <div class="card mb-4 wow fadeIn">
                <h2 style="text-align:center;color:blue;margin-top:7px;"><b>Add Home Works</b></h2>
              </div>
              <!-- Heading -->

              <!-- Form -->
              <div class="basic-form">
                <form action="<?php echo base_url();?>admin/homework/insert" method="post" enctype="multipart/form-data">

                  <!-- Select date -->
                  <div class="form-group">
                    <label>Select class</label>
                    <input type="date" name="homework_on" id="homework_on" class="form-control" required>
                  </div>
                  <!-- Select date -->

                  <!-- Select class -->
                  <div class="form-group">
                    <label>Select class</label>
                    <select class="form-control" name="class_id" id="class_id" onchange="getSectionsSubjects(this)">
                      <option value="0">Select Class</option>
                      <?php 
                      if(!empty($classItems)) {
                        foreach($classItems ?? [] as $class) {?>
                          <option value="<?php echo $class['id']; ?>"><?php echo $class['class_code']." ( ".$class['class_name']." )"; ?></option>
                        <?php }
                      }?>
                    </select>
                  </div>
                  <!-- Select class -->

                  <!-- getsubjects-->
                  <div id="getsubjects" class="form-group"></div>

                  <!-- getsections-->
                  <div id="getsections" class="form-group"></div>

                  <!-- Title -->
                  <div class="form-group">
                    <label>Title Of The Homework</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="" required>
                  </div>
                  <!-- Title -->

                  <!-- Description -->
                  <div class="form-group">
                    <label>Complete Description About Home Work</label>
                    <textarea name="description" id="description" class="form-control" placeholder="" ></textarea>
                  </div>
                  <!-- Short Description -->

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
      <!-- end Home Works -->
    </div><br><br>
    <!-- Add Home Works -->

    <!-- List of Home Works -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
                
              <!-- Heading -->
              <div class="card mb-4 wow fadeIn">
                <h2 style="text-align:center;color:blue;margin-top:7px;"><b>List Of Home Works</b></h2>
              </div>
              <!-- Heading -->

              <!-- List Home Works -->
              <div class="table-responsive">
                <table  id="datatable" class="table table-striped table-bordered zero-configuration">
                  <thead>
                    <tr style="color:blue;">
                      <th>Id</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Homework On</th>
                      <th>Class</th>
                      <th>Subject</th>
                      <th>Sections</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if(!empty($items)) {
                      $count = 1;
                      foreach($items as $item) {
                        echo "<tr>";
                          echo "<td id='count'>".$count."</td>";
                          echo "<td>".$item['title']."</td>";
                          if(!empty($item['image'])) echo "<td><img src='".$item['image']."' alt='Image Missing' width='50' height='50'></td>"; else echo "<td>NO IMAGE</td>";
                          echo "<td>".$item['homework_on']."</td>";
                          echo "<td>".$item['_class']['class_code']."</td>";
                          echo "<td>".$item['_subject']['subject_code']."</td>";
                          $sectionCode = "( ";
                          foreach($item['_sections'] as $section) {
                            $sectionCode .= $section['section_code']." / ";
                          }
                          $sectionCode = rtrim($sectionCode, " / ");
                          $sectionCode .= " )";
                          echo "<td>".$sectionCode."</td>";?>
                          <td>
                            <a href="<?php echo base_url();?>admin/homework/edit/<?php echo $item['id']; ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                            <a href="<?php echo base_url();?>admin/homework/delete/<?php echo $item['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            <a href="<?php echo base_url();?>homework/<?php echo $item['uuid']; ?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
                          </td>
                        <?php echo "</tr>";
                        $count++;
                      }
                    } else {
                      echo "<tr>";
                        echo "<td colspan='8' style='text-align:center;'>No Data To Display</td>";
                      echo "</tr>";
                    } ?>
                  </tbody>
                </table>
              </div>
              <!-- Home Works List -->
            
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- List Of Home Works -->    

  </main>
  <!--Main layout-->
              
  <!-- Footer & Scripts -->
  <?php include_once("includes/footer.php"); ?>
  <!-- Footer & Scripts -->

  <!-- Datatable Script -->
  <script>
  $('#datatable').dataTable({
    "columnDefs": [
      { "width": "1px", "targets": 0 },
      { "width": "100px", "targets": 1 },
      { "width": "50px", "targets": 2 },
      { "width": "30px", "targets": 3 },
      { "width": "30px", "targets": 4 },
      { "width": "30px", "targets": 5 },
      { "width": "20px", "targets": 6 },
      { "width": "100px", "targets": 7 }
    ]
  });
  </script>
  <!-- Datatable Script -->
  
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