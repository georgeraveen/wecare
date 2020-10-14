<?php
    include './../app/config/config.php';
class CustViewCases extends Controller{
    
    public function index(){
        $this->checkPermissionCust();
        $this->model('claimCase');
        $claimCase= new ClaimCase();
        // var_dump($claimCase);
        $queue=$claimCase->getAllQueue();

        include './../app/header.php';
        $this->view('customer/custViewCases',$queue);
        include './../app/footer.php';
    }

}