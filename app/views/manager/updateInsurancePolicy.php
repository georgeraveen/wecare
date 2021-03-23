<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">
<div class="containers">
<ul class="breadcrumb">
    <li><a href="./../managerHome/index">Home</a></li>
    <li>View Policy List</a></li>
</ul>
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
        <th colspan="2" style="text-align:center">Action</th>
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
              "<td>";
                  $dir ="./../documents/policy/". $row['policyID'];
                  $ls = scandir($dir);
                  if(count($ls)>2){
                  for($i=2;$i < count($ls);$i++){
                      $filename=pathinfo($ls[$i],PATHINFO_FILENAME);
                      $ext=pathinfo($ls[$i],PATHINFO_EXTENSION);
                      echo "<a id=\"txt-$i\" href =\"./viewFil/". $row['policyID'] . "/". $filename."/".$ext ."\">".$ls[$i]."</a><br>";
                  }
              } else{
                  echo "Empty Directory";
              }
              echo"</td>".
              "<td>".$row['remarks']."</td>".
              "<td>".$row['vPremium']."</td>".
              "<td>".$row['rPremium']."</td>".
              "<td> <a class=\"deleteBtn\" href=\"./deletePolicy?action=delete&id=".$row['policyID']."\">Delete</a> "."</td>".
              "<td> <a class=\"editBtn\" href=\"./editPolicy?action=edit&id=".$row['policyID']."\">Edit</a> "."</td>"."</tr>";
      }

      ?>
      </tr>
    </table>
  </div>
  <br><br><br>
  <a class="btn-submit" href="./newInsurancePolicy">New</a>
</div>