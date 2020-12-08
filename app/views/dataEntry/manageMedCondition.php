
<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">
<link rel="stylesheet" href= "./../../css/dropdown.css">
<div id="content">
<div class="containers">
  <h1>Manage Medical Condition</h1><br>
  <div class="form-container2">
    <form action="./viewMedCond" method="post">
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
      <br>
      <div class="row">
        <div class="column">
        </div>
        <div class="column">
          <div class="formInput">
            <a class="btn-submit" onClick="viewAdd()" >Add New</a>
          </div>
        </div>
        <input type="text" id="custID1" name="custID1" required class="input hide" >
        <div class="column">
          <div class="formInput">
            <input type="submit" id="viewMedCondition" name="viewMedCondition" class="btn-submit" value="View/Update"><br>
          </div>
        </div>
      </div>
    </form>
  </div>
  <br>
</div>

<div id = "addMedDiv" class="containers addMedDiv">
  <div class="form-container2">
  <h1>Add New Medical Condition</h1><br>
    
    <form action="./createNewConditon" method="post"  onSubmit="showLoader()">
    <input type="text" id="custID" name="custID" required class="input hide" >
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
              <option value="Accidental">Accidental</option>
              <option value="Congenital">Congenital</option>
              <option value="Genetical">Genetical</option>
            </select><br>
          </div>
          
        </div>
      </div>
     
      <div class="row">
        <div class="column">
          <div class="formInput">
            <label for="healthCondition">Health Condition</label><br>
            <textarea id="healthCondition" name="healthCondition" class="commentBox"></textarea> <br>
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
</div>
<div  class="containers">
  <div id="loader" class="loader"></div>
</div>
<script src="./../../js/searchCustomer.js"></script>
