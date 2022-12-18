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

<!-- Body started -->
<body class="grey lighten-3">
  
  <!--Main Navigation-->
  <header>
    <?php include_once("includes/headers.php"); ?>
  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main class="pt-5 mx-lg-5">

    <!-- Statistics -->
    <div class="container-fluid mt-5">
      <div class="row">

        <!-- Branches -->
        <div class="col-lg-3 col-sm-6">
          <div class="card gradient-3" style="background-color:black">
            <div class="card-body">
              <h3 class="card-title text-white">Total Branches</h3>
              <div class="d-inline-block">
                <h2 class="text-white"><?php echo $item['total_branches']; ?></h2>
                <p class="text-white mb-0"><?php echo date('Y-m-d'); ?></p>
              </div>
            </div>
          </div>
        </div>
        <!-- Branches -->

        <!-- Students -->
        <div class="col-lg-3 col-sm-6">
          <div class="card gradient-3" style="background-color:black">
            <div class="card-body">
              <h3 class="card-title text-white">Total Students</h3>
              <div class="d-inline-block">
                <h2 class="text-white"><?php echo $item['total_students']; ?></h2>
                <p class="text-white mb-0"><?php echo date('Y-m-d'); ?></p>
              </div>
            </div>
          </div>
        </div>
        <!-- Students -->

        <!-- Teachers -->
        <div class="col-lg-3 col-sm-6">
          <div class="card gradient-3" style="background-color:black">
            <div class="card-body">
              <h3 class="card-title text-white">Total Teachers</h3>
              <div class="d-inline-block">
                <h2 class="text-white"><?php echo $item['total_teachers']; ?></h2>
                <p class="text-white mb-0"><?php echo date('Y-m-d'); ?></p>
              </div>
            </div>
          </div>
        </div>
        <!-- Teachers -->

        <!-- Notifications -->
        <div class="col-lg-3 col-sm-6">
          <div class="card gradient-3" style="background-color:black">
            <div class="card-body">
              <h3 class="card-title text-white">Notifications</h3>
              <div class="d-inline-block">
                <h2 class="text-white"><?php echo $item['total_notifications']; ?></h2>
                <p class="text-white mb-0"><?php echo date('Y-m-d'); ?></p>
              </div>
            </div>
          </div>
        </div>
        <!-- Notifications -->

      </div> 
    </div><br><br>
    <!-- Statistics -->
    
    <!-- Statistics -->
    <div class="container-fluid mt-5">
      <div class="row">

        <!-- Videos -->
        <div class="col-lg-3 col-sm-6">
          <div class="card gradient-3" style="background-color:black">
            <div class="card-body">
              <h3 class="card-title text-white">Total Videos</h3>
              <div class="d-inline-block">
                <h2 class="text-white"><?php echo $item['total_videos']; ?></h2>
                <p class="text-white mb-0"><?php echo date('Y-m-d'); ?></p>
              </div>
            </div>
          </div>
        </div>
        <!-- Videos -->

        <!-- Notes -->
        <div class="col-lg-3 col-sm-6">
          <div class="card gradient-3" style="background-color:black">
            <div class="card-body">
              <h3 class="card-title text-white">Total Notes</h3>
              <div class="d-inline-block">
                <h2 class="text-white"><?php echo $item['total_notes']; ?></h2>
                <p class="text-white mb-0"><?php echo date('Y-m-d'); ?></p>
              </div>
            </div>
          </div>
        </div>
        <!-- Notes -->

        <!-- Homeworks -->
        <div class="col-lg-3 col-sm-6">
          <div class="card gradient-3" style="background-color:black">
            <div class="card-body">
              <h3 class="card-title text-white">Total Homeworks</h3>
              <div class="d-inline-block">
                <h2 class="text-white"><?php echo $item['total_homeworks']; ?></h2>
                <p class="text-white mb-0"><?php echo date('Y-m-d'); ?></p>
              </div>
            </div>
          </div>
        </div>
        <!-- Homeworks -->

        <!-- HW Submissions -->
        <div class="col-lg-3 col-sm-6">
          <div class="card gradient-3" style="background-color:black">
            <div class="card-body">
              <h3 class="card-title text-white">Submissions</h3>
              <div class="d-inline-block">
                <h2 class="text-white"><?php echo $item['total_homeworkSubmissions']; ?></h2>
                <p class="text-white mb-0"><?php echo date('Y-m-d'); ?></p>
              </div>
            </div>
          </div>
        </div>
        <!-- HW Submissions -->

      </div> 
    </div><br><br>
    <!-- Statistics -->
    
  </main>
  <!--Main layout-->
     
  <!-- Footer & Scripts -->
  <?php include_once("includes/footer.php"); ?>
  <!-- Footer & Scripts -->
  
</body>
<!-- End Of Body -->
</html>