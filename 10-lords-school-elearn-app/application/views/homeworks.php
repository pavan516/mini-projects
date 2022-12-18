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
            <form action="<?php echo base_url();?>homeworks" method="get">
              <!-- Select Date -->
              <div class="form-group">
                <?php if(!empty($items)) {?>
                  <input type="date" class="form-control" name="homework_on" id="homework_on" value="<?php echo $items[0]['homework_on']; ?>">
                <?php } else {?>
                  <input type="date" class="form-control" name="homework_on" id="homework_on">
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

      <!-- Homeworks -->
      <section class="text-center">
        <!--Grid row-->
        <div class="row mb-4 wow fadeIn">

          <!-- List the Homeworks -->
          <?php
          if(!empty($items)) {
            foreach($items as $item) { ?>
                
              <!-- Homeworks Post -->
              <div class="col-lg-4 col-md-12 mb-4">
                <div class="card">

                  <?php if(!empty($item['image'])) { ?>
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
                  <?php } ?>

                  <!-- Title & desc -->
                  <div class="card-body">
                    <!--Title-->
                    <h4 class="card-title"><?php echo $item['title']; ?></h4>
                    <!--Title-->
                    <!-- Description -->
                    <p class="card-text"><?php echo substr($item['description'],0,60)."..."; ?></p>
                    <!-- Description -->
                    <!-- Read more link -->
                    <a href="<?php echo base_url();?>homework/<?php echo $item['uuid']; ?>" class="btn btn-primary btn-md">
                      Start Reading More <i class="fas fa-play ml-2"></i>
                    </a>
                    <!-- Article link -->
                  </div>
                  <!-- Title & desc -->

                </div>
              </div>
              <!-- Homeworks Post -->

            <?php }
          } else {?>
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">NO HOME-WORKS UPLOADED</h4>
                </div>
              </div>
            </div>
          <?php } ?>
          <!-- List the Homeworks -->
            
        </div>
      </section>
      <!-- Homeworks -->

    </div>
  </main>
  <!-- Main Body -->
    
  <!-- Footer -->
  <?php include_once("includes/footer.php"); ?>
  <!-- Footer -->

</body>
<!-- End of body -->
</html>
