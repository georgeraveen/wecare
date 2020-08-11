
<?php

class Employee{
    private $conn;
    private $table="employee";

    public function __construct($db){
        $this->conn=$db;
        // var_dump($this->conn);
    }
    public function read(){

    }
    public function getEmpByType($empType){
        $stmt= $this->conn->prepare("select * from $this->table where empTypeID = :empType ");
        $stmt -> bindParam(':empType',$empType);

        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getEmpByTypeList($empType){
        $stmt= $this->conn->prepare("select empID,empFirstName,empLastName from $this->table where empTypeID = :empType ");
        $stmt -> bindParam(':empType',$empType);

        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>