<?php

class manageCustomer extends Controller{
    
    public function index(){
        $this->checkPermission("DEO");
        include './../app/header.php';
        $this->view('dataEntry/newCustomer');
        include './../app/footer.php';
        // echo "asas";
    }
    public function createCustomer(){
        $this->checkPermission("DEO");
        if($_POST['newCustomer']){
            $this->model('customer');
            $newCustomer = new Customer();
            $result= $newCustomer->setValue($this->valValidate($_POST['custName']),$this->valValidate($_POST['custAddress']),
                    $this->valValidate($_POST['custNIC']),$this->valValidate($_POST['custDOB']),$this->valValidate($_POST['email']),
                    $this->valValidate($_POST['gender']),$this->valValidate($_POST['policyID']),$this->valValidate($_POST['custContact']));
            $result= $newCustomer->create();
            header("Location: ./index");
            exit;
        }
    }
    public function updateCustomer(){
        $this->checkPermission("DEO");
        include './../app/header.php';
        $this->view('dataEntry/updateCustomer');
        include './../app/footer.php';
    }
}