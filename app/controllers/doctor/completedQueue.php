<?php

class completedQueue extends Controller{

    public function index(){
        $this->checkPermission("DOC");
        //$this->model('claimcase');
        //$pendingQueue= new ClaimCase();
        //$doctorID=$_SESSION["user_id"];
        //$queue=$pendingQueue->getDoctorList( $doctorID);       
        include './../app/header.php';
        $this->view('doctor/completedQueue');
        include './../app/footer.php';
        // echo "asas";
    }
}
?>