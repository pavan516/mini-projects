<?php
session_start();

if(!isset($_SESSION['fac_email']))
{
	header("location: login.php");
}
else
{	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Online Correction</title>
<link rel="icon" type="image/png" href="css/logoup.png"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.4.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script type="text/javascript" src="js/script.js" /></script>

<style>
img {
    border-radius: 8px;
	max-width:100%;
}
</style>

<style>
@media screen and (max-width: 640px) {
	table {
		overflow-x: auto;
		display: block;
	}
}
</style>
<style>
.button {
    background-color: #e199ed; 
    border: none;
    color: white;
    padding: 20px 36px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 10px 6px;
    cursor: pointer;
	max-width: 100%;
}


.button {border-radius: 12px;}

</style>

<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
	
}

td, th, tr {
    border: 5px solid #dddddd;
    text-align: left;
    padding: 5px;
	
}
</style>

<style>
#red {
	border-radius: 50%;
	width: 30px;
	height: 30px; 
	background: red;	
}
#green {
	border-radius: 50%;
	width: 30px;
	height: 30px; 
	background: green;	
}

</style>
</head>
<body>

<header>
<div class="max-device">
    <div class="container">
		<div class="row">
	  
			<div class="col-md-7">
				<div style="display: inline-block; width: 100%; margin: 2px 0px 5px 0;">
					<div class="col-xs-4">
						<div class="row"> 
							<a href="#" ><b><strong><span style="color:white;">ONLINE CORRECTION</span></a> 
						</div>
					</div>					
				</div>
			</div>
		
			<div class="col-md-5" style="text-align:right;">				
				<div class="noti-icon">					
					<a href="index.php">HOME</a>
					<a href="scrutinising.php">SCRUTINISING</a>
					<a href="uploaded_data.php">MY DATA</a>
					<a href="#">NOTIFICATIONS</a>					
				</div>			   
			</div>
		
		</div>
    </div>	
</div>




<div class="min-device">

    <h3 style="margin: 7px 0px 4px 0px;">
	    <a href="#" ><span style="color:white;">&nbsp&nbspOUR MEDIA</span></a>
		<span class="pull-right"><i class="fa fa-bars" onClick="$('.catebar').slideToggle();"></i></span>
	</h3>
	
    
    <div class="catebar">
        <div class="container">
            <div class="row">
                <ul>
				    <li><a href="index.php">HOME</a></li>
					<li><a href="scrutinising.php">SCRUTINISING</a></li>
					<li><a href="uploaded_data.php">MY DATA</a></li>
					<li><a href="#">NOTIFICATIONS</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

</header>
<?php } ?>