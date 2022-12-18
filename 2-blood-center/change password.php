


<html>
     <head>
	       
	     <title>Change Password</title>
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
<body background="change assword background.jpg">
    
	
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
					<li><a href="login.php">BLOOD DONORS</a></li>
					<li><a href="loginy.php">BLOOD BANK HOSPITALS</a></li>
				    <li><a href="logout.php">LOGOUT HERE</a></li>					
                    <li><a href="aboutus.html">ABOUT US</a></li>
                  
                </ul>
            </div>

        </div>
    </div><br><br><br><br><br><br><br><br><br><br>


    
   <form method="POST" action="change password.php">
    <table width='600' border='10' align='center'>
	   <center><h1 style="color:black;">Change Password</h1></center>
	      
	   <tr style="color:black;">
	      <td colspan='5' align='center'>Enter your Email</td>
		  <td colspan='5' align='center'><input type='text' name='email' /></td>
	   </tr>

       <tr style="color:black;"><b>
          <td colspan='5' align='center'>Enter your old password:</td>
          <td colspan='5' align='center'><input type="text" name="pass"></td></b>
        </tr>	   
    	   
	   	   
	    <tr style="color:black;"><b>
          <td colspan='5' align='center'>Enter your new password:</td>
          <td colspan='5' align='center'><input type="text" name="newpass"></td></b>
        </tr>
		
		
		
   	    	   	   
	   </table><br>
	   <table width='7' border='3' align='center'>
		    <tr style="color:black;">
                 <td><b><input type='submit' name='updatepassword' value='Update Password' /></b></td>
		    </tr>		 
        </table>
		<br>
    
  <center><b><strong><label style="color:black;">RE-LOGIN HERE :<a href="login.php">LOGIN</a></label></center></b></strong> 
   


</form>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>  

<?php
include('connect.php');
if(isset($_POST['updatepassword']))
{

        $email = $_POST['email'];
		$pass = $_POST['pass'];
        $newpass = $_POST['newpass'];
        
		
         $result = mysql_query("SELECT pass FROM register WHERE email='$email'");
        if(!$result)
        {
          echo "<script>alert('The Email you entered does not exist!')</script>";
        }
        else if($pass!= mysql_result($result, 0))
        {
          echo "<script>alert('You entered an incorrect password!')</script>";
        }
        else if($newpass==$newpass)
		{
           $sql=mysql_query("UPDATE register SET pass='$newpass' where email='$email'");
           if($sql)
           {
           echo "<script>alert('Congratulations You have successfully changed your password')</script>";
           }
           else
           {
           echo "<script>alert('Not Changed SucessFullY')</script>";
     	   }
		  
	   }
	   
	   $from = "From: minibloodcenter@gmail.com";
		    $to = $email;
		    $subject = "Login Information";
         
		   $body = " Your Username Is ".$email." and Your Changed Password Is ".$newpass." Now You Can Login Here www.bloodcenter.in/login.php";
       
        mail($to, $subject, $body, $from);
}
?>







