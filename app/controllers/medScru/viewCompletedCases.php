<?php

class viewCompletedCases extends Controller{
    
    public function index(){
        $this->checkPermission("MED");
        include './../app/header.php';
        $this->view('medScru/completedCases');
        include './../app/footer.php';
    }
    public function reviewCase(){
        $this->checkPermission("MED");
        include './../app/header.php';
        $this->view('medScru/reviewCase');
        include './../app/footer.php';
    }


}