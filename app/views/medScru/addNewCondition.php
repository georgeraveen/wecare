<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">
<link rel="stylesheet" href= "./../../css/dropdown.css">
<div class="containers">
  <h1>Add New Medical Condition</h1><br>
  <div class="form-container2">
    <form action="./createNewConditon" method="post">
    <div class="row">
              <div class="column" style="flex:25%">
              <div class="formInput">
                <input type="number" id="customer" name="customerID" class="input" value="" required>
                </div>
              </div>
              <div class="column"style="flex:75%">
                <div class="formInput">
                  <input type="text" id="custNameBox" name="custName" class="input"  onkeyup="showResult(this.value)" placeholder="Search by customer ID"><br>
                  <div id="livesearch" class="dropdown-content"></div>
                </div>
              </div>
      </div> 
      <div class="row">
        <div class="column">
          <div class="formInput">
            <label for="medDate">Date</label><br>
            <input type="Date" id="medDate" name="medDate" class="input" value="" required><br>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="column">
          <div class="formInput">
            <label for="type">Type</label><br>
            <select id="type" name="type" required>
              <option value=Genetic>Genetic</option>
              <option value=Congenital>Congenital</option>
              <option value=Accidential>Accidential</option>
            </select><br>
          </div>
          
        </div>
      </div>
     
      <div class="row">
        <div class="column">
          <div class="formInput">
            <label for="healthCondition">Health Condition</label><br>
            <textarea id="healthCondition" name="healthCondition" class="commentBox" required></textarea> <br>
          </div>
        </div>
      </div> 
      <div class="row">
        <div class="column">
          <div class="formInput">
            <label for="comments">Comments</label><br>
            <textarea id="comments" name="comments" class="commentBox"></textarea> <br>
          </div>
        </div>
      </div> 
      <div class="row">
        <div class="column">
          <div class="formInput">
            <input type="submit" id="addMedCondition" name="addMedCondition" class="btn-submit" value="Add medical condition"><br>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<script src="./../../js/common.js"></script>
<script src="./../../js/searchCustomerList.js"></script>

