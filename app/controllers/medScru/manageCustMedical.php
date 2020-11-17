<?php

class manageCustMedical extends Controller{
    
    public function index(){
        $this->checkPermission("MED");
        $this->model('customer');
        $customerMod= new Customer();
        $custList=$customerMod->getList();
        include './../app/header.php';
        $this->view('medScru/manageCustMedical',['custList'=>$custList]);
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