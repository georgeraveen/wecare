<?php

class CustViewCases extends Controller{

    public function index(){
        include './../app/header.php';
        $this->view('customer/custViewCases');
        include './../app/footer.php';
    }

}