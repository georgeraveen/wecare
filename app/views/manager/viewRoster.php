<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/modal.css">
<link rel="stylesheet" href= "./../../css/style.css">
<div class="containers">
  <h1>View Roster - <?php echo $data[1][0]["date"]." by MGR".$data[1][0]["managerID"];  ?></h1><br>
  <div class="table-container">
    <table id="rosterTable" class="table-view">
      <thead>
        <th>Time Slot</th>
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
          <td id="time1">00:00H - 08:00H</td>
          <?php
            for($i=1;$i<=7;$i++){
              echo "<td><button id=\"1".$i."\" class=\"editBtn\" onClick=\"addUser(this.id)\" >Add user</button></td>";
            }
          ?>
        </tr>
        <?php
        // function setRows($slott=1){
          $j=1;
          for ($r=0; $r < 10; $r++) { 
            $newRow="<tr><td></td>";
            $rowExist=false;
            for($i=1;$i<=7;$i++){
              if(array_key_exists($j.$i,$data[2])){
                if(count($data[2][$j.$i]["meds"])>$r){
                  $rowExist=true;
                  $medName=($data[2][$j.$i]["meds"][$r]["empID"]." - ".$data[2][$j.$i]["meds"][$r]["empFirstName"]." ".$data[2][$j.$i]["meds"][$r]["empLastName"]);
                  $newRow .= "<td><p id=\"as\">".$medName."  <button onClick=\"deleteMed(this,'A". $j.$i."',".$data[2][$j.$i]["meds"][$r]["empID"] .")\">X</button></p></td>";  
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
          <td id="time2">08:00H - 16:00H</td>
          <?php
            for($i=1;$i<=7;$i++){
              echo "<td><button id=\"2".$i."\" class=\"editBtn\" onClick=\"addUser(this.id)\" >Add user</button></td>";
            }
          ?>
        </tr>
        <?php
        $j=2;
        for ($r=0; $r < 10; $r++) { 
          $newRow="<tr><td></td>";
          $rowExist=false;
          for($i=1;$i<=7;$i++){
            if(array_key_exists($j.$i,$data[2])){
              if(count($data[2][$j.$i]["meds"])>$r){
                $rowExist=true;
                $medName=($data[2][$j.$i]["meds"][$r]["empID"]." - ".$data[2][$j.$i]["meds"][$r]["empFirstName"]." ".$data[2][$j.$i]["meds"][$r]["empLastName"]);
                $newRow .= "<td><p id=\"as\">".$medName."  <button onClick=\"deleteMed(this,'A". $j.$i."',".$data[2][$j.$i]["meds"][$r]["empID"] .")\">X</button></p></td>";  
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
          <td id="time3">16:00H - 00:00H</td>
          <?php
            for($i=1;$i<=7;$i++){
              echo "<td><button id=\"3".$i."\" class=\"editBtn\" onClick=\"addUser(this.id)\" >Add user</button></td>";
            }
          ?>
        </tr>
        <?php
          $j=3;
          for ($r=0; $r < 10; $r++) { 
            $newRow="<tr><td></td>";
            $rowExist=false;
            for($i=1;$i<=7;$i++){
              if(array_key_exists($j.$i,$data[2])){
                if(count($data[2][$j.$i]["meds"])>$r){
                  $rowExist=true;
                  $medName=($data[2][$j.$i]["meds"][$r]["empID"]." - ".$data[2][$j.$i]["meds"][$r]["empFirstName"]." ".$data[2][$j.$i]["meds"][$r]["empLastName"]);
                  $newRow .= "<td><p id=\"as\">".$medName."  <button onClick=\"deleteMed(this,'A". $j.$i."',".$data[2][$j.$i]["meds"][$r]["empID"] .")\">X</button></p></td>";  
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
          <td ></td>
          <?php
            for($i=1;$i<=7;$i++){
              echo "<td></td>";
            }
          ?>
        </tr>
      </tbody>
    </table>
  <br><br>
<form action="./updateRoster" method="post" onSubmit="showLoader()">
  <div class="formInput hide">
    <input required type="text" id="rosterID" name="rosterID" class="input hide" value="<?php echo $data[1][0]["rosterID"];  ?>"><br>
  </div>
  <div class="row">
    <div class="column">
        <div class="formInput">
            <label for="rosterDate">Date</label><br>
            <input required type="Date" id="rosterDate" name="rosterDate" class="input" value="<?php echo $data[1][0]["date"];  ?>" placeholder="New roster date"><br>
        </div>
    </div>
    <div class="column">
      <div class="formInput">
        <input type="submit" id="submitRoster" name="submitRoster" class="btn-submit" value="Create Roster"><br>
      </div>
    </div>
  </div>
  <?php 
  for($j=1;$j<=3;$j++){
    for($i=1;$i<=7;$i++){
        $medIDs="";
        if(array_key_exists($j.$i,$data[2])){
        // var_dump($data[2][$j.$i]["meds"]);
        foreach ($data[2][$j.$i]["meds"] as $med) {
          $medIDs .= (",".$med["medScruID"]);
        }
      }
      echo "<input class=\"hide\" type=\"text\" id=\"A".$j.$i."\" name=\"A".$j.$i."\" value=\"".$medIDs."\" >";
    }
    // echo "<br><br>";
  }
  ?>
</form>
  <?php
  // var_dump($data);
  ?>
</div>
</div>
<div id="Modal" class="modal">
  <!-- Modal content -->
  <div class="modal-content sm">
    <span class="close">&times;</span>
    <div class="form-container2">
      <input id="btnIDModel" type="text" hidden>
      <div class="row">
        <div class="column">
          <div class="formInput">
            <label for="newMedID">Select medical scrutinizer</label><br>
            <select id="newMedID" name="newMedID">
              <?php
                foreach ($data[0] as $value) {
                  echo "<option value=\"".$value["empID"]."\">".$value["empID"]. " - ".$value["empFirstName"]." ".$value["empLastName"] ."</option>";
                }
              ?>
            </select><br>
          </div>
          
        </div>
        <div class="column">
          <div class="formInput">
            <button class="editBtn" onClick="addToTable()">
            Add
            </button>
          </div>
          
        </div>
      </div>
    </div>
  </div>
     
</div>
<script type="text/javascript" src="./../../js/roster1.js"></script>
