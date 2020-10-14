<?php

// var_dump($data['hospList']);
?>

<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">
<div class="containers">
  <h1>Create New Insurance Claim Case</h1><br>
  <div class="form-container">
    
    <form action="./newcase" method="post">
      <div class="row">
        <div class="column">
          <div class="formInput">
            <label for="customer">Customer</label><br>
            <select id="customer" name="customer" required>
              <!-- <option>Customer ID - Customer Name</option> -->
              <?php               
                foreach ($data['custList'] as $customersRow){
                  echo "<option value= \"".$customersRow['custID']."\"> CUST".$customersRow['custID']." - ".$customersRow['custName']."</option>";
                }
              ?>
            </select><br>
          </div>
        </div>
        <div class="column">
          <div class="formInput">
            <label for="hospital">Hospital</label><br>
            <select id="hospital" name="hospital" required>
              <!-- <option>Hospital Name</option> -->
              <?php               
                foreach ($data['hospList'] as $hospitalsRow){
                  echo "<option value= \"".$hospitalsRow['hospitalID']."\">(".$hospitalsRow['hospitalID'].") - ".$hospitalsRow['name']."</option>";
                }
              ?>
            </select><br>
          </div>
          
        </div>
      </div>
      <div class="row">
        <div class="column">
          <div class="formInput">
            <label for="admitDate">Admit Date</label><br>
            <input type="Date" id="admitDate" name="admitDate" class="input" value=""><br>
          </div>
        </div>
        <div class="column">
          <div class="formInput">
            <label for="dischargeDate">Discharge Date</label><br>
            <input type="Date" id="dischargeDate" name="dischargeDate" class="input"><br>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="column">
          <div class="formInput">
            <label for="icuFromDate">ICU From Date</label><br>
            <input type="Date" id="icuFromDate" name="icuFromDate" class="input"><br>
          </div>
        </div>
        <div class="column">
          <div class="formInput">
            <label for="icuToDate">ICU To Date</label><br>
            <input type="Date" id="icuToDate" name="icuToDate" class="input"><br>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="column">
          <div class="formInput">
            <label for="medScrut">Medical Scrutinizer</label><br>
            <select id="medScrut" name="medScrut" required>
              <?php               
                foreach ($data['medList'] as $medsRow){
                  echo "<option value= \"".$medsRow['empID']."\"> MED".$medsRow['empID']." - ".$medsRow['empFirstName']." ".$medsRow['empLastName']."</option>";
                }
              ?>
              <!-- <option>User ID - Name</option> -->
            </select><br>
          </div>
        </div>
        <div class="column">
          <div class="formInput">
            <label for="fieldAg">Field Agent</label><br>
            <select id="fieldAg" name="fieldAg" required>
              <!-- <option>User ID - Name</option> -->
              <?php               
                foreach ($data['fagList'] as $fagsRow){
                  echo "<option value= \"".$fagsRow['empID']."\"> FAG".$fagsRow['empID']." - ".$fagsRow['empFirstName']." ".$fagsRow['empLastName']."</option>";
                }
              ?>
            </select><br>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="column">
          <div class="formInput">
            <label for="healthCondition">Health Condition / Comments</label><br>
            <textarea id="healthCondition" name="healthCondition" class="commentBox"></textarea> <br>
          </div>
        </div>
        <div class="column">
          <div class="formInput">
            <input type="submit" id="submit" name="newInsurance" class="btn-submit" value="Submit"><br>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
