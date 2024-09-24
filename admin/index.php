<?php
include "database.php";


$connnection = new database();

$name = array(
    "name"=>"Vikash Shukla",
    "email"=>"divakarpm@gmail.com",
    "phone"=> "9654386933"
);
$connnection->update("customers", $name, "sssi", 2, "customer_id");
// $connnection->insert("customers", $name, "sss",);
echo "<br>";

// if(isset($_POST["submit"])){
// echo gettype($_POST["di"]);

// $string = "abc";
// $int_value = intval($string);  // Converts "123abc" to 123
// echo $int_value;               // Output: 123

// }


// $connnection->delete("customers", "3", "customer_id")

$connnection->select("customers")

?>

