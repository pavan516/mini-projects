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
      
      <!-- start Teacher Mappings -->
      <div class="row wow fadeIn">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">

              <!-- Heading -->
              <div class="card mb-4 wow fadeIn">
                <h2 style="text-align:center;color:blue;margin-top:7px;">
                Map Subjects To - <b> <?php echo $teacher['name']; ?> </b>
              </h2>
              </div>
              <!-- Heading -->

              <!-- Form -->
              <div class="basic-form">
                <form action="<?php echo base_url();?>admin/teacher/mapping/insert" method="post">

                  <!-- Teacher Id -->
                  <input type="hidden" name="teacher_id"value="<?php echo $teacher['id']?>">
                  <!-- Teacher Id -->

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

                  <!-- getsections-->
                  <div id="getsections" class="form-group"></div>

                  <!-- getsubjects-->
                  <div id="getsubjects" class="form-group"></div>

                  <!-- Script -->
                  <script>
                    function getSectionsSubjects(input_type) {
                      // To show section items
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
                    }
                  </script>

                  <!-- Add Button -->
                  <div style="text-align:center;">
                    <button type="submit" class="btn btn-primary">ADD</button>
                    <a href="<?php echo base_url();?>admin/users" type="button" class="btn btn-primary">Go Back To Users Page</a>
                  </div>
                  <!-- Add Button -->

                </form>
              </div>
              <!-- Form -->
                
            </div>    
          </div>
        </div>
      </div>
      <!-- end Teacher Mappings -->
    </div><br><br><br>
    <!-- Add Teacher Mappings -->

    <!-- List of Teacher Mappings -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
                
              <!-- Heading -->
              <div class="card mb-4 wow fadeIn">
                <h2 style="text-align:center;color:blue;margin-top:7px;"><b>List Of Classes</b></h2>
              </div>
              <!-- Heading -->

              <!-- List Teacher Mappings -->
              <div class="table-responsive">
                <table  id="datatable" class="table table-striped table-bordered zero-configuration">
                  <thead>
                    <tr style="color:blue;">
                      <th>Id</th>
                      <th>Teacher</th>
                      <th>Class</th>
                      <th>Section</th>
                      <th>Subject</th>
                      <th>Created</th>
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
                          echo "<td>".$item['_teacher']['name']."</td>";
                          echo "<td>".$item['_class']['class_code']."</td>";
                          echo "<td>".$item['_section']['section_code']."</td>";
                          echo "<td>".$item['_subject']['subject_code']."</td>";
                          echo "<td>".$item['created_dt']."</td>";?>
                          <td>
                            <a href="<?php echo base_url();?>admin/teacher/mapping/delete/<?php echo $item['teacher_id']; ?>/<?php echo $item['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
              <!-- Teacher Mappings List -->
            
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- List Of Teacher Mappings -->    

  </main>
  <!--Main layout-->
              
  <!-- Footer & Scripts -->
  <?php include_once("includes/footer.php"); ?>
  <!-- Footer & Scripts -->

  <!-- Datatable Script -->
  <script>
  $('#datatable').dataTable({
    "columnDefs": [
      { "width": "10px", "targets": 0 },
      { "width": "100px", "targets": 1 },
      { "width": "100px", "targets": 2 },
      { "width": "100px", "targets": 3 },
      { "width": "100px", "targets": 4 },
      { "width": "100px", "targets": 5 },
      { "width": "100px", "targets": 6 },
      { "width": "130px", "targets": 7 }
    ]
  });
  </script>
  <!-- Datatable Script -->
  
</body>
<!-- End Of Body -->
</html>