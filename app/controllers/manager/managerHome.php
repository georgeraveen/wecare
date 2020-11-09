<?php

class ManagerHome extends Controller{

    public function index(){
        $this->checkPermission("MGR");
        include './../app/header.php';
        $this->view('manager/managerHome');
        include './../app/footer.php';
        // echo "asas";
    }

}