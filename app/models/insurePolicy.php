
<?php

class InsurePolicy  extends Models{
    private $conn;
    private $table="insurance_policy";

    public function __construct(){
        $this->conn=$this->dataConnect();
    }
    public function read(){

    }
    public function getAll(){
        $stmt= $this->conn->prepare("select * from $this->table");
        
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>