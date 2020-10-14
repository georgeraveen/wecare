<?php
// require_once("./../config/config.php");

// echo $_SESSION["user_id"]." ";
//  echo $_SESSION["rolecode"];
//  print_r($_SESSION);
 if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "") {
    // not logged in send to login page
    $_SESSION["portal"]="employee";
    redirect("./../../employee");
}
 if($_SESSION["rolecode"]!="DEO"){
    die("You dont have the permission to access this page");
 }

 
// include './../header.php';
?>
<link rel="stylesheet" href= "./../../css/home.css">
<div class="grid-container">
  <a class="grid-item" href="./newInsureCase.php">Create new insurance claim case</a>
  <a class="grid-item" href="./newCustomer.php">Create new customer profile</a>
  <a class="grid-item" href="./updateCustomer.php">Manage customer profiles</a>  
  <a class="grid-item" href="./viewCases.php">View insurance claim cases</a>
  <a class="grid-item" href="./manageMedCondition.php">Manage medical condition</a>
</div>



<?php
// include './../footer.php';
?>