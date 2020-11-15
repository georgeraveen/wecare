<?php

class viewPendingQueue extends Controller{

    public function index(){
        $this->checkPermission("FAG");
        $this->model('claimcase');
        $pendingQueue= new ClaimCase();
        $fieldAgID=$_SESSION["user_id"];
        $queue=$pendingQueue->getFieldAgList( $fieldAgID); 
        include './../app/header.php';
        $this->view('fieldAgent/viewPendingQueue' ,$queue);
        include './../app/footer.php';
        // echo "asas";
    }

    // public function review(){
    //     $this->checkPermission("FAG");
    //     include './../app/header.php';
    //     $this->view('fieldAgent/updateCase');
    //     include './../app/footer.php';
    //     // echo "asas";
    // }

//single case edit
    public function editCase(){
        $this->checkPermission("FAG");
        $this->model('claimCase');
        $caseDetails= new ClaimCase();
        $fieldAgID=$_SESSION["user_id"];
        $singleCaseDetails=$caseDetails->getCaseDetailsFieldAg($this->valValidate($_GET['id']));  
      

       

        if($_GET['action']=="edit"){
            
            include './../app/header.php';
            $this->view('fieldAgent/updateCase',['id'=>$this->valValidate($_GET['id']),'singleCaseDetails'=>$singleCaseDetails]);
            include './../app/footer.php';
        }

       
        else{
            header("Location: ./viewPendingQueue");
          
            exit;
        }
    }
    //update Single case details
    public function updateCase(){
        $this->checkPermission("FAG");
        if($_POST['editSingleCaseDetails']){
            $this->model('claimCase');
            $editClaimCase = new ClaimCase();
            $result= $editClaimCase->setValueFag($this->valValidate($_POST['claimID']),
                    $this->valValidate($_POST['admitDate']),$this->valValidate($_POST['ICUfromDate']),$this->valValidate($_POST['dischargeDate']),
                    $this->valValidate($_POST['ICUtoDate']));
                   
            $result= $editClaimCase->updateSingleCaseFag($this->valValidate($_POST['claimID']));
            header("Location: ./viewCase");
            exit;
        }
    }
   
}