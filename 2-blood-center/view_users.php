<?php
session_start();

if(!isset($_SESSION['admin_name'])){

header("location: admin_login.php");

}
?>

<html>
     <head>
	     <title>To View All The Users</title>
		       <meta name="pavan" content="Blood Bank">
	           <meta charset="UTF-8" />
               <meta name="viewport" content="width=device-width, initial-scale=1.0">
		
	           <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	           <script src="assets/bootstrap/js/bootstrap.js"></script>

               <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
	           <link rel="stylesheet" href="assets/fontawesome/css/font-awesome.css">
	
               <link rel="stylesheet" href="assets/gridloading/css/component.css">
	           <link rel="stylesheet" href="assets/animate.css" >
	           <link rel="stylesheet" href="style.css">

               <!--GOOGLE FONT -->
               <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

               <!--BOOTSTRAP MAIN STYLES -->
               <link href="assets/css/bootstrap.css" rel="stylesheet" />
	
               <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
               <!--[if lt IE 9]>
                     <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                     <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
              <![endif]-->
	 </head>
<body background="aboutus background.jpg">
    
	
<!-- NAV SECTION -->
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <b><strong><a class="navbar-brand" href="#">Blood Center</a></strong></b>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.html">HOME</a></li>
				    <li><a href="admin_login.php">GO BACK</a></li>
                    <li><a href="aboutus.html">ABOUT US</a></li>
                    <li><a href="logout.php">LOGOUT HERE</a></li>
                </ul>
            </div>

        </div>
    </div><br>
     
	

<center>
<h1> Users Information</h1>	<a href="logoutx.php">Logout Here</a><br><br><br><br><br>

</center>
<font size='6' color='red'>
<?php echo @$_GET['deleted']; ?></font>
<table width='1200' align='center' border='10'>

    <tr bgcolor='yellow'>
	     
		 <th>User Name</th>
		 <th>Password</th>
		 <th>Email</th>
		 <th>Contact</th>
		 <th>Country</th>
		 <th>State</th>
		 <th>Address</th>
		 <th>Gender</th>
		 <th>Blood group</th>
		 <th>Age</th>
		 <th>Interested To Donate</th>
		 <th>Delete User</th>
	</tr>	 

    <tr align='center'>
	
<?php
include('connect.php');

   $query = "select * from register";

   $run = mysql_query($query);   
	
while ($row=mysql_fetch_array($run))	
	
	{
	
	  
	  $name = $row[0];
	  $pass = $row[1];
	  $email = $row[2];
	  $contact = $row[3];
	  $country = $row[4];
	  $state = $row[5];
	  $address = $row[6];
	  $gender = $row[7];
	  $blood_group = $row[8];
	  $age = $row[9];
	  $int_to_donate = $row[10];

?>

     
	 <td><?php echo $name; ?></td>
	 <td><?php echo $pass; ?></td>
	 <td><?php echo $email; ?></td>
	 <td><?php echo $contact; ?></td>
	 <td><?php echo $country; ?></td>
	 <td><?php echo $state; ?></td>
	 <td><?php echo $address; ?></td>
	 <td><?php echo $gender; ?></td>
	 <td><?php echo $blood_group; ?></td>
	 <td><?php echo $age; ?></td>
	 <td><?php echo $int_to_donate; ?></td>
	 <td><a href='delete.php?del=<?php echo $id;?>'>Delete</a></td>


    </tr>
	
	
<?php } ?>


</body>
</html>