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

        <!-- Subscribers -->
        <div class="col-lg-3 col-sm-6">
          <div class="card gradient-3" style="background-color:black">
            <div class="card-body">
              <h3 class="card-title text-white">Total Subscribers</h3>
              <div class="d-inline-block">
                <h2 class="text-white"><?php echo $item['total_subscribers']; ?></h2>
                <p class="text-white mb-0"><?php echo date('Y-m-d'); ?></p>
              </div>
            </div>
          </div>
        </div>
        <!-- Subscribers -->

        <!-- Posts -->
        <div class="col-lg-3 col-sm-6">
          <div class="card gradient-3" style="background-color:black">
            <div class="card-body">
              <h3 class="card-title text-white">Total Posts</h3>
              <div class="d-inline-block">
                <h2 class="text-white"><?php echo $item['total_posts']; ?></h2>
                <p class="text-white mb-0"><?php echo date('Y-m-d'); ?></p>
              </div>
            </div>
          </div>
        </div>
        <!-- Posts -->

        <!-- Articles -->
        <div class="col-lg-3 col-sm-6">
          <div class="card gradient-3" style="background-color:black">
            <div class="card-body">
              <h3 class="card-title text-white">Total Articles</h3>
              <div class="d-inline-block">
                <h2 class="text-white"><?php echo $item['total_articles']; ?></h2>
                <p class="text-white mb-0"><?php echo date('Y-m-d'); ?></p>
              </div>
            </div>
          </div>
        </div>
        <!-- Articles -->

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
    
    <!-- List of Subscribers -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
                
              <!-- Heading -->
              <div class="card mb-4 wow fadeIn">
                <h2 style="text-align:center;color:blue;margin-top:7px;"><b>List Of Subscribers</b></h2>
              </div>
              <!-- Heading -->

              <!-- List Articles -->
              <div class="table-responsive">
                <table  id="datatable" class="table table-striped table-bordered zero-configuration">
                  <thead>
                    <tr style="color:blue;">
                      <th>Id</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Status</th>
                      <th>Created</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if(!empty($subscribers)) {
                      $count = 1;
                      foreach($subscribers as $subscriber) {
                        echo "<tr>";
                          echo "<td id='count'>".$count."</td>";
                          echo "<td>".$subscriber['name']."</td>";
                          echo "<td>".$subscriber['email']."</td>";
                          if($subscriber['status'] == 1) {
                            echo "<td style='color:green;'><b>SUBSCIBED</b></td>";
                          } else {
                            echo "<td style='color:blue;'>UN-SUBSCRIBED</td>";
                          }
                          echo "<td>".$subscriber['created_dt']."</td>";
                        echo "</tr>";
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
  
</body>
<!-- End Of Body -->
</html>