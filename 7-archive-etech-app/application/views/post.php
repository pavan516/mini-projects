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

            <!-- Image -->
            <div class="card mb-4 wow fadeIn">
              <?php
                if(empty($item['image'])) {?>
                  <img src="<?php echo base_url();?>uploads/posts/images/default.jpg" class="img-fluid" alt="default image">
                <?php } else {?>
                  <img src="<?php echo $item['image'];?>" class="img-fluid" alt="Image Missing">
                <?php } ?>
            </div>
            <!-- Image -->

            <!-- Title & Short description -->
            <div class="card mb-4 wow fadeIn">
              <!--Card content-->
              <div class="card-body">
                <p class="h5 my-4 text-center"><?php echo $item['title'];?></p>
                <p><?php echo $item['short_description'];?></p>
                <hr>
                <!-- Download doc -->
                <a class="btn btn-outline-primary text-center" href="<?php echo $item['filepath'];?>" role="button">
                  Free Download<i class="fas fa-download ml-2"></i>
                </a>
              </div>
            </div>
            <!-- Title & Short description -->
           
          </div>
          <!-- Center -->

          <!-- Right -->
          <div class="col-md-4 mb-4">

            <!--Card-->
            <div class="card mb-4 wow fadeIn">
              <div class="card-header">Related Posts</div>

                <!--Card content-->
                <div class="card-body">

                  <!-- Show related posts -->
                  <ul class="list-unstyled">

                    <?php
                    if(!empty($items)) {
                      foreach($items as $data) {
                        if($item['id'] != $data['id']) {?>
                          <li class="media">
                          <?php if(empty($data['image'])) {?>
                            <img class="d-flex mr-3" src="<?php echo base_url();?>uploads/posts/images/default.jpg" alt="Generic placeholder image" style="width:25px;height:25px;">
                          <?php } else {?>
                            <img class="d-flex mr-3" src="<?php echo $data['image'];?>" alt="Generic placeholder image" style="width:50px;height:50px;">
                          <?php } ?>
                          <div class="media-body">
                            <a href="<?php echo base_url();?>posts/<?php echo $data['id'];?>">
                              <p class="mt-0 mb-1 font-weight-bold"><?php echo $data['title'];?></p>
                            </a>
                            <?php echo substr($data['short_description'],0,60)."...";?>
                          </div>
                        </li>
                        <hr/>
                      <?php }
                      }
                    }?>

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