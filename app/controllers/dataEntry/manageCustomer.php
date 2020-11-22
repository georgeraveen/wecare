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
    
    public function getCust(){
        // $va=$_GET["searchKey"];
        $this->model('customer');
        $custModal = new Customer();
        if($this->valValidate($_GET["searchName"])){
            $result = $custModal->custFilterName($this->valValidate($_GET["searchName"]));
        }
        else if($this->valValidate($_GET["searchID"])){
            $result = $custModal->custFilterID($this->valValidate($_GET["searchID"]));
        }
        $output="";
        foreach($result as $row){
            $output = $output . "<a onclick=\"selectedCust(this)\" id=\"".$row['custID']."\" >" .$row['custID']." - ". $row['custName'] ."</a>";
        }
        echo $output;
    }
    public function getCustomer(){
        $this->model('customer');
        $custModal = new Customer();
        if($this->valValidate($_GET["id"])){
            $result = $custModal->getCustByID($this->valValidate($_GET["id"]));
            $xml = new SimpleXMLElement('<root/>');
            // array_walk_recursive($result[0], array ($xml, 'addChild'));
            array_walk_recursive(array_flip($result[0]), array ($xml, 'addChild'));
            
            echo $xml->asXML();
            // echo $result;
        }
    }
}