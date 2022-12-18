<?php
# Init var
$home = "";
$articles = "";
$notifications = "";

# verify page
if($page == "home") {
  $home = "active";
} else if($page == "articles") {
  $articles = "active";
} else if($page == "notifications") {
  $notifications = "active";
}
?>

<!-- Header -->
<header>

  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand waves-effect" href="<?php echo base_url(); ?>">
        <strong style="color:white;"><b>ARCHIVE E-TECH</b></strong>
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
          <li class="nav-item <?php echo $home; ?>">
            <a class="nav-link waves-effect" style="color:white;" href="<?php echo base_url(); ?>"><b>HOME</b></a>
          </li>
          <li class="nav-item <?php echo $articles; ?>">
            <a class="nav-link waves-effect" style="color:white;" href="<?php echo base_url(); ?>articles"><b>ARTICLES</b></a>
          </li>
          <li class="nav-item <?php echo $notifications; ?>">
            <a class="nav-link waves-effect" style="color:white;" href="<?php echo base_url(); ?>notifications"><b>NOTIFICATIONS</b></a>
          </li>
        </ul>
        <!-- Left -->

        <!-- Right -->
        <ul class="navbar-nav nav-flex-icons">
          <!-- Subscribe -->
          <!-- <li class="nav-item">
            <a class="nav-link border border-light rounded waves-effect" data-toggle="modal" data-target="#subscribeModel" data-backdrop="false"><i class="fa fa-bell"></i> SUBSCRIBE</a>
          </li> -->
          <!-- Subscribe -->
        </ul>
        <!-- Right -->

      </div>
      <!-- Links -->

    </div>
  </nav>
  <!-- Navbar -->

</header>
<!-- Header -->

<!-- Subscribers modal -->
<div class="modal fade right" id="subscribeModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-side modal-top-right modal-notify modal-success" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <p class="heading lead">Modal Success</p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
        <div class="text-center">
          <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit
            iusto nulla
            aperiam blanditiis ad consequatur in dolores culpa, dignissimos,
            eius
            non possimus fugiat. Esse ratione fuga, enim, ab officiis totam.
          </p>
        </div>
      </div>

      <!--Footer-->
      <div class="modal-footer justify-content-center">
        <a role="button" class="btn btn-success">Get it now
          <i class="far fa-gem ml-1"></i>
        </a>
        <a role="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">No,
          thanks</a>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!-- Subscribers modal -->