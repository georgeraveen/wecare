<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">
<div class="containers">
  <h1>Review cases and feedback</h1><br>
  <div class="table-container">
    <table class="table-view">
      <tr>
        <th>Claim ID</th>
        <th>Policy ID</th>
        <th>Customer</th>
        <th>Date</th>
        <th>Type</th>
        <th>Claim status</th>
        <th>View</th>
      </tr>
      <?php
      foreach($data as $row){
        //echo "gyff";
        echo "<tr>"."<td>".$row['claimID']."</td>".
              "<td>".$row['policyID']."</td>".
              "<td>".$row['custName']."</td>".
              "<td>".$row['dischargeDate']."</td>".
              "<td>".$row['type']."</td>".
              "<td>".$row['caseStatus']."</td>".
              "<td> <a class=\"editBtn\" href=\"./viewCases?action=edit&id=".$row['claimID']."\">View</a> "."</td>"."</tr>";
      }

      ?>
    </table>
    
  </div>
</div>