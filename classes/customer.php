
<?php

class Customer{
    private $conn;
    private $table="customer";

    public function __construct($db){
        $this->conn=$db;
        // var_dump($this->conn);
    }
    public function read(){

    }
    public function getAll(){
        $stmt= $this->conn->prepare("select * from $this->table");
        
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getList(){
        $stmt= $this->conn->prepare("select custID, custName from $this->table");
        
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>