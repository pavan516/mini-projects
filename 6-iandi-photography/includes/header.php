<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>I and I | Photgraphy</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<body>
    <header class="navbar navbar-inverse navbar-fixed-top wet-asphalt" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" style="font-family:courier;" href="index.php">I AND I</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php">HOME</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">IMAGES <i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">
						    <?php
						    include("connect.php");
												
						    $get_cats = "select * from postscatg";
						    $run_cats = mysql_query($get_cats);
						
						    while ($cats_row=mysql_fetch_array($run_cats))
						    {
							    $cat_id = $cats_row['cat_id'];
							    $cat_title = $cats_row['cat_title'];
							
							    echo "<li><a href='postscatg.php?cat=$cat_id'>$cat_title</a></li>";	
						    }
							
					        ?>
                            
                        </ul>
                    </li>
                    <li><a href="#">ABOUT US</a></li> 
                    <li><a href="contactus.php">CONTACT US</a></li>
					<li><a href="http://iandiphotography.in/admin/login.php">ADMIN</a></li>
                </ul>
            </div>
        </div>
    </header><!--/header-->