<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">
<div class="containers">
  <h1>Insurance policies list</h1><br>
  <div class="table-container">
    <table class="table-view">
      <tr>
        <th>Policy ID</th>
        <th>Date</th>
        <th>Documents</th>
        <th>Remarks</th>
        <th>vPremium</th>
        <th>rPremium</th>
      </tr>
      <tr>
      <?php
      //var_dump ($data);
      foreach($data as $row){
        //var_dump($row);
        //echo "<br>";
        //echo $row['policyID'];
        echo "<tr>"."<td>".$row['policyID']."</td>".
              "<td>".$row['date']."</td>".
              "<td>".NULL."</td>".
              "<td>".$row['remarks']."</td>".
              "<td>".$row['vPremium']."</td>".
              "<td>".$row['rPremium']."</td>"."</tr>";
      }

      ?>
      </tr>
    </table>
  </div>
  <br><br><br>
  <a class="btn-submit" href="./newInsurancePolicy">New</a>
</div>