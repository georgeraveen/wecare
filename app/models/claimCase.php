
<?php
class ClaimCase extends Models{
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

    public function __construct(){
        $this->conn=$this->dataConnect();
    }
    public function setValue($Pcustomer,$Phospital,$PadmitDate,$PdischargeDate,$PicuFromDate,$PicuToDate,$PmedScrut,$PfieldAg,$PhealthCondition,$PpolicyID){
        // echo $PadmitDate;
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
        $this->policyID=$PpolicyID;
    }
    public function create(){
        $stmt= $this->conn->prepare("insert into $this->table (admitDate,dischargeDate,icuFromDate,icuToDate,healthCondition,custID,medScruID,dataEntryOfficerID,FieldAgID,hospitalID,caseStatus,policyID) 
                                                            values (:admitDate, :dischargeDate, :icuFromDate, :icuToDate, :healthCondition, :custID, :medScruID, :dataEntryOfficerID, :FieldAgID, :hospitalID,'Initial', :policyID ) ");
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
        $stmt -> bindParam(':policyID', $this->policyID);
        $stmt->execute();
        $newCaseID=$this->conn->lastInsertID();
        mkdir("./../documents/claimCases/".$newCaseID);
        // echo $this->dataEntryOfficerID . $this->healthCondition;
    }
    public function getAllQueue(){
        // var_dump($this->conn);
        $stmt= $this->conn->prepare("SELECT claimID,dischargeDate,h.name,med.empFirstName as med, fag.empFirstName as fag, doc.empFirstName as doc, payableAmount, caseStatus  from $this->table as i 
                    inner join hospital as h on i.hospitalID = h.hospitalID 
                    inner join employee as med on i.medScruID = med.empID 
                    inner join employee as fag on i.FieldAgID = fag.empID
                    left join employee as doc on i.doctorID = doc.empID
                    order by claimID DESC");
        
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getAllQueueLimit($page,$filter){
        
        
        $limit=10;
        $start=$page* $limit;
        $stmt= $this->conn->prepare("SELECT claimID,dischargeDate,h.name,med.empFirstName as med, fag.empFirstName as fag, doc.empFirstName as doc, payableAmount, caseStatus  from $this->table as i 
                    inner join hospital as h on i.hospitalID = h.hospitalID 
                    inner join employee as med on i.medScruID = med.empID 
                    inner join employee as fag on i.FieldAgID = fag.empID
                    left join employee as doc on i.doctorID = doc.empID ".
                    $filter."
                    order by claimID DESC LIMIT $start, $limit ");
        // var_dump($filterParams);
        
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getAllCount($filter){
        $stmt= $this->conn->prepare("SELECT count(claimID) AS cnt from $this->table as i".$filter);
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
    public function checkCasePermission($caseID,$role,$empID){
        $emp="";
        switch ($role) {
            case "FAG":
                $emp=" FieldAgID = $empID";
                break;
            
            case "DOC":
                $emp=" doctorID = $empID";
                break;
            case "DEO":
                $emp=" dataEntryOfficerID = $empID";
                break;
            case "MED":
                $emp=" medScruID = $empID";
                break;
            default:
                # code...
                break;
        }
        $stmt= $this->conn->prepare("SELECT * from $this->table where claimID= $caseID and $emp");
        $stmt->execute();
        return $stmt->fetchAll();
    }


    //**************************************** FUNCTIONS OF DOCTOR **********************************************

    //Docter-view pending queue
    public function getDoctorList($doctorID){
        // var_dump($this->conn);
        $stmt= $this->conn->prepare("SELECT claimID, customer.custName,admitDate, CONCAT(employee.empFirstName, \" \", employee.empLastName) AS medSrcName , hospital.name
        FROM claim_case
        INNER JOIN customer
            ON claim_case.custID=customer.custID
        INNER JOIN hospital
            ON claim_case.hospitalID=hospital.hospitalID
        INNER JOIN employee
            ON claim_case.medScruID=employee.empID 
        WHERE claim_case.doctorID = $doctorID AND claim_case.caseStatus = \"Doctor pending\"
        
        ORDER BY claimID DESC;
                    ");
        
        $stmt->execute();
        return $stmt->fetchAll();

    }
    
    //doctor-view from pending queue
    public function getCaseDetailsDoctor($claimID){
        $stmt= $this->conn->prepare("SELECT customer.custName,claimID ,admitDate,icuFromDate,dischargeDate,icuToDate,hospital.name,healthCondition 
        FROM claim_case  
        INNER JOIN hospital 
            ON claim_case.hospitalID=hospital.hospitalID 
        INNER JOIN customer
            ON claim_case.custID=customer.custID 
           
        WHERE claimID = $claimID");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function setValueDoc($doctorComment,$healthCondition){
       
        $this->healthCondition= !empty($healthCondition) ? $healthCondition : null;
        $this->doctorComment= !empty($doctorComment) ? $doctorComment : null;
          
       
    }
    public function updateSingleCaseDoc($_id){
        $stmt= $this->conn->prepare("update $this->table set  healthCondition= :healthCondition, doctorComment= :doctorComment,caseStatus='Doctor confirmed'
                                                            where claimID = $_id ") ;
    
        
        $stmt -> bindParam(':healthCondition', $this->healthCondition );
        $stmt -> bindParam(':doctorComment', $this->doctorComment );
      
        $stmt->execute();
    
        //    echo $this->dataEntryOfficerID . $this->healthCondition;
    }
    //get details for completed queue

public function getCompletedCasesDoc($doctorID){
    // var_dump($this->conn);
    $stmt= $this->conn->prepare("SELECT claimID, customer.custName,admitDate, CONCAT(employee.empFirstName, \" \", employee.empLastName) AS medSrcName , hospital.name
    FROM claim_case 
    INNER JOIN customer
        ON claim_case.custID=customer.custID 
    INNER JOIN hospital 
         ON claim_case.hospitalID=hospital.hospitalID 
    INNER JOIN employee 
        ON claim_case.medScruID=employee.empID
    WHERE claim_case.caseStatus = 'Doctor confirmed' and claim_case.doctorID=$doctorID
    ORDER By claimID DESC;");
    
    $stmt->execute();
    return $stmt->fetchAll();

}
// get details for completed single case
public function getCaseDetailsDoc($claimID,$doctorID){
    $stmt= $this->conn->prepare("SELECT customer.custName,claimID,admitDate,icuFromDate,dischargeDate,icuToDate,hospital.name,doctorComment,healthCondition 
    FROM claim_case 
    INNER JOIN hospital 
        ON claim_case.hospitalID=hospital.hospitalID 
    INNER JOIN customer
        ON claim_case.custID=customer.custID 
    WHERE claimID = $claimID AND doctorID=$doctorID");
    $stmt->execute();
    return $stmt->fetchAll();
}



//*********************************************** FUNCTIONS OF FIELD AGENT *********************************************
//get details for table for pending queue

    public function getFieldAgList($fieldAgID){
        // var_dump($this->conn);
        $stmt= $this->conn->prepare("SELECT claimID, customer.custName,admitDate, CONCAT(employee.empFirstName, \" \", employee.empLastName) AS medSrcName , hospital.name ,caseStatus
        FROM claim_case 
        INNER JOIN customer
            ON claim_case.custID=customer.custID 
        INNER JOIN hospital 
             ON claim_case.hospitalID=hospital.hospitalID 
        INNER JOIN employee 
            ON claim_case.medScruID=employee.empID
        WHERE claim_case.caseStatus != 'Completed' and claim_case.FieldAgID=$fieldAgID ORDER BY claimID DESC;");
        
        $stmt->execute();
        return $stmt->fetchAll();

}



public function getCaseDetailsFieldAg($claimID,$fagID){
    $stmt= $this->conn->prepare("SELECT customer.custName,claimID,admitDate,icuFromDate,dischargeDate,icuToDate,hospital.name 
    FROM claim_case 
    INNER JOIN hospital 
        ON claim_case.hospitalID=hospital.hospitalID 
    INNER JOIN customer
        ON claim_case.custID=customer.custID 
    WHERE claimID = $claimID AND FieldAgID=$fagID");
    $stmt->execute();
    return $stmt->fetchAll();
}

public function setValueFag($PclaimID,$PadmitDate,$PdischargeDate,$PicuFromDate,$PicuToDate){
    // echo $PadmitDate;
    $this->claimID=$PclaimID;
    $this->admitDate= !empty($PadmitDate) ? $PadmitDate : null;
    $this->dischargeDate =  !empty($PdischargeDate) ? $PdischargeDate : null;
    $this->icuFromDate= !empty($PicuToDate) ? $PicuToDate : null;
    $this->icuToDate= !empty($PicuToDate) ? $PicuToDate : null;
      
   
}
//update single case details FAG
public function updateSingleCaseFag($_id){
    $stmt= $this->conn->prepare("update $this->table set admitDate= :admitDate, dischargeDate= :dischargeDate, icuFromDate= :icuFromDate, icuToDate= :icuToDate,caseStatus='Completed' where claimID = $_id ") ;

    $stmt -> bindParam(':admitDate', $this->admitDate );
    $stmt -> bindParam(':dischargeDate', $this->dischargeDate); 
    $stmt -> bindParam(':icuFromDate', $this->icuFromDate );
    $stmt -> bindParam(':icuToDate', $this->icuToDate );
   
    $stmt->execute();

    // echo $this->dataEntryOfficerID . $this->healthCondition;
}
//get details for completed queue

public function getCompletedCases($fieldAgID){
    // var_dump($this->conn);
    $stmt= $this->conn->prepare("SELECT claimID, customer.custName,admitDate, CONCAT(employee.empFirstName, \" \", employee.empLastName) AS medSrcName , hospital.name ,caseStatus
    FROM claim_case 
    INNER JOIN customer
        ON claim_case.custID=customer.custID 
    INNER JOIN hospital 
         ON claim_case.hospitalID=hospital.hospitalID 
    INNER JOIN employee 
        ON claim_case.medScruID=employee.empID
    WHERE claim_case.caseStatus = 'Completed' and claim_case.FieldAgID=$fieldAgID
    ORDER BY claimID DESC;
                ");
    
    $stmt->execute();
    return $stmt->fetchAll();

}
//**************************** Functions for customer***********************
//set value for feedback
    
    public function setFeedbackValue($PclaimID,$PcustFeedback){
       // var_dump($PclaimID);
        $this->claimID= !empty($PclaimID) ? $PclaimID : null;
        $this->custFeedback =  !empty($PcustFeedback) ? $PcustFeedback : null;
       
}
//update customer feedback
public function addFeedback(){
   // var_dump($_SESSION["user_id"]);
    $stmt= $this->conn->prepare("UPDATE $this->table set custFeedback= :custFeedback WHERE claimID =  $this->claimID AND custID=".$_SESSION['user_id']);

    $stmt -> bindParam(':custFeedback', $this->custFeedback );
    
  // var_dump($stmt);
    $stmt->execute();
}
//get customer claim history
public function getAllCustCases($custID){
    $stmt= $this->conn->prepare("SELECT claimID,dischargeDate,caseStatus,hospital.name,payableAmount,custFeedback
    FROM claim_case
    INNER JOIN hospital ON claim_case.hospitalID=hospital.hospitalID
    WHERE custID = $custID ORDER BY claimID DESC");
    $stmt->execute();
    return $stmt->fetchAll();
}

}
?>