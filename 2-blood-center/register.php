<html>
     <head>
	     <title>Registration Form</title>
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
<body background="2 (5).jpg">

    
	
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
					<li><a href="login.php">LOGIN HERE</a></li>
					<li><a href="login.php">BLOOD DONORS</a></li>
                    <li><a href="aboutus.html">ABOUT US</a></li>
					<li><a href="volunteers.php">VOLUNTEERS</a></li>
                  
                </ul>
            </div>

        </div>
    </div><br><br><br>
	
	
	
			
<!-- END NAV SECTION -->

<form method='post' action='register.php'>
     <table width='600' border='10' align='center'>
         <center> <h2 style="color:red;">Register Your Details</h2></center><br>
         <center><h4 style="color:black;">Your contact details are used to connect to the blood needer's</h4></center>
      
        <tr style="color:black;">
               <td style="color:black;"><b>User Name</b></td> 
               <td>
			   <input type = "text" name = "name">
			   </td>
        </tr>
		
		<tr style="color:black;">
               <td style="color:black;"><b>Password</b></td> 
               <td>
			   <input type = "password" name = "pass">
			   </td>
        </tr>
		
	    
        <tr>
               <td style="color:black;"><b>E-mail</b></td>
               <td>
			   <input type = "text" name = "email">
			   </td>
        </tr>
            
        <tr>
               <td style="color:black;"><b>Contact</b></td>
               <td>
			   <input type = "text" name = "contact">
			   </td>
        </tr>
			
	    <tr>
               <td style="color:black;"><b>Country</b></td>
               <td><span><select aria-label="country" name="country" id="country" title="country" class="_5dba">
			   <option value="country" selected="1">Country</option>
			   
			   <option value="Afghanistan">Afghanistan</option>
               <option value="Albania">Albania</option>
			   <option value="Algeria">Algeria</option>
               <option value="American Samoa">American Samoa</option>
               <option value="Andorra">Andorra</option>
               <option value="Angola">Angola</option>
               <option value="Anguilla">Anguilla</option>
               <option value="Antigua & Barbuda">Antigua & Barbuda</option>
               <option value="Antarctica">Antarctica</option>
               <option value="Argentina">Argentina</option>
               <option value="Armenia">Armenia</option>
               <option value="Australia">Australia</option>
               <option value="Aruba">Aruba</option>
               <option value="Azerbaijan">Azerbaijan</option>
			   
			   
			   <option value="Bahamas">Bahamas</option>
               <option value="Benin">Benin</option>
			   <option value="Algeria">Burundi</option>
               <option value="Burkina Faso">Burkina Faso</option>
               <option value="Bulgaria">Bulgaria</option>
               <option value="Brazil">Brazil</option>
               <option value="Brunei Darussalam">Brunei Darussalam</option>
               <option value="Botswana">Botswana</option>
               <option value="Bosnia">Bosnia</option>
               <option value="Bolivia">Bolivia</option>
               <option value="Bhutan">Bhutan</option>
               <option value="Bermuda">Bermuda</option>
               <option value="Belize">Belize</option>
               <option value="Belgium">Belgium</option>
			   <option value="Belarus">Belarusa</option>
               <option value="Barbados">Barbados</option>
               <option value="Bangladesh">Bangladesh</option>
               <option value="Bahrain">Bahrain</option>
			   
			   
			   <option value="Cuba">Cuba</option>
               <option value="Cyprus">Cyprus</option>
			   <option value="Czech Republic">Czech Republic</option>
               <option value="Congo, Republic of (Brazzaville)">Congo, Republic of (Brazzaville)</option>
               <option value="Croatia">Croatia</option>
               <option value="Ivory Coast">Ivory Coast</option>
               <option value="Costa Rica">Costa Rica</option>
               <option value="Cook Islands">Cook Islands</option>
               <option value="Congo">Congo</option>
               <option value="Comoros">Comoros</option>
               <option value="Colombia">Colombia</option>
               <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
               <option value="Christmas Island">Christmas Island</option>
               <option value="China">China</option>
			   <option value="Chile">Chile</option>
               <option value="Chad">Chad</option>
               <option value="Central African Republic">Central African Republic</option>
               <option value="Cayman Islands">Cayman Islands</option>
			   <option value="Cape Verde">Cape Verde</option>
               <option value="Canada">Canada</option>
			   <option value="Cameroon">Cameroon</option>
               <option value="Cambodia">Cambodia</option>
			   
			   
			   <option value="Denmark">Denmark</option>
               <option value="Djibouti">Djibouti</option>
			   <option value="Dominica">Dominica</option>
               <option value="Dominican Republic">Dominican Republic</option>
			   
			   
			   <option value="East Timor">East Timor</option>
               <option value="Ecuador">Ecuador</option>
               <option value="Egypt">Egypt</option>
               <option value="Ethiopia">Ethiopia</option>
			   <option value="El Salvador">El Salvador</option>
               <option value="Equatorial Guinea">Equatorial Guinea</option>
			   <option value="Eritrea">Eritrea</option>
               <option value="Estonia">Estonia</option>
			   
			   
			   <option value="Falkland Islands">Falkland Islands</option>
               <option value="Faroe Islands">Faroe Islands</option>
               <option value="Fiji">Fiji</option>
               <option value="Finland">Finland</option>
			   <option value="French Southern Territories">French Southern Territories</option>
               <option value="French Polynesia">French Polynesia</option>
			   <option value="France">France</option>
               <option value="French Guiana">French Guiana</option>
			   
			   
			   <option value="Gabon">Gabon</option>
               <option value="Gambia">Gambia</option>
               <option value="Guinea">Guinea</option>
               <option value="Georgia">Georgia</option>
			   <option value="Guinea-Bissau">Guinea-Bissau</option>
               <option value="Guyana">Guyana</option>
			   <option value="Guam">Guam</option>
               <option value="Gibraltar">Gibraltar</option>
			   <option value="Guadeloupe">Guadeloupe</option>
               <option value="Grenada">Grenada</option>
               <option value="Germany">Germany</option>
               <option value="Greenland">Greenland</option>
			   <option value="Guatemala">Guatemala</option>
               <option value="Greece">Greece</option>
			   <option value="Great Britain">Great Britain</option>
               <option value="Ghana">Ghana</option>
			   
			   
			   <option value="Haiti">Haiti</option>
			   <option value="Holy See">Holy See</option>
               <option value="Honduras">Honduras</option>
			   <option value="Hong Kong">Hong Kong</option>
               <option value="Hungary">Hungary</option>
			   
			   
			   <option value="Iceland">Iceland</option>
               <option value="India">India</option>
               <option value="Indonesia">Indonesia</option>
               <option value="Iran">Iran</option>
			   <option value="Iraq">Iraq</option>
               <option value="Ireland">Ireland</option>
			   <option value="Israel">Israel</option>
               <option value="Italy">Italy</option>
			   
			   
			   <option value="Jamaica">Jamaica</option>
			   <option value="Japan">Japan</option>
               <option value="Jordan">Jordan</option>
			   
			   
			   
			   <option value="Kazakhstan">Kazakhstan</option>
               <option value="Kenya">Kenya</option>
               <option value="Kiribati">Kiribati</option>
               <option value="North Korea">North Korea</option>
			   <option value="South Korea">South Korea</option>
  			   <option value="Kosovo">Kosovo</option>
               <option value="Kyrgyzstan">Kyrgyzstan</option> 		   
			   <option value="Kuwait">Kuwait</option>
			   
			   
			   <option value="Lao">Lao</option>			   
			   <option value="Latvia">Latvia</option>
               <option value="Lebanon">Lebanon</option>
               <option value="Liberia">Liberia</option>
               <option value="Lesotho">Lesotho</option>
			   <option value="Luxembourg">Luxembourg</option>
  			   <option value="Lithuania">Lithuania</option>
               <option value="Liechtenstein">Liechtenstein</option> 		   
			   <option value="Libya">Libya</option>
			   
			   
			   <option value="Myanmar">Myanmar</option>
               <option value="Montenegro">Montenegro</option>
               <option value="Monaco">Monaco</option>
               <option value="Mongolia">Mongolia</option>
			   <option value="Montserrat">Montserrat</option>
               <option value="Mayotte">Mayotte</option>
			   <option value="Mozambique">Mozambique</option>
               <option value="Morocco">Morocco</option>
			   <option value="Mauritius">Mauritius</option>
               <option value="Micronesia">Micronesia</option>
               <option value="Moldova">Moldova</option>
               <option value="Mexico">Mexico</option>
			   <option value="Mauritania">Mauritania</option>
               <option value="Martinique">Martinique</option>
			   <option value="Marshall Islands">Marshall Islands</option>
               <option value="Malta">Malta</option>
			   <option value="Mali">Mali</option>
               <option value="Maldives">Maldives</option>
               <option value="Malaysia">Malaysia</option>
			   <option value="Malawi">Malawi</option>
               <option value="Madagascar">Madagascar</option>
			   <option value="Macedonia">Macedonia</option>
               <option value="Macau">Macau</option>
			   
			   </td>
        </tr>

	    <tr>
               <td style="color:black;"><b>State</b></td>
               <td>
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
			   </td>
        </tr>
            
        <tr>
               <td style="color:black;"><b>Address</b></td>
               <td>
			   <textarea name = "address" rows = "2" cols = "22"></textarea>
			   </td>
        </tr>
            
			
			
		<tr>
			   <td style="color:black;"><b>Age</b></td>
			
			   <td style="color:black;">
			   <span><select aria-label="age" name="age" id="age" title="age" class="_5dba">
  
  <option value="0" selected="1">Age</option><option value="1">1</option>
  <option value="2">2</option><option value="3">3</option>
  <option value="4">4</option><option value="5">5</option>
  <option value="6">6</option><option value="7">7</option>
  <option value="8">8</option><option value="9">9</option>
  <option value="10">10</option><option value="11">11</option>
  <option value="12">12</option><option value="13">13</option>
  <option value="14">14</option><option value="15">15</option>
  <option value="16">16</option><option value="17">17</option>
  <option value="18">18</option><option value="19">19</option>
  <option value="20">20</option><option value="21">21</option>
  <option value="22">22</option><option value="23">23</option>
  <option value="24">24</option><option value="25">25</option>
  <option value="26">26</option><option value="27">27</option>
  <option value="28">28</option><option value="29">29</option>
  <option value="30">30</option><option value="31">31</option> 
  <option value="32">32</option><option value="33">33</option>
  <option value="34">34</option><option value="35">35</option>
  <option value="36">36</option><option value="37">37</option>
  <option value="38">38</option><option value="39">39</option>
  <option value="40">40</option><option value="41">41</option>
  <option value="42">42</option><option value="43">43</option>
  <option value="44">44</option><option value="45">45</option>
  <option value="46">46</option><option value="47">47</option>
  <option value="48">48</option><option value="49">49</option>
  <option value="50">50</option><option value="51">51</option>
  <option value="52">52</option><option value="53">53</option>
  <option value="54">54</option><option value="55">55</option>
  <option value="56">56</option><option value="57">57</option>
  <option value="58">58</option><option value="59">59</option>
  <option value="60">60</option><option value="61">61</option>
  <option value="62">62</option><option value="63">63</option>
  <option value="64">64</option><option value="65">65</option>
  <option value="66">66</option><option value="67">67</option>
  <option value="68">68</option><option value="69">69</option>
  <option value="70">70</option><option value="1">71</option>
  <option value="72">72</option><option value="73">73</option>
  <option value="74">74</option><option value="75">75</option>
  <option value="76">76</option><option value="77">77</option>
  <option value="78">78</option><option value="79">79</option>
  <option value="80">80</option><option value="81">81</option>
  <option value="82">82</option><option value="83">83</option>
  <option value="84">84</option><option value="85">85</option>
  <option value="86">86</option><option value="87">87</option>
  <option value="88">88</option><option value="89">89</option>
  <option value="89">89</option>
 
  </select>
  
  
   
  </td>
         
		</tr>
						
        <tr>
               <td style="color:black;"><b>Gender</b></td>
               <td align='center' style="color:black;"><b>
                  <input type = "radio" name = "gender" value = "male" checked = "male">Male
                  <input type = "radio" name = "gender" value = "female">Female
				   <input type = "radio" name = "gender" value = "other">Other</b>
               </td>
        </tr>
			
			
	    <tr>
               <td style="color:black;"><b>Blood Group</b></td>
               <td align='center' style="color:black;"><b>
                  <input type = "radio" name = "blood_group" value = "O+" checked = "O+">O+
                  <input type = "radio" name = "blood_group" value = "O-">O-
				  <input type = "radio" name = "blood_group" value = "A+">A+
				  <input type = "radio" name = "blood_group" value = "A-">A-
                  <input type = "radio" name = "blood_group" value = "B+">B+
				  <input type = "radio" name = "blood_group" value = "B-">B-
				  <input type = "radio" name = "blood_group" value = "AB+">AB+
				  <input type = "radio" name = "blood_group" value = "AB-">AB-</b>
			   </td>
        </tr>
			
	    <tr>
			   <td style="color:black;"><b>Interested To Donate Blood</b></td>
               <td align='center' style="color:black;">
                  <input type = "radio" name = "int_to_donate" value = "Yes"  checked = "Yes"><b>Yes</b>
                  <input type = "radio" name = "int_to_donate" value = "No"><b>No</b>
               </td>
        </tr>

        </table><br><br>
		
		<table width='7' border='3' align='center'>
		    <tr>
                 <td style="color:black;"><b> <input type = "submit" name = "register" value = "Register"> </b></td>
		    </tr>		 
        </table><br>
		
		
		<center><font style="color:black;">If You Are Already Registered Please Go To :<a href="login.php">LOGIN PAGE</a> To View The Blood Donors</font></center><br><br>
		
		 

	 
