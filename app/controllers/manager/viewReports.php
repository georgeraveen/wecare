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
        if($_POST['overPaid']){
           //echo "gfhf";
            $this->model('claimCase');
            $caseView= new ClaimCase();
            $queue=$caseView->getOverPaid($this->valValidate($_POST['fromDate']),$this->valValidate($_POST['toDate']));
            //var_dump($queue);
            include './../app/header.php';
            $this->view('manager/overPayments',$queue);
            include './../app/footer.php';
        }
    }

    public function reviewCasesFeedback(){
        $this->checkPermission("MGR");
       
        if($_POST['reviewCases']){
            $this->checkPermission("MGR");
            $this->model('claimCase');
            $caseView= new ClaimCase();
            $queue=$caseView->getAllReview($this->valValidate($_POST['fromDate']),$this->valValidate($_POST['toDate']),$this->valValidate($_POST['type']));
            //var_dump($queue);
            include './../app/header.php';
            $this->view('manager/reviewCasesFeedback',$queue);
            include './../app/footer.php';
        }
        
    }

    public function employeePerformanceReport(){

        $this->checkPermission("MGR");
        if($_POST['performance']){
           //echo "gfhf";
            $this->model('claimCase');
            $caseView= new ClaimCase();
            $queue=$caseView->performanceView($this->valValidate($_POST['fromDate']),$this->valValidate($_POST['toDate']));
            //var_dump($queue);
            include './../app/header.php';
            $this->view('manager/employeePerformanceReport',$queue);
            include './../app/footer.php';
        }
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
    public function viewOverPaid(){
        $this->checkPermission("MGR");
        $this->model('claimCase');
        $caseView= new ClaimCase();
        if($this->valValidate($_GET['action'])=="edit"){
            $caseDetails=$caseView->getOverPaidView($this->valValidate($_GET['id']));
            //var_dump($caseDetails);
            include './../app/header.php';
            $this->view('manager/viewOverPaid',['id'=>$this->valValidate($_GET['id']),'caseDetails'=>$caseDetails]);
            include './../app/footer.php';
        }
    }
    public function deleteOverPaid(){
        $this->checkPermission("MGR");
    try{
        $this->model('claimCase');
        $overPaid= new ClaimCase();
        if($this->valValidate($_GET['action'])=="delete"){
            $reslut=$overPaid->deleteOverPayments($this->valValidate($_GET['id']));
            $_SESSION["successMsg"]="Over payment deleted successfully.";
            header("Location: ./index");
            exit;
            }
        }catch(\Throwable $th){
            $_SESSION["errorMsg"]="Error occured when deleting over payment.";
            header("Location: ./index");
        }
    }
    public function updateOvePaid(){

        $this->checkPermission("MGR");
    try{
        $this->model('claimCase');
        $overPaid= new ClaimCase();
        if($_POST['editOverPaid']){
            $reslut=$overPaid->editOverPayments($this->valValidate($_POST['claimID']),$this->valValidate($_POST['overPaidValue']),$this->valValidate($_POST['remark']));
            $_SESSION["successMsg"]="Over payment updated successfully.";
            header("Location: ./index");
            exit;
            }
        }catch(\Throwable $th){
            $_SESSION["errorMsg"]="Error occured when updating over payment.";
            header("Location: ./index");
        }
    }
    public function performanceChart(){
        echo "Chart";
    }

}