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
      
      <!-- start categories -->
      <div class="row wow fadeIn">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">

              <!-- Heading -->
              <div class="card mb-4 wow fadeIn">
                <h2 style="text-align:center;color:blue;margin-top:7px;"><b>Add Categories</b></h2>
              </div>
              <!-- Heading -->

              <!-- Form -->
              <div class="basic-form">
                <form action="<?php echo base_url();?>admin/category/insert" method="post">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Category Name</label>
                      <input type="text" name="category_name" id="category_name" class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Category Code</label>
                      <input type="text" name="category_code" id="category_code" class="form-control" placeholder="">
                    </div>
                  </div>
                  <div style="text-align:center;"><button type="submit" class="btn btn-primary">Create</button></div>
                </form>
              </div>
              <!-- Form -->
                
            </div>    
          </div>
        </div>
      </div>
      <!-- end categories -->
    </div><br>
    <!-- Add Categories -->

    <!-- List of Categories -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
                
              <!-- Heading -->
              <div class="card mb-4 wow fadeIn">
                <h2 style="text-align:center;color:blue;margin-top:7px;"><b>List Of Categories</b></h2>
              </div>
              <!-- Heading -->

              <!-- List categories -->
              <div class="table-responsive">
                <table class="table table-striped table-bordered zero-configuration">
                  <thead>
                    <tr style="color:blue;">
                      <th>Id</th>
                      <th>Category Name</th>
                      <th>Category Code</th>
                      <th>Created Date</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if(!empty($items)) {
                      $count = 1;
                      foreach($items as $item) {
                        echo "<tr>";
                          echo "<td>".$count."</td>";
                          echo "<td>".$item['category_name']."</td>";
                          echo "<td>".$item['category_code']."</td>";
                          echo "<td>".$item['created_dt']."</td>";?>
                          <td>
                            <form action="<?php echo base_url();?>admin/category/delete" method="post">
                              <input type="text" name="category_id" id="category_id" value="<?php echo $item['id']; ?>" style="display:none;">                          
                              <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                          </td>
                        <?php echo "</tr>";
                        $count++;
                      }
                    } else {
                      echo "<tr>";
                        echo "<td colspan='5' style='text-align:center;'>No Data To Display</td>";
                      echo "</tr>";
                    } ?>
                  </tbody>
                </table>
              </div>
              <!-- Categories List -->
            
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- List Of Categories -->    

  </main>
  <!--Main layout-->
              
  <!-- Footer & Scripts -->
  <?php include_once("includes/footer.php"); ?>
  <!-- Footer & Scripts -->
  
</body>
<!-- End Of Body -->
</html>