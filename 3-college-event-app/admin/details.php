<!-- verifying the user session for secure login -->
<?php
session_start();
if(!isset($_SESSION['email']))
{
	echo "<script>window.open('login.php','_self')</script>";
}
else
{
?>
<!DOCTYPE html>
<html lang="en">

  <!-- including head which contains css & js links (instead of writing whole code again) -->
  <?php include("includes/head.php"); ?>

<body>

    <!-- including header which contains navbar links(instead of writing whole code again) -->
    <?php include("includes/header.php"); ?>

    <section class="content">
      <div class="container">
          <div class="row">
              <div class="grid_7">
                  
                  <div class="blog">

                      <?php
                      include("includes/connect.php");
                      // getting particular id
                      if(isset($_GET['id']))
                      {
                        $post_id = $_GET['id'];
              
                          $query = mysqli_query($mysqli,"select * from posts where id='$post_id'");
                          $rows=mysqli_fetch_array($query);
                          
                          $id = $rows['id'];
                          $title = $rows['title'];
                          $description = $rows['description'];
                          $image = $rows['image'];
                          $category_id = $rows['category_id'];
                          $event_url = $rows['event_url'];
                          $location_id = $rows['location_id'];
                          
                          // getting location name based on id
                          $loc = mysqli_query($mysqli,"select * from locations where id='$location_id'");
                          $locrows=mysqli_fetch_array($loc);
                          $location = $locrows['name'];

                          $venue = $rows['venue'];
                          $start_dt = $rows['start_dt'];
                          $end_dt = $rows['end_dt'];
                          $ticket_price = $rows['ticket_price'];
                          $user_id = $rows['user_id'];
                          
                          // getting user name based on user id
                          $user = mysqli_query($mysqli,"select * from users where id='$user_id'");
                          $userrows=mysqli_fetch_array($user);
                          $username = $userrows['name'];?>
                  
                          <div class="blog_title">
                              <a href="details.php?id=<?php echo $id; ?>"><?php echo $title; ?></a>
                          </div>
                            <img src="post_images/<?php echo $image; ?>" alt="">
                            <p  style="color:white;"><?php echo $description; ?></p>
                            <p  style="color:white;">Event Conducted by : <?php echo "<b style='color:white;'>$username</b>";?></p>
                            <p  style="color:white;">Event Start At : <?php echo "<b style='color:blue;'>$start_dt</b>"; ?></p>
                            <p  style="color:white;">Event End At : <?php echo "<b style='color:blue;'>$end_dt</b>"; ?></p>
                            <p  style="color:white;">Location : <?php echo $location; ?></p>
                            <p  style="color:white;"><?php if(!($event_url)==''){ ?>Event Website URL : <a style="color:red;" href="<?php echo $event_url; ?>"> Click Here </a><?php } ?></p>
                            <p  style="color:white;">Ticket Price : <?php echo $ticket_price."Rs"; ?></p>
                          </div>                          
                      <?php } ?>

                  </div>

                  <div class="grid_4 preffix_1">
                    <h2>Recent Posts</h2>
                      
                       <?php 
                        $query = mysqli_query($mysqli,"select * from posts order by 1 DESC LIMIT 0,3");
                        while($rows=mysqli_fetch_array($query))
                        {
                          $id = $rows['id'];
                          $title = $rows['title'];
                          $description = substr($rows['description'], 0, 100);
                          $image = $rows['image'];
                          $category_id = $rows['category_id'];
                          $event_url = $rows['event_url'];
                          $location_id = $rows['location_id'];
                          $venue = $rows['venue'];
                          $start_dt = $rows['start_dt'];
                          $end_dt = $rows['end_dt'];
                          $ticket_price = $rows['ticket_price'];?>

                          <div class="block3">
                            <img src="post_images/<?php echo $image; ?>" height="100" width="200">
                            <div class="extra_wrapper">
                              <div class="text1 color1">
                              <a href="details.php?id=<?php echo $id; ?>"><?php echo $title; ?></a>
                                <time datetime="2014-01-01"><?php echo $start_dt; ?></time>                                
                              </div>
                              <?php echo $description; ?>
                            </div>
                          </div> 
                        <?php } ?>
        
              </div>
          </div>
                </div>
                
            </div>
        </div>
    </section>

  <!-- including header which contains navbar links(instead of writing whole code again) -->
  <?php include("includes/footer.php"); ?>

</body>
</html>
<?php } ?>