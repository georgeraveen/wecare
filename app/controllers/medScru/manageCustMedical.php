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
        if($_POST['addMedCondition']){
            $this->model('medicalCondition');
            $newMedicalCondition = new medicalCondition();
            $result= $newMedicalCondition->setValue($this->valValidate($_POST['customerID']),$this->valValidate($_POST['medDate']),$this->valValidate($_POST['type']),$this->valValidate($_POST['healthCondition']),$this->valValidate($_POST['comments']));
            $result= $newMedicalCondition->create();
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