<?php

class medScruHome extends Controller{

    public function index(){
        $this->checkPermission("MED");
        include './../app/header.php';
        $this->view('medScru/medScruHome');
        include './../app/footer.php';
    }

}