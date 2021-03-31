<?php

class manageCustMedical extends Controller{
    public function index(){
        $this->checkPermission("MED");
        include './../app/header.php';
        $this->view('medScru/manageMedicalConditions');
        include './../app/footer.php';
    }
    public function addNewCondition(){
        $this->checkPermission("MED");
        include './../app/header.php';
        $this->view('medScru/addNewCondition');
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
        //var_dump($_POST["customerID"]);
       try{
        $this->model('medicalCondition');
        $medicalConditionMod= new medicalCondition();
        $medicalConditionList=$medicalConditionMod->getCustMedicalHistory($_POST["customerID"]);
        if (empty($medicalConditionList)){
            $_SESSION["errorMsg"]="Customer not found,Please contact Data entry officer";
            header("Location: ./index");
            exit;
       }
       $_SESSION["successMsg"]="Medical conditios loaded Successfully!"; 
        include './../app/header.php';
        //var_dump($medicalConditionList);
        $this->view('medScru/viewMedicalCondition',["medicalConditionList"=>$medicalConditionList,'customerID'=>$_POST["customerID"]]);
        include './../app/footer.php';
        exit;
       }
       catch (\Throwable $th) {
        $_SESSION["errorMsg"]="Customer not found,Please contact Data entry officer";
        header("Location: ./index");
    }
      
    }

    public function createNewConditon(){
        $this->checkPermission("MED");
        try {
            if($_POST['addMedCondition']){
            $this->model('medicalCondition');
            $newMedicalCondition = new medicalCondition();
            $result= $newMedicalCondition->setValue($this->valValidate($_POST['customerID']),$this->valValidate($_POST['medDate']),$this->valValidate($_POST['type']),$this->valValidate($_POST['healthCondition']),$this->valValidate($_POST['comments']));
            $result= $newMedicalCondition->create();
            $_SESSION["successMsg"]="Medical condition added Successfully!";  
            header("Location: ./index");
            exit;
            }
        }
        catch (\Throwable $th) {
            $_SESSION["errorMsg"]="Customer not found,Please contact Data entry officer";
            header("Location: ./index");
        }

    }  
}