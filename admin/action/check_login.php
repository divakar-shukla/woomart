<?php
include("database.php");
$connection = new database();

if(isset($_POST["login"])){
 
    if($_POST["user"] == "" || $_POST["pass"]== ""){
        echo json_encode(array("error"=>"Please fill all field.")); exit;
    }else{
   $user = $connection->escapeString($_POST["user"]);

   $password = md5($connection->escapeString($_POST["pass"]));

//    echo json_encode(array("name"=> $user, "pass"=>$password));

 $selection =  $connection->select("admin", " *", null, " password = '$password' AND EXISTS ( SELECT * FROM admin WHERE username = '$user' OR com_email = '$user')");
    
if(empty($connection->get_error())){
//    echo $result = json_encode($connection->get_result());
    $result = $connection->get_result();
}

}
}






?>