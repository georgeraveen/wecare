
<?php
// require_once("./../../config/config.php");
class ClaimCase{
    private $conn;
    private $table="claim_case";
    private $claimID="";
    private $admitDate=NULL;
    private $dischargeDate;
    private $icuFromDate;
    private $icuToDate;
    private $payableAmount;
    private $healthCondition;
    private $doctorComment;
    private $custFeedback;
    private $documentDIR;
    private $custID;
    private $doctorID;
    private $medScruID;
    private $dataEntryOfficerID;
    private $FieldAgID;
    private $hospital;
    private $policyID;

    public function __construct($db){
        $this->conn=$db;
    }
    public function setValue($Pcustomer,$Phospital,$PadmitDate,$PdischargeDate,$PicuFromDate,$PicuToDate,$PmedScrut,$PfieldAg,$PhealthCondition){
        echo $PadmitDate;
        $this->admitDate= !empty($PadmitDate) ? $PadmitDate : null;
        $this->dischargeDate =  !empty($PdischargeDate) ? $PdischargeDate : null;
        $this->icuFromDate= !empty($PicuToDate) ? $PicuToDate : null;
        $this->icuToDate= !empty($PicuToDate) ? $PicuToDate : null;
        $this->custID=$Pcustomer;
        $this->healthCondition= !empty($PhealthCondition) ? $PhealthCondition : null;
        $this->medScruID=$PmedScrut;
        $this->dataEntryOfficerID = $_SESSION["user_id"];
        $this->FieldAgID=$PfieldAg;
        $this->hospital=$Phospital;
    }
    public function create(){
        $stmt= $this->conn->prepare("insert into $this->table (admitDate,dischargeDate,icuFromDate,icuToDate,healthCondition,custID,medScruID,dataEntryOfficerID,FieldAgID,hospitalID) 
                                                            values (:admitDate, :dischargeDate, :icuFromDate, :icuToDate, :healthCondition, :custID, :medScruID, :dataEntryOfficerID, :FieldAgID, :hospitalID) ");
        $stmt -> bindParam(':admitDate', $this->admitDate );
        $stmt -> bindParam(':dischargeDate', $this->dischargeDate); 
        $stmt -> bindParam(':icuFromDate', $this->icuFromDate );
        $stmt -> bindParam(':icuToDate', $this->icuToDate );
        $stmt -> bindParam(':healthCondition', $this->healthCondition );
        $stmt -> bindParam(':custID', $this->custID );
        $stmt -> bindParam(':medScruID', $this->medScruID );
        $stmt -> bindParam(':dataEntryOfficerID', $this->dataEntryOfficerID );
        $stmt -> bindParam(':FieldAgID', $this->FieldAgID );
        $stmt -> bindParam(':hospitalID', $this->hospital);
        $stmt->execute();

        // echo $this->dataEntryOfficerID . $this->healthCondition;
    }
    public function getAllQueue(){
        $stmt= $this->conn->prepare("select claimID,dischargeDate,h.name,med.empFirstName as med, fag.empFirstName as fag, doc.empFirstName as doc  from $this->table as i 
                    inner join hospital as h on i.hospitalID = h.hospitalID 
                    inner join employee as med on i.medScruID = med.empID 
                    inner join employee as fag on i.FieldAgID = fag.empID
                    left join employee as doc on i.doctorID = doc.empID
                    ");
        
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function deleteCase($_id){
        $stmt= $this->conn->prepare("delete from $this->table where claimID= $_id");
        return $stmt->execute();
        
    }
    public function getDetails($_id){
        $stmt= $this->conn->prepare("select * from $this->table where claimID= $_id");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function update($_id){
        $stmt= $this->conn->prepare("update $this->table set admitDate= :admitDate, dischargeDate= :dischargeDate, icuFromDate= :icuFromDate, icuToDate= :icuToDate,
                                                            healthCondition= :healthCondition, custID= :custID, medScruID= :medScruID, dataEntryOfficerID= :dataEntryOfficerID,
                                                            FieldAgID= :FieldAgID, hospitalID= :hospitalID where claimID = $_id ") ;

        $stmt -> bindParam(':admitDate', $this->admitDate );
        $stmt -> bindParam(':dischargeDate', $this->dischargeDate); 
        $stmt -> bindParam(':icuFromDate', $this->icuFromDate );
        $stmt -> bindParam(':icuToDate', $this->icuToDate );
        $stmt -> bindParam(':healthCondition', $this->healthCondition );
        $stmt -> bindParam(':custID', $this->custID );
        $stmt -> bindParam(':medScruID', $this->medScruID );
        $stmt -> bindParam(':dataEntryOfficerID', $this->dataEntryOfficerID );
        $stmt -> bindParam(':FieldAgID', $this->FieldAgID );
        $stmt -> bindParam(':hospitalID', $this->hospital);
        $stmt->execute();

        // echo $this->dataEntryOfficerID . $this->healthCondition;
    }
}
?>