<?php

class viewPendingQueue extends Controller{

    public function index(){
        $this->checkPermission("DOC");
        $this->model('claimcase');
        $pendingQueue= new ClaimCase();
        $doctorID=$_SESSION["user_id"];
        $queue=$pendingQueue->getDoctorList( $doctorID);       
        include './../app/header.php';
        $this->view('doctor/viewPendingQueue', $queue);
        include './../app/footer.php';
        // echo "asas";
    }

    public function review(){
        $this->checkPermission("DOC");
        include './../app/header.php';
        $this->view('doctor/reviewAndComment');
        include './../app/footer.php';
        // echo "asas";
    }

    //doctor-pendingQueue edit
    public function editCase(){
        $this->checkPermission("DOC");
        $this->model('claimCase');
        $pendingQueue= new ClaimCase();
        $doctorID=$_SESSION["user_id"];
        $queue=$pendingQueue->getDoctorList( $doctorID);  
        $editCase= new ClaimCase();

        $this->model('customer');
        $customerMod= new Customer();

        $this->model('hospital');
        $hospitalMod= new Hospital();

        $this->model('employee');
        $empMod= new Employee();

       

        if($_GET['action']=="edit"){
           // $custList=$customerMod->getList();
           // $hospList=$hospitalMod->getAll();
           // $medList=$empMod->getEmpByTypeList("MED");
            //$fagList=$empMod->getEmpByTypeList("FAG");
            $caseDetails=$editCase->getDetails($this->valValidate($_GET['id']));
            //include './../app/header.php';
            $this->view('doctort/reviewAndComment',['id'=>$this->valValidate($_GET['id']),'customerNme'=>$customerNme,'claimID'=>$claimID,'admitDate'=>$admitDate,'ICUfromDate'=>$ICUfromDate,'disChargeDate'=>$disChargeDate,'ICUtoDate'=>$ICUtoDate,'hospital'=>$hospital,'condition'=>$condition]);
            include './../app/footer.php';
        }
        else{
            header("Location: ./viewPendingQueue");
            exit;
        }
    }
    public function updateCase(){
        $this->checkPermission("DOC");
        if($_POST['editInsurance']){
            $this->model('claimCase');
            $editClaimCase = new ClaimCase();
            $result= $editClaimCase->setValue($this->valValidate($_POST['customer']),$this->valValidate($_POST['hospital']),
                    $this->valValidate($_POST['admitDate']),$this->valValidate($_POST['dischargeDate']),$this->valValidate($_POST['icuFromDate']),
                    $this->valValidate($_POST['icuToDate']),$this->valValidate($_POST['medScrut']),$this->valValidate($_POST['fieldAg']),
                    $this->valValidate($_POST['healthCondition']));
            $result= $editClaimCase->update($this->valValidate($_POST['claimID']));
            header("Location: ./viewCase");
            exit;
        }
    }
   
  

}