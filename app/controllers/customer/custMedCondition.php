<?php

class CustMedCondition extends Controller{

    public function index(){
        include './../app/header.php';
        $this->view('customer/custMedCondition');
        include './../app/footer.php';
    }

}