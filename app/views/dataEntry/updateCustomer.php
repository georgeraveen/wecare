
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
          <input type="text" id="custNameBox" name="custName" required class="input"  onkeyup="showResult(this.value)"><br>
          <div id="livesearch" class="dropdown-content"></div>
        </div>
        
      </div>
    </form>
  </div>
  <br><br>
<div class="form-container hide" id="updateForm">
    
    <form action="./editCustomer" method="post" onSubmit="showLoader()">
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
              <option value="m">Male</option>
              <option value="f">Female</option>
              <option value="o">Other</option>
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
                foreach ($data as $row){
                  echo "<option value= \"".$row['policyID']."\"> ID".$row['policyID']." - ".$row['date']."</option>";
                }
              ?>
            </select><br>
          </div>
          <div class="formInput">
            <label for="custContact">Customer contact numbers</label><br>
            <input type="text" id="custContact" name="custContact" required class="input" placeholder="Enter numbers with comma seperated"><br>
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
              <option value="VIP">VIP</option>
              <option value="Regular">Regular</option>
            </select><br>
          </div>
        </div>
        <div class="column">
          <div class="formInput">
            <input type="submit" id="editCustomer" name="editCustomer" class="btn-submit" value="Update Account"><br>
          </div>
        </div>
      </div>
      <input type="text" id="custID" name="custID" required class="input hide" >

    </form>
    <form method="post" action="./resetPass">
    <input type="text" id="custID1" name="custID" required class="input hide" >

      <div class="row">
        <div class="column">
          <div class="formInput">
            <input type="submit" id="resetCustomer" name="resetCustomer" class="btn-submit" value="Password Reset"><br>
          </div>
        </div>
        <div class="column">
          <div class="formInput">
            <a href="./removeCustomer" id="removeBtnLink">
              <button type="button" id="removeCustomer"  class="btn-submit" >Remove</button>
            </a>
            <br>
          </div>
        </div>
      </div>
    </form>    
  </div>
</div>
<script src="./../../js/searchCustomer.js"></script>
