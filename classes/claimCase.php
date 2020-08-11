
<?php
require_once("./../../config/config.php");
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
    public function create($Pcustomer,$Phospital,$PadmitDate,$PdischargeDate,$PicuFromDate,$PicuToDate,$PmedScrut,$PfieldAg,$PhealthCondition){
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

}
?>