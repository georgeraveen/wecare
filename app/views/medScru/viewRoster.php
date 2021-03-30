<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/modal.css">
<link rel="stylesheet" href= "./../../css/style.css">
<div class="containers">
<ul class="breadcrumb">
    <li><a href="./../medScruHome/index">Home</a></li>
    <li><a href="./../viewRoster/index">View weekly roster</a></li>
    <li>View</a></li>
  </ul>
  <h1>View Roster - <?php echo $data[1][0]["date"]." by MGR".$data[1][0]["managerID"];  ?></h1><br>
  <div class="table-container">
    <table id="rosterTable" class="table-view rosterTable">
      <thead>
        <th>Monday</th>
        <th>Tuesday</th>
        <th>Wednesday</th>
        <th>Thursday</th>
        <th>Friday</th>
        <th>Saturday</th>
        <th>Sunday</th>
      </thead>
      <tbody>
        <tr id="slot1">
          <td id="time1" colspan="7" class="colspanTD">Time Slot -> 00:00H - 08:00H</td>
        </tr>
        <?php
        // function setRows($slott=1){
          $j=1;
          for ($r=0; $r < 10; $r++) { 
            $newRow="<tr>";
            $rowExist=false;
            for($i=1;$i<=7;$i++){
              if(array_key_exists($j.$i,$data[2])){
                if(count($data[2][$j.$i]["meds"])>$r){
                  $rowExist=true;
                  $medName=($data[2][$j.$i]["meds"][$r]["empID"]." - ".$data[2][$j.$i]["meds"][$r]["empFirstName"]." ".$data[2][$j.$i]["meds"][$r]["empLastName"]);
                  $newRow .= "<td><p id=\"as\">".$medName."</p></td>";  
                }
              }
              else{
                $newRow .= "<td></td>";
              }
            }
            $newRow.= "</tr>";
            if($rowExist){
              echo $newRow;
            }
            else{
              break;
            }
          }
        // }
        // setRows(1);
        // setRows();
        ?>
        <tr id="slot2">
          <td id="time2" colspan="7" class="colspanTD">Time Slot -> 08:00H - 16:00H</td>
        </tr>
        <?php
        $j=2;
        for ($r=0; $r < 10; $r++) { 
          $newRow="<tr>";
          $rowExist=false;
          for($i=1;$i<=7;$i++){
            if(array_key_exists($j.$i,$data[2])){
              if(count($data[2][$j.$i]["meds"])>$r){
                $rowExist=true;
                $medName=($data[2][$j.$i]["meds"][$r]["empID"]." - ".$data[2][$j.$i]["meds"][$r]["empFirstName"]." ".$data[2][$j.$i]["meds"][$r]["empLastName"]);
                $newRow .= "<td><p id=\"as\">".$medName."</p></td>";  
              }
            }
            else{
              $newRow .= "<td></td>";
            }
          }
          $newRow.= "</tr>";
          if($rowExist){
            echo $newRow;
          }
          else{
            break;
          }
        }
        ?>
        <tr id="slot3">
          <td id="time3" colspan="7" class="colspanTD">Time Slot -> 16:00H - 00:00H</td>
        </tr>
        <?php
          $j=3;
          for ($r=0; $r < 10; $r++) { 
            $newRow="<tr>";
            $rowExist=false;
            for($i=1;$i<=7;$i++){
              if(array_key_exists($j.$i,$data[2])){
                if(count($data[2][$j.$i]["meds"])>$r){
                  $rowExist=true;
                  $medName=($data[2][$j.$i]["meds"][$r]["empID"]." - ".$data[2][$j.$i]["meds"][$r]["empFirstName"]." ".$data[2][$j.$i]["meds"][$r]["empLastName"]);
                  $newRow .= "<td><p id=\"as\">".$medName."</p></td>";  
                }
              }
              else{
                $newRow .= "<td></td>";
              }
            }
            $newRow.= "</tr>";
            if($rowExist){
              echo $newRow;
            }
            else{
              break;
            }
          }
        ?>
        <tr id="slotBlank">
          
          <?php
            for($i=1;$i<=7;$i++){
              echo "<td></td>";
            }
          ?>
        </tr>
      </tbody>
    </table>
  <br><br>

<script type="text/javascript" src="./../../js/roster1.js"></script>
