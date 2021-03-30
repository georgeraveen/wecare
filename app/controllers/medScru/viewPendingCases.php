<?php

class viewPendingCases extends Controller{ 
    public function index(){
        $this->checkPermission("MED");
        include './../app/header.php';
        $this->view('medScru/pendingCases');
        include './../app/footer.php';
    }
    public function viewCase(){
      //echo "blah";
        //var_dump("Hereitis");
        //echo $_SESSION["user_id"];
        $this->checkPermission("MED");
        $this->model('claimCase');
        $claimCase= new ClaimCase();
        //filters
        $this->model('hospital');
        $hospitalMod= new Hospital();
        $hospList=$hospitalMod->getAll();

        $this->model('employee');
        $empMod= new Employee();
        $medList=$empMod->getEmpByTypeList("MED");
        $fagList=$empMod->getEmpByTypeList("FAG");
        $docList=$empMod->getEmpByTypeList("DOC");
        $filterParams=['date'=>$this->valValidate($_GET['dischargeDate']),
                        'status'=>$this->valValidate($_GET['status']),
                        'hospital'=>$this->valValidate($_GET['hospital']),
                        'fag'=>$this->valValidate($_GET['fag']),
                        'med'=>$this->valValidate($_GET['med']),
                        'doc'=>$this->valValidate($_GET['doc'])];
        $filter="";
        if($filterParams['date']!=""){
            $filter="i.dischargeDate='".$filterParams['date']."'";
        }
        if($filterParams['status']!=""){
            $filter= $filter.($filter=="" ? "":" and "). "i.caseStatus='". $filterParams['status']."'";
        }
        if($filterParams['hospital']!=""){
            $filter= $filter.($filter=="" ? "":" and "). "i.hospitalID='".$filterParams['hospital']."'";
        }
        if($filterParams['fag']!=""){
            $filter= $filter.($filter=="" ? "":" and "). "i.FieldAgID='".$filterParams['fag']."'";
        }
        if($filterParams['med']!=""){
            $filter= $filter.($filter=="" ? "":" and "). "i.medScruID='".$filterParams['med']."'";
        }
        if($filterParams['doc']!=""){
            $filter= $filter.($filter=="" ? "":" and "). "i.doctorID='".$filterParams['doc']."'";
        }
        if($filter!=""){
            $filter= " where ".$filter;
        }
        if(is_int((int)$_GET['page'])){
            $queue=$claimCase->getAllQueueLimitPending((int)$_GET['page'],$filter);
        }
        else{
            $queue=$claimCase->getAllQueueLimitPending(0,$filter);
        }
        $pagination= $claimCase->getAllCountPending($filter)[0]['cnt'];
       include './../app/header.php';
        $this->view('medScru/pendingCases',["queue"=>$queue,"pagination"=>$pagination,'hospList'=>$hospList,'medList'=>$medList,'fagList'=>$fagList,'docList'=>$docList,'filter'=>$filter]);
       include './../app/footer.php';

    }
    public function updateCase(){
        //var_dump("tests");
        $this->checkPermission("MED");
        //var_dump($_POST);
        try{ 
            $this->model('claimCase');
            $caseDetails= new ClaimCase();
            $this->model('employee');
            $empMod= new Employee();
            if($_POST['cancel']){
                $_SESSION["successMsg"]="No changes have been done to the case!";    
                header("Location: ./viewCase");
                exit;
            }
            else if($_POST['caseReject']){
                $caseDetails->updateCaseReject($_POST['claimID']);
                $_SESSION["successMsg"]="Case has been sucessfully rejected!";    
                header("Location: ./viewCase");
                exit;
            }
            else if($_POST['caseSubmit']){
                if($_POST['payAmount']==("" || 0)){
                    $_SESSION["errorMsg"]="Please enter a valid payable amount before submitting.";
                    header("Location: ./viewCase");
                    exit;
                }
                else{ 
                    $caseDetails->updateCaseAmount($_POST['claimID'],$_POST['payAmount']);
                    $_SESSION["successMsg"]="Case Completed successfully!";  
                    header("Location: ./viewCase");
                    exit;   
                }
            }
          
        }
        catch(\Throwable $th) {
                $_SESSION["errorMsg"]="Error occured while performing operation.";
                header("Location: ./index");
        }
    }

    public function assignDoc(){
    //   var_dump($_POST['claimID']);
    //   var_dump($_POST['Doc']);
    //   var_dump($_SESSION['user_id']);
        $this->checkPermission("MED");
        $this->model('claimCase');
        $caseDetails= new ClaimCase();
        if($_POST['assignDoc']){
        $caseDetails->updateAssignDoc($_POST['claimID'],$_POST['Doc']);
            $_SESSION["successMsg"]="Doctor Assigned Successfully!";  
            header("Location: ./viewCase");
            exit;   
        }
    }

    public function editCase(){
        $this->checkPermission("MED");
        //var_dump($_GET['id']);
        $this->model('claimCase');
        $caseDetails= new ClaimCase();
        $this->model('employee');
        $empMod= new Employee();
        $docList=$empMod->getEmpByTypeList("DOC");
        //var_dump($docList);
        $singleCaseDetails=$caseDetails->getCaseDetailsMed( $this->valValidate($_GET['id']));  
        if($_GET['action']=="edit"){
            include './../app/header.php';
            $this->view('medScru/insuranceCase',['docList'=>$docList,'id'=>$this->valValidate($_GET['id']),'singleCaseDetails'=>$singleCaseDetails]);
            include './../app/footer.php';
        }
        else{
            header("Location: ./viewCase");
            exit;
        }
    }

    public function viewFil($filePath,$fileName,$type){
        $this->checkPermission("MED");
        try {
            $this->model('claimCase');
            $caseDetails= new ClaimCase();
            $isPermission = $caseDetails->checkCasePermission($filePath,"MED",$_SESSION["user_id"]);
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