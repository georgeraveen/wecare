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

}