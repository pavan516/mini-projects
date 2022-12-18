<?php
session_start();

if(!isset($_SESSION['email'])){

header("location: edisightlogin/login.php");

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Edisight</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script src="assets/js/chart-master/Chart.js"></script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.php" class="logo"><b>EDISIGHT</b></a>
            <!--logo end-->
            
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php">Logout</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->
      
	  
	  
	  
	  
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="profile.html"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered">pavan kumar</h5>
              	  	
                  <li class="mt">
                      <a class="active" href="index.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Home</span>
                      </a>
                  </li>

                  
				  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Alligations & Mixtures</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="sample.php">Topic Wise Exercise</a></li>
                          <li><a  href="alligation_and_mixture/alligation test.php">Topic Wise Test</a></li>
                      </ul>
                  </li>
				  
				  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Averages</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="quiz.php">Topic Wise Exercise</a></li>
                          <li><a  href="general.html">Topic Wise Test</a></li>
                      </ul>
                  </li>
				  
				  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Partnership</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="quiz.php">Topic Wise Exercise</a></li>
                          <li><a  href="general.html">Topic Wise Test</a></li>
                      </ul>
                  </li>
				  
				  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Ratios & Proportions</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="quiz.php">Topic Wise Exercise</a></li>
                          <li><a  href="general.html">Topic Wise Test</a></li>
                      </ul>
                  </li>
				  
				   <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Time & Distance</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="quiz.php">Topic Wise Exercise</a></li>
                          <li><a  href="general.html">Topic Wise Test</a></li>
                      </ul>
                  </li>
				  
				   <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Time & Work</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="quiz.php">Topic Wise Exercise</a></li>
                          <li><a  href="general.html">Topic Wise Test</a></li>
                      </ul>
                  </li>
				  

                  <li class="sub-menu">
                      <a href="scorecard.php" >
                          <i class="fa fa-book"></i>
                          <span>Score Card</span>
                      </a>
                  </li>
				  
				  
				  <li class="sub-menu">
                      <a href="aboutus.php" >
                          <i class="fa fa-dashboard"></i>
                          <span>About Us</span>
                      </a>
                  </li>
				  
                  

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9 main-chart">
                  
                  	<center><h1 style="color:black;">WELCOME TO ALLIGATION & MIXTURE</h1></center>	<br>
					<center><h2 style="color:black;">UNIT WISE TEST</h2></center>
					
					<?php     
                           // Read answerkey.txt file for the answers to each of the questions.

                        function readAnswerKey($filename) 
						{

                           $answerKey = array();   // If the answer key exists and is readable, read it into an array.   

                           if (file_exists($filename) && is_readable($filename)) 
						   {

                              $answerKey = file($filename);

                           }

                           return $answerKey;
                        }


                        function readQuestions($filename) // Read the questions file and return an array of arrays (questions and choices) and Each element of $displayQuestions is an array where first element is the question and and second element is the choices.
						{
    
	                       $displayQuestions = array();
  
                           if (file_exists($filename) && is_readable($filename)) 
						   {

                              $questions = file($filename);

                              foreach ($questions as $key => $value) // Loop through each line and explode it into question and choices
							  {
         
		                         $displayQuestions[] = explode(":",$value);
        
		                      }               

                            }

                            else 
							{
								echo "Error finding or reading questions file."; 
							}

                             return $displayQuestions;

                        }

 
                        function displayTheQuestions($questions) // Take our array of exploded questions and choices, show the question and loop through the choices. 
						{

                           if (count($questions) > 0) 
						   {

                              foreach ($questions as $key => $value) 
							  {  ?>
							   
							          <table class="table table-bordered">
			                             <thead>
			                                <tr class="danger">
									           <th> <?php echo "<b>$value[0]</b><br/><br/>"; ?> </th>
									        </tr>
									     </thead>
								      </table> <?php

                                $choices = explode(",",$value[1]);  // Break the choices appart into a choice array

                                foreach($choices as $value) // For each choice, create a radio button as part of that questions radio button group and Each radio will be the same group name (in this case the question number) and have a value that is the first letter of the choice.
                                {
 
                                   $letter = substr(trim($value),0,1); ?>
								   <?php if(isset($value))
								   { ?>
								   
								   <table class="table table-bordered">
								       <thead>
									      <tr>
										     <td> <?php echo "<input type=\"radio\" name=\"$key\" value=\"$letter\">$value<br/>"; ?> </td>
										  </tr> <?php } ?>
								   
								         <tr>
				                            <td><input type="radio" checked="checked" style="display:none" value="no_attempt" name="<?php echo $value; ?>" /></td>
			                            </tr></thead>
								   </table>
								   <?php

                                }

                                echo "<br/>";

						     }

                            }

                            else { echo "No questions to display."; }

                        }

 
                        function translateToGrade($percentage) 
						{

                           if ($percentage >= 90.0) { return "A"; }

                           else if ($percentage >= 80.0) { return "B"; }

                           else if ($percentage >= 70.0) { return "C"; }

                           else if ($percentage >= 60.0) { return "D"; }

                           else { return "F"; }

                        }

 

?>
 
<form method="POST" action="average_results.php">

 

<?php

    // Load the questions from the questions file

    $loadedQuestions = readQuestions("questions.txt");

     

    // Display the questions

    displayTheQuestions($loadedQuestions);

?>

 

<center><input type="submit" name="submitquiz" value="Submit Quiz"/></center>

 

                      <div class="row mt">
                      
						
					</div><!-- /row -->
					
					<div class="row mt">
                     
					</div><!-- /row -->	
					
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
                  
                  <div class="col-lg-3 ds">
                    <!--COMPLETED ACTIONS DONUTS CHART-->
						
						<h3>TEAM MEMBERS</h3>
                      <!-- First Member -->
                      <div class="desc">
                      	<div class="thumb">
                      		<img class="img-circle" src="assets/img/prudhvi.jpg" width="35px" height="35px" align="">
                      	</div>
                      	<div class="details">
                      		<p><strong><a href="https://www.facebook.com/prudhvitammana">Prudhvi Thammana</a></strong><br/>
                      		   <muted><strong>Contact At : 8977977968</strong></muted>
                      		</p>
                      	</div>
                      </div>
					  
                      <!-- Second Member -->
                      <div class="desc">
                      	<div class="thumb">
                      		<img class="img-circle" src="assets/img/bhaskar.jpg" width="35px" height="35px" align="">
                      	</div>
                      	<div class="details">
                      		<p><strong><a href="https://www.facebook.com/bhaskar.pinna">Bhaskar Pinna</a></strong><br/>
                      		   <muted>Contact At : 9573278936</muted>
                      		</p>
                      	</div>
                      </div>
                      <!-- Third Member -->
                      <div class="desc">
                      	<div class="thumb">
                      		<img class="img-circle" src="assets/img/vamshidhar.jpg" width="35px" height="35px" align="">
                      	</div>
                      	<div class="details">
                      		<p><strong><a href="https://www.facebook.com/VamshidharReddy8099">Gurram Vamshidhar Reddy</a></strong><br/>
                      		   <muted>Contact At : 8099945069</muted>
                      		</p>
                      	</div>
                      </div>
                      <!-- Fourth Member -->
                      <div class="desc">
                      	<div class="thumb">
                      		<img class="img-circle" src="assets/img/sameer.jpg" width="35px" height="35px" align="">
                      	</div>
                      	<div class="details">
                      		<p><strong><a href="https://www.facebook.com/sameer.nandan.9">Balijepalli Sameera Nandan</a></strong><br/>
                      		   <muted>Contact At : 8686550394</muted>
                      		</p>
                      	</div>
                      </div>

                        <!-- CALENDAR-->
                        <div id="calendar" class="mb">
                            <div class="panel green-panel no-margin">
                                <div class="panel-body">
                                    <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                                        <div class="arrow"></div>
                                        <h3 class="popover-title" style="disadding: none;"></h3>
                                        <div id="date-popover-content" class="popover-content"></div>
                                    </div>
                                    <div id="my-calendar"></div>
                                </div>
                            </div>
                        </div><!-- / calendar -->
                      
                  </div><!-- /col-lg-3 -->
              </div><! --/row -->
          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2016 - Edisight.com
              <a href="index.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>    
	<script src="assets/js/zabuto_calendar.js"></script>	
	
	
	
	<script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
  

  </body>
</html>