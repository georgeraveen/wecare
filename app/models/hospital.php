
<?php

class Hospital{
    private $conn;
    private $table="hospital";

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
}
?>