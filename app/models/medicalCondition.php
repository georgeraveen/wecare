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
    public function setValue($PcustomerID,$PmedDate,$PhealthCondition,$Ptype,$Pcomments){
        // echo $PadmitDate;
        $this->custID=$PcustomerID;
        $this->healthCondition= !empty($PhealthCondition) ? $PhealthCondition : null;
        $this->date=$PmedScrut;
        $this->type=$Ptype;
        $this->comments=$Pcomments;    
    }
    public function create(){
        $stmt= $this->conn->prepare("insert into $this->table (custID,date,type,healthCondition,comments)
                                                            values (:custID, :date, :type, :healthCondition, :comments)");
        $stmt -> bindParam(':custID', $this->custID);
        $stmt -> bindParam(':date', $this->date); 
        $stmt -> bindParam(':type', $this->type);
        $stmt -> bindParam(':icuToDate', $this->icuToDate);
        $stmt -> bindParam(':healthCondition', $this->healthCondition);
        $stmt -> bindParam(':comments', $this->comments);
        $stmt->execute();

        // echo $this->dataEntryOfficerID . $this->healthCondition;
    }
  

}
?>