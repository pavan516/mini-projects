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
<body>

  <!-- Header -->
  <?php include_once("includes/headers.php"); ?>
  <!-- Header -->

  <!-- Main Body -->
  <main class="mt-5 pt-5">
    <div class="container">

      <!-- Header -->
      <?php include_once("includes/postssearch.php"); ?>
      <!-- Header -->

      <!-- Line -->
      <hr class="my-5">
      <!-- Line -->

      <!-- Posts -->
      <section class="text-center">
        <!--Grid row-->
        <div class="row mb-4 wow fadeIn">

          <!-- List the posts -->
          <?php
          foreach($items as $item) {
            if($item['post_type'] == "YOUTUBE") {
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
                    <!--Title-->
                    <h4 class="card-title"><?php echo $item['title']; ?></h4>
                    <!--Title-->
                    <!-- Description -->
                    <p class="card-text"><?php echo $item['short_description']; ?></p>
                    <!-- Description -->
                  </div>
                  <!-- Title & desc -->

                </div>
              </div>
              <!-- Youtube Post -->
            <?php } else { ?>
              <!-- Document Post -->
              <div class="col-lg-4 col-md-12 mb-4">
                <div class="card">

                  <!-- Image -->
                  <div class="view overlay">
                    <?php
                      if(empty($item['image'])) {?>
                        <img src="<?php echo base_url();?>uploads/posts/images/default.jpg" class="card-img-top" alt="default image">
                      <?php } else {?>
                        <img src="<?php echo $item['image'];?>" class="card-img-top" alt="Image Missing">
                      <?php } ?>
                      <a href="<?php echo base_url();?>posts/<?php echo $item['id'];?>">
                        <div class="mask rgba-white-slight"></div>
                      </a>
                  </div>
                  <!-- Image -->

                  <!-- Title & short description & download link-->
                  <div class="card-body">
                    <!--Title-->
                    <h4 class="card-title"><?php echo $item['title'];?></h4>
                    <!--Title-->
                    <!--Description-->
                    <p class="card-text"><?php echo $item['short_description'];?></p>
                    <!--Description-->
                    <!-- Download link -->
                    <a href="<?php echo $item['filepath'];?>" target="_blank" class="btn btn-primary btn-md">Free download
                      <i class="fas fa-download ml-2"></i>
                    </a>
                    <!-- Download link -->
                  </div>
                  <!-- Title & short description & download link-->
  
                </div>
              </div>
              <!-- Document Post -->
            <?php }
          }?>
          
        </div>
      </section>
      <!-- Posts -->

    </div>
  </main>
  <!-- Main Body -->
    
  <!-- Footer -->
  <?php include_once("includes/footer.php"); ?>
  <!-- Footer -->

</body>
<!-- End of body -->
</html>
