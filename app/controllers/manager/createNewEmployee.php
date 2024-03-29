<?php

class createNewEmployee extends Controller{

    public function index(){
        $this->checkPermission("MGR");
        include './../app/header.php';
        $this->view('manager/createNewEmployee');
        include './../app/footer.php';
        // echo "asas";
    }

    public function createEmployee(){

        try{
            $this->checkPermission("MGR");
            if($_POST['newEmployee']){
                $this->model('employee');
                $newEmployee = new Employee();
                $newEmployee->startTrans();
                $result= $newEmployee->setValue($this->valValidate($_POST['empFirstName']),$this->valValidate($_POST['empLastName']),$this->valValidate($_POST['gender']),$this->valValidate($_POST['empDOB']),$this->valValidate($_POST['empNIC']),$this->valValidate($_POST['empAddress']),$this->valValidate($_POST['email']),$this->valValidate($_POST['empTypeID']),$this->valValidate($_POST['empContactNo']));
                $last_id= $newEmployee->create();
                if ($_POST['empTypeID']==="FAG"){
                    $reslut= $newEmployee->setValueFAG($this->valValidate($_POST['empSp']));
                    $result= $newEmployee->createFAG($last_id);
                }
                elseif ($_POST['empTypeID']==="DOC") {
                    $reslut= $newEmployee->setValueDOC($this->valValidate($_POST['empSp']));
                    $result= $newEmployee->createDOC($last_id);
                }
                elseif ($_POST['empTypeID']==="DEO") {
                    $reslut= $newEmployee->setValueDEO($this->valValidate($_POST['empSp']));
                    $result= $newEmployee->createDEO($last_id);
                }
                $_SESSION["successMsg"]="New employee added successfully";
                $newEmployee->transCommit();
                header("Location: ./index");
                exit;
            }
        }
        catch(\Throwable $th){
            $newEmployee->transRollBack();
            $_SESSION["errorMsg"]="Error occured when adding a new employee. ".$th->getMessage();

            header("Location: ./index");
        }
    }

}