<?php

class Roster extends Controller{

    public function index(){
        $this->checkPermission("MGR");
        include './../app/header.php';
        $this->view('manager/rosterHome');
        include './../app/footer.php';
        // echo "asas";
    }
    public function createNew(){
        $this->checkPermission("MGR");
        include './../app/header.php';
        $this->view('manager/createRoster');
        include './../app/footer.php';
        // echo "asas";
    }
}