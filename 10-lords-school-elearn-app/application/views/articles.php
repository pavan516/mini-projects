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

      <!-- Header -->
      <?php include_once("includes/articlessearch.php"); ?>
      <!-- Header -->

      <!-- Line -->
      <hr class="my-5">
      <!-- Line -->

      <!-- Posts -->
      <section class="text-center">
        <!--Grid row-->
        <div class="row mb-4 wow fadeIn">

          <!-- List the articles -->
          <?php
          if(!empty($items)) {
            foreach($items as $item) {?>
              <!-- Article -->
              <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
  
                  <!-- Image -->
                  <div class="view overlay">
                    <?php
                      if(empty($item['image'])) {?>
                        <img src="<?php echo base_url();?>uploads/articles/images/default.jpg" class="card-img-top" alt="default image">
                      <?php } else {?>
                        <img src="<?php echo $item['image'];?>" class="card-img-top" alt="Image Missing">
                      <?php } ?>
                      <a href="<?php echo base_url();?>articles/<?php echo $item['id'];?>">
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
                    <!-- Article link -->
                    <a href="<?php echo base_url();?>articles/<?php echo $item['id'];?>" class="btn btn-primary btn-md">
                      Start Reading More <i class="fas fa-play ml-2"></i>
                    </a>
                    <!-- Article link -->
                  </div>
                  <!-- Title & short description & download link-->
  
                </div>
              </div>
              <!-- Article -->       
            <?php }
          }?>

        </div>
        <!--Grid row-->

        

      </section>
      <!--Section: Cards-->

    </div>
  </main>
  <!--Main layout-->

  
  <!-- Footer -->
  <?php include_once("includes/footer.php"); ?>
  <!-- Footer -->

</body>
<!-- End of body -->
</html>
