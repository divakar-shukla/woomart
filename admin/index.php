<?php
   session_start();
    if(isset($_SESSION["admin_name"])){
        header("location: http://localhost/woomart/admin/dashboard.php");
    }
 ?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Evara Dashboard</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/theme/favicon.svg">
    <!-- Template CSS -->
    <link href="assets/css/main.css" rel="stylesheet" type="text/css" />
</head>

<body>


    <main>
       <?php
        include_once("header.php");

         ?>
     
        <section class="content-main mt-10 mb-10">
            <div class="card mx-auto card-login">
                <div class="card-body">
                    <h3 class="card-title mb-4 text-center">Login</h3>
                    <form id="adminLogin" method ="POST" autocomplete="off">
                        <div class="mb-3">
                            <input class="form-control" placeholder="Username or email" type="text" id="login_username">
                        </div> <!-- form-group// -->
                        <div class="mb-3">
                            <input class="form-control" placeholder="Password" type="password" id="login_password">
                        </div> <!-- form-group// -->
                        <div class="mb-3">
                            <a href="#" class="float-end font-sm text-muted">Change password?</a>
                          
                        </div> <!-- form-group form-check .// -->
                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary w-100 n" value="submit"> Login </button>
                        </div> <!-- form-group// -->
                    </form>
                    <div class="success_warning"></div>
                    <div class="error_warning"></div>
                </div>
            </div>
        </section>
        
        
    </main>
    <script src="assets/js/vendors/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendors/bootstrap.bundle.min.js"></script>
    <script src="assets/js/vendors/jquery.fullscreen.min.js"></script>
    <!-- Main Script -->
    <script src="assets/js/main.js" type="text/javascript"></script>
    <script src="action/admin_action.js"></script>
</body>

</html>