<?php

class manageCustMedical extends Controller{
    
    public function index(){
        $this->checkPermission("MED");
        include './../app/header.php';
        $this->view('medScru/manageCustMedical');
        include './../app/footer.php';
    }
  public function viewConditions(){
        $this->checkPermission("MED");
        include './../app/header.php';
        $this->view('medScru/viewMedicalCondition');
        include './../app/footer.php';
    }
    public function newCondition(){
        $this->checkPermission("MED");
        include './../app/header.php';
        $this->view('medScru/newCondition');
        include './../app/footer.php';
    }

}