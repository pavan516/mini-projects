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

<!-- Body Start -->
<body class="grey lighten-3">

  <!-- Header -->
  <?php include_once("includes/headers.php"); ?>
  <!-- Header -->

  <!--Main layout-->
  <main class="mt-5 pt-5">
    <div class="container">
      <section class="mt-4">
        <div class="row">

          <!-- Left Part -->
          <div class="col-md-6">

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
            
            <!-- Heading -->
            <div class="card mb-4 wow fadeIn">
              <div class="card-header font-weight-bold" style="background-color:blue;padding-bottom:0px;text-align:center;color:white;">
                <p><?php echo $item['title']; ?></p>
              </div>
            </div>
            <!-- Heading -->

            <!-- Image -->
            <?php if(!empty($item['image'])) { ?>
              <div class="card mb-4 wow fadeIn text-center">
                <div class="card-body">
                  <!-- Image -->
                  <img src="<?php echo $item['image'];?>" class="card-img-top" alt="Image Missing">
                  <!-- Image -->
                </div>
              </div>
            <?php } ?>
            <!-- Image -->

            <!-- Download Image -->
            <?php if(!empty($item['image'])) { ?>
              <div class="card mb-4 wow fadeIn text-center">
                <div class="card-body">
                  <!-- Download link -->
                  <a href="<?php echo $item['image'];?>" target="_blank" class="btn btn-primary btn-md">
                    Download Image <i class="fas fa-download ml-2"></i>
                  </a>
                  <!-- Download link -->
                </div>
              </div>
            <?php } ?>
            <!-- Download Image -->

            <!-- description -->
            <div class="card mb-4 wow fadeIn">
              <!--Card content-->
              <div class="card-body">
                <p><?php echo $item['description'] ?? "NO DESCRIPTION";?></p>
              </div>
            </div>
            <!-- description -->
           
          </div>
          <!-- Left Part -->

          <!-- Right Part -->
          <div class="col-md-6">

            <!-- Heading -->
            <div class="card mb-4 wow fadeIn">
              <div class="card-header font-weight-bold" style="background-color:blue;padding-bottom:0px;text-align:center;color:white;">
                <p>Submit your homework</p>
              </div>
            </div>
            <!-- Heading -->

            <!-- Submit Homework -->
            <div class="card mb-3 wow fadeIn">
              <div class="card-header font-weight-bold">Submit your homework</div>
              <div class="card-body">

                <!-- Form -->
                <form action="<?php echo base_url();?>submit/homework" method="post" enctype="multipart/form-data">

                  <!-- homework id -->
                  <input type="hidden" id="student_id" name="student_id" value="<?php echo $this->session->userdata('id'); ?>">
                  <!-- homework id -->

                  <!-- homework uuid -->
                  <input type="hidden" id="uuid" name="uuid" value="<?php echo $item['uuid']; ?>">
                  <!-- homework uuid -->

                  <!-- Student id -->
                  <input type="hidden" id="homework_id" name="homework_id" value="<?php echo $item['id']; ?>">
                  <!-- Student id -->

                  <!-- Comment -->
                  <div class="form-group">
                    <label for="comment">Your comment</label>
                    <textarea class="form-control" id="comment" name="comment" rows="5"></textarea>
                  </div>
                  <!-- Comment -->

                  <!-- Upload Image -->
                  <div class="form-group">
                    <label>Select Image Of Your Homework</label>
                    <div class="custom-file">
                      <input type="file" name="image" id="image" class="custom-file-input" required>
                      <label class="custom-file-label">Choose file</label>
                    </div>
                  </div>
                  <!-- Upload Image -->

                  <!-- Submit -->
                  <div class="text-center mt-4">
                    <button class="btn btn-info btn-md" type="submit">Submit Homework</button>
                  </div>
                  <!-- Submit -->

                </form>
                <!-- Form -->
                
              </div>
            </div>
            <!-- Submit Homework -->
            
            <!-- Show homeworks if not empty -->
            <?php if(!empty($studenthomeworks)) { $count = 1;
              foreach($studenthomeworks as $studenthomework) { ?>
                <!-- Heading -->
                <div class="card-header font-weight-bold" style="background-color:blue;padding-bottom:0px;text-align:center;color:white;">
                  <p>Homework Image <?php echo $count ?></p>
                </div>
                <!-- Heading -->
                <!-- Image -->
                <?php if(!empty($studenthomework['image'])) { ?>
                  <div class="card mb-4 wow fadeIn text-center">
                    <div class="card-body">
                      <p><?php echo $studenthomework['comment']??'' ?></p>
                      <!-- Image -->
                      <img src="<?php echo $studenthomework['image'];?>" class="card-img-top" alt="Image Missing">
                      <!-- Image -->
                    </div>
                  </div>
                <?php } ?>
                <!-- Image -->
              <?php $count++; }
            } ?>
            <!-- Show homeworks if not empty -->

          </div>
          <!-- Right Part -->

          <!-- Go back button -->
          <div class="card-body text-center">
            <a href="<?php echo base_url();?>notifications" class="btn btn-primary btn-md">
              <i class="fas fa-arrow-left ml-2"></i> Go Back
            </a>
          </div>
          <!-- Go back button -->
           
        </div>
      </section>
    </div>
  </main>
  <!--Main layout-->

  <!-- Footer -->
  <?php include_once("includes/footer.php"); ?>
  <!-- Footer -->

</body>
<!-- End of body -->
</html>