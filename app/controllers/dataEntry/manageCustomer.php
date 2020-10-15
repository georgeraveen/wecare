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
            $result= $newCustomer->setValue($_POST['custName'],$_POST['custAddress'],$_POST['custNIC'],$_POST['custDOB'],$_POST['email'],$_POST['gender'],$_POST['policyID'],$_POST['custContact']);
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