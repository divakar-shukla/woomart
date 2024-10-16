<?php
class database{

    private $db_host = "localhost";
    private $username = "root";
    private $password = "";
    private $db_name = "user";

    private $is_connect = false;
    private $result = array();
    private $mysqli = "";


    public function __construct(){
        if(!$this->is_connect){
            $this->mysqli = new mysqli($this->db_host, $this->username, $this->password, $this->db_name);
            if(!$this->mysqli ){
                if($this->mysqli->connect_errno > 0){
                    array_push($this->result, $this->mysqli->connect_errno );
                    return false;
                }
            }else{
            //  echo "connected";
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
           echo "Table not found";
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
    echo $this->mysqli->insert_id;
    return true; 
   }else{
    array_push($this->result, $this->mysqli->error);
    return false;
   }

 }
}

public function update($table, $param = array(), $type_code, $where = null){
if($this->table_exist($table,)){

    $placeholder_arr = array();
    $upadate_var = array();
    $column_name = implode(", ", array_keys($param));

    foreach($param as $key=>$value){
        array_push($placeholder_arr, " ?");
       $set = "$key = ' ? '";
       array_push($upadate_var, $set);
        
    }
    $upadate_var = implode(", ", $upadate_var); 
    echo $upadate_var;
    $sqli = "UPDATE customers SET ";

}

}

}



?>