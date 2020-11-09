<?php

class viewReports extends Controller{

    public function index(){
        $this->checkPermission("MGR");
        include './../app/header.php';
        $this->view('manager/viewReports');
        include './../app/footer.php';
        // echo "asas";
    }

}