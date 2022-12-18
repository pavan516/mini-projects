<?php
# Init var
$dashboad = "";
$posts = "";
$articles = "";
$notifications = "";
$categories = "";
$branches = "";
$materials = "";
$subjects = "";
$instructions = "";

# verify page
if($page == "dashboard") {
  $dashboad = "active";
} else if($page == "posts") {
  $posts = "active";
} else if($page == "articles") {
  $articles = "active";
} else if($page == "notifications") {
  $notifications = "active";
} else if($page == "categories") {
  $categories = "active";
} else if($page == "branches") {
  $branches = "active";
} else if($page == "materials") {
  $materials = "active";
} else if($page == "subjects") {
  $subjects = "active";
} else if($page == "instructions") {
  $instructions = "active";
}
?>

<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
  <div class="container-fluid">

    <!-- Collapse -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Topbar -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <!-- Left -->
      <ul class="navbar-nav mr-auto">

        <!-- Home -->        
        <li class="nav-item <?php echo $dashboad; ?>">
          <a href="<?php echo base_url();?>admin" class="nav-link waves-effect">DASHBOARD
          </a>
        </li>
        <!-- Home -->

        <!-- Posts -->        
        <li class="nav-item <?php echo $posts; ?>">
          <a href="<?php echo base_url();?>admin/posts" class="nav-link waves-effect">POSTS
          </a>
        </li>
        <!-- Posts -->

        <!-- Articles -->        
        <li class="nav-item <?php echo $articles; ?>">
          <a href="<?php echo base_url();?>admin/articles" class="nav-link waves-effect">ARTICLES
          </a>
        </li>
        <!-- Articles -->

        <!-- Notifications -->        
        <li class="nav-item <?php echo $notifications; ?>">
          <a href="<?php echo base_url();?>admin/notifications" class="nav-link waves-effect">NOTIFICATIONS
          </a>
        </li>
        <!-- Notifications -->

        <!-- Categories -->        
        <li class="nav-item <?php echo $categories; ?>">
          <a href="<?php echo base_url();?>admin/categories" class="nav-link waves-effect">CATEGORIES
          </a>
        </li>
        <!-- Categories -->

        <!-- Branches -->        
        <li class="nav-item <?php echo $branches; ?>">
          <a href="<?php echo base_url();?>admin/branches" class="nav-link waves-effect">BRANCHES
          </a>
        </li>
        <!-- Branches -->

        <!-- Materials -->        
        <li class="nav-item <?php echo $materials; ?>">
          <a href="<?php echo base_url();?>admin/materials" class="nav-link waves-effect">MATERIALS
          </a>
        </li>
        <!-- Materials -->

        <!-- Subjects -->        
        <li class="nav-item <?php echo $subjects; ?>">
          <a href="<?php echo base_url();?>admin/subjects" class="nav-link waves-effect">SUBJECTS
          </a>
        </li>
        <!-- Subjects -->

      </ul>
      <!-- Left -->

      <!-- Right -->
      <ul class="navbar-nav nav-flex-icons">
        <!-- Logout -->
        <li class="nav-item">
          <a href="<?php echo base_url();?>Administrator/Logout" class="nav-link border border-light rounded waves-effect">
            LOGOUT
          </a>
        </li>
        <!-- Logout -->
      </ul>
      <!-- Right -->

    </div>
    <!-- Topbar -->

  </div>
</nav>
<!-- Navbar -->

<!-- Sidebar -->
<div class="sidebar-fixed position-fixed">

  <a class="logo-wrapper waves-effect">
    <strong><b>ARCHIVE E-TECH</b></strong>
  </a>

  <div class="list-group list-group-flush">    
    <a href="<?php echo base_url();?>admin/posts" class="list-group-item waves-effect <?php echo $posts; ?>">
      <i class="fa fa-address-card mr-3"></i>POSTS
    </a>
    <a href="<?php echo base_url();?>admin/articles" class="list-group-item waves-effect <?php echo $articles; ?>">
      <i class="fas fa-table mr-3"></i>ARTICLES
    </a>
    <a href="<?php echo base_url();?>admin/notifications" class="list-group-item waves-effect <?php echo $notifications; ?>">
      <i class="fas fa-bell mr-3"></i>NOTIFICATIONS
    </a>
    <a href="<?php echo base_url();?>admin/categories" class="list-group-item waves-effect <?php echo $categories; ?>">
      <i class="fas fa-money-bill mr-3"></i>CATEGORIES
    </a>
    <a href="<?php echo base_url();?>admin/branches" class="list-group-item waves-effect <?php echo $branches; ?>">
      <i class="fas fa-money-bill mr-3"></i>BRANCHES
    </a>
    <a href="<?php echo base_url();?>admin/materials" class="list-group-item waves-effect <?php echo $materials; ?>">
      <i class="fas fa-money-bill mr-3"></i>MATERIALS
    </a>
    <a href="<?php echo base_url();?>admin/subjects" class="list-group-item waves-effect <?php echo $subjects; ?>">
      <i class="fas fa-money-bill mr-3"></i>SUBJECTS
    </a>
    <a href="<?php echo base_url();?>admin/instructions" class="list-group-item waves-effect <?php echo $instructions; ?>">
      <i class="fa fa-info-circle mr-3"></i>INSTRUCTIONS
    </a>
  </div>

</div>
<!-- Sidebar -->
