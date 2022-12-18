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
<body>

  <!-- Header -->
  <?php include_once("includes/headers.php"); ?>
  <!-- Header -->

  <!-- Main Body -->
  <main class="mt-5 pt-5">
    <div class="container">

      <!-- Search -->
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body" style="padding-bottom:0px;">
            <!-- Form -->
            <form action="<?php echo base_url();?>videos" method="get">
              <!-- Select Date -->
              <div class="form-group">
                <?php if(!empty($items)) {?>
                  <input type="date" class="form-control" name="post_on" id="post_on" value="<?php echo $items[0]['post_on']; ?>">
                <?php } else {?>
                  <input type="date" class="form-control" name="post_on" id="post_on">
                <?php } ?>
              </div>
              <!-- Select Date -->
              <!-- Search -->
              <div class="form-group" style="text-align:center;">
                <input type="submit" class="btn btn-primary" value="Search">
              </div>
              <!-- Search -->
            </form>
            <!-- Form -->    
          </div>
        </div>
      </div>
      <!-- Search -->

      <!-- Line -->
      <hr class="my-5">
      <!-- Line -->

      <!-- Videos -->
      <section class="text-center">
        <!--Grid row-->
        <div class="row mb-4 wow fadeIn">

          <!-- List the Videos -->
          <?php
          if(!empty($items)) {
            foreach($items as $item) {
              $youtubeUrl = explode("=",$item['youtube_url']);
              if(empty($youtubeUrl)) continue;
              $url = $youtubeUrl[1];?>
                
              <!-- Youtube Post -->
              <div class="col-lg-4 col-md-12 mb-4">
                <div class="card">

                  <!-- Youtube -->
                  <div class="view overlay">
                    <div class="embed-responsive embed-responsive-16by9 rounded-top">
                      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $url; ?>" allowfullscreen></iframe>
                    </div>
                  </div>
                  <!-- Youtube -->

                  <!-- Title & desc -->
                  <div class="card-body">
                    <a href="<?php echo base_url();?>video/<?php echo $item['uuid']; ?>">
                      <!--Title-->
                      <h4 class="card-title"><?php echo $item['title']; ?></h4>
                      <!--Title-->
                      <!-- Description -->
                      <p class="card-text"><?php echo substr($item['description'],0,60)."..."; ?></p>
                      <!-- Description -->
                    </a>
                  </div>
                  <!-- Title & desc -->

                </div>
              </div>
              <!-- Youtube Post -->

            <?php }
          } else {?>
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">NO VIDEOS UPLOADED</h4>
                </div>
              </div>
            </div>
          <?php } ?>
          <!-- List the Videos -->
            
        </div>
      </section>
      <!-- Videos -->

    </div>
  </main>
  <!-- Main Body -->
    
  <!-- Footer -->
  <?php include_once("includes/footer.php"); ?>
  <!-- Footer -->

</body>
<!-- End of body -->
</html>
