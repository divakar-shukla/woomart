<?php
include("database.php");
$connection = new database();

if(isset($_POST["login"])){
 
    if($_POST["user"] == "" || $_POST["pass"]== ""){
        echo json_encode(array("error"=>"Please fill all field.")); exit;
    }elseif($_POST["userType"] == ""){
        echo json_encode(array("error"=>"Select user type")); exit;
    }else{
   $user = $connection->escapeString($_POST["user"]);
   $user_type = $connection->escapeString($_POST["userType"]);

   $password = md5($connection->escapeString($_POST["pass"]));
// echo $user_type;
// die();

 $selection =  $connection->select($user_type, " *", null, " password = '$password' AND EXISTS ( SELECT * FROM $user_type WHERE username = '$user' OR email = '$user')");
 $result = $connection->get_result();
//  print_r($result);
 $errors = $connection->get_error();
if(empty($errors) && !empty($result)){
    session_start();
    if($user_type == "admin"){
        $_SESSION["admin_name"] = $result[0]["admin_name"];
        $_SESSION["admin_role"] = $result[0]["admin_role"];        
    }else{
        $_SESSION["admin_name"] = $result[0]["name"];
        $_SESSION["admin_role"] = 0;
    }

    echo json_encode(array("success"=>"You have logged in succesfully")); exit;
}elseif(empty($errors) && empty($result)){
    echo json_encode(array("error"=>"You username and Password is not matched.")); exit;
}else{
    echo json_encode(array("error"=> $errors)); exit;
}

}
}


if(isset($_POST["logOut"])){
    session_start();
    session_unset();  
    echo json_encode(["status"=>"logout", "message"=>"You have logout."]);
}



?>