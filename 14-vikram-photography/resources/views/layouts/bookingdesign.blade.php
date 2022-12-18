<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title itemprop="name">Vikram Photography</title>
    <meta property="og:image" content="css/logoup.png">
    <meta itemprop="image" content="css/logoup.png">
    <meta name="description" content="Welcome To Vikram-Photography | We Shoot Your Feelings And Beautiful Moments Of Your Life. Vikram Photography Takes The Holistic View Of Your Perspective" />
    <meta name="keywords" content="vikram photography, vikram, photography, gajwel, studio, vikram studio, vikram images, vikram youtube, vikram gallery, vikram album, vikram shop, vikram photography shop" /> 
    <meta name="author" content="Pavan Kumar">

    <!-- Css Links -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet"> 
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link id="css-preset" href="css/presets/preset1.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

    <!-- google location Api -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="images/favicon.ico">
</head>

<body>

    <!--.preloader-->
    <div class="preloader"> <i class="fa fa-circle-o-notch fa-spin"></i></div>
    <!--/.preloader-->

    <!-- Header -->
    <header id="home">

        <!-- Slider -->
        <div id="home-slider" class="carousel slide carousel-fade" data-ride="carousel">
          <div class="carousel-inner">
            
            <div class="item active" style="background-image: url(images/slider/1.jpg)">
              <div class="caption">
                <h1 class="animated fadeInLeftBig">Welcome to <span>Vikram Photograpy</span></h1>
                <p class="animated fadeInRightBig">We Shoot Your Feelings And Beautiful Moments Of Your Life.</p>
                <a data-scroll class="btn btn-start animated fadeInUpBig" href="#services">Start now</a>
              </div>
            </div>
            <div class="item" style="background-image: url(images/slider/2.jpg)">
              <div class="caption">
                <h1 class="animated fadeInLeftBig">Visit Our <span>Vikram Photography</span></h1>
                <p class="animated fadeInRightBig">We Are Dedicated Photographers</p>
                <a data-scroll class="btn btn-start animated fadeInUpBig" href="#services">Start now</a>
              </div>
            </div>
            <div class="item" style="background-image: url(images/slider/3.jpg)">
              <div class="caption">
                <h1 class="animated fadeInLeftBig">We are <span>Creative</span></h1>
                <p class="animated fadeInRightBig">Ready - Camera - Role - Shoot - Smile</p>
                <a data-scroll class="btn btn-start animated fadeInUpBig" href="#services">Start now</a>
              </div>
            </div>
          </div>
          <a class="left-control" href="#home-slider" data-slide="prev"><i class="fa fa-angle-left"></i></a>
          <a class="right-control" href="#home-slider" data-slide="next"><i class="fa fa-angle-right"></i></a>
          <a id="tohash" href="#services"><i class="fa fa-angle-down"></i></a>
        </div>
        <!-- End Of Slider -->

        <!-- Navbar -->
        <div class="main-nav">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.html">
                <h1 style="color:white;font-size:20px;margin-top:10px;"><b>Vikram Photography</b></h1>
              </a>                    
            </div>
            <div class="collapse navbar-collapse">
              <ul class="nav navbar-nav navbar-right">                 
                <li class="scroll active"><a href="/">Home</a></li>
                <li class="scroll"><a href="/">Service</a></li> 
                <li class="scroll"><a href="/">About Us</a></li>                     
                <li class="scroll"><a href="/">Portfolio</a></li>
                <li class="scroll"><a href="/">Team</a></li>                
                <li class="scroll"><a href="/">Offers</a></li>
                <li class="scroll"><a href="/">Contact</a></li>
                <li><a href="/booking">Booking</a></li>
                <li><a href="/image">Images</a></li>
                <li><a href="/youtube">Videos</a></li>
            </div>
          </div>
        </div>
        <!-- End Of Navbar -->

    </header>
    <!-- End Of Header -->

      @yield('content')

    <!-- Footer -->
    <footer id="footer">
      
      <div class="footer-top wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
        <div class="container text-center">
          <div class="footer-logo">
            <a href="/" style="color:white;font-size:40px;">Follow Vikram Photography</a>
          </div>
          <div class="social-icons">
            <ul>
              <li><a class="envelope" href="#"><i class="fa fa-envelope"></i></a></li>
              <li><a class="twitter" href="#"><i class="fa fa-youtube"></i></a></li> 
              <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a class="linkedin" href="#"><i class="fa fa-phone"></i></a></li>
            </ul>
          </div>
        </div>
      </div>

      <div class="footer-bottom">
        <div class="container">
          <div class="row">
            <div class="col-sm-6">
              <p>Copy Rights &copy; Reserved By : <b style="color:black;">Vikram Photography.</b></p>
            </div>
            <div class="col-sm-6">
              <p class="pull-right">Designed by <a href="https://www.facebook.com/profile.php?id=100005175935690" style="color:black"><b>Pavan Kumar</b></a></p>
            </div>
          </div>
        </div>
      </div>

    </footer>
    <!-- End Of Footer -->

    <!-- Jss Files -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="js/jquery.inview.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/mousescroll.js"></script>
    <script type="text/javascript" src="js/smoothscroll.js"></script>
    <script type="text/javascript" src="js/jquery.countTo.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <!-- End Of Js Files -->

</body>
</html>