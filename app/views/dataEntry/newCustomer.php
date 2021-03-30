
<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">
<div class="containers">
  <ul class="breadcrumb">
    <li><a href="./../dataEntryHome/index">Home</a></li>
    <li><a href="./../manageCustomer/updateCustomer">Manage Customer Profile</a></li>
    <li>New Customer Profile</a></li>
  </ul>
  <h1>Create Customer Profile</h1><br>
  <div class="form-container">
    
    <form action="./createCustomer" method="post" onSubmit="showLoader()">
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
            <label for="custDOB">Date of birth</label><br>
            <input type="Date" id="custDOB" name="custDOB" class="input" value="" required><br>
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
            <input type="Date" id="paymentDate" name="paymentDate" class="input" value="<?php echo date("Y-m-d"); ?>" required><br>
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
            <input type="submit" id="newCustomer" name="newCustomer" class="btn-submit" value="Create Account"><br>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
