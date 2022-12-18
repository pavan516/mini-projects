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
           
            <!-- Go back button -->
            <div class="card-body text-center">
              <a href="<?php echo base_url();?>notifications" class="btn btn-primary btn-md">
                <i class="fas fa-arrow-left ml-2"></i> Go Back
              </a>
            </div>
            <!-- Go back button -->
            
           
          </div>
          <!-- Center -->

          <!-- Right -->
          <div class="col-md-4 mb-4">

            <!--Card-->
            <div class="card mb-4 wow fadeIn">
              <div class="card-header">Place Ads In Futue</div>

                <!--Card content-->
                <div class="card-body">

                  <!-- Show related posts -->
                  <ul class="list-unstyled">

                  </ul>
                  <!-- Show related posts -->

                </div>
                <!--Card content-->

              </div>
            </div>
            <!--Card-->

          </div>
          <!-- Right -->

        </div>
        <!--Grid row-->

      </section>
      <!--Section: Post-->

    </div>
  </main>
  <!--Main layout-->

  <!-- Footer -->
  <?php include_once("includes/footer.php"); ?>
  <!-- Footer -->

</body>
<!-- End of body -->
</html>