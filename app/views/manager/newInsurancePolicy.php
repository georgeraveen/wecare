<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">
<div class="containers">
  <h1>New insurance policy</h1><br>
  <div class="form-container" style="width:40%">
    <form action="./addPolicy" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="column">
            <div class="formInput">
                <label for="date">Date</label><br>
                <input type="Date" id="date" name="date" class="input" value=""><br>
            </div>
        </div>
      </div>
      <div class="row">
        <div class="column">
            <div class="formInput">
                <label for="remarks">Remark</label><br>
                <input type="text" id="remarks" name="remarks" class="input" value=""><br>
            </div>
        </div>
      </div>
      <div class="row">
        <div class="column">
            <div class="formInput">
                <label for="policyFile">Upload</label>
                <input type="file" id="policyFile" name="policyFile" multiple accept=".pdf, image/*">
            </div>
        </div>
      </div>
      <div class="row">
        <div class="column">
            <div class="formInput">
                <label for="vPremium">vPremium</label><br>
                <input type="text" id="vPremium" name="vPremium" class="input" value=""><br>
            </div>
        </div>
        <div class="column">
            <div class="formInput">
                <label for="rPremium">rPremium</label><br>
                <input type="text" id="rPremium" name="rPremium" class="input" value=""><br>
            </div>
        </div>
      </div>
      <div class="row">
        <div style="text-align:center" class="column">
            <div class="formInput">
            <br><br>
                <input type="submit" id="submit" name="addNew" class="btn-submit" value= "Submit" ><br>
            </div>
        </div>
      </div>
    </form>
  </div>
</div>