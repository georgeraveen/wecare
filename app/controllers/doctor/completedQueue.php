<?php

class completedQueue extends Controller{

    public function index(){

        $this->checkPermission("DOC");
       $this->model('claimcase');
        $completedQueue= new ClaimCase();
        $doctorID=$_SESSION["user_id"];
        $queue=$completedQueue->getCompletedCasesDoc($doctorID); 
        include './../app/header.php';
        $this->view('doctor/completedQueue',$queue);
        include './../app/footer.php';
        // echo "asas";
    }
    public function review(){
        $this->checkPermission("DOC");
        $this->model('claimCase');
        $caseDetails= new ClaimCase();
        $doctorID=$_SESSION["user_id"];
        $singleCaseDetails=$caseDetails->getCaseDetailsDoc($this->valValidate($_GET['id']),$doctorID);  
        // var_dump($singleCaseDetails);
        if(count($singleCaseDetails)==0){
            $this->permissionError();
        }
        include './../app/header.php';
        $this->view('doctor/viewCompletedCase',['id'=>$this->valValidate($_GET['id']),'singleCaseDetails'=>$singleCaseDetails]);
        include './../app/footer.php';
        // echo "asas";
    }
    public function viewFil($filePath,$fileName,$type){
        $this->checkPermission("DOC");
        try {
            $this->model('claimCase');
            $caseDetails= new ClaimCase();
            $isPermission = $caseDetails->checkCasePermission($filePath,"DOC",$_SESSION["user_id"]);
            if(count($isPermission)){
                $this->viewFile("claimCases/".$filePath."/".$fileName.".".$type,$type);
            }
            else{
                $this->permissionError();
            }
        } catch (\Throwable $th) {
            $this->permissionError();
        }
        
    }  

   
}
?>