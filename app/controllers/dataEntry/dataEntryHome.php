<?php

class DataEntryHome extends Controller{

    public function index(){
        include './../app/header.php';
        $this->view('dataEntry/dataEntryHome');
        include './../app/footer.php';
        // echo "asas";
    }

}