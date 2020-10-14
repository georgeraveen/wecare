<?php

class CustomerHome extends Controller{

    public function index(){
        $this->checkPermissionCust();
        include './../app/header.php';
        $this->view('customer/customerHome');
        include './../app/footer.php';
    }

}