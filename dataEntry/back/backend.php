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
        $result= $newClaimCase->create($_POST['customer'],$_POST['hospital'],$_POST['admitDate'],$_POST['dischargeDate'],$_POST['icuFromDate'],$_POST['icuToDate'],$_POST['medScrut'],$_POST['fieldAg'],$_POST['healthCondition']);
        header("Location: ./../newInsureCase");
        exit;
    }
    else{
        

    }
}
if($_GET){
    if($_GET['action']=="del"){
        $deleteCase = new ClaimCase($DB);
        $result= $deleteCase->deleteCase($_GET['id']);
        if($result){
            echo "Delete succeeded";
        }
        else{
            echo "Delete failed";
        }
        sleep(1);
        header("Location: ./../viewCases") ;
    }
}


?>