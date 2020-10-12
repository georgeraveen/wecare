<?php
require_once("./../config/config.php");
if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "") {
  // not logged in send to login page
  redirect("./../index.php");
}
if($_SESSION["rolecode"]!="CUST"){
  die("You dont have the permission to access this page");
}
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
// var_dump($claimQueue);
// echo $claimQueue->num_rows."sdsd";

?>

<!-- <link rel="stylesheet" href= "./../css/home.css">   -->
<link rel="stylesheet" href= "./../css/custStyle.css">
<link rel="stylesheet" href= "./../css/custStyle2.css">

<img src="./../images/undraw_progress_data_4ebj.svg" class="img-background img-right">
<div class="containers">

  <h1>View My Insurance Claim Cases</h1><br>
  <div class="table-container">
    <table class="table-view">
      <tr>
        <th>ID</th>
        <th>Discharge Date</th>
        <th>Status</th>
        <th>Hospital</th>
        <th>Claim Amount</th>
        <th>Feedback</th>
      </tr>
      <?php
      foreach($claimQueue as $row){
        echo "<tr>"."<td>".$row['claimID']."</td>".
              "<td>".$row['dischargeDate']."</td>".
              "<td>".$row['claimID']."</td>".
              "<td>".$row['name']."</td>".
              "<td>".$row['payableAmount']."</td>".
              "<td> <a class=\"editBtn\" href=\"#\">Add</a> "."</td>"."</tr>";
      }

      ?>
    </table>
    
  </div>
</div>

<?php

// var_dump($meds);
include './../footer.php';
?>