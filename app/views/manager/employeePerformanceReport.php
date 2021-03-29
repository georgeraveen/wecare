<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">
<div class="containers">
  <h1>Medical scrutinizer performance report </h1><br>
  <div class="table-container">
    <table class="table-view">
      <tr>
        <th>Med Scrutinizer ID</th>
        <th>No of cases</th>
        <th>Name</th>
        <th>View</th>
      </tr>
      <?php
      foreach($data as $row){
        //echo "gyff";
        echo "<tr>"."<td>".$row['medScruID']."</td>".
              "<td>".$row['num']."</td>".
              "<td>".$row['empName']."</td>".
              "<td> <a class=\"editBtn\" href=\"./performanceChart?action=edit&id=".$row['claimID']."\">View</a> "."</td>"."</tr>";
              
      }

      ?>
    </table>
    
  </div>
</div>