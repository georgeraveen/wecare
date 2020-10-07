<?php
require_once("./../../config/config.php");
if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "") {
    // not logged in send to login page
    redirect("./../index.php");
  }
  if($_SESSION["rolecode"]!="DEO"){
    die("You dont have the permission to access this page");
  }
include './../../classes/claimCase.php';

if($_POST){
    if($_POST['newInsurance']){
        $newClaimCase = new ClaimCase($DB);
        $result= $newClaimCase->setValue($_POST['customer'],$_POST['hospital'],$_POST['admitDate'],$_POST['dischargeDate'],$_POST['icuFromDate'],$_POST['icuToDate'],$_POST['medScrut'],$_POST['fieldAg'],$_POST['healthCondition']);
        $result= $newClaimCase->create();
        header("Location: ./../newInsureCase.php");
        exit;
    }
    else if($_POST['editInsurance']){
        $editClaimCase = new ClaimCase($DB);
        $result= $editClaimCase->setValue($_POST['customer'],$_POST['hospital'],$_POST['admitDate'],$_POST['dischargeDate'],$_POST['icuFromDate'],$_POST['icuToDate'],$_POST['medScrut'],$_POST['fieldAg'],$_POST['healthCondition']);
        $result= $editClaimCase->update($_POST['claimID']);
        header("Location: ./../viewCases.php");
        exit;
    }
    if($_POST['newCustomer']){
        // $newClaimCase = new ClaimCase($DB);
        // $result= $newClaimCase->setValue($_POST['customer'],$_POST['hospital'],$_POST['admitDate'],$_POST['dischargeDate'],$_POST['icuFromDate'],$_POST['icuToDate'],$_POST['medScrut'],$_POST['fieldAg'],$_POST['healthCondition']);
        // $result= $newClaimCase->create();
        header("Location: ./../newCustomer.php");
        exit;
    }
}
if($_GET){
    if($_GET['action']=="delClaimCase"){
        $deleteCase = new ClaimCase($DB);
        $result= $deleteCase->deleteCase($_GET['id']);
        if($result){
            echo "Delete succeeded";
        }
        else{
            echo "Delete failed";
        }
        sleep(1);
        header("Location: ./../viewCases.php") ;
    }
}


?>