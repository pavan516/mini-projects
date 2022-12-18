<?php
# Init var
$dashboad = "";
$branches = "";
$classes = "";
$sections ="";
$subjects = "";
$users = "";
$homeworks = "";
$posts = "";

# verify page
if($page == "dashboard") {
  $dashboad = "active";
} else if($page == "branches") {
  $branches = "active";
} else if($page == "classes") {
  $classes = "active";
} else if($page == "sections") {
  $sections = "active";
} else if($page == "subjects") {
  $subjects = "active";
} else if($page == "users") {
  $users = "active";
} else if($page == "homeworks") {
  $homeworks = "active";
} else if($page == "posts") {
  $posts = "active";
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

        <?php if($this->session->userdata('role') == "SUPER_ADMIN" || $this->session->userdata('role') == "ADMIN") { ?>
          <!-- Dashboard -->        
          <li class="nav-item <?php echo $dashboad; ?>">
            <a href="<?php echo base_url();?>admin/dashboard" class="nav-link waves-effect">DASHBOARD
            </a>
          </li>
          <!-- Dashboard -->
        <?php } ?>
      
        <?php if($this->session->userdata('role') == "SUPER_ADMIN") { ?>
          <!-- Branches -->        
          <li class="nav-item <?php echo $branches; ?>">
            <a href="<?php echo base_url();?>admin/branches" class="nav-link waves-effect">BRANCHES
            </a>
          </li>
          <!-- Branches -->
        <?php } ?>

        <?php if($this->session->userdata('role') == "SUPER_ADMIN") { ?>
          <!-- Classes -->        
          <li class="nav-item <?php echo $classes; ?>">
            <a href="<?php echo base_url();?>admin/classes" class="nav-link waves-effect">CLASSES
            </a>
          </li>
          <!-- Classes -->
        <?php } ?>

        <?php if($this->session->userdata('role') == "SUPER_ADMIN" || $this->session->userdata('role') == "ADMIN") { ?>
          <!-- Sections -->        
          <li class="nav-item <?php echo $sections; ?>">
            <a href="<?php echo base_url();?>admin/sections" class="nav-link waves-effect">SECTIONS
            </a>
          </li>
          <!-- Sections -->
        <?php } ?>

        <?php if($this->session->userdata('role') == "SUPER_ADMIN") { ?>
          <!-- Subjects -->        
          <li class="nav-item <?php echo $subjects; ?>">
            <a href="<?php echo base_url();?>admin/subjects" class="nav-link waves-effect">SUBJECTS
            </a>
          </li>
          <!-- Subjects -->
        <?php } ?>

        <?php if($this->session->userdata('role') == "SUPER_ADMIN" || $this->session->userdata('role') == "ADMIN") { ?>
          <!-- Users -->        
          <li class="nav-item <?php echo $users; ?>">
            <a href="<?php echo base_url();?>admin/users" class="nav-link waves-effect">USERS
            </a>
          </li>
          <!-- Users -->
        <?php } ?>

        <?php if($this->session->userdata('role') == "SUPER_ADMIN" || $this->session->userdata('role') == "ADMIN") { ?>
          <!-- Homeworks -->        
          <li class="nav-item <?php echo $homeworks; ?>">
            <a href="<?php echo base_url();?>admin/homeworks" class="nav-link waves-effect">HOME WORKS
            </a>
          </li>
          <!-- Homeworks -->
        <?php } ?>

        <?php if($this->session->userdata('role') == "SUPER_ADMIN" || $this->session->userdata('role') == "ADMIN") { ?>
          <!-- Posts -->        
          <li class="nav-item <?php echo $posts; ?>">
            <a href="<?php echo base_url();?>admin/posts" class="nav-link waves-effect">POSTS
            </a>
          </li>
          <!-- Posts -->
        <?php } ?>

      </ul>
      <!-- Left -->

      <!-- Right -->
      <ul class="navbar-nav nav-flex-icons">
        <!-- Logout -->
        <li class="nav-item">
          <a href="<?php echo base_url();?>logout" class="nav-link border border-light rounded waves-effect">
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

  <a href="<?php echo base_url();?>" class="logo-wrapper waves-effect">
    <strong><b>LORDS E-LEARN</b></strong>
  </a>

  <div class="list-group list-group-flush">
  
    <?php if($this->session->userdata('role') == "SUPER_ADMIN") { ?>
      <a href="<?php echo base_url();?>admin/branches" class="list-group-item waves-effect <?php echo $branches; ?>">
        <i class="fas fa-money-bill mr-3"></i>BRANCHES
      </a>
    <?php } ?>

    <?php if($this->session->userdata('role') == "SUPER_ADMIN") { ?>
      <a href="<?php echo base_url();?>admin/classes" class="list-group-item waves-effect <?php echo $classes; ?>">
        <i class="fas fa-money-bill mr-3"></i>CLASSES
      </a>
    <?php } ?>

    <?php if($this->session->userdata('role') == "SUPER_ADMIN" || $this->session->userdata('role') == "ADMIN") { ?>
      <a href="<?php echo base_url();?>admin/sections" class="list-group-item waves-effect <?php echo $sections; ?>">
        <i class="fas fa-money-bill mr-3"></i>SECTIONS
      </a>
    <?php } ?>

    <?php if($this->session->userdata('role') == "SUPER_ADMIN") { ?>
      <a href="<?php echo base_url();?>admin/subjects" class="list-group-item waves-effect <?php echo $subjects; ?>">
        <i class="fas fa-money-bill mr-3"></i>SUBJECTS
      </a>
    <?php } ?>

    <?php if($this->session->userdata('role') == "SUPER_ADMIN" || $this->session->userdata('role') == "ADMIN") { ?>
      <a href="<?php echo base_url();?>admin/users" class="list-group-item waves-effect <?php echo $users; ?>">
        <i class="fas fa-users mr-3"></i>USERS
      </a>
    <?php } ?>

    <?php if($this->session->userdata('role') == "SUPER_ADMIN" || $this->session->userdata('role') == "ADMIN") { ?>
      <a href="<?php echo base_url();?>admin/homeworks" class="list-group-item waves-effect <?php echo $homeworks; ?>">
        <i class="fas fa-book mr-3"></i>HOME WORKS
      </a>
    <?php } ?>

    <?php if($this->session->userdata('role') == "SUPER_ADMIN" || $this->session->userdata('role') == "ADMIN") { ?>
      <a href="<?php echo base_url();?>admin/posts" class="list-group-item waves-effect <?php echo $posts; ?>">
        <i class="fa fa-address-card mr-3"></i>POSTS
      </a>
    <?php } ?>

  </div>

</div>
<!-- Sidebar -->
