<?php

class fieldAgHome extends Controller{

    public function index(){
        $this->checkPermission("FAG");
        include './../app/header.php';
        $this->view('fieldAgent/fieldAgHome');
        include './../app/footer.php';
        // echo "asas";
    }

}