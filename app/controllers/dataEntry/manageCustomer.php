<?php

class manageCustomer extends Controller{
    
    public function index(){
        $this->checkPermission("DEO");
        $this->model('insurePolicy');
        $insurePolicy = new InsurePolicy();
        $policyList = $insurePolicy->getAll();
        include './../app/header.php';
        $this->view('dataEntry/newCustomer',$policyList);
        include './../app/footer.php';
    }
    public function createCustomer(){
        $this->checkPermission("DEO");
        if($_POST['newCustomer']){
            $this->model('customer');
            $newCustomer = new Customer();
            $result= $newCustomer->setValue($this->valValidate($_POST['custName']),$this->valValidate($_POST['custAddress']),
                    $this->valValidate($_POST['custNIC']),$this->valValidate($_POST['custDOB']),$this->valValidate($_POST['email']),
                    $this->valValidate($_POST['gender']),$this->valValidate($_POST['policyID']),$this->valValidate($_POST['custContact']),
                    $this->valValidate($_POST['custType']),$this->valValidate($_POST['paymentDate']));
            $result= $newCustomer->create();
            header("Location: ./index");
            exit;
        }
    }
    public function updateCustomer(){
        $this->checkPermission("DEO");
        $this->model('insurePolicy');
        $insurePolicy = new InsurePolicy();
        $policyList = $insurePolicy->getAll();
        include './../app/header.php';
        $this->view('dataEntry/updateCustomer',$policyList);
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
            $custContact = $custModal->getCustContactByID($this->valValidate($_GET["id"]));
            $custInsure = $custModal->getCustInsuranceByID($this->valValidate($_GET["id"]));
            $contactStr="";
            foreach($custContact as $row){
                $contactStr.=$row["custContactNo"];
                $contactStr.=",";
            }
            $result[0]["custContact"]=$contactStr;
            $custDetails=array_merge($result[0],$custInsure[0]);
            // $custDetails=$result[0];
            // var_dump($custInsure);
            $xml = new SimpleXMLElement('<root/>');
            // function intToStr($value,$key){
            //     if(is_int($value)){
            //         $result[0][$key]="aaa";
            //     }
            // }
            // echo var_dump($custDetails);
            array_walk_recursive(array_flip($custDetails), array ($xml, 'addChild'));
            echo $xml->asXML();
        }
    }
}