
<header class="main-header style-2 navbar">
            <div class="col-brand">
                <?php 
                if( !isset($_SESSION["admin_name"])){
                    echo '<a href="index.php" class="brand-wrap">
                    <h2>Woomart</h2> </a>';
 
                }
                ?>
             
            </div>
            <div class="col-nav">
                <ul class="nav">
                 
                    <li class="nav-item">
                        <a class="nav-link btn-icon darkmode" href="#"> <i class="material-icons md-nights_stay"></i> </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="requestfullscreen nav-link btn-icon"><i class="material-icons md-cast"></i></a>
                    </li>
                    
                    <li class="dropdown nav-item">
                    <?php
//    session_start();
    if(isset($_SESSION["admin_name"])){

        echo "<a class='dropdown-toggle' data-bs-toggle='dropdown' href='#' id='dropdownAccount' aria-expanded='false'>
         <img class='img-xs rounded-circle' src='assets/imgs/people/avatar2.jpg' alt='User'>";

    }else{

    }
 ?>                        
                        <!-- <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownAccount" aria-expanded="false"> <img class="img-xs rounded-circle" src="assets/imgs/people/avatar2.jpg" alt="User"></a> -->
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownAccount">
                            <div class='admin_name text-center bg-primary-light'><strong><?php echo $_SESSION['admin_name']; ?></strong></div>
                            <a class="dropdown-item" href="#"><i class="material-icons md-perm_identity"></i>Edit Profile</a>
                            <a class="dropdown-item" href="#"><i class="material-icons md-settings"></i>Account Settings</a>
                            <a class="dropdown-item" href="#"><i class="material-icons md-account_balance_wallet"></i>Wallet</a>
                            <a class="dropdown-item" href="#"><i class="material-icons md-receipt"></i>Billing</a>
                            <a class="dropdown-item" href="#"><i class="material-icons md-help_outline"></i>Help center</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="#"><i class="material-icons md-exit_to_app"></i>Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </header>