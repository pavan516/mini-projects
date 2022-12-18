<head>
    <title>Event Management</title>

    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name = "format-detection" content = "telephone=no" />

    <!-- Icon -->
    <link rel="icon" href="assets/images/logo.png">
    <link rel="shortcut icon" href="assets/images/logo.png" />

    <!-- CSS links -->
    <link rel="stylesheet" href="assets/css/stuck.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/touchTouch.css">
    
    <!-- Js Links -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-migrate-1.1.1.js"></script>
    <script src="assets/js/script.js"></script> 
    <script src="assets/js/superfish.js"></script>
    <script src="assets/js/jquery.equalheights.js"></script>
    <script src="assets/js/jquery.mobilemenu.js"></script>
    <script src="assets/js/jquery.easing.1.3.js"></script>
    <script src="assets/js/tmStickUp.js"></script>
    <script src="assets/js/jquery.ui.totop.js"></script>
    <script src="assets/js/touchTouch.jquery.js"></script>

    <script>
    $(document).ready(function(){

    $().UItoTop({ easingType: 'easeOutQuart' });
    $('#stuck_container').tmStickUp({});
    $('.gallery .gall_item').touchTouch();

    }); 
    </script>
</head>