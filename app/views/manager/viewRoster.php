
<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/modal.css">
<link rel="stylesheet" href= "./../../css/style.css">
<div class="containers">
  <h1>Roster for the week 2020/11/14 to 2020/11/21</h1><br>
  <div class="form-container2">
    <form>
      <div class="row">
        <div class="column">
          <select id="custID" name="custID" required>
            <option>2020/10/17</option>
            <option>2020/10/24</option>
            <option>2020/10/31</option>
            <option>2020/11/7</option>
            <option>2020/11/14</option>
          </select><br>
        </div>
        <div class="column">
          <div class="formInput">
            <input type="submit" id="setCustomer" name="setCustomer" class="btn-submit" value="Select Roster"><br>
          </div>
        </div>
      </div>
    </form>
  </div>
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
        <th colspan="2" style="text-align:center">Action</th>
      </thead>
      <tbody>
        <tr id="slot1">
          <td id="time1">00:00H - 08:00H</td>
          <td>MED1 - Kamal Perera</td>
          <td>MED2 - Amal Perera</td>
          <td>MED4 - Nimal Perera</td>
          <td>MED1 - Kamal Perera</td>
          <td>MED4 - Nimal Perera</td>
          <td>MED1 - Kamal Perera</td>
          <td>MED2 - Amal Perera</td>
          <td> <a class="editBtn" href="#">Edit</a></td>
          <td> <a class="deleteBtn" href="#">Delete</a></td>  
     <!--cmnt-->
        </tr>
        <tr id="slot2">
          <td id="time2">08:00H - 16:00H</td>
          <td>MED1 - Kamal Perera</td>
          <td>MED2 - Amal Perera</td>
          <td>MED4 - Nimal Perera</td>
          <td>MED1 - Kamal Perera</td>
          <td>MED4 - Nimal Perera</td>
          <td>MED1 - Kamal Perera</td>
          <td>MED2 - Amal Perera</td>
          <td> <a class="editBtn" href="#">Edit</a></td>
          <td> <a class="deleteBtn" href="#">Delete</a></td>  
      <!--cmnt-->
        </tr>
        <tr id="slot3">
          <td id="time3">16:00H - 00:00H</td>
          <td>MED1 - Kamal Perera</td>
          <td>MED2 - Amal Perera</td>
          <td>MED4 - Nimal Perera</td>
          <td>MED1 - Kamal Perera</td>
          <td>MED4 - Nimal Perera</td>
          <td>MED1 - Kamal Perera</td>
          <td>MED2 - Amal Perera</td>
        <!--cmnt-->
        </tr>
      </tbody>
    </table>
  <br><br>
</div>
</div>

<!---
<div id="Modal" class="modal">
  <div class="modal-content sm">
    <span class="close">&times;</span>
    <div class="form-container2">
      <input id="btnIDModel" type="text" hidden>
      <div class="row">
        <div class="column">
          <div class="formInput">
            <label for="newMedID">Select medical scrutinizer</label><br>
            <select id="newMedID" name="newMedID">
              <option value="1">MED1 - Kamal Perera</option>
              <option value="2">MED2 - Amal Perera</option>
              <option value="3">MED3 - Sunil Perera</option>
              <option value="4">MED4 - Nimal Perera</option>
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
--->
<script type="text/javascript" src="./../../js/roster1.js"></script> 
