<?php

class viewRoster extends Controller{
    
    public function index(){
        $this->checkPermission("MED");
        include './../app/header.php';
        $this->view('medScru/viewRoster');
        include './../app/footer.php';
    }
}