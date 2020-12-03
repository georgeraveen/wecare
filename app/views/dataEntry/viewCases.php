
<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">
<link rel="stylesheet" href= "./../../css/pagination.css">
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
      foreach($data['queue'] as $row){
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
    <div class="pagination">
      <?php
      $page= is_int((int)$_GET['page']) ? (int)$_GET['page'] :0;
       if(($page) != 0){
         echo "<a href=\"./viewCase?page=".($page-1)."\">&laquo;</a>";
       }
       
        $pageCount= ceil((((int)$data['pagination'])/3));
        // echo $pageCount;
        for($i=0; $i< $pageCount; $i++){
          $active = ($i==$page) ? "class=\"active\"":"" ;
          // echo $i;
          echo "<a href=\"./viewCase?page=".$i."\" ". $active. ">" . ($i+1) ."</a>";
        }
        if(($page+1) != $pageCount){
          echo "<a href=\"./viewCase?page=".($page+1)."\">&raquo;</a>";
        }
      ?>
    </div>
  </div>
</div>
