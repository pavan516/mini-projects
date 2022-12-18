<html>
     <head>
	     <title>De-Registration Form</title>
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
<body background="deregistration background.jpg">
    
	
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
                    <li><a href="aboutus.html">ABOUT US</a></li>
                  
                </ul>
            </div>

        </div>
    </div><br><br><br><br><br><br><br><br><br><br>
	
<form method="post" action="de-registration.php">
       <input type="hidden" name="submitted" value="true" />

<center> <h2 style="color:blue;">Delete Your Registered Details Here</h2></center><br>
		
		
		 <table width='450' border='10' align='center'>
		 
		 <tr style="color:black;">
               <td><b>Enter Your Email :</b></td>
               <td>
			   <input type = "text" name = "email">
			   </td>
        </tr>
		
		 
		<tr style="color:black;">
               <td><b>Enter Your Password :</b></td>
               <td>
			   <input type = "text" name = "pass">
			   </td>
        </tr>
		
          </table><br>
		  
		  
		   <table width='7' border='3' align='center'>
		    <tr>
                 <td><b><input type = "submit" name = "delete" value = "Delete"></b></td>
		    </tr>		 
        </table><br>
		    	 
        


</form>

<?php
         if(isset($_POST['delete'])) {
          include('connect.php');
            $conn = mysql_connect($mysql_host, $mysql_user, $mysql_password);
            
            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }
				
            $email = $_POST['email'];
			$pass = $_POST['pass'];
			
						
			if($email ==''){
			echo "<script>alert('Please Enter Your Email!')</script>";
			exit();
			}
			
			
			
			if($pass ==''){
			echo "<script>alert('Please Enter Your Password!')</script>";
			exit();
			}
            
            $sql = "DELETE FROM `register` WHERE email = '$email' and pass ='$pass' " ;
            mysql_select_db('bloodcen_blood');
            $retval = mysql_query( $sql, $conn );
            
            if(! $retval ) {
              die('Could not delete data: ' . mysql_error());
            }
            
            echo "<script>alert('Deleted data successfully')</script>\n";
            
            mysql_close($conn);
         }
            ?>
           
            
       <?php
           
           
               