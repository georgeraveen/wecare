<?php

class updateEmployee extends Controller{

    public function index(){
        $this->checkPermission("MGR");
        include './../app/header.php';
        $this->view('manager/updateEmployee');
        include './../app/footer.php';
        // echo "asas";
    }

    public function viewEmployee(){
        $this->checkPermission("MGR");
        $this->model('employee');
        $empView= new Employee();
        // var_dump($employee);
        $queue=$empView->getAllView();

        include './../app/header.php';
        $this->view('manager/viewEmployee',$queue);
        include './../app/footer.php';
    }

    public function editemployee(){
        $this->checkPermission("MGR");
        $this->model('employee');
        $editEmp= new Employee();
        if($this->valValidate($_GET['action'])=="edit"){
            $empDetails=$editEmp->getDetails($this->valValidate($_GET['id']));
            $empContactDetails=$editEmp->getContactDetails($this->valValidate($_GET['id']));
            //include './../app/header.php';
            $this->view('manager/editEmployee',['id'=>$this->valValidate($_GET['id']),'empDetails'=>$empDetails,'empContactDetails'=>$empContactDetails]);
            include './../app/footer.php';
        }
        else{
            header("Location: ./viewEmployee");
            exit;
        }
    }

    public function updateEmployee(){
        $this->checkPermission("MGR");
        if($_POST['editEmployee']){
            $this->model('employee');
            $editEmployee = new Employee();
            $result= $editEmployee->setValue($this->valValidate($_POST['empFirstName']),$this->valValidate($_POST['empLastName']),$this->valValidate($_POST['gender']),$this->valValidate($_POST['empDOB']),$this->valValidate($_POST['empNIC']),$this->valValidate($_POST['empAddress']),$this->valValidate($_POST['email']),$this->valValidate($_POST['empTypeID']),$this->valValidate($_POST['empContactNo']));
            $result= $editEmployee->update($this->valValidate($_POST['empID']));
            header("Location: ./viewEmployee");
            exit;
        }
    }

}