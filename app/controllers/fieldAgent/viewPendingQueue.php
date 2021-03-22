<?php

class viewPendingQueue extends Controller{

    public function index(){
        $this->checkPermission("FAG");
        $this->model('claimcase');
        $pendingQueue= new ClaimCase();
        $fieldAgID=$_SESSION["user_id"];
        $queue=$pendingQueue->getFieldAgList( $fieldAgID); 
        include './../app/header.php';
        $this->view('fieldAgent/viewPendingQueue' ,$queue);
        include './../app/footer.php';
        // echo "asas";
    }

    //  public function review(){
    //      $this->checkPermission("FAG");
    //      include './../app/header.php';
    //     $this->view('fieldAgent/viewCompletedQueue');
    //      include './../app/footer.php';
    //      // echo "asas";
    //  }

//single case edit
    public function editCase(){
        $this->checkPermission("FAG");
        $this->model('claimCase');
        $caseDetails= new ClaimCase();
        $fieldAgID=$_SESSION["user_id"];
        $singleCaseDetails=$caseDetails->getCaseDetailsFieldAg($this->valValidate($_GET['id']),$fieldAgID);  
      

       

        if($_GET['action']=="edit"){
            
            include './../app/header.php';
            $this->view('fieldAgent/updateCase',['id'=>$this->valValidate($_GET['id']),'singleCaseDetails'=>$singleCaseDetails]);
            include './../app/footer.php';
        }

       
        else{
            header("Location: ./viewPendingQueue");
          
            exit;
        }
    }
    //update Single case details
    public function updateCase(){
        $this->checkPermission("FAG");
        try { 
            if($_POST['editSingleCaseDetails']){
                $this->model('claimCase');
                $editClaimCase = new ClaimCase();
                $result= $editClaimCase->setValueFag($this->valValidate($_POST['claimID']),
                        $this->valValidate($_POST['admitDate']),$this->valValidate($_POST['ICUfromDate']),$this->valValidate($_POST['dischargeDate']),
                        $this->valValidate($_POST['ICUtoDate']));
                    
                $result= $editClaimCase->updateSingleCaseFag($this->valValidate($_POST['claimID']));
                
                //upload a file
                if(! is_dir("./../documents/claimCases/".$this->valValidate($_POST['claimID']))) {
                    mkdir("./../documents/claimCases/".$this->valValidate($_POST['claimID']));
                }
                $filesToDelete=explode(',',$_POST['deleteFile']);
                if(count($filesToDelete)>1){
                    var_dump($filesToDelete);
                    $dir ="./../documents/claimCases/". $this->valValidate(($_POST['claimID']));
                        $ls = scandir($dir);
                        var_dump($ls);
                    for ($i=1; $i <count($filesToDelete) ; $i++) { 
                        unlink($dir."/".$ls[$filesToDelete[$i]]);
                    }
                }
                $errors= array();
                // var_dump($_FILES);
                for ($i=0; $i < count($_FILES['fileToUpload']['name']) ; $i++) { 
                    $file_name = $_FILES['fileToUpload']['name'][$i];
                    $file_size =$_FILES['fileToUpload']['size'][$i];
                    $file_tmp =$_FILES['fileToUpload']['tmp_name'][$i];
                    $file_type=$_FILES['fileToUpload']['type'][$i];
                    $file_ext=strtolower(end(explode('.',$_FILES['fileToUpload']['name'][$i])));
                    
                    $extensions= array("jpeg","jpg","png","pdf");
                    
                    if(in_array($file_ext,$extensions)=== false){
                        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
                    }
                    
                    if($file_size > 2097152){
                        $errors[]='File size must be excately 2 MB';
                    }
                    
                    if(empty($errors)==true){
                        move_uploaded_file($file_tmp,"./../documents/claimCases/".$this->valValidate($_POST['claimID'])."/".$file_name);
                        echo "Success";
                    }else{
                        print_r($errors);
                    }
                }
                $_SESSION["successMsg"]="Case updated successfully";
                header("Location: ./viewCase");
                exit;
            }
        } 
        catch (\Throwable $th) {
            $_SESSION["errorMsg"]="Error occured when updating";
            header("Location: ./viewCase");
        }
    }
    public function viewFil($filePath,$fileName,$type){
        $this->checkPermission("FAG");
        try {
            $this->model('claimCase');
            $caseDetails= new ClaimCase();
            $isPermission = $caseDetails->checkCasePermission($filePath,"FAG",$_SESSION["user_id"]);
            if(count($isPermission)){
                $this->viewFile("claimCases/".$filePath."/".$fileName.".".$type,$type);
            }
            else{
                $this->permissionError();
            }
        } catch (\Throwable $th) {
            $this->permissionError();
        }
        
    }  
  
   
   
   
}

