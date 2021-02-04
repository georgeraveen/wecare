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
        $this->checkPermission("MGR");
        if($_POST['newEmployee']){
            $this->model('employee');
            $newEmployee = new Employee();

            $result= $newEmployee->setValue($this->valValidate($_POST['empFirstName']),$this->valValidate($_POST['empLastName']),$this->valValidate($_POST['gender']),$this->valValidate($_POST['empDOB']),$this->valValidate($_POST['empNIC']),$this->valValidate($_POST['empAddress']),$this->valValidate($_POST['email']),$this->valValidate($_POST['empTypeID']),$this->valValidate($_POST['empContactNo']));
            $result= $newEmployee->create();

            header("Location: ./index");
            exit;
        }
    }

}