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
                    
                    <div class="card-header"><b><center>Search A Event</center></b></div>
                    <div class="card-body">
                        <form method="GET" action="result.php" enctype="multipart/form-data">                        

                            <!-- Category Field -->
                            <div class="form-group row">
                                <label for="category_id" class="col-md-4 col-form-label text-md-right">*Select a Category :</label>
                                
                                <!-- Bringing all categories & showing as dropdown -->
                                <select name="category_id">
				                <option value="">Select a Category</option>
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

                            <!-- Location Field -->
                            <div class="form-group row">
                                <label for="location_id" class="col-md-4 col-form-label text-md-right">*Select a Location :</label>
                                
                                <!-- Bringing all Locations & showing as dropdown -->
                                <select name="location_id">
				                <option value="">Select a Location</option>
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

                            <!-- Search Button -->
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" name="search" class="btn btn-primary">Search</button>
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

<?php } ?>