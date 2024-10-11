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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
                    <form id="try_uplaod" enctype="multipart/from-data"   >
                        <div class="mb-3">
                            <label class="form-label ps-2">Name</label>
                            <input class="form-control" placeholder="Your Name" type="text" id="seller_name"        >
                        </div> <!-- form-group// -->
                        <div class="mb-3">
                            <div class="row gx-2">
                                <div class="col-sm-6 pb-4 pb-sm-0"> 
                                    <label class="form-label ps-2">Email</label>
                                    <input class="form-control"  type="email" placeholder="Email" id="seller_email"        >
                                 </div>
                                <div class="col-sm-6 ">
                                      <label class="form-label ps-2">Phone</label>
                                     <input class="form-control" placeholder="Phone" type="phone" id="seller_phone"        > 
                                    </div>
                            </div>
                        </div> <!-- form-group// -->
                        <div class="mb-3">
                        <div class="row gx-2">
                               
                                <div class="col-sm-6 ">
                                      <label class="form-label ps-2">Address (Optional)</label>
                                     <input class="form-control" placeholder="Address" type="text" id="seller_address"> 
                                </div>
                                <div class="col-sm-6 pb-4 pb-sm-0"> 
                                    <label class="form-label ps-2">Company Name</label>
                                    <input class="form-control"  type="text" placeholder="Compnay Name" id="company_name">
                                 </div>
                            </div>
                        </div> <!-- form-group// -->
                        
                        <div class="mb-3">
                        <div class="row gx-2">
                                <div class="col-sm-6 pb-4 pb-sm-0"> 
                                    <label class="form-label ps-2">Number Of Product</label>
                                    <input class="form-control"  type="text" placeholder="Number Of Product" id="number_product">
                                 </div>
                                <div class="col-sm-6 ">
                                <label class="form-label ps-2">Product Category (Optional)</label>
                                <input class="form-control" placeholder="Your Product Category" type="text" id="product_category">
                                    </div>
                            </div>
                        </div> <!-- form-group// -->
                        <div class="mb-3">
                        <div class="row gx-2">
                                <div class="col-sm-6 pb-4 pb-sm-0"> 
                                    <label class="form-label ps-2">Username</label>
                                    <input class="form-control"  type="text" placeholder="Username" id="username"        >
                                 </div>
                                <div class="col-sm-6 ">
                                   <label class="form-label ps-2">Password</label>
                                   <input class="form-control" placeholder="Password" type="Password" id="password"        >
                                </div>
                            </div>
                        </div> <!-- form-group// -->
                        <div class="mb-3">
                        <label class="form-label ps-2">Company Logo</label>
                        <input class="form-control" type="file" name="images[]" id="imageUpload" accept="image/*"  style="border:2px dotted black" multiple> 
                            
                        </div>
                        <div class="mb-3">
                        </div> <!-- form-group  .// -->
                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary w-100" name="add-seller" > Submit </button>
                        </div> <!-- form-group// -->
                    </form>
                    <div class="success_warning"></div>
                    <div class="error_warning alert-danger alert"></div>
                </div>
            </div>
        </section>
        <?php
        include("footer.php");

        ?>
</body>

</html>