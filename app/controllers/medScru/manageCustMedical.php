<?php

class manageCustMedical extends Controller{
    
    public function index(){
        $this->checkPermission("MED");
        include './../app/header.php';
        $this->view('medScru/manageMedicalConditions');
        include './../app/footer.php';
    }

    public function manageCustMedicalCondtions(){
        $this->checkPermission("MED");
        $this->model('customer');
        $customerMod= new Customer();
        $custList=$customerMod->getList();
        $custBasicList=$customerMod->getBasicCustList();
        include './../app/header.php';
        $this->view('medScru/manageCustMedical',['custList'=>$custList,'custBasicList'=>$custBasicList]);
        include './../app/footer.php';
        //var_dump($custBasicList);
    }

    public function viewConditions(){
        $this->checkPermission("MED");
        include './../app/header.php';
        $this->view('medScru/viewMedicalCondition');
        include './../app/footer.php';
    }
    public function createNewConditon(){
        $this->checkPermission("MED");
        // echo "hi";
        var_dump($_POST);
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
            header("Location: ./index");
            exit;
        }
    }   
    public function addNewCondition(){
        $this->checkPermission("MED");
        include './../app/header.php';
        $this->view('medScru/addNewCondition');
        include './../app/footer.php';
    }
    public function newCondition(){
        $this->checkPermission("MED");
        include './../app/header.php';
        $this->view('medScru/newCondition');
        include './../app/footer.php';
    }

}