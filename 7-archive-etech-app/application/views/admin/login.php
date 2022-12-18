<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>ARCHIVE E-TECH</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

  <!-- Material Design Bootstrap -->
  <link href="<?php echo base_url(); ?>assets/admin/css/mdb.min.css" rel="stylesheet" type="text/css" />
  
  <!-- Your custom styles  -->
  <link href="<?php echo base_url(); ?>assets/admin/css/style.min.css" rel="stylesheet" type="text/css" />
</head>

<!-- Body Starts -->
<body>
  
  <!-- Full Page Intro -->
  <div class="view full-page-intro" style="background-image: url('<?php echo base_url(); ?>assets/admin/images/login.jpg'); background-repeat: no-repeat; background-size: cover;">
    <!-- Mask & flexbox options-->
    <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
      <!-- Content -->
      <div class="container">
        <!--Grid row-->
        <div class="row wow fadeIn">

          <!--Grid column-->
          <div class="col-md-6 mb-4 white-text text-center text-md-left">
            <h1 class="display-4 font-weight-bold">ARCHIVE E-TECH</h1>
            <hr class="hr-light">
            <p><strong>ADMIN PANEL</strong></p>
            <p class="mb-4 d-none d-md-block">
              <strong>The most comprehensive tutorial for the Students, Loved by over 500 000 users. Video and written versions
                available.</strong>
            </p>
            <a target="_blank" href="#" class="btn btn-indigo btn-lg">View User Website
              <i class="fas fa-graduation-cap ml-2"></i>
            </a>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-6 col-xl-5 mb-4">
            <!--Card-->
            <div class="card">
              <!--Card content-->
              <div class="card-body">
                <!-- Form -->
                <form method="post" action="<?php echo base_url();?>admin/login">
                  <!-- Heading -->
                  <h3 class="dark-grey-text text-center">
                    <strong>Login To Archive</strong>
                  </h3>
                  <hr>
                  <!-- Error Message -->
                  <?php if(isset($error)) {
                    echo '<div class="alert alert-danger">';
                    echo '<strong>'.$error.'</strong>';
                    echo '</div><br>';
                  }?> 
                  <!-- Error Message -->
                  <!-- Email -->
                  <div class="md-form">
                    <i class="fas fa-envelope prefix grey-text"></i>
                    <input type="text" name="email" id="email" class="form-control" required>
                    <label for="email">Email</label>
                  </div>
                  <!-- Password -->
                  <div class="md-form">
                    <i class="fas fa-eye prefix grey-text"></i>
                    <input type="password" name="password" id="password" class="form-control" required>
                    <label for="password">Password</label>
                  </div>

                  <div class="text-center">
                    <button class="btn btn-indigo">Send</button>
                    <hr>
                  </div>
                  
                </form>
                <!-- Form -->
              </div>
              <!--Card content-->
            </div>
            <!--/.Card-->
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </div>
      <!-- Content -->
    </div>
    <!-- Mask & flexbox options-->
  </div>
  <!-- Full Page Intro -->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();
  </script>

</body>
<!-- End of body -->

</html>
<!-- End of html -->