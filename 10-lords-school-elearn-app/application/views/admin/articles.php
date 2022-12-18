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
      
      <!-- start articles -->
      <div class="row wow fadeIn">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">

              <!-- Heading -->
              <div class="card mb-4 wow fadeIn">
                <h2 style="text-align:center;color:blue;margin-top:7px;"><b>Add Articles</b></h2>
              </div>
              <!-- Heading -->

              <!-- Form -->
              <div class="basic-form">
                <form action="<?php echo base_url();?>admin/article/insert" method="post" enctype="multipart/form-data">

                  <!-- Select Branches & Subjects -->
                  <div class="form-row">
                    <!-- Select Branch -->
                    <div class="form-group col-md-6">
                      <label>Select Branch</label>
                      <select class="form-control" name="branch_id" id="branch_id" onchange="getSubjects(this)">
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
                    <!-- Select Subjects -->
                    <div id="getsubjects" class="form-group col-md-6"></div>
                    <!-- get subjects using script -->
                    <script>
                    function getSubjects(input_type) {

                      // Assign tables & converted to js array 
                      var subjects = <?php echo json_encode($subjectItems); ?>;
                                              
                      console.log(subjects);
                      // Get selected field name & value
                      var selectedText = input_type.options[input_type.selectedIndex].innerHTML;
                      var selectedValue = input_type.value;
                      var str = "";
                      str += '<label>Select Subject</label>';
                      str += '<select class="form-control" name="subject_id" id="subject_id">';
                      str += '<option value="0">Select Subject</option>';
                      for (i = 0; i < subjects.length; i++) {
                        if(selectedValue == subjects[i].branch_id) {
                          str += '<option value="'+subjects[i].id+'">'+subjects[i].subject_code+' ( '+subjects[i].subject_name+' )</option>';
                        }
                      }
                      str += '</select>';
                      document.getElementById('getsubjects').innerHTML = str;
                    }
                    </script>
                    <!-- get subjects using script -->
                  </div>
                  <!-- Select Branches & Subjects --> 

                  <!-- Title -->
                  <div class="form-group">
                    <label>Title Of The Article</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="" required>
                  </div>
                  <!-- Title -->

                  <!-- Short Description -->
                  <div class="form-group">
                    <label>Short Description For Article</label>
                    <textarea name="short_description" id="short_description" class="form-control" placeholder="" ></textarea>
                  </div>
                  <!-- Short Description -->

                  <!-- Description -->
                  <div class="form-group">
                    <label>Complete Description For Article</label>
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

                  <!-- Status -->
                  <div class="form-group">
                    <label>Select Status</label>
                    <select class="form-control" name="status" id="status">
                      <option value="1">ACTIVE</option>
                      <option value="0">DRAFT</option>                        
                    </select>
                  </div>

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
      <!-- end Articles -->
    </div><br><br><br>
    <!-- Add Articles -->

    <!-- List of Articles -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
                
              <!-- Heading -->
              <div class="card mb-4 wow fadeIn">
                <h2 style="text-align:center;color:blue;margin-top:7px;"><b>List Of Articles</b></h2>
              </div>
              <!-- Heading -->

              <!-- List Articles -->
              <div class="table-responsive">
                <table id="datatable" class="table table-striped table-bordered zero-configuration">
                  <thead>
                    <tr style="color:blue;">
                      <th>Id</th>
                      <th>Article Title</th>
                      <th>Image</th>
                      <th>Branch</th>
                      <th>Subject</th>
                      <th>Status</th>
                      <th>Created</th>
                      <th>Modified</th>
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
                          if($item['branch_id']!=0) echo "<td>".$item['_branch']['branch_code']."</td>"; else echo "<td>GENERAL</td>";
                          if($item['subject_id']!=0) echo "<td>".$item['_subject']['subject_code']."</td>"; else echo "<td>GENERAL</td>";
                          if($item['status'] == 1) {
                            echo "<td style='color:green;'><b>ACTIVE</b></td>";
                          } else {
                            echo "<td style='color:blue;'>DRAFT</td>";
                          }
                          echo "<td>".$item['created_dt']."</td>";
                          echo "<td>".$item['modified_dt']."</td>";?>
                          <td>
                            <a href="<?php echo base_url();?>admin/article/edit/<?php echo $item['id']; ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                            <a href="<?php echo base_url();?>admin/article/delete/<?php echo $item['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            <a href="<?php echo base_url();?>articles/<?php echo $item['id']; ?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
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
              <!-- Articles List -->
            
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- List Of Articles -->    

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
      { "width": "20px", "targets": 7 },
      { "width": "100px", "targets": 8 }
    ]
  });
  </script>
  <!-- Datatable Script -->
  
  <!-- CK Script -->
  <script>
    CKEDITOR.replace('description', {});
  </script>
  <!-- Script -->

</body>
<!-- End Of Body -->
</html>