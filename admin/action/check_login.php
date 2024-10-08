<?php
include("database.php");
$connection = new database();

if(isset($_POST["login"])){
 
    if($_POST["user"] == "" || $_POST["pass"]== ""){
        echo json_encode(array("error"=>"Please fill all field.")); exit;
    }else{
   $user = $connection->escapeString($_POST["user"]);

   $password = md5($connection->escapeString($_POST["pass"]));

 $selection =  $connection->select("admin", " *", null, " password = '$password' AND EXISTS ( SELECT * FROM admin WHERE username = '$user' OR email = '$user')");
 $result = $connection->get_result();
 $errors = $connection->get_error();
if(empty($errors) && !empty($result)){
    global  $result;
    session_start();
    $_SESSION["admin_name"] = $result[0]["admin_name"];
    $_SESSION["admin_role"] = $result[0]["admin_role"];
    echo json_encode(array("success"=>"You have logged in succesfully")); exit;
}elseif(empty($errors) && empty($result)){
    echo json_encode(array("error"=>"You username and Password is not matched.")); exit;
}else{
    echo json_encode(array("error"=> $errors)); exit;
}

}
}






?>