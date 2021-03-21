<?php

class insurancePolicy extends Controller{

    public function index(){
        $this->checkPermission("MGR");
        include './../app/header.php';
        $this->view('manager/updateInsurancePolicy');
        include './../app/footer.php';
        // echo "asas";
    }

    public function newInsurancepolicy(){
        $this->checkPermission("MGR");
        include './../app/header.php';
        $this->view('manager/newInsurancePolicy');
        include './../app/footer.php';
        // echo "asas";
    }

    public function addPolicy(){
        $this->checkPermission("MGR");
        if($_POST['addNew']){
            $this->model('insurePolicy');
            $newPolicy = new insurePolicy();
            $result= $newPolicy->setValue($this->valValidate($_POST['date']), $this->valValidate($_POST['remarks']), $this->valValidate($_POST['vPremium']),
                                                                $this->valValidate($_POST['rPremium']));
            $last_id= $newPolicy->create();
        }
    }

}