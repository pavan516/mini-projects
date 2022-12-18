<?php
session_start();
?>

<html>
     <head>
	    <title>
		   Admin Panel
		</title>
    
	     
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
<body background="login background.jpg">
    
	
<!-- NAV SECTION -->
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <b><strong><a class="navbar-brand" href="#">Blood Bank</a></strong></b>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.html">HOME</a></li>
				    <li><a href="register.php">REGISTER YOUR DETAILS</a></li>
					
                   
                  
                </ul>
            </div>

        </div>
    </div><br><br><br><br><br><br><br><br><br><br>


<form method='post' action='admin_login.php'>
       <table width='500' border='10' align='center'>
	   <center><h3 style="color:black;">WELCOME TO ADMIN PANEL</h3></center><br>
	   
	   
	   <tr style="color:black;">
	     <b><strong><td colspan='5' align='center'>Admin Name:</strong></b></td>
		  <td colspan='5' align='center'><input type='text' name='admin_name' /></td>
	   </tr>  
	   
	   
	   <tr style="color:black;">
	       <b><strong><td colspan='5' align='center'>Admin Password:</strong></b></td>
		  <td colspan='5' align='center'><input type='password' name='admin_pass' /></td>
	   </tr>  
	   	   
	   </table><br>
	  
	  <table width='30' border='4' align='center'>
	    <tr>
		<td>
		  <input type='submit' name='admin_login' value='Login' />
		</td>
		</tr>
		</table><br>
		  
    


</form>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>	

<?php
include('connect.php');

if(isset($_POST['admin_login'])){

    
	$admin_name = $_POST['admin_name'];
	$admin_pass = $_POST['admin_pass'];
	
	$query = "select * from admin where admin_name = '$admin_name' AND admin_pass = '$admin_pass'";
	
	$run = mysql_query($query);
	
	if(mysql_num_rows($run)>0)
	{
	
	$_SESSION['admin_name']=$admin_name;
	
	
	echo "<script>window.open('view_users.php','_self')</script>";
	}
	else
	{
	echo "<script>alert('Admin Details Are Incorrect')</script>";
	}
	
}
?>	
	