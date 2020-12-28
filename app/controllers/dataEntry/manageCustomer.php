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
        try {
            $this->checkPermission("DEO");
            if($_POST['newCustomer']){
                $this->model('customer');
                $newCustomer = new Customer();
                $result= $newCustomer->setValue("nullID",$this->valValidate($_POST['custName']),$this->valValidate($_POST['custAddress']),
                        $this->valValidate($_POST['custNIC']),$this->valValidate($_POST['custDOB']),$this->valValidate($_POST['email']),
                        $this->valValidate($_POST['gender']),$this->valValidate($_POST['policyID']),$this->valValidate($_POST['custContact']),
                        $this->valValidate($_POST['custType']),$this->valValidate($_POST['paymentDate']));
                $result= $newCustomer->create();
                $_SESSION["successMsg"]="New customer added successfully";
                header("Location: ./index");
                exit;
            }
        } catch (\Throwable $th) {
            $_SESSION["errorMsg"]="Error occured when creating a new customer.";
            header("Location: ./index");
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
            // echo var_dump($result);
            // echo var_dump($custContact);
            // echo var_dump($custInsure);
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
            array_walk_recursive(array_flip($custDetails), array ($xml, 'addChild'));
            echo $xml->asXML();
        }
    }
    public function editCustomer(){
        try {
            $this->checkPermission("DEO");
            if($_POST['editCustomer']){
                $this->model('customer');
                $editCustomer = new Customer();
                $result= $editCustomer->setValue($this->valValidate($_POST['custID']),$this->valValidate($_POST['custName']),$this->valValidate($_POST['custAddress']),
                        $this->valValidate($_POST['custNIC']),$this->valValidate($_POST['dob']),$this->valValidate($_POST['email']),
                        $this->valValidate($_POST['gender']),$this->valValidate($_POST['policyID']),$this->valValidate($_POST['custContact']),
                        $this->valValidate($_POST['custType']),$this->valValidate($_POST['paymentDate']));
                $result= $editCustomer->update();
                $_SESSION["successMsg"]="Customer profile updated successfully";
                
            }
            header("Location: ./updateCustomer");
            exit;
        } catch (\Throwable $th) {
            $_SESSION["errorMsg"]="Error occured when updating values";
            header("Location: ./index");
        }
        
    }
    public function resetPass(){
        try {
            $this->checkPermission("DEO");
            if($_POST['resetCustomer']){
                $this->model('customer');
                $editCustomer = new Customer();
                $result= $editCustomer->resetPassword($this->valValidate($_POST['custID']));
                $_SESSION["successMsg"]="Password resetted successfully";
                sleep(1);
            }
            header("Location: ./updateCustomer");
        } catch (\Throwable $th) {
            $_SESSION["errorMsg"]="Error occured during processing";
            header("Location: ./index");
        }
        

    }
}