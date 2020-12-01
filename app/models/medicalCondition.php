<?php
class medicalCondition extends Models{
    private $conn;
    private $table="med_record";
    private $custID;
    private $recordID;
    private $date;
    private $type;
    private $healthCondition;
    private $comments;

    public function __construct(){
        $this->conn=$this->dataConnect();
    }
    public function read(){

    }
    public function setValue($PcustomerID,$PmedDate,$Ptype,$PhealthCondition,$Pcomments){
        // echo $PadmitDate;
        $this->custID=$PcustomerID;
        $this->healthCondition= !empty($PhealthCondition) ? $PhealthCondition : null;
        $this->date=$PmedDate;
        $this->type=$Ptype;
        $this->comments=$Pcomments;    
    }
    public function create(){
        $stmt= $this->conn->prepare("insert into $this->table (custID,date,type,healthCondition,comments)
                                                            values (:custID, :date, :type, :healthCondition, :comments)");
        $stmt -> bindParam(':custID', $this->custID);
        $stmt -> bindParam(':date', $this->date); 
        $stmt -> bindParam(':type', $this->type);
        $stmt -> bindParam(':healthCondition', $this->healthCondition);
        $stmt -> bindParam(':comments', $this->comments);
        $stmt->execute();

        // echo $this->dataEntryOfficerID . $this->healthCondition;
    }
    public function getMedByID($id){
        $stmt= $this->conn->prepare("select * from $this->table where custID=$id");
        
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function update($id){
        $stmt= $this->conn->prepare("UPDATE $this->table SET date= :date, type=  :type, 
                        healthCondition= :healthCondition, comments= :comments WHERE recordID= $id");
        $stmt -> bindParam(':date', $this->date); 
        $stmt -> bindParam(':type', $this->type);
        $stmt -> bindParam(':healthCondition', $this->healthCondition);
        $stmt -> bindParam(':comments', $this->comments);
        $stmt->execute();
    }
    public function deleteMed($_id){
        $stmt= $this->conn->prepare("delete from $this->table where recordID= $_id");
        return $stmt->execute();
        
    }
}
?>