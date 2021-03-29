<?php
  $status=['Initial','Processed','Processing','Rejected','Doctor confirmed'];
?>
<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">
<link rel="stylesheet" href= "./../../css/pagination.css">
<div class="containers">
<ul class="breadcrumb">
    <li><a href="./../medScruHome/index">Home</a></li>
    <li>Scrutinizer Pending cases queue</a></li>
  </ul>
  <h1>Scrutinizer Pending cases queue</h1>
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
      foreach($data['queue'] as $row){
        echo "<tr>"."<td>".$row['claimID']."</td>".
              "<td>".$row['dischargeDate']."</td>".
              "<td>".$row['caseStatus']."</td>".
              "<td>".$row['name']."</td>".
              "<td>".$row['fag']."</td>".
              "<td>".$row['med']."</td>".
              "<td>".$row['doc']."</td>".
              "<td><a class=\"editBtn\" href=\"./editCase?action=edit&id=".$row['claimID']."\">View/Edit</a> "."</td>"."</tr>";
      }
      ?>
        <!-- <td><a class="button" href="./../viewPendingCases/viewCase">Accept</a></td> -->
    </table>
  </div>
</div>