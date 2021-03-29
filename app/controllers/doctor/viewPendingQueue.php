<?php

class viewPendingQueue extends Controller{

    public function index(){
        $this->checkPermission("DOC");
        $this->model('claimcase');
        $pendingQueue= new ClaimCase();
        $doctorID=$_SESSION["user_id"];
        $queue=$pendingQueue->getDoctorList( $doctorID);       
        include './../app/header.php';
        $this->view('doctor/viewPendingQueue', $queue);
        include './../app/footer.php';
        // echo "asas";
    }

    public function review(){
        $this->checkPermission("DOC");
        include './../app/header.php';
        $this->view('doctor/reviewAndComment');
        include './../app/footer.php';
        // echo "asas";
    }

    //doctor-pendingQueue edit
    public function editCase(){
        $this->checkPermission("DOC");
        $this->model('claimCase');
        $caseDetails= new ClaimCase();
        $doctorID=$_SESSION["user_id"];
        $singleCaseDetails=$caseDetails->getCaseDetailsDoctor( $this->valValidate($_GET['id']));  
        if($_GET['action']=="edit"){
          
            include './../app/header.php';
            $this->view('doctor/reviewAndComment',['id'=>$this->valValidate($_GET['id']),'singleCaseDetails'=>$singleCaseDetails]);
            include './../app/footer.php';
        }
        else{
            header("Location: ./viewPendingQueue");
            exit;
        }
    }


    
  //update Single case details
  public function updateCase(){
      try{     
    $this->checkPermission("DOC");
    if($_POST['editSingleCaseDetails']){
        $this->model('claimCase');
        $editClaimCase = new ClaimCase();
        $result= $editClaimCase->setValueDoc(
                $this->valValidate($_POST['doctorComment']),$this->valValidate($_POST['healthCondition']));
               
        $result= $editClaimCase->updateSingleCaseDoc($this->valValidate($_POST['claimID']));
        $_SESSION["successMsg"]="Case Updated Successfully!";
        header("Location: ./viewCase");
        exit;
    }
}catch(\Throwable $th) {
        $newCustomer->transRollBack();
        $_SESSION["errorMsg"]="Error occured when creating a new customer.";
        header("Location: ./index");
    }

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