<?php

class viewPendingQueue extends Controller{

    public function index(){
        $this->checkPermission("DOC");
        include './../app/header.php';
        $this->view('doctor/viewPendingQueue');
        include './../app/footer.php';
        // echo "asas";
    }

    public function review(){
        $this->checkPermission("DOC");
        include './../app/header.php';
        $this->view('doctor/reviewAndComment');
        include './../app/footer.php';
        // echo "asas";
    }

}