<?php

class viewPendingCases extends Controller{
    
    public function index(){
        $this->checkPermission("MED");
        include './../app/header.php';
        $this->view('medScru/pendingCases');
        include './../app/footer.php';
    }
    public function viewCase(){
        $this->checkPermission("MED");
        include './../app/header.php';
        $this->view('medScru/insuranceCase');
        include './../app/footer.php';
    }

}