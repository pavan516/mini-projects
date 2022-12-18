<html>
     <head>
	     <title>Forgotten Password</title>
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
			  
			  <style>


        table {
           font-family: arial, sans-serif;
           border-collapse: collapse;
           width: 60%;
              }

        td, th {
          border: 5px solid #dddddd;
          text-align: left;
          padding: 10px;
               }	
			   
			   </style>
			  
	 </head>
<body background="forgotten password background.png">
    
	
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
					<li><a href="login.php">BLOOD DONORS</a></li>
			        <li><a href="aboutus.html">ABOUT US</a></li>
                  
                </ul>
            </div>

        </div>
    </div><br><br><br>
<!-- END NAV SECTION -->


<form method="post" action="forgotten password.php">
<input type="hidden" name="submit" value="true" />


<center><h3 style="color:white;"> Welcome To Forgotten Password Page To Know Your Email/Password</h3></center><br><br><br><br><br><br><br>

<center><b><strong><label  style="color:white;">Please Enter Your Email :</b></strong>

<input type = "text" name = "email"></label></center><br><br>



<center>
<input type="Submit"/></center><br>

<center><label  style="color:white;">NOW GO TO <a href="login.php">LOGIN PAGE</a> and View The Blood Donors.</label></center><br><br>


</form>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>

<?php


if(isset($_POST['submit'])){

$email= $_POST['email'];

    if($email ==''){
			echo "<script>alert('Please Enter Your Email!')</script>";
			exit();
			}	


include('connect.php');

$query = mysql_query("SELECT * FROM register WHERE email='$email'");

while($row = mysql_fetch_assoc($query))
{
$name = $row['name'];
$email = $row['email'];
$pass = $row['pass'];
}

$check_user = "select * from register where email='$email'";

    $run = mysql_query($check_user);
	if(mysql_num_rows($run)>0){
	
	$_SESSION['email']=$email;
if($email==$email)
{
         $from = "From: minibloodcenter@gmail.com";
		 $to = $email;
		 $subject = "Login Information";
         
		 $body = "Your username is ".$name." and your Password is ".$pass."";
       
        mail($to, $subject, $body, $from);
        echo "<script>alert('Your Password Is Sended To ".$email."')</script>";
		
}
}
else
{
echo "<script>alert('Incorrect Email')</script>";
}
}
else{
echo "<script>alert('please fill your email')</script>";
}

?>



