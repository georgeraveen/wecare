<?php

class viewPendingQueue extends Controller{

    public function index(){
        $this->checkPermission("FAG");
        include './../app/header.php';
        $this->view('fieldAgent/viewPendingQueue');
        include './../app/footer.php';
        // echo "asas";
    }

    public function review(){
        $this->checkPermission("FAG");
        include './../app/header.php';
        $this->view('fieldAgent/updateCase');
        include './../app/footer.php';
        // echo "asas";
    }

}