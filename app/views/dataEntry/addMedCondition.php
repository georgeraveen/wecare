
<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">
<div class="containers">
  <ul class="breadcrumb">
    <li><a href="./../dataEntryHome/index">Home</a></li>
    <li><a href="./../insureCase/viewCase">Manage Medical Condition</a></li>
    <li>Add Condition</a></li>
  </ul>
  <h1>Add New Medical Condition</h1><br>
  <div class="form-container2">
    
    <form action="./back/backend.php" method="post">
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
              <option value=a>Accidental</option>
              <option value=b>Congenital</option>
              <option value=c>Genetical</option>
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
