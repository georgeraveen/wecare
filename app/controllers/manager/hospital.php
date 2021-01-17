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

}