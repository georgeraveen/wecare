<?php

class CustomerProfile extends Controller{

    public function index(){
        $this->checkPermissionCust("CUST");
        $this->model('customer');
        $custDetails = new customer();
        $custID = $_SESSION["user_id"];
        $details = $custDetails->getCustByID( $custID);
        $contact= $custDetails->getCustContactByID($custID);
        $policy=$custDetails->getCustInsuranceByID($custID);
        include './../app/header.php';
        $this->view('customer/customerProfile', [$details,$contact,$policy]);
        include './../app/footer.php';
    }
   
    public function updateCustDeatails(){
        $this->checkPermissionCust();
        try { 
            if($_POST['updateDetails']){
                $this->model('customer');
                $updateCust = new customer();
                $updateCust->startTrans();

                $result= $updateCust->setValueUpdateCust($this->valValidate($_SESSION["user_id"]),
                        $this->isEmail($_POST['email']),
                        $this->valValidate($_POST['custAddress']),$this->valValidate($_POST['custContact']));
                        
                    
                $result= $updateCust->updateCustomerDetails($this->valValidate($_SESSION["user_id"]));
            
                $_SESSION["successMsg"]="updated successfully";
                $updateCust->transCommit();
                header("Location: ./index");
            exit;
            }
        }
    
        catch (\Throwable $th) {
           $_SESSION["errorMsg"]="Error occured when updating ".$th->getMessage();
            $updateCust->transRollBack();
            header("Location: ./index");
       }
    }
    public function viewFil($filePath,$fileName,$type){
        $this->checkPermission("CUST");
       try {
    //        $this->model('customer');
     //       $viewPolicyDocument= new Customer();
           // $isPermission = $viewPolicyDocument->checkPermissionCust();
           // if(count($isPermission)){
                $this->viewFile("policy/".$filePath."/".$fileName.".".$type,$type);
           // }
            ///else{
             //   $this->permissionError();
           // }
        } catch (\Throwable $th) {
          //  $this->permissionError();
        }
        
    }  
}

  
  





  
  




