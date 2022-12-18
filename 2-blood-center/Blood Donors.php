<?php
session_start();

if(!isset($_SESSION['email'])){

header("location: login.php");

}
?>

<html>
     <head>
	     <title>Blood Donors</title>
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
<body background="blood donors background.jpg">
    
	
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
					<li><a href="loginy.php">BLOOD BANK HOSPITALS</a></li>
					<li><a href="de-registration.php">DE-REGISTER YOUR DETAILS</a></li>
				    <li><a href="change password.php">CHANGE PASSWORD</a></li>
					<li><a href="logout.php">LOGOUT HERE</a></li>
                    <li><a href="aboutus.html">ABOUT US</a></li>
                  
                </ul>
            </div>

        </div>
    </div><br><br><br>
<!-- END NAV SECTION -->





<form method="post" action="Blood Donors.php">
<input type="hidden" name="submitted" value="true" />

<center><b><strong><label style="font-size:180%;">WELCOME TO BLOOD DONORS</label></strong></b></center><center><a href="login blood/logout.php">Logout Here</a></center>

<center><b><strong><label style="font-size:140%;">Required Blood Group :<b><strong>

<select name="blood_group">
     
	 <option value="O+">O+</option>
	 <option value="O-">O-</option>
	 <option value="A+">A+</option>
	 <option value="A-">A-</option>
	 <option value="B+">B+</option>
	 <option value="B-">B-</option>
	 <option value="AB+">AB+</option>
	 <option value="AB-">AB-</option>
	
</select></center>
</label><br>

<center><b>
<b>Near By State</b>
			
			   
			   <span><select aria-label="state" name="state" id="state" title="state" class="_5dba">
  
  <option value="State" selected="1">State</option><option value="Andhra Pradesh">Andhra Pradesh</option>
  <option value="Arunachal Pradesh">Arunachal Pradesh</option><option value="Assam">Assam</option>
  <option value="Bihar">Bihar</option><option value="Chhattisgarh">Chhattisgarh</option>
  <option value="Goa">Goa</option><option value="Gujarat">Gujarat</option>
  <option value="Haryana">Haryana</option><option value="Himachal Pradesh">Himachal Pradesh</option>
  <option value="Jammu & Kashmir">Jammu & Kashmir</option><option value="Karnataka">Karnataka</option>
  <option value="Kerala">Kerala</option><option value="Madhya Pradesh">Madhya Pradesh </option>
  <option value="Maharashtra">Maharashtra</option><option value="Manipur">Manipur</option>
  <option value="Meghalaya">Meghalaya</option><option value="Mizoram">Mizoram</option>
  <option value="Nagaland">Nagaland</option><option value="Odisha">Odisha</option>
  <option value="Punjab">Punjab</option><option value="Rajasthan">Rajasthan</option>
  <option value="Sikkim">Sikkim</option><option value="Tamil Nadu">Tamil Nadu</option>
  <option value="Telangana">Telangana</option><option value="Tripura">Tripura</option>
  <option value="Uttarakhand">Uttarakhand</option><option value="Uttar Pradesh">Uttar Pradesh</option>
  <option value="West Bengal">West Bengal</option><option value="Jharkhand">Jharkhand</option>
 
  </select></center><br>
 
 <table width='7' border='3' align='center'>
		    <tr>
                 <td><b><input type='submit' name='submitted' value='Submit' /></b></td>
		    </tr>		 
        </table>
		<br>


</form>


</body></html>
<?php

if(isset($_POST['submitted'])) {

// connect to the database

include('connect.php');

$blood_group = $_POST['blood_group'];

$state = $_POST['state'];

if($state ==''){
			echo "<script>alert('Please Select Your Near By State!')</script>";
			exit();
			}


 $query = mysql_query("SELECT * FROM `register` WHERE blood_group='$blood_group' and state = '$state' ");




echo "<table width='700' border='10' align='center'>";
echo "<tr>
      <th>User Name</th>
	  <th>Contact</th>
	  <th>Address</th>
	  <th>State</th>
	  <th>Gender</th>
	  <th>Blood Group</th>
	  <th>Available</th>
     </tr>";
	 
	 while($row = mysql_fetch_array($query, MYSQL_ASSOC)){
	 
	    
		echo "<tr><td>";
		echo $row['name'];
		
			
		echo "</td><td>";
		echo $row['contact'];
		
		echo "</td><td>";
		echo $row['address'];
		
		echo "</td><td>";
		echo $row['state'];
		
		
		echo "</td><td>";
		echo $row['gender'];
		
		
		echo "</td><td>";
		echo $row['blood_group'];
		
		echo "</td><td>";
		echo $row['int_to_donate'];
		
		echo "</td></tr>";
	 
	 
	 }


echo "</table>";


}


?>
