<?php

class insureCase extends Controller{
    
    public function index(){
        $this->checkPermission("DEO");
        $this->model('customer');
        $customerMod= new Customer();
        $custList=$customerMod->getList();

        $this->model('hospital');
        $hospitalMod= new Hospital();
        $hospList=$hospitalMod->getAll();

        $this->model('employee');
        $empMod= new Employee();
        $medList=$empMod->getEmpByTypeList("MED");

        $fagList=$empMod->getEmpByTypeList("FAG");
        // var_dump($hospList);

        include './../app/header.php';
        $this->view('dataEntry/newInsureCase',['custList'=>$custList,'hospList'=>$hospList,'medList'=>$medList,'fagList'=>$fagList]);
        include './../app/footer.php';
        // echo "asas";
    }
    public function newCase(){
        $this->checkPermission("DEO");
        // echo "hi";
        var_dump($_POST);
        if($_POST['newInsurance']){
            $this->model('claimCase');
            $newClaimCase = new ClaimCase();
            $result= $newClaimCase->setValue($_POST['customer'],$_POST['hospital'],$_POST['admitDate'],$_POST['dischargeDate'],$_POST['icuFromDate'],$_POST['icuToDate'],$_POST['medScrut'],$_POST['fieldAg'],$_POST['healthCondition']);
            $result= $newClaimCase->create();
            header("Location: ./index");
            exit;
        }
    }
    public function viewCase(){
        $this->checkPermission("DEO");
        $this->model('claimCase');
        $claimCase= new ClaimCase();
        // var_dump($claimCase);
        $queue=$claimCase->getAllQueue();

        include './../app/header.php';
        $this->view('dataEntry/viewCases',$queue);
        include './../app/footer.php';
    }
    public function editCase(){
        $this->checkPermission("DEO");
        $this->model('claimCase');
        $editCase= new ClaimCase();

        $this->model('customer');
        $customerMod= new Customer();

        $this->model('hospital');
        $hospitalMod= new Hospital();

        $this->model('employee');
        $empMod= new Employee();

        if($_GET['action']=="edit"){
            $custList=$customerMod->getList();
            $hospList=$hospitalMod->getAll();
            $medList=$empMod->getEmpByTypeList("MED");
            $fagList=$empMod->getEmpByTypeList("FAG");
            $caseDetails=$editCase->getDetails($_GET['id']);
            include './../app/header.php';
            $this->view('dataEntry/editInsureCase',['id'=>$_GET['id'],'caseDetails'=>$caseDetails,'custList'=>$custList,'hospList'=>$hospList,'medList'=>$medList,'fagList'=>$fagList]);
            include './../app/footer.php';
        }
        else{
            header("Location: ./viewCase");
            exit;
        }
    }
    public function updateCase(){
        $this->checkPermission("DEO");
        if($_POST['editInsurance']){
            $this->model('claimCase');
            $editClaimCase = new ClaimCase();
            $result= $editClaimCase->setValue($_POST['customer'],$_POST['hospital'],$_POST['admitDate'],$_POST['dischargeDate'],$_POST['icuFromDate'],$_POST['icuToDate'],$_POST['medScrut'],$_POST['fieldAg'],$_POST['healthCondition']);
            $result= $editClaimCase->update($_POST['claimID']);
            header("Location: ./viewCase");
            exit;
        }
    }
    public function deleteCase(){
        $this->checkPermission("DEO");
        if($_GET['action']=="delClaimCase"){
            $this->model('claimCase');
            $deleteCase = new ClaimCase();
            $result= $deleteCase->deleteCase($_GET['id']);
            if($result){
                echo "Delete succeeded";
            }
            else{
                echo "Delete failed";
            }
            sleep(1);
            header("Location: ./viewCase") ;
        }
    }
}