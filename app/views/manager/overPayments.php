<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">
<div class="containers">
  <h1>Over payments</h1><br>
  <div class="table-container">
    <table class="table-view">
      <tr>
        <th>Claim ID</th>
        <th>Date</th>
        <th>Med scrutinizer</th>
        <th>Overpayment amount</th>
        <th>Remark</th>
        <th colspan="2" style="text-align:center">Action</th>
      </tr>
      <?php
      foreach($data as $row){
        //echo "gyff";
        echo "<tr>"."<td>".$row['claimID']."</td>".
              "<td>".$row['dischargeDate']."</td>".
              "<td>".$row['empName']."</td>".
              "<td>".$row['overPaidAmount']."</td>".
              "<td>".$row['remark']."</td>".
              "<td> <a class=\"deleteBtn\" href=\"./deleteOverPaid?action=delete&id=".$row['claimID']."\">Delete</a> "."</td>".
              "<td> <a class=\"editBtn\" href=\"./viewOverPaid?action=edit&id=".$row['claimID']."\">View</a> "."</td>"."</tr>";
              
      }

      ?>
    </table>
    
  </div>
</div>