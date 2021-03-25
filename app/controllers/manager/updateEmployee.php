<?php

class updateEmployee extends Controller{

   /* public function index(){
        $this->checkPermission("MGR");
        include './../app/header.php';
        $this->view('manager/updateEmployee');
        include './../app/footer.php';
        // echo "asas";
    }*/

    public function viewEmployee(){
        $this->checkPermission("MGR");
        $this->model('employee');
        $empView= new Employee();
        // var_dump($employee);
        $queue=$empView->getAllView();
        include './../app/header.php';
        $this->view('manager/viewEmployee',$queue);
        include './../app/footer.php';
    }

    public function editEmployee(){
        $this->checkPermission("MGR");
        $this->model('employee');
        $editEmp= new Employee();
        if($this->valValidate($_GET['action'])=="edit"){
            $empDetails=$editEmp->getDetails($this->valValidate($_GET['id']));
            $empContactDetails=$editEmp->getContactDetails($this->valValidate($_GET['id']));
            if(($_GET['type'])==="FAG"){
                $fagDetails=$editEmp->fagDetails($this->valValidate($_GET['id']));
                
            }
            elseif (($_GET['type'])==="DOC") {
                $docDetails=$editEmp->docDetails($this->valValidate($_GET['id']));
                
            }
            elseif (($_GET['type'])==="DEO") {
                $deoDetails=$editEmp->deoDetails($this->valValidate($_GET['id']));
                
            }
            else{
                $fagDetails="";
                $docDetails="";
                $deoDetails="";
            }
            include './../app/header.php';
            $this->view('manager/editEmployee',['id'=>$this->valValidate($_GET['id']),'empDetails'=>$empDetails,'empContactDetails'=>$empContactDetails,'fagDetails'=>$fagDetails,'docDetails'=>$docDetails,'deoDetails'=>$deoDetails]);
            include './../app/footer.php';
        }
        else{
            header("Location: ./viewEmployee");
            exit;
        }
    }

    public function updateEmployee(){
        try{
            $this->checkPermission("MGR");
            if($_POST['editEmployee']){
                $this->model('employee');
                $editEmployee = new Employee();
                $editEmployee->startTrans();
                $result= $editEmployee->setValue($this->valValidate($_POST['empFirstName']),$this->valValidate($_POST['empLastName']),$this->valValidate($_POST['gender']),$this->valValidate($_POST['empDOB']),$this->valValidate($_POST['empNIC']),$this->valValidate($_POST['empAddress']),$this->valValidate($_POST['email']),$this->valValidate($_POST['empTypeID']),$this->valValidate($_POST['empContactNo']));
                $result= $editEmployee->update($this->valValidate($_POST['empID']));
                if ($_POST['empTypeID']==="FAG"){
                    $result= $editEmployee->deleteFAG($_POST['empID']);
                    $reslut= $editEmployee->setValueFAG($this->valValidate($_POST['empSp']));
                    $result= $editEmployee->createFAG($_POST['empID']);
                }
                elseif ($_POST['empTypeID']==="DOC"){
                    $result= $editEmployee->deleteDOC($_POST['empID']);
                    $reslut= $editEmployee->setValueDOC($this->valValidate($_POST['empSp']));
                    $result= $editEmployee->createDOC($_POST['empID']);
                }
                elseif ($_POST['empTypeID']==="DEO"){
                    $result= $editEmployee->deleteDEO($_POST['empID']);
                    $reslut= $editEmployee->setValueDEO($this->valValidate($_POST['empSp']));
                    $result= $editEmployee->createDEO($_POST['empID']);
                }
                $_SESSION["successMsg"]="Successfully Updated";
                $editEmployee->transCommit();
                header("Location: ./viewEmployee");
                exit;
            }
        }
        catch(\Throwable $th){
            $editEmployee->transRollBack();
            $_SESSION["errorMsg"]="Error occured when updating the profile.";
            header("Location: ./viewEmployee");
        }
    }

    public function deleteEmployee(){
        try{
            $this->checkPermission("MGR");
            $this->model('employee');
            $deleteEmp= new Employee();
            $deleteEmp->startTrans();
            if($this->valValidate($_GET['action'])=="delete"){
                $result= $deleteEmp->updateStatus($this->valValidate($_GET['id']));
                $_SESSION["successMsg"]="Successfully Deleted";
                $deleteEmp->transCommit();
                header("Location: ./viewEmployee");
            }
            else{
                header("Location: ./viewEmployee");
                exit;
            }
        }
        catch(\Throwable $th){
            $deleteEmp->transRollBack();
            $_SESSION["errorMsg"]="Error occured when deleting the profile.";
            header("Location: ./viewEmployee");
        }
    }

    public function resetPass(){
        var_dump($_POST);
    }

}