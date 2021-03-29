<?php
    include './../app/config/config.php';
    
class CustViewCases extends Controller{
    
    public function index(){
        $this->checkPermissionCust();
        $this->model('claimCase');
        $claimCase= new ClaimCase();
        // var_dump($claimCase);
        $queue=$claimCase->getAllCustCases($_SESSION['user_id']);

        include './../app/header.php';
        $this->view('customer/custViewCases',$queue);
        include './../app/footer.php';
    }
    public function addFeedback(){
        $this->checkPermissionCust();
        try { 
            if($_POST['addFeedback']){
                $this->model('claimCase');
                $addFeedback = new ClaimCase();
               //$addFeedback->startTrans();
            //var_dump($_POST['claimID']);
                $result= $addFeedback->setFeedbackValue($this->valValidate($_POST['claimID']),
                        $this->valValidate($_POST['custFeedback']));
                       
                $result= $addFeedback->addFeedback();
            
                $_SESSION["successMsg"]="updated successfully";
              //$addFeedback->transCommit();
                header("Location: ./index");
            exit;
            }
       }
    
        catch (\Throwable $th) {
          $_SESSION["errorMsg"]="Error occured when updating";
            //$updateCust->transRollBack();
            header("Location: ./index");
       }
    }

    }