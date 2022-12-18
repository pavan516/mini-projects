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
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Event Management</title>

    <!-- Scripts -->
    <script src="assets/js/app.js"></script>

    <!-- Icon -->
    <link rel="icon" href="assets/images/logo.png">
    <link rel="shortcut icon" href="assets/images/logo.png" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="assets/css/app.css" rel="stylesheet">
</head>

<!-- Body -->
<body>
    
    <!-- Navbar -->
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <b>EVENT MANAGEMENT</b>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto"></ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php"><b>Home</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="eventsearch.php"><b>Event Search</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="postevent.php"><b>Post An Event</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="myevents.php"><b>My Events</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php"><b>Logout</b></a>
                        </li>
                    </ul>
                    <!-- End Of Right Side Of Navbar -->
                </div>
            </div>
        </nav>        
    </div><br><br><br><br>
    <!-- End of Navbar -->

    <!-- Main Content -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    
                    <div class="card-header"><b><center>Create A Event</center></b></div>
                    <div class="card-body">
                        <form method="POST" action="#" enctype="multipart/form-data">                        

                            <!-- Name Text Field -->
                            <div class="form-group row">
                                <label for="title" class="col-sm-4 col-form-label text-md-right">Event Title : </label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="title" placeholder="Event Title" required autofocus>
                                </div>
                            </div>

                            <!-- Description Field -->
                            <div class="form-group row">
                                <label for="description" class="col-sm-4 col-form-label text-md-right">*Event Description : </label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="description" placeholder="Describe about your event in brief" required autofocus></textarea>
                                </div>
                            </div>

                            <!-- Image Field -->
                            <div class="form-group row">
                                <label for="image" class="col-sm-4 col-form-label text-md-right">*Event Poster : </label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control" name="image" accept="image/x-png,image/gif,image/jpeg" required autofocus>
                                </div>
                            </div>

                            <!-- Category Field -->
                            <div class="form-group row">
                                <label for="category_id" class="col-md-4 col-form-label text-md-right">*Select a Category :</label>
                                
                                <!-- Bringing all categories & showing as dropdown -->
                                <select name="category_id">
				                <option value="no category">Select a Category</option>
                                <?php
                                include("includes/connect.php");
                                $query = mysqli_query($mysqli,"select * from category");
                                while ($rows = mysqli_fetch_array($query))
                                {									 
                                    $id=$rows['id'];
                                    $name=$rows['name'];
                                                                                                    
                                    echo "<option value='$id'>$name</option>";
                                } 
                                ?>
                                </select>
                            </div>

                            <!-- Event Url Text Field -->
                            <div class="form-group row">
                                <label for="event_url" class="col-md-4 col-form-label text-md-right">Event URL :</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="event_url" placeholder="Event URL" >
                                </div>
                            </div>

                            <!-- Location Field -->
                            <div class="form-group row">
                                <label for="location_id" class="col-md-4 col-form-label text-md-right">*Select a Location :</label>
                                
                                <!-- Bringing all Locations & showing as dropdown -->
                                <select name="location_id">
				                <option value="no category">Select a Location</option>
                                <?php
                                include("includes/connect.php");
                                $query = mysqli_query($mysqli,"select * from locations");
                                while ($rows = mysqli_fetch_array($query))
                                {									 
                                    $id=$rows['id'];
                                    $name=$rows['name'];
                                                                                                    
                                    echo "<option value='$id'>$name</option>";
                                } 
                                ?>
                                </select>
                            </div>

                            <!-- Venue Field -->
                            <div class="form-group row">
                                <label for="venue" class="col-sm-4 col-form-label text-md-right">*Venue : </label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="venue" placeholder="Venue Details" required autofocus></textarea>
                                </div>
                            </div>

                            <!-- Start Text Field -->
                            <div class="form-group row">
                                <label for="start_dt" class="col-sm-4 col-form-label text-md-right">*Event Starting Time : </label>
                                <div class="col-md-6">
                                    <input type="datetime-local" class="form-control" name="start_dt" placeholder="Event Starting Time" required autofocus>
                                </div>
                            </div>

                            <!-- End Text Field -->
                            <div class="form-group row">
                                <label for="end_dt" class="col-sm-4 col-form-label text-md-right">*Event Ending Time : </label>
                                <div class="col-md-6">
                                    <input type="datetime-local" class="form-control" name="end_dt" placeholder="Event Ending Time" required autofocus>
                                </div>
                            </div>

                            <!-- Price Text Field -->
                            <div class="form-group row">
                                <label for="ticket_price" class="col-sm-4 col-form-label text-md-right">*Price Per Ticket : </label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="ticket_price" placeholder="Price Per Ticket" required autofocus>
                                </div>
                            </div>

                            <!-- Post Button -->
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" name="post" class="btn btn-primary">Create A Event</button>
                                </div>
                            </div>

                        </form>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
    <!-- End of main content -->

</body>
</html>
<!-- End Of Body -->

<!-- Registration php code -->
<?php
// Connecting to database
include("includes/connect.php");

// If a person click Create A Event button this code will get into action.
if(isset($_POST['post']))
{
    // storing input fields into variables
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $category_id = $_POST['category_id'];
    $event_url = $_POST['event_url'];
    $location_id = $_POST['location_id'];
    $venue = $_POST['venue'];
    $start_dt = $_POST['start_dt'];
    $end_dt = $_POST['end_dt'];
    $ticket_price = $_POST['ticket_price'];

    // Getting current user id from current table
    $user = $_SESSION['email'];
    $get_user = mysqli_query($mysqli,"select * from users where email='$user'");
    $row = mysqli_fetch_array($get_user);									
	$user_id = $row['id'];
    
    // Moving input image to folder
    move_uploaded_file($image_tmp, "post_images/$image");

    // insert query
    $insert_users = "insert into posts (title,description,image,category_id,event_url,location_id,venue,start_dt,end_dt,ticket_price,user_id)
    values ('$title','$description','$image','$category_id','$event_url','$location_id','$venue','$start_dt','$end_dt','$ticket_price','$user_id')";
    
    // checking for success call
    $run = mysqli_query($mysqli,$insert_users);
    if($run)
    {
        echo "<script>alert('Successfully Created An Event!')</script>";
        echo "<script>window.open('myevents.php','_self')</script>";
        exit();
    }    
    else 
    {
        echo "<script>alert('something went wrong!')</script>";
        echo "<script>window.open('postevent.php','_self')</script>";
        exit();
    }
    
}
?>
<!-- End of Post php code -->

<?php } ?>