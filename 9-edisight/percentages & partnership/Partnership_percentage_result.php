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
						<th>Q1. Sumit and Ravi started a business by investing Rs 85000 and 15000 respectively. In what ratio the profit earned after 2 years be divided between Sumit and Ravi respectively.</th>
					</tr>
			    </thead>
			</table>
								   
								   
			<table class="table table-bordered">
				<thead>
					<tr>
					   <td><div class="dropdown">
                           <span>A) 17:3</span>
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
						<th>Q2. A,B and C enter into a partnership investing Rs 35000, Rs 45000 and 55000. Find the their respective shares in annual profit of 40,500</th>
					</tr>
			    </thead>
			</table>
								   
								   
			<table class="table table-bordered">
				<thead>
					<tr>
					   <td><div class="dropdown">
                           <span>A) 10500, 13500, 16500</span>
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
						<th>Q3. Rs. 700 is divided among A, B, C so that A receives half as much as B and B half as much as C. Then C's share is</th>
					</tr>
			    </thead>
			</table>
								   
								   
			<table class="table table-bordered">
				<thead>
					<tr>
					   <td><div class="dropdown">
                           <span>A) Rs 400</span>
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
						<th>Q4. A and B started a partnership business investing some amount in the ratio of 3 : 5. C joined them after six months with an amount equal to that of B. In what proportion should the profit at the end of one year be distributed amount A, B and C</th>
					</tr>
			    </thead>
			</table>
								   
								   
			<table class="table table-bordered">
				<thead>
					<tr>
					   <td><div class="dropdown">
                           <span>A) 6:10:5</span>
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
						<th>Q5. Three partners A,B and C shared the profit in a software business in the ratio 5:7:8. They had partnered for 14 months, 8 months and 7 months respectively. Find the ratio of their investments?</th>
					</tr>
			    </thead>
			</table>
								   
								   
			<table class="table table-bordered">
				<thead>
					<tr>
					   <td><div class="dropdown">
                           <span>A) 20:49:64</span>
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
						<th>Q6. A starts business with Rs. 3500 and after 5 months, B joins with A as his partner. After a year, the profit is divided in the ratio 2:3. What is B's contribution in the capital</th>
					</tr>
			    </thead>
			</table>
								   
								   
			<table class="table table-bordered">
				<thead>
					<tr>
					   <td><div class="dropdown">
                           <span>A) Rs 9000</span>
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
						<th>Q7. Anand and Deepak started a business investing Rs.22,500 and Rs.35,000 respectively. Out of a total profit of Rs. 13,800. Deepak's share is</th>
					</tr>
			    </thead>
			</table>
								   
								   
			<table class="table table-bordered">
				<thead>
					<tr>
					   <td><div class="dropdown">
                           <span>A) Rs 8400</span>
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
						<th>Q8. A started a business with Rs.21,000 and is joined afterwards by B with Rs.36,000. After how many months did B join if the profits at the end of the year are divided equally?</th>
					</tr>
			    </thead>
			</table>
								   
								   
			<table class="table table-bordered">
				<thead>
					<tr>
					   <td><div class="dropdown">
                           <span>A) 5</span>
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
						<th>Q9. A, B and C invested Rs. 8000, Rs. 4000 and Rs. 8000 respectively in a business. A left after six months. If after eight months, there was a gain of Rs. 4005, then what will be the share of B?</th>
					</tr>
			    </thead>
			</table>
								   
								   
			<table class="table table-bordered">
				<thead>
					<tr>
					   <td><div class="dropdown">
                           <span>A) Rs 890</span>
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
						<th>Q10. Nirmal and Kapil started a business investing Rs. 9000 and Rs. 12000 respectively. After 6 months, Kapil withdrew half of his investment. If after a year, the total profit was Rs. 4600, what was Kapil’s share initially ?</th>
					</tr>
			    </thead>
			</table>
								   
								   
			<table class="table table-bordered">
				<thead>
					<tr>
					   <td><div class="dropdown">
                           <span>A) Rs 2300</span>
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
						<th>Q11. Manoj received Rs. 6000 as his share out of the total profit of Rs. 9000 which he and Ramesh earned at the end of one year. If Manoj invested Rs.120000 for 6 months, whereas Ramesh invested his amount for the whole year, what was the amount invested by Ramesh</th>
					</tr>
			    </thead>
			</table>
								   
								   
			<table class="table table-bordered">
				<thead>
					<tr>
					   <td><div class="dropdown">
                           <span>A) Rs. 5000</span>
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
						<th>Q12. Yogesh started a business investing Rs. 45000. After 3 months, Pranab joined him with a capital of Rs. 60000. After another 6 months, Atul joined them with a capital of Rs. 90000. At the end of the year, they made a profit of Rs. 20000. What would be Atuls share in it?</th>
					</tr>
			    </thead>
			</table>
								   
								   
			<table class="table table-bordered">
				<thead>
					<tr>
					   <td><div class="dropdown">
                           <span>A) Rs 4000</span>
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
						<th>Q13. In business, A and C invested amounts in the ratio 2:1, whereas the ratio between amounts invested by A and B was 3:2, If Rs 157300 was their profit, how much amount did B receive.</th>
					</tr>
			    </thead>
			</table>
								   
								   
			<table class="table table-bordered">
				<thead>
					<tr>
					   <td><div class="dropdown">
                           <span>A) Rs 48400</span>
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
						<th>Q14. Rahul and Bharti are partners in a business. Rahul contributes 1/4th capital for 15 months and Bharti received 2/3 of profit. For how long Bharti money was used.</th>
					</tr>
			    </thead>
			</table>
								   
								   
			<table class="table table-bordered">
				<thead>
					<tr>
					   <td><div class="dropdown">
                           <span>A) 10 months</span>
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
						<th>Q15. P and Q started a business investing Rs 85000 and Rs 15000 resp. In what ratio the profit earned after 2 years be divided between P and Q respectively.</th>
					</tr>
			    </thead>
			</table>
								   
								   
			<table class="table table-bordered">
				<thead>
					<tr>
					   <td><div class="dropdown">
                           <span>A) 17:3</span>
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
						<th>Q16. A, B and C enter into a partnership investing Rs 35000, Rs 45000 and Rs 55000 resp. The respective share of A,B and C in an annual profit of Rs 40500 are.</th>
					</tr>
			    </thead>
			</table>
								   
								   
			<table class="table table-bordered">
				<thead>
					<tr>
					   <td><div class="dropdown">
                           <span>A) Rs. 10500, Rs. 13500, Rs. 16500</span>
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
						<th>Q17. Kamal started a business investing Rs 9000. After five months, Sameer joined with a capital of Rs 8000. If at the end of the year, they earn a profit of Rs. 6970, then what will be the share of Sameer in the profit ?</th>
					</tr>
			    </thead>
			</table>
								   
								   
			<table class="table table-bordered">
				<thead>
					<tr>
					   <td><div class="dropdown">
                           <span>A) Rs 2380</span>
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
						<th>Q18. Arun, Kamal and Vinay invested Rs. 8000, Rs. 4000 and Rs. 8000 respectively in a business. Arun left after six months. If after eight months, there was a gain of Rs. 4005, then what will be the share of Kamal?</th>
					</tr>
			    </thead>
			</table>
								   
								   
			<table class="table table-bordered">
				<thead>
					<tr>
					   <td><div class="dropdown">
                           <span>A) Rs 890</span>
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
						<th>Q19. A and B entered into a partnership investing Rs. 16000 and Rs. 12000 respectively. After 3 months, A withdrew Rs. 5000 while B invested Rs. 5000 more. After 3 more months C joins the business with a capital of Rs. 21000. The share of B exceeds that of C, out of a total profit of Rs. 26400 after one year by</th>
					</tr>
			    </thead>
			</table>
								   
								   
			<table class="table table-bordered">
				<thead>
					<tr>
					   <td><div class="dropdown">
                           <span>A) Rs. 3600</span>
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
						<th>Q20. Check which among following are required to answer this questions : 

Three friends started a businesss, let there names are A, B and C. What profit B will get, if,

1. C invested Rs. 8000 for nine months, his profit was 3/2 times that of B's and his investment was four times that of A.

2. A and B invested for one year in the proportion 1 : 2 respectively.

3. The three together got Rs. 1000 as profit at the year end.</th>
					</tr>
			    </thead>
			</table>
								   
								   
			<table class="table table-bordered">
				<thead>
					<tr>
					   <td><div class="dropdown">
                           <span>A) All 1, 2 and 3</span>
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
