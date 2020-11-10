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

}