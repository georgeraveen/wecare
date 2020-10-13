<?php
require_once("./../config/config.php");

// echo $_SESSION["user_id"]." ";
//  echo $_SESSION["rolecode"];
//  print_r($_SESSION);
 if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "") {
    // not logged in send to login page
    redirect("./../index.php");
}
 if($_SESSION["rolecode"]!="DEO"){
    die("You dont have the permission to access this page");
 }
//  $status = FALSE;
//  if ( authorize($_SESSION["access"]["1"]["1"]["create"]) || 
//  authorize($_SESSION["access"]["1"]["1"]["edit"]) || 
//  authorize($_SESSION["access"]["1"]["1"]["view"]) || 
//  authorize($_SESSION["access"]["1"]["1"]["delete"]) ) {
//   $status = TRUE;
//  }
// //  print_r($_SESSION["access"]);
//  if ($status === FALSE) {
//  die("You dont have the permission to access this page");
//  }
 
 if (!isset($_SESSION["access"])) {

    try {
        $sql = "SELECT * from auth_module where 1 group by moduleGroupNo order by moduleGroupNo asc, moduleID asc";
        $stmt = $DB->prepare($sql);
        $stmt->execute();
        $commonModules = $stmt->fetchAll();

        $sql = "SELECT * from auth_module where 1 order by moduleGroupNo asc, moduleID asc";
        $stmt = $DB->prepare($sql);
        $stmt->execute();
        $allModules = $stmt->fetchAll();

        $sql = "SELECT * FROM employee_auth WHERE  empTypeID = :rc ORDER BY moduleID ASC";

        $stmt = $DB->prepare($sql);
        $stmt->bindValue(":rc", $_SESSION["rolecode"]);
        
        
        $stmt->execute();
        $userRights = $stmt->fetchAll();
        $_SESSION["access"] = set_rights($allModules, $userRights, $commonModules);
    } catch (Exception $ex) {

        echo $ex->getMessage();
    }
}
// if(authorize($_SESSION["access"]["1"]["1"]["create"])){
//     echo "create permission";
// }
// else{
//    echo "no create permission";
// }
include './../header.php';
?>
<link rel="stylesheet" href= "./../css/home.css">
<div class="grid-container">
  <a class="grid-item" href="./newInsureCase.php">Create new insurance claim case</a>
  <a class="grid-item" href="./newCustomer.php">Create new customer profile</a>
  <a class="grid-item" href="./updateCustomer.php">Manage customer profiles</a>  
  <a class="grid-item" href="./viewCases.php">View insurance claim cases</a>
  <a class="grid-item" href="./manageMedCondition.php">Manage medical condition</a>
</div>



<?php
include './../footer.php';
?>