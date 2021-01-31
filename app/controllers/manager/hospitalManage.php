<?php

class hospitalManage extends Controller{

    public function index(){
        $this->checkPermission("MGR");
        $this->model('hospital');
        $hostView= new Hospital();

        $queue=$hostView->getAll();

        include './../app/header.php';
        $this->view('manager/viewHospital',$queue);
        include './../app/footer.php';
        // echo "asas";
    }

    public function newHospital(){
        try{
            $this->checkPermission("MGR");
            if($_POST['newHospital']){
                $this->model('hospital');
                $newHospital = new Hospital();
                $newHospital->startTrans();
                $result= $newHospital->setValue($this->valValidate($_POST['name']),$this->valValidate($_POST['address']),$this->valValidate($_POST['hospitalContactNo']));
                $result= $newHospital->create();
                $_SESSION["successMsg"]="New hospital added successfully";
                $newHospital->transCommit();
                header("Location: ./index");
                exit;
        }
    }
    catch(\Throwable $th){
        $newHospital->transRollBack();
        $_SESSION["errorMsg"]="Error occured when adding a new hospital.";
        header("Location: ./index");
    }
    }

    public function editHospital(){
        $this->checkPermission("MGR");
        $this->model('hospital');
        $editHost= new Hospital();
        if($this->valValidate($_GET['action'])=="edit"){

            $hostDetails=$editHost->getDetails($this->valValidate($_GET['id']));

            $hostContactDetails=$editHost->getContactDetails($this->valValidate($_GET['id']));
            
            include './../app/header.php';
            $this->view('manager/editHospital',['id'=>$this->valValidate($_GET['id']),'hostDetails'=>$hostDetails,'hostContactDetails'=>$hostContactDetails]);
            include './../app/footer.php';
        }
        else{
            header("Location: ./index");
            exit;
        }
}

    public function deleteHospital(){
        try{
            $this->checkPermission("MGR");
            $this->model('hospital');
            $editHost= new Hospital();
            $editHost->startTrans();
            if ($this->valValidate($_GET['action'])=="delete") {
                $result= $editHost->updateStatus($this->valValidate($_GET['id']));
                $_SESSION["successMsg"]="Hospital deleted successfully";
                $editHost->transCommit();
                header("Location: ./index");
            }
            else{
                header("Location: ./index");
                exit;
            }
    }
    catch(\Throwable $th){
        $editHost->transRollBack();
        $_SESSION["errorMsg"]="Error occured when deleting the hospital.";
        header("Location: ./index");
    }
    }

    public function updateHospital(){
        try{
            $this->checkPermission("MGR");
            if($_POST['newHospital']){
                $this->model('hospital');
                $editHospital = new Hospital();
                $editHospital->startTrans();
                $result= $editHospital->setValue($this->valValidate($_POST['name']),$this->valValidate($_POST['address']),$this->valValidate($_POST['hospitalContactNo']));
                $result= $editHospital->update($this->valValidate($_POST['hospitalID']));
                $_SESSION["successMsg"]="Successfully updated";
                $editHospital->transCommit();
                header("Location: ./index");
                exit;
        }
    }
    catch(\Throwable $th){
        $editHospital->transRollBack();
        $_SESSION["errorMsg"]="Error occured when updating data.";
        header("Location: ./index");
    }
    }

}