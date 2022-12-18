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
                <h2 style="text-align:center;color:blue;margin-top:7px;"><b>Add Notifications</b></h2>
              </div>
              <!-- Heading -->

              <!-- Form -->
              <div class="basic-form">
                <form action="<?php echo base_url();?>admin/notification/insert" method="post">

                  <!-- Select Category -->
                  <div class="form-group">
                    <label>Select Category</label>
                    <select class="form-control" name="category_id" id="category_id">
                      <option value="0">Select Category</option>
                      <?php 
                      if(!empty($categoryItems)) {
                        foreach($categoryItems ?? [] as $category) {?>
                          <option value="<?php echo $category['id']; ?>"><?php echo $category['category_code']." ( ".$category['category_name']." )"; ?></option>
                        <?php }
                      }?>
                    </select>
                  </div>
                  <!-- Select Category -->
                    
                  <!-- Title -->
                  <div class="form-group">
                    <label>Title Of The Notification</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="" required>
                  </div>
                  <!-- Title -->

                  <!-- Description -->
                  <div class="form-group">
                    <label>Complete Description For Notification</label>
                    <textarea name="description" id="description" class="form-control" placeholder="" ></textarea>
                  </div>
                  <!-- Short Description -->

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
      <!-- end Notifications -->
    </div><br><br><br>
    <!-- Add Notifications -->

    <!-- List of Notifications -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
                
              <!-- Heading -->
              <div class="card mb-4 wow fadeIn">
                <h2 style="text-align:center;color:blue;margin-top:7px;"><b>List Of Notifications</b></h2>
              </div>
              <!-- Heading -->

              <!-- List Notifications -->
              <div class="table-responsive">
                <table  id="datatable" class="table table-striped table-bordered zero-configuration">
                  <thead>
                    <tr style="color:blue;">
                      <th>Id</th>
                      <th>Title</th>
                      <th>Category</th>
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
                          if($item['category_id']!=0) echo "<td>".$item['_category']['category_code']."</td>"; else echo "<td>GENERAL</td>";
                          if($item['status'] == 1) {
                            echo "<td style='color:green;'><b>ACTIVE</b></td>";
                          } else {
                            echo "<td style='color:blue;'>DRAFT</td>";
                          }
                          echo "<td>".$item['created_dt']."</td>";
                          echo "<td>".$item['modified_dt']."</td>";?>
                          <td>
                            <a href="<?php echo base_url();?>admin/notification/edit/<?php echo $item['id']; ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                            <a href="<?php echo base_url();?>admin/notification/delete/<?php echo $item['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            <a href="<?php echo base_url();?>notifications/<?php echo $item['id']; ?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
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
              <!-- Notifications List -->
            
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- List Of Notifications -->    

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
      { "width": "50px", "targets": 2 },
      { "width": "50px", "targets": 3 },
      { "width": "30px", "targets": 4 },
      { "width": "30px", "targets": 5 },
      { "width": "100px", "targets": 6 }
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