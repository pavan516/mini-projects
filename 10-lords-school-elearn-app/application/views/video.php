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
          <div class="col-md-12">

            <!-- Heading -->
            <div class="card mb-4 wow fadeIn">
              <div class="card-header font-weight-bold" style="background-color:blue;padding-bottom:0px;text-align:center;color:white;">
                <p><?php echo $item['title']; ?></p>
              </div>
            </div>
            <!-- Heading -->

            <!-- Youtube Video -->
            <div class="card mb-4 wow fadeIn">
              <?php $youtubeUrl = explode("=",$item['youtube_url']); $url = $youtubeUrl[1]; ?>
              <!-- Youtube -->
              <div class="view overlay">
                <div class="embed-responsive embed-responsive-16by9 rounded-top">
                  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $url; ?>" allowfullscreen></iframe>
                </div>
              </div>
              <!-- Youtube -->
            </div>
            <!-- Youtube Video -->

            <!-- description -->
            <div class="card mb-4 wow fadeIn">
              <div class="card-header font-weight-bold" style="background-color:blue;padding-bottom:0px;text-align:center;color:white;">
                <p>Details About The Video</p>
              </div>
              <!-- Heading -->
              <!--Card content-->
              <div class="card-body">
                <p class="h5 my-4 text-center"><?php echo $item['description'] ?? "NO DESCRIPTION";?></p>
              </div>
            </div>
            <!-- description -->
           
          </div>
          <!-- Center -->

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