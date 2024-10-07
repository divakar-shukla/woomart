<?php
include "common.php";
if($_SESSION["admin_role"] != 1){
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
<div class="screen-overlay"></div>
    <?php
    include("aside.php")
    ?>
    <main class="main-wrap">
      <?php
      include "header.php"
      ?>
        <section class="content-main ">
            <div class="card mx-auto card-login">
                <div class="card-body">
                    <h4 class="card-title mb-4">Add Seller</h4>
                    <form id="add-admin">
                        <div class="mb-3">
                            <label class="form-label ps-2">Name</label>
                            <input class="form-control" placeholder="Your Name" type="text">
                        </div> <!-- form-group// -->
                        <div class="mb-3">
                            <div class="row gx-2">
                                <div class="col-sm-6 pb-4 pb-sm-0"> 
                                    <label class="form-label ps-2">Email</label>
                                    <input class="form-control"  type="email" placeholder="Email">
                                 </div>
                                <div class="col-sm-6 ">
                                      <label class="form-label ps-2">Phone</label>
                                     <input class="form-control" placeholder="Phone" type="phone"> 
                                    </div>
                            </div>
                        </div> <!-- form-group// -->
                        <div class="mb-3">
                        <div class="row gx-2">
                                <div class="col-sm-6 pb-4 pb-sm-0"> 
                                    <label class="form-label ps-2">Company Name</label>
                                    <input class="form-control"  type="text" placeholder="Compnay Name">
                                 </div>
                                <div class="col-sm-6 ">
                                      <label class="form-label ps-2">Adress</label>
                                     <input class="form-control" placeholder="Address" type="text"> 
                                    </div>
                            </div>
                        </div> <!-- form-group// -->
                        <div class="mb-3">
                        <div class="row gx-2">
                                <div class="col-sm-6 pb-4 pb-sm-0"> 
                                    <label class="form-label ps-2">Number Of Product</label>
                                    <input class="form-control"  type="text" placeholder="Number Of Product">
                                 </div>
                                <div class="col-sm-6 ">
                                      <label class="form-label ps-2">Company Logo</label>
                                     <input class="form-control" placeholder="" type="file" style="border:2px dotted black"> 
                                    </div>
                            </div>
                        </div> <!-- form-group// -->
                        <div class="mb-3">
                        </div> <!-- form-group  .// -->
                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary w-100"> Submit </button>
                        </div> <!-- form-group// -->
                    </form>
                  
                </div>
            </div>
        </section>
        <footer class="main-footer text-center">
            <p class="font-xs">
                <script>
                document.write(new Date().getFullYear())
                </script> ©, Evara - HTML Ecommerce Template .
            </p>
            <p class="font-xs mb-30">All rights reserved</p>
        </footer>
    </main>
    <script src="assets/js/vendors/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendors/bootstrap.bundle.min.js"></script>
    <script src="assets/js/vendors/jquery.fullscreen.min.js"></script>
    <!-- Main Script -->
    <script src="assets/js/main.js" type="text/javascript"></script>
</body>

</html>