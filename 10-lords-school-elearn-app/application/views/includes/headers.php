<?php
# Init var
$videos = "";
$notes = "";
$notifications = "";
$homeworks = "";
$admin = "";

# verify page
if($page == "videos") {
  $videos = "active";
} else if($page == "notes") {
  $notes = "active";
} else if($page == "notifications") {
  $notifications = "active";
} else if($page == "homeworks") {
  $homeworks = "active";
} else if($page == "admin") {
  $admin = "active";
}
?>

<!-- Header -->
<header>

  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand waves-effect" href="<?php echo base_url(); ?>">
        <strong class="blue-text">LORDS E-LEARN</strong>
      </a>
      <!-- Brand -->

      <!-- Collapse -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Left -->
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?php echo $videos; ?>">
            <a class="nav-link waves-effect" href="<?php echo base_url(); ?>">VIDEOS</a>
          </li>
          <li class="nav-item <?php echo $notes; ?>">
            <a class="nav-link waves-effect" href="<?php echo base_url(); ?>notes">NOTES</a>
          </li>
          <li class="nav-item <?php echo $notifications; ?>">
            <a class="nav-link waves-effect" href="<?php echo base_url(); ?>notifications">NOTIFICATIONS</a>
          </li>
          <li class="nav-item <?php echo $homeworks; ?>">
            <a class="nav-link waves-effect" href="<?php echo base_url(); ?>homeworks">HOMEWORKS</a>
          </li>
          <?php if($this->session->userdata('role') == "SUPER_ADMIN" || $this->session->userdata('role') == "ADMIN") { ?>
            <li class="nav-item <?php echo $admin; ?>">
              <a class="nav-link waves-effect" href="<?php echo base_url(); ?>admin/dashboard">ADMIN DASHBOARD</a>
            </li>
          <?php } ?>
        </ul>
        <!-- Left -->

        <!-- Right -->
        <ul class="navbar-nav nav-flex-icons">
          <!-- Logout -->
          <li class="nav-item">
            <a href="<?php echo base_url();?>logout" class="nav-link border border-light rounded waves-effect" > LOGOUT </a>
          </li>
          <!-- Logout -->
        </ul>
        <!-- Right -->

      </div>
      <!-- Links -->

    </div>
  </nav>
  <!-- Navbar -->

</header>
<!-- Header -->