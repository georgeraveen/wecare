<?php

class viewPendingQueue extends Controller{

    public function index(){
        $this->checkPermission("FAG");
        $this->model('claimcase');
        $pendingQueue= new ClaimCase();
        $fieldAgID=$_SESSION["user_id"];
        $queue=$pendingQueue->getFieldAgList( $fieldAgID); 
        include './../app/header.php';
        $this->view('fieldAgent/viewPendingQueue' ,$queue);
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


    // public function index(){
    //    // $this->checkPermission("DOC");
    //     $this->model('claimcase');
    //     $pendingQueue= new ClaimCase();
    //     $doctorID=$_SESSION["user_id"];
    //     $queue=$pendingQueue->getDoctorList( $doctorID);       
    //     include './../app/header.php';
    //     $this->view('doctor/viewPendingQueue', $queue);
    //     include './../app/footer.php';
    //     // echo "asas";
    // }
}