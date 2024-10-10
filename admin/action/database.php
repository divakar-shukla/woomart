<?php
class database{

    private $db_host = "localhost";
    private $username = "root";
    private $password = "";
    private $db_name = "shopping_db";

    private $is_connect = false;
    private $result = array();
    private $error = array();
    private $mysqli = "";
    private $final_sql = "";
    

    public function __construct(){
        if(!$this->is_connect){
            $this->mysqli = new mysqli($this->db_host, $this->username, $this->password, $this->db_name);
            if(!$this->mysqli ){
                if($this->mysqli->connect_errno > 0){
                    array_push($this->result, $this->mysqli->connect_errno );
                    return false;
                }
            }else{
         
             return true;  
            }
        } 
    }


    private function table_exist($table){
        $sqli = "SHOW TABLES FROM $this->db_name LIKE '$table'";
        $f_result =  $this->mysqli->query($sqli);
        $result = $f_result->fetch_all(MYSQLI_ASSOC);

        if(count($result) > 0){
            return true;
        }else{
        array_push($this->error, $this->mysqli->error);
            return false;
        }
    }
    

public function insert($table, $param = array(), $type_code){
    if($this->table_exist($table)){
    $placeholder_arr = array();
    $column_name = implode(", ", array_keys($param));
    foreach($param as $key=>$value){
        array_push($placeholder_arr, " ?");          
    }
    $placeholder = implode(", ", $placeholder_arr);
   $sqli = "INSERT INTO $table ($column_name) VALUES ($placeholder)";
   $prepare = $this->mysqli->prepare($sqli);
   $prepare->bind_param($type_code, ...array_values($param));
   if($prepare->execute()){
    array_push($this->result, $prepare->insert_id);

    return true; 
   }else{
    array_push($this->error, $this->mysqli->error);
    return false;
   }

 }
}

public function update($table, $param = array(), $type_code, $where = null, $whereColumn){
if($this->table_exist($table)){

    // $placeholder_arr = array();
    $upadate_var = array();
$placeholder_value = array_values($param);
array_push($placeholder_value, $where);

    $column_name = implode(", ", array_keys($param));

    foreach($param as $key=>$value){

        $set = "$key =  ? ";
        array_push($upadate_var, $set);
        
    }
    $upadate_vars = implode(", ", $upadate_var); 

   $sqli = "UPDATE $table SET $upadate_vars WHERE $whereColumn = ?"; 

   $prepare =  $this->mysqli->prepare($sqli);
//    print_r($placeholder_value);
   $prepare->bind_param($type_code, ...$placeholder_value); 

   $f_result =  $prepare->execute();
   if($f_result){
    array_push($this->result, $prepare->affected_rows);
    return true;
   }else{
    array_push($this->error, $this->mysqli->error);
    return false;
   }


}

}

public function delete($table, $where, $whereColumn ){

if($this->table_exist($table)){
    $sqli = "DELETE FROM $table WHERE $whereColumn = ?";
   $prepare = $this->mysqli->prepare($sqli);
   $prepare->bind_param("s", $where);
   $f_result = $prepare->execute();
   if($f_result){
    array_push($this->result, $prepare->affected_rows);
    return true;
   }else{
    array_push($this->error, $this->mysqli->error);
    return false;
   }
}

}


public function select($table, $column = " *", $join = null, $where = null, $order = null, $limit = null){
    if($this->table_exist($table)){
        $sql = "SELECT $column FROM $table";

        if($join != null){
            $sql .= " JOIN $join";
        }
        if($where != null){
            $sql .= " WHERE $where";
        }
        if($order != null){
            $sql .= " ORDER BY $order";
        }
        if($limit != null){
            if(!$_GET["page"]){
                $page = 1;
            }else{
                $page = $_GET["page"];
            }

            $start = ($page - 1) * $limit;

            $sql .= " LIMIT $start, $limit";
        }
        $this->final_sql = $sql;
       
       $query = $this->mysqli->query($sql);

       if($query){
        $this->result = $query->fetch_all(MYSQLI_ASSOC);
        // echo "yes";
        return true;
       }else{
        array_push($this->error, $this->mysqli->error);
        // echo "No"
        return false;
       }   
    }
} 

public function get_result(){
    $value = $this->result; 
    $this->result = array();
    // print_r($value);
    return $value;
}
public function get_error(){
    $value = $this->error; 
    $this->error = array();
    // print_r($value);
    return $value;
}

public function get_sql(){
    $value = $this->final_sql;
    $sql = "";
    return $value;
}

public function pagiantion($table, $where = null, $limit=null){
  
    if($this->table_exist($table)){
        $sql = "SELECT COUNT(*) AS numb FROM $table";
        if($where != null){
            $sql .= "WHERE = $where";
        }

        $query = $this->mysqli->query($sql);
        
        $total_row = $query->fetch_array()["numb"];

        $number_ofpage = ceil($total_row / $limit);
        $output = "<ul class='pagiantion'> ";
       
        // $page_number = $_GET["page"];
        if(isset($_GET["page"])){
            $page_number = $_GET["page"];
        }else{
            $page_number = 1;
        }
        for($i= 1; $i <= $number_ofpage; $i++){
         if($i == $page_number){
            $output .= "<li class='active_page'>$i</li>";
         }else{
            $output .= "<li>$i</li>";

         }


        }

        $output .= "</ul>";

        return $output;
    }
}


public function escapeString($data){
$data = trim($data);
$data = stripslashes($data);
// $data = htmlentities($data);
$data = htmlspecialchars($data);
return  $this->mysqli->real_escape_string($data);

}
public function __destruct(){
    if($this->is_connect){
        if($this->mysqli->close()){
            $this->conn = false;
            return true;
        }else{
            return false;
        }
    }
}

}

	


?>