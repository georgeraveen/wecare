<?php

class CustomerHome extends Controller{

    public function index(){
        $this->checkPermissionCust("CUST");
        $this->model('promotion');
        $promotion = new Promotion();
        $custID = $_SESSION["user_id"];
        $details = $promotion->getAll();
        include './../app/header.php';
        $this->view('customer/customerHome',$details);
        include './../app/footer.php';
    }

   
   

}