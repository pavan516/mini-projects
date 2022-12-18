<?php
session_start();
?>
<html>
     <head>
	    <title>
		   Login Form
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
<body background="abc.jpg">
    
	
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
				    <li><a href="register.php">REGISTER YOUR DETAILS</a></li>
					<li><a href="forgotten password.php">FORGOTTEN PASSWORD</a></li>
                    <li><a href="aboutus.html">ABOUT US</a></li>
                  
                </ul>
            </div>

        </div>
    </div><br><br><br><br><br><br><br><br><br><br>


<form method='post' action='loginy.php'>
       <table width='350' border='10' align='center'>
	   <center><h3 style="color:black;">LOGIN HERE TO VIEW BLOOD BANK HOSPITALS</h3></center><br>
	   
	   
	   <tr style="color:black;">
	     <b><strong><td colspan='5' align='center'>Email:</strong></b></td>
		  <td colspan='5' align='center'><input type='text' name='email' /></td>
	   </tr>  
	   
	   
	   <tr style="color:black;">
	       <b><strong><td colspan='5' align='center'>Password:</strong></b></td>
		  <td colspan='5' align='center'><input type='password' name='pass' /></td>
	   </tr>  
	   	   
	   </table><br>
	  
	  <table width='30' border='4' align='center'>
	    <tr>
		<td>
		  <input type='submit' name='login' value='Login' />
		</td>
		</tr>
		</table><br>
		  
    
		<center><b><strong><a href="forgotten password.php">Forgotten Password ?</a></strong></b></center>		
		<br><br>
	 
	       
      <center><font color='red' size='3'>Not Registered Yet? : </font><font color='blue'><b><a href='register.php'> Register Here</a></b></font></center>
    


</form><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
         
</body>
</html>	

<?php

include('connect.php');

if(isset($_POST['login'])){

    
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	
	$check_user = "select * from register where email='$email' AND pass='$pass'";

    $run = mysql_query($check_user);
	if(mysql_num_rows($run)>0){
	
	$_SESSION['email']=$email;
	
	
	echo
	"<script>window.open('blood bank/blood bank hospitals.php','_self')</script>";
}

else {
 
    echo
    "<script>alert('UserName or Password is incorrect!')</script>";	
	
}
}

?>