<?php

class CustomerProfile extends Controller{

    public function index(){
        $this->checkPermissionCust("CUST");
        $this->model('customer');
        $custDetails = new customer();
        $custID = $_SESSION["user_id"];
        $details = $custDetails->getCustDeatail( $custID);
        include './../app/header.php';
        $this->view('customer/customerProfile', $details);
        include './../app/footer.php';
    }
    public function updateCustDeatails(){
        $this->checkPermissionCust("CUST");
       // try { 
            if($_POST['updateDetails']){
                $this->model('customer');
                $updateCust = new customer();
                $result= $updateCust->setValueUpdateCust($this->valValidate($_POST['claimID']),
                        $this->valValidate($_POST['email']),
                        $this->valValidate($_POST['custAddress']));
                        
                    
                $result= $updateCust->updatecustomerDetails($this->valValidate($_POST['claimID']));
            
          //  $_SESSION["successMsg"]="updated successfully";
           // header("Location: ./viewCase");
           // exit;
            }
    
        //catch (\Throwable $th) {
        //    $_SESSION["errorMsg"]="Error occured when updating";
         //   header("Location: ./viewCase");
       // }
    }
}

  
  




