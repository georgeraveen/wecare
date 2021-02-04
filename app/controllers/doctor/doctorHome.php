<?php

class DoctorHome extends Controller{

    public function index(){
        $this->checkPermission("DOC");
        include './../app/header.php';
        $this->view('doctor/doctorHome');
        include './../app/footer.php';
    }

}