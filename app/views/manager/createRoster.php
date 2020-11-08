<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/modal.css">
<link rel="stylesheet" href= "./../../css/style.css">
<div class="containers">
  <h1>Create New Roster</h1><br>
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
        <tr id="slot2">
          <td id="time2">08:00H - 16:00H</td>
          <?php
            for($i=1;$i<=7;$i++){
              echo "<td><button id=\"2".$i."\" class=\"editBtn\" onClick=\"addUser(this.id)\" >Add user</button></td>";
            }
          ?>
        </tr>
        <tr id="slot3">
          <td id="time3">16:00H - 00:00H</td>
          <?php
            for($i=1;$i<=7;$i++){
              echo "<td><button id=\"3".$i."\" class=\"editBtn\" onClick=\"addUser(this.id)\" >Add user</button></td>";
            }
          ?>
        </tr>
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
    
  </div>
</div>
<form action="./create">
<div class="row">
    <div class="column">
      <div class="formInput">
        <input type="submit" id="submitRoster" name="submitRoster" class="btn-submit" value="Create Roster"><br>
      </div>
    </div>
  </div>
  <?php 
  for($j=1;$j<=3;$j++){
    for($i=1;$i<=7;$i++){
      echo "<input class=\"hide\" type=\"text\" id=\"A".$j.$i."\" name=\"A".$j.$i."\" >";
    }
    echo "<br><br>";
  }
  ?>
  
</form>
<div id="Modal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
            <input id="btnIDModel" type="text">
      <div class="row">
        <div class="column">
          <div class="formInput">
            <label for="newMedID">Type</label><br>
            <select id="newMedID" name="newMedID">
              <option value=a>a</option>
              <option value=b>b</option>
              <option value=c>c</option>
              <option value=d>d</option>
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
<script type="text/javascript" src="./../../js/roster1.js"></script>
