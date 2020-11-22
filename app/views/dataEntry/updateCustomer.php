
<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">
<link rel="stylesheet" href= "./../../css/dropdown.css">
<div class="containers">
  <h1>Update Customer Profile</h1><br>
  <div class="form-container2">
    <form >
      <div class="row">
      <div class="column">
          <div class="formInput">
            <input class="radioInput" type="radio" id="byID" name="searchBy" value="byID">
            <label for="byID">Search by ID</label><br>
            <input class="radioInput" type="radio" id="byName" name="searchBy" checked value="byName">
            <label for="byName">Search by name</label><br>
          </div>
        </div>
        <div class="column">
          <span>Search and select a customer</span>
          <!-- <input type="text" id="custID" name="custID" required class="input hide" > -->
          <input type="text" id="custName" name="custName" required class="input"  onkeyup="showResult(this.value)"><br>
          <div id="livesearch" class="dropdown-content"></div>
        </div>
        
      </div>
    </form>
  </div>
  <br><br>
<div class="form-container" id="form-container">
    
    <form action="#" method="post">
      <div class="row">
        <div class="column">
          <div class="formInput">
            <label for="customer">Customer name</label><br>
            <input type="text" id="custName" name="custName" required class="input"><br>
          </div>
        </div>
        <div class="column">
          <div class="formInput">
            <label for="custNIC">Customer NIC</label><br>
            <input type="text" id="custNIC" name="custNIC" required class="input"><br>
          </div>
          
        </div>
      </div>
      <div class="row">
        <div class="column">
          <div class="formInput">
            <label for="dob">Date of birth</label><br>
            <input type="Date" id="dob" name="dob" class="input" value="" required><br>
          </div>
        </div>
        <div class="column">
          <div class="formInput">
            <label for="gender">Gender</label><br>
            <select id="gender" name="gender" required>
              <option>Male</option>
              <option>Female</option>
              <option>Other</option>
            </select><br>
          </div>
        </div>
        <div class="column">
          <div class="formInput">
            <label for="email">Email</label><br>
            <input type="email" id="email" name="email" class="input"><br>
          </div>
        </div>
      </div>
      <div class="row">
      <div class="column">
          <div class="formInput">
            <label for="custAddress">Customer address</label><br>
            <textarea id="custAddress" name="custAddress" class="commentBox"></textarea> <br>
          </div>
        </div>
        <div class="column">
          <div class="formInput">
            <label for="policyID">Select insurance policy</label><br>
            <select id="policyID" name="policyID" required>
              <?php               
                // $meds=$employee->getEmpByTypeList("MED");
                // // var_dump($meds);
                // foreach ($meds as $medsRow){
                //   echo "<option value= \"".$medsRow['empID']."\"> MED".$medsRow['empID']." - ".$medsRow['empFirstName']." ".$medsRow['empLastName']."</option>";
                // }
              ?>
            </select><br>
          </div>
          <div class="formInput">
            <label for="custNIC">Customer contact numbers</label><br>
            <input type="text" id="custNIC" name="custNIC" required class="input" placeholder="Enter numbers with comma seperated"><br>
          </div>
        </div>
      </div>
     
      <div class="row">
        <div class="column">
          <div class="formInput">
            <label for="paymentDate">Payment date</label><br>
            <input type="Date" id="paymentDate" name="paymentDate" class="input" value="" required><br>
          </div>
        </div>
        <div class="column">
          <div class="formInput">
            <label for="custType">Customer type</label><br>
            <select id="custType" name="custType" required>
              <option>VIP</option>
              <option>Regular</option>
            </select><br>
          </div>
        </div>
        <div class="column">
          <div class="formInput">
            <input type="submit" id="editCustomer" name="editCustomer" class="btn-submit" value="Update Account"><br>
          </div>
        </div>
      </div>
      <div class="row">
      <div class="column">
          <div class="formInput">
            <input type="submit" id="resetCustomer" name="resetCustomer" class="btn-submit" value="Password Reset"><br>
          </div>
        </div>
        <div class="column">
          <div class="formInput">
            <input type="submit" id="removeCustomer" name="removeCustomer" class="btn-submit" value="Remove"><br>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<script src="./../../js/searchCustomer.js"></script>
