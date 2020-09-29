<?php
require_once("./../config/config.php");
include './../header.php';
include './../classes/employee.php';
include './../classes/hospital.php';
include './../classes/customer.php';
include './../classes/claimCase.php';

$employee= new Employee($DB);
$hospital= new Hospital($DB);
$customer= new Customer($DB);
$claimCase= new ClaimCase($DB);

$claimQueue = $claimCase->getAllQueue();
var_dump($claimQueue);
?>

<link rel="stylesheet" href= "./../css/home.css">
<link rel="stylesheet" href= "./../css/style.css">
<div class="containers">
  <h1>View Insurance Claim Cases</h1><br>
  <div class="table-container">
    
    
  </div>
</div>

<?php

// var_dump($meds);
include './../footer.php';
?>