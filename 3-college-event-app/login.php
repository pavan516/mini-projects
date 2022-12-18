<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Event Management</title>

    <!-- Scripts -->
    <script src="assets/js/app.js"></script>

    <!-- Icon -->
    <link rel="icon" href="assets/images/logo.png">
    <link rel="shortcut icon" href="assets/images/logo.png" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="assets/css/app.css" rel="stylesheet">
</head>

<!-- Body -->
<body>
    
    <!-- Navbar -->
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <b>EVENT MANAGEMENT</b>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto"></ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="login.php"><b>Login</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php"><b>Register</b></a>
                        </li>
                    </ul>
                    <!-- End Of Right Side Of Navbar -->
                </div>
            </div>
        </nav>        
    </div><br><br><br><br>
    <!-- End of Navbar -->

    <!-- Main Content -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    
                    <div class="card-header"><b>Login Here</b></div>
                    <div class="card-body">
                        <form method="POST" action="login_form.php">                        

                            <!-- Email Text Field -->
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">Email : </label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" placeholder="Email" required autofocus>
                                </div>
                            </div>

                            <!-- Password Text Field -->
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password :</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" placeholder="********" required>
                                </div>
                            </div>

                            <!-- Login Button -->
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" name="login" class="btn btn-primary">LOGIN</button>
                                </div>
                            </div>

                            <!-- Register Link -->
                            <center>New To Event Management <a class="btn btn-link" href="register.php">Register Here</a></center>

                        </form>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
    <!-- End of main content -->

</body>
</html>
<!-- End Of Body -->