<?php

class viewCompletedQueue extends Controller{

    public function index(){

        $this->checkPermission("FAG");
       // $this->model('claimcase');
        //$pendingQueue= new ClaimCase();
        //$fieldAgID=$_SESSION["user_id"];
        //$queue=$pendingQueue->getFieldAgList( $fieldAgID); 
        include './../app/header.php';
        $this->view('fieldAgent/viewCompletedQueue');
        include './../app/footer.php';
        // echo "asas";
    }

   
}


?>