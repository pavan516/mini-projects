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
      <section class="mt-4">
        <div class="row">

          <!-- Left Part -->
          <div class="col-md-8 md-4">

            <!-- Error Message -->
            <?php if($this->session->flashdata('error')) {
              echo '<div class="col-md-12 alert alert-danger">';
              echo '<strong>'.$this->session->flashdata('error').'</strong>';
              echo '</div><br>';
            }?> 
            <!-- Error Message -->
            <!-- Success Message -->
            <?php if($this->session->flashdata('success')) {
              echo '<div class="col-md-12 alert alert-success">';
              echo '<strong>'.$this->session->flashdata('success').'</strong>';
              echo '</div><br>';
            }?> 
            <!-- Success Message -->
            
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

          </div>
          <!-- Left Part -->

          <!-- Right Part -->
          <div class="col-md-4 md-4">

            <!-- Heading -->
            <div class="card mb-4 wow fadeIn">
              <div class="card-header font-weight-bold" style="background-color:blue;padding-bottom:0px;text-align:center;color:white;">
                <p>Homework Details</p>
              </div>
            </div>
            <!-- Heading -->

            <!-- Download Image -->
            <div class="card mb-3 wow fadeIn">
              <div class="card-header font-weight-bold">Download Image</div>
                <div class="card-body">
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
              </div>
            </div>
            <!-- Download Image -->
            
            <!-- Description -->
            <div class="card mb-3 wow fadeIn">
              <div class="card-header font-weight-bold">Description</div>
                <div class="card-body">
                  <p><?php echo $item['description'] ?? "NO DESCRIPTION";?></p>
              </div>
            </div>
            <!-- Description -->
            
          </div>
          <!-- Right Part -->

          <!-- Home work lists -->
          <div class="col-md-12">

            <!-- Heading -->
            <div class="card mb-4 wow fadeIn">
              <div class="card-header font-weight-bold" style="background-color:blue;padding-bottom:0px;text-align:center;color:white;">
                <p>HOMEWORK SUBMISSIONS</p>
              </div>
            </div>
            <!-- Heading -->

            <?php if(!empty($teacherhomeworks)) {
              foreach($teacherhomeworks as $homework) { ?>
                <!-- Students Homework -->
                <div class="card mb-3 wow fadeIn">
                  <div class="card-header font-weight-bold text-center" style="color:blue;">
                    <?php echo $homework['_class']['class_code']; ?> || 
                    <?php echo $homework['_subject']['subject_code']; ?> || 
                    <?php echo $homework['_section']['section_code']; ?> ||
                    <?php echo "STUDENTS: ".count($homework['_students']); ?>
                  </div>
                    <div class="card-body">
                      
                      <?php $count = 1; 
                      if(!empty($homework['_students'])) { ?>

                        <!-- List of students -->
                        <div class="table-responsive">
                          <table  id="datatable" class="table table-striped table-bordered zero-configuration">
                            <thead>
                              <tr style="color:blue;">
                                <th>Id</th>
                                <th>STUDENT NAME</th>
                                <th>MOBILE NO</th>
                                <th>COMMENTS</th>
                                <th>IMAGES</th>
                                <th>HOMEWORK</th>
                                <th>POST ON</th>
                              </tr>
                            </thead>
                            <?php 
                            foreach($homework['_students'] as $student) { ?>
                              <tbody>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $student['name']; ?></td>
                                <td><?php echo $student['mobile']; ?></td>
                                <?php
                                  if(count($student['_homework']) == 0) { ?>
                                    <td></td>
                                    <td></td>
                                    <td style="color:red;"><b>NOT SUBMITTED</b></td>
                                  <?php } else if(count($student['_homework']) == 1) { ?>
                                    <td><?php echo $student['_homework'][0]['comment'] ?? ""; ?></td>
                                    <td><a href="<?php echo $student['_homework'][0]['image'];?>"><img src='<?php echo $student['_homework'][0]['image']; ?>' width='50' height='50'></a></td>
                                    <td style="color:green;"><b>SUBMITTED</b></td>
                                  <?php } else { ?>
                                    <td><?php echo $student['_homework'][0]['comment']; ?></td>
                                    <td>| 
                                      <?php for($i=0;$i<count($student['_homework']);$i++) {?>
                                        <a href="<?php echo $student['_homework'][$i]['image'];?>" style="color:blue;">VIEW IMAGE <?php echo $i+1 ?></a>  |
                                      <?php } ?>
                                    </td>
                                    <td style="color:green;"><b>SUBMITTED</b></td>
                                  <?php } ?>
                                <td><?php echo $item['homework_on']; ?></td>
                              </tbody>
                            <?php $count++; } ?>
                          </table>
                        </div>
                        <!-- List of students -->
                        
                      <?php } else {?>
                        <div class="card-body text-center">
                          <p>NO STUDENTS FOUND UNDER THIS CLASS & SECTION</p>
                        </div>
                      <?php } ?>

                  </div>
                </div>
                <!-- Students Homework -->
              <?php }
            } else { ?>
              <div class="card mb-3 wow fadeIn">
                <div class="card-header font-weight-bold text-center">NO RECORDS FOUND</div>
              </div>
            <?php } ?>
                        
          </div>
          <!-- Home work lists -->

          <!-- Go back button -->
          <div class="card-body text-center">
            <a href="<?php echo base_url();?>notifications" class="btn btn-primary btn-md">
              <i class="fas fa-arrow-left ml-2"></i> Go Back
            </a>
          </div>
          <!-- Go back button -->
           
        </div>
      </section>
    </div>
  </main>
  <!--Main layout-->

  <!-- Footer -->
  <?php include_once("includes/footer.php"); ?>
  <!-- Footer -->

</body>
<!-- End of body -->
</html>