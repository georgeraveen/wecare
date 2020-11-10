<?php

class viewReports extends Controller{

    public function index(){
        $this->checkPermission("MGR");
        include './../app/header.php';
        $this->view('manager/viewReports');
        include './../app/footer.php';
        // echo "asas";
    }

    public function overPayments(){
        $this->checkPermission("MGR");
        include './../app/header.php';
        $this->view('manager/overPayments');
        include './../app/footer.php';
    }

    public function reviewCasesFeedback(){
        $this->checkPermission("MGR");
        include './../app/header.php';
        $this->view('manager/reviewCasesFeedback');
        include './../app/footer.php';
    }

    public function employeePerformanceReport(){
        $this->checkPermission("MGR");
        include './../app/header.php';
        $this->view('manager/employeePerformanceReport');
        include './../app/footer.php';
    }

}