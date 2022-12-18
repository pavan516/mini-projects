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

    <!-- Main Body -->
    <section class="content gallery pad1"><div class="ic">More Website Templates @ TemplateMonster.com - July 30, 2014!</div>
        <div class="container">
            <div class="row">
                
				<?php
				include("includes/connect.php");
				// Getting current user id from current table
				$user = $_SESSION['email'];
				$get_user = mysqli_query($mysqli,"select * from users where email='$user' ORDER BY id ASC");
				$row = mysqli_fetch_array($get_user);									
				$user_id = $row['id'];
				
				$query = mysqli_query($mysqli,"select * from posts where user_id = '$user_id' AND status='1' ");
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
					
					<div class="grid_4">
						<div class="gall_block">
							<div class="maxheight">
								<a href="post_images/<?php echo $image; ?>" class="gall_item">
									<img src="post_images/<?php echo $image; ?>" alt="<?php echo $title; ?>">
								</a>
								<div class="gall_bot">
									<div class="text1">
										<a href="details.php?id=<?php echo $id; ?>" style="color:white;"><b><?php echo $title; ?></b></a>
									</div>
									<p style="color:white;"><?php echo $description; ?></p>                                
									<br>
									<a href="details.php?id=<?php echo $id; ?>" class="btn" style="color:white">more</a>
									<a href="edit.php?id=<?php echo $id; ?>" class="btn" style="color:white">Edit</a>
									<a href="delete.php?id=<?php echo $id; ?>" class="btn" style="color:white">Delete</a>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>                
      
            </div>
        </div>
    </section>
    <!-- End Of Main Body -->

    <!-- including header which contains navbar links(instead of writing whole code again) -->
    <?php include("includes/footer.php"); ?>

</body>
</html>

<?php } ?>