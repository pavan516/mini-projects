<html>
  <head>
    <title>Select Advocate | Send notifications to Bar Associations Members</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="http://selectadvocate.com/images/icons/vin.png">
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">

    <style type="text/css">
      body{
      }
      div.container{
        width: 1000px;
        margin: 0 auto;
        position: relative;
      }
      legend{
        font-size: 30px;
        color: #555;
      }
      .btn_send{
        background: #00bcd4;
      }
      label{
        margin:10px 0px !important;
      }
      textarea{
        resize: none !important;
      }
      .fl_window{
        width: 400px;
        position: absolute;
        right: 0;
        top:100px;
      }
      pre, code {
        padding:10px 0px;
        box-sizing:border-box;
        -moz-box-sizing:border-box;
        webkit-box-sizing:border-box;
        display:block; 
        white-space: pre-wrap;  
        white-space: -moz-pre-wrap; 
        white-space: -pre-wrap; 
        white-space: -o-pre-wrap; 
        word-wrap: break-word; 
        width:100%; overflow-x:auto;
      }
    </style>
  </head>
    
  <body>
        
    <?php
    if(isset($_POST['submit'])) {

      // Enabling error reporting
      error_reporting(-1);
      ini_set('display_errors', 'On');

      require_once __DIR__ . '/firebase.php';
      require_once __DIR__ . '/push.php';

      $firebase = new Firebase();
      $push = new Push();

      /* // optional payload
      $payload = array();
      $payload['team'] = 'India';
      $payload['score'] = '5.6';*/

      // notification title
      $title = isset($_POST['title']) ? $_POST['title'] : '';

      // notification message
      $message = isset($_POST['message']) ? $_POST['message'] : '';

      // push type - single user / topic
      $push_type = isset($_POST['push_type']) ? $_POST['push_type'] : '';

      // If image exist convert to url
      if(!empty($_FILES['uploadimage']['name'])) {
        $path = '<server-path>';
        $uploaddir = 'uploads/';
        $uploadfile = $uploaddir.rand(1,1000).basename($_FILES['uploadimage']['name']);

        $upload = move_uploaded_file($_FILES['uploadimage']['tmp_name'], $uploadfile);
        $image_path = $path.$uploadfile;
      } else {
        $image_path = "";
      }

      // get web link  if it's available
      $webLink  =  isset($_POST['webLink']) ? $_POST['webLink'] : '';

      // get bar association id
      $barassocs  =  isset($_POST['barassocs']) ? $_POST['barassocs'] : '';

      //   $servername = "localhost";
      //   $username = "notifications_db";
      //   $password = "notifications_db";
      //   $dbname = "notifications_db";

      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "notifications_db";

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
                
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      } 

      $sql = "SELECT id,fcm_token FROM dt_lawyers WHERE barassociation_id =  $barassocs LIMIT 1";
      $result = mysqli_query($conn,$sql);

      $column = array();
      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            $column[] = $row['fcm_token'];
          }
      }
      else {
          echo "No Lawyers found under selected bar association";
      }
      $conn->close();

      $push->setTitle($title);
      $push->setMessage($message);
      if (!empty($_FILES['uploadimage']['name'])) {
          $push->setImage($image_path);
      } else {
          $push->setImage('');
      }
      $push->setIsBackground(TRUE);
      //  $push->setPayload($payload);


      $json = '';
      $response = '';

      if ($push_type == 'topic') {
          $json = $push->getPush();
          $response = $firebase->sendToTopic('global', $json);
      } else if ($push_type == 'individual') {
          $json = $push->getPush();
          $response = $firebase->send("", $json);
      }
      ?>
        
      <div class="container">
        <div class="fl_window">
          <div>
            <text><center>Select Advocate</center></text>
            <img src="http://selectadvocate.com/images/icons/vin.png" width="150" alt="Firebase"/>
          </div><br/>
          <?php if ($json != '') { ?>
            <label><b>Request:</b></label>
            <div class="json_preview">
              <pre><?php echo json_encode($json) ?></pre>
            </div>
          <?php } ?><br/>
          <?php if ($response != '') { ?>
            <label><b>Response:</b></label>
            <div class="json_preview">
              <pre><?php echo json_encode($response) ?></pre>
            </div>
          <?php } ?>
        </div>
    <?php }?>
        
    <div class="container">
      <form class="pure-form pure-form-stacked" method="post" enctype="multipart/form-data">
        <fieldset>
          <legend>Send to Firebase Notifications to Bar Associations</legend>
          <label for="selectbarassoc">Select Bar Association</label>
                  
          <?php                    
          //   $servername = "localhost";
          //   $username = "notifications_db";
          //   $password = "notifications_db";
          //   $dbname = "notifications_db";

          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "notifications_db";

          // Create connection
          $conn = new mysqli($servername, $username, $password, $dbname);
          // Check connection
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          } 

          $sql = "SELECT id,name FROM dt_barassociations";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
          // output data of each row
          // intiate dropdown 
          $select= '<select name="barassocs" id="barassocs">';
          while($row = $result->fetch_assoc()) {
            //  echo "id: " . $row["id"]. " - Name: " . $row["court_name"];
            $select.='<option value="'.$row['id'].'">'.$row['name'].'</option>';
          }
          $select.='</select>';
          echo $select;
          }
          else {
              echo "0 results";
          }
          $conn->close();
          ?>                  

          <label for="title">Title</label>
          <input type="text" id="title" name="title" class="pure-input-1-2" placeholder="Enter Notification title">

          <label for="Website Link">Website Link</label>
          <input type="text" id="webLink" name="webLink" class="pure-input-1-2" placeholder="Enter link here">

          <label for="message">Message</label>
          <textarea class="pure-input-1-2" rows="5" name="message" id="message" placeholder="Notification message!"></textarea>
          
          <label for="image">Choose Image</label>
          <input type="file" id="uploadimage" name="uploadimage" class="pure-input-1-2">

          <!-- <label for="include_image" class="pure-checkbox">
              <input name="include_image" id="include_image" type="checkbox"> Include image
          </label> -->
          
          <br>
          <input type="hidden" name="push_type" value="individual"/>
          <button type="submit" name="submit" id="submit" class="pure-button pure-button-primary btn_send">Send</button>
        </fieldset>
      </form>
      <br/><br/><br/><br/>

    </div>
  </body>
</html>
