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
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	<style>
.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    padding: 12px 16px;
}

.dropdown:hover .dropdown-content {
    display: block;
}
</style>
	
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
								 
							}

                             return $displayQuestions;

                        }

 
                        function displayTheQuestions($questions) // Take our array of exploded questions and choices, show the question and loop through the choices. 
						{

                           if (count($questions) > 0) 
						   {

                              foreach ($questions as $key => $value) 
							  {  

                                $choices = explode(",",$value[1]);  // Break the choices appart into a choice array

                                foreach($choices as $value) // For each choice, create a radio button as part of that questions radio button group and Each radio will be the same group name (in this case the question number) and have a value that is the first letter of the choice.
                                {
 
                                   $letter = substr(trim($value),0,1); 
								   
                                }

                                

						     }

                            }

                           

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


                        <form method="POST" action="alligation result.php">

                       <?php

                           $loadedQuestions = readQuestions("questions.txt");  // Load the questions from the questions file

                           displayTheQuestions($loadedQuestions);  // Display the questions

					    ?>
					
				
 <?php//==========================================================================================================================?>

  <?php

// This grades the quiz once they have clicked the submit button

if (isset($_POST['submitquiz'])) {

 

    // Read in the answers from the answer key and get the count of all answers.

    $answerKey = readAnswerKey("answerkey.txt");

    $answerCount = count($answerKey);

    $correctCount = 0;
	
	


    // For each answer in the answer key, see if the user has a matching question submitted

    foreach ($answerKey as $key => $keyanswer) {

        if (isset($_POST[$key])) {

            // If the answerkey and the user submitted answer are the same, increment the 

            // correct answer counter for the user

            if (strtoupper(rtrim($keyanswer)) == strtoupper($_POST[$key])) {

                $correctCount++;

            }

       }

    }

    $wrong = ($answerCount - $correctCount); ?>
    
 

    
	<div class="container">
     <div class="col-sm-8">	 
     <center><h1 style="color:black;">CHECK YOUR UNIT WISE RESULT</h1></center>
	 <center>
	 <table class="table table-bordered">
     <thead>
      <tr>
        <th>Total number of Questions</th>
        <th><?php echo $answerCount; ?></th>
      </tr>
     </thead>
     <tbody>
	 
	 <tr>
        <td>Right Answers</td>
        <td><?php echo $correctCount;?></td>
      </tr>
	 
	 <tr>
        <td>Wrong/No Answer</td>
        <td><?php echo $wrong;?></td>
      </tr>
    <?php
    if ($answerCount > 0) {

        // If we had answers in the answer key, translate their score to percentage and then pass that percentage to our translateGrade function to return a letter grade.

        $percentage = round((($correctCount / $answerCount) * 100),1); ?>
		
		<tr>
        <td>Total Score</td>
        <td><?php echo $percentage;?><?php echo '%'; ?></td>
      </tr>
	   
	   <tr>
        <td>Grade</td>
        <td><?php echo translateToGrade($percentage);?></td>
		
      </tr>
	  </tbody>
      </table></center></div></div><?php
	  
    }

    else {

        // If something went wrong or they failed to answer any questions, we have a score of 0 and an "F"

        echo "Total Score: 0 (Grade: F)";

    }

}?>


<center><h2 style="color:black;">Question Wise Analysis</h1></center>
           <center><button type="button" class="btn btn-primary" data-toggle="tab" href="#select" >CHECK</button></center>
		   <div id="select" class="tab-pane fade">
		   <div class="container">
           <div class="col-sm-8">
		   
		      <center><p>Take mouse over answer to view explanation</p></center>
	         <table class="table table-bordered">
			    <thead>
			        <tr class="danger">
						<th>Q1. A vessel contains 20 liters of a mixture of milk and water in the ratio 3:2. 10 liters of the mixture are removed and replaced with an equal quantity of pure milk. If the process is repeated once more, find the ratio of milk and water in the final mixture obtained?</th>
					</tr>
			    </thead>
			</table>
								   
								   
			<table class="table table-bordered">
				<thead>
					<tr>
					   <td><div class="dropdown">
                           <span>A) 9:1</span>
                           <div class="dropdown-content">
                           <p>explanation here</p>
                           </div>
                           </div>
					   </td>
					</tr>
								   
			    </thead>
			</table>
			
			
			
			<table class="table table-bordered">
			    <thead>
			        <tr class="danger">
						<th>Q2. A mixture of 150 liters of wine and water contains 20% water. How much more water should be added so that water becomes 25% of the new mixture?</th>
					</tr>
			    </thead>
			</table>
								   
								   
			<table class="table table-bordered">
				<thead>
					<tr>
					   <td><div class="dropdown">
                           <span>A) 10 liters</span>
                           <div class="dropdown-content">
                           <p>explanation here</p>
                           </div>
                           </div>
					   </td>
					</tr>
								   
			    </thead>
			</table>
			
			
			<table class="table table-bordered">
			    <thead>
			        <tr class="danger">
						<th>Q3. In what ratio should two varieties of sugar of Rs.18 per kg and Rs.24 kg be mixed together to get a mixture whose cost is Rs.20 per kg?</th>
					</tr>
			    </thead>
			</table>
								   
								   
			<table class="table table-bordered">
				<thead>
					<tr>
					   <td><div class="dropdown">
                           <span>A) 2:1</span>
                           <div class="dropdown-content">
                           <p>explanation here</p>
                           </div>
                           </div>
					   </td>
					</tr>
								   
			    </thead>
			</table>
			
			
			
			<table class="table table-bordered">
			    <thead>
			        <tr class="danger">
						<th>Q4. Two varieties of wheat - A and B costing Rs. 9 per kg and Rs. 15 per kg were mixed in the ratio 3 : 7. If 5 kg of the mixture is sold at 25% profit, find the profit made?</th>
					</tr>
			    </thead>
			</table>
								   
								   
			<table class="table table-bordered">
				<thead>
					<tr>
					   <td><div class="dropdown">
                           <span>A) Rs. 16.50</span>
                           <div class="dropdown-content">
                           <p>explanation here</p>
                           </div>
                           </div>
					   </td>
					</tr>
								   
			    </thead>
			</table>
			
			
			
			
			<table class="table table-bordered">
			    <thead>
			        <tr class="danger">
						<th>Q5. How many liters of oil at Rs.40 per liter should be mixed with 240 liters of a second variety of oil at Rs.60 per liter so as to get a mixture whose cost is Rs.52 per liter?</th>
					</tr>
			    </thead>
			</table>
								   
								   
			<table class="table table-bordered">
				<thead>
					<tr>
					   <td><div class="dropdown">
                           <span>A) 160 liters</span>
                           <div class="dropdown-content">
                           <p>explanation here</p>
                           </div>
                           </div>
					   </td>
					</tr>
								   
			    </thead>
			</table>
			
			
			
			
			
			<table class="table table-bordered">
			    <thead>
			        <tr class="danger">
						<th>Q6. In a mixture of milk and water, the proportion of milk by weight was 80%. If, in a 180 gm mixture, 36 gms of pure milk is added, what would be the percentage of milk in the mixture formed?</th>
					</tr>
			    </thead>
			</table>
								   
								   
			<table class="table table-bordered">
				<thead>
					<tr>
					   <td><div class="dropdown">
                           <span>A) None of these</span>
                           <div class="dropdown-content">
                           <p>explanation here</p>
                           </div>
                           </div>
					   </td>
					</tr>
								   
			    </thead>
			</table>
			
			
			
			
			<table class="table table-bordered">
			    <thead>
			        <tr class="danger">
						<th>Q7. A can contains a mixture of two liquids A and B in the ratio  7 : 5. When 9 litres of mixture are drawn off and the can is filled with B, the ratio of A and B becomes 7 : 9. How many litres of liquid A was contained by the can initially?</th>
					</tr>
			    </thead>
			</table>
								   
								   
			<table class="table table-bordered">
				<thead>
					<tr>
					   <td><div class="dropdown">
                           <span>A) 21</span>
                           <div class="dropdown-content">
                           <p>explanation here</p>
                           </div>
                           </div>
					   </td>
					</tr>
								   
			    </thead>
			</table>
			
			
			
			
			
			<table class="table table-bordered">
			    <thead>
			        <tr class="danger">
						<th>Q8. In a can, there is a mixture of milk and water in the ratio 4 : 5. If it is filled with an additional 8 litres of milk the can would be full and ratio of milk and water would become 6 : 5. Find the capacity of the can?</th>
					</tr>
			    </thead>
			</table>
								   
								   
			<table class="table table-bordered">
				<thead>
					<tr>
					   <td><div class="dropdown">
                           <span>A) 44</span>
                           <div class="dropdown-content">
                           <p>explanation here</p>
                           </div>
                           </div>
					   </td>
					</tr>
								   
			    </thead>
			</table>
			
			
			
			
			<table class="table table-bordered">
			    <thead>
			        <tr class="danger">
						<th>Q9. A mixture of 70 litres of milk and water contains 10% water. How many litres of water should be added to the mixture so that the mixture contains 12 1/2% water?</th>
					</tr>
			    </thead>
			</table>
								   
								   
			<table class="table table-bordered">
				<thead>
					<tr>
					   <td><div class="dropdown">
                           <span>A) 2</span>
                           <div class="dropdown-content">
                           <p>explanation here</p>
                           </div>
                           </div>
					   </td>
					</tr>
								   
			    </thead>
			</table>
			
			
			
			
			<table class="table table-bordered">
			    <thead>
			        <tr class="danger">
						<th>Q10. In what ratio should a variety of rice costing Rs. 6 per kg be mixed with another variety of rice costing Rs. 8.75 per kg to obtain a mixture costing Rs. 7.50 per kg?</th>
					</tr>
			    </thead>
			</table>
								   
								   
			<table class="table table-bordered">
				<thead>
					<tr>
					   <td><div class="dropdown">
                           <span>A) 5 : 6</span>
                           <div class="dropdown-content">
                           <p>explanation here</p>
                           </div>
                           </div>
					   </td>
					</tr>
								   
			    </thead>
			</table>
			
			
			
			
			
			<table class="table table-bordered">
			    <thead>
			        <tr class="danger">
						<th>Q11. A vessel is filled with liquid, 3 parts of which are water and 5 parts of syrup. How much of the mixture must be drawn off and replaced with water so that the mixture may be half water and half syrup?</th>
					</tr>
			    </thead>
			</table>
								   
								   
			<table class="table table-bordered">
				<thead>
					<tr>
					   <td><div class="dropdown">
                           <span>A) 1/5</span>
                           <div class="dropdown-content">
                           <p>explanation here</p>
                           </div>
                           </div>
					   </td>
					</tr>
								   
			    </thead>
			</table>
			
			
			
			
			
			<table class="table table-bordered">
			    <thead>
			        <tr class="danger">
						<th>Q12. A merchant has 1000 kg of sugar part of which he sells at 8% profit and the rest at 18% profit. He gains 14% on the whole. The Quantity sold at 18% profit is</th>
					</tr>
			    </thead>
			</table>
								   
								   
			<table class="table table-bordered">
				<thead>
					<tr>
					   <td><div class="dropdown">
                           <span>A) 600 kg</span>
                           <div class="dropdown-content">
                           <p>explanation here</p>
                           </div>
                           </div>
					   </td>
					</tr>
								   
			    </thead>
			</table>
			
			
			
			
			<table class="table table-bordered">
			    <thead>
			        <tr class="danger">
						<th>Q13. In what ratio must wheat at Rs.3.20 per kg be mixed with wheat at Rs.2.90 per kg so that the mixture be worth Rs.3.08 per kg?</th>
					</tr>
			    </thead>
			</table>
								   
								   
			<table class="table table-bordered">
				<thead>
					<tr>
					   <td><div class="dropdown">
                           <span>A) 3 : 2</span>
                           <div class="dropdown-content">
                           <p>explanation here</p>
                           </div>
                           </div>
					   </td>
					</tr>
								   
			    </thead>
			</table>
			
			
			
			<table class="table table-bordered">
			    <thead>
			        <tr class="danger">
						<th>Q14. In what ratio must tea at Rs. 62 per Kg be mixed with tea at Rs. 72 per Kg so that the mixture must be worth Rs. 64.50 per Kg?</th>
					</tr>
			    </thead>
			</table>
								   
								   
			<table class="table table-bordered">
				<thead>
					<tr>
					   <td><div class="dropdown">
                           <span>A) 3 : 1</span>
                           <div class="dropdown-content">
                           <p>explanation here</p>
                           </div>
                           </div>
					   </td>
					</tr>
								   
			    </thead>
			</table>
			
			
			
			<table class="table table-bordered">
			    <thead>
			        <tr class="danger">
						<th>Q15. A container contains 40 litres of milk. From this container 4 litres of milk was taken out and replaced by water. This process was repeated further two times. How much milk is now contained by the container?</th>
					</tr>
			    </thead>
			</table>
								   
								   
			<table class="table table-bordered">
				<thead>
					<tr>
					   <td><div class="dropdown">
                           <span>A) 29.16 litres</span>
                           <div class="dropdown-content">
                           <p>explanation here</p>
                           </div>
                           </div>
					   </td>
					</tr>
								   
			    </thead>
			</table>
			
			
			
			<table class="table table-bordered">
			    <thead>
			        <tr class="danger">
						<th>Q16. Two vessels A and B contain spirit and water in the ratio 5 : 2 and 7 : 6 respectively. Find the ratio in which these mixtures be mixed to obtain a new mixture in vessel C containing spirit and water in the ratio 8 : 5 ?</th>
					</tr>
			    </thead>
			</table>
								   
								   
			<table class="table table-bordered">
				<thead>
					<tr>
					   <td><div class="dropdown">
                           <span>A) 7 : 9</span>
                           <div class="dropdown-content">
                           <p>explanation here</p>
                           </div>
                           </div>
					   </td>
					</tr>
								   
			    </thead>
			</table>
			
			
			<table class="table table-bordered">
			    <thead>
			        <tr class="danger">
						<th>Q17. 8 litres are drawn from a cask full of wine and is then filled with water. This operation is performed three more times. The ratio of the quantity of wine now left in cask to that of the water is 16 : 65. How much wine did the cask originally hold?</th>
					</tr>
			    </thead>
			</table>
								   
								   
			<table class="table table-bordered">
				<thead>
					<tr>
					   <td><div class="dropdown">
                           <span>A) 24 litres</span>
                           <div class="dropdown-content">
                           <p>explanation here</p>
                           </div>
                           </div>
					   </td>
					</tr>
								   
			    </thead>
			</table>
			
			<table class="table table-bordered">
			    <thead>
			        <tr class="danger">
						<th>Q18.  A jar full of whiskey contains 40% alcohol. A part of this whisky is replaced by another containing 19% alcohol and now the percentage of alcohol was found to be 26%. The quantity of whisky replaced is</th>
					</tr>
			    </thead>
			</table>
								   
								   
			<table class="table table-bordered">
				<thead>
					<tr>
					   <td><div class="dropdown">
                           <span>A) 2/3</span>
                           <div class="dropdown-content">
                           <p>explanation here</p>
                           </div>
                           </div>
					   </td>
					</tr>
								   
			    </thead>
			</table>
			
			
			
			
			<table class="table table-bordered">
			    <thead>
			        <tr class="danger">
						<th>Q19. A container contains a mixture of two liquids P and Q in the ratio 7 : 5. When 9 litres of mixture are drawn off and the container is filled with Q, the ratio of P and Q becomes 7 : 9. How many litres of liquid P was contained in the container initially?</th>
					</tr>
			    </thead>
			</table>
								   
								   
			<table class="table table-bordered">
				<thead>
					<tr>
					   <td><div class="dropdown">
                           <span>A) 21</span>
                           <div class="dropdown-content">
                           <p>explanation here</p>
                           </div>
                           </div>
					   </td>
					</tr>
								   
			    </thead>
			</table>
			
			
			
			<table class="table table-bordered">
			    <thead>
			        <tr class="danger">
						<th>Q20.  In what ratio must tea at Rs.62 per kg be mixed with tea at Rs. 72 per kg so that the mixture must be worth Rs. 64.50 per kg?</th>
					</tr>
			    </thead>
			</table>
								   
								   
			<table class="table table-bordered">
				<thead>
					<tr>
					   <td><div class="dropdown">
                           <span>A) 3 : 1</span>
                           <div class="dropdown-content">
                           <p>explanation here</p>
                           </div>
                           </div>
					   </td>
					</tr>
								   
			    </thead>
			</table>
			
			

        </div>
        </div>
	    </div>
 
 
           
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
                      		<img class="img-circle" src="assets/img/ui-divya.jpg" width="35px" height="35px" align="">
                      	</div>
                      	<div class="details">
                      		<p><a href="#">Team Member 1</a><br/>
                      		   <muted>Contact At : 1234567890</muted>
                      		</p>
                      	</div>
                      </div>
					  
                      <!-- Second Member -->
                      <div class="desc">
                      	<div class="thumb">
                      		<img class="img-circle" src="assets/img/ui-sherman.jpg" width="35px" height="35px" align="">
                      	</div>
                      	<div class="details">
                      		<p><a href="#">Team Member 1</a><br/>
                      		   <muted>Contact At : 1234567890</muted>
                      		</p>
                      	</div>
                      </div>
                      <!-- Third Member -->
                      <div class="desc">
                      	<div class="thumb">
                      		<img class="img-circle" src="assets/img/ui-danro.jpg" width="35px" height="35px" align="">
                      	</div>
                      	<div class="details">
                      		<p><a href="#">Team Member 2</a><br/>
                      		   <muted>Contact At : 1234567890</muted>
                      		</p>
                      	</div>
                      </div>
                      <!-- Fourth Member -->
                      <div class="desc">
                      	<div class="thumb">
                      		<img class="img-circle" src="assets/img/ui-zac.jpg" width="35px" height="35px" align="">
                      	</div>
                      	<div class="details">
                      		<p><a href="#">Team Member 3</a><br/>
                      		   <muted>Contact At : 1234567890</muted>
                      		</p>
                      	</div>
                      </div>
                      <!-- Fifth Member -->
                      <div class="desc">
                      	<div class="thumb">
                      		<img class="img-circle" src="assets/img/ui-sam.jpg" width="35px" height="35px" align="">
                      	</div>
                      	<div class="details">
                      		<p><a href="#">Team Member 4</a><br/>
                      		   <muted>Contact At : 1234567890</muted>
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
