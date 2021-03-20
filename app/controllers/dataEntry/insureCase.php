<?php

class insureCase extends Controller{
    
    public function index(){
        $this->checkPermission("DEO");
        $this->model('customer');
        $customerMod= new Customer();
        $custList=$customerMod->getList();

        $this->model('hospital');
        $hospitalMod= new Hospital();
        $hospList=$hospitalMod->getAll();

        $this->model('employee');
        $empMod= new Employee();
        $medList=$empMod->getEmpByTypeList("MED");

        $fagList=$empMod->getEmpByTypeList("FAG");
        // var_dump($hospList);

        include './../app/header.php';
        $this->view('dataEntry/newInsureCase',['custList'=>$custList,'hospList'=>$hospList,'medList'=>$medList,'fagList'=>$fagList]);
        include './../app/footer.php';
        // echo "asas";
    }
    public function newCase(){
        // echo "hi";
        // var_dump($_POST);
        try {
            $this->checkPermission("DEO");
            if($_POST['newInsurance']){
                $this->model('claimCase');
                $newClaimCase = new ClaimCase();
                $this->model('customer');
                $customerMod= new Customer();
                $currentPolicy=$customerMod->getPolicy($this->valValidate($_POST['customer']));
                $result= $newClaimCase->setValue($this->valValidate($_POST['customer']),$this->valValidate($_POST['hospital']),
                            $this->valValidate($_POST['admitDate']),$this->valValidate($_POST['dischargeDate']),
                            $this->valValidate($_POST['icuFromDate']),$this->valValidate($_POST['icuToDate']),
                            $this->valValidate($_POST['medScrut']),$this->valValidate($_POST['fieldAg']),$this->valValidate($_POST['healthCondition']),$currentPolicy[0]['policyID']);
                $result= $newClaimCase->create();
                $_SESSION["successMsg"]="New case created successfully";
                sleep(1);
            }
            header("Location: ./index");
            exit;
        } catch (\Throwable $th) {
            $_SESSION["errorMsg"]="Error occured when inserting values";
            header("Location: ./index");
        }
        
    }
    public function viewCase(){
        $this->checkPermission("DEO");
        $this->model('claimCase');
        $claimCase= new ClaimCase();

        //////for filters
        $this->model('hospital');
        $hospitalMod= new Hospital();
        $hospList=$hospitalMod->getAll();

        $this->model('employee');
        $empMod= new Employee();
        $medList=$empMod->getEmpByTypeList("MED");
        $fagList=$empMod->getEmpByTypeList("FAG");
        $docList=$empMod->getEmpByTypeList("DOC");
        /////////////////
        $filterParams=['date'=>$this->valValidate($_GET['dischargeDate']),
                        'status'=>$this->valValidate($_GET['status']),
                        'hospital'=>$this->valValidate($_GET['hospital']),
                        'fag'=>$this->valValidate($_GET['fag']),
                        'med'=>$this->valValidate($_GET['med']),
                        'doc'=>$this->valValidate($_GET['doc'])];
        ////////////////
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
        var_dump($filter);

        if(is_int((int)$_GET['page'])){
            $queue=$claimCase->getAllQueueLimit((int)$_GET['page'],$filter);
        }
        else{
            $queue=$claimCase->getAllQueueLimit(0,$filter);
        }
        // var_dump($claimCase);
        $pagination= $claimCase->getAllCount($filter)[0]['cnt'];
        include './../app/header.php';
        $this->view('dataEntry/viewCases',["queue"=>$queue,"pagination"=>$pagination,'hospList'=>$hospList,'medList'=>$medList,'fagList'=>$fagList,'docList'=>$docList,'filter'=>$filter]);
        include './../app/footer.php';
    }
    public function editCase(){
        $this->checkPermission("DEO");
        $this->model('claimCase');
        $editCase= new ClaimCase();

        $this->model('customer');
        $customerMod= new Customer();

        $this->model('hospital');
        $hospitalMod= new Hospital();

        $this->model('employee');
        $empMod= new Employee();

        if($_GET['action']=="edit"){
            $custList=$customerMod->getList();
            $hospList=$hospitalMod->getAll();
            $medList=$empMod->getEmpByTypeList("MED");
            $fagList=$empMod->getEmpByTypeList("FAG");
            $caseDetails=$editCase->getDetails($this->valValidate($_GET['id']));
            include './../app/header.php';
            $this->view('dataEntry/editInsureCase',['id'=>$this->valValidate($_GET['id']),'caseDetails'=>$caseDetails,'custList'=>$custList,'hospList'=>$hospList,'medList'=>$medList,'fagList'=>$fagList]);
            include './../app/footer.php';
        }
        else{
            header("Location: ./viewCase");
            exit;
        }
    }
    public function updateCase(){
        try {
            $this->checkPermission("DEO");
            if($_POST['editInsurance']){
                $this->model('claimCase');
                $editClaimCase = new ClaimCase();
                $result= $editClaimCase->setValue($this->valValidate($_POST['customer']),$this->valValidate($_POST['hospital']),
                        $this->valValidate($_POST['admitDate']),$this->valValidate($_POST['dischargeDate']),$this->valValidate($_POST['icuFromDate']),
                        $this->valValidate($_POST['icuToDate']),$this->valValidate($_POST['medScrut']),$this->valValidate($_POST['fieldAg']),
                        $this->valValidate($_POST['healthCondition']));
                $result= $editClaimCase->update($this->valValidate($_POST['claimID']));
                $_SESSION["successMsg"]="Case details updated successfully";
                sleep(1);
                header("Location: ./viewCase");
                exit;
            }
        } catch (\Throwable $th) {
            $_SESSION["errorMsg"]="Error occured when updating values";
            header("Location: ./index");
        }
        
    }
    public function deleteCase(){
        try {
            $this->checkPermission("DEO");
            if($_GET['action']=="delClaimCase"){
                $this->model('claimCase');
                $deleteCase = new ClaimCase();
                $result= $deleteCase->deleteCase($this->valValidate($_GET['id']));
                $_SESSION["successMsg"]="Case deleted successfully";
                sleep(1);
                header("Location: ./viewCase") ;
            }
        } catch (\Throwable $th) {
            $_SESSION["errorMsg"]="Error occured when deleting case";
            header("Location: ./index");
        }
       
    }
}