
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
    public function startTrans(){
        $this->conn->beginTransaction();
    }
    public function transCommit(){
        $this->conn->commit();
    }
    public function transRollBack(){
        $this->conn->rollBack();
    }

    public function getAll(){
        $stmt= $this->conn->prepare("select * from $this->table where status=1");
        
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
    public function update($_id){
        $stmt= $this->conn->prepare("update $this->table set date= :date, remarks= :remarks, vPremium= :vPremium, rPremium= :rPremium
                                                             where policyID = $_id ") ;

        $stmt -> bindParam(':date', $this->date );
        $stmt -> bindParam(':remarks', $this->remarks );
        $stmt -> bindParam(':vPremium', $this->vPremium );
        $stmt -> bindParam(':rPremium', $this->rPremium );
        $stmt->execute();

    }
    public function updateStatus($_id){
        $stmt= $this->conn->prepare("update $this->table set status= 0
                                                            where policyID = $_id ") ;   
        $stmt->execute();
    }
}
?>