
<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">
<div class="containers">
  <h1>Update Insurance Claim Case</h1><br>
  <div class="form-container">
    
    <form action="./updateCase" method="post">
      <div class="row">
        <div class="column">
          <div class="formInput">
            <label for="customer">Customer</label><br>
            <select id="customer" name="customer" required>
              <!-- <option>Customer ID - Customer Name</option> -->
              <?php               
                foreach ($data['custList'] as $customersRow){
                  echo "<option value= \"".$customersRow['custID']."\"";
                  if($customersRow['custID']==$data['caseDetails'][0]['custID']) echo "selected=\"selected\"";
                  echo "> CUST".$customersRow['custID']." - ".$customersRow['custName']."</option>";
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
                  echo "<option value= \"".$hospitalsRow['hospitalID']."\"";
                  if($hospitalsRow['hospitalID']==$data['caseDetails'][0]['hospitalID']) echo "selected=\"selected\"";
                  echo ">(".$hospitalsRow['hospitalID'].") - ".$hospitalsRow['name']."</option>";
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
            <input type="Date" id="admitDate" name="admitDate" class="input" value=<?php echo $data['caseDetails'][0]['admitDate']?>><br>
          </div>
        </div>
        <div class="column">
          <div class="formInput">
            <label for="dischargeDate">Discharge Date</label><br>
            <input type="Date" id="dischargeDate" name="dischargeDate" class="input" value=<?php echo $data['caseDetails'][0]['dischargeDate']?>><br>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="column">
          <div class="formInput">
            <label for="icuFromDate">ICU From Date</label><br>
            <input type="Date" id="icuFromDate" name="icuFromDate" class="input" value=<?php echo $data['caseDetails'][0]['icuFromDate']?>><br>
          </div>
        </div>
        <div class="column">
          <div class="formInput">
            <label for="icuToDate">ICU To Date</label><br>
            <input type="Date" id="icuToDate" name="icuToDate" class="input" value=<?php echo $data['caseDetails'][0]['icuToDate']?>><br>
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
                  echo "<option value= \"".$medsRow['empID']."\"";
                  if($medsRow['empID']==$data['caseDetails'][0]['medScruID']) echo "selected=\"selected\"";
                  echo "> MED".$medsRow['empID']." - ".$medsRow['empFirstName']." ".$medsRow['empLastName']."</option>";
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
                  echo "<option value= \"".$fagsRow['empID']."\"";
                  if($fagsRow['empID']==$data['caseDetails'][0]['FieldAgID']) echo "selected=\"selected\"";
                  echo "> FAG".$fagsRow['empID']." - ".$fagsRow['empFirstName']." ".$fagsRow['empLastName']."</option>";
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
            <textarea id="healthCondition" name="healthCondition" class="commentBox"><?php echo $data['caseDetails'][0]['healthCondition']; ?></textarea> <br>
          </div>
        </div>
        <div class="column">
          <div class="formInput">
            <input type="submit" id="submit" name="editInsurance" class="btn-submit" value= "Submit" ><br>
            <input type="hidden" id="submit" name="claimID" value= <?php echo $data['id'];?> >
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
