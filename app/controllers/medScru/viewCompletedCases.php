<?php

class viewCompletedCases extends Controller{
    
    public function index(){
        $this->checkPermission("MED");
        include './../app/header.php';
        $this->view('medScru/completedCases');
        include './../app/footer.php';
    }
    public function viewCase(){
        $this->checkPermission("MED");
        //echo $_SESSION["user_id"];
        
        $this->model('claimCase');
        $claimCase= new ClaimCase();
        //filters
        $this->model('hospital');
        $hospitalMod= new Hospital();
        $hospList=$hospitalMod->getAllNames();

        $this->model('employee');
        $empMod= new Employee();
        $fagList=$empMod->getEmpByTypeList("FAG");
        $docList=$empMod->getEmpByTypeList("DOC");
        $filterParams=['date'=>$this->valValidate($_GET['dischargeDate']),
                        'status'=>$this->valValidate($_GET['status']),
                        'hospital'=>$this->valValidate($_GET['hospital']),
                        'fag'=>$this->valValidate($_GET['fag']),
                        'doc'=>$this->valValidate($_GET['doc'])];
        $filter="";
        if($filterParams['date']!=""){
            $filter="i.dischargeDate='".$filterParams['date']."'";
        }
        if($filterParams['status']!=""){
            $filter= $filter.($filter=="" ? "":" and "). "i.caseStatus='". $filterParams['status']."'";
        }
        else{
            $filter= $filter.($filter=="" ? "":" and "). "(i.caseStatus='Completed' OR i.caseStatus='Rejected')";
        }
        if($filterParams['hospital']!=""){
            $filter= $filter.($filter=="" ? "":" and "). "i.hospitalID='".$filterParams['hospital']."'";
        }
        if($filterParams['fag']!=""){
            $filter= $filter.($filter=="" ? "":" and "). "i.FieldAgID='".$filterParams['fag']."'";
        }
        if($filterParams['doc']!=""){
            $filter= $filter.($filter=="" ? "":" and "). "i.doctorID='".$filterParams['doc']."'";
        }
        if($filter!=""){
            $filter= " where ".$filter;
        }
        if(is_int((int)$_GET['page'])){
            $queue=$claimCase->getAllQueueLimitCompleted((int)$_GET['page'],$filter);
        }
        else{
            $queue=$claimCase->getAllQueueLimitCompleted(0,$filter);
        }
        $pagination= $claimCase->getAllCountCompleted($filter)[0]['cnt'];
        include './../app/header.php';
        $this->view('medScru/completedCases',["queue"=>$queue,"pagination"=>$pagination,'hospList'=>$hospList,'fagList'=>$fagList,'docList'=>$docList,'filter'=>$filter]);
        include './../app/footer.php';

    }


}