<?php
include "database.php";


$connnection = new database();

$name = array(
    "name"=>"Divakar Shukla",
    "email"=>"divakarshuklapm@gmail.com",
    "phone"=> "6394998090"
);
$connnection->update("customers", $name, "sss");
echo "<br>";

// if(isset($_POST["submit"])){
// echo gettype($_POST["di"]);

// $string = "abc";
// $int_value = intval($string);  // Converts "123abc" to 123
// echo $int_value;               // Output: 123

// }

?>

<form action="#" method="POST">
    <input type="number" name="di" id="">
    <input type="submit" value="" name="submit">
</form>