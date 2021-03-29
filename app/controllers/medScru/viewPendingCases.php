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
        try {
            $this->checkPermission("MED");
            if($_POST['editInsurance']){
                $this->model('customer');
                $customerMod= new Customer();
                $currentPolicy=$customerMod->getPolicy($this->valValidate($_POST['customer']));
                $this->model('claimCase');
                $editClaimCase = new ClaimCase();
                if($_SESSION["deoType"]=="Trainee"){
                    $casePermission=$editClaimCase->checkCasePermission($this->valValidate($_POST['claimID']),"DEO",$_SESSION["user_id"]);
                    if(count($casePermission)==0){
                        throw new Exception("Trainee is not allowed to update this case", 1);
                        
                    }
                }
                $result= $editClaimCase->setValue($this->valValidate($_POST['customer']),$this->valValidate($_POST['hospital']),
                        $this->valValidate($_POST['admitDate']),$this->valValidate($_POST['dischargeDate']),$this->valValidate($_POST['icuFromDate']),
                        $this->valValidate($_POST['icuToDate']),$this->valValidate($_POST['medScrut']),$this->valValidate($_POST['fieldAg']),
                        $this->valValidate($_POST['healthCondition']),$currentPolicy[0]['policyID']);
                $result= $editClaimCase->update($this->valValidate($_POST['claimID']));
                $_SESSION["successMsg"]="Case details updated successfully";
                sleep(1);
                header("Location: ./viewCase");
                exit;
            }
        } catch (\Throwable $th) {
            $_SESSION["errorMsg"]=$th->getMessage();
            // var_dump($th->getMessage());
            // throw $th;
            header("Location: ./viewCase");
        }
    }


    public function editCase(){
        $this->checkPermission("MED");
        $this->model('claimCase');
        $caseDetails= new ClaimCase();
        $doctorID=$_SESSION["user_id"];
        $singleCaseDetails=$caseDetails->getCaseDetailsDoctor( $this->valValidate($_GET['id']));  
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


}