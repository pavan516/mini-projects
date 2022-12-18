<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>ARCHIVE E-TECH</title>

  <!-- Header Links -->
  <?php include_once("includes/headerlinks.php"); ?>
  <!-- Header Links -->
</head>

<!-- Body Started -->
<body class="grey lighten-3">
  
  <!--Main Navigation-->
  <header>
    <?php include_once("includes/headers.php"); ?>
  </header>

  <!--Main layout-->
  <main class="pt-5 mx-lg-5">

    <!-- Points To Remember Posts -->
    <div class="container-fluid mt-5">
      <div class="row wow fadeIn">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h3 style="text-align:center">List of points to remember <b>Posts</b></h3>
              <ul>
                <li><b>Branch</b> is used to filter the type of <b>subject</b>.</li>
                <li><b>Subject</b> is used to filter the type of <b>post</b>.</li>
                <li>If we don't assign a branch/subject to the post, Then it is treated as <b>general</b>.</li>
                <li>Post title/image/short description is used to display on display page.</li>
                <li>NOTE: Youtube posts will not have details page.</li>
                <li>Post documents can be downloaded from display/details page.</li>
                <li>Image is used as meta icon & post image to display the post document in replace.</li>
                <li>If post type is selected as <b>DOCUMENTS</b> Document & Image is mandatory!</li>
                <li>If post type is selected as <b>YOUTUBE</b> Youtube url is mandatory!</li>
                <li>If post status is <b>ACTIVE</b> => The post is <b>published</b> & can be seen by all users.</li>
                <li>If post status is <b>DRAFT</b> => The post is <b>not published</b> & can be modified by admin.</li>
              </ul>
            </div>    
          </div>
        </div>
      </div>
    </div>

    <!-- Points To Remember Articles -->
    <div class="container-fluid mt-5">
      <div class="row wow fadeIn">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h3 style="text-align:center">List of points to remember <b>Articles</b></h3>
              <ul>
                <li><b>Branch</b> is used to filter the type of <b>subject</b>.</li>
                <li><b>Subject</b> is used to filter the type of <b>article</b>.</li>
                <li>If we don't assign a branch/subject to the article, Then it is treated as <b>general</b>.</li>
                <li>Article title is used to display on display page.</li>
                <li>Article short description is used for meta description & meta tags.</li>
                <li>Article description is shown in details of article page.</li>
                <li>Image is used as meta icon & article image to display the article content.</li>
                <li>If article status is <b>ACTIVE</b> => The article is <b>published</b> & can be seen by all users.</li>
                <li>If article status is <b>DRAFT</b> => The article is <b>not published</b> & can be modified by admin.</li>
              </ul>
            </div>    
          </div>
        </div>
      </div>
    </div>

    <!-- Points To Remember Notifications -->
    <div class="container-fluid mt-5">
      <div class="row wow fadeIn">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h3 style="text-align:center">List of points to remember <b>Notifications</b></h3>
              <ul>
                <li>Categories are used to filter the type of <b>Notifications</b>.</li>
                <li>When a notification is created => <b>The notification title & link is sent to subscribers through email</b>.</li>
                <li>Title explains the title of the notification published.</li>
                <li>Description is used to explain the complete details of the notification.</li>
                <li>If notification status is <b>ACTIVE</b> => The notification is <b>published</b>.</li>
                <li>If article status is <b>DRAFT</b> => The notification is <b>not published</b> & can be modified by admin.</li>
              </ul>
            </div>    
          </div>
        </div>
      </div>
    </div>

    <!-- Points To Remember Category -->
    <div class="container-fluid mt-5">
      <div class="row wow fadeIn">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h3 style="text-align:center">List of points to remember <b>Categories</b></h3>
              <ul>
                <li>Category Name: This is used to categorise the <b>Notifications</b>.</li>
                <li>Category Name must be unique & its mandatory</li>
                <li>Category code can be <b>empty / any unique code</b> to identify</li>
                <li>If category name = <b>pavan kumar</b> || category code should be <b>PAVAN_KUMAR</b></li>
                <li>If category code is left empty --- <b>i will handle to create a code based on name</b></li>
                <li>While deleting a category, <b>make sure no notifications are assigned</b> to the category</b></li>
              </ul>
            </div>    
          </div>
        </div>
      </div>
    </div>

    <!-- Points To Remember Branch -->
    <div class="container-fluid mt-5">
      <div class="row wow fadeIn">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h3 style="text-align:center">List of points to remember <b>Branches</b></h3>
              <ul>
                <li>Branch Name: This is used to categorise the <b>Subjects</b>.</li>
                <li>Branch Name must be unique & its mandatory</li>
                <li>Branch code can be <b>empty / any unique code</b> to identify</li>
                <li>If Branch name = <b>pavan kumar</b> || branch code should be <b>PAVAN_KUMAR</b></li>
                <li>If branch code is left empty --- <b>i will handle to create a code based on name</b></li>
                <li>While deleting a branch, <b>make sure no articles, pdf's, doc's, youtube's are assigned</b> to the branch</b></li>
              </ul>
            </div>    
          </div>
        </div>
      </div>
    </div>

    <!-- Points To Remember Subjects -->
    <div class="container-fluid mt-5">
      <div class="row wow fadeIn">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h3 style="text-align:center">List of points to remember <b>Subjects</b></h3>
              <ul>
                <li>Map a subject to a branch || so all subjects are under mapped branches</li>
                <li>Subject Name: This is used to categorise the <b>Articles | PDF | DOC | YOUTUBE</b>.</li>
                <li>Subject Name must be unique & its mandatory</li>
                <li>Subject code can be <b>empty / any unique code</b> to identify</li>
                <li>If Subject name = <b>pavan kumar</b> || subject code should be <b>PAVAN_KUMAR</b></li>
                <li>If Subject code is left empty --- <b>i will handle to create a code based on name</b></li>
                <li>While deleting a subject, <b>make sure no articles, pdf's, doc's, youtube's are assigned</b> to the subject</b></li>
              </ul>
            </div>    
          </div>
        </div>
      </div>
    </div>

  </main>
  <!--Main layout-->
              
  <!-- Footer & Scripts -->
  <?php include_once("includes/footer.php"); ?>
  <!-- Footer & Scripts -->
  
</body>
<!-- End Of Body -->
</html>