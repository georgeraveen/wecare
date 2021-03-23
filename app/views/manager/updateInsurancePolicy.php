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
        $people = array('Joe','Jane','Mike');
      $num=  if( count( $people) > 0) {
          echo '<ul>';
          echo '<li>' . implode( '</li><li>', $people) . '</li>';
          echo '</ul>';
      }

        //var_dump($row);
        //echo "<br>";
        //echo $row['policyID'];
        echo "<tr>"."<td>".$row['policyID']."</td>".
              "<td>".$row['date']."</td>".
              "<td>".try {
                $dir ="./../documents/policy/". $row['policyID'];
                // Sort in ascending order - this is default
                $ls = scandir($dir);

                // Sort in descending order
                //$b = scandir($dir,1);
                // var_dump($ls);
                /*for($i=2;$i < count($ls);$i++){
                    $filename=pathinfo($ls[$i],PATHINFO_FILENAME);
                    $ext=pathinfo($ls[$i],PATHINFO_EXTENSION);
                    echo "<tr id=\"file$i\">";
                    echo "<td><a id=\"txt-$i\" href =\"./viewFil/". $data['singleCaseDetails'][0]['claimID'] . "/". $filename."/".$ext ."\">".$ls[$i]."</a></td>";
                    echo  "<td>  <div id=\"btn-$i\" class=\"btn-delete\" onClick=\"sendDelete($i)\"> X </div></td>";
                    echo "</tr>";
                }*/
            } catch (\Throwable $th) {
                echo "Empty Directory";
            }."</td>".
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