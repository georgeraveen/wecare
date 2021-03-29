<?php

class viewPendingCases extends Controller{ 
    public function index(){
        $this->checkPermission("MED");
        include './../app/header.php';
        $this->view('medScru/pendingCases');
        include './../app/footer.php';
    }
    public function viewCase(){
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
        try{     
            $this->checkPermission("DEO");
                //if($_POST['editSingleCaseDetails']){
                $this->model('claimCase');
                $editClaimCase = new ClaimCase();
                $result= $editClaimCase->setValueDoc(
                        $this->valValidate($_POST['doctorComment']),$this->valValidate($_POST['healthCondition']));
                       
                $result= $editClaimCase->updateSingleCaseDoc($this->valValidate($_POST['claimID']));
                $_SESSION["successMsg"]="Case Updated Successfully!";
                header("Location: ./viewCase");
                exit;
                //}
            }
        catch(\Throwable $th) {
                $newCustomer->transRollBack();
                $_SESSION["errorMsg"]="Error occured when creating a new customer.";
                header("Location: ./index");
        }
    }
    
    public function editCase(){
        $this->checkPermission("MED");
        //var_dump($_GET['id']);
        //var_dump("oogabooga");
        $this->model('claimCase');
        $caseDetails= new ClaimCase();
        //$doctorID=$_SESSION["user_id"];
        $singleCaseDetails=$caseDetails->getCaseDetailsMed( $this->valValidate($_GET['id']));  
        if($_GET['action']=="edit"){
            include './../app/header.php';
            $this->view('medScru/insuranceCase',['id'=>$this->valValidate($_GET['id']),'singleCaseDetails'=>$singleCaseDetails]);
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