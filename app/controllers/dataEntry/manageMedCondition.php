<?php

class manageMedCondition extends Controller{
    
    public function index(){
        $this->checkPermission("DEO");
        include './../app/header.php';
        $this->view('dataEntry/manageMedCondition');
        include './../app/footer.php';
        // echo "asas";
    }
    public function addMedCond(){
        $this->checkPermission("DEO");
        include './../app/header.php';
        $this->view('dataEntry/addMedCondition');
        include './../app/footer.php';
    }
    public function viewMedCond(){
        $this->checkPermission("DEO");
        include './../app/header.php';
        $this->view('dataEntry/viewMedCondition');
        include './../app/footer.php';
    }
}