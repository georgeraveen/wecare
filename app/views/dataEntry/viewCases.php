
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
              "<td>".$row['caseStatus']."</td>".
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