</form>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>	 
<?php
include('connect.php');
   
       if(isset($_POST['register'])){

	         $name = $_POST['name'];
			 $pass = $_POST['pass'];
             $email = $_POST['email'];
             $contact = $_POST['contact'];
             $country = $_POST['country'];
	         $state = $_POST['state'];
             $address = $_POST['address'];
             $age = $_POST['age'];
	         $gender = $_POST['gender'];
             $blood_group = $_POST['blood_group'];
             $int_to_donate = $_POST['int_to_donate'];
			 
			 
			if($name ==''){
			echo "<script>alert('Please Enter Your Name!')</script>";
			exit();
			}
			
			if($pass ==''){
			echo "<script>alert('Please Enter Your Password!')</script>";
			exit();
			}
			
			if($email ==''){
			echo "<script>alert('Please Enter Your Email!')</script>";
			exit();
			}
			
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid format and please re-enter valid email"; 
			echo "<script>alert('Please Enter A Valid Email!')</script>";
			exit();
			}
			
			$check_email = "select * from register where email='$email'";
			
			$run = mysql_query($check_email);
			
			if(mysql_num_rows($run)>0)
			{
			echo "<script>alert('EMAIL $email IS ALREADY EXIST, PLEASE TRY ANOTHER ONE!')</script>";
			}
			
			if($contact ==''){
			echo "<script>alert('Please Enter Your Contact!')</script>";
			exit();
			}
			$check_contact = "select * from register where contact='$contact'";
			
			$run = mysql_query($check_contact);
			
			if(mysql_num_rows($run)>0)
			{
			echo "<script>alert('CONTACT $contact IS ALREADY EXIST, PLEASE TRY ANOTHER ONE!')</script>";
			}
			
					
			if($country ==''){
			echo "<script>alert('Please Enter Your Country Name!')</script>";
			exit();
			}
			
			if($state ==''){
			echo "<script>alert('Please Enter Your State Name!')</script>";
			exit();
			}
			
			if($address ==''){
			echo "<script>alert('Please Enter Your Address!')</script>";
			exit();
			}
			
			 
			 
			
	       $query = "insert into register (name,pass,email,contact,country,state,address,age,gender,blood_group,int_to_donate) 
	          values ('$name','$pass','$email','$contact','$country','$state','$address','$age','$gender','$blood_group','$int_to_donate')";		
			
			
			if(mysql_query($query)){
			echo "<script>alert('THANK YOU FOR REGISTRATING YOUR VALUABLE DETAILS')</script>";
			
			}
			$from = "From: minibloodcenter@gmail.com";
		    $to = $email;
		    $subject = "Login Information";
         
		   $body = "ThankYou ".$name." For Registering Your Valuable Details and Your Username Is ".$email." and Your Password Is ".$pass." Now You Can Login Here www.bloodcenter.in/login.php";
       
        mail($to, $subject, $body, $from);
        
			

}



       

?>

