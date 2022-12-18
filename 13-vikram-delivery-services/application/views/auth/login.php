<!DOCTYPE html>
  <html class="h-100" lang="en">

  <!-- Head -->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Image Logo -->
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/images/logoup.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Title -->
    <title itemprop="name">LOGIN - VIKRAM DELIVERY SERVICES</title>

    <!-- Images -->
    <meta property="og:image" content="<?php echo base_url(); ?>assets/images/logoup.png">
    <meta itemprop="image" content="<?php echo base_url(); ?>assets/images/logoup.png">
    <meta name="description" content="Vikram Delivery Services is a online & offline delivery service. we do all delivery & services as per user requests such as delivering vegetables, glocerious, medicines, fruits, alcohol, food, sweets & etc.. also we service all types of works such as car wash, bike wash, home cleanup, functions video coverages, vehicle repair & etc..." />
    <meta name="keywords" content="vikram delivery services, vikram, delivery, services, delivery & services, online services, online delivery, offline delivery, offline services, vegitables, gloceries, medicines, fruits, alcohol, food, sweets, car wash, bike wash, home cleanup, functions, studio, vehicle repairs, alcohol deliver, biryani" /> 

    <!-- Font awesome & css -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
  </head>
  <!-- Head -->

  <!-- Body -->
  <body class="h-100" style="background-color:black;">
    
    <!-- Pre-Loader -->
    <div id="preloader">
      <div class="loader">
        <svg class="circular" viewBox="25 25 50 50">
          <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
        </svg>
      </div>
    </div>
    <!-- Pre-Loader -->

    <!-- Registration Form -->
    <div class="login-form-bg h-100">
      <div class="container h-100">
        <div class="row justify-content-center h-100">
          <div class="col-xl-6">
            <div class="form-input-content">
              <div class="card login-form mb-0">
                <div class="card-body pt-5">
                      
                  <!-- Heading -->
                  <a class="text-center" href="<?php echo base_url(); ?>"> 
                    <h4>VDS login</h4>
                  </a>
                  <!-- Heading -->

                  <!-- Error Message -->
                  <?php if($this->session->flashdata('error')) {
                    echo '<div class="col-md-12 alert alert-danger">';
                    echo '<strong>'.$this->session->flashdata('error').'</strong>';
                    echo '</div>';
                  }?> 
                  <!-- Error Message -->
                  <!-- Success Message -->
                  <?php if($this->session->flashdata('success')) {
                    echo '<div class="col-md-12 alert alert-success">';
                    echo '<strong>'.$this->session->flashdata('success').'</strong>';
                    echo '</div>';
                  }?> 
                  <!-- Success Message -->
        
                  <!-- Form -->
                  <form class="mt-5 mb-5 login-input" action="<?php echo base_url();?>auth/login/user" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <input type="number" class="form-control" name="mobile" placeholder="Mobile Number" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" name="password" placeholder="******" required>
                    </div>
                    <button class="btn login-form__btn submit w-100">Sign In</button>
                  </form>
                  <!-- Form -->

                  <!-- Links -->
                  <p class="mt-5 login-form__footer">
                    Not Yet Registered? <a href="<?php echo base_url();?>auth/register" class="text-primary"><b>Register Here</b></a>
                    | Fogot Password ? <a href="<?php echo base_url();?>auth/forgotpassword" class="text-primary"><b>Reset Here</b></a>
                  </p>
                                
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Scripts -->
    <script src="<?php echo base_url(); ?>assets/plugins/common/common.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/custom.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/settings.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/gleek.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/styleSwitcher.js"></script>
    <!-- Scripts -->

  </body>
</html>