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

<title>Online Correction</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.4.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script type="text/javascript" src="js/script.js" /></script>
<script type="text/javascript" src="js/jquery-3.2.1.min.js" ></script>
<script type="text/javascript" src="js/jquery.min.js" ></script>
<script type="text/javascript" src="js/jquery-1.12.0.min.js" ></script>
<script type="text/javascript" src="js/jquery-2.1.4.js" ></script>


<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
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
								<a href="#" ><b><strong><span style="color:white;font-size:150%;">Online Correction</span></strong></b></a> 
							</div>
						</div>                
					</div>
				</div>
		
				<div class="col-md-5" style="text-align:right;">
					<div class="noti-icon">
						<a href="index.php">HOME</a>
						<a href="uploaded_data.php">UPLOADED DATA</a>
						<a href="logout.php">LOGOUT</a>
					</div>
                </div>
            </div>
        </div>
	</div>
</div>
</header>
<?php } ?>