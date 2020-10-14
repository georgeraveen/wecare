<?php

class CustomerProfile extends Controller{

    public function index(){
        include './../app/header.php';
        $this->view('customer/customerProfile');
        include './../app/footer.php';
    }

}