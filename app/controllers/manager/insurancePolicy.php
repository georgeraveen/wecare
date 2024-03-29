<?php

class insurancePolicy extends Controller{

    public function index(){
        $this->checkPermission("MGR");
        $this->model('insurePolicy');
        $policyView= new InsurePolicy();
        $queue=$policyView->getAll();
        include './../app/header.php';
        $this->view('manager/updateInsurancePolicy',$queue);
        include './../app/footer.php';
        //var_dump($queue);
    }

    public function newInsurancepolicy(){
        $this->checkPermission("MGR");
        include './../app/header.php';
        $this->view('manager/newInsurancePolicy');
        include './../app/footer.php';
        // echo "asas";
    }

    public function addPolicy(){
        $this->checkPermission("MGR");
        try{
            if($_POST['addNew']){
                $this->model('insurePolicy');
                $newPolicy = new InsurePolicy();
                $result= $newPolicy->setValue($this->valValidate($_POST['date']), $this->valValidate($_POST['remarks']), $this->valValidate($_POST['vPremium']),
                                                                    $this->valValidate($_POST['rPremium']));
                $last_id= $newPolicy->create();
                
                if(! is_dir("./../documents/policy/".$this->valValidate($last_id))) {
                    mkdir("./../documents/policy/".$this->valValidate($last_id));
                }
                $errors= array();
                
                for ($i=0; $i < count($_FILES['policyFile']['name']) ; $i++) { 
                    $file_name = $_FILES['policyFile']['name'][$i];
                    $file_size =$_FILES['policyFile']['size'][$i];
                    $file_tmp =$_FILES['policyFile']['tmp_name'][$i];
                    $file_type=$_FILES['policyFile']['type'][$i];
                    $file_ext=strtolower(end(explode('.',$_FILES['policyFile']['name'][$i])));
                    
                    $extensions= array("jpeg","jpg","png","pdf");
                    
                    if(in_array($file_ext,$extensions)=== false){
                        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
                    }
                    
                    if($file_size > 2097152){
                        $errors[]='File size must be excately 2 MB';
                    }
                    
                    if(empty($errors)==true){
                        move_uploaded_file($file_tmp,"./../documents/policy/".$this->valValidate($last_id)."/".$file_name);
                        echo "Success";
                    }else{
                        print_r($errors);
                    }
                }
                $_SESSION["successMsg"]="New policy added successfully";
                header("Location: ./index");
                exit;
                }
            }
            catch (\Throwable $th) {
                $_SESSION["errorMsg"]="Error occured when adding policy";
                header("Location: ./index");
            }
    }
    public function viewFil($filePath,$fileName,$type){
        $this->checkPermission("MGR");
        $this->viewFile("policy/".$filePath."/".$fileName.".".$type,$type);
    }
    public function editPolicy(){
        $this->checkPermission("MGR");
        $this->model('insurePolicy');
        $editPolicy= new InsurePolicy();
        if($this->valValidate($_GET['action'])=="edit"){
            $policyDetails=$editPolicy->getDetails($this->valValidate($_GET['id']));
            include './../app/header.php';
            $this->view('manager/editPolicy',['id'=>$this->valValidate($_GET['id']),'policyDetails'=>$policyDetails]);
            include './../app/footer.php';
        }
        else{
            header("Location: ./index");
            exit;
        }
    }
    public function updatePolicy(){
        $this->checkPermission("MGR");
        try { 
            if($_POST['update']){
                $this->model('insurePolicy');
                $editClaimCase = new InsurePolicy();
                $result= $editClaimCase->setValue($this->valValidate($_POST['date']),$this->valValidate($_POST['remarks']),$this->valValidate($_POST['vPremium']),
                        $this->valValidate($_POST['rPremium']));
                    
                $result= $editClaimCase->update($this->valValidate($_POST['policyID']));
                
                //upload a file
                if(! is_dir("./../documents/policy/".$this->valValidate($_POST['policyID']))) {
                    mkdir("./../documents/policy/".$this->valValidate($_POST['policyID']));
                }
                $filesToDelete=explode(',',$_POST['deleteFile']);
                if(count($filesToDelete)>1){
                    var_dump($filesToDelete);
                    $dir ="./../documents/policy/". $this->valValidate(($_POST['policyID']));
                        $ls = scandir($dir);
                        var_dump($ls);
                    for ($i=1; $i <count($filesToDelete) ; $i++) { 
                        unlink($dir."/".$ls[$filesToDelete[$i]]);
                    }
                }
                $errors= array();
                var_dump(($_FILES['policyFile']["name"]));
                if($_FILES['policyFile']["name"][0]!=""){
                for ($i=0; $i < count($_FILES['policyFile']['name']) ; $i++) { 
                    $file_name = $_FILES['policyFile']['name'][$i];
                    $file_size =$_FILES['policyFile']['size'][$i];
                    $file_tmp =$_FILES['policyFile']['tmp_name'][$i];
                    $file_type=$_FILES['policyFile']['type'][$i];
                    $file_ext=strtolower(end(explode('.',$_FILES['policyFile']['name'][$i])));
                    
                    $extensions= array("jpeg","jpg","png","pdf");
                    
                    if(in_array($file_ext,$extensions)=== false){
                        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
                        throw new Exception("Error Processing Request", 1);
                        
                    }
                    
                    if($file_size > 2097152){
                        $errors[]='File size must be excately 2 MB';
                        throw new Exception("Error Processing Request", 1);
                    }
                    
                    if(empty($errors)==true){
                        move_uploaded_file($file_tmp,"./../documents/policy/".$this->valValidate($_POST['policyID'])."/".$file_name);
                        echo "Success";
                    }else{
                        print_r($errors);
                    }
                }
                }
                $_SESSION["successMsg"]="Insurance policy updated successfully";
                header("Location: ./index");
                exit;
            }
        } 
        catch (\Throwable $th) {
            echo $th;
            $_SESSION["errorMsg"]="Error occured when updating insurance policy";
            header("Location: ./index");
        }
    }
    public function deletePolicy(){
        try{
            $this->checkPermission("MGR");
            $this->model('insurePolicy');
            $deletePolicy= new InsurePolicy();
            if($this->valValidate($_GET['action'])=="delete"){
                $result= $deletePolicy->updateStatus($this->valValidate($_GET['id']));
                $_SESSION["successMsg"]="Successfully Deleted";
                header("Location: ./index");
            }
            else{
                header("Location: ./index");
                exit;
            }
        }
        catch(\Throwable $th){
            $_SESSION["errorMsg"]="Error occured when deleting the insurance policy.";
            header("Location: ./index");
        }
    }

}