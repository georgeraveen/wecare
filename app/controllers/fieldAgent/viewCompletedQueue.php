<?php

class viewCompletedQueue extends Controller{

    public function index(){

        $this->checkPermission("FAG");
       $this->model('claimcase');
        $completedQueue= new ClaimCase();
        $fieldAgID=$_SESSION["user_id"];
        $queue=$completedQueue->getCompletedCases($fieldAgID); 
        include './../app/header.php';
        $this->view('fieldAgent/viewCompletedQueue',$queue);
        include './../app/footer.php';
        // echo "asas";
    }

    public function review(){
        $this->checkPermission("FAG");
        $this->model('claimCase');
        $caseDetails= new ClaimCase();
        $fieldAgID=$_SESSION["user_id"];
        $singleCaseDetails=$caseDetails->getCaseDetailsFieldAg($this->valValidate($_GET['id']),$fieldAgID);  
        // var_dump($singleCaseDetails);
        if(count($singleCaseDetails)==0){
            $this->permissionError();
        }
        include './../app/header.php';
        $this->view('fieldAgent/viewCompletedCase',['id'=>$this->valValidate($_GET['id']),'singleCaseDetails'=>$singleCaseDetails]);
        include './../app/footer.php';
        // echo "asas";
    }

   
}


?>