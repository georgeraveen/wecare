<?php

class hospital extends Controller{

    public function index(){
        $this->checkPermission("MGR");
        include './../app/header.php';
        $this->view('manager/viewHospital');
        include './../app/footer.php';
        // echo "asas";
    }

}