<?php

class viewReports extends Controller{

    public function index(){
        $this->checkPermission("MGR");
        include_once './../app/header.php';
        $this->view('manager/viewReports');
        include_once './../app/footer.php';
        // echo "asas";
    }

    public function overPayments(){
        $this->checkPermission("MGR");
        include './../app/header.php';
        $this->view('manager/overPayments');
        include './../app/footer.php';
    }

    public function reviewCasesFeedback(){
        $this->checkPermission("MGR");
       
        if($_POST['reviewCases']){
            $this->checkPermission("MGR");
            $this->model('claimCase');
            $caseView= new ClaimCase();
            $queue=$caseView->getAllReview($this->valValidate($_POST['fromDate']),$this->valValidate($_POST['toDate']),$this->valValidate($_POST['type']));
            var_dump($queue);
            include './../app/header.php';
            $this->view('manager/reviewCasesFeedback',$queue);
            include './../app/footer.php';
        }
        
    }

    public function employeePerformanceReport(){
        $this->checkPermission("MGR");
        include './../app/header.php';
        $this->view('manager/employeePerformanceReport');
        include './../app/footer.php';
    }

    public function viewCases(){
        $this->checkPermission("MGR");
        $this->model('claimCase');
        $caseView= new ClaimCase();
        if($this->valValidate($_GET['action'])=="edit"){
            $caseDetails=$caseView->viewCases($this->valValidate($_GET['id']));
            //var_dump($caseDetails);
            include './../app/header.php';
            $this->view('manager/viewCases',['id'=>$this->valValidate($_GET['id']),'caseDetails'=>$caseDetails]);
            include './../app/footer.php';
        }

    }

    public function overPaidCase(){
        
            $this->checkPermission("MGR");
            try{
            $this->model('claimCase');
            $overPaid= new ClaimCase();
            if($_POST['overPayment']){
                $reslut=$overPaid->overPayments($this->valValidate($_POST['claimID']),$this->valValidate($_POST['overPaidValue']),$this->valValidate($_POST['remark']));
                $_SESSION["successMsg"]="Case added to the over payments";
                header("Location: ./index");
                exit;
        }
    }catch(\Throwable $th){
        $_SESSION["errorMsg"]="Error occured when adding case";
        header("Location: ./index");
    }
    }

}