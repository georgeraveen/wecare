<?php

class viewPendingCases extends Controller{
    
    public function index(){
        $this->checkPermission("MED");
        include './../app/header.php';
        $this->view('medScru/pendingCases');
        include './../app/footer.php';
    }
}