<?php

class CustMedCondition extends Controller{

//    public function index(){
//      $this->checkPermissionCust();
//      include './../app/header.php';
//      $this->view('customer/custMedCondition');
//      include './../app/footer.php';
//  }
    public function index(){
        $this->checkPermission("CUST");
        $this->model('medicalCondition');
        $viewMedicalHistory= new medicalCondition();
        $custID=$_SESSION["user_id"];
        $queue=$viewMedicalHistory->getCustMedicalHistory( $custID); 
        include './../app/header.php';
        $this->view('customer/custMedCondition' ,$queue);
        include './../app/footer.php';
        // echo "asas";
    }

}