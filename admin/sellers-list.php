<?php
   include "common.php";
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
        <section class="content-main">
            <div class="content-header">
                <h2 class="content-title">Sellers list</h2>
                <div>
                    <a href="#" class="btn btn-primary"><i class="material-icons md-plus"></i> Create new</a>
                </div>
            </div>
            <div class="card mb-4">
                <header class="card-header">
                    <div class="row gx-3">
                        <div class="col-lg-4 col-md-6 me-auto">
                            <input type="text" placeholder="Search..." class="form-control">
                        </div>
                        <div class="col-lg-2 col-md-3 col-6">
                            <select class="form-select">
                                <option>Status</option>
                                <option>Active</option>
                                <option>Disabled</option>
                                <option>Show all</option>
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-3 col-6">
                            <select class="form-select">
                                <option>Show 20</option>
                                <option>Show 30</option>
                                <option>Show 40</option>
                            </select>
                        </div>
                    </div>
                </header> <!-- card-header end// -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Seller</th>
                                    <th>Phone No.</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Registered</th>
                                    <th class="text-end"> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td width="30%">
                                        <a href="#" class="itemside">
                                            <div class="left">
                                                <img src="assets/imgs/people/avatar1.jpg" class="img-sm img-avatar" alt="Userpic">
                                            </div>
                                            <div class="info pl-3">
                                                <h6 class="mb-0 title">Eleanor Pena</h6>
                                                <small class="text-muted">Seller ID: #439</small>
                                            </div>
                                        </a>
                                    </td>                               </small>
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                    </td>
                                    <td>eleanor2022@example.com</td>
                                    <td><span class="badge rounded-pill alert-success">Active</span></td>
                                    <td>08.07.2022</td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-brand rounded font-sm mt-15">View details</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table> <!-- table-responsive.// -->
                    </div>
                </div> <!-- card-body end// -->
            </div> <!-- card end// -->
            <div class="pagination-area mt-15 mb-50">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-start">
                        <li class="page-item active"><a class="page-link" href="#">01</a></li>
                        <li class="page-item"><a class="page-link" href="#">02</a></li>
                        <li class="page-item"><a class="page-link" href="#">03</a></li>
                        <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                        <li class="page-item"><a class="page-link" href="#">16</a></li>
                        <li class="page-item"><a class="page-link" href="#"><i class="material-icons md-chevron_right"></i></a></li>
                    </ul>
                </nav>
            </div>
        </section> <!-- content-main end// -->
        <?php
        include("footer.php");
        ?>
</body>

</html>