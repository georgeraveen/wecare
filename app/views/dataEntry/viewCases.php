<?php
 if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "") {
  // not logged in send to login page
  $_SESSION["portal"]="employee";
  redirect("./../../employee");
}
if($_SESSION["rolecode"]!="DEO"){
  die("You dont have the permission to access this page");
}

// $claimQueue = $claimCase->getAllQueue();
// var_dump($claimQueue);
// echo $claimQueue->num_rows."sdsd";

?>

<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">
<div class="containers">
  <h1>View Insurance Claim Cases</h1><br>
  <div class="table-container">
    <table class="table-view">
      <tr>
        <th>ID</th>
        <th>Discharge Date</th>
        <th>Status</th>
        <th>Hospital</th>
        <th>Field Agent</th>
        <th>Med Scrutinizer</th>
        <th>Doctor</th>
        <th>Action</th>
      </tr>
      <?php
      foreach($data as $row){
        echo "<tr>"."<td>".$row['claimID']."</td>".
              "<td>".$row['dischargeDate']."</td>".
              "<td>".$row['claimID']."</td>".
              "<td>".$row['name']."</td>".
              "<td>".$row['fag']."</td>".
              "<td>".$row['med']."</td>".
              "<td>".$row['doc']."</td>".
              "<td> <a class=\"deleteBtn\" href=\"./deleteCase?action=delClaimCase&id=".$row['claimID']."\">Delete</a> <a class=\"editBtn\" href=\"./editCase?action=edit&id=".$row['claimID']."\">View/Edit</a> "."</td>"."</tr>";
      }

      ?>
    </table>
    
  </div>
</div>
