<?php
require_once("./../../config/config.php");
include './../../classes/claimCase.php';

if($_POST){
    if($_POST['newInsurance']){
        $newClaimCase = new ClaimCase($DB);
        $result= $newClaimCase->create($_POST['customer'],$_POST['hospital'],$_POST['admitDate'],$_POST['dischargeDate'],$_POST['icuFromDate'],$_POST['icuToDate'],$_POST['medScrut'],$_POST['fieldAg'],$_POST['healthCondition']);
        header("Location: ./../newInsureCase");
    }
    else{
        
    }
}


?>