
<?php

class InsurePolicy  extends Models{
    private $conn;
    private $table="insurance_policy";
    private $policyID;
    private $date;
    private $remarks;
    private $vPremium;
    private $rPremium;

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
    public function setValue($date,$remarks,$vPremium,$rPremium){
        $this->date= $date;
        $this->remarks= $remarks;
        $this->vPremium= $vPremium;
        $this->rPremium= $rPremium;
    }
    public function create(){
        $stmt= $this->conn->prepare("insert into $this->table (date,remarks,vPremium,rPremium) 
                                                            values (:date, :remarks, :vPremium, :rPremium);");
        $stmt-> bindParam(':date', $this->date );
        $stmt-> bindParam(':remarks', $this->remarks );
        $stmt-> bindParam(':vPremium', $this->vPremium );
        $stmt-> bindParam(':rPremium', $this->rPremium );
        
        $stmt->execute();
        return $this->conn->lastInsertId();
    }
    public function getDetails($_id){
        $stmt= $this->conn->prepare("SELECT * from $this->table where policyID= $_id");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>