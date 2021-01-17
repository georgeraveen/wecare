<?php

class hospital extends Controller{

    public function index(){
        $this->checkPermission("MGR");
        $this->model('hospital');
        $hostView= new HospitalView();

        $queue=$hostView->getAll();

        include './../app/header.php';
        $this->view('manager/viewHospital',$queue);
        include './../app/footer.php';
        // echo "asas";
    }

    public function newHospital(){
        $this->checkPermission("MGR");
        if($_POST['newHospital']){
            $this->model('hospital');
            $newHospital = new HospitalView();
            $result= $newHospital->setValue($this->valValidate($_POST['name']),$this->valValidate($_POST['address']),$this->valValidate($_POST['hospitalContactNo']));
            $result= $newHospital->create();
            header("Location: ./index");
            exit;
        }
    }

}