
<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">
<div class="containers">
  <h1>Select Customer Profile</h1><br>
  <div class="form-container2">
    <form>
      <div class="row">
        <div class="column">
        <select id="customer" name="customer" required>
              <!-- <option>Customer ID - Customer Name</option> -->
              <?php               
               foreach ($data['custList'] as $customersRow){
                echo "<option value= \"".$customersRow['custID']."\"> CUST".$customersRow['custID']." - ".$customersRow['custName']."</option>";
                }
              ?>  
            </select><br>
        </div>
        <div class="column">
          <div class="formInput">
            <input type="submit" id="setCustomer" name="setCustomer" class="btn-submit" value="Select customer"><br>
          </div>
        </div>
      </div>
    </form>
  </div>
  <br><br>
  <h1>Or search Customer Profile</h1>
  <h2>Search by</h1>
  <div class="form-container2">
    <form>
      <div class="row">
        <div class="column">
          <select id="custData" name="custData" required>
            <option>Name</option>
            <option>Customer ID</option>
            <option>NIC</option>
            <option>Phone Number</option>
          </select>
        </div>
        <div class="column">
          <div class="formInput">
            <label for="custData"></label>
            <input type="data" id="data" name="data" class="input">          
          </div>
        </div>
        </div>
        <div class="row">
        <input type="submit" id="setOption" name="setOption" class="btn-submit" value="Search"><br>
        </div>
    </form><br>
    </div>
    <div class="table-container">
    <table class="table-view">
      <tr>
        <th>Name</th>
        <th>Customer ID</th>
        <th>NIC</th>
        <th>Phone Number</th>
        <th>Action</th>
      </tr>
      <tr>
        <td>Mr.Perera</td>
        <td>001</td>
        <td>9723797713V</td>
        <td>07355322</td>
        <td><a class="button" href="./../manageCustMedical/viewConditions">View</a></td>
      </tr>
    </table>
  </div>

  