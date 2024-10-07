<?php
session_start();
// session_unset();    
if(!isset($_SESSION["admin_name"])){
    header("location: http://localhost/woomart/admin");
    exit();
}
?>