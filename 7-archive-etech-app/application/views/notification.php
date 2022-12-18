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

<!-- Body Start -->
<body class="grey lighten-3">

  <!-- Header -->
  <?php include_once("includes/headers.php"); ?>
  <!-- Header -->

  <!--Main layout-->
  <main class="mt-5 pt-5">
    <div class="container">

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
      
      <!-- Post -->
      <section class="mt-4">

        <!--Grid row-->
        <div class="row">

          <!-- Center -->
          <div class="col-md-8 mb-4">

              <!-- Heading -->
              <div class="card mb-4 wow fadeIn">
                <div class="card-header font-weight-bold" style="background-color:blue;padding-bottom:0px;text-align:center;color:white;">
                  <p><?php echo $item['title']; ?></p>
                </div>
              </div>
              <!-- Heading -->

              <!-- Notification -->
              <div class="card mb-4 wow fadeIn">
                <div class="card-header font-weight-bold">
                  <?php echo $item['description']; ?>
                </div>
              </div>
              <!-- Notification -->
              
          </div>
          <!-- Center -->

          <!-- Right -->
          <div class="col-md-4 mb-4">
            
            <!-- Subscribe -->
            <div class="card mb-4 text-center wow fadeIn">

              <!-- Heading -->
              <div class="card-header">Please Subscribe To Get More Notifications To Mail!</div>
              <!-- Heading -->

              <!--Card content-->
              <div class="card-body">

                <!-- Default form login -->
                <form action="<?php echo base_url();?>subscriber/insert" method="post">

                  <!-- Email -->
                  <label for="defaultFormEmailEx" class="grey-text">Your email</label>
                  <input type="email" name="email" id="email" class="form-control" required>
                  <!-- Email -->
                  <br>
                  <!-- Name -->
                  <label for="defaultFormNameEx" class="grey-text">Your name</label>
                  <input type="text" name="name" id="name" class="form-control" required>
                  <!-- Name -->
                  <!-- Subscribe Button -->
                  <div class="text-center mt-4">
                    <button class="btn btn-info btn-md" type="submit">Subscribe</button>
                  </div>
                  <!-- Subscribe Button -->
                </form>
                <!-- Default form login -->

              </div>
              <!--Card content-->

            </div>
            <!-- Subscribe -->

            <!-- Related Notifications -->
            <div class="card mb-4 wow fadeIn">
              <div class="card-header">Latest Related Notifications</div>

                <!--Card content-->
                <div class="card-body">

                  <!-- Show related notifications -->
                  <ul class="list-unstyled">

                    <?php
                    if(!empty($items)) {
                      foreach($items as $data) {
                        if($item['id'] != $data['id']) {?>
                          <li class="media">
                            <div class="media-body">
                              <a href="<?php echo base_url();?>notifications/<?php echo $data['id'];?>">
                                <h5 class="mt-0 mb-1 font-weight-bold"><?php echo $data['title'];?></h5>
                              </a>
                            </div>
                          </li>
                          <hr/>
                        <?php }
                      }
                    }?>

                  </ul>
                  <!-- Show related posts -->

                </div>
                <!--Card content-->

              </div>
            </div>
            <!-- Related Notifications -->

          </div>
          <!-- Right -->

        </div>
        <!-- Grid Row -->

      </section>
      <!-- Right -->

    </div>
  </main>
  <!--Main layout-->

  <!-- Footer -->
  <?php include_once("includes/footer.php"); ?>
  <!-- Footer -->

</body>
<!-- End of body -->
</html>