<?php

class CustomerProfile extends Controller{

    public function index(){
        $this->checkPermissionCust("CUST");
        $this->model('customer');
        $custDetails = new customer();
        $custID = $_SESSION["user_id"];
        $details = $custDetails->getCustDeatail( $custID);
        //include './../app/header.php';
        $this->view('customer/customerProfile', $details);
        include './../app/footer.php';
    }
    public function updateCustDeatails(){
        $this->checkPermissionCust();
        try { 
            if($_POST['updateDetails']){
                $this->model('customer');
                $updateCust = new customer();
                $result= $updateCust->setValueUpdateCust($this->valValidate($_POST['custID']),
                        $this->valValidate($_POST['email']),
                        $this->valValidate($_POST['custAddress']));
                        
                    
                $result= $updateCust->updateCustomerDetails($this->valValidate($_POST['custID']));
            
           $_SESSION["successMsg"]="updated successfully";
            header("Location: ./index");
            exit;
            }
        }
    
        catch (\Throwable $th) {
           $_SESSION["errorMsg"]="Error occured when updating";
            header("Location: ./index");
       }
    }
}

  
  




