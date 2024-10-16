<?php
include("database.php");

$conection = new database();
if(isset($_POST["create"])){
    // print_r($_POST);
      $sellerName =  $conection->escapeString($_POST["seller_name"]);
      $sellerEmail = $conection->escapeString($_POST["seller_email"]);
      $sellerPhone = $conection->escapeString($_POST["seller_phone"]);
      $sellerAdress = $conection->escapeString($_POST["seller_address"]);
      $companyName =  $conection->escapeString($_POST["company_name"]);
      $productNumber = $conection->escapeString( $_POST["product_number"]);
      $productCategory =  $conection->escapeString($_POST["product_category"]);
      $sellerUsername = $conection->escapeString($_POST["seller_username"]);
      $sellerPassword = md5($conection->escapeString($_POST["seller_password"]));
      $uniq_file_name = null;
   
$conection->select("sellers", "*", null, "email = '$sellerEmail' OR username = '$sellerUsername' ");
$is_exists = $conection->get_result();
$error = $conection->get_error();
// print_r($is_exists);
if(!empty($is_exists) && empty($error)){
    if( $is_exists[0]["email"] == $sellerEmail && $is_exists[0]["username"] == $sellerUsername){
        echo json_encode(array(
           "status"=> "bothMatched", 
           "message" => "Your given username and email already used."
        ));exit;
    }elseif($is_exists[0]["username"] == $sellerEmail){
        echo json_encode(array(
            "status" => "username_matched", 
            "message" => "Your given username already used."));exit;
    }elseif($is_exists[0]["email"] == $sellerEmail){
        echo json_encode(array("status" => "emailMatch", 
        "message" => "Your given email already used."));exit;
    }
}elseif(empty($is_exists) && empty($error)){
    
    if(isset($_FILES["company_logo"])){
        if(substr(  $_FILES["company_logo"]["type"], 0, 5) == "image"){
            $file_name = str_replace(" ", "-",    $_FILES["company_logo"]["name"]);

            $file_tmp =   $_FILES["company_logo"]["tmp_name"];
            $uniq_file_name = uniqid() . "-" . $file_name;
            $target_file = "upload/". $uniq_file_name;
            move_uploaded_file($file_tmp, $target_file);
        }else{
             echo json_encode(array("status" => "Not Image", "message"=> "Please! Please upload only images."));exit;
           
        }
    }
    $params = [
        "name"=>$sellerName,
        "email"=>$sellerEmail,
        "phone"=>$sellerPhone,
        "company_name"=>$companyName,
        "address"=>$sellerAdress,
        "number_of_product"=>$productNumber,
        "product_category"=>$productCategory,
        "username"=>$sellerUsername,
        "password"=>$sellerPassword,
        "profile_image"=>$uniq_file_name];
    $conection->insert("sellers", $params, "sssssissss");
    $is_insert = $conection->get_result();
    $is_error = $conection->get_error();
    if(empty($is_error)){
        echo json_encode(array("status"=>"adSeller", "message"=>"Seller added successfuly"));
    }
}
}

if(isset($_POST["isSellerSearch"])){
    $seller_search_input = $conection->escapeString($_POST["searchInput"]);

    isset($_POST["selllerFilter"])? $seller_search_filter = $conection->escapeString($_POST["selllerFilter"]): $seller_search_filter = null;

    if($seller_search_filter != null){
    $search_where = "status = $seller_search_filter EXISTS(SELECT * FROM sellers WHERE name LIKE '$seller_search_input%' OR phone LIKE '$seller_search_input%' OR email LIKE '$seller_search_input%')";
    $conection->select("sellers", "*", null, $search_where, null, 20);
}else{
    $search_where = " name LIKE '$seller_search_input%' OR phone LIKE '$seller_search_input%' OR email LIKE '$seller_search_input%'";

    $conection->select("sellers", "*", null,  $search_where, null, 20);
  
}
$seller_search_result = $conection->get_result();
$is_search_error = $conection->get_error();
// $seller_search_sql = $conection->get_sql();
// array_push($seller_search_result, $seller_search_sql);
if(empty($seller_search_result)){
    echo json_encode([
        "status"=> "No record",
        "message"=> " No record found!"
    ]);
}elseif(empty($is_search_error) && !empty($seller_search_result)){
    echo json_encode([
        "status"=> "success",
        "message"=> $seller_search_result
    ]);
}
}

?>
