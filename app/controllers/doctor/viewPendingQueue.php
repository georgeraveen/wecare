<?php

class viewPendingQueue extends Controller{

    public function index(){
        $this->checkPermission("DOC");
        $this->model('claimcase');
        $pendingQueue= new ClaimCase();
        $queue=$pendingQueue->getDoctorList();
        include './../app/header.php';
        $this->view('doctor/viewPendingQueue', $queue);
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