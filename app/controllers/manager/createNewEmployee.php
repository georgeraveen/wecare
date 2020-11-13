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
            $result= $newEmployee->setValue($_POST['empFirstName'],$_POST['empLastName'],$_POST['gender'],$_POST['empDOB'],$_POST['empNIC'],$_POST['empAddress'],$_POST['email'],$_POST['empTypeID'],$_POST['empContactNo']);
            // $result= $newEmployee->create();
            header("Location: ./index");
            exit;
        }
    }

}