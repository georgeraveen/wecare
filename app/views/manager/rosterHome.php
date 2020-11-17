
<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">
<div class="containers">
  <h1>Manage weekly roster</h1><br>
  <div class="form-container2">
    <form >
        <div class="row">
            <div class="column">
                <div class="formInput">
                    <label for="rosterDate">Date</label><br>
                    <input type="Date" id="rosterDate" name="rosterDate" class="input" value="" placeholder="New roster date"><br>
                </div>
            </div>
           
            <div class="column">
                <select id="custID" name="custID" required>
                    <option>1 - nimal</option>
                    <option>2 - wimal</option>
                </select><br>
            </div>
           
        </div>
        <div class="row">
            <div class="column">
                <div class="formInput">
                    <!-- <input type="submit" id="createDate" name="addMed" class="btn-submit" value="Add New"><br> -->
                    <a class="btn-submit" href="./createNew">Add New</a>
                </div>
            </div>
            <div class="column">
                <div class="formInput">
                    <!-- <input type="submit" id="viewMed" name="viewMed" class="btn-submit" value="View"><br> -->
                    <a class="btn-submit" href="./viewRoster">View/Update</a>
                </div>
            </div>
        </div>
    </form>
  </div>
  <br><br>

  
</div>
