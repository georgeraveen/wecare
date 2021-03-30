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
    //get customer medical history
    public function getCustMedicalHistory($custID){
        //var_dump($custID);
        $stmt=$this->conn->prepare("SELECT recordID,custID,date,type,healthCondition,comments
        FROM med_record 
        WHERE custID=$custID ORDER BY recordID DESC");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    // public function getAllMedRecords($custID){
    //     
    //     $stmt=$this->conn->prepare("SELECT ALL
    //     FROM med_record 
    //     WHERE custID=$custID ORDER BY recordID DESC");
    //     $stmt->execute();
    //     return $stmt->fetchAll();
    // }
   // public function getFieldAgList($fieldAgID){
        // var_dump($this->conn);
    //    $stmt= $this->conn->prepare("SELECT claimID, customer.custName,admitDate, CONCAT(employee.empFirstName, \" \", employee.empLastName) AS medSrcName , hospital.name ,caseStatus
    //    FROM claim_case 
    //    INNER JOIN customer
    //        ON claim_case.custID=customer.custID 
    //    INNER JOIN hospital 
    //         ON claim_case.hospitalID=hospital.hospitalID 
     //   INNER JOIN employee 
     ////       ON claim_case.medScruID=employee.empID
    //    WHERE claim_case.caseStatus != 'Completed' and claim_case.FieldAgID=$fieldAgID ORDER BY claimID DESC;");
        
    //    $stmt->execute();
    //     return $stmt->fetchAll();

    //}
}
?>