<?php

class CustomerHome extends Controller{

    public function index(){
        $this->checkPermissionCust("CUST");
        $this->model('promotion');
        $promotion = new promotion();
        $custID = $_SESSION["user_id"];
        $details = $promotion->getAll();
        //include './../app/header.php';
        $this->view('customer/customerHome');
        include './../app/footer.php';
    }
   

}