<?php

class manageMedCondition extends Controller
{
    public function index()
    {
        $this->checkPermission("DEO");
        include './../app/header.php';
        $this->view('dataEntry/manageMedCondition');
        include './../app/footer.php';
        // echo "asas";
    }
    // public function addMedCond(){
    //     $this->checkPermission("DEO");
    //     include './../app/header.php';
    //     $this->view('dataEntry/addMedCondition');
    //     include './../app/footer.php';
    // }
    public function viewMedCond()
    {
        $this->checkPermission("DEO");
        include './../app/header.php';
        $this->model('medicalCondition');
        $medModal = new medicalCondition();
        if ($this->valValidate($_POST["custID1"])) {
            $result = $medModal->getMedByID($this->valValidate($_POST["custID1"]));
            $this->view('dataEntry/viewMedCondition', $result);
        }
        include './../app/footer.php';
    }
    public function getCust()
    {
        // $va=$_GET["searchKey"];
        $this->checkPermission("DEO");
        $this->model('customer');
        $custModal = new Customer();
        if ($this->valValidate($_GET["searchName"])) {
            $result = $custModal->custFilterName($this->valValidate($_GET["searchName"]));
        } elseif ($this->valValidate($_GET["searchID"])) {
            $result = $custModal->custFilterID($this->valValidate($_GET["searchID"]));
        }
        $output="";
        foreach ($result as $row) {
            $output = $output . "<a onclick=\"selectedCustMed(this)\" id=\"".$row['custID']."\" >" .$row['custID']." - ". $row['custName'] ."</a>";
        }
        echo $output;
    }
    public function getMedConditionXML()
    {
        $this->checkPermission("DEO");
        $this->model('medicalCondition');
        $medModal = new medicalCondition();
        if ($this->valValidate($_GET["id"])) {
            $result = $medModal->getMedByID($this->valValidate($_GET["id"]));
            $xml = new SimpleXMLElement('<root/>');
            array_walk_recursive(array_flip($result[0]), array($xml, 'addChild'));
            echo $xml->asXML();
        }
    }
    public function createNewConditon()
    {
        echo"na;;a";
        // try {        
        //     $this->checkPermission("DEO");
        //     if ($_POST['addMedCondition']) {
        //         $this->model('medicalCondition');
        //         $newMedicalCondition = new medicalCondition();
        //         $result= $newMedicalCondition->setValue($this->valValidate($_POST['custID']), $this->valValidate($_POST['medDate']), $this->valValidate($_POST['type']), $this->valValidate($_POST['healthCondition']), $this->valValidate($_POST['comments']));
        //         $result= $newMedicalCondition->create();
        //         $_SESSION["successMsg"]="Medical condition added successfully";
        //         sleep(1);
        //         header("Location: ./index");
        //         exit;
        //     }
        // } catch (\Throwable $th) {
        //     $_SESSION["errorMsg"]="Error occured when inserting values";
        //     header("Location: ./index");
        //     // throw $th;
        // }
    }
    public function updateConditon()
    {
        try {
            $this->checkPermission("DEO");
            if ($_POST['editMedCondition']) {
                $this->model('medicalCondition');
                $MedicalCondition = new medicalCondition();
                $result= $MedicalCondition->setValue($this->valValidate($_POST['custID']), $this->valValidate($_POST['medDate']), $this->valValidate($_POST['type']), $this->valValidate($_POST['healthCondition']), $this->valValidate($_POST['comments']));
                $result= $MedicalCondition->update($this->valValidate($_POST['medID']));
                $_SESSION["successMsg"]="Medical condition updated successfully";
                sleep(1);
                header("Location: ./index");
                exit;
            }
        } catch (\Throwable $th) {
            $_SESSION["errorMsg"]="Error occured when updating values";
            header("Location: ./index");
        }
        
    }
    public function deleteCondition()
    {
        try {
            $this->checkPermission("DEO");
            if ($_GET['action']=="delMed") {
                $this->model('medicalCondition');
                $MedicalCondition = new medicalCondition();
                $result= $MedicalCondition->deleteMed($this->valValidate($_GET['id']));
                $_SESSION["successMsg"]="Medical condition deleted successfully";
                sleep(1);
                header("Location: ./index") ;
            }
        } catch (\Throwable $th) {
            $_SESSION["errorMsg"]="Error occured when deleting condition";
            header("Location: ./index");
        }
        
    }
}
