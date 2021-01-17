
<?php

class HospitalView  extends Models{
    private $conn;
    private $table="hospital";

    public function __construct(){
        $this->conn=$this->dataConnect();
    }
    public function read(){

    }
    public function getAll(){
        $stmt= $this->conn->prepare("select name,hospitalContactNo,address from $this->table INNER JOIN hospital_contact on $this->table.hospitalID=hospital_contact.hospitalID");
        
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>